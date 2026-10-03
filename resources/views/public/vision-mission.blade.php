@extends('layouts.public', [
    'title' => 'Visi & Misi ALBERA',
    'description' => 'Visi dan misi PT. Agro Lestari Berkah Nusantara dalam mendukung pertanian Indonesia.'
])

@section('content')
    <section class="collection-page vision-mission-page">
        <div class="wrap page-intro">
            <div class="detail-breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span>/</span>
                <span>Visi &amp; Misi</span>
            </div>

            <div class="eyebrow">
                Tentang ALBERA
            </div>

            <h1>Visi &amp; Misi</h1>
        </div>

        <div class="vision-section about-vision vision-mission-content">
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
    </section>
@endsection