<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6" for="name">Nama DU/DI</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="name" id="name" class="form-control form-control-md mb-3 mb-lg-0 @error('name') is-invalid @enderror" placeholder="Ketik Nama DU/DI" value="{{ old('name', $dudi->name) }}" required>
    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6" for="email">
    <span class="required">Email</span>
    <i class="fas fa-exclamation-circle fs-7" data-bs-toggle="tooltip" title="Email Perusahaan"></i>
  </label>
  <div class="col-lg-9 fv-row">
    <input type="email" name="email" id="email" class="form-control form-control-md mb-3 mb-lg-0 @error('email') is-invalid @enderror" placeholder="Ketik Email" value="{{ old('email', $dudi->email) }}" required>
    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6" for="telepon">Telepon</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="telepon" id="telepon" class="form-control form-control-md mb-3 mb-lg-0 @error('telepon') is-invalid @enderror" placeholder="Ketik Telepon" value="{{ old('telepon', $dudi->telepon) }}" required>
    @error('telepon') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6" for="kota">Kota DU/DI</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="kota" id="kota" class="form-control form-control-md mb-3 mb-lg-0 @error('kota') is-invalid @enderror" placeholder="Ketik Kota DU/DI" value="{{ old('kota', $dudi->kota) }}" required>
    @error('kota') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6" for="kota">Alamat</label>
  <div class="col-lg-9 fv-row">
    <textarea name="alamat" id="alamat" rows="3" class="form-control form-control-md mb-3 mb-lg-0 @error('kota') is-invalid @enderror" placeholder="Ketik Alamat">{{ old('alamat', $dudi->alamat) }}</textarea>
    @error('kota') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-8">
  <label class="col-lg-3 col-form-label fw-bold fs-6">Kerjasama</label>
  <div class="col-lg-9 fv-row">
    <div class=" align-items-center mt-lg-3">
      @foreach ($jeniskerjasama as $item)
      <label class="form-check form-check-custom form-check-solid mt-2">
        <input class="form-check-input h-20px w-20px" type="checkbox" name="jenis_kerjasama[]" value="{{ $item->id }}" {{ in_array($item->id, $kerjasama) ? 'checked' : '' }}>
        <span class="form-check-label fw-bold">{{ $item->name }}</span>
      </label>
      @endforeach
    </div>
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6" for="isi">Logo</label>
  <div class="col-lg-9 fw-row">
    <div class="my-1">
      <img src="/img/logo/{{ $dudi->logo }}" alt="logo_dudi" class="img-fluid img-preview" style="width: 100px">
    </div>
    <div class="col fv-row">
      <input type="hidden" name="old_logo" id="old_logo" value="{{ $dudi->logo }}">
      <input id="logo_dudi" class="form-control form-control-sm  mb-3 mb-lg-0 @error('logo_dudi') is-invalid @enderror" type="file" name="logo_dudi" onchange="previewImage()" accept="image/*">
      @error('logo_dudi') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
  </div>
</div>
