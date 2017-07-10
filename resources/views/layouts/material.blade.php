@extends('layouts.material_empty')

@section('body')
<div class="layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
  <header class="header mdl-layout__header">
    <div class="mdl-layout__header-row">
      <span class="mdl-layout-title">Home</span>
      <div class="mdl-layout-spacer"></div>
      <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
        <i class="material-icons">more_vert</i>
      </button>
      <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
        <li class="mdl-menu__item">Nouvel utilisateur</li>
        <li class="mdl-menu__item">API</li>
      </ul>
    </div>
  </header>
  <aside class="drawer mdl-layout__drawer">
    <header class="drawer-header">
      <span>Administrateur</span>          
    </header>
    <nav class="navigation mdl-navigation">
      <a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">home</i>Accueil</a>
      <a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">account_box</i>Général</a>
      <a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">description</i>Articles</a>
      
      <div class="mdl-layout-spacer"></div>
      <a class="mdl-navigation__link" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <i class="material-icons" role="presentation">close</i>Déconnexion
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>        
      </a>
    </nav>
  </aside>

  
  <main class="mdl-layout__content mdl-color--grey-100">
    <div class="mdl-grid content">      
      @yield('content')
    </div>
  </main>
</div>      
@endsection