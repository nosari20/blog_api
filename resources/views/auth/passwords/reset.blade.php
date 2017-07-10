@section('title','Changement de mot de passe')
@section('content')



<form class="form-horizontal login" role="form" method="POST" action="{{ url('/password/reset') }}">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

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
            Valider le changement
        </button>
    </div>

</form>

@if (session('status'))
    <span>{{ session('status') }}</span>
@endif

@endsection