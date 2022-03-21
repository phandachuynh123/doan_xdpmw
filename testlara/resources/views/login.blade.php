@extends('pages.home')


<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="{{URL::to('/')}}">
        <div class="companyinfo" style="margin-top:0px">
            <h2><span>S</span>-VeXe</h2>
        </div>
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
    <div class="navbar-nav" style="float: right;"> 
      <a class="nav-item nav-link" href="{{URL::to('/show')}}">Giỏ hàng</a>
      <a class="nav-item nav-link" href="#">Quản Lý Đơn Hàng</a>
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
<section id="cart_items">
    <div class="container">
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="{{URL::to('/')}}">Home</a></li>
          <li class="active">Đăng Nhập</li>
        </ol>
      </div>
      <!--Main-->
      <div class="card-body">
        @if($message=Session::get('error'))
        <div class="alert alert-danger alert-block" >
            <button type="button" class="close"data-dismiss="alert">x</button>
            <strong>{{$message}}</strong>
        </div>
        @endif
        @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                    @endif
                    <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success"role="alert">
                    {{session('status')}}
                    </div>
                    @endif
                    <form method="POST" action="{{URL::to('/checklogin')}}">
                        @csrf

                        <div class="form-group row" style="margin-left:250px">
                            <div class="col-md-6">
                            <label for="email">E-Mail Address</label>
                                <input id="mail" type="email" class="form-control" name="mail" value="{{ old('mail') }}">
                            </div>
                        </div>

                        <div class="form-group row" style="margin-left:250px">
                            <div class="col-md-6">
                            <label for="sdt" >Số Điện Thoại</label>
                                <input id="sdt" type="password" class="form-control" name="sdt" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="margin-left: 20px;">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="Login">
                            </div>
                        </div>
                    </form>
                </div>
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
</div>
<script>
function goBack() {
  window.history.back();
}
</script>
<script>
    //Hàm đọc giá trị và hiện thị thông tin
    function tenkh(data) {
        document.getElementById('diachi').value=data ;
    }
</script>
