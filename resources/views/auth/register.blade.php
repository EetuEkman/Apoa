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
                                <input id="email" class="input is-fullwidth" type="email" name="email"
                                       value="{{old('email')}}" required autocomplete="email" autofocus>
                                <span class="icon is-small is-left">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                @error('email')
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label"></label>
                        </div>
                        <div class="field-body">
                            <div class="control">
                                <span class="tag is-warning is-small" role="alert"><strong>{{ __($message) }}</strong></span>
                            </div>
                        </div>
                    </div>
                @enderror
                
                <!-- First name -->
                
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">{{__('Etunimi')}}</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control is-expanded has-icons-left">
                                <input id="firstName" type="text"
                                       class="input @error('name') is-danger @enderror" name="firstName"
                                       value="{{ old('firstName') }}" required autocomplete="firstName">
                                <span class="icon is-small is-left">
                                    <i class="fa fa-address-card"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
    
                @error('firstName')
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label"></label>
                        </div>
                        <div class="field-body">
                            <div class="control">
                                <span class="tag is-warning is-medium"><strong>{{ __($message) }}</strong></span>
                            </div>
                        </div>
                    </div>
                @enderror
                
                <!-- Last name -->
                
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">{{ __('Sukunimi') }}</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input id="lastName" class="input" type="text" name="lastName"
                                       value="{{old('lastName')}}" required autocomplete="lastName" autofocus>
                                <span class="icon is-small is-left">
                                    <i class="fa fa-address-card"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
    
                @error(('lastName'))
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label"></label>
                        </div>
                        <div class="field-body">
                            <div class="control">
                                <span class="tag is-warning is-medium" role="alert"><strong>{{ __($message) }}</strong></span>
                            </div>
                        </div>
                    </div>
                @enderror
                
                <!-- Password -->
                
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">{{ __('Salasana') }}</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input id="password" class="input" type="password"
                                       class="form-control @error('password') is-danger @enderror" name="password"
                                       required autocomplete="new-password">
                                <span class="icon is-small is-left">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
    
                @error('password')
                    <div class="field is-horizontal">
                        <div class="field-label is-small">
                            <label class="label"></label>
                        </div>
                        <div class="field-body">
                            <div class="control">
                                <span class="tag is-warning is-medium" role="alert"><strong>{{ __($message) }}</strong></span>
                            </div>
                        </div>
                    </div>
                @enderror
                
                <!-- Confirm password -->
                
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">{{ __('Salasanan varmistus')}}</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input id="password-confirm" type="password" class="form-control input"
                                       name="password_confirmation" required autocomplete="new-password">
                                <span class="icon is-small is-left">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                
    
                    <!-- Group  -->
    
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label is-normal">Ryhmätunnus</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control is-expanded">
                                    <div class="select is-fullwidth">
                                        <select id="group" name="group" required>
                                            <option selected disabled hidden>Ryhmätunnus</option>
                            
                                            @foreach($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- User role -->
    
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">{{ __('Rooli') }}</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control is-expanded">
                                <span class="select is-fullwidth">
                                    <select id="role" name="role" required onchange="toggleSecret()">
                                        <option value="2">Opiskelija</option>
                                        <option value="1">Opettaja</option>
                                        {{--
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                        --}}
                                    </select>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <!-- Role secret -->
                
                <div id="secretField" class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Avain</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input type="password" id="secret" class="input" name="secret" required disabled disabled>
                            </div>
                        </div>
                    </div>
                </div>
    
                @error(('secret'))
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label"></label>
                        </div>
                    <div class="field-body">
                        <div class="control">
                            <span class="tag is-warning is-medium"><strong>{{ __($message) }}</strong></span>
                        </div>
                    </div>
                    </div>
                @enderror
                
                
                <!-- Submit button -->
                
                <div class="field is-horizontal">
                    <div class="field-label"></div>
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
                const secret = document.getElementById('secret');
                const secretField = document.getElementById('secretField');
                
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
