{{-- <script>
  $(document).ready(function() {
    // Panggil endpoint Ajax saat halaman dimuat
    let callAjax = $.ajax({
        url: "{{ route('user.dudi.ajax') }}",
        type: "GET",
        data: function(d){
          d.jenis_kerjasama_id = $('#jenis_kerjasama_id-select').val();
        },
        // dataType: "json",
        success: function(response) {
            displayDudi(response.dudi);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

    $('#jenis_kerjasama_id-select').on('change', function(){
     callAjax;
    })

    function displayDudi(dudiData) {
      var dudiContainer = $('#dudi-card');
      dudiContainer.empty();
      $.each(dudiData, function(index, item) {
          var cardHtml = `
              <div class="col-md-4">
                  <div class="card card-flush h-md-100">
                      <div class="card-header">
                          <div class="card-title mt-5">
                              <div class="symbol symbol-50px overflow-hidden me-3 ms-0">
                                  <div class="symbol-label">
                                      <img src="/img/logo/${item.logo}" alt="${item.name}" class="w-100" />
                                  </div>
                              </div>
                              <h2>${item.name}</h2>
                          </div>
                      </div>
                      <div class="card-body pt-1">
                          <div class="d-inline">
                              <div class="fw-bolder text-gray-600 mb-5">
                                <span class="svg-icon svg-icon-1tx svg-icon-primary">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black" />
                                    <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black" />
                                  </svg>
                                </span>
                                  ${item.alamat}
                              </div>
                          </div>
                          <div class="mb-2"><i>Kerjasama</i></div>
                          <div class="d-flex flex-column text-gray-600">
                              ${item.kerjasama && item.kerjasama.length > 0 ?
                                  item.kerjasama.map(kjs => `
                                      <div class="d-flex align-items-center py-1">
                                          <span class="bullet bg-primary me-3"></span>
                                          <span class="badge badge-sm badge-light-primary me-2 my-1">${kjs.jenis_kerjasama ? kjs.jenis_kerjasama.name : 'Nama Jenis Kerjasama'}</span>
                                      </div>
                                  `).join('') : '-'
                              }
                          </div>
                      </div>
                  </div>
              </div>
          `;

          dudiContainer.append(cardHtml);
          // console.log(response.dudi.length);
      });
    }

  });;
</script> --}}

<script>
  $(document).ready(function() {
    // Fungsi untuk menampilkan data Dudi
    function displayDudi(dudiData) {
        var dudiContainer = $('#dudi-card');
        dudiContainer.empty();

        if (dudiData.length > 0) {
          $.each(dudiData, function(index, item) {
            var cardHtml = `
                <div class="col-md-4">
                    <div class="card card-flush h-md-100">
                        <div class="card-header">
                            <div class="card-title mt-5">
                                <div class="symbol symbol-50px overflow-hidden me-3 ms-0">
                                    <div class="symbol-label">
                                        <img src="/img/logo/${item.logo}" alt="${item.name}" class="w-100" />
                                    </div>
                                </div>
                                <h2>${item.name}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-1">
                            <div class="d-inline">
                                <div class="fw-bolder text-gray-600 mb-5">
                                  <span class="svg-icon svg-icon-1tx svg-icon-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none">
                                      <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black" />
                                      <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black" />
                                    </svg>
                                  </span>
                                    ${item.alamat}
                                </div>
                            </div>
                            <div class="mb-2"><i>Kerjasama</i></div>
                            <div class="d-flex flex-column text-gray-600">
                                ${item.kerjasama && item.kerjasama.length > 0 ?
                                    item.kerjasama.map(kjs => `
                                        <div class="d-flex align-items-center py-1">
                                            <span class="bullet bg-primary me-3"></span>
                                            <span class="badge badge-sm badge-light-primary me-2 my-1">${kjs.jenis_kerjasama ? kjs.jenis_kerjasama.name : 'Nama Jenis Kerjasama'}</span>
                                        </div>
                                    `).join('') : '-'
                                }
                            </div>
                        </div>
                    </div>
                </div>
            `;
            dudiContainer.append(cardHtml);
          });

          $('#null-card').addClass('d-none');
          $('#dudi-count-div').removeClass('d-none');
          $('#dudi-count-el').html(dudiData.length);

        } else {
          $('#null-card').removeClass('d-none');
          $('#dudi-count-div').addClass('d-none');
        }
    }

    // Fungsi untuk memanggil Ajax dan menampilkan data saat halaman dimuat
    function callAjax() {
        $.ajax({
            url: "/dudi",
            type: "GET",
            data: {
              jenis_kerjasama_id: $('#jenis_kerjasama_id-select').val(),
              cari: $('#cari').val(),
            },
            success: function(response) {
              console.log(response.dudi);
              displayDudi(response.dudi);
            },
            error: function(xhr, status, error) {
              console.error(xhr.responseText);
            }
        });
    }

    // Panggil Ajax saat halaman dimuat
    callAjax();

    // Panggil Ajax lagi saat select berubah
    $('#jenis_kerjasama_id-select').on('change', function() {
        callAjax();
    });

    // Timer untuk menunggu selesai mengetik
    let typingTimer;
    $('#cari').on('input', function() {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(callAjax, 1000);
    });

  });

</script>
