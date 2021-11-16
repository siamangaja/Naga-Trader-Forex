@extends('layouts.app')
@section('title', $title)
@section('content')

<section id="inner_page_infor" class="innerpage_banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="full">
                    <div class="inner_page_info">
                        <h3>Contact Us</h3>
                        <ul>
                            <li><a href="{{route('frontpage')}}">Home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li><a href="{{url('contact')}}">Contact Us</a></li>
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
                    {!! $content !!}
                    <br>
                </div>
            </div>

            <div class="col-md-4">
                <form action="{{route('submit.contact')}}" method="POST">
                    @csrf
                    <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Your name">
                    </div>
                    <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control form-control-lg" id="phone" name="phone" placeholder="Your phone">
                    </div>
                    <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Your email">
                    </div>
                    <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control form-control-lg" id="msg" name="msg" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn main_btn">Submit</button>
                </form>
            </div>

            <div class="col-md-8">
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