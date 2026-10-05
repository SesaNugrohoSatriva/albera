```blade
@extends('layouts.public')

@section('content')
    <section class="hero" id="beranda">
        <div class="hero-photo" role="img" aria-label="Lanskap pertanian Indonesia"></div>
        <div class="hero-shade"></div>

        <div class="wrap hero-inner">
            <div class="hero-copy reveal">
                <div class="eyebrow eyebrow-light">
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

        <div class="hero-bottom wrap">
            <span>Inovasi untuk tanah yang lebih hidup</span>
            <span>Indonesia · Pertanian berkelanjutan</span>
        </div>
    </section>

    <section class="intro-section section-pad" id="tentang">
        <div class="wrap intro-grid">
            <div class="intro-heading reveal">
                <div class="eyebrow">Tentang ALBERA</div>

                <h2>
                    Merawat tanah.<br>
                    <em>Menumbuhkan masa depan.</em>
                </h2>
            </div>

            <div class="intro-copy reveal">
                <p class="lead">
                    Kami percaya pertanian yang produktif berawal dari keputusan yang tepat,
                    produk yang terjaga, dan kemitraan yang tumbuh bersama.
                </p>

                <p>
                    PT. Agro Lestari Berkah Nusantara (ALBERA) bergerak di bidang agrokimia
                    dengan fokus pada pengembangan pupuk anorganik untuk kebutuhan pertanian.
                    Kami hadir untuk menjadi mitra petani, distributor, dan pelaku usaha melalui
                    solusi nutrisi tanaman yang relevan dan berkualitas.
                </p>
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
                    Bergerak dengan<br>
                    <em>tujuan yang jelas.</em>
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

                    <h2>
                        Nutrisi tepat,<br>
                        <em>tumbuh optimal.</em>
                    </h2>
                </div>
            </div>

            @if($products->isNotEmpty())
                <div class="product-grid">
                    @foreach($products as $product)
                        <article class="product-tile reveal">
                            <a class="product-visual" href="{{ route('products.show', $product->slug) }}">
                                @if($product->image)
                                    <img src="{{ route('media', ['path' => $product->image]) }}" alt="{{ $product->name }}" loading="lazy">
                                @else
                                    <div class="product-placeholder">
                                        <span>ALBERA</span>
                                        <strong>{{ $product->name }}</strong>
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
                                    {{ $product->name }}
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
                <div class="eyebrow eyebrow-light">
                    Cara kami bekerja
                </div>

                <h2>
                    Kualitas yang<br>
                    tumbuh dari<br>
                    <em>kepedulian.</em>
                </h2>

                <p>
                    Kami membangun setiap langkah dengan memperhatikan kebutuhan nyata di lapangan.
                </p>
            </div>

            <div class="values-list">
                <article class="value-row reveal">
                    <span>01</span>

                    <div>
                        <h3>Kualitas terjaga</h3>
                        <p>
                            Mutu produk dan konsistensi proses menjadi perhatian kami di setiap tahap.
                        </p>
                    </div>
                </article>

                <article class="value-row reveal">
                    <span>02</span>

                    <div>
                        <h3>Solusi yang relevan</h3>
                        <p>
                            Produk dikembangkan dengan mempertimbangkan kebutuhan nutrisi tanaman.
                        </p>
                    </div>
                </article>

                <article class="value-row reveal">
                    <span>03</span>

                    <div>
                        <h3>Kemitraan berkelanjutan</h3>
                        <p>
                            Hubungan jangka panjang dengan petani dan mitra adalah bagian dari pertumbuhan kami.
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
                        Tim yang menggerakkan ALBERA.
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
                        Catatan untuk<br>
                        <em>terus bertumbuh.</em>
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
                <div class="eyebrow eyebrow-light">
                    Mari bertumbuh bersama
                </div>

                <h2>
                    Ada kebutuhan<br>
                    yang ingin dibicarakan?
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