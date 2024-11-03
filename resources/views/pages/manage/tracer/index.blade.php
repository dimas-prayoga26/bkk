@extends('layouts.admin.main')

@section('css')
  <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

  @include('layouts.admin.header-main',['title' => 'Data Tracer Alumni', 'subtitle' => 'Index'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
      <div class="card card-flush">
        <div class="card-header mt-3">
          <div class="card-title">
            <h3 class="fw-bolder">Data Tracer Alumni</h3>
          </div>
          <div class="card-toolbar">
            <div class="me-2">
              <a href="{{ route('manage.tracer.print') }}" class="btn btn-primary btn-sm" target="_blank">
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

                    <div class="mb-10">
                      <label class="form-label fw-bold">Angkatan:</label>
                      <div>
                        <select class="form-select form-select-solid" name="angkatan" data-kt-select2="true" data-placeholder="Pilih..." data-dropdown-parent="#kt_menu_61484bf845268" data-allow-clear="true" id="angkatan-select">
                          <option></option>
                          @foreach ($angkatan as $item)
                            <option value="{{ $item->id }}">{{ $item->tahun }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="mb-10">
                      <label class="form-label fw-bold">Jurusan:</label>
                      <div>
                        <select class="form-select form-select-solid" name="jurusan" data-kt-select2="true" data-placeholder="Pilih..." data-dropdown-parent="#kt_menu_61484bf845268" data-allow-clear="true" id="jurusan-select">
                          <option></option>
                          @foreach ($jurusan as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="mb-10">
                      <label class="form-label fw-bold">Kegiatan:</label>
                      <div>
                        <select class="form-select form-select-solid" name="kegiatan" data-kt-select2="true" data-placeholder="Pilih..." data-dropdown-parent="#kt_menu_61484bf845268" data-allow-clear="true" id="kegiatan-select">
                          <option></option>
                          @foreach ($kegiatan as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                <th class="">Nama</th>
                <th class="">Angkatan</th>
                <th class="">Jurusan</th>
                <th class="">Kegiatan</th>
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

  <div class="post d-flex flex-column-fluid mt-6" id="stats">
    <div id="stats" class="container-xxl">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-xl-stretch mb-xl-8">
            <div class="card-header border-0 pt-5">
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Jumlah Keterserapan</span>
                <span class="text-muted fw-bold fs-7">{{ request('angkatan_id') != null ? 'Angkatan Tahun ' . $angkatan->where('id', request('angkatan_id'))->first()->tahun : 'Semua Angkatan' }}</>
              </h3>
              <div class="card-toolbar">
                <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                  <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                        <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                        <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                        <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                      </g>
                    </svg>
                  </span>
                </button>
                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_61484c42e354c">
                  <div class="px-7 py-5">
                    <div class="fs-5 text-dark fw-bolder">Filter Tahun Angkatan</div>
                  </div>
                  <div class="separator border-gray-200"></div>
                  <div class="px-7 py-5">
                    <div class="mb-10">
                      <label class="form-label fw-bold">Tahun Angkatan:</label>
                      <div>
                        <select class="form-select form-select-solid" id="stats-angkatan_id-select" data-kt-select2="true" data-placeholder="Pilih" data-dropdown-parent="#kt_menu_61484c42e354c" data-allow-clear="true" >
                          <option></option>
                          <option value=" ">Semua</option>
                          @foreach ($angkatan as $item)
                          <option value="{{ $item->id }}" {{ request('angkatan_id') == $item->id ? 'selected' : '' }}>{{ $item->tahun }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end">
                      <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                      <button type="button" id="submit-filter-stats" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Terapkan</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div id="kt_charts_widget_1_chart" style="height: 350px"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-9">
              <div class="fs-2hx fw-bolder">{{ $countAlumni }}</div>
              <div class="fs-4 fw-bold text-gray-400 mb-7">Jumlah Alumni</div>
              <div class="d-flex flex-wrap">
                <div class="d-flex flex-center h-100px w-100px me-9 mb-5">
                  <canvas id="kt_project_list_chart"></canvas>
                </div>
                <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                  @foreach ($alumniStats as $item)
                    <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                      <div class="bullet me-3" style="background-color: {{ $item['bgcolor'] }}"></div>
                      <div class="text-gray-400">{{ $item['name'] }}</div>
                      <div class="ms-auto fw-bolder text-gray-700">{{ $item['count'] }}</div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
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
  @include('pages.manage.tracer.chart')
  @include('pages.manage.tracer.donut')
  @include('pages.manage.tracer._indexscript')
@endsection
