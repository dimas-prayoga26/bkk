<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6" for="judul">Judul Postingan</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="judul" id="judul" class="form-control form-control-md mb-3 mb-lg-0 @error('judul') is-invalid @enderror" placeholder="Ketik Judul Postingan" value="{{ old('judul', $postingan->judul) }}" required>
    @error('judul') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6" for="tanggal">Tanggal Diunggah</label>
  <div class="col-lg-9 fv-row">
    <input type="date" name="tanggal" id="tanggal" class="form-control form-control-md mb-3 mb-lg-0 @error('tanggal') is-invalid @enderror" placeholder="Ketik Tanggal Diunggah" value="{{ old('tanggal', $postingan->tanggal) ?: now()->toDateString() }}" required>
    @error('tanggal') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="kategori">Kategori</label>
  <div class="col-lg-9 fv-row">
    <select name="kategori" id="kategori" data-kt-select2="false" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('kategori') is-invalid @enderror" required>
      <option selected disabled value="">-- Pilih --</option>
      @foreach (['pengumuman','artikel','berita'] as $item)
        <option value="{{ $item }}" {{ old('kategori', $postingan->kategori) == $item ? 'selected' : '' }}>{{ strtoupper($item) }}</option>
      @endforeach
    </select>
    @error('kategori') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6">
    <span class="required">Status Publikasi</span>
    <i class="fas fa-exclamation-circle fs-7" data-bs-toggle="tooltip" title="Pilih Publik jika ingin tampil di halaman pengunjung"></i>
  </label>
  <div class="col-lg-9 fv-row">
    <select name="status" id="status" data-kt-select2="false" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('status') is-invalid @enderror" required>
      @foreach (['public','private'] as $item)
        <option value="{{ $item }}" {{ old('status', $postingan->status) == $item ? 'selected' : '' }}>{{ $item == 'public' ? 'Publik' : 'Privasi' }}</option>
      @endforeach
    </select>
    @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6" for="isi">Ubah Cover (Gambar)</label>
  <div class="my-1">
    <img src="/img/postingan/{{ $postingan->cover }}" alt="cover" class="img-fluid img-preview" style="width: 300px">
  </div>
  <div class="col fv-row">
    <input type="hidden" name="old_cover" id="old_cover" value="{{ $postingan->cover }}">
    <input id="cover" class="form-control form-control-sm  mb-3 mb-lg-0 @error('cover') is-invalid @enderror" type="file" name="cover" onchange="previewImage()" accept="image/*">
    @error('cover') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-2">
  <label class="col-lg-3 col-form-label required fw-bold fs-6" for="isi">Isi</label>
</div>
<div class="row">
  <div class="col fv-row">
    <input id="isi" type="hidden" name="isi">
    <trix-editor input="isi">{!! $postingan->isi !!}</trix-editor>
  </div>
  @error('isi') <span class="text-danger small mt-2">{{ $message }}</span> @enderror
</div>
