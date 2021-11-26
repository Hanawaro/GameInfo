<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <title>@yield('title')</title>

</head>
<body>

<nav class="navbar navbar-dark py-0 border-bottom">
    <div class="container d-flex align-content-between dropdown"  id="dropdownMenuButton" >
        <a class="navbar-brand logo" href="#">GameInfo</a>

        <div class="d-flex align-items-center ">
            <a href="#">
                <svg height="24" width="24">
                    <title>Поиск</title>
                    <use xlink:href="{{ asset('storage/img/icons.svg') }}#search"></use>
                </svg>
            </a>

{{--            guest --}}
            <a href="#">
                <svg height="24" width="24">
                    <title>Поиск</title>
                    <use xlink:href="{{ asset('storage/img/icons.svg') }}#header-user"></use>
                </svg>
            </a>


{{--            auth --}}
            <a href="#">
                <svg height="24" width="24">
                    <title>Поиск</title>
                    <use xlink:href="{{ asset('storage/img/icons.svg') }}#write"></use>
                </svg>
            </a>

            <button class="btn px-0 py-0" type="button" data-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('storage/img/user.svg') }}" alt="Профиль" title="Профиль">
            </button>

            <div class="dropdown-menu shadow mt-2" aria-labelledby="dropdownMenuButton" data-spy="scroll" data-offset="0">

                <div class="profile-start-section d-flex align-items-center">
                    <a href="#"><img src="{{ asset('storage/img/user.svg') }}" alt="Профиль" title="Профиль"></a>
                    <a href="#">@profile-index</a>
                </div>

                <div class="dropdown-divider"></div>


                <a class="dropdown-item" href="#">Статьи</a>
                <a class="dropdown-item" href="#">Комментарии</a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#">Правила сайта</a>

                <div class="dropdown-divider"></div>


                <div class="profile-end-section">
                    <a class="dropdown-item" href="#">
                        <svg height="24" width="24" class="mr-2">
                            <title>Поиск</title>
                            <use xlink:href="{{ asset('storage/img/icons.svg') }}#settings"></use>
                        </svg>
                        <span>Настройки</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg height="24" width="24" class="mr-2">
                            <title>Поиск</title>
                            <use xlink:href="{{ asset('storage/img/icons.svg') }}#logout"></use>
                        </svg>
                        <span>Выход</span>
                    </a>
                </div>
            </div>

        </div>

    </div>

</nav>

<main class="d-flex align-content-center" style="min-height: 100vh">
    <div class="container">
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
                    <title>Поиск</title>
                    <use xlink:href="{{ asset('storage/img/logos.svg') }}#social-logo-facebook"></use>
                </svg>
            </a>
            <a class="" href="#">
                <svg height="24" width="24" class="mx-2">
                    <title>Поиск</title>
                    <use xlink:href="{{ asset('storage/img/logos.svg') }}#social-logo-telegram"></use>
                </svg>
            </a>
            <a class="" href="#">
                <svg height="24" width="24" class="mx-2">
                    <title>Поиск</title>
                    <use xlink:href="{{ asset('storage/img/logos.svg') }}#social-logo-twitter"></use>
                </svg>
            </a>
            <a class="" href="#">
                <svg height="24" width="24" class="mx-2">
                    <title>Поиск</title>
                    <use xlink:href="{{ asset('storage/img/logos.svg') }}#social-logo-vkontakte"></use>
                </svg>
            </a>
            <a class="" href="#">
                <svg height="24" width="24" class="mx-2">
                    <title>Поиск</title>
                    <use xlink:href="{{ asset('storage/img/logos.svg') }}#social-logo-youtube"></use>
                </svg>
            </a>
        </div>
        <div class="col-md d-flex justify-content-md-start justify-content-center">© 2021–2022 «GameInfo»</div>
    </div>
</footer>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
