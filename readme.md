# Avain parempaan oppimiseen ammattikorkeakouluissa
## Oppimisanalytiikkatyökalu

### Toteutus
Sovellus on kirjoitettu php:lla käyttäen laravel-sovelluskehystä.

### Vaatimukset
* PHP
* Composer paketinhallintajärjestelmä
* Laravel sovelluskehys

### Asennus

Pullatessasi reposta ensimmäistä kertaa käytä **composer update** -komentoa komentokehotteessa projektikansiossa. Paketinhallintajärjestelmä asentaa ohjelman tarvitsemat riippuvuudet.

#### .env-tiedosto
Laravel sovelluskehyksen käyttämä **.env-tiedosto sisältää laravel-ohjelman asetuksia ja on vaatimus ohjelman toiminnalle.** Kyseinen tiedosto sisältää kuitenkin arkaluontoista tietoa kuten tietokantojen avaimia. Näinollen tiedostoa ei ole sisällytetä repoon. Repo sisältää kuitenkin .env.example-tiedoston joka toimii mallina .env-tiedostolle. Tee kopio ja muuta tiedoston nimi .env ja tee haluamasi muutokset.

#### Suojausavain
Laravel vaatii **suojausavaimen**. Suojausavain on yleensä sattumanvaraisesti luotu ja löytyy **.env**-tiedostosta riviltä APP_KEY. Suojausavaimen luot komennolla **php artisan key:generate**.

#### Tietokanta
Tietokannoissa laravel käyttää PHP PDO-rajapintaa. **PDO:n tulee olla asennettuna**.
PDO ja muut käytetyimmät tietokanta-ajurit löytyvät PHP:stä valmiina.
PDO voidaankin ottaa käyttöön muokkaamalla php.ini-tiedostoa **extension=php_pdo.dll**

Tietokantana voit käyttää haluamaasi ohjelmistoa.

Käytetty tietokanta määritellään tiedostossa **config/database.php** oletuksena kohdasta 'default'.
Tieto haetaan .env-tiedostosta kohdasta DB_CONNECTION.
* DB_CONNECTION
 + Valitse käytettävä tietokantayhteys. Yhteydet löytyvät tiedostosta **config/database.php** kohdasta 'connections'. Voit tehdä muutoksia yhteyksiin, esimerkiksi muuttaaksesi oletustietokantaenginen mysql:ssä muuta 'mysql' => 'engine' => 'InnoDb' 
* DB_HOST
 + Tietokantapalvelimen ip-osoite
* DB_PORT
 + Tietokantapalvelimen käyttämä portti
* DB_DATABASE
 + Tietokannan nimi
* DB_PASSWORD
 + Tietokannan salasana

Esimerkki asetuksista:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=developementdb
DB_USERNAME=root
DB_PASSWORD=