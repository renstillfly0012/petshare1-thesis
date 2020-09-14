<style>
    #Navbar {
        background: #17321E;
    }

    #nav-link {
        color: #FDC370;
    }

</style>


<nav class="navbar navbar-expand-md navbar-light" id="Navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}" id="nav-link">
            {{ config('PetShare', 'PetShare') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="{{ route('login') }}">{{ __('About Us') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="{{ route('login') }}">{{ __('Contact Us') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="{{ route('adopt1') }}">{{ __('Adopt') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" id="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" style="text-decoration: underline;"
                            href="{{ route('login') }}">{{ __('Donate') }}</a>
                    </li>

                @else

                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="{{ route('login') }}">{{ __('About Us') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="{{ route('login') }}">{{ __('Contact Us') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="{{ route('adopt1') }}">{{ __('Adopt') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="nav-link"
                            style="text-decoration: underline; 
                                                                                                                                background-color: rgba(0, 0, 0, .1);"
                            href="{{ route('login') }}">{{ __('Donate') }}</a>
                    </li>


                    <li class="nav-item dropdown">


                        <a id=" navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:#fdc370;">
                            <img src="{{ asset('assets/images/pspcalogo.png') }}" alt="" id="card_logo"
                                class="rounded-circle img-responsive float-right" height="33px;" width="33px;">

                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="">
                                {{ __('View Profile') }}
                            </a>
                            <a class="dropdown-item" href="">
                                {{ __('Edit Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
