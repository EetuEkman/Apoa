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