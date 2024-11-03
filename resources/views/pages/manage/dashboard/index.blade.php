@extends('layouts.admin.main')

@section('css')
  <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

  @include('layouts.admin.header-main',['title' => 'Dashboard', 'subtitle' => 'Index'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
      <div class="row g-5 g-xl-8">
        @foreach ($data as $item)
          <div class="col-xl-3">
            <a href="{{ route($item['route']) }}" class="card {{ $item['colour'] }} hoverable card-xl-stretch mb-xl-8">
              <div class="card-body">
                <span class="svg-icon {{ $item['colour'] == 'bg-primary' ? 'svg-icon-dark' : 'svg-icon-primary' }} svg-icon-3x ms-n1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
                    <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
                    <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
                    <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
                  </svg>
                </span>
                <div class="{{ $item['textcolor'] }} fw-bolder fs-2 mb-2 mt-5">{{ $item['count'] }}</div>
                <div class="fw-bold {{ $item['textcolor'] }}">{{ $item['title'] }}</div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>

@endsection

@section('js')
<script src="/assets/js/custom/widgets.js"></script>
<script src="/assets/js/custom/apps/chat/chat.js"></script>
<script src="/assets/js/custom/modals/create-app.js"></script>
<script src="/assets/js/custom/modals/upgrade-plan.js"></script>
@endsection
