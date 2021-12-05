@extends('layout.main')

@section('title', 'GameInfo: Login')
@section('link-css', asset('css/auth.css'))

@section('content')

    <section class="main">
        <form class="d-flex flex-column" method="POST" action="/">
            @csrf()

            <h3>Восстановление пароля</h3>
            <div class="form-group">
                <label>
                    <span>E-mail</span>
                    <input name="email" type="email" class="form-control is-invalid" aria-describedby="emailFeedback" required>
                    <span id="emailFeedback" class="invalid-feedback">
                        Error
                    </span>
                </label>
            </div>
            <button name="remember" type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </section>

    <section class="remember d-flex justify-content-center">
        <span>
             <a href="{{ route('login') }}">Войти</a>
            или
            <a href="{{ route('register') }}">зарегистрироваться</a>
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
