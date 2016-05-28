<?php
?>

<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<h1>Login!</h1>
		<form action="login.php" method="POST">
			<div>
				<label for="mail">Mail:</label>
				<input id="mail" type="text" name="mail"></input>
			</div>
			<div>
				<label for="pass">Contrase&ntilde;a:</label>
				<input id="pass" type="text" name="pass"></input>
			</div>
			<div>
				Recordame
				<input type="checkbox" name="recordame"></input>
			</div>
			<div>
				<input id="submit" type="submit" name="submit" value="Enviar"></input>
			</div>
		</form>
	</body>
</html>

