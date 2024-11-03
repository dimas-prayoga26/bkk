<script>
  $(document).ready(function(){
    $('#myTable').dataTable({
      processing: true,
      serverside: true,
      ordering: false,
      ajax: {
        url: '/tracer',
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
      window.location.href = '/tracer?angkatan_id=' + $('#stats-angkatan_id-select').val() + '#stats';
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
  });
</script>
