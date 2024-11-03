<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6">Nama Pelamar</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="name" class="form-control form-control-md mb-3 mb-lg-0 @error('name') is-invalid @enderror" placeholder="Ketik Nama Pelamar" value="{{ old('name') }}" required>
    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="type">Jenis Pelamar</label>
  <div class="col-lg-9 fv-row">
    <select name="type" id="type" data-hide-search="true" data-kt-select2="true" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('type') is-invalid @enderror" required>
      <option></option>
      @foreach (['umum','alumni'] as $item)
        <option value="{{ $item }}" {{ old('type') == $item ? 'selected' : '' }} >Pelamar {{ $item }}</option>
      @endforeach
    </select>
    @error('type') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6">
    <span class="required">Email</span>
    <i class="fas fa-exclamation-circle fs-7" data-bs-toggle="tooltip" title="Email users"></i>
  </label>
  <div class="col-lg-9 fv-row">
    <input type="email" name="email" class="form-control form-control-md mb-3 mb-lg-0 @error('email') is-invalid @enderror" placeholder="Ketik Email" value="{{ old('email') }}" required>
    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row" data-kt-password-meter="true">
  <label class="col-lg-3 col-form-label required fw-bold fs-6">Password</label>
  <div class="col-lg-9 fv-row position-relative">
    <input class="form-control form-control-md @error('password') is-invalid @enderror" type="password" placeholder="Ketik Password" name="password" autocomplete="off" required>
    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
      <i class="bi bi-eye-slash fs-2"></i>
      <i class="bi bi-eye fs-2 d-none"></i>
    </span>
    @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
