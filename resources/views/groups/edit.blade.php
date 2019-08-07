@extends("layouts/layout")

@section("title", "Muokkaa luokkaa")

@section("content")
    <div class="columns is-centered is-vcentered has" style="padding-top: 1%">
        <div class="column is-one-quarter">
            <div class="level">
                <div class="level-item">
                    <h2 class="title">Muokkaa luokkaa</h2>
                </div>
            </div>
            
            <div class="field">
                <label class="label">Nimi</label>
                <div class="control">
                    <input type="text" class="input" name="name" value="{{ $group->name }}"
                           placeholder="{{ $group->name }}" form="editGroup" required>
                </div>
            </div>
            
            @error('name')
            <div class="field">
                <div class="control">
                    <span class="tag is-warning">{{ $message }}</span>
                </div>
            </div>
            @enderror
            
            <div class="field">
                <label class="label">Kuvaus</label>
                <div class="control">
                    <input type="text" class="input" name="description" value="{{ $group->description }}"
                           placeholder="{{ $group->description }}" form="editGroup" required>
                </div>
            </div>
            
            @error('description')
            <div class="field">
                <div class="control">
                    <span class="tag is-warning">{{ $message }}</span>
                </div>
            </div>
            @enderror
            
            <div class="field">
                <label class="label">Aloitusvuosi</label>
                <div class="control">
                    <input type="text" class="input" name="year" value="{{ $group->year }}" form="editGroup"
                           placeholder="{{ $group->year }}" required>
                </div>
            </div>
            
            @error('year')
            <div class="field">
                <div class="control">
                    <span class="tag is-warning">{{ $message }}</span>
                </div>
            </div>
            @enderror
            
            <div class="field">
                <label class="label">Lukukausi</label>
                <div class="control">
                    <div class="select">
                        <select name="semester" form="editGroup">
                            <option value="Syksy" @if(strcmp($group->semester, "Syksy")) selected @endif>Syksy</option>
                            <option value="Kevät" @if(strcmp($group->semester, "Kevät")) selected @endif>Kevät</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="field is-grouped">
                <div class="control">
                    <input type="submit" class="button is-primary" value="Ok" form="editGroup">
                </div>
                <div class="control">
                    <a class="button is-text" href="/groups">Peruuta</a>
                </div>
            </div>
        </div>
    </div>
    
    <form id="editGroup" action="/groups/{{ $group->id }}" method="post">
        @method('PATCH')
        @csrf
    </form>

    {{--
    <form method="post" action="/groups/{{ $group->id }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        <input type="submit" value="Poista luokka">
    </form>
    --}}
@endsection
