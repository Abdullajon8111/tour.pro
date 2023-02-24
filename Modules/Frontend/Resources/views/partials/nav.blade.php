<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href="{{ route('frontend.page.index') }}">
            <img src="{{ asset('images/logo2.png') }}" alt="logo" height="100">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link font-weight-bold" href="{{ route('frontend.page.index') }}">{{ __('Главная') }} </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        {{ Str::upper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('language.locale', 'uz') }}">UZ</a>
                        <a class="dropdown-item" href="{{ route('language.locale', 'ru') }}">RU</a>
                    </div>
                </li>

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            {{ __('Регистрация') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('register.tourist') }}">{{ __('турист') }}</a>
                            <a class="dropdown-item" href="{{ route('register.agent') }}">{{ __('турагент') }}</a>
                        </div>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.page.favorites') }}">
                            <i class="la la-heart-o"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @hasanyrole(\App\Models\Role::ADMIN . '|' . \App\Models\Role::AGENT)
                                <a class="dropdown-item" href="{{ route('backpack.dashboard') }}">
                                    {{ __('панель управления') }}
                                </a>
                            @endif

                            <form action="{{ route('auth.logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">{{ __('выйти') }}</button>
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>

        </div>
    </div>

</nav>
