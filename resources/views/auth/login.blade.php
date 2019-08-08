@extends('layouts/login')
@section('content')

<article class="card is-rounded">
    <div class="card-content">
        <h1 class="title">
            <img src="{{asset('images/apoa.png')}}" width="250" height="250" alt="logo">
        </h1>
        
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="field">
                <div class="control has-icons-left">
                    <input type="email" class="input @error('email') is-warning @enderror" name="email"
                           placeholder="{{__('Sähköposti')}}" required>
                    <span class="icon is-left">
                        <i class="fa fa-envelope"></i>
                    </span>
                </div>
            </div>
            @error('email')
                <div class="field">
                    <div class="control">
                        <span class="tag is-warning">
                            <strong>{{ $message }}</strong>
                        </span>
                    </div>
                </div>
            @enderror
            
            <div class="field">
                <div class="control has-icons-left">
                    <input type="password" class="input @error('password') is-warning @enderror" name="password"
                           placeholder="{{__('Salasana')}}" required>
                    <span class="icon is-left">
                        <i class="fa fa-lock"></i>
                    </span>
                </div>
            </div>
            
            @error('password')
            <div class="field">
                <div class="control">
                    <span class="tag is-warning">
                        <strong>{{ $message }}</strong>
                    </span>
                </div>
            </div>
            @enderror
            
            {{--
            <div class="field">
                <div class="control">
                    <label class="checkbox">
                        <input type="checkbox" name="remember" {{old('remember') ? 'checked' : ''}}>
                        Muista minut
                    </label>
                </div>
            </div>
            --}}
            
            <div class="field">
                <div class="control">
                    <input type="submit" class="button is-primary is-medium is-fullwidth" value="{{__('Kirjaudu sisään')}}">
                </div>
            </div>
        </form>
        
        <div class="field">
            <div class="control">
                <a href="{{route('register')}}" class="button is-text">{{__('Luo käyttäjätunnus')}}</a><br>
            </div>
        </div>
        
        {{-- ToDo: password reset
        <div class="field">
            <div class="control">
                <a href="{{route('password.request')}}">{{ __('Unohditko salasanasi?')}}</a>
            </div>
        </div>
        --}}
    </div>
</article>
@endsection
