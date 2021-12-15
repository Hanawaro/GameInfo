<div class="comment-header">
    <div class="title d-flex justify-content-between align-items-center">
        <div>
            <a class="photo" href="{{ route('user.get', $comment->user()->name) }}">
                @if(empty($comment->user()->photo))
                    <svg class="default" height="24" width="24">
                        <title>Профиль</title>
                        <use xlink:href="{{ asset('storage/img/icons.svg') }}#placeholder-user"></use>
                    </svg>
                @else
                    <img src="{{ asset('storage/' . $comment->user()->photo) }}" alt="profile" style="border: none">
                @endif
            </a>
            <a class="identifier"
               href="{{ route('user.get', $comment->user()->name) }}">{{ $comment->user()->name }}</a>
            <span class="time">{{ $comment->created_at->format('d.m.Y H:i') }}</span>
        </div>
        <div>
            @can('owner', $comment->user())
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-expanded="false">

                        <svg fill="currentColor" height="20" width="20" class="svg-icon">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M5 10C5 11.1046 4.10457 12 3 12C1.89543 12 1 11.1046 1 10C1 8.89543 1.89543 8 3 8C4.10457 8 5 8.89543 5 10ZM12 10C12 11.1046 11.1046 12 10 12C8.89543 12 8 11.1046 8 10C8 8.89543 8.89543 8 10 8C11.1046 8 12 8.89543 12 10ZM17 12C18.1046 12 19 11.1046 19 10C19 8.89543 18.1046 8 17 8C15.8954 8 15 8.89543 15 10C15 11.1046 15.8954 12 17 12Z"></path>
                        </svg>
                    </a>

                    <form method="POST" action="{{ route('article.comment.delete', $comment->id) }}" class="dropdown-menu"
                          aria-labelledby="dropdownMenuLink">
                        @csrf

                        <label class="dropdown-item" href="#">
                            <input type="submit">
                            Удалить
                        </label>
                    </form>
                </div>
            @endcan
        </div>
    </div>
</div>
<div class="comment">
    {{ $comment->value }}
</div>
