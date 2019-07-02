@extends("layouts/layout")

@section("title", "Muokkaa luokkaa")

@section("content")

    <h2>Muokkaa luokkaa</h2>

    <form method="post" action="/groups/{{ $group->id }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <label for="name">Nimi</label><br>
        <input type="text" name="name" value="{{ $group->name }}"><br>

        <label for="description">Kuvaus</label><br>
        <input type="text" name="description" value="{{ $group->description }}"><br>

        <label for="year">Aloitusvuosi</label><br>
        <input type="text" name="year" value="{{  $group->year }}"><br>

        <label for="semester">Lukukausi, syksy/kevät</label><br>
        <input type="text" name="semester" value="{{ $group->semester }}"><br><br>

        <input type="submit" value="Ok">
        <button onclick="window.location.href = '/groups'">Peruuta</button>
    </form>

    <br>
    <br>

    <form method="post" action="/groups/{{ $group->id }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        <input type="submit" value="Poista luokka">
    </form>

@endsection
