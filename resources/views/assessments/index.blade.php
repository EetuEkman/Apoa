@extends("layouts/layout")
@section("title", "Arvioinnit")
@section("content")
<div class="columns is-centered is-vcentered">
    <div class="column is-half">
        <h1>Arvioinnit</h1>
        <table id="assessments" class="table is-bordered is-striped is-narrow is-hoverable" name="assessments">
            <thead>
                <tr>
                    <th>Otsikko</th>
                    <th>Kysymys</th>
                    <th>Esittäjä</th>
                    <th>Toiminnot</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <a class="button is-link" href="/assessments/create">Luo arviointi</a>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                @foreach($assessments as $assessment)
                <tr>
                    <td>{{$assessment->title}}</td>
                    <td>{{$assessment->body}}</td>
                    <td>{{$assessment->user->first_name." ".$assessment->user->last_name}}</td>
                    <td><button class="button is-warning" onclick="window.location.href='/assessments/{{$assessment->id}}/edit'">Muokkaa</button></td>
                </tr>
                @endforeach
            <tbody>
        </table>
    </div>
</div>
@endsection