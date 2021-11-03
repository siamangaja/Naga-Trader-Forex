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
        <form id="" class="form" action="{{url('admin/partner/'.$data->id.'/edit')}}" method="POST" enctype="multipart/form-data">
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

                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Title</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="title" class="form-control form-control-lg form-control-solid" value="{{$data->title}}" required/>
                    </div>
                    <!--end::Col-->
                </div>

                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span>Image</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-2 fv-row">
                        <img src="storage/images/{{ $data->image }}" width="130">
                    </div>
                    <div class="col-lg-4 fv-row">
                        <input type="file" name="image" class="form-control form-control-lg form-control-solid" />
                    </div>
                    <!--end::Col-->
                </div>

                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span>Link</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="link" class="form-control form-control-lg form-control-solid" value="{{$data->link}}" required/>
                    </div>
                    <!--end::Col-->
                </div>

            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <a href="{{url('admin/partners')}}" class="btn btn-light btn-active-light-primary me-2">Back</a>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
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