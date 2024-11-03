<div class="toolbar" id="kt_toolbar">
  <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
      <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ $title ?? 'Data' }}</h1>
      <span class="h-20px border-gray-200 border-start mx-4"></span>
      <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <li class="breadcrumb-item text-muted">
          {{ $subtitle ?? 'Index' }}
        </li>
      </ul>
    </div>
  </div>
</div>
