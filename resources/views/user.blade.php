@extends('layout.main')

@section('title', 'GameInfo: Profile')

@section('content')

    @if(isset($user))
        @include('template.user', $user)

        @foreach($user->articles()->get() as $article)
            @include('template.article-preview', $article)
        @endforeach

        @if($user->articles()->get()->isEmpty())
            <div class="empty d-flex align-items-center flex-column">
                <svg height="16" width="16">
                    <use xlink:href="{{ asset('storage/img/empty-placeholder.svg') }}#placeholder"></use>
                </svg>
                К сожалению, здесь пока нет ни одной публикации
            </div>
        @endif
    @else
        <div class="empty d-flex align-items-center flex-column">
            <svg height="16" width="16">
                <use xlink:href="{{ asset('storage/img/empty-placeholder.svg') }}#placeholder"></use>
            </svg>
            К сожалению, такого пользователя нет
        </div>
    @endif


@endsection
