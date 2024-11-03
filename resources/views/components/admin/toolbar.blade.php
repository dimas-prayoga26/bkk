<div class="d-flex align-items-stretch flex-shrink-0">
  <!--begin::User-->
  <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
    <!--begin::Menu wrapper-->
    <div class="mx-3">
      <div class="fw-bolder">
        {{ Auth::user()->name }}
      </div>
    </div>

    <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
      <img src="/img/profile/{{ Auth::user()->foto }}" alt="user" />
    </div>
    <!--begin::Menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
      <!--begin::Menu item-->
      <div class="menu-item px-3">
        <div class="menu-content d-flex align-items-center px-3">
          <!--begin::Avatar-->
          <div class="symbol symbol-50px me-5">
            <img alt="Logo" src="/img/profile/{{ Auth::user()->foto }}" />
          </div>
          <!--end::Avatar-->
          <!--begin::Username-->
          <div class="d-flex flex-column">
            <div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::user()->name }} </div>
            <span class="fw-bold text-muted text-hover-primary fs-7 text-capitalize">{{ Auth::user()->role }}</span>
          </div>
          <!--end::Username-->
        </div>
      </div>
      <!--end::Menu item-->
      <!--begin::Menu separator-->
      <div class="separator my-2"></div>
      <!--end::Menu separator-->
      <!--begin::Menu item-->
      <div class="menu-item px-5">
        <a href="{{ route('manage.profile.home') }}" class="menu-link px-5">My Profile</a>
      </div>
      <!--end::Menu item-->
      <!--begin::Menu item-->
      <div class="menu-item px-5">
        <a href="#" class="menu-link px-5" data-bs-toggle="modal" data-bs-target="#modal-logout">Log Out</a>
      </div>
      <!--end::Menu item-->
    </div>
    <!--end::Menu-->
    <!--end::Menu wrapper-->
  </div>
  <!--end::User -->
</div>
