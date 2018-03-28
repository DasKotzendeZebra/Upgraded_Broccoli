<?php
session_start();
session_destroy();

$_SESSION = array();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"><title>LOGIN</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,700,900" rel="stylesheet">
</head>
<body>
	<div class="login">
		<h3>Login<a href="registrieren.php">NEUE REGISTRIERUNG</a></h3>
		<form action="main.php" method="post">
			<label>NAME</label>
			<input class="inp" type="text" name="n"><br>
			<label>PASSWORD</label>
			<input class="inp" type="password" name="p"><br>
			<label>EMAIL (OPTIONAL)</label>
			<input class="inp" type="email" name="email"><br>
			<input class="button" type="submit" value="Absenden"><br>
		</form>
	</div>
</body>
</html>
