<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6">Nama Kegiatan</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="name" class="form-control form-control-md mb-3 mb-lg-0 @error('name') is-invalid @enderror" placeholder="Ketik Nama Kegiatan" value="{{ old('name', $kegiatan->name) }}" required>
    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
