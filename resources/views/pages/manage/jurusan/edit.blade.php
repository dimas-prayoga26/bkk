@extends('layouts.admin.main')

@section('css')
@endsection

@section('content')

  @include('layouts.admin.header-sub',['title' => 'Data Jurusan', 'subtitle' => 'Edit'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
      <div class="card card-flush">
        <div class="card-header mt-3">
          <div class="card-title">
            <h3 class="fw-bolder"> Edit Jurusan </h3>
          </div>
        </div>
        <form action="{{ route('manage.jurusan.update', $jurusan->id) }}" method="POST" id="form-update">
        @csrf
        @method('PUT')

          <div class="card-body pt-2 border-top">
            <div class="mt-5">
              @include('pages.manage.jurusan._editform')
            </div>
          </div>
          <div class="card-footer border-top">
            <button type="submit" class="btn btn-primary btn-sm" id="submit-update" >
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
    $('#form-update').on('submit', function() {
      $('#submit-update').attr("data-kt-indicator", "on");
      $('#submit-update').attr("disabled", true);
    });
</script>
@endsection
