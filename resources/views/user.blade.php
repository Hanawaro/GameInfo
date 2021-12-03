@extends('layout.main')

@section('title', 'GameInfo: Profile')

@section('content')

    @include('template.user')

    {{--@include('template.article')--}}
    {{--@include('template.article')--}}

    <div class="empty d-flex align-items-center flex-column">
        <svg height="16" width="16">
            <use xlink:href="{{ asset('storage/img/empty-placeholder.svg') }}#placeholder"></use>
        </svg>
        К сожалению, здесь пока нет ни одной публикации
    </div>

@endsection
