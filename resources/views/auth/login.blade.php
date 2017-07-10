@extends('layouts.auth')
@section('title','Connexion')
@section('content')


<form class="form-horizontal login" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        <label class="mdl-textfield__label" for="name">Utilisateur</label>
        @if ($errors->has('name'))
            <span class="mdl-textfield__error">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" id="password" type="password" name="password" value="{{ old('password') }}">
        <label class="mdl-textfield__label" for="password">Mot de passe</label>
        @if ($errors->has('password'))
            <span class="mdl-textfield__error">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    
    

    <div class="form-input">
        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="remember">
            <input type="checkbox" id="remember" name="remember" class="mdl-switch__input">
            <span class="mdl-switch__label">Se souvenir de moi</span>
        </label>
    </div>

    
    <div class="form-input">
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
            Connexion
        </button>
    </div>

    <a class="btn btn-link" href="{{ url('/password/reset') }}">Mot de passe oublié</a>
</form>

@endsection