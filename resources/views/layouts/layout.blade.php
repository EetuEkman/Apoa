<!DOCTYPE html>

<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7">   <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8">          <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9">                 <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">                        <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield("title")</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>

<div id="app">

    <div class="content">

        <ul>
            <li><a href="/">Login</a></li>
            <li><a href="/home">Home</a></li>
            <li><a href="/assessments">Omat arviot</a></li>
            <li><a href="/response">Jätä arvio</a></li>
            <li><a href="/help">Apua</a></li>
            <li><a href="/users">Käyttäjät</a></li>
            <li><a href="/add">Lisää</a></li>
            <li><a href="/groups">Luokat</a></li>
        </ul>

        <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser.
            Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        @yield("content")

    </div>

</div>

</body>

</html>
