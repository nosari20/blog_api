@extends('layouts.material_empty')

@section('body')
<div class="auth">
    <div class=" auth-center">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">@yield('title')</h2>
            </div>
            <div class="mdl-card__supporting-text">
                @yield('content')
            </div>
        </div>
    </div>
</div>


@endsection