@extends("layouts/layout")

@section("title", "Luokat")

@section("content")

<h1>Luokat</h1>

@if($groups->count() < 1) <p>Ei luokkia.</p>
    @endif

    @if($groups->count() >= 1)

    <table id="groups" class="table-bordered">

        @foreach($groups as $group)
        <tr>
            <td>{{$group->name}}</td>
            <td>{{$group->description}}</td>
            <td>
                <button value="Muokkaa" onclick="window.location.replace('/groups/{{ $group->id }}/edit')">
                    Muokkaa
                </button>
            </td>
        </tr>
        @endforeach

    </table>

    @endif

    <a href="/groups/create">Luo luokka</a>

    @endsection