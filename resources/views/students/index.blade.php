@extends('layouts/layout')
@section('title', 'Omat opiskelijat')
@section("content")
    <div class="columns is-centered is-vcentered" style="padding-top: 1%;">
        <div class="column is-half">
            <script defer>
                console.log(JSON.stringify({!! json_encode($groups) !!}, null, 2))
            </script>

            @isset($groups)
                @foreach($groups as $group)
                    <table class="table is-bordered is-narrow">
                        <thead>
                            <div class="level">
                                <div class="level-item has-text-centered">
                                    <h2 class="title">{{$group->name}}</h2>
                                </div>
                            </div>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{__('Etunimi')}}</th>
                                <th>{{__('Sukunimi')}}</th>
                                <th>{{__('Käyttäjätunnus')}}</th>
                                <th>{{__('Rooli')}}</th>
                                <th>{{__('Toiminnot')}}</th>
                            </tr>
                            @forelse($group->users as $user)
                                <tr>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td>
                                        <button class="button is-primary" onclick="window.location='/students/{{$user->user_id}}'">Tarkastele</button>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Luokalla ei muita jäseniä.</td>
                                    </tr>
                            @endforelse
                        </tbody>
                    </table>
                @endforeach
            @endisset
        </div>
    </div>
@endsection
