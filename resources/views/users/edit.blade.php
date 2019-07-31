@extends("layouts/layout")
@section("title", "Muokkaa käyttäjää")
@section("content")
    <div class="columns is-multiline is-centered is-vcentered">
        <div class="column is-one-third">
            <div class="field is-horizontal" style="padding-top: 2%">
                <div class="field-label">
                    <label class="label">Etunimi</label>
                </div>
                <div class="field-body">
                    <input type="text" name="name" form="editForm" value="{{$user->first_name}}">
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label">Sukunimi</label>
                </div>
                <div class="field-body">
                    <p class="control is-normal">
                        <input type="text" name="name" form="editForm" value="{{$user->last_name}}">
                    </p>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label">{{__('Vanha salasana')}}</label>
                </div>
                <div class="field-body">
                    <p class="control is-normal">
                        <input type="text" form="editForm" name="name">
                    </p>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label">{{__('Uusi salasana')}}</label>
                </div>
                <div class="field-body">
                    <p class="control">
                        <input type="text" form="editForm" name="name">
                    </p>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label">{{__('Salasanan varmennus')}}</label>
                </div>
                <div class="field-body">
                    <p class="control is-normal">
                        <input type="text" form="editForm" name="name">
                    </p>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label">Luokka</label>
                </div>
                <div class="field-body">
                    <p class="control is-normal">
                        <select name="group[]" form="editForm">
                            @foreach($groups as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                    </p>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label"></label>
                </div>
                <div class="field-body">
                    <p class="control is-normal">
                        <input type="submit" class="button is-primary" value="Ok" form="editForm">
                        <button class="button is-link" onclick="window.location.href='/'">Peruuta</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <form id="editForm" method="post" action="/users/{{$user->id}}">
        @method('PATCH')
        @csrf
    </form>

@endsection
