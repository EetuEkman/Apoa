@extends('layouts/layout')

@section('title', 'Käyttäjät')

@section("content")
    <h1>Käyttäjät</h1>
    <table id="users" name="users">
        <tr>
            <th>Etunimi</th>
            <th>Sukunimi</th>
            <th>Rooli</th>
            <th>Sähköposti</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
        @endforeach
    </table>
@endsection