@extends('layouts/login')

@section('content')
    <article class="card is-rounded">
        <div class="card-header">
            <p class="card-header-title is-centered">
                {{ __('Salasanan vaihtaminen') }}
            </p>
        </div>
        <div class="card-content">
            @if(session('status'))
                <div class="notification is-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="field">
                <label class="label">{{__('Sähköpostiosoite')}}</label>
                <p class="control">
                    <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus form="passwordEmail">
                </p>
            </div>
            <div class="field is-grouped">
                <p class="control">
                    <button type="submit" class="button is-primary" form="passwordEmail">
                        {{ __('Lähetä linkki') }}
                    </button>
                </p>
                <p class="control">
                    <a class="button is-link" href="/login">
                        {{ __('Peruuta') }}
                    </a>
                </p>
            </div>
        </div>
    </article>
    
    <form id="passwordEmail" method="POST" action="{{ route('password.email') }}">
        @csrf
    </form>
@endsection

{{--

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

--}}


