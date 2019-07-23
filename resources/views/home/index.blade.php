@extends("layouts/layout")
@section("title", "Koti")
@section("content")
    <div class="columns is-centered is-vcentered">
        <div class="column is-half">
            <h2>Tervetuloa,</h2>
            <h1>{{ Auth::user()->first_name }}.</h1>
        </div>
    </div>
@endsection
