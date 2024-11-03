{{-- Konfirmasi Logout --}}
<div class="modal fade" id="modal-logout" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md ">
    <div class="modal-content">
      <div class="modal-header" id="kt_modal_new_address_header">
        <h2>Konfirmasi Logout</h2>
        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
          <span class="svg-icon svg-icon-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
              <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
            </svg>
          </span>
        </div>
      </div>
      <div class="modal-body">
        Apakah anda yakin akan keluar?
      </div>
      <div class="modal-footer justify-content-between">
        <button type="reset" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Batal</button>
        <form action="{{ route('logout') }}" method="POST" id="form-logout">
          @csrf
          <button type="submit" class="btn btn-sm btn-primary" id="submit-logout" data-kt-indicator="off">
            <span class="indicator-label">Logout</span>
            <span class="indicator-progress">Logout...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
