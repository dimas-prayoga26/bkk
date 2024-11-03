@extends('pages.manage.profile.index', ['subtitle' => 'Home'])

@section('profile')

<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
  <div class="card-header cursor-pointer">
    <div class="card-title m-0">
      <h3 class="fw-bolder m-0">Detail Profil</h3>
    </div>
    <a href="{{ route('manage.profile.pengaturan') }}" class="btn btn-sm btn-primary align-self-center">Edit Profile</a>
  </div>
  <div class="card-body p-9">
    <div class="row mb-7">
      <label class="col-lg-4 fw-bold text-muted">Nama</label>
      <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ Auth::user()->name }}</span>
      </div>
    </div>
    <div class="row mb-7">
      <label class="col-lg-4 fw-bold text-muted">Email</label>
      <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ Auth::user()->email }}</span>
      </div>
    </div>
    <div class="row mb-7">
      <label class="col-lg-4 fw-bold text-muted">Status</label>
      <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{!! Auth::user()->is_aktif() !!}</span>
      </div>
    </div>
  </div>
</div>

@endsection
