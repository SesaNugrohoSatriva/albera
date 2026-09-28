@extends('layouts.public', [
    'title' => 'Artikel & Insight | ALBERA',
    'description' => 'Artikel ALBERA seputar pertanian, nutrisi tanaman, dan solusi agrokimia.'
])

@section('content')
    <section class="collection-page">
        <div class="wrap page-intro">
            <div class="detail-breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span>/</span>
                <span>Artikel</span>
            </div>

            <div class="eyebrow">
                <span></span> ALBERA Journal
            </div>

            <h1>
                Catatan untuk<br>
                <em>terus bertumbuh.</em>
            </h1>

            <p>
                Informasi seputar pertanian, nutrisi tanaman, dan perkembangan solusi agrokimia.
            </p>
        </div>

        <div class="wrap collection-content">
            @if($articles->isNotEmpty())
                <div class="article-grid">
                    @foreach($articles as $article)
                        <article class="article-tile">
                            <a class="article-image" href="{{ route('articles.show', $article->slug) }}">
                                @if($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" loading="lazy">
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
                                    Baca artikel <span>↗</span>
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
                    <p>Artikel dan insight baru akan segera hadir.</p>
                </div>
            @endif
        </div>
    </section>
@endsection