<script>
  $(document).ready(function(){
    $('#myTable').dataTable({
      processing: true,
      serverside: true,
      ordering: false,
      ajax: {
        url: '/manage/kerjasama',
      },
      columns:[
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false},
        {data: 'name', name: 'name'},
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
    //     url: '/kerjasama/' + id,
    //     type: 'GET',
    //     success: function(res){
    //     hideLoader();
    //       $.each(res.result, function(field, value){
    //         $('#show-kerjasama-' + field).html(value); // Loop Semua Data
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
          url: '/manage/kerjasama/' + id,
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
