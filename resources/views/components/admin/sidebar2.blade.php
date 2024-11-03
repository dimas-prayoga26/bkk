<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
  <div class="aside-logo flex-column-auto" id="kt_aside_logo">
    <a href="#">
      {{-- <img alt="Logo" src="/assets/media/logos/logo-1-dark.svg" class="h-25px logo" /> --}}
      <img alt="Logo" src="/img/logo/sekolah-banner-logo.png" class="h-45px logo" />
    </a>
    <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
      <span class="svg-icon svg-icon-1 rotate-180">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
          <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
        </svg>
      </span>
    </div>
  </div>
  <div class="aside-menu flex-column-fluid">
    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
      <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
        <div class="menu-item">
          <div class="menu-content pb-2">
            <span class="menu-section text-muted text-uppercase fs-8 ls-1">DATA</span>
          </div>
        </div>
        <div class="menu-item">
          <a href="{{ route('manage.dashboard.index') }}" class="menu-link {{ Request::is('manage/dashboard*') ? 'active' : '' }}">
            <span class="menu-icon">
              <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                  <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                  <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                  <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                </svg>
              </span>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is('manage/tentang*') |
            Request::is('manage/tentang*') |
            Request::is('manage/visimisi*') |
            Request::is('manage/angkatan*') |
            Request::is('manage/jurusan*') |
            Request::is('manage/kegiatan*') |
            Request::is('manage/tracer*') |
            Request::is('manage/postingan*') |
            Request::is('manage/testimoni*') ? 'show' : '' }}">
          <span class="menu-link">
            <span class="menu-icon">
              <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z" fill="black" />
                  <path d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z" fill="black" />
                  <path opacity="0.3" d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z" fill="black" />
                  <path opacity="0.3" d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z" fill="black" />
                </svg>
              </span>
            </span>
            <span class="menu-title">SEKOLAH</span>
            <span class="menu-arrow"></span>
          </span>
          <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
              <a  href="{{ route('manage.tentang.index') }}" class="menu-link {{ Request::is('manage/tentang*') ? 'active' : '' }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Tentang BKK</span>
              </a>
            </div>
            <div class="menu-item">
              <a href="{{ route('manage.visimisi.index') }}" class="menu-link {{ Request::is('manage/visimisi*') ? 'active' : '' }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Visi dan Misi</span>
              </a>
            </div>
            <div class="menu-item">
              <a href="{{ route('manage.angkatan.index') }}" class="menu-link {{ Request::is('manage/angkatan*') ? 'active' : '' }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Data Angkatan</span>
              </a>
            </div>
            <div class="menu-item">
              <a href="{{ route('manage.jurusan.index') }}" class="menu-link {{ Request::is('manage/jurusan*') ? 'active' : '' }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Data Jurusan</span>
              </a>
            </div>
            <div class="menu-item">
              <a href="{{ route('manage.kegiatan.index') }}" class="menu-link {{ Request::is('manage/kegiatan*') ? 'active' : '' }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Data Kegiatan</span>
              </a>
            </div>
            <div class="menu-item">
              <a href="{{ route('manage.tracer.index') }}" class="menu-link {{ Request::is('manage/tracer*') ? 'active' : '' }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Data Tracer Alumni</span>
              </a>
            </div>
            <div class="menu-item">
              <a href="{{ route('manage.postingan.index') }}" class="menu-link {{ Request::is('manage/postingan*') ? 'active' : '' }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Data Postingan</span>
              </a>
            </div>
            <div class="menu-item">
              <a href="{{ route('manage.testimonisekolah.index') }}" class="menu-link {{ Request::is('manage/testimonisekolah*') ? 'active' : '' }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Data Testimoni</span>
              </a>
            </div>
          </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is('manage/admin*') |
            Request::is('manage/pelamar*') ? 'show' : '' }}">
          <span class="menu-link">
            <span class="menu-icon">
              <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z" fill="black" />
                  <path d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z" fill="black" />
                  <path opacity="0.3" d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z" fill="black" />
                  <path opacity="0.3" d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z" fill="black" />
                </svg>
              </span>
            </span>
            <span class="menu-title">PENGGUNA</span>
            <span class="menu-arrow"></span>
          </span>
          <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
              <a  href="{{ route('manage.admin.index') }}" class="menu-link {{ Request::is('manage/admin*') ? 'active' : '' }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Data Admin</span>
              </a>
            </div>
            <div class="menu-item">
              <a href="{{ route('manage.pelamar.index') }}" class="menu-link {{ Request::is('manage/pelamar*') ? 'active' : '' }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Data Pelamar</span>
              </a>
            </div>
          </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is('manage/kerjasama*') |
            Request::is('manage/dudi*') |
            Request::is('manage/loker*') |
            Request::is('manage/lamaran*') ? 'show' : '' }}">
          <span class="menu-link">
            <span class="menu-icon">
              <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z" fill="black" />
                  <path d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z" fill="black" />
                  <path opacity="0.3" d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z" fill="black" />
                  <path opacity="0.3" d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z" fill="black" />
                </svg>
              </span>
            </span>
            <span class="menu-title">PERUSAHAAN</span>
            <span class="menu-arrow"></span>
          </span>
          <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
              <a  href="{{ route('manage.kerjasama.index') }}" class="menu-link {{ Request::is('manage/kerjasama*') ? 'active' : '' }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Data Kerjasama</span>
              </a>
            </div>
            <div class="menu-item">
              <a href="{{ route('manage.dudi.index') }}" class="menu-link {{ Request::is('manage/dudi*') ? 'active' : '' }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Data DU/DI</span>
              </a>
            </div>
            <div class="menu-item">
              <a href="{{ route('manage.loker.index') }}" class="menu-link {{ Request::is('manage/loker*') ? 'active' : '' }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Data Lowongan Kerja</span>
              </a>
            </div>
            <div class="menu-item">
              <a href="{{ route('manage.lamaran.index') }}" class="menu-link {{ Request::is('manage/lamaran*') ? 'active' : '' }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Data Lamaran</span>
              </a>
            </div>
          </div>
        </div>
        <div class="menu-item">
          <div class="menu-content pb-2">
            <span class="menu-section text-muted text-uppercase fs-8 ls-1">SETTING</span>
          </div>
        </div>
        <div class="menu-item">
          <a href="{{ route('manage.profile.home') }}" class="menu-link {{ Request::is('manage/profile*') ? 'active' : '' }}">
            <span class="menu-icon">
              <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
                  <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
                </svg>
              </span>
            </span>
            <span class="menu-title">Profile</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
    <a href="/metronics" target="_blank" class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="Dokumentasi Metronic">
      <span class="btn-label">Docs Metronic</span>
      <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
      <span class="svg-icon btn-icon svg-icon-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z" fill="black" />
          <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
        </svg>
      </span>
      <!--end::Svg Icon-->
    </a>
  </div>
</div>
