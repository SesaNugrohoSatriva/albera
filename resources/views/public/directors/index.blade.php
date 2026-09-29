@extends('layouts.public', [
    'title' => 'Direksi | ALBERA',
    'description' => 'Kenali tim dan jajaran direksi PT. Agro Lestari Berkah Nusantara.'
])

@section('content')
    <section class="collection-page">
        <div class="wrap page-intro">
            <div class="detail-breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span>/</span>
                <span>Direksi</span>
            </div>

            <div class="eyebrow">
                Di balik ALBERA
            </div>

            <h1>
                Orang-orang yang<br>
                <em>menumbuhkan ide.</em>
            </h1>

            <p>
                Kenali tim yang mendukung operasional, layanan, dan pengembangan
                PT. Agro Lestari Berkah Nusantara.
            </p>
        </div>

        <div class="wrap collection-content">
            @if($directors->isNotEmpty())
                <div class="director-grid">
                    @foreach($directors as $director)
                        <article class="director-tile">
                            <div class="director-portrait">
                                @if($director->photo)
                                    <img src="{{ route('media', ['path' => $director->photo]) }}" alt="{{ $director->name }}" loading="lazy">
                                @else
                                        <span>
                                            {{ collect(explode(' ', $director->name))
                                    ->map(fn($part) => mb_substr($part, 0, 1))
                                    ->take(2)
                                    ->implode('') }}
                                        </span>
                                @endif
                            </div>

                            <span>{{ $director->position }}</span>

                            <h2>{{ $director->name }}</h2>

                            @if($director->bio)
                                <p>{{ $director->bio }}</p>
                            @endif
                        </article>
                    @endforeach
                </div>

                <div class="collection-pagination">
                    {{ $directors->links() }}
                </div>
            @else
                <div class="empty-content">
                    <span>01</span>
                    <p>Profil tim ALBERA akan segera diperbarui.</p>
                </div>
            @endif
        </div>
    </section>
@endsection