```blade
@extends('layouts.public')

@section('content')
    <section class="hero" id="beranda">
        <div class="hero-photo" role="img" aria-label="Lanskap pertanian Indonesia"></div>
        <div class="hero-shade"></div>

        <div class="wrap hero-inner">
            <div class="hero-copy reveal">
                <div class="eyebrow eyebrow-light" style="color : white">
                    PT. Agro Lestari Berkah Nusantara
                </div>

                <h1>
                    Membangun Pertanian Berkelanjutan,<br>
                    <em>Mendukung Ketahanan Pangan Nasional.</em>
                </h1>

                <p>
                    Solusi nutrisi tanaman yang dirancang untuk mendukung produktivitas pertanian dan masa depan pangan
                    Indonesia.
                </p>

                <div class="hero-actions">
                    <a class="button button-lime" href="{{ route('products.index') }}">
                        Jelajahi produk <span>↗</span>
                    </a>

                    <a class="text-link text-link-light" href="{{ route('about') }}">
                        Tentang Kami <span>↗</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="intro-section section-pad" id="tentang">
        <div class="wrap intro-grid">
            <div class="intro-heading reveal">
                <div class="eyebrow">Tentang ALBERA</div>

                <h2 style="font-family: monsterat-arabic;">
                    Go To Modern Culture<br>
                    <em>Menumbuhkan masa depan.</em>
                </h2>
            </div>

            <div class="intro-copy reveal">
                <p class="lead">
                    PT. Agro Lestar Berkah Nusantara (Albera) adalah perusahaan agrokimia 
                    sebagai solusi pertanian modern yang berfokus pada inovasi efisiensi produktivitas kelestarian lingkungan 
                </p>

                <ul class="about-points">
                    <li>Penyedia pupuk berkualitas tinggi yang diformulasikan sesuai kebutuhan spesifik sektor pertanian dan perkebunan Indonesia.</li>
                    <li>Berkomitmen menjaga keseimbangan antara produktivitas, efisiensi biaya, dan kelestarian tanah</li>
                    <li>Mitra terpercaya bagi petani, distributor, dan pelaku usaha pertanian nasional</li>
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
                <div class="eyebrow">Arah kami</div>

                <h2>
                    Visi<br> dan <br>Misi
                </h2>
            </div>

            <div class="vision-content reveal">
                <div class="vision-item">
                    <span>VISI</span>

                    <p>
                        Menjadi perusahaan agrokimia yang unggul, berdaya saing, dan berkontribusi pada pembangunan nasional
                        yang berkelanjutan.
                    </p>
                </div>

                <div class="vision-item">
                    <span>MISI</span>

                    <div class="mission-lines">
                        <p>
                            Mendukung ketahanan pangan melalui ketersediaan pupuk berkualitas.
                        </p>

                        <p>
                            Membantu meningkatkan produktivitas dan efisiensi usaha pertanian.
                        </p>

                        <p>
                            Mengembangkan solusi yang memperhatikan kesehatan tanah dan lingkungan.
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
                    <div class="eyebrow">Produk pilihan</div>

                    <h2 style="font-size: 50px;">
                        Pupuk Premium (water soluble & siap serap)<br>
                        <em style="font-style: normal;">lengkap dengan unsur mikro</em>
                    </h2>
                </div>
            </div>

            @if($products->isNotEmpty())
                <div class="product-grid">
                    @foreach($products as $product)
                        @php($formattedProductName = str_replace('®', '<sup>®</sup>', preg_replace('/\s*\*R\b/u', '<sup>®</sup>', preg_replace('/\bNPK\s+\d+(?:-\d+)*/u', '<span class="product-name-formula">$0</span>', e($product->name)))))
                        <article class="product-tile reveal">
                            <a class="product-visual" href="{{ route('products.show', $product->slug) }}">
                                @if($product->image)
                                    <img src="{{ route('media', ['path' => $product->image]) }}" alt="{{ $product->name }}" loading="lazy">
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
                                <span>{{ $product->category }}</span>
                                <span>{{ $product->netto }}</span>
                            </div>

                            <h3>
                                <a href="{{ route('products.show', $product->slug) }}">
                                    {!! $formattedProductName !!}
                                </a>
                            </h3>

                            <p>
                                {{ Str::limit($product->description, 145) }}
                            </p>

                            <a class="text-link" href="{{ route('products.show', $product->slug) }}">
                                Lihat detail <span>↗</span>
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
                    Lihat semua produk <span>↗</span>
                </a>
            </div>

            <div class="product-note">
                <span></span>
                Gunakan sesuai rekomendasi agronomis dan petunjuk pada kemasan.
            </div>
        </div>
    </section>

    <section class="values-section section-pad" id="kualitas">
        <div class="wrap values-layout">
            <div class="values-lead reveal">
                <h2>
                    <em>Komitmen</em>
                </h2>
            </div>

            <div class="values-list">
                <article class="value-row reveal">
                    <span>01</span>

                    <div>
                        <h3>Kualitas</h3>
                        <p>Menghadirkan produk agrokimia standar tinggi yang teruji memberikan manfaat nyata di lapangan.
                        </p>
                    </div>
                </article>

                <article class="value-row reveal">
                    <span>02</span>

                    <div>
                        <h3>Inovasi</h3>
                        <p>Mendorong riset dan formulasi modern yang relevan dengan perkembangan tantangan agrikultur.
                        </p>
                    </div>
                </article>

                <article class="value-row reveal">
                    <span>03</span>

                    <div>
                        <h3>Keberlanjutan</h3>
                        <p>
                            Mengintegrasikan aspek ekonomi, sosial, dan lingkungan untuk dampak positif jangka panjang.
                        </p>
                    </div>
                </article>
                <article class="value-row reveal">
                    <span>04</span>
                    <div>
                        <h3>Kemitraan</h3>
                        <p>
                            Membangun kolaborasi saling menguntungkan dengan petani, distributor, dan seluruh pemangku kepentingan.
                        </p>
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
                    Lihat struktur organisasi <span>↗</span>
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
                                    <img src="{{ route('media', ['path' => $article->image]) }}" alt="{{ $article->title }}" loading="lazy">
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
                                        {{ $article->title }}
                                    </a>
                                </h3>

                                <p>{{ $article->excerpt }}</p>

                                <a class="text-link" href="{{ route('articles.show', $article->slug) }}">
                                    Baca artikel <span>↗</span>
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
                    Baca semua artikel <span>↗</span>
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

                <p>
                    Tim kami siap membantu Anda mengenal produk dan kerja sama bersama ALBERA.
                </p>
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