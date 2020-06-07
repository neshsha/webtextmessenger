<?php
session_start();

if(isset($_SESSION['korisnik_id'])) {
	header('Location: korisnik.php');
	die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Prijava</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Moje poštansko sanduče - Prijava</h1>

	<button><a href="lozinka.php">Promeni lozinku</a></button>
	<button><a href="registracija.php">Registruj se</a></button>
	
	<form action="logika/prijavise.php" method="post">
		<input type="email" name="email" placeholder="Unesite e-mail">
		<input type="password" name="password" placeholder="Unesite lozinku">
		<input type="submit" value="Prijavi me" id="uloguj">
		<?php if(isset($_GET['email'])): ?>
			<p>Pogrešni podaci za prijavu</p>
		<?php endif ?>
	</form>

	<img src="slike/2000px-Message_Srinath66.svg.png" id="pismo">
</body>
</html>