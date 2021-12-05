<div class="article">

    <div class="title">
        <a class="photo" href="/">
            {{--            <img src="{{ asset('storage/img/user.svg') }}" alt="user" title="user">--}}
            <svg height="24" width="24">
                <title>Рейтинг</title>
                <use xlink:href="{{ asset('storage/img/icons.svg') }}#placeholder-user"></use>
            </svg>
        </a>
        <a class="identifier" href="/">user</a>
        <span class="time">{{ $article->created_at->format('d.m.Y H:i') }}</span>
    </div>


    @foreach($article->previews()->get() as $element)
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

    <a class="read-more btn btn-outline-primary" href="/">Читать далее</a>

    <div class="status-bar d-flex">
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
</div>
