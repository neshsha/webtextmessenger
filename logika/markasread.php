<?php

if(!isset($_POST['id'])) {
	header('Location: ../korisnik.php');
	die();
}

require_once __DIR__ . '/../tabele/Poruka.php';

$status = 'Procitano';	
$id = $_POST['id'];

Poruka::markasRead($id,$status);

if (isset($_POST['ajax'])) {
	$poruka = Poruka::getMsgById($id);
 	echo '{"id":"'.$poruka->id.'"}';
 	die();
 } else {
 	header ('Location: ../korisnik.php');
 	die();
 }