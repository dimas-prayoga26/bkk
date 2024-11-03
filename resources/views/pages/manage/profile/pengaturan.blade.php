@extends('pages.manage.profile.index', ['subtitle' => 'Pengaturan'])

@section('profile')

<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
  <div class="card-header cursor-pointer">
    <div class="card-title m-0">
      <h3 class="fw-bolder m-0">Edit Profil</h3>
    </div>
  </div>

  <form action="{{ route('manage.profile.pengaturan') }}" method="POST" id="update-profil">
  @csrf
  @method('PUT')

    <div class="card-body p-9">
      <div class="row mb-6">
        <label class="col-lg-3 col-form-label required fw-bold fs-6">Nama User</label>
        <div class="col-lg-9 fv-row">
          <input type="text" name="name" class="form-control form-control-md mb-3 mb-lg-0 @error('name') is-invalid @enderror" placeholder="Ketik Nama User" value="{{ old('name', Auth::user()->name) }}">
          @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="row mb-6">
        <label class="col-lg-3 col-form-label fw-bold fs-6 required">Email</label>
        <div class="col-lg-9 fv-row">
          <input type="email" name="email" class="form-control form-control-md mb-3 mb-lg-0 @error('email') is-invalid @enderror" placeholder="Ketik Email" value="{{ old('email', Auth::user()->email) }}" required>
          @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="row" data-kt-password-meter="true">
        <label class="col-lg-3 col-form-label fw-bold fs-6">Password Baru <small>(Opsional)</small></label>
        <div class="col-lg-9 fv-row position-relative">
          <input class="form-control form-control-md @error('password') is-invalid @enderror" type="password" placeholder="Ketik Password" name="password" autocomplete="off" />
          <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
            <i class="bi bi-eye-slash fs-2"></i>
            <i class="bi bi-eye fs-2 d-none"></i>
          </span>
          @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-start py-6 px-9">
      <button type="submit" class="btn btn-sm btn-primary" id="kt_account_profile_details_submit">Simpan</button>
    </div>

  </form>

</div>

@endsection
