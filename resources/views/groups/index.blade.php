@extends("layouts/layout")
@section("title", "Luokat")
@section("content")
<div class="columns is-centered is-vcentered" style="padding-top: 1%;">
    <div class="column is-half has-text-centered">
        <h2 class="title">Luokat</h2>
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
                        <a class="button is-primary" href="/groups/create">Luo luokka</a>
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
        
        @if(session('added'))
            <div class="notification is-success">{{ session('added') }}</div>
        @endif
    
        @if(session('edited'))
            <div class="notification is-success">{{ session('edited') }}</div>
        @endif
    </div>
</div>
@endsection
