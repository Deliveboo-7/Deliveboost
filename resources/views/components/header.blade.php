<header>

    <nav class=" navbar p-0 navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand p-3" href="{{ url('/') }}">
                {{-- {{ config('app.name', 'Laravel') }} --}}
                <img src="{{ asset('storage/icons/logo.svg') }}" alt="logo" height="30px" width="30px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <img src="{{ asset('storage/icons/burger-menu.svg') }}" alt="logo" height="30px" width="30px">
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto text-gold">
                    <!-- Authentication Links -->
                    @guest
                        <li class="">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-right pr-3 border-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user() -> company_name }}
                            </a>

                            <div class="dropdown-menu p-0 m-0 dropdown-menu-right text-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item my-2 border-left-0 border-right-0" href="{{ route('dashboard') }}">Dashboard</a>
                                <a class="dropdown-item my-2 border-left-0 border-right-0" href="{{ route('dishes-index') }}">Dishes</a>
                                <a class="dropdown-item my-2 border-left-0 border-right-0" href="{{ route('orders-index') }}">Orders</a>
                                <a class="dropdown-item my-2 border-left-0 border-right-0" href="{{ route('statistics-index') }}">Stats</a>

                                <a class="dropdown-item border-left-0 border-right-0" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
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

</header>
