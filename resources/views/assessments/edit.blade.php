@extends("layouts/layout")
@section("title", "Assessments")
@section("content")
<div class="columns is-centered is-vcentered">
    <div class="column is-half has-text-centered">
        <h2>Muokkaa arviointia</h2>
        <form method="post" action="/assessments/{{ $assessment->id }}">
            {{method_field('PATCH')}}
            {{csrf_field()}}
            <label for="title">Nimi</label><br>
            <textarea class="textarea" name="title">{{$assessment->title}}</textarea><br>
            <label for="body">Kysymys</label><br>
            <textarea class="textarea" name="body">{{$assessment->body}}</textarea><br>
            <input type="submit" class="button is-primary" value="Ok">
            <button class="button is-link" onclick="window.location.href='/assessments'">Peruuta</button>
        </form>
        <br>
        <br>
        {{--
        <form method="post" action="/assessments/{{ $assessment->id }}">
            {{method_field('DELETE')}}
            {{csrf_field()}}
            <input type="submit" class="button is-danger" value="Poista arviointi">
        </form>
        --}}
    </div>
</div>
@endsection
