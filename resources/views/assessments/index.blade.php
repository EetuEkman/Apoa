@php
use App\User;
@endphp

@extends("layouts/layout")

@section("title", "Assessments")

@section("content")
<div class="container">
    {{$assessments}}
    <table>
        <caption>Arvioinnit</caption>
        <tr>
            <th>Otsikko</th>
            <th>Kysymys</th>
            <th>Esittäjä</th>
            <th></th>
        </tr>
        @foreach($assessments as $assessment)
        <tr>
            <td>{{$assessment->title}}</td>
            <td>{{$assessment->body}}</td>
            <td>{{$assessment->user->first_name." ".$assessment->user->last_name}}</td>
            <td><button onclick="window.location.href='/assessments/{{$assessment->id}}/edit'">Muokkaa</button></td>
        </tr>
        @endforeach
    </table>
    <a href="/assessments/create">Luo arviointi</a>
</div>
@endsection