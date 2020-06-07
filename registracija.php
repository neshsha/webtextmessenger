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
	<title>Registracija korisnika</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Moje poštansko sanduče - Registracija korisnika</h1>

	<button><a href="index.php">Prijavi se</a></button>
	<button><a href="lozinka.php">Promeni lozinku</a></button>
	
	<form action="logika/registrujse.php" method="post" enctype="multipart/form-data">
		<input type="email" name="email" placeholder="Unesite e-mail" required>
		<input type="password" name="password" placeholder="Unesite lozinku" required >
		<input type="password" name="r_password" placeholder="Ponovite lozinku" required>
		<input type="text" name="ime_prezime" placeholder="Unesite ime i prezime" required>
		<input type="tel" name="telefon" placeholder="Unesite telefon" required>
		<label for="choose-file" title="Mozete uneti fotografiju formata JPG, GIF ili PNG velicine do 2 MB">Unesite vašu sliku:</label>
		<input type="file" name="slika" value="Vasa slika" id="choose-file" title="Mozete uneti fotografiju formata JPG, GIF ili PNG velicine do 2 MB" required>
		<input type="submit" value="Registruj se" id="reg">

		<?php if(isset($_GET['password'])): ?>
			<p>Lozinke se ne podudaraju</p>
		<?php elseif (isset($_GET['email'])): ?>
			<p>Već je registrovan nalog sa tom imejl adresom.</p>
		<?php elseif (isset($_GET['slika'])): ?>
			<p>Postavljena slika nije u odgovarajućem formatu</p>
		<?php endif ?>
	</form>

	<img src="slike/2000px-Message_Srinath66.svg.png" id="pismo">
</body>
</html>