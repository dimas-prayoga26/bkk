@extends('layouts.admin.main')

@section('css')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<style>
  trix-toolbar [data-trix-button-group="file-tools"] {
    display: none;
  }
</style>
@endsection

@section('content')

  @include('layouts.admin.header-main',['title' => 'Data Tentang', 'subtitle' => 'Index'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
      <div class="card card-flush">
        <div class="card-header mt-3">
          <div class="card-title">
            <h3 class="fw-bolder">Tentang BKK</h3>
          </div>
        </div>

        @isset($tentang)
          <form action="{{ route('manage.tentang.update', $tentang) }}" method="POST" enctype="multipart/form-data" id="form-store">
            @csrf
            @method('PUT')
            <div class="card-body pt-2 border-top">
              <div class="mt-5">
                @include('pages.manage.tentang._editform')
              </div>
            </div>
            <div class="card-footer border-top">
              <button type="submit" class="btn btn-primary btn-sm" id="submit-store" >
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress">Diproses...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
            </div>
          </form>
        @else
          <form action="{{ route('manage.tentang.store') }}" method="POST" enctype="multipart/form-data" id="form-store">
            @csrf
            <div class="card-body pt-2 border-top">
              <div class="mt-5">
                @include('pages.manage.tentang._createform')
              </div>
            </div>
            <div class="card-footer border-top">
              <button type="submit" class="btn btn-primary btn-sm" id="submit-store" >
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress">Diproses...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
            </div>
          </form>
        @endisset
      </div>
    </div>
  </div>

@endsection

@section('js')
<script>
  $('#form-store').on('submit', function() {
    $('#submit-store').attr("data-kt-indicator", "on");
    $('#submit-store').attr("disabled", true);
  });

  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  });

  function previewImage() {
      const image = document.querySelector('#cover');
      const imgPreview = document.querySelector('.img-preview');
      const oFReader = new FileReader();
      oFReader.readAsDataURL(cover.files[0]);
      oFReader.onload = function(oFREvent) {
          imgPreview.src = oFREvent.target.result;
      }
  }
</script>
@endsection
