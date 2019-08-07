@extends('layouts/layout')
@section('title', 'Omat opiskelijat')
@section("content")
    <div class="columns is-centered" style="padding-top: 1%;">
        <div class="column is-half">
            <div class="level">
                <div class="level-item has-text-centered">
                    <h2>{{$user->first_name." ".$user->last_name}}</h2>
                </div>
            </div>

            <section id="assessments"></section>

            <script src="{{ asset('js/responses.js') }}" defer></script>
        </div>
    </div>
@endsection
