<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{'DATA PELAMAR ' . config('app.name')  }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
  {{-- CUSTOMIZE CSS --}}
  <link href="/customize/style.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/v/bs4/jq-3.7.0/jszip-3.10.1/dt-1.13.8/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/kt-2.11.0/datatables.min.css" rel="stylesheet">

</head>
<body>

  <div id="kt_content_container" class="container mt-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header mt-3">
            <div class="card-title">
              <h3 class="fw-bolder">Cetak Pelamar</h3>
            </div>
            <div class="card-toolbar">
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
                      <label class="form-label fw-bold">Jenis Pelamar:</label>
                      <div>
                        <select class="form-select form-select-solid" data-hide-search="true" name="type" data-kt-select2="true" data-placeholder="Pilih..." data-dropdown-parent="#kt_menu_61484bf845268" data-allow-clear="true" id="type-select">
                          <option></option>
                          @foreach (['umum','alumni'] as $item)
                            <option value="{{ $item }}" >{{ $item == 'umum' ? 'Pelamar Umum' : 'Pelamar Alumni' }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="mb-10">
                      <label class="form-label fw-bold">Status Akun:</label>
                      <div>
                        <select class="form-select form-select-solid" data-hide-search="true" name="select_id" data-kt-select2="true" data-placeholder="Pilih..." data-dropdown-parent="#kt_menu_61484bf845268" data-allow-clear="true" id="is_aktif-select">
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
          <div class="card-body">
            <div class="table-responsive">
              <table class="table align-middle table-striped table-hover fs-6 gy-2 mb-0" id="myTable">
                <thead>
                  <tr class="text-start fw-bolder fs-7 text-uppercase gs-0 bg-dark text-white">
                    <th class="ps-3">No.</th>
                    <th class="">Nama Pelamar</th>
                    <th class="">Jenis Pelamar</th>
                    <th class="">Email</th>
                    <th class="">NIK</th>
                    <th class="">L/P</th>
                    <th class="">Tempat Lahir</th>
                    <th class="">Tanggal Lahir</th>
                    <th class="">Telepon/WA</th>
                    <th class="">Alamat</th>
                    <th class="">Pendidikan Terakhir</th>
                    <th class="">Jurusan Terakhir</th>
                    <th class="">Tahun Lulus</th>
                  </tr>
                </thead>
                <tbody class="ps-3">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>var hostUrl = "/assets/";</script>
<script src="/assets/plugins/global/plugins.bundle.js"></script>
<script src="/assets/js/scripts.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs4/jq-3.7.0/jszip-3.10.1/dt-1.13.8/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/kt-2.11.0/datatables.min.js"></script>

  <script>
  $(document).ready(function(){
    $('#myTable').DataTable({
      paginate: false,
      ordering: true,
      // searching: false,
      dom: 'Bfrtip',
        buttons: [
            // 'copy',
            // 'csv',
            'excel',
            // 'pdf',
            // 'print',
        ],
      ajax: {
      url: '/manage/pelamar/print',
        data: function(d){
          d.type = $('#type-select').val();
          d.is_aktif = $('#is_aktif-select').val();
        }
      },
      columns:[
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false},
        {data: 'user.name', name: 'user.name'},
        {data: 'type', name: 'type'},
        {data: 'user.email', name: 'user.email'},
        {data: 'nik', name: 'nik'},
        {data: 'user.jk', name: 'user.jk'},
        {data: 'user.tempatlahir', name: 'user.tempatlahir'},
        {data: 'user.tanggallahir', name: 'user.tanggallahir'},
        {data: 'user.telepon', name: 'user.telepon'},
        {data: 'user.alamat', name: 'user.alamat'},
        {data: 'pend_terakhir', name: 'pend_terakhir'},
        {data: 'jurusan_terakhir', name: 'jurusan_terakhir'},
        {data: 'tahun_lulus', name: 'tahun_lulus'},
      ]
    });

    // FILTER
    $('body').on('click', '#filter-submit', function(){
      $('#myTable').DataTable().ajax.reload();
      toastr.info('Filter berhasil diterapkan');
    });
  })
  </script>
</body>
</html>
