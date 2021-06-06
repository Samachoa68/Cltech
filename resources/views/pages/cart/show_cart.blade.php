
@extends('layout')
@section('content')

<!-- <div class="product-details"> --><!--product-cart-->
	<section id="cart_items">
		<div class="container-fluid">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="{{URL::to('/')}}">Trang chủ</a></li>
					<li class="active">Giỏ hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php
				$cartcontent = Cart::content();

				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Mô tả</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($cartcontent as $v_cartcontent)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('upload/product/'.$v_cartcontent->options->image)}}" alt="" width="50"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_cartcontent->name}}</a></h4>
								<p>ID: {{$v_cartcontent->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($v_cartcontent->price).' '.'VND'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<!-- <a class="cart_quantity_up" href=""> + </a> -->

									<form action="{{URL::to('/update-cart-quantity')}}" method="POST" >
									{{csrf_field()}}
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_cartcontent->qty}}" autocomplete="off" size="2">
									<input class="form-control" type="hidden" name="rowId_cart" value="{{$v_cartcontent->rowId}}">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm"></button>
									</form>

									<!-- <a class="cart_quantity_down" href=""> - </a> -->
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
									$tong = $v_cartcontent->price * $v_cartcontent->qty;
									echo number_format($tong).' '.'VND';
									?>

								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_cartcontent->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach


					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container-fluid">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
<!-- 				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>

							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div> -->
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span>{{Cart::total().' '.'VND'}}</span></li>
							<li>Thuế <span>{{Cart::tax().' '.'VND'}}</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Thành tiền <span>{{Cart::total().' '.'VND'}}</span></li>
						</ul>
						<!-- <a class="btn btn-default update" href="">Update</a> -->

						<?php
                               $customer_id = Session::get('customer_id');
                               if ($customer_id != Null) { ?>
                                     <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
                                   
                               <?php }else{ ?>
                                <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                               <?php      }       ?>
						
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	<!-- </div> --><!--/product-cart-->

	@endsection