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
	<title>Promena loznike</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Moje poštansko sanduče - Promena lozinke</h1>

	<button><a href="index.php">Prijavi se</a></button>
	<button><a href="registracija.php">Registruj se</a></button>

	<form action="logika/izmenilozinku.php" method="post">
		<input type="email" name="email" placeholder="Unesite e-mail">
		<input type="password" name="stlozinka" placeholder="Unesite staru lozinku">
		<input type="password" name="novalozinka" placeholder="Unesite novu lozinku">
		<input type="password" name="ponovljena_nova_loznika" placeholder="Ponovite novu lozinku">
		<input type="submit" value="Promeni lozinku" id="loz">
		<?php
	 	if(isset($_GET['password'])): ?>
				<p>Nove lozinke se ne podudaraju</p>
		<?php elseif (isset($_GET['email'])): ?>
				<p>Pogrešni podaci za prijavu.</p>
		<?php elseif (isset($_GET['lozinka'])): ?>
				<p>Uspešno ste promenili lozinku.</p>
		<?php endif ?>
	</form>
	
	<img src="slike/2000px-Message_Srinath66.svg.png" id="pismo">
</body>
</html>