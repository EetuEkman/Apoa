@extends('layouts/login')
@section('content')
    <article class="card is-rounded">
        <div class="card-content">
            <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <!-- Email / username -->
                
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">{{ __('Sähköposti') }}</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control is-expanded has-icons-left">
                                <input id="email" class="input" type="email" name="email"
                                       value="{{old('email')}}" required autocomplete="email" autofocus>
                                <span class="icon is-small is-left">
                                    <i class="fa fa-user"></i>
                                </span>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- First name -->
                
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">{{__('Etunimi')}}</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control is-expanded has-icons-left">
                                <input id="firstName" type="text"
                                       class="input @error('name') is-invalid @enderror" name="firstName"
                                       value="{{ old('firstName') }}" required autocomplete="firstName">
                                <span class="icon is-small is-left">
                                    <i class="fa fa-address-card"></i>
                                </span>
                                @error('firstName')
                                <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Last name -->
                
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">{{ __('Sukunimi') }}</label>
                    </div>
                    <div class="field-body">
                        <div class="control has-icons-left">
                            <input id="lastName" class="input" type="text" name="lastName"
                                   value="{{old('lastName')}}" required autocomplete="lastName" autofocus>
                            <span class="icon is-small is-left">
                                <i class="fa fa-address-card"></i>
                            </span>
                            @error('name')
                            <span role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Password -->
                
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">{{ __('Salasana') }}</label>
                    </div>
                    <div class="field-body">
                        <div class="control has-icons-left">
                            <input id="password" class="input" type="password"
                                   class="form-control @error('password') is-danger @enderror" name="password"
                                   required autocomplete="new-password">
                            <span class="icon is-small is-left">
                                <i class="fa fa-lock"></i>
                            </span>
                            @error('password')
                            <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Confirm password -->
                
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">{{ __('Salasanan varmistus')}}</label>
                    </div>
                    <div class="field-body">
                        <div class="control has-icons-left">
                            <input id="password-confirm" type="password" class="form-control input"
                                   name="password_confirmation" required autocomplete="new-password">
                                <span class="icon is-small is-left">
                                    <i class="fa fa-lock"></i>
                                </span>
                        </div>
                    </div>
                </div>
                
                <!-- User role -->
                
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">{{ __('Rooli') }}</label>
                    </div>
                    <div class="field-body">
                        <div class="control">
                <span class="select">
                    <select id="role" name="role" onchange="toggleSecret()">
                        <option selected disabled hidden>Valitse</option>

                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </span>
                        </div>
                    </div>
                </div>
                
                <!-- Role secret -->
                
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Avain</label>
                    </div>
                    <div class="field-body">
                        <div class="control">
                            <input type="password" id="secret" class="input" name="secret" disabled>
                        </div>
                    </div>
                </div>
                
                <!-- Group  -->
                
                <div class="field is-horizontal">
                    <div class="field-label">
                        <label class="label is-normal">Luokka</label>
                    </div>
                    <div class="field-body">
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
                </div>
                
                <!-- Submit button -->
                
                <div class="field is-horizontal">
                    <div class="field-label">
                    
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-primary">
                                    {{__('Luo käyttäjätunnus')}}
                                </button>
                            </div>
                            <div class="control">
                                <button type="button" class="button is-text" onclick="window.location.href='/'">
                                    {{__('Peruuta')}}
                                </button>
                            </div>
                        </div>
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
        </div>
    </article>
@endsection
