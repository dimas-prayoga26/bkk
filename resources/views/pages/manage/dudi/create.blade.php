@extends('layouts.admin.main')

@section('css')
@endsection

@section('content')

  @include('layouts.admin.header-sub',['title' => 'Data DU/DI', 'subtitle' => 'Create'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
      <div class="card card-flush">
        <div class="card-header mt-3">
          <div class="card-title">
            <h3 class="fw-bolder"> Tambah DU/DI </h3>
          </div>
        </div>
        <form action="{{ route('manage.dudi.store') }}" method="POST" id="form-store" enctype="multipart/form-data">
        @csrf
          <div class="card-body pt-2 border-top">
            <div class="mt-5">
              @include('pages.manage.dudi._createform')
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

  function previewImage() {
    const image = document.querySelector('#logo_dudi');
    const imgPreview = document.querySelector('.img-preview');
    const oFReader = new FileReader();
    oFReader.readAsDataURL(logo_dudi.files[0]);
    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection
