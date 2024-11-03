@extends('layouts.admin.main')

@section('css')
@endsection

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

  @include('layouts.admin.header-main',['title' => 'Profile', 'subtitle' => $subtitle ?? ''])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
      <div class="row gy-5 g-xl-8">
        <div class="col">

          <div class="card mb-5 mb-xl-10">
            <div class="card-body pt-9 pb-0">
              <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                <div class="me-7 mb-4">
                  <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    <img src="/img/profile/{{ Auth::user()->foto }}" alt="image" />
                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                  </div>
                </div>
                <div class="flex-grow-1">
                  <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <div class="d-flex flex-column">
                      <div class="d-flex align-items-center mb-2">
                        <span class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ Auth::user()->name }}</span>
                        <span class="btn btn-sm btn-light-primary fw-bolder ms-2 fs-8 py-1 px-3 text-capitalize">{{ Auth::user()->role }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex overflow-auto h-55px">
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                  <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ Request::is('manage/profile/home') ? 'active' : '' }}" href="{{ route('manage.profile.home') }}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ Request::is('manage/profile/pengaturan') ? 'active' : '' }}" href="{{ route('manage.profile.pengaturan') }}">Pengaturan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ Request::is('manage/profile/editfoto') ? 'active' : '' }}" href="{{ route('manage.profile.editfoto') }}">Edit Foto</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          @yield('profile')

        </div>
      </div>
    </div>
  </div>

</div>

@endsection

@section('js')
<script>
  $('#update-profil').on('submit', function() {
    showLoader();
  });
  $('#update-foto').on('submit', function() {
    showLoader();
  });
  $('#delete-foto').on('click', function() {
    showLoader();
  });
</script>
@endsection
