<?php

if(!isset($_POST['id'])) {
	header('Location: ../korisnik.php');
	die();
}

require_once __DIR__ . '/../tabele/Poruka.php';
	
$id = $_POST['id'];
$poruka = Poruka::getMsgById($id);
Poruka::obrisiPoruku($id);

if (isset($_POST['ajax'])) {
	
 	echo '{"id":"'.$poruka->id.'"}';
 	die();
 } else {
 	header ('Location: ../korisnik.php');
 	die();
 }