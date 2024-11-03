@extends('pages.manage.pelamar.edit.index', ['subtitle' => 'Riwayat Kerja'])

@section('profile')

<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
  <div class="card-header cursor-pointer">
    <div class="card-title m-0">
      <h3 class="fw-bolder m-0">Riwayat Pekerjaan</h3>
    </div>
    <button id="btn-create-riwayat-kerja" class="btn btn-sm btn-primary align-self-center">Tambah Riwayat</button>
  </div>
  <div class="card-body p-9 table-responsive">
    <table class="table align-middle table-striped table-hover fs-6 gy-2 mb-0" id="riwayat-kerja-table">
      <thead>
        <tr class="text-start fw-bolder fs-7 text-uppercase gs-0 bg-dark text-white">
          <th class="ps-3">No.</th>
          <th class="">Nama DU/DI</th>
          <th class="">Mulai</th>
          <th class="">Selesai</th>
          <th class="">Jabatan</th>
          <th class="min-w-100px">Aksi</th>
        </tr>
      </thead>
      <tbody class="ps-3">
        {{-- @foreach ($riwayat as $item)
          <tr class="border-bottom">
            <td class="ps-3">{{ $loop->iteration }}</td>
            <td>{{ $item->nama_dudi }}</td>
            <td>{{ date("d-m-Y", strtotime($item->mulai)) }}</td>
            <td>{{ date("d-m-Y", strtotime($item->selesai)) }}</td>
            <td>{{ $item->posisi }}</td>
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
                  <a href="#" class="menu-link px-3 btn-delete-riwayat-kerja" data-name="{{ $item->nama_dudi }}" data-id="{{ $item->id }}">Delete</a>
                </div>
              </div>
            </td>
          </tr>
        @endforeach --}}
      </tbody>
    </table>
  </div>
