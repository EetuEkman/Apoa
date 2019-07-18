@extends("layouts/layout")
@section("title", "Create assessment")
@section("content")
    <h1>Uusi arviointi</h1>
    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/assessments" method="post">
        @csrf
        <label for="title">Otsikko</label><br>
        <input type="text" id="title" name="title" tabindex="1" required><br>
        <label for="question">Kysymys</label><br>
        <textarea id="question" name="question" cols="30" rows="10" tabindex="2" required style="resize: none"></textarea><br>
        <label for="groups[]">Näkyvyys</label><br>
        <select id="groups" name="groups[]" multiple size="{{ $groups->count() }}" tabindex="3">
            @foreach($groups as $group)
                <option value="{{$group->name}}">{{$group->name}}</option>
            @endforeach
        </select><br>
        Paina ctrl-näppäintä pohjassa valitaksesi useamman luokan.<br><br>
        <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
        <input type="submit" id="submit" name="submit" value="Lisää" tabindex="4">
    </form>
@endsection
