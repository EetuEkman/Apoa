@extends('layouts/layout')

@section('title', 'Käyttäjät')

@section("content")
    <h1>Käyttäjät</h1>
    <table id="users" name="users">
        @foreach($users as $user)
            <tr>
                <td>$users.id</td>
                <td>$users.name</td>
                <td>$users.email</td>
            </tr>
        @endforeach
    </table>
@endsection