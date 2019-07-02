<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Luo käyttäjätunnus</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a>
    to improve your experience.</p>
<![endif]-->

<p>Sähköposti toimii käyttäjätunnuksena.</p>

<form action="create" method="post">

    {{ csrf_field() }}

    <label for="username">Käyttäjätunnus</label><br>
    <input type="text" name="username" placeholder="sähkö.posti@osoite.fi" required><br>

    <label for="password">Salasana</label><br>
    <input type="password" name="password" required><br>

    <label for="password_confirmation">Salasanan vahvistus</label><br>
    <input type="password" name="password_confirmation" required><br>

    <label for="firstname">Etunimi</label><br>
    <input type="text" name="firstname" required><br>

    <label for="lastname">Sukunimi</label><br>
    <input type="text" name="lastname" required><br>

    <label for="group">Luokka</label><br>
    <select name="group" id="group">
        <option hidden disabled selected value="">Valitse luokka</option>
        @foreach ($groups as $group)
            <option value="{{$group->name}}">{{$group->name}}</option>
        @endforeach
    </select><br>

    <label for="role">Rooli</label><br>
    <select id="role" name="role">
        <option value="student" default selected>Opiskelija</option>
        <option value="teacher">Opettaja</option>
    </select><br>

    <br>

    <input type="submit" value="Ok"><br>
</form>

<br>

<a href="/">Paluu</a>

<script src="" async defer></script>
</body>

</html>
