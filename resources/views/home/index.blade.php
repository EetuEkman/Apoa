@extends("layouts/layout")
@section("title", "Koti")
@section("content")
    <div class="columns is-centered is-vcentered">
        <div class="column is-half">
            <h1>Tervetuloa, {{ Auth::user()->first_name }}.</h1>
            <p>Aloita valitsemalla toiminto yläreunasta.</p>
        </div>
    </div>
@endsection
