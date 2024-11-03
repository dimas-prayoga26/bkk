<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6" for="isi">Cover (Gambar)</label>
  <div class="my-1">
    <img src="/img/tentang/cover-tentang.jpg" alt="cover" class="img-fluid img-preview" style="width: 300px">
  </div>
  <div class="col fv-row">
    <input id="cover" class="form-control form-control-sm  mb-3 mb-lg-0 @error('cover') is-invalid @enderror" type="file" name="cover" onchange="previewImage()" accept="image/*" required>
    @error('cover') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-2">
  <label class="col-lg-3 col-form-label required fw-bold fs-6" for="isi">Isi</label>
</div>
<div class="row">
  <div class="col fv-row">
    <input id="isi" type="hidden" name="isi">
    <trix-editor input="isi"></trix-editor>
  </div>
  @error('isi') <span class="text-danger small mt-2">{{ $message }}</span> @enderror
</div>
