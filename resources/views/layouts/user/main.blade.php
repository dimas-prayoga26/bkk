<!DOCTYPE html>
<html lang="en">
	<head><base href="../">
		<title>
      @isset($title)
        {{ config('app.name') | $title}}
      @else
        {{ config('app.name') }}
      @endisset
    </title>
    <meta name="author" content="Elfan Hari Saputra | VANZDEV" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
    <meta property="og:locale" content="id_ID" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="" />
		<meta property="og:site_name" content="{{ config('app.name') }}" />
		<link rel="shortcut icon" href="/img/logo/sekolah-logo.png" />
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    {{-- Yajra Datatable --}}
    <link href="/yajra/datatable.css" rel="stylesheet">

    {{-- Toastr --}}
    <link href="/toastr/toastr.css" rel="stylesheet">
    @yield('css')
    <link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    {{-- CUSTOMIZE CSS --}}
    <link href="/customize/style.css" rel="stylesheet">
	</head>
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px; font-family: 'Figtree';">

		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">

				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

          {{-- Header --}}
					<div id="kt_header" style="" class="header align-items-stretch">

						<div class="container-xxl d-flex align-items-stretch justify-content-between">
							<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
								<a href="{{ route('home') }}">
									{{-- <img alt="Logo" src="/assets/media/logos/logo-2.svg" class="h-20px h-lg-30px" /> --}}
									<img alt="Logo" src="/img/logo/sekolah-logo.png" class="h-20px h-lg-30px" />
								</a>
							</div>
							<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                <x-user.navbar></x-user.navbar>
							</div>
						</div>

					</div>

          {{-- Content --}}
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					  @yield('content')
          </div>


          {{-- Footer --}}
          <x-user.footer></x-user.footer>

          {{-- Logout --}}
					@include('pages.auth.logout')

				</div>
			</div>
	  </div>
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
		</div>

		<script>var hostUrl = "/assets/";</script>
    <div id="loader" class="loader"></div>
    <div id="loaderAtShow" class="loaderAtShow"></div>
    <div id="loaderAMoment" class="loader"></div>

    {{-- JS --}}
		<script>var hostUrl = "/assets/";</script>
		<script src="/assets/plugins/global/plugins.bundle.js"></script>
		<script src="/assets/js/scripts.bundle.js"></script>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    {{-- Yajra Datatable --}}
    <script src="/yajra/datatable.js"></script>
    {{-- Toastr --}}
    <script src="/toastr/toastr.js"></script>
    {{-- Customize JS --}}
    <script src="/customize/script.js"></script>

    <x-admin.toastr></x-admin.toastr>

    {{-- Logout --}}
    <script>
      $('#form-logout').on('submit', function() {
        $('#submit-logout').attr("data-kt-indicator", "on");
        $('#submit-logout').attr("disabled", true);
      });
    </script>

    <script>
      $(document).ready(function(){
        $('#defaultTable').dataTable()
      });
    </script>

    @yield('js')

	</body>
</html>
