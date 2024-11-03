<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6" for="judul">Pemosting</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="" id="pemosting" class="form-control form-control-md bg-light mb-3 mb-lg-0 @error('pemosting') is-invalid @enderror" placeholder="Ketik Pemosting" value="{{ Auth::user()->name }}" readonly disabled>
    @error('pemosting') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6">
    <span class="required">Jenis Informasi</span>
    <i class="fas fa-exclamation-circle fs-7" data-bs-toggle="tooltip" title="Pilih info internal agar bisa melamar di aplikasi"></i>
  </label>
  <div class="col-lg-9 fv-row">
    <select name="info" id="info" data-kt-select2="true" data-hide-search="true" data-placeholder="Pilih..." data-allow-clear="false" class="form-select form-select-md @error('info') is-invalid @enderror" required>
      <option></option>
      @foreach (['internal','eksternal'] as $item)
        <option value="{{ $item }}" {{ old('info') == $item ? 'selected' : '' }}>{{ $item == 'internal' ? 'Internal' : 'Eksternal' }}</option>
      @endforeach
    </select>
    @error('info') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="dudi_id">DU/DI</label>
  <div class="col-lg-9 fv-row">
    <select name="dudi_id" @can('admindudi') data-hide-search="true" @endcan  id="dudi_id" data-kt-select2="true" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('dudi_id') is-invalid @enderror" required>
      <option></option>
      @foreach ($dudi as $item)
        <option value="{{ $item->id }}" {{ old('dudi_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
      @endforeach
    </select>
    @error('dudi_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6" for="judul">Judul Lowongan Kerja</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="judul" id="judul" class="form-control form-control-md mb-3 mb-lg-0 @error('judul') is-invalid @enderror" placeholder="Ketik Judul Lowongan Kerja" value="{{ old('judul') }}" required>
    @error('judul') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6" for="posisi">Posisi/Jabatan</label>
  <div class="col-lg-9 fv-row">
    <input type="text" name="posisi" id="posisi" class="form-control form-control-md mb-3 mb-lg-0 @error('posisi') is-invalid @enderror" placeholder="Ketik Posisi/Jabatan" value="{{ old('posisi') }}" required>
    @error('posisi') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="kual_pend">Kualifikasi Pendidikan</label>
  <div class="col-lg-9 fv-row">
    <select name="kual_pend" id="kual_pend" data-kt-select2="true" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('kual_pend') is-invalid @enderror" required>
      <option></option>
      @foreach ($kual_pend as $i => $item)
        <option value="{{ $i }}" {{ old('kual_pend') == $i ? 'selected' : '' }}>{{ $item }}</option>
      @endforeach
    </select>
    @error('kual_pend') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6" for="kual_jurusan">Kualifikasi Jurusan</label>
  <div class="col-lg-9 fv-row">
    <textarea name="kual_jurusan" id="kual_jurusan" rows="3" class="form-control form-control-md mb-3 mb-lg-0 @error('kual_jurusan') is-invalid @enderror" placeholder="Ketik Kualifikasi Jurusan">{{ old('kual_jurusan') }}</textarea>
    @error('kual_jurusan') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6" for="tanggal_diunggah">Tanggal Diunggah</label>
  <div class="col-lg-9 fv-row">
    <input type="date" name="tanggal_diunggah" id="tanggal_diunggah" class="form-control form-control-md mb-3 mb-lg-0 @error('tanggal_diunggah') is-invalid @enderror" placeholder="Ketik Tanggal Diunggah" value="{{ old('tanggal_diunggah') ?: now()->toDateString() }}" required>
    @error('tanggal_diunggah') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6" for="tanggal_batas">
    <span class="required">Tanggal Batas Lamaran</span>
    <i class="fas fa-exclamation-circle fs-7" data-bs-toggle="tooltip" title="Tanggal terakhir pengguna bisa melamar"></i>
  </label>
  <div class="col-lg-9 fv-row">
    <input type="date" name="tanggal_batas" id="tanggal_batas" class="form-control form-control-md mb-3 mb-lg-0 @error('tanggal_batas') is-invalid @enderror" placeholder="Ketik Tanggal Diunggah" value="{{ old('tanggal_batas') }}" required>
    @error('tanggal_batas') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label fw-bold fs-6">
    <span class="required">Status Publikasi</span>
    <i class="fas fa-exclamation-circle fs-7" data-bs-toggle="tooltip" title="Pilih Dibuka agar pengguna bisa melamar"></i>
  </label>
  <div class="col-lg-9 fv-row">
    <select name="status" id="status" data-kt-select2="false" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('status') is-invalid @enderror" required>
      @foreach (['buka','tutup'] as $item)
        <option value="{{ $item }}" {{ old('status') == $item ? 'selected' : '' }}>{{ $item == 'buka' ? 'Dibuka' : 'Ditutup' }}</option>
      @endforeach
    </select>
    @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-4">
  <label class="col-lg-3 col-form-label required fw-bold fs-6" for="isi">Cover (Gambar)</label>
  <div class="my-1">
    <img src="/img/loker/cover-loker.jpg" alt="cover" class="img-fluid img-preview" style="width: 300px">
  </div>
  <div class="col fv-row">
    <input id="cover" class="form-control form-control-sm  mb-3 mb-lg-0 @error('cover') is-invalid @enderror" type="file" name="cover_loker" onchange="previewImage()" accept="image/*" required>
    @error('cover') <span class="invalid-feedback">{{ $message }}</span> @enderror
  </div>
</div>
<div class="row mb-2">
  <label class="col-lg-3 col-form-label required fw-bold fs-6" for="isi">Isi</label>
</div>
<div class="row">
  <div class="col fv-row">
    <input id="isi" type="hidden" name="isi">
    <trix-editor input="isi" required>{!! old('isi') !!}</trix-editor>
  </div>
  @error('isi') <span class="text-danger small mt-2">{{ $message }}</span> @enderror
</div>
