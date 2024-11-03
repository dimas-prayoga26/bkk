<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6">Tahun Angkatan</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="tahun" class="form-control form-control-md mb-3 mb-lg-0 @error('tahun') is-invalid @enderror" placeholder="Ketik Tahun Angkatan" value="{{ old('tahun', $angkatan->tahun) }}" required>
    @error('tahun') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
