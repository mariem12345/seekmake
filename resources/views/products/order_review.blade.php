@extends('layouts.frontLayout.front_design')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Acceuil</a></li>
				  <li class="active">Vérifier la commande</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="shopper-informations">
				<div class="row">					
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form">
						<h2>Adresse</h2>
							<div class="form-group">
								{{ $userDetails->name }}
							</div>
							<div class="form-group">
								{{ $userDetails->address }}
							</div>
							<div class="form-group">	
								{{ $userDetails->city }}
							</div>
							<div class="form-group">
								{{ $userDetails->state }}
							</div>
							
							<div class="form-group">
								{{ $userDetails->pincode }}
							</div>
							<div class="form-group">
								{{ $userDetails->mobile }}
							</div>
					</div>
				</div>
				<div class="col-sm-1">
					<h2></h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form">
						<h2>Adresse de livraison</h2>
							<div class="form-group">
								{{ $shippingDetails->name }}
							</div>
							<div class="form-group">
								{{ $shippingDetails->address }}
							</div>
							<div class="form-group">	
								{{ $shippingDetails->city }}
							</div>
							<div class="form-group">
								{{ $shippingDetails->state }}
							</div>
						
							<div class="form-group">
								{{ $shippingDetails->pincode }}
							</div>
							<div class="form-group">
								{{ $shippingDetails->mobile }}
							</div>
					</div>
				</div>
			</div>

			<div class="review-payment">
				<h2>Mode de paiement</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Article</td>
							<td class="description"></td>
							<td class="price">Prix</td>
							<td class="price">Quantité</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>
						<?php $total_amount = 0; ?>
						@foreach($userCart as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img style="width:130px;" src="{{ asset('/images/backend_images/product/small/'.$cart->image) }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $cart->product_name }}</a></h4>
								<p>Product Code: {{ $cart->product_code }}</p>
							</td>
							<td class="cart_price">
								<p>TND {{ $cart->price }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									{{ $cart->quantity }}
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">TND {{ $cart->price*$cart->quantity }}</p>
							</td>
						</tr>
						<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
						@endforeach
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Sous-total</td>
										<td>TND {{ $total_amount }}</td>
									</tr>
									<tr class="shipping-cost">
										<td>Montant de livraison(+)</td>
										<td>TND 7</td>										
									</tr>
									<tr class="shipping-cost">
										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>TND {{ $grand_total = $total_amount +7 }}</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<form name="paymentForm" id="paymentForm" action="{{ url('/place-order') }}" method="post">{{ csrf_field() }}
				<input type="hidden" name="grand_total" value="{{ $grand_total }}">
				<div class="payment-options">
					<span>
						<label><strong>Quel moyen de paiement voulez-vous utiliser?</strong></label>
					</span>
					<span>
						<label><input type="radio" name="payment_method" id="COD" value="COD"> <strong>Paiement à la livraison</strong></label>
					</span>
					<span style="float:right;">
						<button type="submit" class="btn btn-default" onclick="return selectPaymentMethod();">Confirmer la commande</button>
					</span>
				</div>
			</form>
		</div>
	</section> <!--/#cart_items-->

@endsection