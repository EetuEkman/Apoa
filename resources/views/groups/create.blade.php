@extends("layouts/layout")

@section("title", "Luo luokka")

@section("content")
    <div class="columns is-centered is-vcentered" style="padding-top: 1%">
        <div class="column is-one-quarter">
            <div class="level">
                <div class="level-item">
                    <h2 class="title">Lisää luokka</h2>
                </div>
            </div>
            
            <div class="field">
                <label class="label">Nimi</label>
                <div class="control">
                    <input type="text" class="input" name="name" value="{{ old('name') }}" form="addGroup" required>
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
                    <input type="text" class="input" name="description" value="{{ old('description') }}"
                           form="addGroup" required>
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
                    <input type="text" class="input" name="year" value="{{ old('year') }}" form="addGroup" required>
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
                        <select name="semester" form="addGroup">
                            <option value="Syksy">Syksy</option>
                            <option value="Kevät">Kevät</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="field is-grouped">
                <div class="control">
                    <input type="submit" class="button is-primary" value="Ok" form="addGroup">
                </div>
                <div class="control">
                    <a class="button is-text" href="/groups">Peruuta</a>
                </div>
            </div>
        </div>
    </div>
    
    <form id="addGroup" action="/groups" method="post">
        @csrf
    </form>
@endsection
