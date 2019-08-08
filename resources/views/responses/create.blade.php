@extends("layouts/layout")
@section("title", "Vastaa")
@section("content")
    <div class="columns is-centered" style="padding-top: 1%">
        <div class="column is-half">
            <section id="assessmentForm">
                <div id="assessmentField" class="field"></div>
    
                <div class="field">
                    <label class="label">Otsikko</label>
                    <div class="control">
                        <p id="assessmentTitle"></p>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Kysymys</label>
                    <div class="control">
                        <p id="assessmentBody"></p>
                    </div>
                </div>
                
                {{--
                <div class="field">
                    <label class="label">Esittäjä</label>
                    <div class="control">
                        <p id="assessmentAuthor"></p>
                    </div>
                </div>
                --}}
                
                <div class="field">
                    <label class="label">Arvioni</label>
                    <div class="control">
                        <div class="select">
                            <select name="grade" form="responseForm" required>
                                <option selected disabled hidden>Valitse</option>
                                <option value="1">5</option>
                                <option value="2">4</option>
                                <option value="3">3</option>
                                <option value="4">2</option>
                                <option value="5">1</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="field">
                    <label class="label">Sanallinen arvioni</label>
                    <div class="control">
                        <textarea class="textarea has-fixed-size" name="body" placeholder="" form="responseForm"></textarea>
                    </div>
                </div>
                
                <div class="field is-grouped">
                    <p class="control">
                        <button type="submit" class="button is-primary" value="submit" form="responseForm">Ok</button>
                    </p>
                </div>
            </section>
            <form id="responseForm" method="post" action="/responses">
                @csrf
                <input type="hidden" name="id" value="{{auth()->user()->id}}" required>
            </form>
        </div>
    </div>
    
    @isset($assessments)
        <script src="{{asset('js/createResponse.js')}}" defer></script>
    @endisset
@endsection
