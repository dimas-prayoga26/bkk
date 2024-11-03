@extends('pages.manage.pelamar.edit.index', ['subtitle' => 'Berkas'])

@section('profile')

<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
  <div class="card-header cursor-pointer">
    <div class="card-title m-0">
      <h3 class="fw-bolder m-0">Berkas</h3>
    </div>
  </div>
  <div class="card-body p-9 table-responsive">
    <table class="table align-middle table-striped table-hover fs-6 gy-2 mb-0" id="myTable">
      <thead>
        <tr class="text-start fw-bolder fs-7 text-uppercase gs-0 bg-dark text-white">
          <th class="ps-3">No.</th>
          <th class="">Keterangan</th>
          <th class="">Status</th>
          <th class="min-w-100px">Aksi</th>
        </tr>
      </thead>
      <tbody class="ps-3">
        {{-- SURAT LAMARAN --}}
        <tr>
          <td> 1. </td>
          <td> <span class="text-danger">(Wajib)</span> Surat Lamaran </td>
          <td>
            @if ($pelamar->berkas->surat_lamaran !== null)
              <span class="badge badge-sm badge-light-success">Sudah Diunggah</span>
            @else
              <span class="badge badge-sm badge-light-warning">Belum Diunggah</span>
            @endif
          </td>
          <td>
            <div class="btn-group">

              @if ($pelamar->berkas->surat_lamaran !== null)
                <a href="/berkas/surat_lamaran/{{ $pelamar->berkas->surat_lamaran }}" target="_blank" class="btn btn-sm btn-info px-4 mx-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                  </svg>
                  Download
                </a>
              @endif

              <button class="btn btn-sm btn-warning px-4 mx-1 btn-edit-riwayat-kerja" id="btn-edit-surat_lamaran">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
                Edit
              </button>

              @if ($pelamar->berkas->surat_lamaran !== null)
                <button type="button" class="btn btn-delete-berkas btn-sm btn-danger px-4 mx-1" data-action="/manage/pelamar/{{ $pelamar->idt }}/berkas/surat_lamaran" data-berkas="Berkas Surat Lamaran">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                  </svg>
                  Hapus
                </button>
              @endif

            </div>
          </td>

        </tr>
        {{-- CV --}}
        <tr>
          <td> 2. </td>
          <td> <span class="text-danger">(Wajib)</span> CV</td>
          <td>
            @if ($pelamar->berkas->cv !== null)
              <span class="badge badge-sm badge-light-success">Sudah Diunggah</span>
            @else
              <span class="badge badge-sm badge-light-warning">Belum Diunggah</span>
            @endif
          </td>
          <td>
            <div class="btn-group">

              @if ($pelamar->berkas->cv !== null)
                <a href="/berkas/cv/{{ $pelamar->berkas->cv }}" target="_blank" class="btn btn-sm btn-info px-4 mx-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                  </svg>
                  Download
                </a>
              @endif

              <button class="btn btn-sm btn-warning px-4 mx-1 btn-edit-riwayat-kerja" id="btn-edit-cv">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
                Edit
              </button>

              @if ($pelamar->berkas->cv !== null)
                <button type="button" class="btn btn-delete-berkas btn-sm btn-danger px-4 mx-1" data-action="/manage/pelamar/{{ $pelamar->idt }}/berkas/cv" data-berkas="Berkas CV">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                  </svg>
                  Hapus
                </button>
              @endif

            </div>
          </td>
        </tr>
        {{-- KTP --}}
        <tr>
          <td> 3. </td>
          <td> <span class="text-danger">(Wajib)</span> Foto atau scan KTP Asli </td>
          <td>
            @if ($pelamar->berkas->ktp !== null)
              <span class="badge badge-sm badge-light-success">Sudah Diunggah</span>
            @else
              <span class="badge badge-sm badge-light-warning">Belum Diunggah</span>
            @endif
          </td>
          <td>
            <div class="btn-group">

              @if ($pelamar->berkas->ktp !== null)
                <a href="/berkas/ktp/{{ $pelamar->berkas->ktp }}" target="_blank" class="btn btn-sm btn-info px-4 mx-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                  </svg>
                  Download
                </a>
              @endif

              <button class="btn btn-sm btn-warning px-4 mx-1 btn-edit-riwayat-kerja" id="btn-edit-ktp">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
                Edit
              </button>

              @if ($pelamar->berkas->ktp !== null)
                <button type="button" class="btn btn-delete-berkas btn-sm btn-danger px-4 mx-1" data-action="/manage/pelamar/{{ $pelamar->idt }}/berkas/ktp" data-berkas="Berkas KTP">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                  </svg>
                  Hapus
                </button>
              @endif

            </div>
          </td>
        </tr>
        {{-- IJAZAH --}}
        <tr>
          <td> 4. </td>
          <td> <span class="text-danger">(Wajib)</span> Foto atau scan Ijazah Terakhir </td>
          <td>
            @if ($pelamar->berkas->ijazah !== null)
              <span class="badge badge-sm badge-light-success">Sudah Diunggah</span>
            @else
              <span class="badge badge-sm badge-light-warning">Belum Diunggah</span>
            @endif
          </td>
          <td>
            <div class="btn-group">

              @if ($pelamar->berkas->ijazah !== null)
                <a href="/berkas/ijazah/{{ $pelamar->berkas->ijazah }}" target="_blank" class="btn btn-sm btn-info px-4 mx-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                  </svg>
                  Download
                </a>
              @endif

              <button class="btn btn-sm btn-warning px-4 mx-1 btn-edit-riwayat-kerja" id="btn-edit-ijazah">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
                Edit
              </button>

              @if ($pelamar->berkas->ijazah !== null)
                <button type="button" class="btn btn-delete-berkas btn-sm btn-danger px-4 mx-1" data-action="/manage/pelamar/{{ $pelamar->idt }}/berkas/ijazah" data-berkas="Berkas Ijazah">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                  </svg>
                  Hapus
                </button>
              @endif

            </div>
          </td>
        </tr>
        {{-- SKCK --}}
        <tr>
          <td> 5. </td>
          <td> <span class="text-danger">(Wajib)</span> Foto atau scan SKCK </td>
          <td>
            @if ($pelamar->berkas->skck !== null)
              <span class="badge badge-sm badge-light-success">Sudah Diunggah</span>
            @else
              <span class="badge badge-sm badge-light-warning">Belum Diunggah</span>
            @endif
          </td>
          <td>
            <div class="btn-group">

              @if ($pelamar->berkas->skck !== null)
                <a href="/berkas/skck/{{ $pelamar->berkas->skck }}" target="_blank" class="btn btn-sm btn-info px-4 mx-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                  </svg>
                  Download
                </a>
              @endif

              <button class="btn btn-sm btn-warning px-4 mx-1 btn-edit-riwayat-kerja" id="btn-edit-skck">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
                Edit
              </button>

              @if ($pelamar->berkas->skck !== null)
                <button type="button" class="btn btn-delete-berkas btn-sm btn-danger px-4 mx-1" data-action="/manage/pelamar/{{ $pelamar->idt }}/berkas/skck" data-berkas="Berkas SKCK">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                  </svg>
                  Hapus
                </button>
              @endif

            </div>
          </td>
        </tr>
        {{-- SERTIFIKAT PELATIHAN --}}
        <tr>
          <td> 6. </td>
          <td> <span class="text-primary">(Opsional)</span> Foto atau scan Sertifikat Keahlian, dll </td>
          <td>
            @if ($pelamar->berkas->sertifikat_keahlian !== null)
              <span class="badge badge-sm badge-light-success">Sudah Diunggah</span>
            @else
              <span class="badge badge-sm badge-light-warning">Belum Diunggah</span>
            @endif
          </td>
          <td>
            <div class="btn-group">

              @if ($pelamar->berkas->sertifikat_keahlian !== null)
                <a href="/berkas/sertifikat_keahlian/{{ $pelamar->berkas->sertifikat_keahlian }}" target="_blank" class="btn btn-sm btn-info px-4 mx-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                  </svg>
                  Download
                </a>
              @endif

              <button class="btn btn-sm btn-warning px-4 mx-1 btn-edit-riwayat-kerja" id="btn-edit-sertifikat_keahlian">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
                Edit
              </button>

              @if ($pelamar->berkas->sertifikat_keahlian !== null)
                <button type="button" class="btn btn-delete-berkas btn-sm btn-danger px-4 mx-1" data-action="/manage/pelamar/{{ $pelamar->idt }}/berkas/sertifikat_keahlian" data-berkas="Berkas Sertifikat Keahlian DLL">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                  </svg>
                  Hapus
                </button>
              @endif

            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

{{-- Edit KTP --}}
<div class="modal fade" id="modal-edit-ktp" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
          <h2>Edit Berkas KTP</h2>
          <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
            <span class="svg-icon svg-icon-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
              </svg>
            </span>
          </div>
        </div>
         <form action="{{ route('manage.pelamar.update', [$pelamar, 'berkas']) }}" method="POST" enctype="multipart/form-data" id="form-edit-ktp">
          @csrf
          @method('PUT')
            <div class="modal-body">
              <div class="d-flex flex-column mb-4 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2 required" for="ktp"> Unggah KTP <i class="ms-2">(Max 2 MB, PDF)</i> </label>
                <input type="hidden" name="jenis_berkas" id="jenis_berkas" value="ktp">
                <input type="file" class="form-control edit-field @error('ktp') is-invalid @enderror" name="ktp" id="edit-ktp" required>
                @error('ktp') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-primary submit-ktp" data-kt-indicator="off">
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress">
                  Diproses...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
              </button>
            </div>
         </form>
    </div>
  </div>
</div>

{{-- Edit Ijazah --}}
<div class="modal fade" id="modal-edit-ijazah" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
          <h2>Edit Berkas Ijazah</h2>
          <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
            <span class="svg-icon svg-icon-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
              </svg>
            </span>
          </div>
        </div>
         <form action="{{ route('manage.pelamar.update', [$pelamar, 'berkas']) }}" method="POST" enctype="multipart/form-data" id="form-edit-ijazah">
          @csrf
          @method('PUT')
            <div class="modal-body">
              <div class="d-flex flex-column mb-4 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2 required" for="ijazah"> Unggah Ijazah <i class="ms-2">(Max 2 MB, PDF)</i> </label>
                <input type="hidden" name="jenis_berkas" id="jenis_berkas" value="ijazah">
                <input type="file" class="form-control edit-field @error('ijazah') is-invalid @enderror" name="ijazah" id="edit-ijazah" required>
                @error('ijazah') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-primary submit-ijazah" data-kt-indicator="off">
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress">
                  Diproses...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
              </button>
            </div>
         </form>
    </div>
  </div>
</div>

{{-- Edit Surat Lamaran --}}
<div class="modal fade" id="modal-edit-surat_lamaran" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
          <h2>Edit Berkas Surat Lamaran</h2>
          <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
            <span class="svg-icon svg-icon-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
              </svg>
            </span>
          </div>
        </div>
         <form action="{{ route('manage.pelamar.update', [$pelamar, 'berkas']) }}" method="POST" enctype="multipart/form-data" id="form-edit-surat_lamaran">
          @csrf
          @method('PUT')
            <div class="modal-body">
              <div class="d-flex flex-column mb-4 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2 required" for="surat_lamaran"> Unggah Surat Lamaran <i class="ms-2">(Max 2 MB, PDF)</i> </label>
                <input type="hidden" name="jenis_berkas" id="jenis_berkas" value="surat_lamaran">
                <input type="file" class="form-control edit-field @error('surat_lamaran') is-invalid @enderror" name="surat_lamaran" id="edit-surat_lamaran" required>
                @error('surat_lamaran') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-primary submit-surat_lamaran" data-kt-indicator="off">
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress">
                  Diproses...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
              </button>
            </div>
         </form>
    </div>
  </div>
</div>

{{-- Edit CV --}}
<div class="modal fade" id="modal-edit-cv" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
          <h2>Edit Berkas CV</h2>
          <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
            <span class="svg-icon svg-icon-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
              </svg>
            </span>
          </div>
        </div>
         <form action="{{ route('manage.pelamar.update', [$pelamar, 'berkas']) }}" method="POST" enctype="multipart/form-data" id="form-edit-cv">
          @csrf
          @method('PUT')
            <div class="modal-body">
              <div class="d-flex flex-column mb-4 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2 required" for="cv"> Unggah CV <i class="ms-2">(Max 2 MB, PDF)</i> </label>
                <input type="hidden" name="jenis_berkas" id="jenis_berkas" value="cv">
                <input type="file" class="form-control edit-field @error('cv') is-invalid @enderror" name="cv" id="edit-cv" required>
                @error('cv') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-primary submit-cv" data-kt-indicator="off">
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress">
                  Diproses...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
              </button>
            </div>
         </form>
    </div>
  </div>
</div>

{{-- Edit SKCK --}}
<div class="modal fade" id="modal-edit-skck" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
          <h2>Edit Berkas SKCK</h2>
          <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
            <span class="svg-icon svg-icon-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
              </svg>
            </span>
          </div>
        </div>
         <form action="{{ route('manage.pelamar.update', [$pelamar, 'berkas']) }}" method="POST" enctype="multipart/form-data" id="form-edit-skck">
          @csrf
          @method('PUT')
            <div class="modal-body">
              <div class="d-flex flex-column mb-4 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2 required" for="skck"> Unggah SKCK <i class="ms-2">(Max 2 MB, PDF)</i> </label>
                <input type="hidden" name="jenis_berkas" id="jenis_berkas" value="skck">
                <input type="file" class="form-control edit-field @error('skck') is-invalid @enderror" name="skck" id="edit-skck" required>
                @error('skck') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-primary submit-skck" data-kt-indicator="off">
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress">
                  Diproses...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
              </button>
            </div>
         </form>
    </div>
  </div>
</div>

{{-- Edit Sertifikat Keahlian, Dll --}}
<div class="modal fade" id="modal-edit-sertifikat_keahlian" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
          <h2>Edit Berkas Sertifikat Keahlian, Dll</h2>
          <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
            <span class="svg-icon svg-icon-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
              </svg>
            </span>
          </div>
        </div>
         <form action="{{ route('manage.pelamar.update', [$pelamar, 'berkas']) }}" method="POST" enctype="multipart/form-data" id="form-edit-sertifikat_keahlian">
          @csrf
          @method('PUT')
            <div class="modal-body">
              <div class="d-flex flex-column mb-4 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2 required" for="sertifikat_keahlian"> Unggah Sertifikat Keahlian, Dll <i class="ms-2">(Max 2 MB, PDF)</i> </label>
                <input type="hidden" name="jenis_berkas" id="jenis_berkas" value="sertifikat_keahlian">
                <input type="file" class="form-control edit-field @error('sertifikat_keahlian') is-invalid @enderror" name="sertifikat_keahlian" id="edit-sertifikat_keahlian" required>
                @error('sertifikat_keahlian') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-primary submit-sertifikat_keahlian" data-kt-indicator="off">
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress">
                  Diproses...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
              </button>
            </div>
         </form>
    </div>
  </div>
</div>

{{-- HAPUS BERKAS --}}
<div class="modal fade" id="modal-delete" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md ">
    <div class="modal-content">
        <div class="modal-header">
          <h2>Konfirmasi Hapus</h2>
          <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
            <span class="svg-icon svg-icon-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
              </svg>
            </span>
          </div>
        </div>
        <div class="modal-body">
          Data: <span class="text-danger" id="delete-name"></span>
          <br>
          Apakah anda yakin akan menghapus berkas tersebut?
        </div>
        <div class="modal-footer justify-content-between">
          <button type="reset" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Batal</button>
          <form action="" id="form-delete-berkas" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger submit-delete-berkas"data-kt-indicator="off">
              <span class="indicator-label">Hapus</span>
              <span class="indicator-progress">Diproses...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
          </form>
        </div>
    </div>
  </div>
</div>

@endsection

@section('js')
  {{-- HAPUS BERKAS --}}
  <script>
      $('.btn-delete-berkas').on('click', function () {
          $('#form-delete-berkas').attr('action', $(this).data('action'));
          $('#modal-delete').modal('show');
          $('#delete-name').html($(this).data('berkas'));
      });
     $('#form-delete-berkas').on('submit', function(){
        $('.submit-delete-berkas').attr("data-kt-indicator", "on");
        $('.submit-delete-berkas').attr("disabled", true);
    });
  </script>

  {{-- KTP --}}
  <script>
    $('#btn-edit-ktp').on('click', function(){
      $('#modal-edit-ktp').modal('show');
    });
    $('#form-edit-ktp').on('submit', function(){
      $('.submit-ktp').attr("data-kt-indicator", "on");
      $('.submit-ktp').attr("disabled", true);
    });
  </script>
  @if ($errors->has('ktp'))
    <script>
      $(document).ready(function () {
        $('#modal-edit-ktp').modal('show');
      });
    </script>
  @endif

  {{-- Ijazah --}}
  <script>
    $('#btn-edit-ijazah').on('click', function(){
      $('#modal-edit-ijazah').modal('show');
    });
    $('#form-edit-ijazah').on('submit', function(){
      $('.submit-ijazah').attr("data-kt-indicator", "on");
      $('.submit-ijazah').attr("disabled", true);
    });
  </script>
  @if ($errors->has('ijazah'))
    <script>
      $(document).ready(function () {
        $('#modal-edit-ijazah').modal('show');
      });
    </script>
  @endif

  {{-- Surat Lamaran --}}
  <script>
    $('#btn-edit-surat_lamaran').on('click', function(){
      $('#modal-edit-surat_lamaran').modal('show');
    });
    $('#form-edit-surat_lamaran').on('submit', function(){
      $('.submit-surat_lamaran').attr("data-kt-indicator", "on");
      $('.submit-surat_lamaran').attr("disabled", true);
    });
  </script>
  @if ($errors->has('surat_lamaran'))
    <script>
      $(document).ready(function () {
        $('#modal-edit-surat_lamaran').modal('show');
      });
    </script>
  @endif

  {{-- CV --}}
  <script>
    $('#btn-edit-cv').on('click', function(){
      $('#modal-edit-cv').modal('show');
    });
    $('#form-edit-cv').on('submit', function(){
      $('.submit-cv').attr("data-kt-indicator", "on");
      $('.submit-cv').attr("disabled", true);
    });
  </script>
  @if ($errors->has('cv'))
    <script>
      $(document).ready(function () {
        $('#modal-edit-cv').modal('show');
      });
    </script>
  @endif

  {{-- SKCK --}}
  <script>
    $('#btn-edit-skck').on('click', function(){
      $('#modal-edit-skck').modal('show');
    });
    $('#form-edit-skck').on('submit', function(){
      $('.submit-skck').attr("data-kt-indicator", "on");
      $('.submit-skck').attr("disabled", true);
    });
  </script>
  @if ($errors->has('skck'))
    <script>
      $(document).ready(function () {
        $('#modal-edit-skck').modal('show');
      });
    </script>
  @endif

  {{-- Sertifikat Keahlian --}}
  <script>
    $('#btn-edit-sertifikat_keahlian').on('click', function(){
      $('#modal-edit-sertifikat_keahlian').modal('show');
    });
    $('#form-edit-sertifikat_keahlian').on('submit', function(){
      $('.submit-sertifikat_keahlian').attr("data-kt-indicator", "on");
      $('.submit-sertifikat_keahlian').attr("disabled", true);
    });
  </script>
  @if ($errors->has('sertifikat_keahlian'))
    <script>
      $(document).ready(function () {
        $('#modal-edit-sertifikat_keahlian').modal('show');
      });
    </script>
  @endif


@endsection
