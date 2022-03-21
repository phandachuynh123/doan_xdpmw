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
      <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="username">
                @php
                $name=Session::get('ten');
                if($name)
                {
                    echo $name;
                }
                @endphp
            </span>
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu extended logout">
            <li><a href="#"><i class="fa fa-suitcase"></i>Thông Tin</a></li>
            <li><a href="#"><i class="fa fa-cog"></i>Cài Đặt</a></li>
            <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i>Đăng Xuất</a></li>
        </ul>


    </li>
</div>
</div>
</nav>

<section id="cart_items">

  <div class="breadcrumbs">
    <ol class="breadcrumb">
      <li><a href="{{URL::to('/')}}">Home</a></li>
      <li class="active">Danh sách chuyến đi</li>
  </ol>
</div>
<!--Main-->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session('status'))
<div class="alert alert-success"role="alert">
    {{session('status')}}
</div>
@endif
<div class="table-responsive cart_info">
    <table class="table table-condensed">
      <thead>
        <tr class="cart_menu">
          <td class="image">Hình ảnh</td>
          <td class="description">Chuyến đi</td>
          <td class="price">Giá</td>
          <td class="quantity">Mã Ghế</td>
          <td class="total">Ngày khởi hành</td>
          <td class="total">Ngày Đến</td>
          <td class="total">Trạng Thái</td>
          <td></td>
      </tr>
  </thead>
  <tbody>
    @foreach($ve as $key =>$v)
    @php
    $ldate = date('Y-m-d H:i:s');
    foreach($xe as $key =>$x)
    if($v->chuyendi->bienso==$x->bienso)
    {
        foreach($loaixe as $key =>$lx)
        if($x->malx==$lx->malx)
        {
            $anh=$lx->anh;
        }
    }

    @endphp
    @if($v->trangthai!=3)
    <tr>
      <td class="cart_product">
        <a href=""><img src=" {{asset('uploads/loaixe/'.$anh)}}" width="100" alt=""></a>
    </td>
    <td class="cart_description">
        <h4 style="margin:10px"><a href="">{{$v->chuyendi->tuyenduong}}</a></h4>
        <p style="margin:10px">ID: <input type="text" class="macd" id="macd" name="macd"value="{{ $v->macd}}" readonly style="width: 50px;border: none"></p>
    </td>
    <td class="cart_total">
        <p class="cart_total_price" id="tongtien">{{$v->chuyendi->tongtien}}</p>
    </td>
    <td class="cart_quantity">

        <input type="text" name="maghe" class="maghe" value="{{$v->maghe}}" readonly style="width: 50px;border: none;">
    </td>
    <td class="cart_quantity">
        <p id="ngaydi">{{date('H:i d/m/Y', strtotime($v->chuyendi->ngaydi))}}</p>
    </td>
    <td class="cart_quantity">
        <p id="ngayden">{{date('H:i d/m/Y', strtotime($v->chuyendi->ngayden))}}</p>
    </td>
    <td class="cart_quantity">
        <p id="trangthai">
         @php
         if($v->trangthai==0)
         echo "Chưa thanh toán";
         else
         echo "Đã thanh toán";

         @endphp
     </p>
 </td>
 <td class="cart_delete">
    <form >
        @csrf
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#huyve">Hủy</button>

        <!-- Modal -->
        <div id="huyve" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hủy vé</h4>
            </div>
            <div class="modal-body">
                <textarea rows="5" class="lydohuy" required placeholder="Lý do hủy vé......(Bắt buộc"></textarea>
                <input type="hidden" name="maghe" class="maghe" value="{{$v->maghe}}">
                <input type="hidden" name="macd" class="macd" value="{{$v->macd}}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" onclick="HuyVe_id(this.id)" id="{{$v->mave}}" class="btn btn-success">Gửi Lý do</button>
            </div>
        </div>
        
    </div>
</div>
</form>
@endif
</td>
</tr>
@endforeach 
</tbody>
</table>
</div>
</section>
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
                            <input type="text" placeholder="Your email address">
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
<script type="text/javascript">
    function HuyVe_id(id) {
        var mave=id;
        var lydo=$('.lydohuy').val();
        var maghe=$('.maghe').val();
        var macd=$('.macd').val();
        var _token=$('input[name="_token"]').val();
        $.ajax({
            url:'{{URL::to('/huy')}}',
            method:'POST',
            data:{mave:mave, lydo:lydo,_token:_token,maghe:maghe,macd:macd},
            success:function(data){
                alert('Huỷ Thành Công');
                location.reload();
            }
        });
    }
</script>