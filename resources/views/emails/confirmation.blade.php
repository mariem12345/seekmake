<html>
	<head>
		<title>Confirm email</title>
	</head>
	<body>
		<table>
			<tr><td>cher {{ $name }}!</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Veuillez cliquer sur le lien ci-dessous pour activer votre compte:</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td><a href="{{ url('confirm/'.$code) }}">Confirmer le compte</a></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Merci,</td></tr>
			<tr><td>SeekMake</td></tr>
	</body>
</html>