</div>

  {{-- Konfirmasi Hapus --}}
  <div class="modal fade" id="modal-delete-riwayat-kerja" tabindex="-1" aria-hidden="true">
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
            Riwayat Pekerjaan: <span class="text-danger" id="delete-name"></span>
            <br>
            Apakah anda yakin akan menghapus data tersebut?
          </div>
          <div class="modal-footer justify-content-between">
            <button type="reset" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-sm btn-danger" id="submit-delete-riwayat-kerja" data-kt-indicator="off">
                <span class="indicator-label">Hapus</span>
                <span class="indicator-progress">Diproses...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
          </div>
      </div>
    </div>
  </div>

  {{-- Tambah Riwayat Kerja --}}
  <div class="modal fade" id="modal-create-riwayat-kerja" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md ">
      <div class="modal-content">
          <div class="modal-header">
            <h2>Tambah Riwayat Kerja</h2>
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
              <div class="d-flex flex-column mb-4 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2 required" for="nama_dudi"> Nama DU/DI </label>
                <input type="text" class="form-control create-field" name="nama_dudi" id="create-nama_dudi" placeholder="Ketik Nama DU/DI" required>
                <small class="text-danger invalid-feedback" id="error-create-nama_dudi"></small>
              </div>
              <div class="d-flex flex-column mb-4 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2 required" for="mulai"> Mulai Bekerja </label>
                <input type="date" class="form-control create-field" name="mulai" id="create-mulai" placeholder="Ketik Mulai Bekerja" required>
                <small class="text-danger invalid-feedback" id="error-create-mulai"></small>
              </div>
              <div class="d-flex flex-column mb-4 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2" for="selesai"> Selesai Bekerja </label>
                <input type="date" class="form-control create-field" name="selesai" id="create-selesai" placeholder="Ketik Selesai Bekerja">
                <small class="text-danger invalid-feedback" id="error-create-selesai"></small>
              </div>
              <div class="d-flex flex-column mb-4 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2 required" for="posisi"> Jabatan/Posisi </label>
                <input type="text" class="form-control create-field" name="posisi" id="create-posisi" placeholder="Ketik Jabatan/Posisi" required>
                <small class="text-danger invalid-feedback" id="error-create-posisi"></small>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-primary" id="submit-store-riwayat-kerja" data-kt-indicator="off">
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress">Diproses...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
            </div>
      </div>
    </div>
  </div>

  {{-- Tambah Riwayat Kerja --}}
  <div class="modal fade" id="modal-edit-riwayat-kerja" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md ">
      <div class="modal-content">
          <div class="modal-header">
            <h2>Edit Riwayat Kerja</h2>
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
              <div class="d-flex flex-column mb-4 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2 required" for="nama_dudi"> Nama DU/DI </label>
                <input type="text" class="form-control edit-field" name="nama_dudi" id="edit-nama_dudi" placeholder="Ketik Nama DU/DI" required>
                <small class="text-danger invalid-feedback" id="error-edit-nama_dudi"></small>
              </div>
              <div class="d-flex flex-column mb-4 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2 required" for="mulai"> Mulai Bekerja </label>
                <input type="date" class="form-control edit-field" name="mulai" id="edit-mulai" placeholder="Ketik Mulai Bekerja" required>
                <small class="text-danger invalid-feedback" id="error-edit-mulai"></small>
              </div>
              <div class="d-flex flex-column mb-4 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2" for="selesai"> Selesai Bekerja </label>
                <input type="date" class="form-control edit-field" name="selesai" id="edit-selesai" placeholder="Ketik Selesai Bekerja">
                <small class="text-danger invalid-feedback" id="error-edit-selesai"></small>
              </div>
              <div class="d-flex flex-column mb-4 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2 required" for="posisi"> Jabatan/Posisi </label>
                <input type="text" class="form-control edit-field" name="posisi" id="edit-posisi" placeholder="Ketik Jabatan/Posisi" required>
                <small class="text-danger invalid-feedback" id="error-edit-posisi"></small>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-primary" id="submit-update-riwayat-kerja" data-kt-indicator="off">
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress">Diproses...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
            </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
  <script>

  $(document).ready(function(){

    // SETUP CSRF
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#riwayat-kerja-table').dataTable({
      processing: true,
      serverside: true,
      ordering: false,
      ajax: {
        url: '/manage/pelamar/{{ $pelamar->idt }}/edit/riwayatkerja'
      },
      columns:[
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false},
        {data: 'nama_dudi', name: 'nama_dudi'},
        {data: 'mulai', name: 'mulai'},
        {data: 'selesai', name: 'selesai'},
        {data: 'posisi', name: 'posisi'},
        {data: 'aksi', name: 'aksi'},
      ]
    });

    // CREATE
    $('body').on('click', '#btn-create-riwayat-kerja', function(){
      $('#modal-create-riwayat-kerja').modal('show');
      $('#submit-store-riwayat-kerja').off('click').click(function() {
        $('#submit-store-riwayat-kerja').attr("data-kt-indicator", "on");
        $('#submit-store-riwayat-kerja').attr("disabled", true);
        store();
      });
    });

    function store(){
      $.ajax({
        url: '/manage/pelamar/{{ $pelamar->idt }}/riwayatkerja',
        type: 'POST',
        data: {
          nama_dudi: $('#create-nama_dudi').val(),
          mulai: $('#create-mulai').val(),
          selesai: $('#create-selesai').val(),
          posisi: $('#create-posisi').val(),
        },

        success: function(response){
          $('#submit-store-riwayat-kerja').attr("data-kt-indicator", "off");
          $('#submit-store-riwayat-kerja').attr("disabled", false);
          if (response.errors) {
            $('.create-field').removeClass('is-invalid');
            $('.create-field').addClass('is-valid');
            $('.invalid-feedback').html('');

            $.each(response.errors, function(field, errors) {
                $('#create-' + field).removeClass('is-valid');
                $('#create-' + field).addClass('is-invalid');
                $('#error-create-' + field).html(errors[0]);
            });

          } else if(response.failed){
            $('#modal-create-riwayat-kerja').modal('hide');
            toastr.error(response.failed);

          } else {
            toastr.success(response.success);
            $('#modal-create-riwayat-kerja').modal('hide');
          }
          $('#riwayat-kerja-table').DataTable().ajax.reload();
        }
      });
    }

    // EDIT
    $('body').on('click', '.btn-edit-riwayat-kerja', function(e) {
        showLoader();
        var id = $(this).data('id');
        $.ajax({
          url: '/manage/pelamar/' + id + '/riwayatkerja',
          type: 'GET',
          success: function(response){
            hideLoader();
            $('#modal-edit-riwayat-kerja').modal('show');

            $.each(response.dataEdit, function(field, value) {
              $('#edit-' + field).val(value);
            });

            $('#submit-update-riwayat-kerja').off('click').click(function() {
              $('#submit-update-riwayat-kerja').attr("data-kt-indicator", "on");
              $('#submit-update-riwayat-kerja').attr("disabled", true);
              update(id);
            });
          }
        })
    });

    function update(id){
      $.ajax({
        url: '/manage/pelamar/' + id + '/riwayatkerja/update',
        type: 'PUT',
        data: {
          nama_dudi: $('#edit-nama_dudi').val(),
          mulai: $('#edit-mulai').val(),
          selesai: $('#edit-selesai').val(),
          posisi: $('#edit-posisi').val(),
        },

        success: function(response){
          $('#submit-update-riwayat-kerja').attr("data-kt-indicator", "off");
          $('#submit-update-riwayat-kerja').attr("disabled", false);
          if (response.errors) {
            $('.edit-field').removeClass('is-invalid');
            $('.edit-field').addClass('is-valid');
            $('.invalid-feedback').html('');

          $.each(response.errors, function(field, errors) {
                $('#edit-' + field).removeClass('is-valid');
                $('#edit-' + field).addClass('is-invalid');
                $('#error-edit-' + field).html(errors[0]);
            });

          } else if(response.failed){
            $('#modal-edit-riwayat-kerja').modal('hide');
            toastr.error(response.failed);

          } else {
            toastr.success(response.success);
            $('#modal-edit-riwayat-kerja').modal('hide');
          }
          $('#riwayat-kerja-table').DataTable().ajax.reload();
        }
      });
    }

    // DELETE
    $('body').on('click', '.btn-delete-riwayat-kerja', function(e){
      e.preventDefault();
      var id = $(this).data('id');
      $('#modal-delete-riwayat-kerja').modal('show');
      $('#delete-name').html($(this).data('name'));

      $('#submit-delete-riwayat-kerja').off('click').click(function() {
        $('#submit-delete-riwayat-kerja').attr("data-kt-indicator", "on");
        $('#submit-delete-riwayat-kerja').attr("disabled", true);
        $.ajax({
          url: '/manage/pelamar/' + id + '/riwayatkerja',
          type: 'DELETE',
          success: function(res) {
            $('#modal-delete-riwayat-kerja').modal('hide');
            $('#submit-delete-riwayat-kerja').attr("data-kt-indicator", "off");
            $('#submit-delete-riwayat-kerja').attr("disabled", false);
            toastr.success(res.success);
            $('#riwayat-kerja-table').DataTable().ajax.reload();
          }
        });
      });
    });

  });

  $('#modal-create-riwayat-kerja').on('hidden.bs.modal', function() {
      $('#create-nama_dudi').val(''),
      $('#create-mulai').val(''),
      $('#create-selesai').val(''),
      $('#create-posisi').val(''),

      $('.is-invalid').removeClass('is-invalid');
      $('.is-valid').removeClass('is-valid');
  });
  </script>
@endsection
