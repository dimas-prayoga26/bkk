<script>
  $(document).ready(function(){
    $('#myTable').dataTable({
      processing: true,
      serverside: true,
      ordering: false,
      ajax: {
        url: '/manage/tracer',
        data: function(d){
          d.angkatan = $('#angkatan-select').val();
          d.jurusan = $('#jurusan-select').val();
          d.kegiatan = $('#kegiatan-select').val();
        },
      },
      columns:[
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false},
        {data: 'name', name: 'name'},
        {data: 'angkatan.tahun', name: 'angkatan.tahun'},
        {data: 'jurusan.name', name: 'jurusan.name'},
        {data: 'kegiatan.name', name: 'kegiatan.name'},
        {data: 'aksi', name: 'aksi'},
      ]
    });

    // SETUP CSRF
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    // FILTER
    $('body').on('click', '#filter-submit', function(){
      $('#myTable').DataTable().ajax.reload();
      toastr.info('Filter berhasil diterapkan');
    });

    // FILTER STATS
    $('body').on('click', '#submit-filter-stats', function(){
      showLoader();
      window.location.href = '/manage/tracer?angkatan_id=' + $('#stats-angkatan_id-select').val() + '#stats';
    });
    // SHOW
    // $('body').on('click', '.btn-show', function(e){
    //   showLoader();
    //   let id = $(this).data('id');
    //   $.ajax({
    //     url: '/tracer/' + id,
    //     type: 'GET',
    //     success: function(res){
    //     hideLoader();
    //       $.each(res.result, function(field, value){
    //         $('#show-tracer-' + field).html(value); // Loop Semua Data
    //       });
    //       $('#modal-show').modal('show');
    //     }
    //   });
    // });

    // DELETE
    $('body').on('click', '.btn-delete', function(e){
      e.preventDefault();
      var id = $(this).data('id');
      $('#modal-delete').modal('show');
      $('#delete-name').html($(this).data('name'));

      $('#submit-delete').off('click').click(function() {
        $('#submit-delete').attr("data-kt-indicator", "on");
        $('#submit-delete').attr("disabled", true);

        $.ajax({
          url: '/manage/tracer/' + id,
          type: 'DELETE',
          success: function(res) {
            $('#modal-delete').modal('hide');
            $('#submit-delete').attr("data-kt-indicator", "off");
            $('#submit-delete').attr("disabled", false);
            toastr.success(res.success);
            $('#myTable').DataTable().ajax.reload();
          }
        });
      });
    });

  });
</script>
