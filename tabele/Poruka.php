<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/Database.php';
require_once __DIR__ . '/Korisnik.php';

class Poruka {

	public $id;
	public $naziv;
	public $poruka;
	public $namenjena;
	public $korisnik_id;
	public $vreme;
	public $prioritet;
	public $status;

	public function korisnik() {
		return Korisnik::getByID($this->korisnik_id);
	}

	public function vreme() {

		return date('d.m.Y. H:i', strtotime($this->vreme));

	}


	public static function posaljiPoruku($naziv,$poruka,$namenjena,$prioritet, $korisnik_id) {

		$db = Database::getInstance();

		$db-> insert('Poruka', 

				'INSERT INTO poruke (naziv, poruka, namenjena, prioritet, korisnik_id) ' .
				'VALUES (:n, :p, :kn, :pr, :kid)',
				[
					':n' => $naziv,
					':p' => $poruka,
					':kn' => $namenjena,
					':pr' => $prioritet,
					':kid' => $korisnik_id

				]);

	}

	public static function svePoruke() {

	$db = Database::getInstance();

		$poruke = $db->select ('Poruka',

					'SELECT * ' . 
					'FROM poruke ORDER BY vreme DESC',
					[]
				);

		return $poruke;

	}

	public static function getMsgById($id) {

	$db = Database::getInstance();

	$poruke = $db->select('Poruka',
			'SELECT * FROM poruke WHERE id = :id',
			[
				':id' => $id
			]);
		foreach($poruke as $poruka) {
			return $poruka;
		}
		return null;
	}

	public static function markasRead($id,$status) {

		$db = Database::getInstance();

		$db->update('Poruka',
			'UPDATE poruke SET status = :s WHERE id = :id',
			[
				':s' => $status,
				':id' => $id
			]
		);
	}

	public static function obrisiPoruku($id) {

		$db = Database::getInstance();
		
		$db->delete("DELETE FROM poruke WHERE id = :id",
		[
			':id' => $id
		]);
	}

}