@extends('layouts.user.main')

@section('css')
  <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

  @include('layouts.user.header-main',['title' => 'Testimoni', 'subtitle' => 'Index'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">

      <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
        @foreach ($testimonisekolah as $item)
        <div class="col-md-4 mb-3">
          <iframe class="embed-responsive-item card-rounded h-275px w-100" src="{{ $item->link }}" allowfullscreen="allowfullscreen"></iframe>
        </div>
        @endforeach
      </div>

    </div>
  </div>

<x-user.infofooter/>

@endsection

@section('js')
  {{-- <script src="/assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script> --}}
  @include('pages.users.postingan._indexscript')
@endsection
