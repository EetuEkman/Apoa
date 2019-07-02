@php
use App\User;
@endphp

@extends("layouts/layout")

@section("title", "Assessments")

@section("content")

    <p>{{ $assessments }}</p>

<table>
    <caption>Arvioinnit</caption>
    <tr>
        <th>Otsikko</th>
        <th>Kysymys</th>
        <th>Esittäjä</th>
    </tr>

    @foreach($assessments as $assessment)
        <tr>
            <td>{{$assessment->title}}</td>
            <td>{{$assessment->question}}</td>
            <td>{{$assessment->user_id}}</td>
        </tr>
    @endforeach

</table>

<a href="/assessments/create">Luo arviointi</a>

@endsection
