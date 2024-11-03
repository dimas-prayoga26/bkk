@extends('layouts.user.main')

@section('css')

@endsection
@section('content')

  @include('layouts.user.header-sub',['title' => 'Lowongan Kerja', 'subtitle' => 'Show'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
      <div class="card card-flush">
       <div class="card-body">
        <div class="mb-8">

          <div class="alert alert-primary d-none" role="alert" id="info-has-lamar">
            Anda telah melamar Lowongan Pekerjaan ini!
          </div>

          @if (Auth::check())
            @if (in_array($loker->id, $lokerDilamar))
              <div class="alert alert-primary" role="alert">
                Anda telah melamar Lowongan Pekerjaan ini!
              </div>
            @endif
          @endif
          <div class="d-flex flex-wrap mb-6">
            <div class="me-8">
              <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                  <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                  <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                  <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                </svg>
              </span>
              <span class="fw-bolder text-gray-400 text-capitalize">Lowongan Kerja</span>
            </div>
            <div class="me-8">
              <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black" />
                  <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black" />
                </svg>
              </span>
              <span class="fw-bolder text-gray-400">{{ Carbon\Carbon::parse($loker->tanggal)->isoFormat('D MMMM YYYY'); }}</span>
              <span><i>by</i></span>
              <span class="text-hover-primary">{{ $loker->admin->user->name }}</span>
            </div>
            <div class="me-2">
              @if ($loker->status == 'buka')
                <span class="badge badge-sm badge-light-success">Dibuka</span>
              @else
                <span class="badge badge-sm badge-light-danger">Ditutup</span>
              @endif
            </div>
            <div class="">
              @if ($loker->info == 'internal')
                <span class="badge badge-sm badge-light-primary">Info Internal</span>
              @else
                <span class="badge badge-sm badge-light-warning">Info Eksternal</span>
              @endif
            </div>
          </div>
          <h5 class="text-gray-600">{{ $loker->dudi->name }}</h5>
          <h2 class="text-dark fs-2 fw-bolder">{{ $loker->judul }}</h2>
          <div class="my-4 text-center">
            <img src="/img/loker/{{ $loker->cover }}" alt="{{ $loker->judul }}" class="img img-fluid">
          </div>
          {{-- <a class="d-block overlay my-4" data-fslightbox="lightbox-hot-sales" href="/img/loker/{{ $loker->cover }}">
            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-275px" style="background-image:url('/img/loker/{{ $loker->cover }}')"></div>
            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
              <i class="bi bi-eye-fill fs-2x text-white"></i>
            </div>
          </a> --}}
        </div>
        <div class="pb-5 fs-6">

          <div class="fw-bolder mt-5">Posisi/Jabatan</div>
          <div class="text-gray-600">{{ $loker->posisi }}</div>

          <div class="fw-bolder mt-5">Kualifikasi Pendidikan</div>
          <div class="text-gray-600">{{ $loker->kualifikasi_pendidikan() }}</div>

          <div class="fw-bolder mt-5">Kualifikasi Jurusan</div>
          <div class="text-gray-600">{{ $loker->kual_jurusan ?? '-' }}</div>

          <div class="fw-bolder mt-5">Tanggal Batas Lamaran</div>
          <div class="text-gray-600">{{ Carbon\Carbon::parse($loker->tanggal_batas)->isoFormat('D MMMM YYYY'); }}</div>

        </div>
        <div class="fs-5 mt-5 fw-bold text-gray-600">
          {!! $loker->isi !!}
        </div>

        @if ($loker->dudi->kerjasama->count() > 0 && $loker->info == 'internal')
          @if ($loker->status == 'buka')
            @if (Auth::check())
              @if (!in_array($loker->id, $lokerDilamar))
                <button class="btn btn-primary w-100 mt-5" id="btn-lamar" data-id="{{ $loker->id }}">Lamar</button>
              @endif
            @else
              <button class="btn btn-primary w-100 mt-5" id="btn-must-login">Lamar</button>
            @endif
          @endif
        @endif
      </div>
      </div>
    </div>
  </div>

  {{-- Konfirmasi Logout --}}
  <div class="modal fade" id="confirm-lamar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md ">
      <div class="modal-content">
        <div class="modal-header" id="kt_modal_new_address_header">
          <h2>Konfirmasi Lamaran</h2>
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
          Apakah anda yakin akan melamar Pekerjaan ini?
        </div>
        <div class="modal-footer justify-content-between">
          <button type="reset" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-sm btn-primary" id="store-lamar" data-kt-indicator="off">
              Lamar
            </button>
        </div>
      </div>
    </div>
  </div>

  {{-- Login Diperlukan --}}
  <div class="modal fade" id="alert-login" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md ">
      <div class="modal-content">
        <div class="modal-header" id="kt_modal_new_address_header">
          <h2>Login Diperlukan</h2>
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
          Untuk melamar, Anda harus Login terlebih dahulu!
        </div>
        <div class="modal-footer justify-content-between">
          <button type="reset" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Batal</button>
            <a href="{{ route('login') }}" type="button" class="btn btn-sm btn-primary" data-kt-indicator="off">
              Login
            </a>
        </div>
      </div>
    </div>
  </div>

<x-user.infofooter/>

@endsection

@section('js')
  <script src="/assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
  <script>
    $(document).ready(function(){
       // SETUP CSRF
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#btn-lamar').on('click', function(){
        $('#confirm-lamar').modal('show');
          $('#store-lamar').off('click').click(function() {
            showLoaderAtShow();
            $.ajax({
              url: '/loker',
              type: 'POST',
              data: {
                id: $('#btn-lamar').data('id'),
              },
              success: function(res) {
                console.log(res.success);
                hideLoaderAtShow();
                $('#confirm-lamar').modal('hide');
                if (res.errors) {
                  toastr.error(res.errors)
                } else {
                  $('#info-has-lamar').removeClass('d-none');
                  $('#btn-lamar').addClass('d-none');
                  toastr.success(res.success)
                }
              }
            });
          });
      });

      $('#btn-must-login').on('click', function(){
        $('#alert-login').modal('show');
      });
    });
  </script>
@endsection
