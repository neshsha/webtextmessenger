<?php

if (!isset($_POST['email'])) {
	header('Location: ../registracija.php');
	die();
}

$email = $_POST['email'];
$password = $_POST['password'];
$ponovljen_password = $_POST['r_password'];
$ime_prezime = $_POST['ime_prezime']; 
$telefon = $_POST['telefon'];
if(empty($_FILES['slika'])) {
	$slika = null;
}else {
require_once __DIR__. '/../includes/Upload.php';

try{
$upload = Upload::factory('../slike');
$upload->file($_FILES['slika']);
$upload->set_allowed_mime_types('image/jpeg', 'image/png', 'image/gif');
$upload->set_max_file_size(2);
$upload->set_filename($_FILES['slika']['name']);
$upload->save();
$slika = 'slike/' . $_FILES['slika']['name'];
}
 catch (Exception $e) {
		header('Location: ../registracija.php?slika=neodgovarajuciformat');
	die();
	}
}

if($password !== $ponovljen_password) {
header ('Location: ../registracija.php?password=razlicit');
die();
}

require_once __DIR__ . '/../tabele/Korisnik.php';
	
	try {
		Korisnik::registrujSe ($email,$password,$ime_prezime,$telefon,$slika);
	} catch (Exception $e) {
		header('Location: ../registracija.php?email=postoji');
	die();
	}
	header('Location: ../index.php');
	die();
	

