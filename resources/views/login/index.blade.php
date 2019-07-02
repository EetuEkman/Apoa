<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Kirjaudu sisään</title>
</head>

<body>
    <h1>Tervetuloa</h1>
    <p>Tervetuloa käyttämään itsearviointityökalua.</p>
    <p>Aloita kirjautumalla sisään.</p>

    <form action="/home" method="get">
        Käyttäjätunnus <input type="text" placeholder="sähkö.posti@osoite.fi"><br>
        Salasana <input type="password"><br>
        <input type="submit" value="Kirjaudu"><br>
    </form>

    <a href="/login/create">Luo käyttäjätunnus</a><br>
    <a href="">Unohtunut salasana</a>
</body>

</html>