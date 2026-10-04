@extends('layouts.public', [
    'title' => 'Kontak | ALBERA',
    'description' => 'Hubungi tim ALBERA untuk informasi produk, distribusi, dan kerja sama.'
])

@section('content')
    <section class="collection-page contact-page">
        <div class="wrap page-intro">
            <div class="detail-breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span>/</span>
                <span>Kontak</span>
            </div>

            <div class="eyebrow">
                Hubungi ALBERA
            </div>

            <h1>
                Mari bicarakan<br>
                <em>kebutuhan Anda.</em>
            </h1>
        </div>

        <div class="wrap contact-page-grid">
            <div class="contact-page-main">

                <h2>
                    Temukan solusi yang tepat untuk kebutuhan pertanian Anda.
                </h2>

                <p>
                    Ceritakan kebutuhan produk atau kerja sama Anda. Hubungi tim kami melalui kanal berikut.
                </p>

                <div class="whatsapp-buttons">
                    <a class="button button-green" href="https://wa.me/6281128851991" target="_blank" rel="noopener noreferrer">
                        0811-2885-1991
                        <span>↗</span>
                    </a>

                    <a class="button button-green" href="https://wa.me/6281128841991" target="_blank" rel="noopener noreferrer">
                        0811-2884-1991
                        <span>↗</span>
                    </a>

                    <a class="button button-green" href="https://wa.me/6281128871991" target="_blank" rel="noopener noreferrer">
                        0811-2887-1991
                        <span>↗</span>
                    </a>
                </div>
            </div>

            <div class="contact-details">
                <div>
                    <span>TELEPON / WHATSAPP</span>
                    <div class="contact-phone-list">
                        <a href="https://wa.me/6281128851991" target="_blank" rel="noopener noreferrer">
                            0811-2885-1991 <b>↗</b>
                        </a>
                        <span>/</span>
                        <a href="https://wa.me/6281128841991" target="_blank" rel="noopener noreferrer">
                            0811-2884-1991 <b>↗</b>
                        </a>
                        <span>/</span>
                        <a href="https://wa.me/6281128871991" target="_blank" rel="noopener noreferrer">
                            0811-2887-1991 <b>↗</b>
                        </a>
                    </div>
                </div>

                <div>
                    <span>EMAIL</span>
                    <a href="mailto:info@ptalbera.co.id">
                        info@ptalbera.co.id <b>↗</b>
                    </a>
                </div>

                <div>
                    <span>ALAMAT</span>
                    <p>
                        PT. Agro Lestari Berkah Nusantara<br>
                        Indonesia
                    </p>
                </div>

                <div>
                    <span>JAM OPERASIONAL</span>
                    <p>
                        Senin–Jumat<br>
                        08.00–17.00 WIB
                    </p>
                </div>

                <div class="contact-social-row">
                    <span>MEDIA SOSIAL</span>

                    <div>
                        <a href="https://www.threads.com/@albera.official" target="_blank" rel="noopener noreferrer">
                            Threads ↗
                        </a>

                        <a href="https://www.tiktok.com/@alberaofficial?is_from_webapp=1&sender_device=pc" target="_blank" rel="noopener noreferrer">
                            TikTok ↗
                        </a>

                        <a href="https://www.facebook.com/share/1FVvQ5YWyT/" target="_blank" rel="noopener noreferrer">
                            Facebook ↗
                        </a> 
                        <a href=" https://www.instagram.com/albera.official?stkn=MTN0bzE2ZDNjN2Fzcw==" target="_blank"
                            rel="noopener noreferrer">
                            Instagram ↗
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection