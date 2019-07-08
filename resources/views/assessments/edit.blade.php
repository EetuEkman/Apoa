@extends("layouts/layout")
@section("title", "Assessments")
@section("content")
<div class="container">
    <h2>Muokkaa arviointia</h2>
    <form method="post" action="/assessments/{{ $assessment->id }}">
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <label for="title">Nimi</label><br>
        <input type="text" name="title" value="{{ $assessment->title }}"><br>
        <label for="body">Kysymys</label><br>
        <input type="text" name="body" value="{{ $assessment->body }}"><br>
        <input type="submit" value="Ok">
        <button onclick="window.location.href = '/assessments'">Peruuta</button>
    </form>
    <br>
    <br>
    <form method="post" action="/assessments/{{ $assessment->id }}">
        {{method_field('DELETE')}}
        {{csrf_field()}}
        <input type="submit" value="Poista arviointi">
    </form>
</div>
@endsection