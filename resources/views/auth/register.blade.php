@extends('layouts/login')

@section('content')

    <form method="POST" action="{{ route('register') }}">

    @csrf

    <!-- Email / username -->
        <div class="field">
            <label class="label">{{ __('Sähköposti') }}</label>
            <div class="control">
                <input id="email" class="input" type="email" name="email"
                       value="{{ old('email') }}" required autocomplete="email">
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
                       value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>
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
                <input id="password" type="password"
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
                <input id="password-confirm" type="password" class="form-control"
                       name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>


        <!-- User role -->

        <label for="role">{{ __('Rooli') }}</label>

        <select id="role" name="role" onchange="toggleSecret()">
            <option selected disabled hidden>Valitse</option>

            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>

        <!-- User secret -->

        <label for="secret" id="secretLabel" style="visibility: hidden">Avain</label>

        <input type="password" id="secret" name="secret" style="visibility: hidden">

        <!-- Group  -->

        <label for="group" id="groupLabel">Luokka</label>

        <select id="group" name="group">
            <option selected disabled hidden>Luokkatunnus</option>

            @foreach($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name}}</option>
            @endforeach
        </select>

        <br>

        <!-- Submit button -->

        <button type="submit" class="btn btn-primary">
            {{ __('Luo käyttäjätunnus') }}
        </button>

    </form>

    <script async defer>
        var secret = document.getElementById('secret');
        var secretLabel = document.getElementById('secretLabel');

        function toggleSecret() {
            if (role.value == 2) {
                secret.style.visibility = 'hidden';
                secret.value = '';
                secretLabel.style.visibility = 'hidden';

            } else {
                secret.style.visibility = 'visible';
                secret.value = '';
                secretLabel.style.visibility = 'visible';
            }
        }
    </script>

@endsection
