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

    <!-- pricing -->
    <section class="section section--border-top">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12 col-sm-10 offset-sm-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    <h2 class="section__title">Current Prices</h2>
                    <p class="section__text">That guarantee you some hashing power</p>
                </div>
                <!-- end section title -->
            </div>

            <div class="row">
                <div class="col-12 col-lg-10 offset-lg-1 col-xl-12 offset-xl-0">
                    <div class="price-wrap">
                        
                        @forelse ($data as $d)
                        <!-- price -->
                        <div class="price">
                            <h3 class="price__title">{{$d->title}}</h3>
                            <p>{!! $d->content !!}</p>
                            <span class="price__value">{{$d->price}}</span>
                            <p class="price__text">{{$d->notes}}</p>
                            <a href="{{$d->button}}"><button class="btn btn--border btn--center" type="button">Start Now</button></a>
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

    <!-- partners -->
    <div class="partners section--border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- partners slider -->
                    <div class="owl-carousel partners__slider">
                        @forelse ($partners as $p)
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
    </div>
    <!-- end partners -->

@stop