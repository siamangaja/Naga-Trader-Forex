@extends('layouts.app')
@section('title', $title)
@section('content')

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
                                    <a href="{{route('login')}}" class="btn btn-default">Login</a>
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
                            <div class="coin_price_table" style="float:none !important;">
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
                                <img src="img/startup.png" width="50px" height="50px">
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

                <div class="full testmonial_slider">
                <div class="carousel slide" data-ride="carousel" id="testi">
                    <!-- Carousel Slides / Quotes -->
                    <div class="carousel-inner text-center">

                        <div class="item active">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="center">
                                            <div class="client_img"><img class="img-responsive" src="storage/images/{{ $Testimonial->image }}" alt=""></div>
                                        </div>
                                        <p><span class="left_testmonial_qout"><i class="fa fa-quote-left"></i></span>{!! $Testimonial->content !!}<span class="right_testmonial_qout"><i class="fa fa-quote-right"></i></span>
                                        </p>
                                        <div class="center">
                                            <p class="client_name">{{$Testimonial->name}}</p>
                                        </div>
                                        <div class="center">
                                            <p class="country_name">{{$Testimonial->company}}</p>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                        </div>

                        @forelse ($Testimonials as $T)
                        <div class="item">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="center">
                                            <div class="client_img"><img class="img-responsive" src="storage/images/{{ $T->image }}" alt="#"></div>
                                        </div>
                                        <p><span class="left_testmonial_qout"><i class="fa fa-quote-left"></i></span>{!! $T->content !!}<span class="right_testmonial_qout"><i class="fa fa-quote-right"></i></span>
                                        </p>
                                        <div class="center">
                                            <p class="client_name">{{$T->name}}</p>
                                        </div>
                                        <div class="center">
                                            <p class="country_name">{{$T->company}}</p>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        @empty
                        @endforelse

                    </div>

                    <a data-slide="prev" href="#testi" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#testi" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                </div>
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

@stop