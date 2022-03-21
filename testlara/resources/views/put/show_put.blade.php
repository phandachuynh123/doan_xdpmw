@extends('pages.home')


<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{URL::to('/')}}"><p style="font-size: 25px;">Svexe</p></a>
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
<section id="cart_items">
    <div class="container">
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="{{URL::to('/')}}">Home</a></li>
          <li class="active">Đăt vé</li>
        </ol>
      </div>
            <div class="row">
        <div class="col-sm-6">
                         <div class="form-one">
                          <form action="{{URL::to('/save_customer')}}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control"  value="{{old('makh')}}" name="makh" id="exampleInputID" aria-describedby="emailHelp" placeholder="Ma Khách Hàng...">
                            <input type="text" class="form-control"  onkeyup="tenkh($( this ).val())" value="{{old('tenkh')}}" name="tenkh" id="tenkh" aria-describedby="emailHelp" placeholder="Tên Khách Hàng...">
                            <input type="text" class="form-control"value="{{old('diachi')}}" name="diachi" id="diachi" placeholder="Địa Chỉ">
                            <input type="number" class="form-control" value="{{old('sdt')}}" name="sdt"id="exampleInputPhone" placeholder="Số Điện Thoại">
                            <input type="text" class="form-control" onkeyup="sdt($( this ).val())"value="{{old('cmnd')}}" name="cmnd"id="exampleInputCMND" placeholder="CMND/CCCD">
                            <input type="email" class="form-control" value="{{old('mail')}}" name="mail"id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
            <div class="form-group">
          <label for="exampleInputPassword1">Chọn phương thức thanh toán</label>
            @if(!Session::get('success_paypal')==true)
          <select name="payment-option" id="payment-option">
            <option value="1">Qua chuyển khoản</option>
            <option value="2">Tiền mặt</option>
          </select>
          @else
          <select name="payment-option" id="payment-option">
            <option value="3">Đã thanh toán thành công bằng Paypal</option>
          </select>
          @endif
        </div>
         @if(!Session::get('success_paypal')==true)
                <input type="hidden" name="trangthai"id="trangthai" value="0">
        @else
            <input type="hidden" name="trangthai"id="trangthai" value="1">
        @endif
                            <input type="submit" name="sent_order" class="btn btn-primary btn-sm" value="Gửi">
                          </form>        
                          </div>
        </div>
      </div>
      <div class="table-responsive cart_info">
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
        @php
        $total=0;
          $content=Cart::content();
        @endphp
        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="image">Hình ảnh</td>
              <td class="description">Chuyến đi</td>
              <td class="price">Giá</td>
              <td class="quantity">Mã Ghế</td>
              <td class="total">Ngày khởi hành</td>
              <td class="total">Ngày Tới Nơi</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            @foreach($content as $v_content)
            @php
$subtotal=$v_content->price*$v_content->qty;
$total+=$subtotal;
@endphp
            <tr>
              <td class="cart_product">
                <a href=""><img src="{{asset('uploads/loaixe/'.$v_content->options->image)}}" width="100" alt=""></a>
              </td>
              <td class="cart_description">
                <h4><a href="">{{$v_content->name}}</a></h4>
                <p>ID: {{$v_content->id}}</p>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">
{{number_format($subtotal,0,',','.')}}đ
                </p>
              </td>
              <td class="cart_quantity">
                <p>{{$v_content->options->size}}</p>
                <div class="cart_quantity_button">
                  
                </div>
              </td>
              <td class="cart_date">
                <p >{{$v_content->options->date1}}</p>
              </td>
              <td class="cart_date">
                <p >{{$v_content->options->date2}}</p>
              </td>
              @if(!Session::get('success_paypal')==true)
              <td class="cart_delete">
                          <form action="{{URl::to('/destroy/'.$v_content->rowId)}}" method="POST">
   @method('DELETE')
   @csrf
   <button type="submit"><i class="fa fa-times"></i></button>
 </form>
              </td>@endif
            </tr>
@endforeach
          </tbody>
        </table>
        <div style="margin-left: 800px;">
@php
$total_usd=$total/22855;
$total_paypal=round($total_usd,2);
\Session::put('total_paypal',$total_paypal);
@endphp
<p>Tổng tiền:<span>{{number_format($total,0,',','.')}}đ</span></p>
<!--     <div id="paypal-button"></div> -->
            @if(!Session::get('success_paypal')==true)
    <a class="btn btn-primary m-3 check_out" href="{{ route('processTransaction') }}">Thanh toán bằng Paypal</a>@endif
<input type="hidden" name="vnd_to_usd" id="vnd_to_usd" value="{{round($total_usd,2)}}">
     </div>
      </div>

    </div>
  </section> <!--/#cart_items-->

  <section id="do_action">
    <div class="container">
      <div class="heading">
        <h3>Bạn có muốn đặt thêm vé?</h3><button onclick="goBack()" class="btn btn-primary">Quay lại</button>
      </div>

    </div>
  </section><!--/#do_action-->
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
