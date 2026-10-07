@extends('layouts.public', [
    'title' => __('messages.article_title'),
    'description' => __('messages.article_description')
])

@section('content')
    <section class="collection-page">
        <div class="wrap page-intro">
            <div class="detail-breadcrumb">
                <a href="{{ route('home') }}">{{ __('messages.home') }}</a>
                <span>/</span>
                <span>{{ __('messages.articles') }}</span>
            </div>

            <div class="eyebrow">
                ALBERA Journal
            </div>

            <h1>
                {{ __('messages.grow_together') }}
            </h1>

            <p>
                {{ __('messages.article_intro') }}
            </p>
        </div>

        <div class="wrap collection-content">
            @if($articles->isNotEmpty())
                <div class="article-grid">
                    @foreach($articles as $article)
                        <article class="article-tile">
                            <a class="article-image" href="{{ route('articles.show', $article->slug) }}">
                                @if($article->image)
                                    <img src="{{ route('media', ['path' => $article->image]) }}" alt="{{ $article->title }}" loading="lazy">
                                @else
                                    <div class="article-placeholder">
                                        <span>ALBERA JOURNAL</span>
                                        <b>{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</b>
                                    </div>
                                @endif

                                <span class="article-arrow">↗</span>
                            </a>

                            <div class="article-info">
                                <span>
                                    {{ $article->published_at?->translatedFormat('d F Y') ?? 'Insight ALBERA' }}
                                </span>

                                <h2>
                                    <a href="{{ route('articles.show', $article->slug) }}">
                                        {{ $article->title }}
                                    </a>
                                </h2>

                                <p>
                                    {{ $article->excerpt }}
                                </p>

                                <a class="text-link" href="{{ route('articles.show', $article->slug) }}">
                                    {{ __('messages.read_more_short') }} <span>↗</span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="collection-pagination">
                    {{ $articles->links() }}
                </div>
            @else
                <div class="empty-content">
                    <span>01</span>
                    <p>{{ __('messages.article_coming_soon') }}</p>
                </div>
            @endif
        </div>
    </section>
@endsection