# Avain parempaan oppimiseen ammattikorkeakouluissa
## Oppimisanalytiikkatyökalu

### Toteutus
Sovellus on kirjoitettu php:lla käyttäen laravel-sovelluskehystä.

### Vaatimukset
* PHP
* Composer paketinhallintajärjestelmä
* Laravel sovelluskehys
* NPM

### Asennus

Pullatessasi reposta ensimmäistä kertaa käytä `composer update` -komentoa komentokehotteessa projektikansiossa. Paketinhallintajärjestelmä asentaa ohjelman tarvitsemat riippuvuudet.

#### .env-tiedosto
Laravel sovelluskehyksen käyttämä **.env-tiedosto sisältää laravel-ohjelman asetuksia ja on vaatimus ohjelman toiminnalle.** Kyseinen tiedosto sisältää kuitenkin arkaluontoista tietoa kuten tietokantojen avaimia. Näinollen tiedostoa ei ole sisällytetä repoon. Repo sisältää kuitenkin .env.example-tiedoston joka toimii mallina .env-tiedostolle. Tee kopio ja muuta tiedoston nimi .env ja tee haluamasi muutokset.

#### Suojausavain
Laravel vaatii **suojausavaimen**. Suojausavain on yleensä sattumanvaraisesti luotu ja löytyy **.env**-tiedostosta riviltä APP_KEY. Suojausavaimen luot komennolla `php artisan key:generate`.

#### Tietokanta
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