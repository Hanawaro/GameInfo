@extends('layout.main')

@section('title', 'GameInfo: Home')
@section('link-js', asset('js/main.js'))

@section('content')

    @if(isset($article))
        @include('template.article-content', compact($article, $liked))
    @else
        <div class="empty d-flex align-items-center flex-column">
            <svg height="16" width="16">
                <use xlink:href="{{ asset('storage/img/empty-placeholder.svg') }}#placeholder"></use>
            </svg>
            К сожалению, такой публикации нет
        </div>
    @endif

@endsection
