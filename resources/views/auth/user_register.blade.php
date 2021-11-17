<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cryptocoins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cryptocoins-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="shortcut icon" href="storage/images/favicon.ico" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Register</title>
</head>
<body>
    <!-- sign form -->
    <div class="sign">
        <!-- particles -->
        <div id="particles-js" class="sign__particles"></div>
        <!-- end particles -->

        <div class="sign__content">

            <!-- form -->
            <form action="{{ route('user.register.submit') }}" method="post" class="sign__form">

                {{ csrf_field() }}

                <a href="{{url('/')}}"><img class="sign__logo" src="img/logo.png" alt="" width="220"></a>

                @if($errors->has('name'))
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
                @endif

                @if($errors->has('email'))
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
                @endif

                @if($errors->has('password'))
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
                @endif

                <input type="text" class="form__input" id="name" name="name" placeholder="Name" required>

                <input type="text" class="form__input" id="email" name="email" placeholder="Email" required>

                <input type="text" class="form__input" id="phone" name="phone" placeholder="Phone" required>

                <input type="password" class="form__input" id="password" name="password" placeholder="Password" required>

                <input type="password" class="form__input" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation" required>

                <input type="submit" class="btn" type="button" value="Sign up">

                <div class="form__group">
                    <input id="terms" name="terms" type="checkbox" checked="terms">
                    <label for="terms">I agree to the <a href="{{url('privacy-policy')}}">Privacy Policy</a></label>
                </div>

            </form>
            <!-- end form -->

            <div class="sign__box">
                <p>Already have an account? <a href="{{route('login')}}">Sign in</a></p>
            </div>
        </div>
    </div>
    <!-- end sign form -->

    <!-- JS -->
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/particles.min.js') }}"></script>
    <script src="{{ asset('js/particles-app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <style>
    .alert{position:relative;padding:.75rem 1.25rem;margin-bottom:1rem;border:1px solid transparent;border-radius:.25rem}.alert-heading{color:inherit}.alert-link{font-weight:700}.alert-dismissible{padding-right:4rem}.alert-dismissible .close{position:absolute;top:0;right:0;padding:.75rem 1.25rem;color:inherit}.alert-primary{color:#004085;background-color:#cce5ff;border-color:#b8daff}.alert-primary hr{border-top-color:#9fcdff}.alert-primary .alert-link{color:#002752}.alert-secondary{color:#383d41;background-color:#e2e3e5;border-color:#d6d8db}.alert-secondary hr{border-top-color:#c8cbcf}.alert-secondary .alert-link{color:#202326}.alert-success{color:#155724;background-color:#d4edda;border-color:#c3e6cb}.alert-success hr{border-top-color:#b1dfbb}.alert-success .alert-link{color:#0b2e13}.alert-info{color:#0c5460;background-color:#d1ecf1;border-color:#bee5eb}.alert-info hr{border-top-color:#abdde5}.alert-info .alert-link{color:#062c33}.alert-warning{color:#856404;background-color:#fff3cd;border-color:#ffeeba}.alert-warning hr{border-top-color:#ffe8a1}.alert-warning .alert-link{color:#533f03}.alert-danger{color:#721c24;background-color:#f8d7da;border-color:#f5c6cb}.alert-danger hr{border-top-color:#f1b0b7}.alert-danger .alert-link{color:#491217}.alert-light{color:#818182;background-color:#fefefe;border-color:#fdfdfe}.alert-light hr{border-top-color:#ececf6}.alert-light .alert-link{color:#686868}.alert-dark{color:#1b1e21;background-color:#d6d8d9;border-color:#c6c8ca}.alert-dark hr{border-top-color:#b9bbbe}.alert-dark .alert-link{color:#040505}
    body {
        background-color: #041e37 !important;
    }
    </style>

</body>
</html>