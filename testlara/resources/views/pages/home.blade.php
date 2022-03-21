<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Svexe</title>
         <!-- Scripts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
        <link href="{{('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{('css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{('css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{('css/price-range.css')}}" rel="stylesheet">
        <link href="{{('css/animate.css')}}" rel="stylesheet">
        <link href="{{('css/main.css')}}" rel="stylesheet">
        <link href="{{('css/responsive.css')}}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
            <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>S</span>-VeXe</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="owl-carousel owl-theme">
                        @foreach($tramdung as $key => $td)
                        <div class="item"><h4><img src="{{asset('uploads/tramdung/'.$td->anh)}}" alt="{{$td->tentam}}" style="height:100px;width: 150px"><p>{{$td->tentram}}</p></h4></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Tuyến Đường</h2>
                            <ul class="nav nav-pills nav-stacked">
                            @foreach($tuyenduong as $key => $td)
                                <li><a href="#">{{$td->ten}}</a></li>
                            @endforeach   
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Loại Xe</h2>
                            <ul class="nav nav-stacked">
                            @foreach($loaixe as $key => $lx)
                                <li style="margin-left: 15px"><a href="#">{{$lx->tenlx}}</a></li>
                            @endforeach  
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Web</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 S-VeXe Inc. All rights reserved.</p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
            <!-- Scripts -->
        <!-- Fonts -->
            <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
        <link href="{{('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{('css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{('css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{('css/price-range.css')}}" rel="stylesheet">
        <link href="{{('css/animate.css')}}" rel="stylesheet">
        <link href="{{('css/main.css')}}" rel="stylesheet">
        <link href="{{('css/responsive.css')}}" rel="stylesheet">
        <link href="{{('css/sweetalert.css')}}" rel="stylesheet">
    </head>
    <body > 
    <!-- Scripts -->
     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script src="{{('js/jquery.js')}}"></script>
    <script src="{{('js/bootstrap.min.js')}}"></script>
    <script src="{{('js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{('js/price-range.js')}}"></script>
    <script src="{{('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{('js/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{('js/owl.carousel.js')}}"></script>
    <script src="{{('js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
    </script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<!-- <script>
     var usd=document.getElementById("vnd_to_usd").value;
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AbPi016rs-z5xHXfE0BFzqWQRhCrDeW2G09s-yQmthbm1gxZtYZJPmw7ejARZBXU75FjEC6LPpDyWjlb',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: `${usd}`,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Cảm ơn bạn đã chọn chuyến đi của chúng tôi');
      });
    }
  }, '#paypal-button');

</script> -->
    </body>