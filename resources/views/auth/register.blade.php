@extends('layouts/register')

@section('content')

    <form method="POST" action="{{ route('register') }}">

        @csrf

        <!-- Email / username -->

        <label for="email"
               class="col-md-4 col-form-label text-md-right">{{ __('Sähköposti') }}</label>

        <input id="email" type="email"
               class="form-control @error('email') is-invalid @enderror" name="email"
               value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- First name -->

        <label for="firstName"
               class="col-md-4 col-form-label text-md-right">{{ __('Etunimi') }}</label>

        <input id="firstName" type="text"
               class="form-control @error('name') is-invalid @enderror" name="firstName"
               value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>

        @error('firstName')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- Last name -->

        <label for="lastName"
               class="col-md-4 col-form-label text-md-right">{{ __('Sukunimi') }}</label>

        <input id="lastName" type="text"
               class="form-control @error('lastName') is-invalid @enderror" name="lastName"
               value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <!-- Password -->

        <label for="password"
               class="col-md-4 col-form-label text-md-right">{{ __('Salasana') }}</label>

        <input id="password" type="password"
               class="form-control @error('password') is-invalid @enderror" name="password"
               required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- Confirm password -->

        <label for="password-confirm"
               class="col-md-4 col-form-label text-md-right">{{ __('Salasanan varmistus') }}</label>

        <input id="password-confirm" type="password" class="form-control"
               name="password_confirmation" required autocomplete="new-password">

        <!-- Submit button -->

        <button type="submit" class="btn btn-primary">
            {{ __('Luo käyttäjätunnus') }}
        </button>

    </form>

@endsection
