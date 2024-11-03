<script>
  $(document).ready(function(){
    $('#myTable').dataTable({
      processing: true,
      serverside: true,
      ordering: false,
      ajax: {
        url: '/manage/lamaran',
        data: function(d){
          d.dudi_id = $('#dudi_id-select').val();
          d.status = $('#status-select').val();
        },
      },
      columns:[
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false},
        {data: 'pelamar.name', name: 'pelamar.name'},
        {data: 'dudi.name', name: 'dudi.name'},
        {data: 'loker.posisi', name: 'loker.posisi'},
        {data: 'tanggalmelamar', name: 'tanggalmelamar'},
        {data: 'tanggalwawancara', name: 'tanggalwawancara'},
        {data: 'status', name: 'status'},
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

    // SHOW
    // $('body').on('click', '.btn-show', function(e){
    //   showLoader();
    //   let id = $(this).data('id');
    //   $.ajax({
    //     url: '/lamaran/' + id,
    //     type: 'GET',
    //     success: function(res){
    //     hideLoader();
    //       $.each(res.result, function(field, value){
    //         $('#show-lamaran-' + field).html(value); // Loop Semua Data
    //       });
    //       $('#modal-show').modal('show');
    //     }
    //   });
    // });

    // DELETE
    $('body').on('click', '.btn-update', function(e){
      e.preventDefault();
      var id = $(this).data('id');
      $('#edit-tanggalwawancara').val($(this).data('tanggalwawancara'))
      $('#edit-status').val($(this).data('status'));
      if ($(this).data('status') == 'wawancara') {
        $('#tanggal-div').removeClass('d-none');
      }
      $('#modal-update').modal('show');

      $('#submit-update').off('click').click(function() {
        $('#submit-update').attr("data-kt-indicator", "on");
        $('#submit-update').attr("disabled", true);

        $.ajax({
          url: '/manage/lamaran/' + id,
          type: 'PUT',
          data: {
            status: $('#edit-status').val(),
            tanggalwawancara: $('#edit-tanggalwawancara').val(),
          },
          success: function(res) {
            $('#modal-update').modal('hide');
            $('#submit-update').attr("data-kt-indicator", "off");
            $('#submit-update').attr("disabled", false);
            if (res.success) {
              toastr.success(res.success);
              $('#myTable').DataTable().ajax.reload();
            } else{
              toastr.error(res.error);
            }
          }
        });
      });
    });

    $('#modal-update').on('hidden.bs.modal', function() {
      $('#edit-status').val('');
      $('#edit-tanggalwawancara').val('');
      $('#tanggal-div').addClass('d-none');
    });

    $('#edit-status').change(function(){
      if($(this).val() === 'wawancara'){
        $('#edit-tanggalwawancara').prop('required', true)
        $('#tanggal-div').removeClass('d-none');
      } else {
        $('#tanggal-div').addClass('d-none');
        $('#edit-tanggalwawancara').prop('required', false)
        $('#edit-tanggalwawancara').val(null)
      }
    });
  });
</script>
