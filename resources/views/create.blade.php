@extends('layout.main')

@section('title', 'GameInfo: Create')
@section('link-css', asset('css/create.css'))
@section('link-js', asset('js/create.js'))

@section('content')

    <form method="POST" enctype="multipart/form-data">

    <section class="preview">
        <div class="header">
            Превью
        </div>
        <div class="editor">
            <div class="statement header-5 preview-header" data-element="preview-header">
                <div class="add btn-group dropright">
                    <button type="button" class="btn px-0 py-0 d-inline-flex justify-content-center align-items-center" data-toggle="dropdown" aria-expanded="false">
                        <svg height="24" width="24" class="svg-icon">
                            <circle cx="8.5" cy="6.5" r="1.5"></circle>
                            <circle cx="8.5" cy="12.5" r="1.5"></circle>
                            <circle cx="8.5" cy="18.5" r="1.5"></circle>
                            <circle cx="14.5" cy="6.5" r="1.5"></circle>
                            <circle cx="14.5" cy="12.5" r="1.5"></circle>
                            <circle cx="14.5" cy="18.5" r="1.5"></circle>
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item paragraph">Параграф</a>
                        <a class="dropdown-item header-3">Заголовок 1</a>
                        <a class="dropdown-item header-5">Заголовок 2</a>
                        <a class="dropdown-item img">Изображение</a>
                        <a class="dropdown-item video">Видео</a>
                    </div>
                </div>

                <h5 class="content" contenteditable="true" data-placeholder="Заголовок"></h5>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="header">
            Публикация
        </div>
        <div class="editor">
            <div class="statement header-5 content-header" data-element="content-header">
                <div class="btn-group dropright">
                    <button type="button" class="add btn px-0 py-0 d-inline-flex justify-content-center align-items-center" data-toggle="dropdown" aria-expanded="false">
                        <svg height="24" width="24" class="svg-icon">
                            <circle cx="8.5" cy="6.5" r="1.5"></circle>
                            <circle cx="8.5" cy="12.5" r="1.5"></circle>
                            <circle cx="8.5" cy="18.5" r="1.5"></circle>
                            <circle cx="14.5" cy="6.5" r="1.5"></circle>
                            <circle cx="14.5" cy="12.5" r="1.5"></circle>
                            <circle cx="14.5" cy="18.5" r="1.5"></circle>
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item paragraph">Параграф</a>
                        <a class="dropdown-item header-3">Заголовок 1</a>
                        <a class="dropdown-item header-5">Заголовок 2</a>
                        <a class="dropdown-item img">Изображение</a>
                        <a class="dropdown-item video">Видео</a>
                    </div>
                </div>

                <h3 class="content" contenteditable="true" data-placeholder="Заголовок"></h3>
            </div>
        </div>

        <button type="button" class="publish btn btn-outline-primary" onclick="send('{{ route('editor.send') }}', '{{ route('user.get', \Illuminate\Support\Facades\Auth::user()->name) }}')">Готово к публикации</button>
    </section>

    </form>

    <div class="messenger container-sm">
        <div class="alert alert-success" role="alert">
            Success
        </div>
        <div class="alert alert-danger" role="alert">
            Error
        </div>
    </div>

    <script>


    </script>

@endsection
