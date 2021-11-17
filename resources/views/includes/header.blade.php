<!-- header -->
<header id="default_header" class="header_style_1">
<div class="container">
    <div class="row">
        <div class="full">
            <div class="col-md-2 col-sm-3 col-xs-12">
                <!-- logo -->
                <div class="logo" >
                    <a href="{{route('frontpage')}}"><img class="img-responsive" src="img/logo.png" alt="{{opsi('website')}}" title="{{opsi('website')}}" style="margin-top:-10px;"/></a>
                </div>
                <!-- end logo -->
            </div>
            <div class="col-md-10 col-sm-9 col-xs-12">
                <!-- menu -->
                <div class="main_menu">
                    <div id="cssmenu" class="dark_menu">
                        <ul>
                            <li><a href="{{route('frontpage')}}" style="margin: 0 5px;">Home </a></li>
                            <li>
                                <a href="#" style="margin: 0 5px;">Company </a>
                                <ul>
                                    <li><a href="{{url('about')}}">About Us</a></li>
                                    <li><a href="{{url('about')}}">Investment Plans</a></li>
                                    <li><a href="{{url('about')}}">Why Choose Us</a></li>
                                </ul>
                            </li>
                            <li><a href="{{url('contact')}}" style="margin: 0 5px;">Support </a></li>
                            <li><a href="{{url('terms')}}" style="margin: 0 5px;">Terms </a></li>
                            <li><a href="{{route('user.register')}}">Register</a></li>
                            <li><a href="{{route('login')}}" style="margin: 0 5px;">Login </a></li>
                            <li style="margin: 0 20px;">
                                <script type="text/javascript">
                                    function googleTranslateElementInit() {
                                        new google.translate.TranslateElement({
                                                pageLanguage: 'en'
                                            },
                                            'google_translate_element'
                                        );
                                    }

                                </script>
                                <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
                                </script>
                                <div id="google_translate_element"></div>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- end menu -->
            </div>
        </div>
    </div>
    </div>
</header>
<!-- end header -->