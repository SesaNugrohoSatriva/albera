```blade
@extends('layouts.public')

@section('content')
    <section class="hero" id="beranda">
        <div class="hero-photo" role="img" aria-label="Lanskap pertanian Indonesia"></div>
        <div class="hero-shade"></div>

        <div class="wrap hero-inner">
            <div class="hero-copy reveal">
                <div class="eyebrow eyebrow-light" style="color : white">
                    {{ __('messages.company_name') }}
                </div>

                <h1>
                    {{ __('messages.home_hero_title') }},<br>
                    <em>{{ __('messages.home_hero_emphasis') }}</em>
                </h1>

                <p>
                    {{ __('messages.home_hero_description') }}
                </p>

                <div class="hero-actions">
                    <a class="button button-lime" href="{{ route('products.index') }}">
                        {{ __('messages.explore_products') }} <span>↗</span>
                    </a>

                    <a class="text-link text-link-light" href="{{ route('about') }}">
                        {{ __('messages.about_us') }} <span>↗</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="intro-section section-pad" id="tentang">
        <div class="wrap intro-grid">
            <div class="intro-heading reveal">
                <div class="eyebrow">{{ __('messages.about_albera') }}</div>

                <h2 style="font-family: monsterat-arabic;">
                    {{ __('messages.modern_culture') }}<br>
                    <em>{{ __('messages.grow_future') }}</em>
                </h2>
            </div>

            <div class="intro-copy reveal">
                <p class="lead">
                    {{ __('messages.company_intro') }}
                </p>

                <ul class="about-points">
                    <li>{{ __('messages.about_point_1') }}</li>
                    <li>{{ __('messages.about_point_2') }}</li>
                    <li>{{ __('messages.about_point_3') }}</li>
                </ul>

            </div>
        </div>

        <div class="wrap intro-image-wrap reveal">
            <img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?auto=format&fit=crop&w=1800&q=85"
                alt="Tanaman tumbuh di lahan pertanian" loading="lazy">
        </div>
    </section>

    <section class="vision-section section-pad" id="visi-misi">
        <div class="wrap vision-layout">
            <div class="vision-title reveal">
                <div class="eyebrow">{{ __('messages.vision_title') }}</div>

                <h2>
                    {{ __('messages.vision') }}<br> {{ __('messages.and') }} <br>{{ __('messages.mission') }}
                </h2>
            </div>

            <div class="vision-content reveal">
                <div class="vision-item">
                    <span>{{ __('messages.vision_upper') }}</span>

                    <p>
                        {{ __('messages.vision_text') }}
                    </p>
                </div>

                <div class="vision-item">
                    <span>{{ __('messages.mission_upper') }}</span>

                    <div class="mission-lines">
                        <p>
                            {{ __('messages.mission_point_1') }}
                        </p>

                        <p>
                            {{ __('messages.mission_point_2') }}
                        </p>

                        <p>
                            {{ __('messages.mission_point_3') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="products-section section-pad" id="produk">
        <div class="wrap">
            <div class="section-heading split-heading reveal">
                <div>
                    <div class="eyebrow">{{ __('messages.featured_products') }}</div>

                    <h2 style="font-size: 50px; font-family: Georgia, 'Times New Roman', Times, serif;">
                        {{ __('messages.product_title') }}<br>
                        <em style="font-style: normal;">{{ __('messages.product_subtitle') }}</em>
                    </h2>
                </div>
            </div>

            @if($products->isNotEmpty())
                <div class="product-grid">
                    @foreach($products as $product)
                        @php($formattedProductName = str_replace('®', '<sup>®</sup>', preg_replace('/\s*\*R\b/u', '<sup>®</sup>', preg_replace('/\bNPK\s+\d+(?:-\d+)*/u', '<span class="product-name-formula">$0</span>', e($product->translated_name)))) )
                        <article class="product-tile reveal">
                            <a class="product-visual" href="{{ route('products.show', $product->slug) }}">
                                @if($product->image)
                                    <img src="{{ route('media', ['path' => $product->image]) }}" alt="{{ $product->translated_name }}" loading="lazy">
                                @else
                                    <div class="product-placeholder">
                                        <span>ALBERA</span>
                                        <strong>{!! $formattedProductName !!}</strong>
                                        <small>
                                            NPK {{ $product->nitrogen }}-{{ $product->phosphorus }}-{{ $product->potassium }}
                                        </small>
                                    </div>
                                @endif
                            </a>

                            <div class="product-meta">
                                <span>{{ $product->translated_category }}</span>
                                <span>{{ $product->netto }}</span>
                            </div>

                            <h3>
                                <a href="{{ route('products.show', $product->slug) }}">
                                    {!! $formattedProductName !!}
                                </a>
                            </h3>

                            <p>
                                {{ Str::limit($product->translated_description, 145) }}
                            </p>

                            <a class="text-link" href="{{ route('products.show', $product->slug) }}">
                                {{ __('messages.view_detail') }} <span>↗</span>
                            </a>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="empty-content">
                    <span>01</span>
                    <p>Produk unggulan ALBERA akan segera hadir.</p>
                </div>
            @endif

            <div class="collection-more">
                <a class="text-link" href="{{ route('products.index') }}">
                    {{ __('messages.all_products') }} <span>↗</span>
                </a>
            </div>
        </div>
    </section>

    <section class="values-section section-pad" id="kualitas">
        <div class="wrap values-layout">
            <div class="values-lead reveal">
                <h2>
                    <em>{{ __('messages.commitment') }}</em>
                </h2>
            </div>

            <div class="values-list">
                <article class="value-row reveal">
                    <span>01</span>

                    <div>
                        <h3>{{ __('messages.value_quality_title') }}</h3>
                        <p>{{ __('messages.value_quality_text') }}
                        </p>
                    </div>
                </article>

                <article class="value-row reveal">
                    <span>02</span>

                    <div>
                        <h3>{{ __('messages.value_innovation_title') }}</h3>
                        <p>{{ __('messages.value_innovation_text') }}
                        </p>
                    </div>
                </article>

                <article class="value-row reveal">
                    <span>03</span>

                    <div>
                        <h3>{{ __('messages.value_sustainability_title') }}</h3>
                        <p>{{ __('messages.value_sustainability_text') }}</p>
                    </div>
                </article>
                <article class="value-row reveal">
                    <span>04</span>
                    <div>
                        <h3>{{ __('messages.value_partnership_title') }}</h3>
                        <p>{{ __('messages.value_partnership_text') }}</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="directors-section section-pad management-page" id="direksi">
        <div class="wrap">
            <div class="section-heading split-heading reveal">
                <div>
                    <div class="eyebrow">
                        Management Board
                    </div>

                    <h2>
                        PT Agro Lestari Berkah Nusantara
                    </h2>
                </div>
            </div>

            <div class="management-panel">
                <div class="management-panel-heading">Struktur Organisasi</div>

                <div class="management-chart" aria-label="Struktur Management Board ALBERA">
                    <article class="management-card management-card-director">
                        <h2>Fahmi Rosyadi</h2>
                        <p>Direktur</p>
                    </article>

                    <div class="management-connector" aria-hidden="true"></div>

                    <article class="management-card management-card-manager">
                        <h2>Deby Hastono</h2>
                        <p>Manajer Operasional</p>
                    </article>

                    <div class="management-branch" aria-hidden="true">
                        <span class="management-branch-stem"></span>
                        <span class="management-branch-line"></span>
                        <span class="management-branch-drop management-branch-drop-left"></span>
                        <span class="management-branch-drop management-branch-drop-right"></span>
                    </div>

                    <div class="management-team">
                        <article class="management-card">
                            <h2>Muslih Riza</h2>
                            <p>Technical Service</p>
                        </article>

                        <div class="management-team-connector" aria-hidden="true"></div>

                        <article class="management-card">
                            <h2>Amin Luthfy</h2>
                            <p>Admin/Finance</p>
                        </article>
                    </div>
                </div>
            </div>

            <div class="collection-more">
                <a class="text-link" href="{{ route('directors.index') }}">
                    {{ __('messages.view_organization_structure') }} <span>↗</span>
                </a>
            </div>
        </div>
    </section>

    <section class="articles-section section-pad" id="artikel">
        <div class="wrap">
            <div class="section-heading split-heading reveal">
                <div>
                    <div class="eyebrow">
                        Artikel & insight
                    </div>

                    <h2>
                        Let's Grow Together
                    </h2>
                </div>
            </div>

            @if($articles->isNotEmpty())
                <div class="article-grid">
                    @foreach($articles as $article)
                        <article class="article-tile reveal">
                            <a class="article-image" href="{{ route('articles.show', $article->slug) }}">
                                @if($article->image)
                                    <img src="{{ route('media', ['path' => $article->image]) }}" alt="{{ $article->translated_title }}" loading="lazy">
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
                                    {{ $article->published_at?->translatedFormat('d F Y') ?? 'Insight ALBERA' }}
                                </span>

                                <h3>
                                    <a href="{{ route('articles.show', $article->slug) }}">
                                        {{ $article->translated_title }}
                                    </a>
                                </h3>

                                <p>{{ $article->translated_excerpt }}</p>

                                <a class="text-link" href="{{ route('articles.show', $article->slug) }}">
                                    {{ __('messages.read_more_short') }} <span>↗</span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="empty-content">
                    <span>03</span>
                    <p>Artikel dan insight baru akan segera hadir.</p>
                </div>
            @endif

            <div class="collection-more">
                <a class="text-link" href="{{ route('articles.index') }}">
                    {{ __('messages.read_all_articles') }} <span>↗</span>
                </a>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="wrap contact-inner reveal">
            <div>
                <div class="eyebrow eyebrow-light" style="color : white">
                    Let's Grow Together
                </div>

                <h2 style="font-size: 40px;">
                    Grow With Innovation<br>
                    Grow With Partnership<br>
                    Grow For Indonesia
                </h2>

                <p>{{ __('messages.home_contact_description') }}</p>
            </div>

            <a class="button button-lime"
                href="https://wa.me/6281128851991?text=Halo%20ALBERA%2C%20saya%20ingin%20berdiskusi." target="_blank"
                rel="noopener noreferrer">
                Hubungi tim kami <span>↗</span>
            </a>
        </div>
    </section>
@endsection
```