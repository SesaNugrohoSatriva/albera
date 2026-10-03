@extends('layouts.public', [
    'title' => 'Tentang ALBERA',
    'description' => 'Mengenal PT. Agro Lestari Berkah Nusantara (ALBERA) sebagai perusahaan agrokimia yang berfokus pada inovasi, efisiensi produktivitas, dan kelestarian lingkungan.'
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
                Go to Modern Agriculture.<br>
                <em>Menuju pertanian yang lebih maju.</em>
            </h1>
        </div>

        <div class="wrap about-page-content">
            <div class="about-page-image">
                <img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?auto=format&fit=crop&w=1800&q=85"
                    alt="Pertanian modern dan produktif" loading="lazy">
            </div>

            <div class="about-page-copy">
                <div class="eyebrow">
                    Siapa kami
                </div>

                <h2>
                    Solusi pertanian modern untuk produktivitas dan keberlanjutan.
                </h2>

                <p>
                    PT. Agro Lestari Berkah Nusantara (ALBERA) adalah perusahaan
                    agrokimia sebagai solusi pertanian modern yang berfokus pada
                    inovasi, efisiensi produktivitas, dan kelestarian lingkungan.
                </p>

                <p>
                    ALBERA hadir sebagai mitra bagi petani, distributor, dan pelaku
                    usaha pertanian nasional melalui penyediaan pupuk berkualitas
                    tinggi yang diformulasikan sesuai kebutuhan spesifik sektor
                    pertanian dan perkebunan Indonesia.
                </p>

                <a class="button button-green" href="{{ route('contact') }}">
                    Hubungi ALBERA
                    <span>↗</span>
                </a>
            </div>
        </div>

        <div class="wrap about-principles">
            <div class="eyebrow">
                Komitmen ALBERA
            </div>

            <div class="principle-grid">
                <article>
                    <span>01</span>
                    <h3>Pupuk Berkualitas Tinggi</h3>
                    <p>
                        Menyediakan pupuk berkualitas tinggi yang diformulasikan
                        sesuai kebutuhan spesifik sektor pertanian dan perkebunan
                        Indonesia.
                    </p>
                </article>

                <article>
                    <span>02</span>
                    <h3>Produktivitas dan Efisiensi</h3>
                    <p>
                        Berkomitmen menjaga keseimbangan antara produktivitas,
                        efisiensi biaya, dan kelestarian tanah.
                    </p>
                </article>

                <article>
                    <span>03</span>
                    <h3>Mitra Terpercaya</h3>
                    <p>
                        Menjadi mitra terpercaya bagi petani, distributor, dan
                        pelaku usaha pertanian nasional.
                    </p>
                </article>
            </div>
        </div>
    </section>
@endsection