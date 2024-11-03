@extends('layouts.user.main')

@section('css')

@endsection
@section('content')

  @include('layouts.user.header-main',['title' => 'Visi dan Misi', 'subtitle' => 'Index'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
      <div class="card card-flush">
        @isset($visimisi)
        <div class="card-body">
          <div class="mb-8">
            <div class="text-center mb-5">
              <h3 class="fs-2hx text-dark mb-5">Visi dan Misi</h3>
              <div class="fs-5 fw-bold"><h4>{{ config('app.name') }}</h4></div>
            </div>
            @if ($visimisi->cover != null)
              <div class="my-4">
                <img src="/img/visimisi/{{ $visimisi->cover }}" alt="{{ $visimisi->cover }}" class="img img-fluid">
              </div>
              {{-- <a class="d-block overlay my-4" data-fslightbox="lightbox-hot-sales" href="/img/visimisi/{{ $visimisi->cover }}">
                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-275px" style="background-image:url('/img/visimisi/{{ $visimisi->cover }}')"></div>
                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                  <i class="bi bi-eye-fill fs-2x text-white"></i>
                </div>
              </a> --}}
            @endif
          </div>
          <div class="fs-5 fw-bold text-gray-600" style="text-align: justify">
            {!! $visimisi->isi !!}
          </div>
        </div>
        @else
        <div class="card-body">
          Konten tidak tersedia. <a href="{{ route('home') }}"><u>Pergi ke Halaman Utama</u></a>
        </div>
        @endisset
      </div>
    </div>
  </div>

<x-user.infofooter/>

@endsection

@section('js')
  <script src="/assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
@endsection
