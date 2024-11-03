{{-- <script>
  $(document).ready(function(){
    $('#status-filter').on('change', function(){
      window.location.href = '/loker?status=' + $(this).val()
    });
  });
</script> --}}

<script>
  $(document).ready(function(){
    $('#search-form').on('submit', function(e){
      e.preventDefault();
      showLoader();
      search();
    });

    $('#status-filter').on('change', function(){
      showLoader();
      search();
    });

    $('#dudi-filter').on('change', function(){
      showLoader();
      search();
    });

    function search(){
      let cariVal = $('#cari-filter').val();
      let statusVal = $('#status-filter').val();
      let dudiVal = $('#dudi-filter').val();
      window.location.href = '/loker?' + (cariVal ? 'cari=' + cariVal : '')
                                       + (statusVal ? '&status=' + statusVal : '')
                                       + (dudiVal ? '&dudi_id=' + dudiVal : '');
    }

  });
</script>
