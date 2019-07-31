@extends("layouts/layout")
@section("title", "Vastaa")
@section("content")
    <div class="columns is-centered">
        <div class="column is-half">
            <section id="assessment">
                <table class="table is-narrow">
                    <tbody>
                    <tr>
                        <th>Esittäjä</th>
                        <td id="assessmentAuthor"></td>
                    </tr>
                        <tr>
                            <th>Otsikko</th>
                            <td id="assessmentTitle"></td>
                        </tr>
                        <tr>
                            <th>Kysymys</th>
                            <td id="assessmentBody"></td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <hr>
            <section id="assessmentForm">
                <div id="assessmentField" class="field"></div>
                <div class="field">
                    <label class="label">Arvosana</label>
                    <div class="control">
                        <div class="select">
                            <select name="grade" form="responseForm" required>
                                <option selected disabled hidden>Valitse arvosana</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Arvio</label>
                    <div class="control">
                        <textarea class="textarea" name="body" placeholder="" form="responseForm"></textarea>
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
