@extends('layouts.material')

@section('content')

<div class="mdl-color--white mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
    <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">Message du jour</h2>
    </div>
    <div class="mdl-card__supporting-text mdl-cell--12-col">
        <form>
            
            <div class="mdl-textfield mdl-js-textfield">
                <textarea class="mdl-textfield__input" type="text" rows= "3" id="news" ></textarea>
                <label class="mdl-textfield__label" for="news">Aujourd'hui...</label>
            </div>

            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored" data-upgraded=",MaterialButton">
                <i class="material-icons">send</i>
            </button>

        </form>

    </div>
</div>
@endsection
