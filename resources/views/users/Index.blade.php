@extends('layouts/layout')
@section('title', 'Käyttäjät')
@section("content")
<div class="columns is-centered is-vcentered">
    <div class="column is-half">
        <h1>Käyttäjät</h1>
        <table id="users" class="table is-bordered is-striped is-narrow is-hoverable" name="users">
            <thead>
                <tr>
                    <th>Etunimi</th>
                    <th>Sukunimi</th>
                    <th>Rooli</th>
                    <th>Sähköposti</th>
                    <th>Luokat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->email}}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection