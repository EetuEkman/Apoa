@extends("layouts/layout")

@section("title", "Vastaukset")

@section("content")
{{$responses}}

<div id="output"></div>
    <script defer>
        var responses = {{$json = json_encode($responses)}};
        var output = document.getElementById('outout');
        output.innerHTML = JSON.stringify(responses);
    </script>
@endsection
