@extends('layout.main')

@section('title', 'GameInfo: Register')
@section('link-css', asset('css/auth.css'))

@section('content')

    <section class="main">
        <form class="d-flex flex-column" method="POST" action="/">
            @csrf()

            <h3>Регистрация</h3>

            <div class="form-group">
                <label>
                    <span>E-mail</span>
                    <input name="email" type="email" class="form-control is-invalid" aria-describedby="emailFeedback"
                           required>
                    <span id="emailFeedback" class="invalid-feedback">
                        Error
                    </span>
                </label>

            </div>

            <div class="form-group">
                <label>
                    <span>Никнейм</span>
                    <input name="nickname" type="text" class="form-control" aria-describedby="nicknameFeedback"
                           required>
                    <span id="nicknameFeedback" class="invalid-feedback">
                        Error
                    </span>
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Пароль</span>
                    <input name="password" type="password" class="form-control" aria-describedby="passwordFeedback"
                           required>
                    <span id="passwordFeedback" class="invalid-feedback">
                        Error
                    </span>
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Пароль ещё раз</span>
                    <input name="re-password" type="password" class="form-control"
                           aria-describedby="repeatPasswordFeedback" required>
                    <span id="repeatPasswordFeedback" class="invalid-feedback">
                        Error
                    </span>
                </label>
            </div>

            <button name="register" type="submit" class="btn btn-primary">Зарегестрироваться</button>
        </form>
    </section>

    <section class="remember d-flex justify-content-center">
        <span>
            Уже зарегистрированы?
            <a href="{{ route('login') }}">Войдите</a>
        </span>
    </section>

    <div class="messenger container-sm">
        <div class="alert alert-success" role="alert">
            Success
        </div>
        <div class="alert alert-danger" role="alert">
            Error
        </div>
    </div>

@endsection
