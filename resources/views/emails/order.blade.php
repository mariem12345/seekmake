<html>
<body>
	<table width='700px'>
		<tr><td>&nbsp;</td></tr>
		<tr><td><img src="{{ asset('images/frontend_images/home/logo.png') }}"></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Bonjour {{ $name }},</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Merci de faire confiance à nos services</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Numéro de commande: {{ $order_id }}</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>
			<table width='95%' cellpadding="5" cellspacing="5" bgcolor="#f7f4f4">
				<tr bgcolor="#cccccc">
					<td>Nom produit</td>
					<td>Code produit</td>
					<td>Quantité</td>
					<td>Sous-total</td>
				</tr>
				@foreach($productDetails['orders'] as $product)
					<tr>
						<td>{{ $product['product_name'] }}</td>
						<td>{{ $product['product_code'] }}</td>
						<td>{{ $product['product_qty'] }}</td>
						<td>TND {{ $product['product_price'] }}</td>
					</tr>
				@endforeach
				<tr>
					<td colspan="5" align="right">Montant de livraison</td><td>TND {{ $productDetails['shipping_charges'] }}</td>
				</tr>

				<tr>
					<td colspan="5" align="right">Total</td><td>TND {{ $productDetails['grand_total'] }}</td>
				</tr>
			</table>
		</td></tr>
		<tr><td>
			<table width="100%">
				<tr>
					<td width="50%">
						<table>
							<tr>
								<td><strong>Adresse :-</strong></td>
							</tr>
							<tr>
								<td>{{ $userDetails['name'] }}</td>
							</tr>
							<tr>
								<td>{{ $userDetails['address'] }}</td>
							</tr>
							<tr>
								<td>{{ $userDetails['city'] }}</td>
							</tr>
							<tr>
								<td>{{ $userDetails['state'] }}</td>
							</tr>

							<tr>
								<td>{{ $userDetails['pincode'] }}</td>
							</tr>
							<tr>
								<td>{{ $userDetails['mobile'] }}</td>
							</tr>
						</table>
					</td>
					<td width="50%">
						<table>
							<tr>
								<td><strong>Adresse de livraison :-</strong></td>
							</tr>
							<tr>
								<td>{{ $productDetails['name'] }}</td>
							</tr>
							<tr>
								<td>{{ $productDetails['address'] }}</td>
							</tr>
							<tr>
								<td>{{ $productDetails['city'] }}</td>
							</tr>
							<tr>
								<td>{{ $productDetails['state'] }}</td>
							</tr>

							<tr>
								<td>{{ $productDetails['pincode'] }}</td>
							</tr>
							<tr>
								<td>{{ $productDetails['mobile'] }}</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Pour toute demande de renseignements, vous pouvez nous contacter à<a href="mailto:seekmake.co@gmail.com">seekmake.co@gmail.com</a></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Merci, <br> SeekMake</td></tr>
		<tr><td>&nbsp;</td></tr>
	</table>
</body>
</html>
