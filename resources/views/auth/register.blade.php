@extends('layouts.login')

@section('title','Inscription')
@section('content')

<div class="row justify-content-md-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <h4 class="card-header">Inscription</h4>
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <input type="hidden" class="form-control {{ $errors->has('user_type_id') ? ' is-invalid' : '' }}" name="user_type_id" id="user_type_id" value="2">
                        
                        @if ($errors->has('user_type_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('user_type_id') }}
                            </div>
                        @endif
                    
                    </div>

                    <div class="form-group">
                        <label for="lastname">Nom de famille</label>
                        <input type="text" class="form-control {{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" id="lastname" value="{{ old('lastname') }}">
                        
                        @if ($errors->has('lastname'))
                            <div class="invalid-feedback">
                                {{ $errors->first('lastname') }}
                            </div>
                        @endif
                    
                    </div>

                    <div class="form-group">
                        <label for="firstname">Prénom</label>
                        <input type="text" class="form-control {{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" id="firstname" value="{{ old('firstname') }}">
                        
                        @if ($errors->has('firstname'))
                            <div class="invalid-feedback">
                                {{ $errors->first('firstname') }}
                            </div>
                        @endif
                    
                    </div>

                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" value="{{ old('email') }}">
                        
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" value="{{ old('password') }}">
                        
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    
                    </div>

                    <div class="form-group">
                        <label for="password-confirmation">Confirmation</label>
                        <input type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" id="password-confirmation" value="{{ old('password_confirmation') }}">
                        
                        @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                    
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            S'inscrire
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
