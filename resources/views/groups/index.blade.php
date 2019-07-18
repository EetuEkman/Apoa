@extends("layouts/layout")
@section("title", "Luokat")
@section("content")
<div class="columns is-centered is-vcentered">
    <div class="column is-half">
        <h1>Luokat</h1>
        <table id="groups" class="table is-bordered is-striped is-narrow">
            <thead>
                <tr>
                    <th>Nimi</th>
                    <th>Kuvaus</th>
                    <th>Toiminnot</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <a class="button is-link" href="/groups/create">Luo luokka</a>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                @foreach($groups as $group)
                <tr>
                    <td>{{$group->name}}</td>
                    <td>{{$group->description}}</td>
                    <td>
                        <button class="button is-warning" value="Muokkaa" onclick="window.location.replace('/groups/{{ $group->id }}/edit')">
                            Muokkaa
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection