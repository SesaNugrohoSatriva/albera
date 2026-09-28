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

                <a class="button button-green"
                    href="https://wa.me/628517088221?text=Halo%20ALBERA%2C%20saya%20ingin%20bertanya%20tentang%20produk%20dan%20kerja%20sama."
                    target="_blank" rel="noopener noreferrer">
                    Mulai chat WhatsApp
                    <span>↗</span>
                </a>
            </div>

            <div class="contact-details">
                <div>
                    <span>TELEPON / WHATSAPP</span>
                    <a href="https://wa.me/628517088221" target="_blank" rel="noopener noreferrer">
                        +62 811-2884-1991 <b>↗</b>
                    </a>
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
                        <a href="https://www.threads.net/" target="_blank" rel="noopener noreferrer">
                            Threads ↗
                        </a>

                        <a href="https://www.tiktok.com/" target="_blank" rel="noopener noreferrer">
                            TikTok ↗
                        </a>

                        <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                            Facebook ↗
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection