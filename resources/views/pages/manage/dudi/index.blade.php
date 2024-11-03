@extends('layouts.admin.main')

@section('css')
  <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

  @include('layouts.admin.header-main',['title' => 'Data DU/DI', 'subtitle' => 'Index'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
      <div class="card card-flush">
        <div class="card-header mt-3">
          <div class="card-title">
            <h3 class="fw-bolder">Data DU/DI</h3>
          </div>
          <div class="card-toolbar">

            {{-- Create --}}
            @can('adminsekolah')
              <a href="{{ route('manage.dudi.create') }}" class="btn btn-sm btn-flex btn-primary fw-bolder px-4">
                <span class="svg-icon svg-icon-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                  </svg>
                </span>
                Tambah
              </a>
            @endcan

          </div>
        </div>
        <div class="card-body pt-0 table-responsive">
          <table class="table align-middle table-striped table-hover fs-6 gy-2 mb-0" id="myTable">
            <thead>
              <tr class="text-start fw-bolder fs-7 text-uppercase gs-0 bg-dark text-white">
                <th class="ps-3">No.</th>
                <th class="">DU/DI</th>
                <th class="">Email</th>
                <th class="">Telepon</th>
                <th class="">Kota</th>
                <th class="">Alamat</th>
                <th class="">Kerjasama</th>
                <th class="min-w-100px">Aksi</th>
              </tr>
            </thead>
            <tbody class="ps-3">
              {{-- @foreach ($dudi as $item)
                <tr class="border-bottom">
                  <td class="ps-3">{{ $loop->iteration }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->role->name }}</td>
                  <td class="">
                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                      Aksi
                      <span class="svg-icon svg-icon-5 m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                        </svg>
                      </span>
                    </a>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                      <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-id="{{ $item->id }}">Show</a>
                      </div>
                      <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3 btn-edit" data-id="{{ $item->id }}">Edit</a>
                      </div>
                      <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3 btn-delete" data-name="{{ $item->name }}" data-id="{{ $item->id }}">Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach --}}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  {{-- Konfirmasi Hapus --}}
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
            Apakah anda yakin akan menghapus data tersebut?
          </div>
          <div class="modal-footer justify-content-between">
            <button type="reset" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-sm btn-danger" id="submit-delete" data-kt-indicator="off">
                <span class="indicator-label">Hapus</span>
                <span class="indicator-progress">Diproses...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
          </div>
      </div>
    </div>
  </div>

  {{-- Show DU/DI --}}
  <div class="modal fade" id="modal-show" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md ">
      <div class="modal-content">
          <div class="modal-header">
            <h2>Detail DU/DI</h2>
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
            <h1 id="show-dudi-name"></h1>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-sm btn-secondary me-3 float-end" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
  @include('pages.manage.dudi._indexscript')
@endsection
