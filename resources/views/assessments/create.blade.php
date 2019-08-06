@extends("layouts/layout")
@section("title", "Create assessment")
@section("content")
    <div class="columns is-centered" style="padding-top: 1%;">
        <div class="column is-one-third">
            <div class="field">
                <label class="label">Otsikko</label>
                <div class="control">
                    <input type="text" class="input" name="title" form="assessmentCreate">
                </div>
            </div>
            
            @error('title')
                <div class="field">
                    <label class="label"></label>
                    <div class="control">
                        <span class="tag is-warning is-small">{{ $message }}</span>
                    </div>
                </div>
            @enderror
            
            <div class="field">
                <label class="label">Kysymys</label>
                <div class="control">
                    <textarea class="textarea" name="body" form="assessmentCreate"></textarea>
                </div>
            </div>
            
            @error('body')
            <div class="field">
                <label class="label"></label>
                <div class="control">
                    <span class="tag is-warning is-small">{{ $message }}</span>
                </div>
            </div>
            @enderror
            
            <div class="field">
                <label class="label">Näkyvyys</label>
                <div class="control">
                    <div class="select is-multiple">
                        <select id="groups" name="groups[]" multiple form="assessmentCreate"
                                size="@if(count($groups) < 10) {{ count($groups) }} @else 10 @endif">
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="field is-grouped">
                <div class="control">
                    <input type="submit" class="button is-primary" value="Lisää" form="assessmentCreate">
                </div>
                <a class="button is-text" href="/assessments">Peruuta</a>
                <div class="control">
                
                </div>
            </div>
        </div>
    </div>
    
    <form id="assessmentCreate" action="/assessments" method="post">
        @csrf
        <input type="hidden" name="userId" value="{{ auth()->id() }}">
    </form>
@endsection
