<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6">Nama Kerjasama</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="name" class="form-control form-control-md mb-3 mb-lg-0 @error('name') is-invalid @enderror" placeholder="Ketik Nama Kerjasama" value="{{ old('name', $kerjasama->name) }}" required>
    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
