@extends("layouts/layout")
@section("title", "Muokkaa käyttäjää")
@section("content")
<div class="columns is-centered is-vcentered">
    <div class="column is-half">
        <h2>Muokkaa käyttäjää</h2>
        <form method="post" action="/users/{{$user->id}}">
            @method('PATCH')
            @csrf

            <label for="name">Nimi</label><br>
            <input type="text" name="name" value="{{ $user->name }}"><br>

            <label for="description">Kuvaus</label><br>
            <input type="text" name="description" value="{{ $user->description }}"><br>

            <label for="year">Aloitusvuosi</label><br>
            <input type="text" name="year" value="{{  $user->year }}"><br>

            <label for="semester">Lukukausi, syksy/kevät</label><br>
            <input type="text" name="semester" value="{{ $user->semester }}"><br><br>

            <input type="submit" value="Ok">

        </form>

        <button onclick="window.location.href='/'">Peruuta</button>

        <br>
        <br>

        <form method="post" action="/users/{{$user->id}}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <input type="submit" value="Poista luokka">
        </form>
    </div>
</div>


@endsection