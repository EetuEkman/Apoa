# Avain parempaan oppimiseen ammattikorkeakouluissa
## Oppimisanalytiikkatyökalu

### Toteutus
Sovellus on kirjoitettu php:lla käyttäen laravel-sovelluskehystä ja javascriptiä.

### Vaatimukset
* PHP
* Composer php-paketinhallintajärjestelmä
* Laravel sovelluskehys
* NPM javascript-paketinhallintajärjestelmä
* Web-palvelin
* Tietokanta

Muut riippuvuudet asennetaan paketinhallintajärjestelmien kautta.

### Asennus

Pullatessasi reposta ensimmäistä kertaa käytä `composer update` -komentoa komentokehotteessa projektikansiossa. Paketinhallintajärjestelmä asentaa ohjelman tarvitsemat riippuvuudet.

#### .env-tiedosto
Laravel sovelluskehyksen käyttämä **.env-tiedosto sisältää laravel-ohjelman asetuksia ja on vaatimus ohjelman toiminnalle.** Kyseinen tiedosto sisältää kuitenkin arkaluontoista tietoa kuten tietokantojen avaimia. Näinollen tiedostoa ei ole sisällytetä repoon. Repo sisältää kuitenkin .env.example-tiedoston joka toimii mallina .env-tiedostolle. Tee kopio ja muuta tiedoston nimi .env ja tee haluamasi muutokset.

#### Suojausavain
Laravel vaatii **suojausavaimen**. Suojausavain on yleensä sattumanvaraisesti luotu ja löytyy **.env**-tiedostosta riviltä APP_KEY. Suojausavaimen luot komennolla `php artisan key:generate`.

#### Tietokannan yhteysasetukset
Laravel-sovelluskehys käyttää tietokantayhteyksissä PHP PDO-rajapintaa. **PDO:n tulee olla asennettuna**.
PDO ja muut yleisimmät tietokanta-yhteydet löytyvät PHP:stä valmiina.
PDO voidaankin ottaa käyttöön muokkaamalla **php.ini**-tiedostoa lisäämällä / poistamalla kommentointi riviltä

`extension=php_pdo.dll`

Tietokantana voit käyttää haluamaasi ohjelmistoa.

Käytetty tietokantayhteys määritellään tiedostossa **config/database.php** oletuksena kohdasta 'default'.
Oletuksena määrittely haetaan .env-tiedostosta kohdasta DB_CONNECTION, muutoin käytetään yhteyttä mysql.

.env-tiedostossa yhteys määritellään seuraavasti:

* DB_CONNECTION
  + Valitse käytettävä tietokantayhteys.
  + Yhteydet löytyvät tiedostosta **config/database.php** kohdasta 'connections'.
  + Yhteyden asetuksia voidaan muuttaa, esimerkiksi mysql:n käyttämän oletus tietokantamoottorin muuttamiseksi InnoDb:ksi muuta kohta 'mysql' => [ .., 'engine' => 'InnoDb', .. ] 
* DB_HOST
  + Tietokantapalvelimen ip-osoite
* DB_PORT
  + Tietokantapalvelimen käyttämä portti
* DB_DATABASE
  + Tietokannan nimi
* DB_PASSWORD
  + Tietokannan salasana

Esimerkki asetuksista:

~~~~
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=developmentdb  
DB_USERNAME=root  
DB_PASSWORD=
~~~~

#### Riippuvuudet

Riippuvuuksia ei sisällytetä versionhallintaan. Riippuvuudet asennetaan paketinhallintajärjestelmien avulla.
Kloonatessa versionhallinnasta käyttäjän on ladattava riippuvuudet.

##### Composer

Composer-paketinhallintajärjestelmä vastaa php-riippuvuuksista.
Composer resolvaa tarvittavat riippuvuudet komennolla `composer install`.
Riippuvuudet ladataan projektikansion vendor-kansioon.

##### Npm

Npm-paketinhallintajärjestelmä vastaa javascript-riippuvuuksista.
Npm asentaa riippuvuudet komennolla `npm install`.
Riippuvuudet ladataan projektikansion node_modules-kansioon.

#### Tietokannan rakenne ja seedaus

Kun yhteysasetukset ovat kunnossa, tietokantaohjelmisto päällä ja tietokanta luotu, tietokantaan luodaan ohjelman tarvitsema rakenne komennolla 

`php artisan migrate:fresh`

**Komento fresh luo täysin uuden rakenteen, joten käytä sitä vain tietokanna luomisen yhteydessä!**

Kun rakenne on luotu, voimme luoda tietokantaan oletusroolit komennolla

`php artisan db:seed`

Komento suorittaa database/seeds/DatabaseSeeder-tiedoston run-metodin, joka kutsuu halutut seederit.

Seedereitä voi luoda helposti lisää komennolla

`php artisan make:seeder [Nimi]`

Lopuksi seederin voi kutsua lisäämällä seeder-luokan call-metodin ensimmäisenä argumenttina olevan taulun sisään.

Ohjelman oletus seeder lisää tietokantaan roolit opettaja ja opiskelija. Lisäksi luodaan käyttäjä ja esimerkki luokka
sekä relaatio käyttäjän ja luokan välillä.

## Toimintaidea

Laravel on on MVC-mallin mukainen sovelluskehys. Logiikka on controllereissa 
ja modelit sekä laravelin käyttämä ORM (Object-relational mapping) eloquent hoitavat tietokantakyselyt.
Käyttäjille lähetetään näkymiä, joihin ohjelma renderöi sisältöä palvelinpuolella.
Javascript vastaa lähetettyjen näkymien toiminnallisuudesta.
Ohjelman ulkoasuun käytetään Bulma css-sovelluskehystä.

Käyttäjillä on kahdenlaisia rooleja, opiskelijoita ja opettajia.
 Ajatuksena on, että ylläpito onnistuu käyttämällä tietokantaa suoraan sql:n avulla.

Ohjelman toimintojen välillä siirtymisen on tarkoitettu tapahtuvan yläreunan navigaatiopalkista.
Osoitepalkin get-pyyntöjen kokeilun rajoittamiseksi controllereihin on lisätty yksinkertaisia tarkistuksia.

Opiskelijoilla on pääsy lisäämään vastauksia arviointeihin ja seuraamaan omia arviointejaan sekä muokkaamaan omia tietojaan.

Käyttäjät kuuluvat luokkiin tai ryhmiin, opettajat voivat kuulua useampaan luokkaan.
Luokat rajoittavat mitä kyselyitä opiskelijat näkevät ja mahdollistavat opettajille helposti omien opiskelijoidensa seuraamisen.

Opettajille ei ole asetettu rajoituksia, mutta loogisuuden säilyttämiseksi opettajilla on oma navigaatiopalkkinsa.