@extends("layouts/layout")
@section("title", "Koti")
@section("content")
    <div class="columns is-centered is-vcentered" style="padding-top: 1%">
        <div class="column is-one-third has-text-centered">
            <h2 class="title">Tervetuloa, {{ Auth::user()->first_name }}.</h2>
            <p class="subtitle">Aloita valitsemalla toiminto yläreunasta.</p>
        </div>
    </div>
@endsection
