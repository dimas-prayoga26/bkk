<!DOCTYPE html>
<html lang="en">
	<head>
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
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px; font-family: 'Figtree'">
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
        <x-admin.sidebar/>
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<div id="kt_header" style="" class="header align-items-stretch">
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
								<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
									<span class="svg-icon svg-icon-2x mt-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
								</div>
							</div>
							<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
								<a href="{{ route('home') }}" class="d-lg-none">
									{{-- <img alt="Logo" src="/assets/media/logos/logo-2.svg" class="h-30px" /> --}}
									<img alt="Logo" src="/img/logo/sekolah-logo.png" class="h-20px h-lg-30px" />
								</a>
							</div>
							<x-admin.navbar/>
						</div>
					</div>
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            @yield('content')
					</div>
          <x-admin.footer/>
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

    @include('pages.auth.logout')

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
        $('#defaultTable').dataTable({
          ordering: false,
        });
      });
    </script>
    @yield('js')
	</body>
</html>
