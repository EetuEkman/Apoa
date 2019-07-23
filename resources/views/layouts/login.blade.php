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
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script src="{{asset('js/app.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body class="layout-default">
<!--[if lt IE 7]>
<p class="browsehappy">
    You are using an <strong>outdated</strong> browser.
    Please <a href="#">upgrade your browser</a> to improve your experience.
</p>
<![endif]-->
<section class="hero is-fullheight is-primary is-medium is-bold">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered is-vcentered">
                <div class="column is-one-quarter">
                    @yield("content")
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
