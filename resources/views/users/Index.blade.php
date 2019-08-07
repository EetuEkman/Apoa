@extends('layouts/layout')
@section('title', 'Käyttäjät')
@section("content")
<div class="columns is-centered is-vcentered" style="padding-top: 1%;">
    <div class="column is-half">
        <div class="level">
            <div class="level-item has-text-centered">
                <h2 class="title">Käyttäjät</h2>
            </div>
        </div>
        
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
                    <td>@foreach($user->groups as $group){{$group->name.', '}}@endforeach</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
