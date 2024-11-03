<div class="toolbar" id="kt_toolbar">
  <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
      <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
        <button class="btn btn-sm btn-link p-0 me-3" onclick="history.back()">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi fw-bold bi-arrow-left" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" /> </svg>
        </button>
        {{ $title ?? 'Data' }}
      </h1>
      <span class="h-20px border-gray-200 border-start mx-4"></span>
      <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <li class="breadcrumb-item text-dark">{{ $subtitle ?? 'Submenu' }}</li>
      </ul>
    </div>
  </div>
</div>
