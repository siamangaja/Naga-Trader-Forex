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
        <form class="form" action="" method="POST">

            <!--begin::Card body-->
            <div class="card-body border-top p-9">

            @if ($d->status == 0)
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
                    <div class="fs-6 text-gray-700">Silahkan lakukan transfer ke nomor rekening kami sesuai dengan nominal berikut</div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
            </div>
            @endif

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">Bank:</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">{{ $d->bank_name }}</label>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="">No Rekening Tujuan:</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">{{ $d->bank_number }}</label>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="">Atas Nama:</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <label class="col-form-label fw-bold fs-6">{{ $d->bank_account }}</label>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="">Jumlah (Nominal):</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="(Transfer sesuai nominal tersebut untuk mempermudahkan proses verifikasi. 3 kode unik dibelakang akan masuk ke saldo akun Anda)"></i>
                    </label>
                    <div class="col-lg-8 fv-row">
                        <label class="btn btn-outline btn-outline-dashed text-start py-2 px-3">
                            USD {{ number_format($d->total, 0) }}
                        </label>
                        <div style="padding: 5px;">
                            <span style="font-style: italic; font-size: 12px;">(Transfer sesuai nominal tersebut untuk mempermudahkan proses verifikasi. 3 kode unik dibelakang akan masuk ke saldo akun Anda)</span>
                        </div>
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="">Catatan Anda:</span>
                    </label>
                    <div class="col-lg-8 fv-row">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">{{ $d->notes }}</label>
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="">Status:</span>
                    </label>
                    <div class="col-lg-8 fv-row">
                        @if ($d->status == 0)
                            <span class="badge badge-light-warning p-4">Sedang Diverifikasi</span>
                        @elseif ($d->status == 1)
                            <span class="badge badge-light-success p-4">Sukses</span>
                        @elseif ($d->status == 2)
                            <span class="badge badge-light-danger p-4">Gagal</span>
                        @endif
                    </div>
                </div>

            </div>
            <!--end::Card body-->
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content py-6 px-9">
                <a href="{{url('user/deposit')}}" class="btn btn-primary">Kembali</a>
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