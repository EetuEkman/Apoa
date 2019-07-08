<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7">   <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8">          <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9">                 <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield("title")</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <section class="hero is-primary is-bold">
        <div class="hero-head">
            <header class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item">
                            <img src="{{asset('images/apoa.png')}}" width="50" height="50">
                        </a>
                        <span class="navbar-burger burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                    <div class="navbar-menu">
                        <div class="navbar-start">
                            <a class="navbar-item" href="/assessments">Omat arviot</a>
                            <a class="navbar-item" href="/responses">Jätä arvio</a>
                            <a class="navbar-item" href="/assessments">Arviointi</a>
                            <a class="navbar-item" href="/users">Käyttäjät</a>
                            <a class="navbar-item" href="/groups">Luokat</a>
                        </div>
                        <div class="navbar-end">
                            <a class="navbar-item" href="user/{{Auth::user()->id}}/edit">{{Auth::user()->email}}</a>
                            <a class="navbar-item" href="/logout"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{__('Kirjaudu ulos')}}
                            </a>
                            <form id="logout-form" action="/logout" method="post" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </section>
    <section>
        <div class="content container has-text-centered">
            <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser.
            Please <a href="#">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
            @yield("content")
        </div>
    </section>
</body>

</html>