@extends("layouts/layout")
@section("title", "Muokkaa käyttäjää")
@section("content")
<div class="columns is-centered is-vcentered">
    <div class="column is-half">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-title">
                        <h2>Muokkaa käyttäjää</h2>
                    </div>
                    <div class="card-header-icon">
                    
                    </div>
                </div>
                <div class="card-content">
                    <div class="field is-horizontal">
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
                                <select name="group" form="editForm">
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                </div>
                <footer class="card-footer">
                    <input type="submit" class="card-footer-item" value="Ok">
                    <button class="card-footer-item" onclick="window.location.href='/'">Peruuta</button>
                </footer>
            </div>
        
    </div>
</div>

<form id="editForm" method="post" action="/users/{{$user->id}}">
    @method('PATCH')
    @csrf
</form>

@endsection
