<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6">Nama Jurusan</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="name" class="form-control form-control-md mb-3 mb-lg-0 @error('name') is-invalid @enderror" placeholder="Ketik Nama Jurusan" value="{{ old('name') }}" required>
    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6">Singkatan</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="singkatan" class="form-control form-control-md mb-3 mb-lg-0 @error('singkatan') is-invalid @enderror" placeholder="Ketik Singkatan" value="{{ old('singkatan') }}" required>
    @error('singkatan') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
