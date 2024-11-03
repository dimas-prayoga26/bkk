<?php

namespace App\Http\Controllers\User;

use App\Helpers\IdtHelper;
use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Angkatan;
use App\Models\Berkas;
use App\Models\Jurusan;
use App\Models\Kegiatan;
use App\Models\Lamaran;
use App\Models\Pelamar;
use App\Models\RiwayatPekerjaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class PelamarController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $pelamar = Pelamar::query();

    if ($request->type) $pelamar->where('type', $request->type);
    if ($request->is_aktif !== null) {
      $isAktif = $request->is_aktif === '1' ? true : false;
      $pelamar->whereHas('user', fn($q) => $q->where('is_aktif', $isAktif));
    }

    if ($request->ajax()) {
      return DataTables::of($pelamar->with(['user']))->addIndexColumn()
                       ->editColumn('user.name', fn($data) => $data->user->name)
                       ->editColumn('user.email', fn($data) => $data->user->email)
                       ->editColumn('type', fn($data) => $data->type == 'umum' ? 'Pelamar Umum' : 'Pelamar Alumni')
                       ->editColumn('user.is_aktif', function($data){
                          return ($data->user->is_aktif == true)
                            ? '<span class="badge badge-sm badge-success">AKTIF</span>'
                            : '<span class="badge badge-sm badge-danger">NON-AKTIF</span>';
                          })
                       ->addColumn('aksi', fn($data) => view('pages.users.pelamar.aksi', compact('data')))
                       ->rawColumns(['user.is_aktif'])
                       ->make(true);
      }
    return view('pages.users.pelamar.index',[
      'pelamar' => $pelamar,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // return view('pages.users.pelamar.create',[
    //   //
    // ]);
    abort(404);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $request->validate([
        'name' => 'required',
        'type' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required',
      ]);

      try {
        DB::beginTransaction();
          $user = User::create($request->except('type'));
          $request['user_id'] = $user->id;
          $request['idt'] = IdtHelper::idtPelamar($request->name);
          $pelamar = Pelamar::create($request->only('type', 'user_id', 'idt'));
          Berkas::create(['pelamar_id' => $pelamar->id]);
          if ($pelamar->type == 'alumni') Alumni::create(['pelamar_id' => $pelamar->id]);;
        DB::commit();
        return redirect(route('user.pelamar.index'))->withSuccess('Data Admin berhasil ditambahkan!');
      } catch (\Throwable $th) {
        DB::rollBack();
        return back()->withInput()->withError('Gagal, silahkan coba lagi!');
    }
  }

  public function editRiwayatKerja(Request $request, RiwayatPekerjaan $riwayatkerja)
  {
    if ($request->ajax()) {
      return response()->json(['dataEdit' => $riwayatkerja]);
    } else {
      abort(404);
    }
  }

  public function storeRiwayatKerja(Request $request, Pelamar $pelamar)
  {
    $validasi = Validator::make($request->all(),[
      'nama_dudi' => 'required',
      'mulai' => 'required|date',
      'selesai' => 'nullable|date',
      'posisi' => 'required',
    ]);

    if ($validasi->fails()) {
      return response()->json(['errors' => $validasi->errors()]);
    } else {
      try {
        DB::beginTransaction();
          $request['pelamar_id'] = $pelamar->id;
          RiwayatPekerjaan::create($request->all());
        DB::commit();
        return response()->json(['success' => 'Riwayat Pekerjaan berhasil ditambahkan']);

      } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['failed' => 'Terjadi kesalahan!']);
      }
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pelamar  $pelamar
   * @return \Illuminate\Http\Response
   */
  public function show(Pelamar $pelamar)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pelamar  $pelamar
   * @return \Illuminate\Http\Response
   */
  public function edit(Request $request, Pelamar $pelamar, $endpoint)
  {
      if ($pelamar->idt != Auth::user()->pelamar->idt) abort(404);
      if ($endpoint == 'detail') {
        return view('pages.users.pelamar.edit.home',[
          'pelamar' => $pelamar->load(['user', 'berkas', 'alumni']),
          'riwayat' => RiwayatPekerjaan::where('pelamar_id', $pelamar->id)->get(),
          'riwayatLamaran' => Lamaran::where('pelamar_id', $pelamar->id)->with('loker.dudi')->get(),
        ]);
      } else if ($endpoint == 'alumni') {
        return view('pages.users.pelamar.edit.alumni',[
          'pelamar' => $pelamar->load('user','alumni'),
          'angkatan' => Angkatan::get(),
          'kegiatan' => Kegiatan::get(),
          'jurusan' => Jurusan::get(),
          'penghasilan' => [
            '< Rp1.000.000',
            'Rp1.000.000 - Rp2.500.000',
            'Rp2.500.000 - Rp5.000.000',
            'Rp5.000.000 - Rp7.500.000',
            'Rp7.500.000 - Rp10.000.000',
            '> Rp10.000.000',
          ],
        ]);
      } else if ($endpoint == 'data') { // EDIT DATA
        return view('pages.users.pelamar.edit.data',[
          'pelamar' => $pelamar->load('user'),
        ]);
      } else if ($endpoint == 'riwayatkerja') { // RIWAYAT KERJA
        $riwayatkerja = RiwayatPekerjaan::where('pelamar_id', $pelamar->id);
        if ($request->ajax()) {
          return DataTables::of($riwayatkerja->with(['pelamar']))->addIndexColumn()
                          ->editColumn('mulai', fn($data) => date("d-m-Y", strtotime($data->mulai)))
                          ->editColumn('selesai', fn($data) => $data->selesai != null ? date("d-m-Y", strtotime($data->selesai)) : '-')
                          ->addColumn('aksi', fn($data) => view('pages.users.pelamar.edit._aksiriwayatkerja', compact('data')))
                          ->make(true);
        }
        return view('pages.users.pelamar.edit.riwayatkerja',[
          'pelamar' => $pelamar->load('user'),
          'riwayat' => $riwayatkerja,
        ]);
      } else if ($endpoint == 'berkas') { // EDIT BERKAS
        return view('pages.users.pelamar.edit.berkas',[
          'pelamar' => $pelamar->load(['user', 'berkas']),
        ]);
      } else if ($endpoint == 'foto') {
        return view('pages.users.pelamar.edit.editfoto',[
          'pelamar' => $pelamar->load('user'),
        ]);
      } else {
        abort(404);
      }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pelamar  $pelamar
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Pelamar $pelamar, $endpoint)
  {
    if ($endpoint == 'data') { // UDPATE DATA
      $request->validate([
        'name' => 'required',
        'tempatlahir' => 'nullable',
        'tanggallahir' => 'nullable|date',
        'telepon' => 'nullable',
        'alamat' => 'nullable',
        // 'type' => 'required',
        'jk' => 'nullable',
        'email' => 'required|unique:users,email,' . $pelamar->user_id,
        'password' => 'nullable',
        'nik' => 'nullable|numeric|unique:pelamars,nik,' . $pelamar->id,
        'pend_terakhir' => 'nullable',
        'jurusan_terakhir' => 'nullable',
        'tahun_lulus' => 'nullable',
      ]);

      try {
        DB::beginTransaction();
          filled($request->password)
            ? $pelamar->user->update($request->except('type', 'nik', 'pend_terakhir', 'jurusan_terakhir', 'tahun_lulus'))
            : $pelamar->user->update($request->except('type', 'password', 'nik', 'pend_terakhir', 'jurusan_terakhir', 'tahun_lulus'));
          $request['idt'] = IdtHelper::idtPelamar($request->name);
          $pelamar->update($request->only('idt', 'type', 'nik', 'pend_terakhir', 'jurusan_terakhir', 'tahun_lulus'));
        DB::commit();
        return redirect(route('user.pelamar.edit', [$pelamar->idt, 'data']))->withSuccess('Data Pelamar berhasil diperbarui!');
      } catch (\Throwable $th) {
        DB::rollBack();
        return back()->withInput()->withError('Gagal, silahkan coba lagi!');
      }
    } else if ($endpoint == 'berkas') { // UPDATE BERKAS

      if ($request->jenis_berkas == 'ktp') { // BERKAS KTP
        $request->validate([
          'ktp' => 'required|file|mimes:pdf|max:2048',
          'jenis_berkas' => 'required|in:ktp',
        ]);

        try {
          DB::beginTransaction();
            $ktp = $request->file('ktp');
            $filename = 'ktp-' . IdtHelper::idtPelamar($pelamar->user->name) . '.' . $ktp->getClientOriginalExtension();
            if ($pelamar->berkas->ktp != null) File::delete(public_path('/berkas/ktp/' . $pelamar->berkas->ktp));
            $ktp->move('berkas/ktp/', $filename);
            $pelamar->berkas->update([ 'ktp' => $filename, ]);
          DB::commit();
          return back()->withSuccess('Berkas KTP berhasil diperbarui');
        } catch (\Throwable $th) {
          return back()->withError('Gagal! silahkan coba lagi!');
          DB::rollBack();
        }

      } else if ($request->jenis_berkas == 'ijazah') { // BERKAS IJAZAH

        $request->validate([
          'ijazah' => 'required|file|mimes:pdf|max:2048',
          'jenis_berkas' => 'required|in:ijazah',
        ]);

        try {
          DB::beginTransaction();
            $ijazah = $request->file('ijazah');
            $filename = 'ijazah-' . IdtHelper::idtPelamar($pelamar->user->name) . '.' . $ijazah->getClientOriginalExtension();
            if ($pelamar->berkas->ijazah != null) File::delete(public_path('/berkas/ijazah/' . $pelamar->berkas->ijazah));
            $ijazah->move('berkas/ijazah/', $filename);
            $pelamar->berkas->update([ 'ijazah' => $filename, ]);
          DB::commit();
          return back()->withSuccess('Berkas Ijazah berhasil diperbarui');
        } catch (\Throwable $th) {
          return back()->withError('Gagal! silahkan coba lagi!');
          DB::rollBack();
        }

      } else if ($request->jenis_berkas == 'surat_lamaran') {

        $request->validate([
          'surat_lamaran' => 'required|file|mimes:pdf|max:2048',
          'jenis_berkas' => 'required|in:surat_lamaran',
        ]);

        try {
          DB::beginTransaction();
            $surat_lamaran = $request->file('surat_lamaran');
            $filename = 'surat_lamaran-' . IdtHelper::idtPelamar($pelamar->user->name) . '.' . $surat_lamaran->getClientOriginalExtension();
            if ($pelamar->berkas->surat_lamaran != null) File::delete(public_path('/berkas/surat_lamaran/' . $pelamar->berkas->surat_lamaran));
            $surat_lamaran->move('berkas/surat_lamaran/', $filename);
            $pelamar->berkas->update([ 'surat_lamaran' => $filename, ]);
          DB::commit();
          return back()->withSuccess('Berkas Surat Lamaran berhasil diperbarui');
        } catch (\Throwable $th) {
          return back()->withError('Gagal! silahkan coba lagi!');
          DB::rollBack();
        }

      } else if ($request->jenis_berkas == 'cv') {

        $request->validate([
          'cv' => 'required|file|mimes:pdf|max:2048',
          'jenis_berkas' => 'required|in:cv',
        ]);

        try {
          DB::beginTransaction();
            $cv = $request->file('cv');
            $filename = 'cv-' . IdtHelper::idtPelamar($pelamar->user->name) . '.' . $cv->getClientOriginalExtension();
            if ($pelamar->berkas->cv != null) File::delete(public_path('/berkas/cv/' . $pelamar->berkas->cv));
            $cv->move('berkas/cv/', $filename);
            $pelamar->berkas->update([ 'cv' => $filename, ]);
          DB::commit();
          return back()->withSuccess('Berkas CV berhasil diperbarui');
        } catch (\Throwable $th) {
          return back()->withError('Gagal! silahkan coba lagi!');
          DB::rollBack();
        }

      } else if ($request->jenis_berkas == 'skck') {

        $request->validate([
          'skck' => 'required|file|mimes:pdf|max:2048',
          'jenis_berkas' => 'required|in:skck',
        ]);

        try {
          DB::beginTransaction();
            $skck = $request->file('skck');
            $filename = 'skck-' . IdtHelper::idtPelamar($pelamar->user->name) . '.' . $skck->getClientOriginalExtension();
            if ($pelamar->berkas->skck != null) File::delete(public_path('/berkas/skck/' . $pelamar->berkas->skck));
            $skck->move('berkas/skck/', $filename);
            $pelamar->berkas->update([ 'skck' => $filename, ]);
          DB::commit();
          return back()->withSuccess('Berkas SKCK berhasil diperbarui');
        } catch (\Throwable $th) {
          return back()->withError('Gagal! silahkan coba lagi!');
          DB::rollBack();
        }

      } else if ($request->jenis_berkas == 'sertifikat_keahlian') {
        $request->validate([
          'sertifikat_keahlian' => 'required|file|mimes:pdf|max:2048',
          'jenis_berkas' => 'required|in:sertifikat_keahlian',
        ]);

        try {
          DB::beginTransaction();
            $sertifikat_keahlian = $request->file('sertifikat_keahlian');
            $filename = 'sertifikat_keahlian-' . IdtHelper::idtPelamar($pelamar->user->name) . '.' . $sertifikat_keahlian->getClientOriginalExtension();
            if ($pelamar->berkas->sertifikat_keahlian != null) File::delete(public_path('/berkas/sertifikat_keahlian/' . $pelamar->berkas->sertifikat_keahlian));
            $sertifikat_keahlian->move('berkas/sertifikat_keahlian/', $filename);
            $pelamar->berkas->update([ 'sertifikat_keahlian' => $filename, ]);
          DB::commit();
          return back()->withSuccess('Berkas Sertifikat Keahlian Dll berhasil diperbarui');
        } catch (\Throwable $th) {
          return back()->withError('Gagal! silahkan coba lagi!');
          DB::rollBack();
        }
      } else {
        abort(404);
      }
    } elseif ($endpoint == 'alumni') { // UPDATE ALUMNI
      if ($pelamar->type != 'alumni') abort(404);
      $request->validate([
        'angkatan_id' => 'required|exists:angkatans,id',
        'jurusan_id' => 'required|exists:jurusans,id',
        'kegiatan_id' => 'required|exists:kegiatans,id',
        'relevan' => 'nullable',
        'pekerjaan' => 'nullable',
        'tahun_mulai' => 'nullable',
        'nama_dudi' => 'nullable',
        'bidang_dudi' => 'nullable',
        'alamat_dudi' => 'nullable',
        'penghasilan' => 'nullable',
      ]);

      try {
        DB::beginTransaction();
          $request['relevan'] = $request->relevan[0];
          $pelamar->alumni->update($request->all());
        DB::commit();
        return redirect(route('user.pelamar.edit', [$pelamar->idt, 'alumni']))->withSuccess('Data Tracer Alumni berhasil diperbarui!');
      } catch (\Throwable $th) {
        DB::rollBack();
        return back()->withInput()->withError('Gagal, silahkan coba lagi!');
      }
    } elseif ($endpoint == 'foto') {
      $request->validate([
        'avatar' => ['image', 'required'],
      ]);

      $avatar = $request->file('avatar');
      if ($request->hasFile('avatar')) {
        $filenameWithExtension      = $request->file('avatar')->getClientOriginalExtension();
        $filename                   = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
        $extension                  = $avatar->getClientOriginalExtension();
        $filenamesimpan             = 'img' . time() . '.' . $extension;
        $avatar->move('img/profile/', $filenamesimpan);

        $editdata = [
          'foto' => $filenamesimpan,
        ];

        $pelamar->user->update($editdata);
      }

      if ($request->old_foto != 'profile.jpg'){
        $filegambar = public_path('/img/profile/' . $request->old_foto);
        File::delete($filegambar);
      }
      return back()->withSuccess('Foto Pelamar berhasil diperbarui!');
    }
  }

  protected function updateData($request, $pelamar) {
    $request->validate([
      'name' => 'required',
      'tempatlahir' => 'nullable',
      'tanggallahir' => 'nullable|date',
      'telepon' => 'nullable',
      'alamat' => 'nullable',
      'type' => 'required',
      'jk' => 'nullable',
      'email' => 'required|unique:users,email,' . $pelamar->user_id,
      'password' => 'nullable',
      'is_aktif' => 'required',
      'nik' => 'nullable|numeric|unique:pelamars,nik,' . $pelamar->id,
      'pend_terakhir' => 'nullable',
      'jurusan_terakhir' => 'nullable',
      'tahun_lulus' => 'nullable',
    ]);

    try {
      DB::beginTransaction();
        filled($request->password)
          ? $pelamar->user->update($request->except('type', 'nik', 'pend_terakhir', 'jurusan_terakhir', 'tahun_lulus'))
          : $pelamar->user->update($request->except('type', 'password', 'nik', 'pend_terakhir', 'jurusan_terakhir', 'tahun_lulus'));
        $request['idt'] = IdtHelper::idtPelamar($request->name);
        $pelamar->update($request->only('idt', 'type', 'nik', 'pend_terakhir', 'jurusan_terakhir', 'tahun_lulus'));
      DB::commit();
      return redirect(route('user.pelamar.edit', [$pelamar->idt, 'data']))->withSuccess('Data Pelamar berhasil diperbarui!');
    } catch (\Throwable $th) {
      DB::rollBack();
      return back()->withInput()->withError('Gagal, silahkan coba lagi!');
    }
  }

  protected function updateAlumni($request, $pelamar) {
    $request->validate([
      'angkatan_id' => 'required|exists:angkatans,id',
      'jurusan_id' => 'required|exists:jurusans,id',
      'kegiatan_id' => 'required|exists:kegiatans,id',
      'relevan' => 'nullable',
      'pekerjaan' => 'nullable',
      'tahun_mulai' => 'nullable',
      'nama_dudi' => 'nullable',
      'bidang_dudi' => 'nullable',
      'alamat_dudi' => 'nullable',
      'penghasilan' => 'nullable',
    ]);

    try {
      DB::beginTransaction();
        $pelamar->alumni->update($request->all());
      DB::commit();
      return back()->withSuccess('Data Alumni berhasil diperbarui!');
    } catch (\Throwable $th) {
      DB::rollBack();
      return back()->withInput()->withError('Gagal, silahkan coba lagi!');
    }
  }

  protected function updateFoto($request, $pelamar) {

    $request->validate([
      'avatar' => ['image', 'required'],
    ]);

    $avatar = $request->file('avatar');
    if ($request->hasFile('avatar')) {
      $filenameWithExtension      = $request->file('avatar')->getClientOriginalExtension();
      $filename                   = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
      $extension                  = $avatar->getClientOriginalExtension();
      $filenamesimpan             = 'img' . time() . '.' . $extension;
      $avatar->move('img/profile/', $filenamesimpan);

      $editdata = [
        'foto' => $filenamesimpan,
      ];

      $pelamar->user->update($editdata);
    }

    if ($request->old_foto != 'profile.jpg'){
      $filegambar = public_path('/img/profile/' . $request->old_foto);
      File::delete($filegambar);
    }
    return back()->with([
      'success' => 'Foto profil berhasil diperbarui!',
      'foto' => 'active',
    ]);
  }

  public function updateRiwayatKerja(Request $request, RiwayatPekerjaan $riwayatkerja)
  {
    $validasi = Validator::make($request->all(),[
      'nama_dudi' => 'required',
      'mulai' => 'required|date',
      'selesai' => 'nullable|date',
      'posisi' => 'required',
    ]);

    if ($validasi->fails()) {
      return response()->json(['errors' => $validasi->errors()]);
    } else {
      try {
        DB::beginTransaction();
          $riwayatkerja->update($request->all());
        DB::commit();
        return response()->json(['success' => 'Riwayat Pekerjaan berhasil diperbarui']);

      } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['failed' => 'Terjadi kesalahan!']);
      }
    }
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pelamar  $pelamar
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pelamar $pelamar)
  {
    $pelamar->delete();
    return response()->json(['success' => 'Data berhasil dihapus!']);
  }

  public function destroyRiwayatKerja(RiwayatPekerjaan $riwayatkerja)
  {
    $riwayatkerja->delete();
    return response()->json(['success' => 'Data berhasil dihapus!']);
  }

  public function deleteFoto(Pelamar $pelamar) {
    if ($pelamar->user->foto != 'profile.jpg'){
      $filegambar = public_path('/img/profile/' . $pelamar->user->foto);
      File::delete($filegambar);
    }
    $pelamar->user->update(['foto' => 'profile.jpg']);
    return back()->withSuccess('Foto profil berhasil dihapus!');
  }

  public function destroyBerkas(Request $request, Pelamar $pelamar, $endpoint) {
    File::delete(public_path('/berkas/' . $endpoint . '/' . $pelamar->berkas->$endpoint));
    $pelamar->berkas->update([$endpoint => null]);
    return back()->withSuccess('Berkas tersebut berhasil dihapus!');
  }

  public function printBiodata(Pelamar $pelamar){
    $pdf = PDF::loadview('pages.users.pelamar.edit.print.biodata', [
      'pelamar' => $pelamar->load('user','alumni'),
    ])->setPaper('A4', 'Potrait');
    return $pdf->stream('BIODATA PELAMAR - ' . $pelamar->user->name . '.pdf' );
  }

  public function printAlumni(Pelamar $pelamar){
    if ($pelamar->type != 'alumni') abort(404);
    $pdf = PDF::loadview('pages.users.pelamar.edit.print.alumni', [
      'pelamar' => $pelamar->load('user','alumni'),
    ])->setPaper('A4', 'Potrait');
    return $pdf->stream('BUKTI TRACER - ' . $pelamar->user->name . '.pdf' );
  }
}
