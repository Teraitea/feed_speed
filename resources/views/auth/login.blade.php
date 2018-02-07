@extends('layouts.login')

@section('title','Connexion')
@section('content')

<div class="row justify-content-md-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <h4 class="card-header">Connexion</h4>
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}

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
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Se connecter
                            </button>

                            <a class="btn btn-link text-right" href="{{ url('/password/reset') }}">Mot de passe oublié?</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
