<?php
    SESSION_START();
	define('DB_NAME', 'db116074_58'); //Datenbank-Logindaten
	define('DB_USER', 'db116074_58'); //Datenbank-Logindaten
	define('DB_PASSWORD', 'Einstein1234'); //Datenbank-Logindaten
	define('DB_HOST', 'mysql5.istation.de'); //Datenbank-Host

	
    $conn = new mysqli (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ('Error connecting to mysql');
    mysqli_query($conn,"SET NAMES 'utf8'");
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

<?
	if (!empty($_POST["submit"])) {
		$_username = mysqli_real_escape_string($conn,$_POST["username"]);
		$_passwort = hash('sha1',$_POST["passwort"]);
		
		$_sql = "SELECT * FROM User WHERE
					user_name='$_username' AND
					user_passwort='$_passwort'
				LIMIT 1";

		$_res = mysqli_query($conn,$_sql);
		$_anzahl = mysqli_num_rows($_res);

		if ($_anzahl > 0) {
			$_SESSION['angemeldet'] = true;
			$_SESSION['loginname'] = $_username;
			echo "<h3>Der Login war erfolgreich.<br></h3>";
		} else {
			echo "<h3>Die Logindaten sind nicht korrekt.<br><a href=\"login.php\" text-decoration=\"none\">Nochmal versuchen</a></h3>";
		}
	} else {
		if ($_SESSION['angemeldet'] == true) {
			echo "<h3>Sie sind bereits angemeldet als ".$§_Session['loginname'].".<a href=\"index.php\" text-decoration=\"none\"> Zur Startseite</a>";
		} else {
echo <<<FORMULAR
<h3>Login<a href="registrieren.php">NEUE REGISTRIERUNG</a></h3>
		<form action="login.php" method="POST">
			<label>NAME</label>
			<input class="inp" type="text" name="name"><br>
			<label>PASSWORT</label>
			<input class="inp" type="password" name="passwort"><br>
			<input class="button" type="submit" name="submit "value="Absenden"><br>
		</form>
FORMULAR;
		}
	}
?>

	</div>
</body>
</html>
