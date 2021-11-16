@extends('layouts.main')
@section('title', $title)

@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
<!--begin::Container-->
<div id="kt_content_container" class="container-xxl">
<!--begin::Basic info-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{$title}}</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">

        <!--begin::Form-->
        @if (!$d)
            <form class="form" action="{{url('user/bank/store')}}" method="POST">
        @else
            <form class="form" action="{{url('user/bank/save')}}" method="POST">
        @endif

        @csrf
            <!--begin::Card body-->
            <div class="card-body border-top p-9">

			@if (session('error'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				{{ session('error') }}
			</div>
			@endif
			@if (session('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('success') }}
			</div>
			@endif

            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
            <!--begin::Icon-->
            <!--begin::Svg Icon-->
            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"></rect>
                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"></rect>
                </svg>
            </span>
            <!--end::Svg Icon-->
            <!--end::Icon-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-grow-1">
                <!--begin::Content-->
                <div class="fw-bold">
                    <h4 class="text-gray-900 fw-bolder">Perhatian</h4>
                    <div class="fs-6 text-gray-700">Kami hanya mengirimkan dana ke rekening bank yang sudah didaftarkan disini, apabila Anda melakukan transaksi tarik tunai. Jadi mohon dipastikan agar data rekening Anda sudah benar.</div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
            </div>

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama Bank</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <select class="form-control form-control-lg form-control-solid" id="bank" name="bank" required>
                            @if ($d != null)
                                <option value="BCA" {{ $d->bank == 'BCA' ? 'selected' : '' }}>BCA</option>
                                <option value="Mandiri" {{ $d->bank == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                                <option value="BNI" {{ $d->bank == 'BNI' ? 'selected' : '' }}>BNI</option>
                                <option value="BRI" {{ $d->bank == 'BRI' ? 'selected' : '' }}>BRI</option>
                            @else
                                <option value="" selected disabled>-Pilih Bank-</option>
                                <option value="BCA">BCA</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="BNI">BNI</option>
                                <option value="BRI">BRI</option>
                            @endif
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Nomor Rekening</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Pastikan nomor rekening Anda sudah benar"></i>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        @if ($d != null)
                            <input type="text" name="number" class="form-control form-control-lg form-control-solid" value="{{ $d->number }}" required/>
                        @else
                            <input type="text" name="number" class="form-control form-control-lg form-control-solid" required/>
                        @endif
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Atas Nama</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        @if ($d != null)
                            <input type="text" name="account_name" class="form-control form-control-lg form-control-solid" value="{{ $d->account_name }}" required />
                        @else
                            <input type="text" name="account_name" class="form-control form-control-lg form-control-solid" required />
                        @endif
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card body-->
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <a href="{{url('user')}}" class="btn btn-light btn-active-light-primary me-2">Kembali</a>
                <button type="submit" class="btn btn-primary" id="submit">Update</button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->

</div>
<!--end::Basic info-->
</div>
<!--end::Container-->
</div>
<!--end::Post-->
@stop