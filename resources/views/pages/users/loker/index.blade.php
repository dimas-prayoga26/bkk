@extends('layouts.user.main')

@section('css')
  <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

  @include('layouts.user.header-main',['title' => 'Lowongan Kerja', 'subtitle' => 'Index'])

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
          @if ($loker->count() > 0)
          <span class="text-gray-400 fs-6">
            Menampilkan
            <span id="loker-count">{{ $loker->count() }}</span>
            Lowongan Kerja.
          </span>
          @else
          <span class="text-gray-400 fs-6">
            Data tidak ditemukan!
          </span>
          @endif
          <a href="{{ route('user.loker.index') }}" class="ms-2"> <u> Muat ulang halaman </u></a>
        </div>
        <div class="d-flex flex-wrap my-1">
          <div class="d-flex my-0">
            <select name="status" data-control="select2" data-allow-clear="false" data-hide-search="true" data-placeholder="Filter Status" class="form-select form-select-white form-select-sm w-150px me-5" id="status-filter">
              <option></option>
              <option value=" " {{ request('status') == '' ? 'selected' : '' }}>Semua</option>
              <option value="buka" {{ request('status') == 'buka' ? 'selected' : '' }}>Dibuka</option>
              <option value="tutup" {{ request('status') == 'tutup' ? 'selected' : '' }}>Ditutup</option>
            </select>
            <select name="dudi_id" data-control="select2" data-allow-clear="false" data-hide-search="false" data-placeholder="Filter DU/DI" class="form-select form-select-white form-select-sm w-150px me-5" id="dudi-filter">
              <option></option>
              <option value=" " {{ request('status') == '' ? 'selected' : '' }}>Semua</option>
              @foreach ($dudi as $item)
                <option value="{{ $item->id }}" {{ request('dudi_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9" id="dudi-card">
        @foreach ($loker as $item)
          <div class="col-md-6 col-lg-3 my-lg-1">
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

      <div id="pagination-container" class="mt-3"></div>

      <div class="card card-flush mt-5 d-none" id="null-card">
        <div class="card-body">
          <div class="" id="null-info">Data tidak ditemukan!</div>
        </div>
      </div>

      <div class="d-flex justify-content-end">
        {{ $loker->links() }}
      </div>

    </div>
  </div>

<x-user.infofooter/>

@endsection

@section('js')
  @include('pages.users.loker._indexscript')
@endsection
