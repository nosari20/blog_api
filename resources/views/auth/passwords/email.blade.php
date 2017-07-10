
@section('title','Changement de mot de passe')
@section('content')


<form class="form-horizontal login" role="form" method="POST" action="{{ url('/password/email') }}">
    {{ csrf_field() }}

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? ' is-invalid' : '' }}">
        <input class="mdl-textfield__input" id="email" type="email" name="email" value="{{ old('email') }}" required>
        <label class="mdl-textfield__label" for="email">Adresse E-Mail</label>
        @if ($errors->has('email'))
            <span class="mdl-textfield__error">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-input">
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
            Envoyer un E-mail de changement
        </button>
    </div>

</form>

@if (session('status'))
    <span>{{ session('status') }}</span>
@endif

@endsection