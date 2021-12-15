@extends('layout.main')

@section('title', 'GameInfo: Home')
@section('link-css', asset('css/home.css'))
@section('link-js', asset('js/main.js'))

@section('content')

{{--    <iframe width="560" height="315" src="https://www.youtube.com/embed/eraGr38GttU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}


    <section>
        <div class="header font-weight-bold">Все статьи</div>
        <div class="dropdown-divider"></div>
        <div class="content">
            <div class="d-flex align-items-center">
                <a class="collapse-menu collapsed" data-toggle="collapse" href="#collapse" role="button"
                   aria-expanded="false" aria-controls="collapseExample">
                    {{ $message }}
                    <svg height="25" width="25" class="mx-2">
                        <title>Фильтр</title>
                        <use xlink:href="{{ asset('storage/img/icons.svg') }}#arrow-down"></use>
                    </svg>
                </a>
                <a id="copy" class="">
                    <svg height="24" width="24" class="mx-2">
                        <title>Скопировать</title>
                        <use xlink:href="{{ asset('storage/img/icons.svg') }}#rss"></use>
                    </svg>
                </a>
            </div>
            <div class="collapse" id="collapse">
                <form method="POST" action="{{ route('article.redirect') }}">
                    @csrf()

                    <div>Сначала показывать</div>

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary @if($global === 'news') active @endif" id="pills-home-tab" data-toggle="pill"
                               href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                                <label for="news">
                                    <input data-for="news" type="radio" name="global" autocomplete="off" value="news"
                                           id="news" @if($global === 'news') checked @endif> Новые
                                </label>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary @if($global === 'best') active @endif" id="pills-profile-tab" data-toggle="pill"
                               href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                <label for="best">
                                    <input data-for="best" type="radio" name="global" autocomplete="off" value="best"
                                           id="best" @if($global === 'best') checked @endif> Лучшие
                                </label>
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane show  @if($global === 'news') active @endif" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab">

                            <div>Порог рейтинга</div>

                            <label class="btn btn-outline-primary @if($global === 'news' && $local === 'all') active @endif" for="option-all">
                                <input type="radio" name="news" id="option-all" value="all" autocomplete="off" @if($global === 'news' && $local === 'all') checked @endif> Все
                            </label>
                            <label class="btn btn-outline-primary  @if($global === 'news' && $local === '0') active @endif" for="option-zero">
                                <input type="radio" name="news" id="option-zero" value="0" autocomplete="off" @if($global === 'news' && $local === '0') checked @endif> ≥0
                            </label>
                            <label class="btn btn-outline-primary  @if($global === 'news' && $local === '10') active @endif" for="option-ten">
                                <input type="radio" name="news" id="option-ten" value="10" autocomplete="off" @if($global === 'news' && $local === '10') checked @endif> ≥10
                            </label>
                            <label class="btn btn-outline-primary  @if($global === 'news' && $local === '25') active @endif" for="option-twenty-five">
                                <input type="radio" name="news" id="option-twenty-five" value="25" autocomplete="off" @if($global === 'news' && $local === '25') checked @endif> ≥25
                            </label>
                            <label class="btn btn-outline-primary  @if($global === 'news' && $local === '50') active @endif" for="option-fifty">
                                <input type="radio" name="news" id="option-fifty" value="50" autocomplete="off" @if($global === 'news' && $local === '50') checked @endif> ≥50
                            </label>
                            <label class="btn btn-outline-primary  @if($global === 'news' && $local === '100') active @endif" for="option-hundred">
                                <input type="radio" name="news" id="option-hundred" value="100" autocomplete="off"  @if($global === 'news' && $local === '100') checked @endif> ≥100
                            </label>

                        </div>

                        <div class="tab-pane  @if($global === 'best') active @endif" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                            <div>Период</div>

                            <label class="btn btn-outline-primary @if($global === 'best' && $local === 'day') active @endif" for="day">
                                <input type="radio" name="best" id="day" value="day" autocomplete="off" @if($global === 'best' && $local === 'day') checked @endif> Сутки
                            </label>
                            <label class="btn btn-outline-primary @if($global === 'best' && $local === 'week') active @endif" for="week">
                                <input type="radio" name="best" id="week" value="week" autocomplete="off" @if($global === 'best' && $local === 'week') checked @endif> Неделя
                            </label>
                            <label class="btn btn-outline-primary @if($global === 'best' && $local === 'month') active @endif" for="month">
                                <input type="radio" name="best" id="month" value="month" autocomplete="off" @if($global === 'best' && $local === 'month') checked @endif> Месяц
                            </label>
                            <label class="btn btn-outline-primary @if($global === 'best' && $local === 'year') active @endif" for="year">
                                <input type="radio" name="best" id="year" value="year" autocomplete="off" @if($global === 'best' && $local === 'year') checked @endif> Год
                            </label>
                            <label class="btn btn-outline-primary @if($global === 'best' && $local === 'all') active @endif" for="all">
                                <input type="radio" name="best" id="all" value="all" autocomplete="off" @if($global === 'best' && $local === 'all') checked @endif> Всё время
                            </label>

                        </div>
                    </div>

                    <input class="btn btn-success" type="submit" value="Применить">

                </form>
            </div>
        </div>
    </section>

    @foreach($articles as $article)
        @include('template.article-preview', $article)
    @endforeach

    @if($articles->isEmpty())
        <div class="empty d-flex align-items-center flex-column">
            <svg height="16" width="16">
                <use xlink:href="{{ asset('storage/img/empty-placeholder.svg') }}#placeholder"></use>
            </svg>
            К сожалению, таких публикаций ещё нет
        </div>
    @endif

    <div class="messenger container-sm">
        <div class="alert alert-success" role="alert">
            Ссылка скопирована в буфер обмена
        </div>
        <div class="alert alert-danger" role="alert">
            Произошла ошибка сервера
        </div>
    </div>

    <div style="display: none">
        <label>
            <textarea id="url" rows="1" cols="30"></textarea>
        </label>
    </div>

@endsection
