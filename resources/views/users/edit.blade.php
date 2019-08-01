@extends("layouts/layout")
@section("title", "Muokkaa käyttäjää")
@section("content")
    <div class="columns is-centered is-vcentered">
        <div class="column is-one-third">
            <div class="field is-horizontal" style="padding-top: 1%">
                <div class="field-label">
                    <label class="label">Etunimi</label>
                </div>

                <div class="field-body">
                    <div class="field is-narrow">
                        <p class="control">
                            <input type="text" class="input" name="first_name" form="editForm" value="{{$user->first_name}}">
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label">Sukunimi</label>
                </div>

                <div class="field-body">
                    <div class="field is-narrow">
                        <p class="control is-normal">
                            <input type="text" class="input" name="last_name" form="editForm" value="{{$user->last_name}}">
                        </p>
                    </div>

                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label">Luokka</label>
                </div>

                <div class="field-body">
                    <p class="control">

                    @if(auth()->user()->role_id == 2)
                        <div class="select">
                            @php
                                $groupIdRaw = auth()->user()->groups()->select('group_id')->get();

                                $groupId = $groupIdRaw[0]['group_id']
                            @endphp

                            <select name="group[]" form="editForm">
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}" @if($group->id == $groupId) selected @endif>
                                        {{$group->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="select is-multiple">
                            @php
                                $groupIdRaw = auth()->user()->groups()->select('group_id')->get()->toArray();

                                $groupId = array_map(function($element) {
                                    return $element['group_id'];
                                }, $groupIdRaw);
                            @endphp

                            <select name="group[]" form="editForm" size="@if(count($groups) > 10) 10 @else {{count($groups)}} @endif" multiple>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}" @if(in_array($group->id, $groupId)) selected @endif>
                                        {{$group->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif

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
            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label"></label>
                </div>

                <div class="field-body">
                    <p class="control is-normal">
                        <a class="button is-warning" href="/users/{{auth()->user()->id}}/password">Vaihda salasana</a>
                    </p>
                </div>
            </div>

            @if(session('success'))
                <div class="field is-horizontal">
                    <div class="field-label">
                        <label class="label"></label>
                    </div>
                    <div class="field-body">
                        <span class="tag is-success is-large">{{ session('success') }}</span>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <form id="editForm" method="post" action="/users/{{$user->id}}">
        @method('PATCH')
        @csrf
    </form>

@endsection
