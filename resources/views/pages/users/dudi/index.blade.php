@extends('layouts.user.main')

@section('css')
  <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

  @include('layouts.user.header-main',['title' => 'Data DU/DI', 'subtitle' => 'Index'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">

      <div class="row mx-1 mb-7">
        <div class="card">
          <div class="card-body mb-3">
              <div class="d-flex align-items-center justify-content-center">
                <div class="position-relative w-md-400px me-md-2">
                  <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                      <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                    </svg>
                  </span>
                  <input type="search" class="form-control form-control-solid ps-10" name="cari" id="cari" value="{{ old('cari') }}" placeholder="Cari..." />
                </div>
              </div>
          </div>
        </div>
      </div>

      <div class="d-flex mb-7">
        <select name="jenis_kerjasama_id" id="jenis_kerjasama_id-select" data-control="select2" data-hide-search="true" data-placeholder="Jenis Kerjasama" class="form-select form-select-white form-select-sm w-150px me-5">
          <option></option>
          <option value=" ">Semua</option>
          @foreach ($jenisKerjasama as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-6" id="dudi-count-div"><i>Menampilkan <span id="dudi-count-el"></span> Data DUDI/Perusahaan</i> </div>

      <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9" id="dudi-card">
        {{-- @foreach ($dudi as $item)
          <div class="col-md-4">
            <div class="card card-flush h-md-100">
              <div class="card-header">
                <div class="card-title mt-5">
                  <div class="symbol symbol-50px overflow-hidden me-3 ms-0">
                    <div class="symbol-label">
                      <img src="/img/logo/{{ $item->logo }}" alt="{{ $item->name }}" class="w-100" />
                    </div>
                  </div>
                  <h2>{{ $item->name }}</h2>
                </div>
              </div>
              <div class="card-body pt-1">
                <div class="d-inline">
                  <div class="fw-bolder text-gray-600 mb-5">
                    <span class="svg-icon svg-icon-1tx svg-icon-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black" />
                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black" />
                      </svg>
                    </span>
                    {{ $item->alamat }}
                  </div>
                </div>
                <div class="mb-2"><i>Kerjasama</i></div>
                <div class="d-flex flex-column text-gray-600">
                  @if ($item->kerjasama->count() > 1)
                    @foreach ($item->kerjasama as $kjs)
                      <div class="d-flex align-items-center py-1">
                        <span class="bullet bg-primary me-3"></span>
                        <span class="badge badge-sm badge-light-primary me-2 my-1">{{ $kjs->jenisKerjasama->name }}</span>
                      </div>
                    @endforeach
                  @else
                    -
                  @endif
                </div>
              </div>
            </div>
          </div>
        @endforeach --}}

      </div>

      <div id="pagination-container" class="mt-3"></div>

      <div class="card card-flush mt-5 d-none" id="null-card">
        <div class="card-body">
          <div class="" id="null-info">Data tidak ditemukan!</div>
        </div>
      </div>

    </div>
  </div>

<x-user.infofooter/>

@endsection

@section('js')
  @include('pages.users.dudi._indexscript')
@endsection
