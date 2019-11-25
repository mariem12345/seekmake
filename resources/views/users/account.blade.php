@extends('layouts.frontLayout.front_design')
@section('content')

<section id="form" style="margin-top:20px;"><!--form-->
	<div class="container">
		<div class="row">
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
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form">
					<h2>Modifier l'adresse</h2>
					<form id="accountForm" name="accountForm" action="{{ url('/account') }}" method="POST">{{ csrf_field() }}
						<input value="{{ $userDetails->email }}" readonly="" />
						<input value="{{ $userDetails->name }}" id="name" name="name" type="text" placeholder="Nom et prénom"/>
						<input value="{{ $userDetails->address }}" id="address" name="address" type="text" placeholder="Adresse"/>
						<input value="{{ $userDetails->city }}" id="city" name="city" type="text" placeholder="Région"/>
						<input value="{{ $userDetails->state }}" id="state" name="state" type="text" placeholder="Ville"/>
						
						<input value="{{ $userDetails->pincode }}" style="margin-top: 10px;" id="pincode" name="pincode" type="text" placeholder="Code Postale"/>
						<input value="{{ $userDetails->mobile }}" id="mobile" name="mobile" type="text" placeholder="Télephone"/>
						<button type="submit" class="btn btn-default">Enregister</button>
					</form>
				</div>
			</div>
			<div class="col-sm-1">
				<br/><br/><br/><h2 class="or">Ou</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form">
					<h2>Modifier votre mot de passe</h2>
					<form id="passwordForm" name="passwordForm" action="{{ url('/update-user-pwd') }}" method="POST">{{ @csrf_field() }}
						<input type="password" name="current_pwd" id="current_pwd" placeholder="Mot de passe actuel">
						<span id="chkPwd"></span>

						<input type="password" name="new_pwd" id="new_pwd" placeholder="Nouveau mot de passe">

						<input type="password" name="confirm_pwd" id="confirm_pwd" placeholder="Saisissez à nouveau le mot de passe">
						<button type="submit" class="btn btn-default">Enregistrer</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section><!--/form-->

@endsection