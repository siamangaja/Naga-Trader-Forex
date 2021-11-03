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

    <!-- static page -->
    <section class="section section--border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-10 offset-xl-1">
                    <div class="article">
                        <!-- article content -->
                        <div class="article__content">
                            <h1>{{$title}}</h1>
                            <p>{!! $data !!}</p>
                        </div>
                        <!-- end article content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end static page -->

@stop