# webtextmessenger

<h2>Web aplikacija za razmenu poruka među korisnicima.</h2>

<ul>
	<li>Login strana (<strong>index.php</strong>) sadrži:
		<ul>
			<li>Polјa za prijavu:
				<ul>
					<li>Email</li>
					<li>Lozinka</li>
				</ul>
			</li>
			<li>Dva linka:
				<ul>
					<li>Link ka strani za promenu lozinke</li>
					<li>Link ka strani za registraciju</li>
				</ul>
			</li>
		</ul>
	</li>
	<li style="list-style-type: none;">U slučaju kada korisnik unese pogrešan imejl i lozinku, prikazuje se poruka ispod forme „Pogrešni podaci za prijavu.“</li>
</ul>
<ul>
	<li>Strana za promenu lozinke (<strong>lozinka.php</strong>) sadrži:
		<ul>
			<li>Polјa:
				<ul>
					<li>Email</li>
					<li>Stara lozinka</li>
					<li>Nova lozinka</li>
					<li>Ponovlјena nova lozinka</li>
				</ul>
			</li>
			<li>Dva linka:
				<ul>
					<li>Link ka strani za prijavu</li>
					<li>Link ka strani za registraciju</li>
				</ul>
			</li>
		</ul>
	</li>
	<li style="list-style-type: none;">U slučaju kada korisnik unese pogrešan imejl i staru lozinku, prikazuje se poruka ispod forme „Pogrešni podaci za prijavu“</li>
	<li style="list-style-type: none;">U slučaju kada korisnik unese različitu novu lozinku i ponovlјenu novu lozinku, prikazuje seporuka ispod forme „Nove lozinke se ne podudaraju.“</li>
</ul>
<ul>
	<li>Strana za registraciju (<strong>registracija.php</strong>)
		<ul>
			<li>Polјa:
				<ul>
					<li>Email</li>
					<li>Lozinka</li>
					<li>Ponovlјena lozinka</li>
					<li>Ime i prezime</li>
					<li>Telefon</li>
					<li>Slika</li>
				</ul>
			</li>
			<li>Dva linka:
				<ul>
					<li>Link ka strani za prijavu</li>
					<li>Link ka strani za promenu lozinke</li>
				</ul>
			</li>
		</ul>
	</li>
	<li style="list-style-type: none;">U slučaju da korisnik unese imejl koji već postoji, prikazuje se poruka korisniku „Već je registrovan nalog sa tom imejl adresom.“</li>
	<li style="list-style-type: none;">U slučaju kada korisnik unese različitu lozinku i ponovlјenu lozinku, prikazuje se poruka korisniku ispod forme „Lozinke se ne podudaraju“</li>
	<li style="list-style-type: none;">Omogućeno je postavlјanje slika isklјučivo u formatu JPG, GIF ili PNG (image/jpeg, image/png, image/gif) veličine do 2 MB.</li>
</ul>
<ul>
	<li>Kada se korisnik uspešno prijavi, preusmerava se na stranicu <strong>korisnik.php</strong>.</li>
	<li>Na stranici.<strong>php</strong> je obezbedjeno sledeće:
		<ul>
			<li>Link za odjavu korisnika</li>
			<li>Forma za slanje poruka prema drugim korisnicima koja sadrži:
				<ul>
					<li>Polјe za unos naslova poruke (obavezno polјe)</li>
					<li>Polјe za unos poruke (najviše 160 karaktera – obavezno polјe)</li>
					<li>Padajuću listu za biranje korisnika kome se poruka šalјe (obavezno polјe)</li>
					<li>Dva radio dugmeta – hitno i nije hitno (obavezno polјe)</li>
					<li>Dugme pošalјi</li>
				</ul>
			</li>
			<li>Ispod forme, prikazuje se lista svih poruka koje je prijavlјeni korisnik slao, ili primio od nekog drugog korisnika, pri čemu je potrebno da novije poruke budu na vrhu.
				<ul>
					<li>Poruke imaju prikazano:
						<ul>
							<li>U zaglavlјu
								<ul>
									<li>Malu sliku korisnika koji je slao poruku i njegovo ime i prezime</li>
									<li>Naslov</li>
									<li>Vreme slanja poruke</li>
									<li>Desno od vremena prijema poruke, dodati dugme „Pročitano“ koje na klik događaj preko ajax-a u bazi upisuje da je poruka pročitana.</li>
									<li>Za poruke, koje je korisnik sam slao, desno od vremena slanja poruke, umesto dugmeta „Pročitano“, postaviti dugme „Obriši“ koje na klik događaj preko ajax-a iz baze briše poslatu poruku.</li>
								</ul>
							</li>
							<li>Ispod zaglavlјa:
								<ul>
									<li>Sadržaj poruke</li>
								</ul>
							</li>
							<li>Poruke koje su označene kao hitno obojene su crveno, a poruke koje nisu obojene su zeleno.</li>
							<li>Pročitane poruke su obojene zeleno.</li>
						</ul>
					
