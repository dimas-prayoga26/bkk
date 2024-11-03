@extends('pages.manage.profile.index', ['subtitle' => 'Edit Foto'])

@section('profile')

<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">

  <div class="card-header cursor-pointer">
    <div class="card-title m-0">
      <h3 class="fw-bolder m-0">Edit Foto Profil</h3>
    </div>
  </div>

  <form action="{{ route('manage.profile.editfoto') }}" method="POST" enctype="multipart/form-data" id="update-foto">
  @csrf
  @method('PUT')

    <div class="card-body p-9">
      <div class="row mb-6">
        <label class="col-lg-4 col-form-label fw-bold fs-6">Foto Profil</label>
        <div class="col-lg-8">
          <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
            <div class="image-input-wrapper w-125px h-125px" style="background-image: url(/img/profile/{{ Auth::user()->foto }})"></div>
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
              <i class="bi bi-pencil-fill fs-7"></i>
              <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
              <input type="hidden" name="avatar_remove" />
              <input type="hidden" name="old_foto" id="" value="{{ Auth::user()->foto }}" hidden>
            </label>
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
              <i class="bi bi-x fs-2"></i>
            </span>
            @if (Auth::user()->foto != 'profile.jpg')
            <a href="{{ route('manage.profile.deletefoto') }}" id="delete-foto">
              <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-bs-toggle="tooltip" title="Hapus foto profil">
                <i class="bi bi-x fs-2"></i>
              </span>
            </a>
            @endif
          </div>
          <div class="form-text">Jenis file: png, jpg, jpeg.</div>
        </div>
      </div>
    </div>

    <div class="card-footer d-flex justify-content-start py-6 px-9">
      <button type="submit" class="btn btn-sm btn-primary" id="kt_account_profile_details_submit">Simpan</button>
    </div>

  </form>

</div>

@endsection
