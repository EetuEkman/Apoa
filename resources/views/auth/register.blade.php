@extends('layouts/login')

@section('content')

    <form method="POST" action="{{ route('register') }}">

        @csrf

        <!-- Email / username -->

        <div class="field is-grouped">
            <div class="field-label">
                <label class="label">{{ __('Sähköposti') }}</label>
            </div>
            <div class="control">
                <input id="email" class="input" type="email" name="email"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- First name -->

        <div class="field">
            <label class="label">{{ __('Etunimi') }}</label>
            <div class="control">
                <input id="firstName" type="text"
                       class="input @error('name') is-invalid @enderror" name="firstName"
                       value="{{ old('firstName') }}" required autocomplete="firstName">
                @error('firstName')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <!-- Last name -->

        <div class="field">
            <label class="label">{{ __('Sukunimi') }}</label>
            <div class="control">
                <input id="lastName" class="input" type="text" name="lastName"
                       value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>
                @error('name')
                    <span role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <!-- Password -->

        <div class="field">
            <label class="label">{{ __('Salasana') }}</label>
            <div class="control">
                <input id="password" class="input" type="password"
                       class="form-control @error('password') is-invalid @enderror" name="password"
                       required autocomplete="new-password">
                @error('password')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Confirm password -->

        <div class="field">
            <label class="label">{{ __('Salasanan varmistus') }}</label>
            <div class="control">
                <input id="password-confirm" type="password" class="form-control input"
                       name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <!-- User role & role secret-->

        <div class="field is-grouped">

            <!-- User role -->

            <label class="label">{{ __('Rooli') }}</label>
            <div class="control">
                <div class="select">
                    <select id="role" name="role" onchange="toggleSecret()">
                        <option selected disabled hidden>Valitse</option>

                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Role secret -->

            <label class="label">Avain</label>
            <div class="control">
                <input type="password" id="secret" class="input" name="secret" disabled>
            </div>
        </div>

        <!-- Group  -->

        <div class="field">
            <label class="label">Luokka</label>
            <div class="control">
                <div class="select">
                    <select id="group" name="group">
                        <option selected disabled hidden>Luokkatunnus</option>
            
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name}}</option>
                        @endforeach
                    </select>
                </div>   
            </div>
        </div>

        <!-- Submit button -->

        <div class="field is-grouped">
            <div class="control">
                <button type="submit" class="button">
                    {{ __('Luo käyttäjätunnus') }}
                </button>
            </div>
            <div class="control">
                <button type="button" class="button is-text" onclick="window.location.href='/'">
                    {{ __('Peruuta') }}
                 </button>
                </div>
        </div>
        
    </form>

    <script async defer>
        var secret = document.getElementById('secret');

        function toggleSecret() {
            if (role.value == 2) {
                secret.disabled = true;
                secret.value = '';
            } else {
                secret.disabled = false;
                secret.value = '';
            }
        }
    </script>

@endsection
