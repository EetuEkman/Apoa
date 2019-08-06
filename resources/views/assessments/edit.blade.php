@extends("layouts/layout")
@section("title", "Assessments")
@section("content")
    <div class="columns is-centered" style="padding-top: 1%;">
        <div class="column is-one-third">
            <h2>Muokkaa arviointia</h2>
            <div class="field">
                <label class="label">Otsikko</label>
                <div class="control">
                    <input type="text" class="input" name="title" form="assessmentForm" value="{{ $assessment->title }}">
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
                    <textarea class="textarea" name="body" form="assessmentForm">{{ $assessment->body }}</textarea>
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
                        @php
                            $assessmentIds = array_map(function($element) {
                                return $element['group_id'];
                            }, $assessment->groups->toArray());
                        @endphp
                        
                        <select id="groups" name="groups[]" multiple form="assessmentForm" size="{{ count($groups) }}">
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}"
                                        @if(in_array($group->id, $assessmentIds)) selected @endif>{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="field is-grouped">
                <div class="control">
                    <input type="submit" class="button is-primary" value="Lisää" form="assessmentEdit">
                </div>
                <div class="control">
                    <a class="button is-text" href="/assessments">Peruuta</a>
                </div>
            </div>
        </div>
    </div>
    
    <form id="assessmentEdit" action="/assessments/{{ $assessment->id }}" method="post">
        @method('PATCH')
        @csrf
        <input type="hidden" name="userId" value="{{ auth()->id() }}">
    </form>

    {{--
        <form method="post" action="/assessments/{{ $assessment->id }}">
            {{method_field('DELETE')}}
            {{csrf_field()}}
            <input type="submit" class="button is-danger" value="Poista arviointi">
        </form>
    --}}
@endsection
