<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/Database.php';

class Korisnik {

	public $id;
	public $email;
	public $password;
	public $ime_prezime;
	public $telefon;
	public $slika;


	public static function registrujSe($email,$password,$ime_prezime,$telefon,$slika) {

		$db = Database::getInstance();

		$password = hash('sha512', $password);

		$db-> insert('Korisnik', 

				'INSERT INTO korisnici (email, password, ime_prezime, telefon, slika) ' .
				'VALUES (:e, :p, :i, :t, :s)',
				[
					':e' => $email,
					':p' => $password,
					':i' => $ime_prezime,
					':t' => $telefon,
					':s' => $slika
				]);

	}

	public static function prijaviSe($email, $password) {

		$db = Database::getInstance();

		$password = hash('sha512', $password);

		$niz = $db->select('Korisnik',
				'SELECT * '.
				'FROM korisnici '.
				'WHERE email = :e AND password = :p',
				[
					':e' => $email,
					':p' => $password,

				]);

		foreach ($niz as $korisnik) {
			return $korisnik;
		}
		return null;
	}

	public static function promeniLozinku($email,$novi_password) {

		$db = Database::getInstance();

		$novi_password = hash('sha512', $novi_password);

		$db->update('Korisnik',
			'UPDATE korisnici SET password = :p WHERE email = :e',
			[
				':p' => $novi_password,
				':e' => $email
			]);
	}

	public static function sviKorisnici() {

	$db = Database::getInstance();

		$korisnici = $db->select ('Korisnik',

					'SELECT * ' . 
					'FROM korisnici',
					[]
				);

		return $korisnici;

	}

	public static function getById($id) {
		
		$db = Database::getInstance();

		$korisnici = $db->select('Korisnik',
			'SELECT * ' .
			'FROM korisnici '.
			'WHERE id = :id',
			[

				':id' => $id
			]);

		foreach($korisnici as $korisnik) {
			return $korisnik;
		}
		return null;
	}

}