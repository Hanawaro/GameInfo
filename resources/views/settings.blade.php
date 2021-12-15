@extends('layout.main')

@section('title', 'GameInfo: Settings')
@section('link-css', asset('css/settings.css'))

@section('content')

    <section id="photo">
        <div class="header collapsed d-flex justify-content-between" id="photoHeader" data-toggle="collapse"
             data-target="#photoCollapse" aria-expanded="true"
             aria-controls="photoCollapse">
            <div class="photo">
                <svg width="32" height="32">
                    <use xlink:href="{{ asset('storage/img/icons.svg') }}#placeholder-user"></use>
                </svg>
                Сменить фото
            </div>
            <svg height="26" width="26">
                <use xlink:href="{{ asset('storage/img/icons-sprite.svg') }}#drop-arrow"></use>
            </svg>
        </div>

        <div id="photoCollapse" class="menu collapse @if($errors->has('file') || $errors->has('file_password')) show @endif" aria-labelledby="photoHeader" data-parent="#photo">
            <form class="content" method="POST" action="{{ route('user.change_photo') }}" enctype="multipart/form-data">
                @csrf()

                <div class="custom-file @error('file') is-invalid @enderror">
                    <label class="custom-file-label">
                        Выберите фото...
                        <input name="file" type="file" class="custom-file-input" aria-describedby="fileFeedback">
                    </label>
                </div>
                @error('file')
                    <div id="fileFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group">
                    <label>
                        <span>Пароль для подтверждения</span>
                        <input name="file_password" type="password" class="form-control @error('file_password') is-invalid @enderror" aria-describedby="passwordFeedback"
                               required>
                        @error('file_password')
                        <span id="passwordFeedback" class="invalid-feedback">
                        {{ $message }}
                        </span>
                        @enderror
                    </label>
                </div>
                <button name="login" type="submit" class="btn btn-primary">Cохранить</button>
            </form>
        </div>
    </section>

    <section id="mail">
        <div class="header collapsed d-flex justify-content-between" id="mailHeader" data-toggle="collapse"
             data-target="#mailCollapse" aria-expanded="true"
             aria-controls="mailCollapse">
            <div class="mail">
                <svg width="32" height="32">
                    <use xlink:href="{{ asset('storage/img/icons-sprite.svg') }}#mail"></use>
                </svg>
                Изменить email
            </div>
            <svg height="26" width="26">
                <use xlink:href="{{ asset('storage/img/icons-sprite.svg') }}#drop-arrow"></use>
            </svg>
        </div>

        <div id="mailCollapse" class="menu collapse @if($errors->has('email') || $errors->has('email_password')) show @endif" aria-labelledby="mailHeader" data-parent="#mail">
            <form class="content" method="POST" action="{{ route('user.change_email') }}">
                @csrf()
                <div class="form-group">
                    <label>
                        <span>Текущий e-mail</span>
                        <input type="email" class="form-control" value="{{ \Illuminate\Support\Facades\Auth::user()->email}}" readonly>
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <span>Новый e-mail</span>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               aria-describedby="emailFeedback" required>
                        @error('email')
                        <span id="emailFeedback" class="invalid-feedback">
                        {{ $message }}
                        </span>
                        @enderror
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <span>Пароль для подтверждения</span>
                        <input name="email_password" type="password" class="form-control @error('email_password') is-invalid @enderror" aria-describedby="passwordFeedback"
                               required>
                        @error('email_password')
                        <span id="passwordFeedback" class="invalid-feedback">
                        {{ $message }}
                        </span>
                        @enderror
                    </label>
                </div>
                <button name="login" type="submit" class="btn btn-primary">Cохранить</button>
            </form>
        </div>
    </section>

    <section id="password">
        <div class="header collapsed d-flex justify-content-between" id="passwordHeader" data-toggle="collapse"
             data-target="#passwordCollapse" aria-expanded="true"
             aria-controls="passwordCollapse">
            <div class="password">
                <svg width="32" height="32">
                    <use xlink:href="{{ asset('storage/img/icons-sprite.svg') }}#lock"></use>
                </svg>
                Сменить пароль
            </div>
            <svg height="26" width="26">
                <use xlink:href="{{ asset('storage/img/icons-sprite.svg') }}#drop-arrow"></use>
            </svg>
        </div>

        <div id="passwordCollapse" class="menu collapse @if($errors->has('old_password') || $errors->has('new_password')) show @endif" aria-labelledby="passwordHeader" data-parent="#password">
            <form class="content" method="POST" action="{{ route('user.change_password') }}">
                @csrf()
                <div class="form-group">
                    <label>
                        <span>Текуший пароль</span>
                        <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror"
                               aria-describedby="oldPasswordFeedback" required>
                        @error('old_password')
                        <span id="oldPasswordFeedback" class="invalid-feedback">
                        {{ $message }}
                        </span>
                        @enderror
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <span>Новый пароль</span>
                        <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror"
                               aria-describedby="newPasswordFeedback" required>
                        @error('new_password')
                        <span id="newPasswordFeedback" class="invalid-feedback">
                        {{ $message }}
                        </span>
                        @enderror
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <span>Новый пароль ещё раз</span>
                        <input name="new_password_confirmation" type="password" class="form-control @error('new_password') is-invalid @enderror"
                               aria-describedby="repasswordFeedback" required>
                        @error('new_password_confirmation')
                        <span id="repasswordFeedback" class="invalid-feedback">
                        {{ $message }}
                        </span>
                        @enderror
                    </label>
                </div>
                <button name="login" type="submit" class="btn btn-primary">Cохранить</button>
            </form>
        </div>
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
