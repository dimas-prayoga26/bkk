<script>
  $(document).ready(function(){
    $('#search-form').on('submit', function(e){
      e.preventDefault();
      showLoader();
      search();
    });

    $('#kategori-filter').on('change', function(){
      showLoader();
      search();
    });

    function search(){
      let cariVal = $('#cari-filter').val();
      let kategoriVal = $('#kategori-filter').val();
      window.location.href = '/postingan?' + (cariVal ? 'cari=' + cariVal : '')
                                       + (kategoriVal ? '&kategori=' + kategoriVal : '');
    }

    $('.post-card').on('click', function(){
      window.location.href = '/postingan/' + $(this).data('idt');
    });
  });
</script>
