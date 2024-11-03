@extends('pages.users.pelamar.edit.index', ['subtitle' => 'Data'])

@section('profile')

<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
  <div class="card-header cursor-pointer">
    <div class="card-title m-0">
      <h3 class="fw-bolder m-0">Edit Data</h3>
    </div>
  </div>

  <form action="{{ route('user.pelamar.update',[$pelamar, 'data']) }}" method="POST" id="update-profil">
  @csrf
  @method('PUT')

    <div class="card-body p-9">

      <div class="row mb-4">
        <label class="col-lg-3 col-form-label required fw-bold fs-6" for="name">Nama Pelamar</label>
        <div class="col-lg-9 fv-row">
          <input type="text" name="name" class="form-control form-control-md mb-3 mb-lg-0 @error('name') is-invalid @enderror" placeholder="Ketik Nama Pelamar" value="{{ old('name', $pelamar->user->name) }}" required>
          @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
      {{-- <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="type">Jenis Pelamar</label>
        <div class="col-lg-9 fv-row">
          <select name="type" id="type" data-kt-select2="true" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('type') is-invalid @enderror" required>
            <option></option>
            @foreach (['umum','alumni'] as $item)
              <option value="{{ $item }}" {{ old('type', $pelamar->type ) == $item ? 'selected' : '' }} >Pelamar {{ $item }}</option>
            @endforeach
          </select>
          @error('type') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div> --}}
      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6" for="nik">NIK</label>
        <div class="col-lg-9 fv-row">
          <input type="number" name="nik" class="form-control form-control-md mb-3 mb-lg-0 @error('nik') is-invalid @enderror" placeholder="Ketik NIK" value="{{ old('nik', $pelamar->nik) }}">
          @error('nik') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6" for="jk">Jenis Kelamin</label>
        <div class="col-lg-9 fv-row">
          <select name="jk" id="jk" data-kt-select2="true" data-hide-search="true" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('jk') is-invalid @enderror">
            <option></option>
            @foreach (['l','p'] as $item)
              <option value="{{ $item }}" {{ old('jk', $pelamar->user->jk) == $item ? 'selected' : '' }}>{{ $item == 'l' ? 'Laki-laki' : 'Perempuan' }}</option>
            @endforeach
          </select>
          @error('jk') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6" for="tempatlahir">Tempat Lahir</label>
        <div class="col-lg-9 fv-row">
          <input type="text" name="tempatlahir" class="form-control form-control-md mb-3 mb-lg-0 @error('tempatlahir') is-invalid @enderror" placeholder="Ketik Tempat Lahir" value="{{ old('tempatlahir', $pelamar->user->tempatlahir) }}">
          @error('tempatlahir') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6" for="tanggallahir">Tanggal Lahir</label>
        <div class="col-lg-9 fv-row">
          <input type="date" name="tanggallahir" class="form-control form-control-md mb-3 mb-lg-0 @error('tanggallahir') is-invalid @enderror" placeholder="Ketik Tanggal Lahir" value="{{ old('tanggallahir', $pelamar->user->tanggallahir) }}">
          @error('tanggallahir') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6" for="telepon">Telepon</label>
        <div class="col-lg-9 fv-row">
          <input type="number" name="telepon" class="form-control form-control-md mb-3 mb-lg-0 @error('telepon') is-invalid @enderror" placeholder="Ketik Telepon" value="{{ old('telepon', $pelamar->user->telepon) }}">
          @error('telepon') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6" for="alamat">Alamat</label>
        <div class="col-lg-9 fv-row">
          <textarea name="alamat" id="alamat" rows="3" class="form-control form-control-md mb-3 mb-lg-0 @error('alamat') is-invalid @enderror" placeholder="Ketik Alamat">{{ old('alamat', $pelamar->user->alamat) }}</textarea>
          @error('alamat') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6" for="pend_terakhir">Pendidikan Terakhir</label>
        <div class="col-lg-9 fv-row">
          <input type="text" name="pend_terakhir" class="form-control form-control-md mb-3 mb-lg-0 @error('pend_terakhir') is-invalid @enderror" placeholder="Ketik Pendidikan Terakhir" value="{{ old('pend_terakhir', $pelamar->pend_terakhir) }}">
          @error('pend_terakhir') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6" for="jurusan_terakhir">Jurusan Terakhir</label>
        <div class="col-lg-9 fv-row">
          <input type="text" name="jurusan_terakhir" class="form-control form-control-md mb-3 mb-lg-0 @error('jurusan_terakhir') is-invalid @enderror" placeholder="Ketik Jurusan Terakhir" value="{{ old('jurusan_terakhir', $pelamar->jurusan_terakhir) }}">
          @error('jurusan_terakhir') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6" for="tahun_lulus">Tahun Lulus</label>
        <div class="col-lg-9 fv-row">
          <input type="number" name="tahun_lulus" class="form-control form-control-md mb-3 mb-lg-0 @error('tahun_lulus') is-invalid @enderror" placeholder="Ketik Tahun Lulus" value="{{ old('tahun_lulus', $pelamar->tahun_lulus) }}">
          @error('tahun_lulus') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6">
          <span class="required">Email</span>
          <i class="fas fa-exclamation-circle fs-7" data-bs-toggle="tooltip" title="Email users"></i>
        </label>
        <div class="col-lg-9 fv-row">
          <input type="email" name="email" class="form-control form-control-md mb-3 mb-lg-0 @error('email') is-invalid @enderror" placeholder="Ketik Email" value="{{ old('email', $pelamar->user->email) }}" required>
          @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="row" data-kt-password-meter="true">
        <label class="col-lg-3 col-form-label fw-bold fs-6">Password Baru (Opsional)</label>
        <div class="col-lg-9 fv-row position-relative">
          <input class="form-control form-control-md @error('password') is-invalid @enderror" type="password" placeholder="Ketik Password" name="password" autocomplete="off">
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
