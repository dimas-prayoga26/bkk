<!DOCTYPE html>

<html lang="en">
	<head>
		<title>{{ config('app.name') }} | Register </title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />

		<link rel="shortcut icon" href="/assets/media/logos/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Toastr --}}
    <link href="/toastr/toastr.css" rel="stylesheet">

	</head>
	<body id="kt_body" class="bg-body" style="font-family: 'Figtree">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<a href="#" class="mb-12">
          {{-- <img alt="Logo" src="/assets/media/logos/logo-2.svg" class="h-60px logo" /> --}}
          <img alt="Logo" src="/img/logo/sekolah-logo.png" class="h-100px logo" />
        </a>
					<div class="w-lg-800px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<form class="form w-100" action="{{ route('register.store') }}" method="POST" id="form-register">
              @csrf

							<div class="text-center mb-10">
								<h1 class="text-dark mb-3">DAFTAR</h1>
								<div class="text-gray-400 fw-bold fs-4">{{ config('app.name') }}</div>
							</div>

              <div class="row mb-4">
                <label class="col-lg-3 col-form-label required fw-bold fs-6" for="name">Nama Pelamar</label>
                <div class="col-lg-9 fv-row">
                  <input type="text" name="name" class="form-control form-control-md mb-3 mb-lg-0 @error('name') is-invalid @enderror" placeholder="Ketik Nama Pelamar" value="{{ old('name') }}" required>
                  @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row mb-4">
                <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="type">Jenis Pelamar</label>
                <div class="col-lg-9 fv-row">
                  <select name="type" id="type" data-hide-search="true" data-kt-select2="true" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('type') is-invalid @enderror" required>
                    <option></option>
                    @foreach (['umum','alumni'] as $item)
                      <option value="{{ $item }}" {{ old('type') == $item ? 'selected' : '' }} >Pelamar {{ $item }}</option>
                    @endforeach
                  </select>
                  @error('type') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row mb-4">
                <label class="col-lg-3 required col-form-label fw-bold fs-6" for="nik">NIK</label>
                <div class="col-lg-9 fv-row">
                  <input type="number" name="nik" class="form-control form-control-md mb-3 mb-lg-0 @error('nik') is-invalid @enderror" placeholder="Ketik NIK" value="{{ old('nik') }}" required>
                  @error('nik') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row mb-4">
                <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="jk">Jenis Kelamin</label>
                <div class="col-lg-9 fv-row">
                  <select name="jk" id="jk" data-kt-select2="true" data-hide-search="true" data-placeholder="Pilih..." data-allow-clear="true" class="form-select form-select-md @error('jk') is-invalid @enderror" required>
                    <option></option>
                    @foreach (['l','p'] as $item)
                      <option value="{{ $item }}" {{ old('jk') == $item ? 'selected' : '' }}>{{ $item == 'l' ? 'Laki-laki' : 'Perempuan' }}</option>
                    @endforeach
                  </select>
                  @error('jk') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row mb-4">
                <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="tempatlahir">Tempat Lahir</label>
                <div class="col-lg-9 fv-row">
                  <input type="text" name="tempatlahir" class="form-control form-control-md mb-3 mb-lg-0 @error('tempatlahir') is-invalid @enderror" placeholder="Ketik Tempat Lahir" value="{{ old('tempatlahir') }}" required>
                  @error('tempatlahir') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row mb-4">
                <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="tanggallahir">Tanggal Lahir</label>
                <div class="col-lg-9 fv-row">
                  <input type="date" name="tanggallahir" class="form-control form-control-md mb-3 mb-lg-0 @error('tanggallahir') is-invalid @enderror" placeholder="Ketik Tanggal Lahir" value="{{ old('tanggallahir') }}" required>
                  @error('tanggallahir') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row mb-4">
                <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="telepon">Telepon</label>
                <div class="col-lg-9 fv-row">
                  <input type="number" name="telepon" class="form-control form-control-md mb-3 mb-lg-0 @error('telepon') is-invalid @enderror" placeholder="Ketik Telepon" value="{{ old('telepon') }}" required>
                  @error('telepon') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row mb-4">
                <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="alamat">Alamat</label>
                <div class="col-lg-9 fv-row">
                  <textarea name="alamat" id="alamat" rows="3" class="form-control form-control-md mb-3 mb-lg-0 @error('alamat') is-invalid @enderror" placeholder="Ketik Alamat" required>{{ old('alamat') }}</textarea>
                  @error('alamat') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row mb-4">
                <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="pend_terakhir">Pendidikan Terakhir</label>
                <div class="col-lg-9 fv-row">
                  <input type="text" name="pend_terakhir" class="form-control form-control-md mb-3 mb-lg-0 @error('pend_terakhir') is-invalid @enderror" placeholder="Ketik Pendidikan Terakhir" value="{{ old('pend_terakhir') }}" required>
                  @error('pend_terakhir') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row mb-4">
                <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="jurusan_terakhir">Jurusan Terakhir</label>
                <div class="col-lg-9 fv-row">
                  <input type="text" name="jurusan_terakhir" class="form-control form-control-md mb-3 mb-lg-0 @error('jurusan_terakhir') is-invalid @enderror" placeholder="Ketik Jurusan Terakhir" value="{{ old('jurusan_terakhir') }}" required>
                  @error('jurusan_terakhir') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row mb-4">
                <label class="col-lg-3 col-form-label fw-bold fs-6 required" for="tahun_lulus">Tahun Lulus</label>
                <div class="col-lg-9 fv-row">
                  <input type="number" name="tahun_lulus" class="form-control form-control-md mb-3 mb-lg-0 @error('tahun_lulus') is-invalid @enderror" placeholder="Ketik Tahun Lulus" value="{{ old('tahun_lulus') }}" required>
                  @error('tahun_lulus') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row mb-4">
                <label class="col-lg-3 col-form-label fw-bold fs-6">
                  <span class="required">Email</span>
                  <i class="fas fa-exclamation-circle fs-7" data-bs-toggle="tooltip" title="Email users"></i>
                </label>
                <div class="col-lg-9 fv-row">
                  <input type="email" name="email" class="form-control form-control-md mb-3 mb-lg-0 @error('email') is-invalid @enderror" placeholder="Ketik Email" value="{{ old('email') }}" required>
                  @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row" data-kt-password-meter="true">
                <label class="col-lg-3 col-form-label fw-bold fs-6 required">Password</label>
                <div class="col-lg-9 fv-row position-relative">
                  <input class="form-control form-control-md @error('password') is-invalid @enderror" type="password" placeholder="Ketik Password" name="password" autocomplete="off" required>
                  <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="bi bi-eye-slash fs-2"></i>
                    <i class="bi bi-eye fs-2 d-none"></i>
                  </span>
                  @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
              </div>


							<div class="text-center mt-5">
                <button type="submit" class="btn btn-lg btn-primary w-100 mb-5" id="register-store" >
                  <span class="indicator-label">Daftar</span>
                  <span class="indicator-progress">Daftar...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
							</div>
						</form>

            <p class="h5">Sudah memiliki Akun? <a href="{{ route('login') }}">Login</a> </p>

					</div>
				</div>

			</div>
		</div>
		<script>var hostUrl = "/assets/";</script>
		<script src="/assets/plugins/global/plugins.bundle.js"></script>
		<script src="/assets/js/scripts.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $('#form-register').on('submit', function() {
        $('#register-store').attr("data-kt-indicator", "on");
        $('#register-store').attr("disabled", true);
      });
    </script>

    {{-- Toastr --}}
    <script src="/toastr/toastr.js"></script>
    <x-admin.toastr></x-admin.toastr>
	</body>
</html>
