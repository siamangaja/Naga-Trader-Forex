@extends('layouts.app')
@section('title', $title)

@section('content')

    <!-- home -->
    <section class="home home--circle">
        <!-- particles -->
        <div id="particles-js" class="home__particles"></div>
        <!-- end particles -->

        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-5 offset-xl-0">
                    <div class="home__content">
                        <h1 class="home__title">Start Bitcoin mining today!</h1>
                        <p class="home__text">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p>
                        <a href="{{route('user.register')}}" class="btn btn--shadow">get started</a>
                    </div>
                </div>

                <div class="col-xl-5 offset-xl-1">
                    <div class="home__content home__content--desk">
                        <div class="servers">
                            <div class="servers__title">Server status</div>
                            <div class="servers__item servers__item--green" title="Online">
                                Europe - Amsterdam
                            </div>
                            <div class="servers__item servers__item--green" title="Online">
                                China - Hong Kong
                            </div>
                            <div class="servers__item servers__item--yellow" title="Unstable">
                                India - Chennai
                            </div>
                            <div class="servers__item servers__item--green" title="Online">
                                USA - San Jose
                            </div>
                            <div class="servers__item servers__item--green" title="Online">
                                Japan - Tokyo
                            </div>
                            <div class="servers__item servers__item--red" title="Offlane">
                                Brazil - Sao Paulo
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="#services" data-scroll class="home__btn">
            <i class="ti-angle-double-down"></i>
        </a>
    </section>
    <!-- end home -->

    <!-- services -->
    <section class="section" id="services">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12 col-sm-10 offset-sm-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    <h2 class="section__title">Our Services</h2>
                    <p class="section__text">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                </div>
                <!-- end section title -->
            </div>

            <div class="row">
                 @forelse ($Services as $s)
                <div class="col-12 col-md-6 col-xl-3">
                    <!-- service -->
                    <div class="service">
                        {!! $s->icon !!}
                        <h3 class="service__title">{{$s->title}}</h3>
                        {!! $s->content !!}
                    </div>
                    <!-- end service -->
                </div>
                @empty
                @endforelse
            </div>

        </div>
    </section>
    <!-- end services -->

    <!-- video -->
    <div class="section section--bg" data-bg="img/section/section-bg2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title -->
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <a class="section__video" href="https://www.youtube.com/watch?v=Pl8OlkkwRpc"><i class="ti-control-play"></i></a>
                        <h2 class="section__title section__title--white">Why Choose Us?</h2>
                        <p class="section__text section__text--white">Check out our mining farm setup. To bring you the best we must hire the best.</p>
                    </div>
                    <!-- end section title -->
                </div>
            </div>
        </div>
    </div>
    <!-- end video -->

    <!-- currencies -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12 col-sm-10 offset-sm-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    <h2 class="section__title">Supported Currencies</h2>
                    <p class="section__text">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                </div>
                <!-- end section title -->
            </div>

            <div class="row">
                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <!-- currenc -->
                    <div class="currenc">
                        <i class="cc BTC currenc__icon"></i>
                        <span class="currenc__name">Bitcoin</span>
                        <span class="currenc__hash">43.1 PH/s</span>
                    </div>
                    <!-- end currenc -->
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <!-- currenc -->
                    <div class="currenc">
                        <i class="cc ETC-alt currenc__icon"></i>
                        <span class="currenc__name">Ethereum Classic</span>
                        <span class="currenc__hash">20.0 GH/s</span>
                    </div>
                    <!-- end currenc -->
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <!-- currenc -->
                    <div class="currenc">
                        <i class="cc ETH currenc__icon"></i>
                        <span class="currenc__name">Ethereum</span>
                        <span class="currenc__hash">120.1 GH/s</span>
                    </div>
                    <!-- end currenc -->
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <!-- currenc -->
                    <div class="currenc">
                        <i class="cc START currenc__icon"></i>
                        <span class="currenc__name">Startcoin</span>
                        <span class="currenc__hash">28.6 kH/s</span>
                    </div>
                    <!-- end currenc -->
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <!-- currenc -->
                    <div class="currenc">
                        <i class="cc LTC currenc__icon"></i>
                        <span class="currenc__name">Litecoin</span>
                        <span class="currenc__hash">2.7 GH/s</span>
                    </div>
                    <!-- end currenc -->
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <!-- currenc -->
                    <div class="currenc">
                        <i class="cc XMR currenc__icon"></i>
                        <span class="currenc__name">Monero</span>
                        <span class="currenc__hash">44.6 MH/s</span>
                    </div>
                    <!-- end currenc -->
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <!-- currenc -->
                    <div class="currenc">
                        <i class="cc VTC currenc__icon"></i>
                        <span class="currenc__name">Vertcoin</span>
                        <span class="currenc__hash">1.6 MH/s</span>
                    </div>
                    <!-- end currenc -->
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <!-- currenc -->
                    <div class="currenc">
                        <i class="cc IFC currenc__icon"></i>
                        <span class="currenc__name">Infinitecoin</span>
                        <span class="currenc__hash">184.1 kH/s</span>
                    </div>
                    <!-- end currenc -->
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <!-- currenc -->
                    <div class="currenc">
                        <i class="cc SLS currenc__icon"></i>
                        <span class="currenc__name">Salus</span>
                        <span class="currenc__hash">6.2 MH/s</span>
                    </div>
                    <!-- end currenc -->
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <!-- currenc -->
                    <div class="currenc">
                        <i class="cc XPM currenc__icon"></i>
                        <span class="currenc__name">PrimeCoin</span>
                        <span class="currenc__hash">12.1 MH/s</span>
                    </div>
                    <!-- end currenc -->
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <!-- currenc -->
                    <div class="currenc">
                        <i class="cc DASH currenc__icon"></i>
                        <span class="currenc__name">Dash</span>
                        <span class="currenc__hash">198.8 kH/s</span>
                    </div>
                    <!-- end currenc -->
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <!-- currenc -->
                    <div class="currenc">
                        <i class="cc SDC currenc__icon"></i>
                        <span class="currenc__name">Shadow</span>
                        <span class="currenc__hash">13.5 MH/s</span>
                    </div>
                    <!-- end currenc -->
                </div>

                <div class="col-12">
                    <a href="{{route('user.register')}}" class="btn btn--center btn--section btn--shadow">get started</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end currencies -->

    <!-- testimonials -->
    <section class="section section--blue">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12 col-sm-10 offset-sm-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    <h2 class="section__title">Client Testimonials</h2>
                    <p class="section__text">What 100% real people say about us</p>
                </div>
                <!-- end section title -->
            </div>
        </div>
        <!-- testimonials slider -->
        <div class="owl-carousel testimonial-slider testimonial-slider--blue">
            @forelse ($Testimonials as $d)
            <div class="testimonial">
                <div class="testimonial__text">
                    {!! $d->content !!}
                </div>
                <div class="testimonial__client">
                    <img src="img/users/user1.jpg" alt="">
                    <p>{{$d->name}}</p>
                    <span>{{$d->company}}</span>
                </div>
            </div>
            @empty
            @endforelse
        </div>
        <!-- end testimonials slider -->
    </section>
    <!-- end testimonials -->

    <!-- pricing -->
    <section class="section section--border-bottom">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12 col-sm-10 offset-sm-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    <h2 class="section__title">Pricing</h2>
                    <p class="section__text">Various versions have evolved over the years, sometimes by accident, sometimes on purpose.</p>
                </div>
                <!-- end section title -->
            </div>

            <div class="row">
                <div class="col-12 col-lg-10 offset-lg-1 col-xl-12 offset-xl-0">
                    <div class="price-wrap">
                        
                        @forelse ($Prices as $p)
                        <!-- price -->
                        <div class="price">
                            <h3 class="price__title">{{$p->title}}</h3>
                            <p>{!! $p->content !!}</p>
                            <span class="price__value">{{$p->price}}</span>
                            <p class="price__text">{{$p->notes}}</p>
                            <a href="{{$p->button}}"><button class="btn btn--border btn--center" type="button">Start Now</button></a>
                        </div>
                        <!-- end price -->
                        @empty
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end pricing -->

    <!-- get started -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <!-- get started -->
                    <div class="get-started">
                        <h3 class="get-started__title">Create Account</h3>
                        <p class="get-started__text">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
                        <a href="{{route('user.register')}}" class="btn">get started</a>
                    </div>
                    <!-- end get started -->
                </div>
            </div>
        </div>
    </section>
    <!-- end get started -->

    <!-- partners -->
    <div class="partners section--border-top section--border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- partners slider -->
                    <div class="owl-carousel partners__slider">
                        @forelse ($Partners as $p)
                        <!-- slider item -->
                        <div class="item">
                            <a href="#">
                                <a href="{{$p->link}}" target="_blank"><img src="/storage/images/{{$p->image}}" alt="{{$p->title}}" title="{{$p->title}}"></a>
                            </a>
                        </div>
                        <!-- end slider item -->
                        @empty
                        @endforelse
                    </div>
                    <!-- end partners slider -->
            </div>
        </div>
    </div>
    <!-- end partners -->

@stop