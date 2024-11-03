@extends('layouts.admin.main')

@section('css')
@endsection

@section('content')

  @include('layouts.admin.header-sub',['title' => 'Data Dudi', 'subtitle' => 'Show'])

  <div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
      <div class="row gy-5 g-xl-8">
        <div class="col">
          <div class="card card-flush">
            <div class="card-header mt-3">
              <div class="card-title">
                <h3 class="fw-bolder"> Detail Dudi </h3>
              </div>
            </div>
            <div class="card-body pt-2 border-top">
              <div class="d-flex flex-center flex-column py-5">
                <div class="symbol symbol-100px symbol-circle mb-7">
                  <img src="/img/profile/{{ $dudi->foto }}" alt="image" />
                </div>
                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ $dudi->name }}</a>
                <div class="mb-9">
                  <div class="badge badge-lg badge-light-primary d-inline text-capitalize">{{ $dudi->role->name }}</div>
                </div>
              </div>
              <div class="d-flex flex-stack fs-4 py-3">
                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_dudi_view_details" role="button" aria-expanded="false" aria-controls="kt_dudi_view_details">Detail
                <span class="ms-2 rotate-180">
                  <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                    </svg>
                  </span>
                </span></div>
                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit Data Dudi">
                  <a href="{{ route('dudi.edit', $dudi) }}" class="btn btn-sm btn-primary">Edit</a>
                </span>
              </div>
              <div class="separator"></div>
              <div id="kt_dudi_view_details" class="collapse show">
                <div class="pb-5 fs-6">

                  <div class="fw-bolder mt-5">Status</div>
                  <div class="text-gray-600">{!! $dudi->is_aktif() ?? '-'  !!}</div>

                  <div class="fw-bolder mt-5">Email</div>
                  <div class="text-gray-600">{{ $dudi->email }}</div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
@endsection
