@extends("layouts/layout")

@section("title", "Luokat")

@section("content")

    <h1>Tervetuloa, {{ Auth::user()->first_name }}.</h1>
    <p>Tervetuloa käyttämään itsearviointityökalua.</p>

@endsection
