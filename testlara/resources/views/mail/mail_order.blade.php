<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Xác nhận Vé</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="background: #222;border-radius: 12px;padding: 15px;">
		<div class="col-md-12">
			<p style="text-aLign: center;coLor: #fff">Đây là email tự động. Quý khách vui lòng không trả lời email này.</p>	
			<div class="row" style="background: cadetblue;padding: 15px;">
				<div class="col-md-6" style="text-align: center;color: #fff;font-weight: bold;font-size: 30px;">
					<h4 style="margin: 0;">S-VEXE</h4>
					<h6 style="margin: 0;">DỊCH VỤ VẬN CHUYỂN-ĐƯA ĐÓN CHUYÊN NGHIỆP</h6>
				</div>
				<div class="col-md-6 logo" style="color: #fff;" >
					<p>Chào bạn : <strong style="color: #000;text-decoration: underline;font-size: 17px;">{{$ship_array['name']}}</strong> </p>
				</div>
				<div class="col-md-12">
					<p style="color: #fff;font-size: 17px;">Bạn hoặc một ai đó đã đăng ký dịch vụ của chúng tôi với thông tin như sau:</p>
					<h4 style="color: #000;text-transform: uppercase;">Thông tin người nhận</h4>
					<p>Email:
						@if($ship_array['mail']=='')
						Không có
						@else
						<span style="color: #fff;font-size: 17px;">{{$ship_array['mail']}}</span>
						@endif
					</p>
					<p>Họ và tên người gửi:
						@if($ship_array['name']=='')
						<span style="color: #fff;">Không có</span>
						@else
						<span style="color: #fff;">{{$ship_array['name']}}</span>
						@endif
					</p>
					<p>Địa chỉ:
						@if($ship_array['address']=='')
						<span style="color: #fff;">Không có</span>
						@else
						<span style="color: #fff;">{{$ship_array['address']}}</span>
						@endif
					</p>
					<p>Số điện thoại:
						@if($ship_array['sdt']=='')
						<span style="color: #fff;">Không có</span>
						@else
						<span style="color: #fff;">{{$ship_array['sdt']}}</span>
						@endif
					</p>
					<p>CMND/CCCD:
						@if($ship_array['cmnd']=='')
						<span style="color: #fff;">Không có</span>
						@else
						<span style="color: #fff;">{{$ship_array['cmnd']}}</span>
						@endif
					</p>
					<p>Hình thức thanh toán:<strong style="color: #fff;text-transform: uppercase;">
						@if($ship_array['method']==1)
						Chuyển khoản
						@else
						Tiền mặt
						@endif
					</strong></p>
					<p style="color: #fff;">Nếu thông tin người nhận không có chúng tôi sẽ liên hệ với người đặt để trao đổi thông tin.</p>
					<h4 style="color: #000;text-transform: uppercase;">Vé đã đặt</h4>
					<table class="table table-striped" style="border: 1px;">
						<thead>
							<tr>
								<td>Chuyến Đi</td>
								<td>Biển số</td>
								<td>Giá</td>
								<td>Mã Ghế</td>
								<td>Ngày khởi hành</td>
								<td>Ngày Tới Nơi</td>
							</tr>
						</thead>
						<tbody>
							@php
								$total=0;
							@endphp
							@foreach($ve_array as $ve)
								@php
									$total+=$ve['gia'];
								@endphp
								<tr>
									<td>{{$ve['chuyendi']}}</td>
									<td>{{$ve['bienso']}}</td>
									<td>{{number_format($ve['gia'],0,',','.')}}vnđ</td>
									<td>{{$ve['maghe']}}</td>
									<td>{{$ve['ngaydi']}}</td>
									<td>{{$ve['ngayden']}}</td>
								</tr>
							@endforeach	
								<tr>
									<td colspan="4" align="right">Tổng tiền thanh toán:{{number_format($total,0,',','.')}}vnđ</td>
								</tr>
						</tbody>
					</table>
				</div>
				<p style="color: #fff;">Mọi chi tiết xin liên hệ tại website:<a target="_blank" href="http://S-VEXE.com">S-VEXE</a>, hoặc liên hệ qua số hotline : 19006295. Xin cảm ơn quý khách đã đặt vé tại website chúng tôi.</p>
			</div>
		</div>
	</div>

</body>
