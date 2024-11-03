@extends('layouts.admin.main')

@section('css')

@endsection
@section('content')

  @include('layouts.admin.header-sub',['title' => 'Data Postingan', 'subtitle' => 'Show'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
      <div class="card card-flush">
       <div class="card-body">
        <div class="mb-8">
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
              <span class="fw-bolder text-gray-400 text-capitalize">{{ $postingan->kategori }}</span>
            </div>
            <div class="me-8">
              <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black" />
                  <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black" />
                </svg>
              </span>
              <span class="fw-bolder text-gray-400">{{ Carbon\Carbon::parse($postingan->tanggal)->isoFormat('D MMMM YYYY'); }}</span>
              <span><i>by</i></span>
              <span class="text-hover-primary">{{ $postingan->admin->user->name }}</span>
            </div>
            <div class="">
              @if ($postingan->status == 'public')
                <span class="badge badge-sm badge-light-success">Publik</span>
              @else
                <span class="badge badge-sm badge-light-warning">Privasi</span>
              @endif
            </div>
          </div>
          <h2 class="text-dark fs-2 fw-bolder">{{ $postingan->judul }}</h2>
          <div class="my-4">
            <img src="/img/postingan/{{ $postingan->cover }}" alt="{{ $postingan->judul }}" class="img img-fluid">
          </div>
          {{-- <a class="d-block overlay my-4" data-fslightbox="lightbox-hot-sales" href="/img/postingan/{{ $postingan->cover }}">
            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-275px" style="background-image:url('/img/postingan/{{ $postingan->cover }}')"></div>
            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
              <i class="bi bi-eye-fill fs-2x text-white"></i>
            </div>
          </a> --}}
        </div>
        <div class="fs-5 fw-bold text-gray-600">
          {!! $postingan->isi !!}
        </div>
       </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
  <script src="/assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
@endsection
