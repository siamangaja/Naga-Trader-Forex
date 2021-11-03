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

    <!-- news -->
    <div class="section section--border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <!-- sidebar -->
                        <div class="col-12 col-lg-4 order-lg-8">
                            <div class="sidebar sidebar--desk">
                                <ul class="sidebar__posts">
                                    @forelse ($data as $d)
                                    <li>
                                        <a href="news/{{$d->slug}}">{{$d->title}}</a>
                                        <span>{{ \Carbon\Carbon::parse($d->created_at)->diffForHumans() }}</span>
                                    </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!-- end sidebar -->

                        <!-- content -->
                        <div class="col-12 col-lg-8 order-lg-4">

                            <!-- post -->
                            @forelse ($data as $d)
                            <article class="post">
                                <figure class="post__img">
                                    <a href="news/{{$d->slug}}"><img src="/storage/images/{{$d->thumbnail}}" alt="{{$d->title}} title="{{$d->title}}"></a>
                                </figure>

                                <header class="post__header">
                                    <h2 class="post__title"><a href="news/{{$d->slug}}">{{$d->title}}</a></h2>
                                </header>

                                <div class="post__content">
                                    <p>{!! Str::limit( strip_tags( $d->content ), 220 ) !!}</p>
                                </div>

                                <div class="post__author">
                                    <img src="img/users/user1.jpg" alt="">
                                    <h6>Admin</h6>
                                    <span>{{ \Carbon\Carbon::parse($d->created_at)->diffForHumans() }}</span>
                                </div>

                                <a href="news/{{$d->slug}}" class="post__more">Read more</a>
                            </article>
                            @empty
                            @endforelse
                            <!-- end post -->

                            {{ $data->links() }}

                        </div>
                        <!-- end content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end news -->

@stop