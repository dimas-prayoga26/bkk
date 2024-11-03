<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6">Nama Admin</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="name" class="form-control form-control-md mb-3 mb-lg-0 @error('name') is-invalid @enderror" placeholder="Ketik Nama Admin" value="{{ old('name', $admin->user->name) }}" required>
    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="type">Jenis Admin</label>
  <div class="col-lg-9 fv-row">
    <select name="type" data-hide-search="true" id="type" data-kt-select2="true" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('type') is-invalid @enderror" required>
      <option></option>
      @foreach (['sekolah','dudi'] as $item)
        <option value="{{ $item }}" {{ old('type', $admin->type ) == $item ? 'selected' : '' }}>Admin {{ $item == 'sekolah' ? 'Sekolah' : 'DU/DI'}}</option>
      @endforeach
    </select>
    @error('type') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4 {{ ($admin->dudi_id == null) ? 'd-none' : '' }}" id="select-div">
  <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="dudi_id">DU/DI</label>
  <div class="col-lg-9 fv-row">
    <select name="dudi_id" id="dudi_id" data-kt-select2="true" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('dudi_id') is-invalid @enderror">
      <option></option>
      @foreach ($dudi as $item)
        <option value="{{ $item->id }}" {{ old('dudi_id', $admin->dudi_id ) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
      @endforeach
    </select>
    @error('dudi_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6" for="jk">Jenis Kelamin</label>
  <div class="col-lg-9 fv-row">
    <select name="jk" id="jk" data-hide-search="true" data-kt-select2="true" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('jk') is-invalid @enderror">
      <option></option>
      @foreach (['l','p'] as $item)
        <option value="{{ $item }}" {{ old('jk', $admin->user->jk) == $item ? 'selected' : '' }}>{{ $item == 'l' ? 'Laki-laki' : 'Perempuan' }}</option>
      @endforeach
    </select>
    @error('jk') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6" for="tempatlahir">Tempat Lahir</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="tempatlahir" class="form-control form-control-md mb-3 mb-lg-0 @error('tempatlahir') is-invalid @enderror" placeholder="Ketik Tempat Lahir" value="{{ old('tempatlahir', $admin->user->tempatlahir) }}">
    @error('tempatlahir') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6" for="tanggallahir">Tanggal Lahir</label>
  <div class="col-lg-9 fv-row">
    <input type="date" name="tanggallahir" class="form-control form-control-md mb-3 mb-lg-0 @error('tanggallahir') is-invalid @enderror" placeholder="Ketik Tanggal Lahir" value="{{ old('tanggallahir', $admin->user->tanggallahir) }}">
    @error('tanggallahir') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6" for="telepon">Telepon</label>
  <div class="col-lg-9 fv-row">
    <input type="number" name="telepon" class="form-control form-control-md mb-3 mb-lg-0 @error('telepon') is-invalid @enderror" placeholder="Ketik Telepon" value="{{ old('telepon', $admin->user->telepon) }}">
    @error('telepon') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6" for="alamat">Alamat</label>
  <div class="col-lg-9 fv-row">
    <textarea name="alamat" id="alamat" rows="3" class="form-control form-control-md mb-3 mb-lg-0 @error('alamat') is-invalid @enderror" placeholder="Ketik Alamat">{{ old('alamat', $admin->user->alamat) }}</textarea>
    @error('alamat') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="is_aktif">Status Akun</label>
  <div class="col-lg-9 fv-row">
    <select name="is_aktif" id="is_aktif" data-hide-search="true" data-kt-select2="true" data-placeholder="Pilih..." data-allow-clear="false" class="form-select form-select-md @error('is_aktif') is-invalid @enderror" required>
      <option></option>
      @foreach ([1,0] as $item)
        <option value="{{ $item }}" {{ old('is_aktif', $admin->user->is_aktif ) == $item ? 'selected' : '' }}>{{ $item == 1 ? 'AKTIF' : 'NON-AKTIF' }}</option>
      @endforeach
    </select>
    @error('is_aktif') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6">
    <span class="required">Email</span>
    <i class="fas fa-exclamation-circle fs-7" data-bs-toggle="tooltip" title="Email users"></i>
  </label>
  <div class="col-lg-9 fv-row">
    <input type="email" name="email" class="form-control form-control-md mb-3 mb-lg-0 @error('email') is-invalid @enderror" placeholder="Ketik Email" value="{{ old('email', $admin->user->email) }}" required>
    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row" data-kt-password-meter="true">
  <label class="col-lg-3 col-form-label fw-bold fs-6">Password (Opsional)</label>
  <div class="col-lg-9 fv-row position-relative">
    <input class="form-control form-control-md @error('password') is-invalid @enderror" type="password" placeholder="Ketik Password" name="password" autocomplete="off">
    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
      <i class="bi bi-eye-slash fs-2"></i>
      <i class="bi bi-eye fs-2 d-none"></i>
    </span>
    @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
