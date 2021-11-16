@extends('layouts.app')
@section('title', $title)
@section('content')

<section id="inner_page_infor" class="innerpage_banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="full">
                    <div class="inner_page_info">
                        <h3>{{$title}}</h3>
                        <ul>
                            <li><a href="{{route('frontpage')}}">Home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li><a href="{{url()->current()}}">{{$title}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="layout_padding_2" style="background: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="full">
                    <h2 class="heading_style2">{{$title}}</h2>
                    {!! $data !!}
                </div>
            </div>
        </div>
    </div>
</section>

<style type="text/css">
    p {
        text-align: inherit !important;
    }
</style>

@stop