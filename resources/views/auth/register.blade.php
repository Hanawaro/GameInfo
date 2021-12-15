@extends('layout.main')

@section('title', 'GameInfo: Register')
@section('link-css', asset('css/auth.css'))

@section('content')

    <section class="main">
        <form class="d-flex flex-column" method="POST" action="{{ route('register') }}">
            @csrf()

            <h3>Регистрация</h3>

            <div class="form-group">
                <label>
                    <span>E-mail</span>
                    <input name="email" type="email" value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror" aria-describedby="emailFeedback"
                           required>

                    @error('email')
                    <span id="emailFeedback" class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </label>

            </div>

            <div class="form-group">
                <label>
                    <span>Никнейм</span>
                    <input name="name" type="text" value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror" aria-describedby="nicknameFeedback"
                           required>

                    @error('name')
                    <span id="nicknameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Пароль</span>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           aria-describedby="passwordFeedback"
                           required>

                    @error('password')
                    <span id="passwordFeedback" class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Пароль ещё раз</span>
                    <input name="password_confirmation" type="password" class="form-control"
                           aria-describedby="repeatPasswordFeedback" required>
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Зарегестрироваться</button>
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
