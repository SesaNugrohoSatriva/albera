@extends('layouts.public', [
    'title' => __('messages.contact_page_title'),
    'description' => __('messages.contact_page_description')
])

@section('content')
    <section class="collection-page contact-page">
        <div class="wrap page-intro">
            <div class="detail-breadcrumb">
                <a href="{{ route('home') }}">{{ __('messages.home') }}</a>
                <span>/</span>
                <span>{{ __('messages.contact') }}</span>
            </div>

            <div class="eyebrow">
                {{ __('messages.contact_albera') }}
            </div>

            <h1>
                {{ __('messages.contact_headline') }}<br>
                <em>{{ __('messages.contact_headline_emphasis') }}</em>
            </h1>
        </div>

        <div class="wrap contact-page-grid">
            <div class="contact-page-main">

                <h2>
                    {{ __('messages.contact_solution_heading') }}
                </h2>

                <p>
                    {{ __('messages.contact_intro') }}
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
                    <a href="mailto:agrolestariberkahnusantara@gmail.com">
                        agrolestariberkahnusantara@gmail.com <b>↗</b>
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