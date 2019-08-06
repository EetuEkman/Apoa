@extends("layouts/layout")
@section("title", "Arvioinnit")
@section("content")
<div class="columns is-centered is-vcentered" style="padding-top: 1%;">
    <div class="column is-half has-text-centered">
        <h1>Arvioinnit</h1>
        <table id="assessments" class="table is-bordered is-striped is-narrow is-hoverable" name="assessments">
            <thead>
                <tr>
                    <th>Otsikko</th>
                    <th>Kysymys</th>
                    <th>Esittäjä</th>
                    <th>Näkyvyys</th>
                    <th>Toiminnot</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td>
                        <a class="button is-primary" href="/assessments/create">Luo arviointi</a>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                @foreach($assessments as $assessment)
                <tr>
                    <td>{{$assessment->title}}</td>
                    <td>{{$assessment->body}}</td>
                    <td>{{$assessment->user->first_name." ".$assessment->user->last_name}}</td>
                    <td>@foreach($assessment->groups as $group) {{ $group->name."," }} @endforeach</td>
                    <td><button class="button is-warning" onclick="window.location.href='/assessments/{{$assessment->id}}/edit'">Muokkaa</button></td>
                </tr>
                @endforeach
            <tbody>
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
