```blade
@extends('layouts.public', [
    'title' => 'Tentang ALBERA',
    'description' => 'Kenali PT. Agro Lestari Berkah Nusantara, visi, misi, dan komitmennya untuk pertanian Indonesia.'
])

@section('content')
    <section class="collection-page">
        <div class="wrap page-intro">
            <div class="detail-breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span>/</span>
                <span>Tentang kami</span>
            </div>

            <div class="eyebrow">
                Tentang ALBERA
            </div>

            <h1>
                Merawat tanah.<br>
                <em>Menumbuhkan masa depan.</em>
            </h1>
        </div>

        <div class="wrap about-page-content">
            <div class="about-page-image">
                <img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?auto=format&fit=crop&w=1800&q=85"
                    alt="Lahan pertanian yang tumbuh subur" loading="lazy">
            </div>

            <div class="about-page-copy">
                <div class="eyebrow">
                    Siapa kami
                </div>

                <h2>Solusi nutrisi tanaman, dibangun dari kemitraan.</h2>

                <p>
                    PT. Agro Lestari Berkah Nusantara (ALBERA) merupakan perusahaan agrokimia yang berfokus pada
                    pengembangan dan produksi pupuk anorganik untuk kebutuhan pertanian.
                </p>

                <p>
                    Kami berkomitmen menjaga kualitas dan konsistensi produk, serta menjadi mitra bagi petani, distributor,
                    dan pelaku usaha pertanian di Indonesia.
                </p>

                <a class="button button-green" href="{{ route('contact') }}">
                    Bicara dengan tim kami
                    <span>↗</span>
                </a>
            </div>
        </div>

        <div class="vision-section about-vision">
            <div class="wrap vision-layout">
                <div class="vision-title">
                    <div class="eyebrow">
                        Arah kami
                    </div>

                    <h2>
                        Bergerak dengan<br>
                        <em>tujuan yang jelas.</em>
                    </h2>
                </div>

                <div class="vision-content">
                    <div class="vision-item">
                        <span>VISI</span>

                        <p>
                            Menjadi perusahaan agrokimia yang unggul, berdaya saing, dan berkontribusi pada pembangunan
                            nasional yang berkelanjutan.
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
        </div>

        <div class="wrap about-principles">
            <div class="eyebrow">
                Prinsip kami
            </div>

            <div class="principle-grid">
                <article>
                    <span>01</span>
                    <h3>Kualitas terjaga</h3>
                    <p>
                        Menaruh perhatian pada mutu produk dan konsistensi proses.
                    </p>
                </article>

                <article>
                    <span>02</span>
                    <h3>Solusi relevan</h3>
                    <p>
                        Mempertimbangkan kebutuhan nutrisi tanaman dan kondisi lapangan.
                    </p>
                </article>

                <article>
                    <span>03</span>
                    <h3>Kemitraan tumbuh</h3>
                    <p>
                        Membangun hubungan jangka panjang dengan pelanggan dan mitra.
                    </p>
                </article>
            </div>
        </div>
    </section>
@endsection
```