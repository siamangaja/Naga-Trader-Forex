<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024, maximum-scale=1.0, scalable=yes">
    <meta name="author" content="{{opsi('website')}}"/>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="referrer" content="strict-origin" />
    <title>{{$title}} - {{opsi('website')}}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/colors.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/jquery.countdown.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/carouselTicker.css') }}" media="screen" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
<body id="default_theme" class="home_page_1">

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
                                        <li><a href="{{url('about')}}">About</a></li>
                                        <li><a href="{{url('about')}}">Investment Plans</a></li>
                                        <li><a href="{{url('about')}}">Why Choose Us</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{url('contact')}}" style="margin: 0 5px;">Support </a></li>
                                <li><a href="{{url('terms')}}" style="margin: 0 5px;">Terms </a></li>
                                <li><a href="{{route('login')}}" style="margin: 0 5px;">Login </a></li>
                                <li><a href="{{route('user.register')}}">Register</a></li>
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

    <section id="full_slider" class="full_slider_inner padding_0">
        <div class="main_slider">
            <div id="next" class="carousel bs-slider slide  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000">
                <!-- Wrapper For Slides -->
                <div class="carousel-inner" role="listbox">

                    <div class="item active">
                        <img src="img/bg_slider_02.webp" alt="" class="slide-image" />
                        <div class="container">
                            <div class="row">
                                <div class="slide-text slide_style_left white_fonts">
                                    <h2 data-animation="animated">Join The World's <br>Highest Performing <span style="color: #e9d16f;">Crypto</span> <br>Investment Company.</h2>
                                    <a href="{{route('user.register')}}" class="btn btn-default active">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <img src="img/bg_slider_01.webp" alt="" class="slide-image" />
                        <div class="container">
                            <div class="row">
                                <div class="slide-text slide_style_left white_fonts">
                                    <h2 data-animation="animated">We Are Professional <br> With a Proven Track Record &amp; Excellence </h2>
                                    <a href="{{route('user.register')}}" class="btn btn-default active">Register</a>
                                    <a href="login.php" class="btn btn-default">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of Wrapper For Slides -->
                <!-- Left Control -->
                <a class="left carousel-control" href="#next" role="button" data-slide="prev">
                    <span class="fa fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <!-- Right Control -->
                <a class="right carousel-control" href="#next" role="button" data-slide="next">
                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- End  bootstrap-touch-slider Slider -->
        </div>
    </section>
    <!-- end full slider parallax section -->
    <br>
    <section class="" style="background: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="full">
                        <div class="col-md-5 col-xs-12 pull-right">
                            <div class="full">
                                <div class="banner_icon">
                                    <img class="img-responsive" src="img/img_wallet.png" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-xs-12">
                            <div class="full" style="margin-top:30px;">
                                <h2 class="heading_style2">Build Up Your Crypto Portfolio.</h2>
                                <p class="left_text" style="font-size: 18px;">Btc-Finance.org is a crypto currency investment company created by a group of blockchain and crypto enthusiasts for an amazing community that keeps growing so that everyone regardless of your investment size, technical background or experience in cryptocurrencies will gain from the earnings that comes with crypto investment. We offer you the most profitable and reliable crypto investment contracts by providing daily payouts on all investment packages.</p>
                                <div class="">
                                    <a class="btn main_btn" href="{{route('user.register')}}">open account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>

    <!-- section -->
    <section class="padding_0 info_coins">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="full">
                        <h2 style="display:none;">heading</h2>
                        <div class="coin_formation">
                            <ul>
                                 <li>
                                    <span class="curr_name">AMOUNT PROCESSED</span>
                                    <span class="curr_price">$075M</span>
                                 </li>

                                 <li>
                                    <span class="curr_name">Active Clients</span>
                                    <span class="curr_price">6636</span>
                                 </li>

                                 <li>
                                    <span class="curr_name">24Hr Avg. Payout</span>
                                    <span class="curr_price">08114 USD</span>
                                 </li>

                                 <li>
                                    <span class="curr_name">24Hr Avg. Investments</span>
                                    <span class="curr_price">80912 USD</span>
                                 </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    
    <!-- section -->
    <section class="layout_padding dark_bg" id="plans">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="full">
                        <div class="heading_main">
                            <h2><span>Investment Plans</span></h2>
                            <p>Select an investment plan to get started</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($Prices as $p)
                <div class="col-md-4">
                    <div class="full">
                        <div class="coin_selling_bt">
                            <ul>
                                <li><a class="active" href="{{ $p->button }}">{{$p->title}}</a></li>
                            </ul>
                            <div class="coin_price_table">
                                <h3 style="font-size: 50px;">{{ $p->price }}</h3>
                                <h3>{{ $p->notes }}</h3>
                                    {!! $p->content !!}
                                <div class="center">
                                    <a class="pay_btn" href="{{ $p->button }}">Select Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <!-- end section -->
    
    <br>
    
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="full">
                        <div class="heading_main">
                            <h2><span>Why Choose Us?</span></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row service_main">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="full service_section">
                        @forelse ($Services as $f)
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="center">
                                <img src="img/icon_01.webp" width="50px" height="50px">
                            </div>
                            <div class="center">
                                <h3>{{$f->title}}</h3>
                            </div>
                            <p>{!! $f->content !!}</p>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section -->
    <section class="layout_padding_2 dark_bg white_fonts">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="full">

                        <div class="col-md-7 col-xs-12">
                            <div class="full">
                                <h2 class="heading_style2">Invest with confidence on the most trusted investment platform</h2>
                                <p class="left_text" style="font-size: 18px;">Earning the trust of our clients has always been our highest priority. We earn that trust through the best security in the business — most of our digital assets are held safely in cold wallets so bad actors can't reach it.</p>
                            </div>
                        </div>

                        <div class="col-md-5 col-xs-12">
                            <div class="full">
                                <div class="btcwdgt-chart" bw-noshadow="true"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <section style="background-image:url(img/bg_front_01.jpg); background-repeat: no-repeat; background-size: cover;">
        <container>
            <div class="row">

                <div class="col-md-12">
                    <br>
                    <br>
                    <center>
                        <h1 style="color: #fff; font-weight: bold; font-size: 30px;">Recent Transactions</h1>
                        <br>
                        <iframe src="https://www.btcwidget.info/widget/liveTx/%23000000/%23000000/%23000000/%23ffffff/%23000000/1000/500/10" width="1000" height="500" frameBorder="0" scrolling="no"></iframe>
                    </center>
                    <br>

                </div>

            </div>
        </container>
    </section>

    <br>

    <!-- section -->
    <section class="" id="reviews">
        <div class="container">
           
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="full">
                        <div class="heading_main">
                            <h2><span>Reviews</span></h2>
                            <p>Hear from our amazing community</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div id="myCarousel" class="carousel-slide">

                 <ol class="carousel-indicators">
                     <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                     <li data-target="#myCarousel" data-slide-to="1"></li>
                     <li data-target="#myCarousel" data-slide-to="2"></li>
                     <li data-target="#myCarousel" data-slide-to="3"></li>
                     <li data-target="#myCarousel" data-slide-to="4"></li>
                     <li data-target="#myCarousel" data-slide-to="5"></li>
                 </ol>
                 <div class="carousel-inner">
                     <div class="item-active">
                            <img src="img/img_testi.png" alt="CASHS" >
                     </div>
                     <div class="item">
                            <img src="img/img_testi.png" alt="SWAROVSKI">
                     </div>
                     <div class="item">
                            <img src="img/img_testi.png" alt="MARQUIS" >
                     </div>
                     <div class="item">
                            <img src="img/img_testi.png" alt="ORREFORS" >
                     </div>
                     <div class="item">
                            <img src="img/img_testi.png" alt="WATERFORD" >
                     </div>
                 </div>
                 <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                     <span class="glypicon glypicon-cheveron-left"></span>
                 </a>
                  <a class="arousel-control right" href="#myCarousel" data-slide="next">
                     <span class="glypicon glypicon-cheveron-right"></span>
                 </a>


             </div>

            </div>

        </div>
    </section>
    <!-- end section -->

    <section class=" dark_bg white_fonts">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="full">

                        <div class="col-md-12">
                            <div class="full" style="margin-top:12px;">
                                <h2 class="heading_style2" style="text-align: center;">Earn Extra 10% With Our Amazing Referral Program</h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="full">
                <ul class="brand-list">
                    @forelse ($Partners as $p)
                        <li>
                            <a href="{{$p->link}}" target="_blank"><img src="/storage/images/{{$p->image}}" alt="{{$p->title}}" title="{{$p->title}}" width="120"></a>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <!-- end section -->

    <footer id="footer" class="footer_main">
    <div class="container">
        <div class="row">
           
            <div class="col-md-4">
                <div class="footer_logo">
                    <a href="{{route('frontpage')}}"><img src="img/logo.png" alt="{{opsi('website')}}" title="{{opsi('website')}}" /></a>
                </div>
                <p class="footer_desc">Copyright &copy;  2021 {{opsi('website')}}. All Rights Reserved.</p>
            </div>
            
            <div class="col-md-4">
                <div class="main-heading left_text">
                    <h2>Quick links</h2>
                </div>
                <ul class="footer-menu" style="width:50%;">
                    <li><a href="{{route('frontpage')}}"><i class="fa fa-angle-right"></i> Home</a></li>
                    <li><a href="{{url('about')}}"><i class="fa fa-angle-right"></i> About</a></li>
                    <li><a href="{{url('about')}}"><i class="fa fa-angle-right"></i> Plans</a></li>
                    <li><a href="{{url('about')}}"><i class="fa fa-angle-right"></i> Reviews</a></li>
                </ul>
                <ul class="footer-menu" style="width:50%;">
                    <li><a href="{{route('user.register')}}"><i class="fa fa-angle-right"></i> Register</a></li>
                    <li><a href="{{route('login')}}"><i class="fa fa-angle-right"></i> Login</a></li>
                    <li><a href="{{url('contact')}}"><i class="fa fa-angle-right"></i> Contact Us</a></li>
                    
                </ul>
            </div>
            
            <div class="col-md-4">
                <div class="main-heading left_text">
                    <h2>Contact us</h2>
                </div>
               <p>
                    {{opsi('website')}}<br>
                    Phone: +60 11 1289 8940<br>
                    WhatsApp: +60 11 1289 8940<br>
                    Email: <a href="emailto:nagatrederforexmalaysia@gmail.com">nagatrederforexmalaysia@gmail.com</a>
                </p>
            </div>
            
        </div>
    </div>
</footer>

<script src="{{ asset('js/js_jquery.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<script type="text/javascript">
     //starts the carousel
     $document.ready(function () {
         $('#myCarousel').carousel();
     });
</script>


<script>
    (function(b, i, t, C, O, I, N) {
        window.addEventListener('load', function() {
            if (b.getElementById(C)) return;
            I = b.createElement(i), N = b.getElementsByTagName(i)[0];
            I.src = t;
            I.id = C;
            N.parentNode.insertBefore(I, N);
        }, false)
    })(document, 'script', 'https://widgets.bitcoin.com/widget.js', 'btcwdgt');
</script>

</body>
</html>