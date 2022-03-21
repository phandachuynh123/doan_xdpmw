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
<div>
<form class="form-inline mx-auto "action="{{URL::to('/tim-kiem')}}" method="POST">
{{csrf_field()}}
        <input style="width: 21%;height: 50px;font-size:25px;" type="search" name="search_1" list="search_1" placeholder="Nhập điểm đi" value="{{$search_1}}">
        <input style="width: 21%;height: 50px;font-size:25px;" type="search" name="search_2" list="search_2" placeholder="Nhập điểm đến"value="{{$search_2}}">
      <input style="width: 20%;height:  50px;font-size:25px;" type="date" name="search_time" placeholder="DATE"value="{{$search_time}}">
      <button class="btn btn-warning " style="width: 20%;height: 10%;font-size:25px"name="search_cd" type="submit">Tìm Chuyến Đi</button>
    <datalist id="search_1">
@foreach($tinh as $key => $t)
   <option value="{{$t->tentinh}}">{{$t->tentinh}}</option>@endforeach
</datalist>
    <datalist id="search_2">
@foreach($tinh as $key => $t)
   <option value="{{$t->tentinh}}">{{$t->tentinh}}</option>@endforeach
</datalist>
    </form></div>
    <section id="card-items">
<div class="breadcrumbs">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/')}}">Home</a></li>
		<li></li>
		<li class="active">Tìm kiếm</li>
	</ol>
</div></section>
<div class="col-md-10">
	@php
$count=count($search_cd);
@endphp
@if($count==0)
<div >
	<div class="box-shadow" style="width:100%">
		  <div class="card-body">
		  	<img class="card-img-top" src="{{asset('images/car.jpg')}}" alt="Card image cap" style="width:30%; margin-left: 30%;">
		  	<p style=" margin-left: 20%;font-size:20px; ">Không tìm thấy kết quả xe tuyến {{$keywords}} vào ngày {{$search_time}}</p>

		  </div>
	</div>
</div>
@else
@foreach($search_cd as $key => $scd)
<form method="POST" action="{{ url('/dat-ve')}}">
	@csrf 
<div>

  		@php
  		foreach($xe as $key =>$x)
	if($scd->bienso==$x->bienso)
	{
		foreach($loaixe as $key =>$lx)
		if($x->malx==$lx->malx)
		{
		$tenlx=$lx->tenlx;
		$anh=$lx->anh;
		$lg=$lx->loaighe;
		}
	}

@endphp
<div id="card">
<div>
<h2 style="background-color: 
Orange;margin-left: 50px;width: 150px;text-align: center;" >{{$tenlx}}<h3 style="background-color: 
Orange;float: right;" class="card-text">{{($scd->tongtien.' '.'VND')}}</h3></h2>

</div>

  <div class="card-body">

  	<div class="div_left">

    	<img class="card-img-top" src=" {{asset('uploads/loaixe/'.$anh)}}" alt="Card image cap" style="width:150px;height:150px">
    </div>
<div >
	<input type="hidden" name="macd" value="{{$scd->macd}}">
	<input type="hidden" name="ngaykh" value="{{$search_time}}">
	<input type="hidden" name="bienso" value="{{$scd->bienso}}">
	<input type="hidden" name="diemdi" value="{{$scd->diemdi}}">
	<input type="hidden" name="diemden" value="{{$scd->diemden}}">
    <h4 class="card-title">{{$scd->tuyenduong}}</h4>
    <h4 class="card-text">
    @php
    if($lg==0)
    	echo 'Ghế ngồi';
    
    else
    echo 'Gường nằm';
    @endphp
    </h4>
    <div style="float: left;margin: 10px;"><svg class="TicketPC__LocationRouteSVG-sc-1mxgwjh-4 eKNjJr" xmlns="http://www.w3.org/2000/svg" width="14" height="74" viewBox="0 0 14 74"><path fill="none" stroke="#787878" stroke-linecap="round" stroke-width="2" stroke-dasharray="0 7" d="M7 13.5v46"></path><g fill="none" stroke="#484848" stroke-width="3"><circle cx="7" cy="7" r="7" stroke="none"></circle><circle cx="7" cy="7" r="5.5"></circle></g><path d="M7 58a5.953 5.953 0 0 0-6 5.891 5.657 5.657 0 0 0 .525 2.4 37.124 37.124 0 0 0 5.222 7.591.338.338 0 0 0 .506 0 37.142 37.142 0 0 0 5.222-7.582A5.655 5.655 0 0 0 13 63.9 5.953 5.953 0 0 0 7 58zm0 8.95a3.092 3.092 0 0 1-3.117-3.06 3.117 3.117 0 0 1 6.234 0A3.092 3.092 0 0 1 7 66.95z" fill="#787878"></path></svg></div>
    <div style="float: left;margin-left: 10px;">
   <p class="card-text"><b>{{date('H:i d/m/Y',strtotime($scd->ngaydi))}}</b> - {{$scd->diemdi}}</p>
<p>
@php
   $newdate=(strtotime($scd->ngayden))-date(strtotime($scd->ngaydi));
$H = floor($newdate / 3600);
$i = ($newdate / 60) % 60;

echo sprintf("%02d:%02d", $H, $i);
@endphp h</p>
    <p class="card-text"><b>{{date('H:i d/m/Y', strtotime($scd->ngayden))}}</b> - {{$scd->diemden}}</p>
    </div>
    <button class="btn btn-warning " style="margin-left:30%;margin-top:8%"name="datve" type="submit">Đặt Vé</button>
  </div>
	  </div>
	</div>
	</div>
</form>
@endforeach
@endif
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
	<style>

.div_left{

width: 200px;

float: left;

text-align: center;

}

div#card{
      margin: 20px;
border: 1px solid;
    }
   div#card:hover {
    border: 1px solid;

    box-shadow: 10px 10px 10px #000;

}
</style>

