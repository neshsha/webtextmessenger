<?php
session_start();

if(!isset($_SESSION['korisnik_id'])) {
	header('Location: index.php');
	die();
}

require_once __DIR__ . '/tabele/Korisnik.php';
require_once __DIR__ . '/tabele/Poruka.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Moje poštansko sanduče</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(function() {
			$('.procitano').on('click', function(e) {
			
			var id = $(this).attr('data-id');
				$.ajax({
					'method':'post',
					'url':'logika/markasread.php',
					'data':{
						'id':id,
						'ajax':true,
					},
					'success':function(msg) {
						console.log(msg);

					var status = JSON.parse(msg);

					var div = $('button[data-id="'+status.id+'"').parent().parent();
					div.find('.red').css("background-color","#6ce15a");

					var button = $('button[data-id="'+status.id+'"');
					button.hide();
					}
					});

				});

			$('.obrisi').on('click', function(e) {
		
			var id = $(this).attr('data-id');
				$.ajax({
					'method':'post',
					'url':'logika/obrisiporuku.php',
					'data':{
						'id':id,
						'ajax':true
					},
					'success':function(msg) {
						console.log(msg);

					var status = JSON.parse(msg);

					var div = $('button[data-id="'+status.id+'"').parent().parent();
					div.remove();
					}
					});

				});
					
		});
	</script>

</head>
<body>
	<h1>Moje poštansko sanduče</h1>

	<button><a href="logika/odjavise.php" id="odjse">Odjavi se</a></button>

	<form action="logika/posaljiporuku.php" method="post" id="posaljiporuku">
		<input type="text" name="naslov" placeholder="Unesite naslov poruke" required>
		<textarea type="text" name="poruka" placeholder="Unesite poruku" required maxlength="160"></textarea>
		<label for="imekorisnika">Poruka za: </label>
		<select name="imekorisnika" id="imekorisnika" required>
			<?php $svi_korisnici = Korisnik::sviKorisnici();?>
			<?php foreach($svi_korisnici as $korisnik): ?>
				<option value="<?= $korisnik->ime_prezime ?>"><?= $korisnik->ime_prezime ?></option>
			<?php endforeach ?>
		</select><br>
		<label for="hitno">Hitno je</label>
		<input type="radio" name="prioritet" value="Hitno je" required id="hitno">
		<label for="nijehitno">Nije hitno</label>
		<input type="radio" name="prioritet" value="Nije hitno" required id="nijehitno" >
		<input type="submit" value="Pošalji" id="pos">
	</form>

	<h2>SVE PORUKE</h2>

	<?php 	$sve_poruke = Poruka::svePoruke();
			$trenutni_korisnik = Korisnik::getById($_SESSION['korisnik_id'])?>

	<?php foreach($sve_poruke as $poruka): ?>
	<?php if($poruka->korisnik()->id == $_SESSION['korisnik_id'] OR $poruka->namenjena == $trenutni_korisnik->ime_prezime): ?>
		<div class="poruka">
			<div class="zaglavlje">
				<img src="<?=$poruka->korisnik()->slika ?>" alt="null"><span>Poruku poslao: </span> 
				<?= $poruka->korisnik()->ime_prezime ?> <span>Naslov poruke: </span>
				<?= $poruka->naziv ?> <span>Poslato: </span>  <?= $poruka->vreme() ?>
				
				<?php if($poruka->korisnik()->id == $_SESSION['korisnik_id']): ?>
					<button name="obrisi" data-id="<?= $poruka->id ?>" class="obrisi">Obriši</button>
				<?php elseif($poruka->namenjena == $trenutni_korisnik->ime_prezime): ?>
					<button name="obrisi" data-id="<?= $poruka->id ?>" class="procitano">Pročitano</button>
				<?php endif?>
			</div>

			<?php if ($poruka->prioritet == "Hitno je" AND $poruka->status !== "Procitano"): ?>
				<div class="red">
					<p><?= $poruka->poruka?></p>
				</div>
			<?php elseif ($poruka->prioritet !== "Hitno je"): ?>
				<div class="green">
					<p><?= $poruka->poruka?></p>
				</div>
			<?php elseif ($poruka->status == "Procitano"): ?>
				<div class="green">
					<p><?= $poruka->poruka?></p>
				</div>
			<?php endif ?>
		</div>		
			
	<?php endif?>
	<?php endforeach ?>

	<img src="slike/2000px-Message_Srinath66.svg.png" id="pismodesno">
	<img src="slike/2000px-Message_Srinath66.svg.png" id="pismolevo">
	
</body>
</html>