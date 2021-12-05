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

        <div id="photoCollapse" class="menu collapse" aria-labelledby="photoHeader" data-parent="#photo">
            <form class="content" method="POST" action="/">
                @csrf()

                <div class="custom-file is-invalid">
                    <label class="custom-file-label">
                        Выберите фото...
                        <input type="file" class="custom-file-input" aria-describedby="fileFeedback">
                    </label>
                </div>
                <div id="fileFeedback" class="invalid-feedback">
                    Error
                </div>

                <div class="form-group">
                    <label>
                        <span>Пароль для подтверждения</span>
                        <input name="password" type="password" class="form-control" aria-describedby="passwordFeedback"
                               required>
                        <span id="passwordFeedback" class="invalid-feedback">
                        Error
                        </span>
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

        <div id="mailCollapse" class="menu collapse" aria-labelledby="mailHeader" data-parent="#mail">
            <form class="content" method="POST" action="/">
                @csrf()
                <div class="form-group">
                    <label>
                        <span>Текущий e-mail</span>
                        <input type="email" class="form-control" value="hanawaro3@gmail.com" readonly>
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <span>Новый e-mail</span>
                        <input name="email" type="email" class="form-control is-invalid"
                               aria-describedby="emailFeedback" required>
                        <span id="emailFeedback" class="invalid-feedback">
                        Error
                        </span>
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <span>Пароль для подтверждения</span>
                        <input name="password" type="password" class="form-control" aria-describedby="passwordFeedback"
                               required>
                        <span id="passwordFeedback" class="invalid-feedback">
                        Error
                        </span>
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

        <div id="passwordCollapse" class="menu collapse" aria-labelledby="passwordHeader" data-parent="#password">
            <form class="content" method="POST" action="/">
                @csrf()
                <div class="form-group">
                    <label>
                        <span>Текуший пароль</span>
                        <input name="old-password" type="password" class="form-control is-invalid"
                               aria-describedby="oldPasswordFeedback" required>
                        <span id="oldPasswordFeedback" class="invalid-feedback">
                        Error
                    </span>
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <span>Новый пароль</span>
                        <input name="new-password" type="password" class="form-control"
                               aria-describedby="newPasswordFeedback" required>
                        <span id="newPasswordFeedback" class="invalid-feedback">
                        Error
                    </span>
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <span>Новый пароль ещё раз</span>
                        <input name="re-password" type="password" class="form-control"
                               aria-describedby="repasswordFeedback" required>
                        <span id="repasswordFeedback" class="invalid-feedback">
                        Error
                    </span>
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
