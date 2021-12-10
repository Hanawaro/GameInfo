<div class="user d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
        <a href="{{ route('user.get', $user->name) }}">
            {{--                    <img src="" alt="">--}}
            <svg class="default" height="24" width="24">
                <title>Профиль</title>
                <use xlink:href="{{ asset('storage/img/icons.svg') }}#placeholder-user"></use>
            </svg>
        </a>
        <div class="d-flex flex-column">
            <a href="{{ route('user.get', $user->name) }}">{{ '@' . $user->name }}</a>
            <div>
                @switch($user->role())
                    @case('admin')
                    Администратор
                    @break
                    @case('editor')
                    Редактор
                    @break
                    @case('user')
                    Пользователь
                    @break
                @endswitch
            </div>
        </div>
    </div>
    <div>
        @can('admin', \Illuminate\Support\Facades\Auth::user())
            @switch($user->role())
                @case('editor')
                <form action="{{ route('role.user', $user->id) }}" method="POST">
                    @csrf
                    <label class="btn btn-outline-danger">
                        <input type="submit" name="make-danger"/>
                        Запретить редакторство
                    </label>
                </form>
                @break
                @case('user')
                <form action="{{ route('role.editor', $user->id) }}" method="POST">
                    @csrf
                    <label class="btn btn-outline-success">
                        <input type="submit"/>
                        Сделать редактором
                    </label>
                </form>
                @break
            @endswitch

        @endcan
    </div>
</div>
