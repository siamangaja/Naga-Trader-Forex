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
        <form id="" class="form" action="{{url('admin/price/'.$data->id.'/edit')}}" method="POST" enctype="multipart/form-data">
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
                        <span class="required">Content</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <textarea id="content" name="content" class="ckeditor" rows="15" cols="50">{!! htmlentities($data->content) !!}</textarea>
                    </div>
                    <!--end::Col-->
                </div>

                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Price</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="price" class="form-control form-control-lg form-control-solid" value="{{$data->price}}" required/>
                    </div>
                    <!--end::Col-->
                </div>

                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Notes</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="notes" class="form-control form-control-lg form-control-solid" value="{{$data->notes}}" required/>
                    </div>
                    <!--end::Col-->
                </div>

                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Button</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="button" class="form-control form-control-lg form-control-solid" value="{{$data->button}}" required/>
                    </div>
                    <!--end::Col-->
                </div>

            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <a href="{{url('admin/price')}}" class="btn btn-light btn-active-light-primary me-2">Back</a>
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

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>