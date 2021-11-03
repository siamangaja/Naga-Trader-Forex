@extends('layouts.app')
@section('title', $title)

@section('content')

    <!-- page title -->
    <section class="section section--first section--bg" data-bg="img/section/section-bg.jpg">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12 col-sm-10 offset-sm-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    <h2 class="section__title section__title--white">{{$title}}</h2>
                </div>
                <!-- end section title -->
            </div>
        </div>
    </section>
    <!-- end page title -->

    <!-- services -->
    <section class="section">
        <div class="container">
            <div class="row row--grid">

                @forelse ($data as $d)
                <div class="col-12 col-md-6 col-xl-3">
                    <!-- service -->
                    <div class="service">
                        {!! $d->icon !!}
                        <h3 class="service__title">{{$d->title}}</h3>
                        {!! $d->content !!}
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
    <div class="section section--bg" data-bg="/img/section/section-bg2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title -->
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <a class="section__video" href="https://www.youtube.com/watch?v=Pl8OlkkwRpc"><i class="ti-control-play"></i></a>
                        <p class="section__text section__text--white section__text--head">Check out our mining farm setup. To bring you the best we must hire the best.</p>
                    </div>
                    <!-- end section title -->
                </div>
            </div>
        </div>
    </div>
    <!-- end video -->

    <!-- currencies -->
    <section class="section section--border-bottom">
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

@stop