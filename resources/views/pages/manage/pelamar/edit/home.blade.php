@extends('pages.manage.pelamar.edit.index', ['subtitle' => 'Detail'])

@section('profile')

<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
  <div class="card-header cursor-pointer">
    <div class="card-title m-0">
      <h3 class="fw-bolder m-0">Detail Profil</h3>
    </div>
  </div>
  <div class="card-body">
    <div class="d-flex flex-stack fs-4 py-3">
      <div class="fw-bolder rotate collapsible collapsed" data-bs-toggle="collapse" href="#detail_data" role="button" aria-expanded="false" aria-controls="detail_data">Detail Data Diri
      <span class="ms-2 rotate-180">
        <span class="svg-icon svg-icon-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
          </svg>
        </span>
      </span></div>
      @can('adminsekolah')
        <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
          <a href="{{ route('manage.pelamar.edit', [$pelamar, 'data']) }}" class="btn btn-sm btn-primary">Edit</a>
        </span>
      @endcan
    </div>
    <div class="separator"></div>
    <div id="detail_data" class="collapse">
      <div class="pb-5 fs-6">

        <div class="fw-bolder mt-5">Status Akun</div>
        <div class="text-gray-600">{!! $pelamar->user->is_aktif() ?? '-'  !!}</div>

        <div class="fw-bolder mt-5">Email</div>
        <div class="text-gray-600">{{ $pelamar->user->email ?? '-' }}</div>

        <div class="fw-bolder mt-5">NIK</div>
        <div class="text-gray-600">{{ $pelamar->nik ?? '-' }}</div>

        <div class="fw-bolder mt-5">Jenis Kelamin</div>
        <div class="text-gray-600">{{ $pelamar->user->jk == 'l' ? 'Laki-Laki' : 'Perempuan' }}</div>

        <div class="fw-bolder mt-5">Tempat Lahir</div>
        <div class="text-gray-600">{{ $pelamar->user->tempatlahir ?? '-' }}</div>

        <div class="fw-bolder mt-5">Tanggal Lahir</div>
        <div class="text-gray-600">{{ $pelamar->tanggallahir != null ? \Carbon\Carbon::parse($pelamar->user->tanggallahir)->isoFormat('D MMMM YYYY') : '-' }}</div>

        <div class="fw-bolder mt-5">Telepon/WA</div>
        <div class="text-gray-600">{{ $pelamar->user->telepon ?? '-' }}</div>

        <div class="fw-bolder mt-5">Alamat</div>
        <div class="text-gray-600">{{ $pelamar->user->alamat ?? '-' }}</div>

        <div class="fw-bolder mt-5">Pendidikan Terakhir</div>
        <div class="text-gray-600">{{ $pelamar->pend_terakhir ?? '-' }}</div>

        <div class="fw-bolder mt-5">Jurusan Terakhir</div>
        <div class="text-gray-600">{{ $pelamar->jurusan_terakhir ?? '-' }}</div>

        <div class="fw-bolder mt-5">Tahun Lulus</div>
        <div class="text-gray-600">{{ $pelamar->tahun_lulus ?? '-' }}</div>

      </div>
    </div>

    {{-- Riwayat Kerja --}}
    <div class="d-flex flex-stack fs-4 py-3 mt-3">
      <div class="fw-bolder rotate collapsible collapsed" data-bs-toggle="collapse" href="#detail_riwayat_kerja" role="button" aria-expanded="false" aria-controls="detail_riwayat_kerja">Detail Riwayat Kerja
      <span class="ms-2 rotate-180">
        <span class="svg-icon svg-icon-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
          </svg>
        </span>
      </span></div>
      @can('adminsekolah')
        <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
          <a href="{{ route('manage.pelamar.edit', [$pelamar, 'riwayatkerja']) }}" class="btn btn-sm btn-primary">Edit</a>
        </span>
      @endcan
    </div>
    <div class="separator"></div>
    <div id="detail_riwayat_kerja" class="collapse">
      <div class="pb-5 fs-6 table-responsive">
        @if ($riwayat->count() < 1)
          <div class="mb-3"></div>
          <span class="">Belum memiliki Riwayat Pekerjaan</span>
        @else
          <table class="table align-middle table-striped table-hover fs-6 gy-2 mb-0" id="riwayat-kerja-table">
            <thead>
              <tr class="text-start fw-bolder fs-7 text-uppercase gs-0 bg-dark text-white">
                <th class="ps-3">No.</th>
                <th class="">Nama DU/DI</th>
                <th class="">Mulai</th>
                <th class="">Selesai</th>
                <th class="">Jabatan</th>
              </tr>
            </thead>
            <tbody class="ps-3">
              @foreach ($riwayat as $item)
                <tr class="border-bottom">
                  <td class="ps-3">{{ $loop->iteration }}</td>
                  <td>{{ $item->nama_dudi }}</td>
                  <td>{{ date("d-m-Y", strtotime($item->mulai)) }}</td>
                  <td>{{ $item->selesai != null ? date("d-m-Y", strtotime($item->selesai)) : '-' }}</td>
                  <td>{{ $item->posisi }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @endif
      </div>
    </div>

    {{-- Berkas --}}
    <div class="d-flex flex-stack fs-4 py-3 mt-3">
      <div class="fw-bolder rotate collapsible collapsed" data-bs-toggle="collapse" href="#detail_berkas" role="button" aria-expanded="false" aria-controls="detail_berkas">Detail Berkas
      <span class="ms-2 rotate-180">
        <span class="svg-icon svg-icon-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
          </svg>
        </span>
      </span></div>
      @can('adminsekolah')
        <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
          <a href="{{ route('manage.pelamar.edit', [$pelamar, 'berkas']) }}" class="btn btn-sm btn-primary">Edit</a>
        </span>
      @endcan
    </div>
    <div class="separator"></div>
    <div id="detail_berkas" class="collapse">
      <div class="pb-5 fs-6">
        <div class="fw-bolder mt-5">Surat Lamaran</div>
        <div class="text-gray-600">
          @if ($pelamar->berkas->surat_lamaran == null)
            -
          @else
            <a href="/berkas/surat_lamaran/{{ $pelamar->berkas->surat_lamaran }}" target="_blank">Download</a>
            @endif
        </div>
      </div>
      <div class="pb-5 fs-6">
        <div class="fw-bolder mt-5">CV</div>
        <div class="text-gray-600">
          @if ($pelamar->berkas->cv == null)
            -
          @else
            <a href="/berkas/cv/{{ $pelamar->berkas->cv }}" target="_blank">Download</a>
            @endif
        </div>
      </div>
      <div class="pb-5 fs-6">
        <div class="fw-bolder mt-5">Foto atau scan KTP Asli</div>
        <div class="text-gray-600">
          @if ($pelamar->berkas->ktp == null)
            -
          @else
            <a href="/berkas/ktp/{{ $pelamar->berkas->ktp }}" target="_blank">Download</a>
            @endif
        </div>
      </div>
      <div class="pb-5 fs-6">
        <div class="fw-bolder mt-5">Foto atau scan Ijazah Terakhir</div>
        <div class="text-gray-600">
          @if ($pelamar->berkas->ijazah == null)
            -
          @else
            <a href="/berkas/ijazah/{{ $pelamar->berkas->ijazah }}" target="_blank">Download</a>
            @endif
        </div>
      </div>
      <div class="pb-5 fs-6">
        <div class="fw-bolder mt-5"> Foto atau scan SKCK</div>
        <div class="text-gray-600">
          @if ($pelamar->berkas->skck == null)
            -
          @else
            <a href="/berkas/skck/{{ $pelamar->berkas->skck }}" target="_blank">Download</a>
            @endif
        </div>
      </div>
      <div class="pb-5 fs-6">
        <div class="fw-bolder mt-5">Foto atau scan Sertifikat Keahlian, dll</div>
        <div class="text-gray-600">
          @if ($pelamar->berkas->sertifikat_keahlian == null)
            -
          @else
            <a href="/berkas/sertifikat_keahlian/{{ $pelamar->berkas->sertifikat_keahlian }}" target="_blank">Download</a>
            @endif
        </div>
      </div>
    </div>

    {{-- Tracer Alumni --}}
    @if ($pelamar->type == 'alumni' && $pelamar->alumni)
      <div class="d-flex flex-stack fs-4 py-3 mt-3">
        <div class="fw-bolder rotate collapsible collapsed" data-bs-toggle="collapse" href="#detail_alumni" role="button" aria-expanded="false" aria-controls="detail_alumni">Detail Tracer Alumni
        <span class="ms-2 rotate-18 0">
          <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
            </svg>
          </span>
        </span></div>
        @can('adminsekolah')
          <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
            <a href="{{ route('manage.pelamar.edit', [$pelamar, 'alumni']) }}" class="btn btn-sm btn-primary">Edit</a>
          </span>
        @endcan
      </div>
      <div class="separator"></div>
      <div id="detail_alumni" class="collapse">
        <div class="pb-5 fs-6">

          <div class="fw-bolder mt-5">Tahun Angkatan</div>
          <div class="text-gray-600">{{ $pelamar->alumni->angkatan->tahun ?? '-' }}</div>

          <div class="fw-bolder mt-5">Jurusan/Prodi</div>
          <div class="text-gray-600">{{ $pelamar->alumni->jurusan->name ?? '-' }}</div>

          <div class="fw-bolder mt-5">Kegiatan Saat Ini</div>
          <div class="text-gray-600">{{ $pelamar->alumni->kegiatan->name ?? '-' }}</div>

          <div class="fw-bolder mt-5">Pekerjaan Saat Ini</div>
          <div class="text-gray-600">{{ $pelamar->alumni->pekerjaan ?? '-' }}</div>

          <div class="fw-bolder mt-5">Relevansi dengan Jurusan/Prodi</div>
          <div class="text-gray-600">{{ $pelamar->alumni->pekerjaan == 1 ? 'Ya, Relevan' : 'Tidak Relevan' }}</div>

          <div class="fw-bolder mt-5">Tahun Mulai Bekerja</div>
          <div class="text-gray-600">{{ $pelamar->alumni->tahun_mulai ?? '-' }}</div>

          <div class="fw-bolder mt-5">Nama DU/DI</div>
          <div class="text-gray-600">{{ $pelamar->alumni->nama_dudi ?? '-' }}</div>

          <div class="fw-bolder mt-5">Bidang DU/DI</div>
          <div class="text-gray-600">{{ $pelamar->alumni->bidang_dudi ?? '-' }}</div>

          <div class="fw-bolder mt-5">Alamat DU/DI</div>
          <div class="text-gray-600">{{ $pelamar->alumni->alamat_dudi ?? '-' }}</div>

          <div class="fw-bolder mt-5">Penghasilan/Pendapatan</div>
          <div class="text-gray-600">{{ $pelamar->alumni->penghasilan ?? '-' }}</div>

        </div>
      </div>
    @endif

    @can('adminsekolah')
      {{-- Riwayat Lamaran --}}
      <div class="d-flex flex-stack fs-4 py-3 mt-3">
        <div class="fw-bolder rotate collapsible collapsed" data-bs-toggle="collapse" href="#riwayat_lamaran" role="button" aria-expanded="false" aria-controls="riwayat_lamaran">Riwayat Lamaran
          <span class="ms-2 rotate-180">
            <span class="svg-icon svg-icon-3">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
              </svg>
            </span>
          </span>
        </div>
      </div>
      <div class="separator"></div>
      <div id="riwayat_lamaran" class="collapse">
        <div class="pb-5 fs-6 table-responsive">
          @if ($riwayatLamaran->count() < 1)
            <div class="mb-3"></div>
            <span class="">Belum memiliki Riwayat Lamaran</span>
          @else
            <table class="table align-middle table-striped table-hover fs-6 gy-2 mb-0" id="riwayat-lamaran-table">
              <thead>
                <tr class="text-start fw-bolder fs-7 text-uppercase gs-0 bg-dark text-white">
                  <th class="ps-3">No.</th>
                  <th class="">DU/DI</th>
                  <th class="">Posisi</th>
                  <th class="">Tanggal Melamar</th>
                  <th class="">Status</th>
                  <th class="">Tanggal Wawancara</th>
                  <th class="">Detail</th>
                </tr>
              </thead>
              <tbody class="ps-3">
                @foreach ($riwayatLamaran as $item)
                  <tr class="border-bottom">
                    <td class="ps-3">{{ $loop->iteration }}</td>
                    <td>{{ $item->loker->dudi->name }}</td>
                    <td>{{ $item->loker->posisi }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM YYYY') }}</td>
                    <td>
                      @if ($item->status == 'belum')
                        <span class="badge badge-sm badge-warning">BELUM DIVERIFIKASI</span>
                      @elseif ($item->status == 'proses')
                        <span class="badge badge-sm badge-primary">DIPROSES</span>
                      @elseif ($item->status == 'lolos')
                        <span class="badge badge-sm badge-success">LOLOS VERIFIKASI</span>
                      @elseif ($item->status == 'tidaklolos')
                        <span class="badge badge-sm badge-danger">TIDAK LOLOS</span>
                      @elseif ($item->status == 'wawancara')
                        <span class="badge badge-sm badge-info">WAWANCARA</span>
                      @endif
                    </td>
                    <td>{{ $item->status == 'wawancara' && $item->tanggalwawancara != null ? \Carbon\Carbon::parse($item->tanggalwawancara)->isoFormat('D MMMM YYYY') : '-' }}</td>
                    <td>
                      <a href="{{ route('manage.loker.show', $item->loker->idt) }}" class="btn btn-sm btn-success btn-show px-4 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                          <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @endif
        </div>
      </div>
    @endcan

  </div>
</div>

@endsection
