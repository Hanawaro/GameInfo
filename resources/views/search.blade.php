@extends('layout.main')

@section('title', 'GameInfo: Search')
@section('link-css', asset('css/search.css'))
@section('link-js', asset('js/main.js'))

@section('content')

    <section>
        <form class="input-group mb-3" method="GET" action="{{ route('search') }}">

            <div class="search">
                <input type="text" name="by" class="form-control" placeholder="Поиск" value="{{ $query }}">
                <div class="input-group-append">
                    <button class="btn" type="submit">
                        <svg height="20" width="20">
                            <title>Поиск</title>
                            <use xlink:href="{{ asset('storage/img/icons.svg') }}#search"></use>
                        </svg>
                    </button>
                </div>
            </div>

            <nav class="type">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                        Публикации
                    </a>
                    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                        Пользователи
                    </a>
                </div>
            </nav>
        </form>

    </section>

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

            @foreach($articles as $article)
                @include('template.article', $article)
            @endforeach

            @if($articles->isEmpty())
            <div class="empty d-flex align-items-center flex-column">
                <svg height="16" width="16">
                    <use xlink:href="{{ asset('storage/img/empty-placeholder.svg') }}#placeholder"></use>
                </svg>
                К сожалению, такой публикации нет
            </div>
            @endif
        </div>
        <div class="tab-pane" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

            @foreach($users as $user)
                @include('template.user')
            @endforeach

            @if($users->isEmpty())
            <div class="empty d-flex align-items-center flex-column">
                <svg height="16" width="16">
                    <use xlink:href="{{ asset('storage/img/empty-placeholder.svg') }}#placeholder"></use>
                </svg>
                К сожалению, такого пользователя нет
            </div>
            @endif
        </div>
    </div>

@endsection
