<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand py-2 px-4" href="index.html">Muscle</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{(Route::currentRouteName() == 'client.')?'active':''}}"><a href="/client" class="nav-link">Головна</a></li>
                <li class="nav-item {{(Route::currentRouteName() == 'client.program')?'active':''}}"><a href="/client/program" class="nav-link">Програми</a></li>
                <li class="nav-item {{(Route::currentRouteName() == 'client.coaches')?'active':''}}"><a href="/client/coaches" class="nav-link">Тренери</a></li>
                <li class="nav-item {{(Route::currentRouteName() == 'client.schedule')?'active':''}}"><a href="/client/schedule" class="nav-link">Розклад</a></li>
                <li class="nav-item {{(Route::currentRouteName() == 'client.order')?'active':''}}"><a href="/client/order" class="nav-link">Замовити</a></li>
                <li class="nav-item {{(Route::currentRouteName() == 'client.contacts')?'active':''}}"><a href="/client/contacts" class="nav-link">Контакти</a></li>
            </ul>
            <div class="position-relative">
                <button id="navbarDropdown" class="nav-link btn-logout dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-left position-absolute" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                        Виxiд
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
<style>
   .btn-logout{
       background: transparent;
       border: none;
       outline: none!important;
       text-transform: uppercase;
       color: #ffffff;
   }
</style>
