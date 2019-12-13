@extends('layouts.frontLayout.front_design')
@section('content')

<section id="form" style="margin-top:20px;"><!--form-->
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Acceuil</a></li>
			  <li class="active">Finalisation de la commande</li>
			</ol>
		</div>
		@if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
		@endif
		<form action="{{ url('/checkout') }}" method="post">{{ csrf_field() }}
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Adresse</h2>
							<div class="form-group">
								<input name="billing_name" id="billing_name" @if(!empty($userDetails->name)) value="{{ $userDetails->name }}" @endif type="text" placeholder="Nom et prénom" class="form-control" />
							</div>
							<div class="form-group">
								<input name="billing_address" id="billing_address" @if(!empty($userDetails->address)) value="{{ $userDetails->address }}" @endif type="text" placeholder="Adresse" class="form-control" />
							</div>
							<div class="form-group">
								<input name="billing_city" id="billing_city" @if(!empty($userDetails->city)) value="{{ $userDetails->city }}" @endif type="text" placeholder="Région" class="form-control" />
							</div>
							<div class="form-group">
								<input name="billing_state" id="billing_state" @if(!empty($userDetails->state)) value="{{ $userDetails->state }}" @endif type="text" placeholder="Ville" class="form-control" />
							</div>

							<div class="form-group">
								<input name="billing_pincode" id="billing_pincode" @if(!empty($userDetails->name)) value="{{ $userDetails->pincode }}" @endif type="text" placeholder="Code postale" class="form-control" />
							</div>
							<div class="form-group">
								<input name="billing_mobile" id="billing_mobile" @if(!empty($userDetails->mobile)) value="{{ $userDetails->mobile }}" @endif type="text" placeholder="Téléphone Mobile" class="form-control" />
							</div>
							<div class="form-check">
							    <input type="checkbox" class="form-check-input" id="copyAddress">
							    <label class="form-check-label" for="copyAddress">Adresse de livraison identique à votre adresse</label>
							</div>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2></h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Adresse de livraison</h2>
							<div class="form-group">
								<input name="shipping_name" id="shipping_name" @if(!empty($shippingDetails->name)) value="{{ $shippingDetails->name }}" @endif type="text" placeholder="Nom et Prénom" class="form-control" />
							</div>
							<div class="form-group">
								<input name="shipping_address" id="shipping_address" @if(!empty($shippingDetails->address)) value="{{ $shippingDetails->address }}" @endif type="text" placeholder="Adresse" class="form-control" />
							</div>
							<div class="form-group">
								<input name="shipping_city" id="shipping_city" @if(!empty($shippingDetails->city)) value="{{ $shippingDetails->city }}" @endif type="text" placeholder="Région" class="form-control" />
							</div>
							<div class="form-group">
								<input name="shipping_state" id="shipping_state" @if(!empty($shippingDetails->state)) value="{{ $shippingDetails->state }}" @endif type="text" placeholder="Ville" class="form-control" />
							</div>

							<div class="form-group">
								<input name="shipping_pincode" id="shipping_pincode" @if(!empty($shippingDetails->pincode)) value="{{ $shippingDetails->pincode }}" @endif type="text" placeholder="Code postale" class="form-control" />
							</div>
							<div class="form-group">
								<input name="shipping_mobile" id="shipping_mobile" @if(!empty($shippingDetails->mobile)) value="{{ $shippingDetails->mobile }}" @endif type="text" placeholder="Télephone mobile" class="form-control" />
							</div>
							<div style="margin-left: 300px;"><button type="submit" class="btn btn-default">Continuer</button>
					</div><!--/sign up form-->
				</div>
			</div>
		</form>
	</div>
</section><!--/form-->

@endsection
