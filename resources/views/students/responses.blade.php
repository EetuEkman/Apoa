@extends('layouts/layout')
@section('title', 'Omat opiskelijat')
@section("content")
    <div class="columns is-centered is-vcentered">
        <div class="column is-half">
            <h2>{{$user->first_name." ".$user->last_name}}</h2>
            
            <table class="table is-bordered is-narrow">
                <thead></thead>
                <tbody>
                    <tr>
                        <th></th>
                    </tr>
                    
                </tbody>
            </table>
    
            <script defer>
                console.log(JSON.stringify(responses, null, 2));
            </script>
        </div>
    </div>
@endsection
