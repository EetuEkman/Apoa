@extends('layouts/login')

@section('content')

    <form method="POST" action="{{ route('register') }}">

        @csrf

        <!-- Email / username -->

        <label for="email">{{ __('Sähköposti') }}</label>

        <input id="email" type="email" name="email"
               value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- First name -->

        <label for="firstName">{{ __('Etunimi') }}</label>

        <input id="firstName" type="text"
               class="form-control @error('name') is-invalid @enderror" name="firstName"
               value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>

        @error('firstName')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- Last name -->

        <label for="lastName">{{ __('Sukunimi') }}</label>

        <input id="lastName" type="text" name="lastName"
               value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

        @error('name')
            <span role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <br>

        <!-- Password -->

        <label for="password">{{ __('Salasana') }}</label>

        <input id="password" type="password"
               class="form-control @error('password') is-invalid @enderror" name="password"
               required autocomplete="new-password">

        @error('password')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- Confirm password -->

        <label for="password-confirm">{{ __('Salasanan varmistus') }}</label>

        <input id="password-confirm" type="password" class="form-control"
               name="password_confirmation" required autocomplete="new-password">

        <br>

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

        function toggleSecret()
        {
            if(role.value == 2)
            {
                secret.style.visibility = 'hidden';
                secret.value = '';
                secretLabel.style.visibility = 'hidden';

            }
            else
            {
                secret.style.visibility = 'visible';
                secret.value = '';
                secretLabel.style.visibility = 'visible';
            }
        }
    </script>

@endsection
