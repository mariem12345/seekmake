@extends('layouts.frontLayout.front_design')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Acceuil</a></li>
				  <li class="active">Panier</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				@if(Session::has('flash_message_success'))
		            <div class="alert alert-success alert-block">
		                <button type="button" class="close" data-dismiss="alert">×</button>
		                    <strong>{!! session('flash_message_success') !!}</strong>
		            </div>
		        @endif
		        @if(Session::has('flash_message_error'))
		            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
		                <button type="button" class="close" data-dismiss="alert">×</button>
		                    <strong>{!! session('flash_message_error') !!}</strong>
		            </div>
        		@endif
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Article</td>
							<td class="description">Description</td>
							<td class="price">Prix unitaire	</td>
							<td class="quantity">Quantité</td>
							<td class="total">Sous-total</td>
						</tr>
					</thead>
					<tbody>
						<?php $total_amount = 0; ?>
						@foreach($userCart as $cart)
							<tr>
								<td class="cart_product">
									<a href=""><img style="width:100px;" src="{{ asset('/images/backend_images/product/small/'.$cart->image) }}" alt=""></a>
								</td>
								<td class="cart_description">
									<h4><a href="">{{ $cart->product_name }}</a></h4>
									<p>Code Article: {{ $cart->product_code }}</p>
								</td>
								<td class="cart_price">
									<p> {{ $cart->price }}TND</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" href="{{ url('/cart/update-quantity/'.$cart->id.'/1') }}"> + </a>
										<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="2">
										@if($cart->quantity>1)
											<a class="cart_quantity_down" href="{{ url('/cart/update-quantity/'.$cart->id.'/-1') }}"> - </a>
										@endif
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price"> {{ $cart->price*$cart->quantity }}TND</p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="{{ url('/cart/delete-product/'.$cart->id) }}"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="heading">

			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						@if(!empty(Session::get('CouponAmount')))
							<li>Sub Total <span> <?php echo $total_amount; ?>TND</span></li>

						@else
							<li>Totale <span> <?php echo $total_amount; ?> TND</span></li>
						@endif
					</ul>
					<div style="margin-left: 400px;"><a  class="btn btn-default check_out" href="{{ url('/checkout') }}">Continuer</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->

@endsection
