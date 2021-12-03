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
                    Все подряд
                    <svg height="25" width="25" class="mx-2">
                        <title>Фильтр</title>
                        <use xlink:href="{{ asset('storage/img/icons.svg') }}#arrow-down"></use>
                    </svg>
                </a>
                <a id="copy" class="" href="#">
                    <svg height="24" width="24" class="mx-2">
                        <title>Скопировать</title>
                        <use xlink:href="{{ asset('storage/img/icons.svg') }}#rss"></use>
                    </svg>
                </a>
            </div>
            <div class="collapse" id="collapse">
                <form method="POST" action="/">
                    @csrf()

                    <div>Сначала показывать</div>

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary active" id="pills-home-tab" data-toggle="pill"
                               href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                                <label for="news">
                                    <input data-for="news" type="radio" name="global" autocomplete="off" value="news"
                                           id="news" checked> Новые
                                </label>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary" id="pills-profile-tab" data-toggle="pill"
                               href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                <label for="best">
                                    <input data-for="best" type="radio" name="global" autocomplete="off" value="best"
                                           id="best"> Лучшие
                                </label>
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane show active" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab">

                            <div>Порог рейтинга</div>

                            <label class="btn btn-outline-primary active" for="option-all">
                                <input type="radio" name="news" id="option-all" autocomplete="off" checked> Все
                            </label>
                            <label class="btn btn-outline-primary" for="option-zero">
                                <input type="radio" name="news" id="option-zero" autocomplete="off"> ≥0
                            </label>
                            <label class="btn btn-outline-primary" for="option-ten">
                                <input type="radio" name="news" id="option-ten" autocomplete="off"> ≥10
                            </label>
                            <label class="btn btn-outline-primary" for="option-twenty-five">
                                <input type="radio" name="news" id="option-twenty-five" autocomplete="off"> ≥25
                            </label>
                            <label class="btn btn-outline-primary" for="option-fifty">
                                <input type="radio" name="news" id="option-fifty" autocomplete="off"> ≥50
                            </label>
                            <label class="btn btn-outline-primary" for="option-hundred">
                                <input type="radio" name="news" id="option-hundred" autocomplete="off"> ≥100
                            </label>

                        </div>

                        <div class="tab-pane" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                            <div>Период</div>

                            <label class="btn btn-outline-primary active" for="option4">
                                <input type="radio" name="best" id="option4" autocomplete="off" checked> Сутки
                            </label>
                            <label class="btn btn-outline-primary" for="option5">
                                <input type="radio" name="best" id="option5" autocomplete="off"> Неделя
                            </label>
                            <label class="btn btn-outline-primary" for="option6">
                                <input type="radio" name="best" id="option6" autocomplete="off"> Месяц
                            </label>
                            <label class="btn btn-outline-primary" for="option7">
                                <input type="radio" name="best" id="option7" autocomplete="off"> Год
                            </label>
                            <label class="btn btn-outline-primary" for="option8">
                                <input type="radio" name="best" id="option8" autocomplete="off"> Всё время
                            </label>

                        </div>
                    </div>

                    <input class="btn btn-success" type="submit" value="Применить">

                </form>
            </div>
        </div>
    </section>

    @include('template.article')
    @include('template.article')
    @include('template.article')


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
