<nav class="main-header navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="{{asset('/img/logo.jpg')}}" alt="Sprica"  class="brand-image" style="opacity: .8"> 
            <span class="brand-text font-weight-light"></span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ route('times') }}" class="nav-link"><i class="nav-icon fas fa-clock"></i> {{ __('Times') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('vacations') }}" class="nav-link"><i class="nav-icon fas fa-plane"></i> {{ __('Vacation times (Beta)') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('wages') }}" class="nav-link"><i class="nav-icon fas fa-credit-card"></i> {{ __('Wage Advance') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('psa') }}" class="nav-link"><i class="nav-icon fas fa-tools"></i> {{ __('PSA') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i> {{ __('Dashboard') }}</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @if(count(config('app.languages')) > 1)
                    <li class="nav-item dropdown d-md-down-none">
                        <a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true">
                            {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @foreach(config('app.languages') as $langLocale => $langName)
                                <a href="{{url()->current()}}?change_language={{$langLocale}}" class="dropdown-item">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                            @endforeach
                        </div>
                    </li>
                @endif
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span style="font-size: medium" class="badge badge-primary">{{ Auth::user()->name }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <div class="card-body" style="width: 13rem;">
                                <h5 class="card-title">Temp Full Name</h5>
                                <p style="color:grey" class="card-text">Temp Role</p>
                            </div>

                            <div class="dropdown-divider"></div>
                            <a class="text-center dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>