@extends('layouts.admin.main')

@section('css')
  <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

  @include('layouts.admin.header-main',['title' => 'Data Lamaran', 'subtitle' => 'Index'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
      <div class="card card-flush">
        <div class="card-header mt-3">
          <div class="card-title">
            <h3 class="fw-bolder">Data Lamaran</h3>
          </div>
          <div class="card-toolbar">
            <div class="me-2">
              <a href="{{ route('manage.lamaran.print') }}" class="btn btn-primary btn-sm" target="_blank">
                Cetak
              </a>
            </div>
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

                    @can('adminsekolah')
                      <div class="mb-10">
                        <label class="form-label fw-bold">DU/DI:</label>
                        <div>
                          <select class="form-select form-select-solid" name="dudi_id" data-kt-select2="true" data-placeholder="Pilih..." data-dropdown-parent="#kt_menu_61484bf845268" data-allow-clear="true" id="dudi_id-select">
                            <option></option>
                            @foreach ($dudi as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    @endcan

                    <div class="mb-10">
                      <label class="form-label fw-bold">Status:</label>
                      <div>
                        <select class="form-select form-select-solid"  data-hide-search="true" name="status" data-kt-select2="true" data-placeholder="Pilih..." data-dropdown-parent="#kt_menu_61484bf845268" data-allow-clear="true" id="status-select">
                          <option></option>
                          @foreach ($master_status as $i => $item)
                            <option value="{{ $i }}">{{ $item }}</option>
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
                <th class="">Pelamar</th>
                <th class="">DU/DI</th>
                <th class="">Posisi</th>
                <th class="">Tanggal Melamar</th>
                <th class="">Tanggal Wawancara</th>
                <th class="">Status</th>
                <th class="min-w-100px">Aksi</th>
              </tr>
            </thead>
            <tbody class="ps-3">

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  {{-- Konfirmasi Update --}}
  <div class="modal fade" id="modal-update" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md ">
      <div class="modal-content">
          <div class="modal-header">
            <h2>Konfirmasi Update</h2>
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
            <div class="mt-2">
              <label class="form-label fw-bold">Status:</label>
              <div>
                <select class="form-select form-select-solid" name="status" data-kt-select2="false" data-placeholder="Pilih..." data-dropdown-parent="#modal-update" data-allow-clear="false" id="edit-status">
                  {{-- <option></option> --}}
                  @foreach ($master_status as $i => $item)
                    <option value="{{ $i }}">{{ $item }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="mt-4 mb-2 d-none" id="tanggal-div">
              <label class="form-label fw-bold">Tanggal Wawancara:</label>
              <div>
                <input type="date" name="tanggalwawancara" id="edit-tanggalwawancara" class="form-control form-control-md mb-3 mb-lg-0" value="" placeholder="Ketik Tanggal Wawancara">
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="reset" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-sm btn-primary" id="submit-update" data-kt-indicator="off">
                <span class="indicator-label">Update</span>
                <span class="indicator-progress">Diproses...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
          </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  @include('pages.manage.lamaran._indexscript')
@endsection
