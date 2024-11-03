@extends('layouts.admin.main')

@section('css')
  <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

  @include('layouts.admin.header-main',['title' => 'Data Admin', 'subtitle' => 'Index'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
      <div class="card card-flush">
        <div class="card-header mt-3">
          <div class="card-title">
            <h3 class="fw-bolder">Data Admin</h3>
          </div>
          <div class="card-toolbar">

            {{-- Create --}}
            <a href="{{ route('manage.admin.create') }}" class="btn btn-sm btn-flex btn-primary fw-bolder px-4">
              <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                  <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                  <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                </svg>
              </span>
              Tambah
            </a>

            {{-- Filter --}}
            <div class="">
              <a href="#" class="btn btn-sm btn-flex btn-info fw-bolder px-4 ms-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                  </svg>
                </span>
                Filter
              </a>
              <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_61484bf845268">
                <div class="px-7 py-5">
                  <div class="fs-5 text-dark fw-bolder">Opsi Filter</div>
                </div>
                <div class="separator border-gray-200"></div>
                <div class="px-7 py-5">

                    <div class="mb-10">
                      <label class="form-label fw-bold">Jenis Admin:</label>
                      <div>
                        <select class="form-select form-select-solid" data-hide-search="true" name="type" data-kt-select2="true" data-placeholder="Pilih..." data-dropdown-parent="#kt_menu_61484bf845268" data-allow-clear="true" id="type-select">
                          <option></option>
                          @foreach (['sekolah','dudi'] as $item)
                            <option value="{{ $item }}" >{{ $item == 'sekolah' ? 'Admin Sekolah' : 'Admin DU/DI' }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="mb-10">
                      <label class="form-label fw-bold">Status Akun:</label>
                      <div>
                        <select class="form-select form-select-solid"  data-hide-search="true" name="select_id" data-kt-select2="true" data-placeholder="Pilih..." data-dropdown-parent="#kt_menu_61484bf845268" data-allow-clear="true" id="is_aktif-select">
                          <option></option>
                          @foreach (['1','0'] as $item)
                            <option value="{{ $item }}" >{{ $item == '1' ? 'Aktif' : 'Non-Aktif' }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="d-flex justify-content-end">
                      <button type="button" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true" id="filter-submit">Terapkan</button>
                    </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="card-body pt-0 table-responsive">
          <table class="table align-middle table-striped table-hover fs-6 gy-2 mb-0" id="myTable">
            <thead>
              <tr class="text-start fw-bolder fs-7 text-uppercase gs-0 bg-dark text-white">
                <th class="ps-3">No.</th>
                <th class="">Nama Admin</th>
                <th class="">Email</th>
                <th class="">Jenis</th>
                <th class="">DU/DI</th>
                <th class="">Status Akun</th>
                <th class="min-w-100px">Aksi</th>
              </tr>
            </thead>
            <tbody class="ps-3">
              {{-- @foreach ($admin as $item)
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
@endsection

@section('js')
  @include('pages.manage.admin._indexscript')
@endsection
