@extends('layouts/layout')
@section('title', 'Omat opiskelijat')
@section("content")
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="container has-text-centered">
                <h2>{{$user->first_name." ".$user->last_name}}</h2>
            </div>

            <section id="assessments"></section>

            <script src="{{ asset('js/responses.js') }}" defer></script>
        </div>
    </div>
@endsection
