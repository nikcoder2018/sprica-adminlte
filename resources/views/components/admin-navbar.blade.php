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
            <ul class="navbar-nav mr-auto" style="color:black">
                <li class="nav-item">
                    <a  href="dashboard" class="nav-link">
                        <p>
                            <i class="nav-icon fas fa-tachometer-alt"></i> {{ __('Dashboard')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="kontrol" class="nav-link">
                        <p>
                        <i class="nav-icon fas fa-clock"></i> {{ __('Time Tracking') }} &nbsp;<span class="badge badge-danger ">0</span>
                        </p>
                    </a>
                </li>
                   
                <div class="dropdown">
                    <li class="nav-item" href="#">
                        <a  href="#" class="nav-link">
                           <p>
                            <i class="nav-icon fas fa-user"></i> {{ __('Wage Plan') }}
                           </p>
                       </a>
                    </li>
                    <div class="dropdown-content dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="dokum" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> {{ __('Wage Plan')}}
                        </a>
             
                        <div class="dropdown-divider"></div>
                        <a href="tumdokum" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> {{ __('Wage Plan (total)')}}
                        </a>
        
                        <div class="dropdown-divider"></div>
                        <a href="avanslar" class="dropdown-item">
                            <i class="fas fa-credit-card mr-2"></i> {{ __('Wage Advance') }}
                        </a>
                    </div>
                </div> 
   
                <div class="dropdown">
                   <li class="nav-item" href="#">
                        <a href="#" class="nav-link">
                            <p><i class="nav-icon fas fa-user"></i> {{ __('Staffs') }}</p>
                        </a>
                    </li>
                    <div class="dropdown-content dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="{{route('admin.staffs.index')}}" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> {{ __('Staffs') }}
                        </a>

                        <div class="dropdown-divider"></div>
                        <a href="psa" class="dropdown-item">
                            <i class="fas fa-credit-card mr-2"></i> {{ __('PSA Issue')}}
                        </a>
            
                        <div class="dropdown-divider"></div>
                        <a href="kontrolu" class="dropdown-item">
                            <i class="fas fa-plane-departure mr-2"></i> {{ __('Vacation Check') }} &nbsp;<span class="badge badge-danger">0</span>
                        </a>
             
                        <div class="dropdown-divider"></div>
                        <button href="#" class="dropdown-item" disabled>
                            <i class="fas fa-chalkboard-teacher mr-2"></i> {{ __('Training')}}
                        </button>
                    </div>
                </div> 
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
                                <i class="fas fa-sign-out-alt"></i> {{ __('Abmelden') }}
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