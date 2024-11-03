@extends('layouts.admin.main')

@section('css')
@endsection

@section('content')

  @include('layouts.admin.header-sub',['title' => 'Data Admin', 'subtitle' => 'Create'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
      <div class="card card-flush">
        <div class="card-header mt-3">
          <div class="card-title">
            <h3 class="fw-bolder"> Tambah Admin </h3>
          </div>
        </div>
        <form action="{{ route('manage.admin.store') }}" method="POST" id="form-store">
        @csrf

          <div class="card-body pt-2 border-top">
            <div class="mt-5">
              @include('pages.manage.admin._createform')
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
  $(document).ready(function(){
      $('#type').change(function(){
          if($(this).val() === 'dudi'){
              $('#dudi_id').prop('required', true)
              $('#select-div').removeClass('d-none');
          } else {
              $('#select-div').addClass('d-none');
              $('#dudi_id').prop('required', false)
              $('#dudi_id').val(null)
          }
      });
  });
</script>
@endsection
