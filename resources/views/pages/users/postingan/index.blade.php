@extends('layouts.user.main')

@section('css')
  <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

  @include('layouts.user.header-main',['title' => 'Postingan', 'subtitle' => 'Index'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">

      <div class="row mx-1 mb-7">
        <div class="card">
          <div class="card-body mb-3">
            <form action="" method="GET" id="search-form">
              <div class="d-flex align-items-center justify-content-center">
                <div class="position-relative w-md-400px me-md-2">
                  <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                      <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                    </svg>
                  </span>
                  <input type="search" class="form-control form-control-solid ps-10" name="cari" id="cari-filter" value="{{ request('cari') }}" placeholder="Cari..." />
                </div>
                <div class="d-flex align-items-center">
                  <button type="submit" class="btn btn-primary me-5">Cari</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="d-flex flex-wrap flex-stack pb-7 mb-8">
        <div class="d-flex flex-wrap align-items-center my-1 ms-2">
          @if ($postingan->count() > 0)
          <span class="text-gray-400 fs-6">
            Menampilkan
            <span id="postingan-count">{{ $postingan->count() }}</span>
            Postingan.
          </span>
          @else
          <span class="text-gray-400 fs-6">
            Data tidak ditemukan!
          </span>
          @endif
          <a href="{{ route('user.postingan.index') }}" class="ms-2"> <u> Muat ulang halaman </u></a>
        </div>
        <div class="d-flex flex-wrap mt-1">
          <div class="d-flex my-0">
            <select name="kategori" data-control="select2" data-allow-clear="false" data-hide-search="true" data-placeholder="Filter Postingan" class="form-select form-select-white form-select-sm w-150px me-5" id="kategori-filter">
              <option></option>
              <option value=" ">Semua</option>
              @foreach ($kategori as $item)
                <option value="{{ $item }}" {{ request('kategori') == $item ? 'selected' : '' }}>{{ $item }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
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

      <div id="pagination-container" class="mt-3"></div>

      <div class="card card-flush mt-5 d-none" id="null-card">
        <div class="card-body">
          <div class="" id="null-info">Data tidak ditemukan!</div>
        </div>
      </div>

      <div class="d-flex justify-content-end">
        {{ $postingan->links() }}
      </div>

    </div>
  </div>

<x-user.infofooter/>

@endsection

@section('js')
  {{-- <script src="/assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script> --}}
  @include('pages.users.postingan._indexscript')
@endsection
