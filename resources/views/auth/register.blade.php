@extends('layouts.auth')

@section('title','Inscription')
@section('content')
<form class="form-horizontal register" role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? ' is-invalid' : '' }}">
        <input class="mdl-textfield__input" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        <label class="mdl-textfield__label" for="name">Utilisateur</label>
        @if ($errors->has('name'))
            <span class="mdl-textfield__error">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? ' is-invalid' : '' }}">
        <input class="mdl-textfield__input" id="email" type="email" name="email" value="{{ old('email') }}" required>
        <label class="mdl-textfield__label" for="email">Adresse E-Mail</label>
        @if ($errors->has('email'))
            <span class="mdl-textfield__error">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password') ? ' is-invalid' : '' }}">
        <input class="mdl-textfield__input" id="password" type="password" name="password" value="{{ old('password') }}" required>
        <label class="mdl-textfield__label" for="password">Mot de passe</label>
        @if ($errors->has('password'))
            <span class="mdl-textfield__error">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}">
        <input class="mdl-textfield__input" id="password_confirmation" type="password" name="password_confirmation" required>
        <label class="mdl-textfield__label" for="password_confirmation">Confirmation du mot de passe</label>
        @if ($errors->has('password_confirmation'))
            <span class="mdl-textfield__error">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-input">
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
            Valider l'inscription
        </button>
    </div>
</form>


<script>
    
    var notification = document.querySelector('.mdl-js-snackbar');
    var data = {
        message: 'Message Sent',
        actionHandler: function(event) {},
        actionText: 'Undo',
        timeout: 10000
    };
    setTimeout(function() {
        notification.MaterialSnackbar.showSnackbar(data);
        console.log("show");
    }, 5000);
    
</script>
@endsection