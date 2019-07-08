@extends("layouts/layout")

@section("title", "Koti")

@section("content")
    <div class="columns is-centered">
        <div class="column">
            <h2>Tervetuloa,</h2>
            <h1>{{ Auth::user()->first_name }}.</h1>
        </div>
    </div>
@endsection
