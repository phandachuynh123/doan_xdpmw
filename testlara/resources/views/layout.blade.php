<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
    </head>
    <body > 
<div class="container">
    <!-----------------nav-------------->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a href="{{URL::to('/')}}">
    <div class="companyinfo" style="margin-top:0px">
                            <h2><span>S</span>-VeXe</h2>
                        </div></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
    <div class="navbar-nav" style="float: right;">
      <a class="nav-item nav-link" href="{{URL::to('/show')}}">Giỏ hàng</a> 
      <a class="nav-item nav-link" href="{{URL::to('/index')}}">Quản Lý Đơn Hàng</a>
      <li class="nav-item dropdown">
        <p class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Liên Hệ
        </p>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <p class="dropdown-item"><u style="Color:blue">1900888843</u> - Để được hướng dẫn cách đặt vé online</p>
          <p class="dropdown-item"><u style="Color:blue">1900969681</u> - Để phản hồi về dịch vụ và xử lý sự cố</p>
          <p class="dropdown-item"><u style="Color:blue">1900888684</u> - Để đặt vé qua điện thoại</p>
        </div>
      </li>
      
    </div>
  </div>
</nav>
@yield('content')
</div>
<div class="card bg-dark text-white">
  <img class="card-img" src="{{asset('images/leaderboard.jpg')}}" alt="Card image">
  <div class="card-img-overlay">
  <form class="form-inline mx-auto "style="height:500px;padding-left:300px;margin-top:100px;"action="{{URL::to('/tim-kiem')}}" method="POST">
<!-----------------slide-------------->

<!-----------------search-------------->

{{csrf_field()}}
        <input  style="width: 20%;height: 10%;font-size:25px" type="search" name="search_1" list="search_1" placeholder="Nhập điểm đi" value="Hồ Chí Minh">
        <input  style="width: 20%;height: 10%;font-size:25px" type="search" name="search_2" list="search_2" placeholder="Nhập điểm đến"value="Hà Nội">
      <input  style="width: 20%;height: 10%;font-size:25px " type="date" name="search_time" placeholder="DATE"value="{{  now()->toDateString('yyyy-mm-dd') }}">
      <button class="btn btn-warning " style="width: 20%;height: 10%;font-size:25px"name="search_cd" type="submit">Tìm Chuyến Đi</button>
    <datalist id="search_1">
@foreach($tinh as $key => $t)
   <option value="{{$t->tentinh}}">{{$t->tentinh}}</option>@endforeach
</datalist>
    <datalist id="search_2">
@foreach($tinh as $key => $t)
   <option value="{{$t->tentinh}}">{{$t->tentinh}}</option>@endforeach
</datalist>
    </form>
    </div>
</div>
    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>S</span>-VeXe</h2>
                        </div>
                    </div>
                    <div class="owl-carousel owl-theme">
                        @foreach($tramdung as $key => $td)
                        <div class="item"><h4><img src="{{asset('uploads/tramdung/'.$td->anh)}}" alt="{{$td->tentam}}" style="height:100px;width: 150px"><p>{{$td->tentram}}</p></h4></div>
                        @endforeach
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="images/home/map.png" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
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
    <script src="{{ asset('js/app.js') }}" defer></script>
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
    </body>
</html>

