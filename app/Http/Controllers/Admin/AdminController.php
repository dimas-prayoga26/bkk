<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Dudi;
use App\Models\User;
use Illuminate\Database\Console\DumpCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $admin = Admin::notdelete();

    if ($request->type) $admin->where('type', $request->type);
    if ($request->is_aktif !== null) {
      $isAktif = $request->is_aktif === '1' ? true : false;
      $admin->whereHas('user', fn($q) => $q->where('is_aktif', $isAktif));
    }

    if ($request->ajax()) {
      return DataTables::of($admin->with(['user','dudi']))->addIndexColumn()
                       ->editColumn('user.name', fn($data) => $data->user->name)
                       ->editColumn('user.email', fn($data) => $data->user->email)
                       ->editColumn('dudi.name', fn($data) => $data->dudi && $data->type == 'dudi' ? $data->dudi->name : '-')
                       ->editColumn('type', fn($data) => $data->type == 'sekolah' ? 'Admin Sekolah' : 'Admin DU/DI')
                       ->editColumn('user.is_aktif', function($data){
                          return ($data->user->is_aktif == true)
                            ? '<span class="badge badge-sm badge-success">AKTIF</span>'
                            : '<span class="badge badge-sm badge-danger">NON-AKTIF</span>';
                          })
                       ->addColumn('aksi', fn($data) => view('pages.manage.admin.aksi', compact('data')))
                       ->rawColumns(['user.is_aktif'])
                       ->make(true);
      }
    return view('pages.manage.admin.index',[
      'admin' => $admin,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('pages.manage.admin.create',[
        'dudi' => Dudi::notdelete()->select('id','name')->get()
      ]);
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
      'tempatlahir' => 'nullable',
      'tanggallahir' => 'nullable|date',
      'telepon' => 'nullable',
      'alamat' => 'nullable',
      'type' => 'required',
      'jk' => 'nullable',
      'email' => 'required|unique:users',
      'password' => 'required',
      'dudi_id' => $request->type == 'dudi' ? 'required|exists:dudis,id' : 'nullable',
    ]);

    try {
      DB::beginTransaction();
        $request['role'] = 'admin';
        $user = User::create($request->except('type','dudi_id'));
        $request['user_id'] = $user->id;
        Admin::create($request->only('type', 'user_id', 'dudi_id'));
      DB::commit();
      return redirect(route('manage.admin.index'))->withSuccess('Data Admin berhasil ditambahkan!');
    } catch (\Throwable $th) {
      DB::rollBack();
      return back()->withInput()->withError('Gagal, silahkan coba lagi!');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function show(Admin $admin)
  {
    // return view('pages.manage.admin.show',[
    //   'admin' => $admin,
    // ]);
    abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function edit(Admin $admin)
  {
    return view('pages.manage.admin.edit',[
      'admin' => $admin->load('user'),
      'dudi' => Dudi::notdelete()->get()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Admin $admin)
  {
    $request->validate([
      'name' => 'required',
      'tempatlahir' => 'nullable',
      'tanggallahir' => 'nullable|date',
      'telepon' => 'nullable',
      'alamat' => 'nullable',
      'type' => 'required',
      'jk' => 'nullable',
      'email' => 'required|unique:users,email,' . $admin->user_id,
      'password' => 'nullable',
      'is_aktif' => 'required',
      'dudi_id' => $request->type == 'dudi' ? 'required|exists:dudis,id' : 'nullable',
    ]);

    try {
      DB::beginTransaction();
        filled($request->password)
          ? $admin->user->update($request->except('type','dudi_id'))
          : $admin->user->update($request->except('type','dudi_id', 'password'));
        $admin->update($request->only('type', 'dudi_id'));
      DB::commit();
      return redirect(route('manage.admin.index'))->withSuccess('Data Admin berhasil diperbarui!');
    } catch (\Throwable $th) {
      DB::rollBack();
      return back()->withInput()->withError('Gagal, silahkan coba lagi!');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function destroy(Admin $admin)
  {
    $admin->deleteData();
    return response()->json(['success' => 'Data berhasil dihapus!']);
  }
}
