@extends('layouts.frontLayout.front_design')
@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Accueil </a></li>
			  <li class="active">Merci</li>
			</ol>
		</div>
	</div>
</section>

<section id="do_action">
	<div class="container">
		<div class="heading" align="center">
					<h2>	<p>votre numéro de commande est {{ Session::get('order_id') }} et le total {{ Session::get('grand_total') }} TND</p></h2>


			<h3>1. Confirmation</h3>
			<p>Félicitations! Votre commande a été prise en compte avec succès. Une confirmation vous sera envoyée par mail et par SMS. Vous recevrez rapidement un appel de la part de notre Service Client ou un SMS pour confirmer votre commande.</p>
			<h3>2. Livraison</h3>
<p>Votre commande sera livrée à l'adresse que vous avez choisi dans un délai de 1 à 2 jours ouvrables à compter de la date de la confirmation de la commande.</p>



		</div>
	</div>
</section>

@endsection

<?php
Session::forget('grand_total');
Session::forget('order_id');
?>
