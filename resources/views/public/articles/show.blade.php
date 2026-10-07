@extends('layouts.public', [
    'title' => $article->title . ' | ALBERA Journal',
    'description' => $article->excerpt
])

@section('content')
    <article class="article-detail">
        <div class="wrap detail-breadcrumb">
            <a href="{{ route('home') }}">{{ __('messages.home') }}</a>
            <span>/</span>
            <a href="{{ route('home') }}#artikel">{{ __('messages.articles') }}</a>
            <span>/</span>
            <span>{{ Str::limit($article->title, 42) }}</span>
        </div>

        <header class="article-detail-header wrap">
            <div class="eyebrow">
                ALBERA Journal
            </div>

            <h1>{{ $article->title }}</h1>

            <p class="article-deck">
                {{ $article->excerpt }}
            </p>

            <div class="article-byline">
                <span>PT. Agro Lestari Berkah Nusantara</span>
                <i></i>
                <time>
                    {{ $article->published_at?->translatedFormat('d F Y') ?? 'Insight ALBERA' }}
                </time>
            </div>
        </header>

        <div class="article-detail-cover wrap">
            @if($article->image)
                <img src="{{ route('media', ['path' => $article->image]) }}" alt="{{ $article->title }}">
            @else
                <div class="article-placeholder">
                    <span>ALBERA JOURNAL</span>
                    <b>01</b>
                </div>
            @endif
        </div>

        <div class="wrap article-body-layout">
            <aside>
                <span>{{ __('messages.in_article') }}</span>
                <p>{{ $article->title }}</p>
                <a href="{{ route('home') }}#artikel">← {{ __('messages.all_articles') }}</a>
            </aside>

            <div class="article-body">
                {!! nl2br(e($article->content)) !!}

                <div class="article-signoff">
                    <span>ALBERA JOURNAL</span>
                    <p>{{ __('messages.grow_with_indonesia') }}</p>
                </div>
            </div>
        </div>
    </article>

    @if($relatedArticles->isNotEmpty())
        <section class="related-section section-pad">
            <div class="wrap">
                <div class="eyebrow">
                    {{ __('messages.read_more') }}
                </div>

                <h2 class="related-title">
                    {{ __('messages.more_insight') }} <em>{{ __('messages.insight_label') }}</em>
                </h2>

                <div class="article-grid">
                    @foreach($relatedArticles as $related)
                        <article class="article-tile">
                            <a class="article-image" href="{{ route('articles.show', $related->slug) }}">
                                @if($related->image)
                                    <img src="{{ route('media', ['path' => $related->image]) }}" alt="{{ $related->title }}" loading="lazy">
                                @else
                                    <div class="article-placeholder">
                                        <span>ALBERA JOURNAL</span>
                                        <b>
                                            {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </b>
                                    </div>
                                @endif

                                <span class="article-arrow">↗</span>
                            </a>

                            <div class="article-info">
                                <span>
                                    {{ $related->published_at?->translatedFormat('d F Y') ?? 'Insight ALBERA' }}
                                </span>

                                <h3>
                                    <a href="{{ route('articles.show', $related->slug) }}">
                                        {{ $related->title }}
                                    </a>
                                </h3>

                                <p>{{ $related->excerpt }}</p>

                                <a class="text-link" href="{{ route('articles.show', $related->slug) }}">
                                    {{ __('messages.read_more_short') }}
                                    <span>↗</span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection