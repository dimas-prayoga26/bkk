<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{ config('app.name') }} | Forgot Password</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />

		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
		<link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		{{-- Toastr --}}
		<link href="{{ asset('toastr/toastr.css') }}" rel="stylesheet">
	</head>
	<body id="kt_body" class="bg-body" style="font-family: 'Figtree'">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url('{{ asset('assets/media/illustrations/sketchy-1/14.png') }}')">
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<a href="{{ route('home') }}" class="mb-12">
						<img alt="Logo" src="{{ asset('img/logo/sekolah-logo.png') }}" class="h-100px logo" />
					</a>
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<form class="form w-100" action="{{ route('password.email') }}" method="POST" id="form-password-email">
							@csrf
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Email</label>
								<input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="off" placeholder="Ketik Email" required>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-lg btn-primary w-100 mb-5" id="submit-email">
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Submitting...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<script>var hostUrl = "{{ asset('assets/') }}";</script>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script>
			$('#form-password-email').on('submit', function() {
				$('#submit-email').attr("data-kt-indicator", "on");
				$('#submit-email').attr("disabled", true);
			});
		</script>

		{{-- Toastr --}}
		<script src="{{ asset('toastr/toastr.js') }}"></script>
		<x-admin.toastr></x-admin.toastr>
	</body>
</html>
