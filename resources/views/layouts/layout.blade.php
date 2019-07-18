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
    <script src="{{asset('js/app.js')}}"></script>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script>
        @if(isset($responses))
            //Convert the php variable to json
            //and substring out the dates from the datetimes
            const responses = JSON.parse('{!!json_encode($responses)!!}')
                .map(function(response) {
                    response.created_at = response.created_at.substring(0, response.created_at.indexOf(' '));

                    return response;
                });
        @endif
    </script>
</head>

<body class="has-navbar-fixed-top">
    @include('partials.navigation')
    <div class="content">
        <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        @yield('content')
    </div>

    <script defer>
        export default {
            data: function() {
                return {
                    isOpen: false
                } 
            }
        }
    </script>
</body>

</html>
