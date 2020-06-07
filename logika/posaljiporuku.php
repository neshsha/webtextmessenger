<?php

session_start();
if (!isset($_POST['naslov'])) {
	header ('Location: ../korisnik.php');
	die();
}

$naslov = $_POST['naslov'];
$poruka = $_POST['poruka'];
$namenjena = $_POST['imekorisnika'];
$prioritet = $_POST['prioritet'];
$korisnik_id = $_SESSION['korisnik_id'];


require_once __DIR__ . '/../tabele/Poruka.php';

Poruka::posaljiPoruku($naslov, $poruka, $namenjena, $prioritet, $korisnik_id);

 header ('Location: ../korisnik.php');
