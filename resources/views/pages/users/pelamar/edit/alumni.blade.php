@extends('pages.users.pelamar.edit.index', ['subtitle' => 'Tracer Alumni'])

@section('profile')

<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
  <div class="card-header cursor-pointer">
    <div class="card-title m-0">
      <h3 class="fw-bolder m-0">Tracer Alumni</h3>
    </div>
  </div>

  <form action="{{ route('user.pelamar.update',[$pelamar, 'alumni']) }}" method="POST" id="form-edit-alumni">
  @csrf
  @method('PUT')

    <div class="card-body p-9">

      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="angkatan_id">Tahun Angkatan</label>
        <div class="col-lg-9 fv-row">
          <select name="angkatan_id" id="angkatan_id" data-kt-select2="true" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('angkatan_id') is-invalid @enderror" required>
            <option></option>
            @foreach ($angkatan as $item)
              <option value="{{ $item->id }}" {{ old('angkatan_id', $pelamar->alumni->angkatan_id ) == $item->id ? 'selected' : '' }} > {{ $item->tahun }}</option>
            @endforeach
          </select>
          @error('angkatan_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>

      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="jurusan_id">Jurusan/Prodi</label>
        <div class="col-lg-9 fv-row">
          <select name="jurusan_id" id="jurusan_id" data-kt-select2="true" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('jurusan_id') is-invalid @enderror" required>
            <option></option>
            @foreach ($jurusan as $item)
              <option value="{{ $item->id }}" {{ old('jurusan_id', $pelamar->alumni->jurusan_id ) == $item->id ? 'selected' : '' }} > {{ $item->name }}</option>
            @endforeach
          </select>
          @error('jurusan_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>

      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="kegiatan_id">Kegiatan Saat Ini</label>
        <div class="col-lg-9 fv-row">
          <select name="kegiatan_id" id="kegiatan_id" data-kt-select2="true" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('kegiatan_id') is-invalid @enderror" required>
            <option></option>
            @foreach ($kegiatan as $item)
              <option value="{{ $item->id }}" {{ old('kegiatan_id', $pelamar->alumni->kegiatan_id ) == $item->id ? 'selected' : '' }} > {{ $item->name }}</option>
            @endforeach
          </select>
          @error('kegiatan_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>

      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6" for="pekerjaan">Pekerjaan Saat Ini</label>
        <div class="col-lg-9 fv-row">
          <input type="text" name="pekerjaan" class="form-control form-control-md mb-3 mb-lg-0 @error('pekerjaan') is-invalid @enderror" placeholder="Ketik Pekerjaan Saat Ini" value="{{ old('pekerjaan', $pelamar->alumni->pekerjaan) }}">
          @error('pekerjaan') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>

      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6">Apakah Pekerjaan anda Relevan dengan jurusan?</label>
        <div class="col-lg-9 fv-row">
          <div class=" align-items-center mt-lg-3">
            @foreach ([1, 0] as $item)
            <label class="form-check form-check-custom form-check-solid mt-2">
              <input class="form-check-input h-20px w-20px" type="radio" name="relevan[]" value="{{ $item }}" {{ $pelamar->alumni->relevan == $item ? 'checked' : '' }}>
              <span class="form-check-label fw-bold">{{ $item == '1' ? 'Ya, Relevan' : 'Tidak'}}</span>
            </label>
            @endforeach
          </div>
          @error('relevan') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>

      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6" for="tahun_mulai">Tahun Mulai Bekerja</label>
        <div class="col-lg-9 fv-row">
          <input type="text" name="tahun_mulai" class="form-control form-control-md mb-3 mb-lg-0 @error('tahun_mulai') is-invalid @enderror" placeholder="Ketik Tahun Mulai Bekerja" value="{{ old('tahun_mulai', $pelamar->alumni->tahun_mulai) }}">
          @error('tahun_mulai') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>

      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6" for="nama_dudi">Nama DU/DI</label>
        <div class="col-lg-9 fv-row">
          <input type="text" name="nama_dudi" class="form-control form-control-md mb-3 mb-lg-0 @error('nama_dudi') is-invalid @enderror" placeholder="Ketik Nama DU/DI" value="{{ old('nama_dudi', $pelamar->alumni->nama_dudi) }}">
          @error('nama_dudi') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>

      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6" for="bidang_dudi">Bidang DU/DI</label>
        <div class="col-lg-9 fv-row">
          <input type="text" name="bidang_dudi" class="form-control form-control-md mb-3 mb-lg-0 @error('bidang_dudi') is-invalid @enderror" placeholder="Ketik Bidang DU/DI" value="{{ old('bidang_dudi', $pelamar->alumni->bidang_dudi) }}">
          @error('bidang_dudi') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>

      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6" for="alamat_dudi">Alamat DU/DI</label>
        <div class="col-lg-9 fv-row">
          <textarea name="alamat_dudi" id="alamat_dudi" rows="3" class="form-control form-control-md mb-3 mb-lg-0 @error('alamat_dudi') is-invalid @enderror" placeholder="Ketik Alamat DU/DI">{{ old('alamat_dudi', $pelamar->alumni->alamat_dudi) }}</textarea>
          @error('alamat_dudi') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>

      <div class="row mb-4">
        <label class="col-lg-3 col-form-label fw-bold fs-6" for="alamat">Penghasilan/Pendapatan</label>
        <div class="col-lg-9 fv-row">
          <select class="form-select @error('penghasilan') is-invalid @enderror" data-control="select2" data-hide-search="true" data-placeholder="Pilih..." name="penghasilan">
            <option value="" selected>Pilih...</option>
            @foreach ($penghasilan as $item)
              <option value="{{ $item }}" {{ old('penghasilan', $item) == $pelamar->alumni->penghasilan ? 'selected' : '' }}>{{ $item }}</option>
            @endforeach
          </select>
          @error('penghasilan') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>

    </div>
    <div class="card-footer d-flex justify-content-start py-6 px-9">
      <button type="submit" class="btn btn-sm btn-primary" id="kt_account_profile_details_submit">Simpan</button>
    </div>

  </form>

</div>

@endsection
