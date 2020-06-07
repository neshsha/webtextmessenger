<?php

if(!isset($_POST['email'])) {
	header('Location: ../lozinka.php');
	die();
}

$email = $_POST['email'];
$password = $_POST['stlozinka'];
$novi_password = $_POST['novalozinka'];
$pon_password = $_POST['ponovljena_nova_loznika'];

require_once __DIR__ . '/../tabele/Korisnik.php';


$korisnik = Korisnik::prijaviSe ($email,$password);
if ($email !== $korisnik->email AND $password !== $korisnik->password) {
	header ('Location: ../lozinka.php?email=pogresan');
	die();
}

if($novi_password !== $pon_password) {
	header('Location: ../lozinka.php?password=razlicita');
	die();
}

Korisnik::promeniLozinku($email,$novi_password);

header('Location: ../lozinka.php?lozinka=uspesnopromenjena');
die();

