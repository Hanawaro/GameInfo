<div class="article">

    <div class="title d-flex justify-content-between align-items-center">
        <div>
            <a class="photo" href="{{ route('user.get', $article->user()->first()->name) }}">
                @if(empty($article->user()->first()->photo))
                    <svg class="default" height="24" width="24">
                        <title>Профиль</title>
                        <use xlink:href="{{ asset('storage/img/icons.svg') }}#placeholder-user"></use>
                    </svg>
                @else
                    <img src="{{ asset('storage/' . $article->user()->first()->photo) }}" alt="profile" style="border: none">
                @endif
            </a>
            <a class="identifier"
               href="{{ route('user.get', $article->user()->first()->name) }}">{{ $article->user()->first()->name }}</a>
            <span class="time">{{ $article->created_at->format('d.m.Y H:i') }}</span>
        </div>
        <div>
            @can('owner', $article->user()->first())
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-expanded="false">

                        <svg fill="currentColor" height="20" width="20" class="svg-icon">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M5 10C5 11.1046 4.10457 12 3 12C1.89543 12 1 11.1046 1 10C1 8.89543 1.89543 8 3 8C4.10457 8 5 8.89543 5 10ZM12 10C12 11.1046 11.1046 12 10 12C8.89543 12 8 11.1046 8 10C8 8.89543 8.89543 8 10 8C11.1046 8 12 8.89543 12 10ZM17 12C18.1046 12 19 11.1046 19 10C19 8.89543 18.1046 8 17 8C15.8954 8 15 8.89543 15 10C15 11.1046 15.8954 12 17 12Z"></path>
                        </svg>
                    </a>

                    <form method="POST" action="{{ route('article.delete', $article->id) }}" class="dropdown-menu"
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

    @foreach($article->contents()->get() as $element)

        @switch($element->element)
            @case('paragraph')
            <p>{{ $element->value }}</p>
            @break
            @case('header-3')
            <h3>{{ $element->value }}</h3>
            @break
            @case('header-5')
            <h5>{{ $element->value }}</h5>
            @break
            @case('img')
            <img src="{{ asset('storage/' . $element->value) }}" alt="Фотография"/>
            @break
            @case('video')
            <iframe
                width="100%"
                height="395px"
                src="{{ $element->value }}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
            @break
        @endswitch
    @endforeach


    <div class="d-flex justify-content-between" style="width: 100%">

        <div class="d-flex status-bar">
            <div class="rate d-flex align-items-center"
                 title="Всего голосов {{ $article->like - $article->dislike }}: ↑{{ $article->like  }} и ↓{{ $article->dislike  }}">
                <svg height="24" width="24">
                    <use xlink:href="{{ asset('storage/img/icons.svg') }}#counter-rating"></use>
                </svg>
                @if($article->like - $article->dislike > 0)
                    <span class="positive">+{{ $article->like - $article->dislike }}</span>
                @elseif($article->like - $article->dislike < 0)
                    <span class="negative">{{ $article->like - $article->dislike }}</span>
                @else
                    <span>0</span>
                @endif
            </div>
            <div class="views d-flex align-items-center" title="Просмотры">
                <svg height="24" width="24">
                    <use xlink:href="{{ asset('storage/img/icons.svg') }}#counter-views"></use>
                </svg>
                <span>{{ $article->views }}</span>
            </div>
            <div class="comments d-flex align-items-center" title="Комментарии">
                <svg height="24" width="24">
                    <use xlink:href="{{ asset('storage/img/icons.svg') }}#counter-comments"></use>
                </svg>
                <span>0</span>
            </div>
        </div>

        @auth
        @if($liked === null)
            <form class="d-flex" action="{{ route('article.rate', $article->id) }}" method="POST">
                @csrf

                <button type="submit" name="like" class="btn btn-outline-success mr-3">Like</button>
                <button type="submit" name="dislike" class="btn btn-outline-danger">Dislike</button>
            </form>
        @endif
        @endauth

    </div>
</div>
