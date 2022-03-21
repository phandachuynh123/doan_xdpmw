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
    <section id="card-items">
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="{{URL::to('/')}}">Home</a></li>
        <li></li>
        <li class="active">Chọn ghế</li>
    </ol>
</div></section>
    @php
$countA=count($hangA1);
$countB=count($hangB1);
$countC=count($hangC1);
$countD=count($hangD1);
@endphp

<div style="float:left;width:230px;height:285px;"class="boder2">
      <div><label>Tầng 1</label></div>  
<form action="{{URL::to('/vexe')}}" method="POST">
<div style="float:left;margin-top: 15px;"class="boder1">
{{csrf_field()}}
<input type="hidden" name="macd" value="{{$chuyen}}">
<input type="hidden" name="ngaykh" value="{{$time}}">
    @foreach($hangA1 as $key=>$A1)
        <button type="submit" name="ghe"id="ghe"value="{{$A1->maghe}}"{{$A1->tinhtrang==1 ? 'disabled' :''}}>{{$A1->maghe}}</button>
    @endforeach

</div> 
</form>
<form action="{{URL::to('/vexe')}}" method="POST">
<div style="float:left;"class="boder1">

{{csrf_field()}}
<input type="hidden" name="macd" value="{{$chuyen}}">
<input type="hidden" name="ngaykh" value="{{$time}}">
      @foreach($hangB1 as $key=>$B1)
      <button type="submit" name="ghe"id="ghe" value="{{$B1->maghe}}" {{$B1->tinhtrang==1 ? 'disabled' :''}}>{{$B1->maghe}}</button> 
    @endforeach  

</div> </form>
<form action="{{URL::to('/vexe')}}" method="POST">
<div style="float:left;"class="boder1">

{{csrf_field()}}
<input type="hidden" name="macd" value="{{$chuyen}}">
<input type="hidden" name="ngaykh" value="{{$time}}">
        @foreach($hangC1 as $key=>$C1)
       <button type="submit" name="ghe"id="ghe" value="{{$C1->maghe}}"{{$C1->tinhtrang==1 ? 'disabled' :''}}>{{$C1->maghe}}</button>
    @endforeach

</div> </form>
<form action="{{URL::to('/vexe')}}" method="POST">
<div style="float:left;"class="boder1">

{{csrf_field()}}
<input type="hidden" name="macd" value="{{$chuyen}}">
<input type="hidden" name="ngaykh" value="{{$time}}">
@foreach($hangD1 as $key=>$D1)
         <button type="submit" name="ghe"id="ghe" value="{{$D1->maghe}}"{{$D1->tinhtrang==1 ? 'disabled' :''}}>{{$D1->maghe}}</button>
    @endforeach

</div>

</div>
  
<div style="float:left;width:230px;height:285px;"class="boder2">
    
      <div><label>Tầng 2</label></div>
<form action="{{URL::to('/vexe')}}" method="POST">
<div style="float:left;margin-top: 15px;"class="boder1">

{{csrf_field()}}
<input type="hidden" name="macd" value="{{$chuyen}}">
<input type="hidden" name="ngaykh" value="{{$time}}">
    @foreach($hangA2 as $key=>$A2)
        <button type="submit" name="ghe"id="ghe" value="{{$A2->maghe}}"{{$A2->tinhtrang==1 ? 'disabled' :''}}>{{$A2->maghe}}</button>
    @endforeach
</div> </form>
<form action="{{URL::to('/vexe')}}" method="POST">
<div style="float:left;margin-top: 15px;"class="boder1">

{{csrf_field()}}
<input type="hidden" name="macd" value="{{$chuyen}}">
<input type="hidden" name="ngaykh" value="{{$time}}">
      @foreach($hangB2 as $key=>$B2)
      <button type="submit" name="ghe"id="ghe" value="{{$B2->maghe}}"{{$B2->tinhtrang==1 ? 'disabled' :''}}>{{$B2->maghe}}</button>
    @endforeach  

</div> </form>
<form action="{{URL::to('/vexe')}}" method="POST">
<div style="float:left;"class="boder1">

{{csrf_field()}}
<input type="hidden" name="macd" value="{{$chuyen}}">
<input type="hidden" name="ngaykh" value="{{$time}}">
        @foreach($hangC2 as $key=>$C2)
        <button type="submit" name="ghe"id="ghe"value="{{$C2->maghe}}"{{$C2->tinhtrang==1 ? 'disabled' :''}}>{{$C2->maghe}}</button>
    @endforeach
</div> </form>
<form action="{{URL::to('/vexe')}}" method="POST">
<div style="float:left;"class="boder1">

{{csrf_field()}}
<input type="hidden" name="macd" value="{{$chuyen}}">
<input type="hidden" name="ngaykh" value="{{$time}}">
@foreach($hangD2 as $key=>$D2)

        <button type="submit" name="ghe"id="ghe" value="{{$D2->maghe}}"{{$D2->tinhtrang==1 ? 'disabled' :''}}>{{$D2->maghe}}</button>
    @endforeach

</div></form>

</div><div style="margin-top: 370px;"><button class="btn btn-warning" onclick="goBack()">Go Back</button></div>

</div>
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
                        <div class="item"><h4><img src="{{asset('public/uploads/tramdung/'.$td->anh)}}" alt="{{$td->tentam}}" style="height:100px;width: 150px"><p>{{$td->tentram}}</p></h4></div>
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
<style>
    .boder1 {
         display: flex;
  flex-direction: column-reverse;

    }.boder2{
        border-style: groove;
        align-self:flex-end;
    }
</style>

<script>
function goBack() {
  window.history.back();
}
</script>
