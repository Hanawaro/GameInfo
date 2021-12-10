<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @hasSection('link-css')
        <link rel="stylesheet" href="@yield('link-css')">
    @endif

    <title>@yield('title')</title>

    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>

<nav class="navbar navbar-dark py-0 border-bottom">
    <div class="container d-flex align-content-between dropdown" id="dropdownMenuButton">
        <a class="navbar-brand logo" href="{{ route('article.all') }}">GameInfo</a>

        <div class="d-flex align-items-center ">
            <a href="{{ route('search') }}">
                <svg height="24" width="24">
                    <title>Поиск</title>
                    <use xlink:href="{{ asset('storage/img/icons.svg') }}#search"></use>
                </svg>
            </a>

            @guest()
                <a href="{{ route('login') }}">
                    <svg height="24" width="24">
                        <title>Авторизоваться</title>
                        <use xlink:href="{{ asset('storage/img/icons.svg') }}#header-user"></use>
                    </svg>
                </a>
            @endguest


            @auth()
                @can('editor', \Illuminate\Support\Facades\Auth::user())
                    <a href="{{ route('editor.create') }}">
                        <svg height="24" width="24">
                            <title>Написать публикацию</title>
                            <use xlink:href="{{ asset('storage/img/icons.svg') }}#write"></use>
                        </svg>
                    </a>
                @endcan

                <button class="btn px-0 py-0" type="button" data-toggle="dropdown" aria-expanded="false">
                    <svg class="default" height="24" width="24">
                        <title>Профиль</title>
                        <use xlink:href="{{ asset('storage/img/icons.svg') }}#placeholder-user"></use>
                    </svg>
                </button>

                <div class="dropdown-menu shadow mt-2" aria-labelledby="dropdownMenuButton" data-spy="scroll"
                     data-offset="0">

                    <div class="profile-start-section d-flex align-items-center">
                    <span>
{{--                        <img src="{{ asset('storage/img/user.svg') }}" alt="Профиль" title="Профиль">--}}
                        <svg class="default" height="24" width="24">
                            <title>Профиль</title>
                            <use xlink:href="{{ asset('storage/img/icons.svg') }}#placeholder-user"></use>
                        </svg>
                    </span>
                        <span href="#">{{ '@' . \Illuminate\Support\Facades\Auth::user()->name }}</span>
                    </div>

                    <div class="dropdown-divider"></div>


                    <a class="dropdown-item" href="{{ route('user.get', \Illuminate\Support\Facades\Auth::user()->name) }}">Профиль</a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#">Правила сайта</a>

                    <div class="dropdown-divider"></div>


                    <div class="profile-end-section">
                        <a class="dropdown-item" href="{{ route('settings') }}">
                            <svg height="24" width="24" class="mr-2">
                                <title>Настройка</title>
                                <use xlink:href="{{ asset('storage/img/icons.svg') }}#settings"></use>
                            </svg>
                            <span>Настройки</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item">
                                <svg height="24" width="24" class="mr-2">
                                    <title>Выйти</title>
                                    <use xlink:href="{{ asset('storage/img/icons.svg') }}#logout"></use>
                                </svg>
                                <span>Выход</span>
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

        </div>

    </div>

</nav>

<main class="d-flex align-content-center pt-2 pb-5" style="min-height: 95vh">
    <div class="container-lg">
        @yield('content')
    </div>
</main>


<footer class="bg-dark text-white">
    <div class="container d-flex align-content-between flex-row-reverse flex-wrap">
        <div class="col-md d-flex d-md-none justify-content-center">
            <a href="#" class="logo">GameInfo</a>
        </div>
        <div class="col-md d-flex justify-content-md-end justify-content-center">
            <a class="" href="#">
                <svg height="24" width="24" class="mx-2">
                    <title>Фейсбук</title>
                    <use xlink:href="{{ asset('storage/img/logos.svg') }}#social-logo-facebook"></use>
                </svg>
            </a>
            <a class="" href="#">
                <svg height="24" width="24" class="mx-2">
                    <title>Телеграм</title>
                    <use xlink:href="{{ asset('storage/img/logos.svg') }}#social-logo-telegram"></use>
                </svg>
            </a>
            <a class="" href="#">
                <svg height="24" width="24" class="mx-2">
                    <title>Твиттер</title>
                    <use xlink:href="{{ asset('storage/img/logos.svg') }}#social-logo-twitter"></use>
                </svg>
            </a>
            <a class="" href="#">
                <svg height="24" width="24" class="mx-2">
                    <title>Вконтакте</title>
                    <use xlink:href="{{ asset('storage/img/logos.svg') }}#social-logo-vkontakte"></use>
                </svg>
            </a>
            <a class="" href="#">
                <svg height="24" width="24" class="mx-2">
                    <title>Ютуб</title>
                    <use xlink:href="{{ asset('storage/img/logos.svg') }}#social-logo-youtube"></use>
                </svg>
            </a>
        </div>
        <div class="col-md d-flex justify-content-md-start justify-content-center">© 2021–2022 «GameInfo»</div>
    </div>
</footer>

@hasSection('link-js')
    <script src="@yield('link-js')"></script>
@endif

</body>
</html>
