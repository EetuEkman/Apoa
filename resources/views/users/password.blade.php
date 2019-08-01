@extends("layouts/layout")
@section("title", "Muokkaa käyttäjää")
@section("content")
    <div class="columns is-centered is-vcentered">
        <div class="column is-one-third">

            <!-- Password -->

            <div class="field is-horizontal is-grouped-multiline" style="padding-top: 1%">
                <div class="field-label">
                    <label class="label">{{__('Salasana')}}</label>
                </div>

                <div class="field-body">
                    <div class="field is-narrow">
                        <p class="control">
                            <input type="password"
                                   class="input @if(session('mismatch')) is-danger @endif @error('newPassword') is-danger @enderror"
                                   name="password" form="passwordForm" onchange="clearDanger(this)">
                        </p>

                        @error('password')
                            <p id="passwordError" class="help is-danger">{{ $message }}</p>
                        @enderror

                        @if(session('mismatch'))
                            <p class="help is-danger">{{ session('mismatch') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- New password -->

            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label">{{__('Uusi salasana')}}</label>
                </div>

                <div class="field-body">
                    <div class="field is-narrow">
                        <p class="control is-normal">
                            <input type="password"
                                   class="input @if(session('duplicate')) is-danger @endif @error('newPassword') is-danger @enderror"
                                   name="newPassword" form="passwordForm" onchange="clearDanger(this)">
                            @error('newPassword')
                                <p id="newPasswordError" class="help is-danger">{{ $message }}</p>
                            @enderror

                            @if(session('duplicate'))
                                <p class="help is-danger">{{ session('duplicate') }}</p>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Password confirmation -->

            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label">{{__('Salasanan varmennus')}}</label>
                </div>

                <div class="field-body">
                    <div class="field is-narrow">
                        <p class="control is-normal">
                            <input type="password" class="input" name="newPassword_confirmation" form="passwordForm">
                        </p>
                    </div>
                </div>
            </div>

            <!-- Buttons -->

            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label"></label>
                </div>

                <div class="field-body">
                    <div class="field is-grouped">
                        <p class="control">
                            <input type="submit" class="button is-primary" value="Ok" form="passwordForm">
                        </p>
                        <p class="control">
                            <a type="button" class="button is-link"
                               href="/users/{{auth()->user()->id}}/edit">Peruuta</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <form id="passwordForm" method="post" action="/users/{{auth()->user()->id}}/password">
        @csrf
        @method('patch')
    </form>

    <script defer>
        function clearDanger(element) {
            element.classList.remove('is-danger');
        }
    </script>
@endsection
