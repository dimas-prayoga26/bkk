<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6">Judul Testimoni</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="judul" class="form-control form-control-md mb-3 mb-lg-0 @error('judul') is-invalid @enderror" placeholder="Ketik Judul Testimoni" value="{{ old('judul') }}" required>
    @error('judul') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6">Link Youtube (Embed)</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="link" class="form-control form-control-md mb-3 mb-lg-0 @error('link') is-invalid @enderror" placeholder="Ketik Link Youtube (Embed)" value="{{ old('link') }}" required>
    @error('link') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
