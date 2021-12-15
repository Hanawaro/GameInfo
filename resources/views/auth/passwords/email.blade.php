@extends('layout.main')

@section('title', 'GameInfo: Email')
@section('link-css', asset('css/auth.css'))

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <section class="main">
        <form class="d-flex flex-column" method="POST" action="{{ route('password.email') }}">
            @csrf()

            <h3>Забыли пароль?</h3>
            <div class="form-group">
                <label>
                    <span>E-mail</span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </section>

@endsection
