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
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

<div id="app" class="columns is-vcentered">

    <div class="column"></div>

    <div class="column">

        <div class="columns is-centered">

            <div class="column">

                <img src="{{ asset('images/apoa.png') }}" width="500" height="500" alt="">

                <div class="content has-text-centered">

                    <!--[if lt IE 7]>
                    <p class="browsehappy">
                        You are using an <strong>outdated</strong> browser.
                        Please <a href="#">upgrade your browser</a> to improve your experience.
                    </p>
                    <![endif]-->

                    @yield("content")

                </div>

            </div>

        </div>

    </div>

    <div class="column"></div>

</div>

</body>

</html>
