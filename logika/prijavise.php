<?php
session_start();
if (!isset($_POST['email'])) {
	header('Location: ../index.php');
	die();
}

$email = $_POST['email'];
$password = $_POST['password'];

require_once __DIR__ . '/../tabele/Korisnik.php';


$status = Korisnik::prijaviSe ($email,$password);

if ($status !== null)	 {
	$_SESSION['korisnik_id'] = $status->id;
	header ('Location: ../korisnik.php');
	die();
}else {
header('Location: ../index.php?email=pogresan');
die();
}