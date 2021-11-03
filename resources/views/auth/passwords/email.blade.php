<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <head><base href="/">
        <title>Reset Password</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta charset="utf-8" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="" />
        <link rel="canonical" href="" />
        <link rel="shortcut icon" href="storage/images/favicon.ico" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{ asset('css/plugins.bundle.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet">
        <!--end::Global Stylesheets Bundle-->
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="bg-body">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">

            <!--begin::Authentication - Sign-in -->
            <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(storage/images/14.png">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('user.reset.password') }}" method="post">
                            {{ csrf_field() }}
                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Reset Password</h1>
                                <!--end::Title-->
                                <!--begin::Link-->
                                <div class="text-gray-400 fw-bold fs-4">Enter your email address</a></div>
                                <!--end::Link-->

                                @if (session('success'))
                                <br>
                                <div class="alert alert-success" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                </div>
                                @elseif (session('error'))
                                <br>
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ session('error') }}</strong>
                                </div>
                                @endif

                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <!--begin::Submit button-->
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">Reset Password</span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Submit button-->
                            </div>
                            <!--end::Actions-->
                            <div class="text-gray-400 fw-bold fs-4">< Back to <a href="{{url('/')}}">Login</a></div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Authentication - Sign-in-->
        </div>
        <!--end::Main-->
        <script>var hostUrl = "assets/";</script>        
        <script src="{{ asset('js/plugins.bundle.js') }}"></script>
        <script src="{{ asset('js/scripts.bundle.js') }}"></script>
        <script src="{{ asset('js/general_sign_in.js') }}"></script>
    </body>
    <!--end::Body-->
</html>