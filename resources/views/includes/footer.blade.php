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
                    <h2>Quick Links</h2>
                </div>
                <ul class="footer-menu" style="width:50%;">
                    <li><a href="{{route('frontpage')}}"><i class="fa fa-angle-right"></i> Home</a></li>
                    <li><a href="{{url('about')}}"><i class="fa fa-angle-right"></i> About</a></li>
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
                    <h2>Contact Us</h2>
                </div>
               <p>
                    {{opsi('website')}}<br>
                    Petaling Jaya Selangor, Malaysia<br>
                    Phone: {{opsi('phone')}}<br>
                    WhatsApp:{{opsi('phone')}}<br>
                    Email: <a href="{{opsi('email')}}">{{opsi('email')}}</a>
                </p>
            </div>
            
        </div>
    </div>
</footer>

<script src="{{ asset('js/js_jquery.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>