@extends('layouts.user.main')

@section('css')
  <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

  @include('layouts.user.header-main',['title' => 'Beranda', 'subtitle' => 'Index'])

  <div class="mb-n10 mb-lg-n20 z-index-2">
    <!--begin::Container-->
    <div class="container">
      <!--begin::Heading-->
      <div class="text-center mb-0">
        <!--begin::Title-->
        <h1 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
          {{ config('app.name') }}
        </h1>
        <!--end::Title-->
        <!--begin::Text-->
        <div class="fs-5 text-muted fw-bold">Selamat Datang di {{ config('app.name') }},
          <br>
          Selamat Menikmati informasi Lowongan Kerja dan Tracer Study {{ config('school.name') }}
        </div>
        <!--end::Text-->
      </div>
      <!--end::Heading-->
      <!--begin::Product slider-->
      <div class="tns tns-default">
        <!--begin::Slider-->
        <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">
          <!--begin::Item-->
          @foreach (['a.jpg','b.jpg','c.jpg'] as $banner)
            <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
              <img src="/img/banner/{{ $banner }}" class="card-rounded mw-100" alt="" />
            </div>
          @endforeach
          <!--end::Item-->
        </div>
        <!--end::Slider-->
        <!--begin::Slider button-->
        <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
          <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
          <span class="svg-icon svg-icon-3x">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="black" />
            </svg>
          </span>
          <!--end::Svg Icon-->
        </button>
        <!--end::Slider button-->
        <!--begin::Slider button-->
        <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
          <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
          <span class="svg-icon svg-icon-3x">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black" />
            </svg>
          </span>
          <!--end::Svg Icon-->
        </button>
        <!--end::Slider button-->
      </div>
      <!--end::Product slider-->
    </div>
    <!--end::Container-->
  </div>

  <div class="mt-sm-n10">
    <!--begin::Curve top-->
    <div class="landing-curve landing-dark-color">
      <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
      </svg>
    </div>
    <!--end::Curve top-->
    <!--begin::Wrapper-->
    <div class="pb-15 pt-18 landing-dark-bg">
      <!--begin::Container-->
      <div class="container">
        <!--begin::Statistics-->
        <div class="d-flex flex-center  mt-15">
          <!--begin::Items-->
          <div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
            <!--begin::Item-->
            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('/assets/media/svg/misc/octagon.svg')">
              <!--begin::Symbol-->
              <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
              <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                  <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                  <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                  <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                </svg>
              </span>
              <!--end::Svg Icon-->
              <!--end::Symbol-->
              <!--begin::Info-->
              <div class="mb-0">
                <!--begin::Value-->
                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                  <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="{{ $countDudi }}">0</div>
                </div>
                <!--end::Value-->
                <!--begin::Label-->
                <span class="text-gray-600 fw-bold fs-5 lh-0">Perusahaan</span>
                <!--end::Label-->
              </div>
              <!--end::Info-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('/assets/media/svg/misc/octagon.svg')">
              <!--begin::Symbol-->
              <!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
              <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M13 10.9128V3.01281C13 2.41281 13.5 1.91281 14.1 2.01281C16.1 2.21281 17.9 3.11284 19.3 4.61284C20.7 6.01284 21.6 7.91285 21.9 9.81285C22 10.4129 21.5 10.9128 20.9 10.9128H13Z" fill="black" />
                  <path opacity="0.3" d="M13 12.9128V20.8129C13 21.4129 13.5 21.9129 14.1 21.8129C16.1 21.6129 17.9 20.7128 19.3 19.2128C20.7 17.8128 21.6 15.9128 21.9 14.0128C22 13.4128 21.5 12.9128 20.9 12.9128H13Z" fill="black" />
                  <path opacity="0.3" d="M11 19.8129C11 20.4129 10.5 20.9129 9.89999 20.8129C5.49999 20.2129 2 16.5128 2 11.9128C2 7.31283 5.39999 3.51281 9.89999 3.01281C10.5 2.91281 11 3.41281 11 4.01281V19.8129Z" fill="black" />
                </svg>
              </span>
              <!--end::Svg Icon-->
              <!--end::Symbol-->
              <!--begin::Info-->
              <div class="mb-0">
                <!--begin::Value-->
                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                  <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="{{ $countAlumni }}">0</div>
                </div>
                <!--end::Value-->
                <!--begin::Label-->
                <span class="text-gray-600 fw-bold fs-5 lh-0">Alumni Terdaftar</span>
                <!--end::Label-->
              </div>
              <!--end::Info-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('/assets/media/svg/misc/octagon.svg')">
              <!--begin::Symbol-->
              <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
              <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="black" />
                  <path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="black" />
                  <path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="black" />
                </svg>
              </span>
              <!--end::Svg Icon-->
              <!--end::Symbol-->
              <!--begin::Info-->
              <div class="mb-0">
                <!--begin::Value-->
                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                  <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="{{ $countLoker }}">0</div>
                </div>
                <!--end::Value-->
                <!--begin::Label-->
                <span class="text-gray-600 fw-bold fs-5 lh-0">Lowongan Kerja</span>
                <!--end::Label-->
              </div>
              <!--end::Info-->
            </div>
            <!--end::Item-->
          </div>
          <!--end::Items-->
        </div>
        <!--end::Statistics-->
        <!--begin::Testimonial-->
        <div class="fs-2 fw-bold text-muted text-center mb-3">
        <span class="fs-1 lh-1 text-gray-700">“</span>
        <span>Dengan senang hati ingin memperkenalkan kepada anda laman BKK (Bursa Kerja Khusus) dan Tracer Study yang kami hadirkan di {{ config('app.name') }} . Laman ini adalah langkah inovatif kami untuk meningkatkan kualitas layanan pendidikan dan pengembangan karir.</span>
        <span class="fs-1 lh-1 text-gray-700">“</span></div>
        <!--end::Testimonial-->
        <!--begin::Author-->
        <div class="fs-2 fw-bold text-muted text-center">
          <a href="#" class="link-primary fs-4 fw-bolder"> Aiptu Kasdullah., SH.,MH</a>
          <span class="fs-4 fw-bolder text-gray-600">Kepala Sekolah</span>
        </div>
        <!--end::Author-->
      </div>
      <!--end::Container-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Curve bottom-->
    <div class="landing-curve landing-dark-color">
      <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
      </svg>
    </div>
    <!--end::Curve bottom-->
  </div>

<div class="my-10">
  <div class="card">

    <div class="card-body">

      <div class="mb-17">
        <!--begin::Content-->
        <div class="d-flex flex-stack mb-5">
          <!--begin::Title-->
          <h3 class="text-black">Lowongan Kerja Terbaru</h3>
          <!--end::Title-->
          <!--begin::Link-->
          <a href="{{ route('user.loker.index') }}" class="fs-6 fw-bold link-primary">Lihat lowongan lainnya</a>
          <!--end::Link-->
        </div>
        <!--end::Content-->
        <!--begin::Separator-->
        <div class="separator separator-dashed mb-9"></div>
        <!--end::Separator-->
        <!--begin::Row-->
        <div class="row g-10">
          @foreach ($loker as $item)
            <div class="col-md-4">
              <div class="card mx-1 bgi-no-repeat card-xl-stretch mb-xl-8 border" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-2.svg)">
                <div class="position-absolute end-0">
                  @if ($item->status == 'buka')
                    <span class="badge badge-light-success fw-bolder p-3">Dibuka</span>
                  @else
                    <span class="badge badge-light-danger fw-bolder p-3">Ditutup</span>
                  @endif
                </div>
                <div class="card-body pb-4">
                  <div class="mb-3">
                    <span class="fw-bolder">Diposting:</span>
                    {{ date('d-m-Y', strtotime($item->tanggal_diunggah)) }}
                  </div>
                  <div class="separator mb-3"></div>
                  <p class="text-muted fw-bold fs-5 mb-3">{{ $item->dudi->name }}</p>
                  <span class="card-title fw-bolder text-dark text-hover-primary fs-4">
                    {{ $item->judul }}
                  </span>
                  <div class="my-3">Posisi/Jabatan:
                    <span class="fw-bolder text-primary">{{ $item->posisi }}</span>
                  </div>
                  <div class="separator my-3"></div>
                  <div class="mb-0">
                    <span class="fw-bolder"> Kualifikasi Jurusan: </span>
                    <br>
                    {{ $item->kual_jurusan }}
                  </div>
                </div>
                <div class="card-footer pb-5 pt-4 pe-4">
                  <a href="{{ route('user.loker.show', $item->idt) }}" class="btn btn-sm btn-primary float-end">
                    Detail
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <!--end::Row-->
      </div>

      <div class="mb-17">
        <!--begin::Content-->
        <div class="d-flex flex-stack mb-5">
          <!--begin::Title-->
          <h3 class="text-black">Postingan Terbaru</h3>
          <!--end::Title-->
          <!--begin::Link-->
          <a href="{{ route('user.postingan.index') }}" class="fs-6 fw-bold link-primary">Lihat postingan lainnya</a>
          <!--end::Link-->
        </div>
        <!--end::Content-->
        <!--begin::Separator-->
        <div class="separator separator-dashed mb-9"></div>
        <!--end::Separator-->
        <!--begin::Row-->
        <div class="row g-10">
          @foreach ($postingan as $item)
            <div class="col-md-4 post-card mb-6" data-idt="{{ $item->idt }}">
              <div class="card-xl-stretch">
                <div class="d-block overlay mb-4">
                  <div class="position-absolute end-0">
                    @if ($item->kategori == 'berita')
                      <span class="badge badge-primary fw-bolder p-3">Berita</span>
                    @elseif ($item->kategori == 'pengumuman')
                      <span class="badge badge-warning fw-bolder p-3">Pengumuman</span>
                    @elseif ($item->kategori == 'artikel')
                      <span class="badge badge-info fw-bolder p-3">Artikel</span>
                    @endif
                  </div>
                  <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('/img/postingan/{{ $item->cover }}')"></div>
                  <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                    <i class="bi bi-eye-fill fs-2x text-white"></i>
                  </div>
                </div>
                <div class="m-0">
                  <div class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{ $item->judul }}</div>
                  <div class="fw-bold fs-5 text-gray-600 text-dark my-4">{{ $item->excerpt }}</div>
                  <div class="fs-6 fw-bolder">
                    <span class="text-gray-700 text-hover-primary">{{ $item->admin->user->name }},</span>
                    <span class="text-muted">{{ date('d-m-Y', strtotime($item->tanggal)) }}</span>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <!--end::Row-->
      </div>

    </div>
  </div>
</div>

<x-user.infofooter/>

@endsection

@section('js')
<script src="/assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>

<script src="/assets/js/custom/widgets.js"></script>
<script src="/assets/js/custom/apps/chat/chat.js"></script>
<script src="/assets/js/custom/modals/create-app.js"></script>
<script src="/assets/js/custom/modals/upgrade-plan.js"></script>
<script>
   $('.post-card').on('click', function(){
      window.location.href = '/postingan/' + $(this).data('idt');
    });
</script>
@endsection
