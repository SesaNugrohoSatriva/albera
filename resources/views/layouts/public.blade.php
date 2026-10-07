<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $description ?? __('messages.meta_description') }}">
    <title>{{ $title ?? __('messages.home_title') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/site.css', 'resources/js/app.js'])
</head>
<body class="site-body">
    <header class="site-header" x-data="{ open: false, aboutMenuOpen: false }" @keydown.escape.window="aboutMenuOpen = false">
        <div class="site-nav wrap">
            <a class="brand" href="{{ route('home') }}" aria-label="ALBERA beranda">
                <img class="brand-logo" src="{{ Vite::asset('resources/img/logo.png') }}" alt="ALBERA">
                <span class="brand-copy">
                    <strong>ALBERA</strong>
                    <small>{{ __('messages.company_name') }}</small>
                </span>
            </a>
            <button class="menu-toggle" type="button" @click="open = !open" aria-label="{{ __('messages.explore') }}" :aria-expanded="open">
                <span></span><span></span>
            </button>
            <nav class="site-menu" :class="{ 'is-open': open }" aria-label="{{ __('messages.explore') }}">
                <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">{{ __('messages.home') }}</a>
                <div class="nav-dropdown" @click.outside="aboutMenuOpen = false">
                    <button
                        class="nav-dropdown-toggle {{ request()->routeIs('about', 'vision-mission', 'directors.*') ? 'active' : '' }}"
                        type="button"
                        @click="aboutMenuOpen = !aboutMenuOpen"
                        aria-controls="about-nav-menu"
                        :aria-expanded="aboutMenuOpen.toString()">
                        {{ __('messages.navbar_about') }} <span aria-hidden="true">▾</span>
                    </button>
                    <div class="nav-dropdown-menu" id="about-nav-menu" x-cloak x-show="aboutMenuOpen">
                        <a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}" @click="open = false; aboutMenuOpen = false" @if (request()->routeIs('about')) aria-current="page" @endif>{{ __('messages.navbar_about_albera') }}</a>
                        <a class="{{ request()->routeIs('vision-mission') ? 'active' : '' }}" href="{{ route('vision-mission') }}" @click="open = false; aboutMenuOpen = false" @if (request()->routeIs('vision-mission')) aria-current="page" @endif>{{ __('messages.navbar_vision_mission') }}</a>
                        <a class="{{ request()->routeIs('directors.*') ? 'active' : '' }}" href="{{ route('directors.index') }}" @click="open = false; aboutMenuOpen = false" @if (request()->routeIs('directors.*')) aria-current="page" @endif>{{ __('messages.navbar_direction') }}</a>
                    </div>
                </div>
                <a class="{{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">{{ __('messages.products') }}</a>
                <a class="{{ request()->routeIs('articles.*') ? 'active' : '' }}" href="{{ route('articles.index') }}">{{ __('messages.articles') }}</a>
                <a class="nav-contact {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">{{ __('messages.contact_us') }} <span aria-hidden="true">↗</span></a>

                <div class="lang-switcher" aria-label="{{ __('messages.language') }}">
                    <span class="lang-switcher-label">{{ __('messages.language') }}</span>
                    @foreach (['id' => 'ID', 'en' => 'EN'] as $localeCode => $localeLabel)
                        <a
                            href="{{ request()->fullUrlWithQuery(['locale' => $localeCode]) }}"
                            class="{{ app()->getLocale() === $localeCode ? 'is-active' : '' }}"
                            aria-label="{{ $localeCode === 'id' ? 'Bahasa Indonesia' : 'English' }}"
                            @if (app()->getLocale() === $localeCode) aria-current="page" @endif>
                            @if ($localeCode === 'id')
                                <svg class="lang-flag" viewBox="0 0 24 16" aria-hidden="true" focusable="false">
                                    <rect width="24" height="8" fill="#e32636"/>
                                    <rect y="8" width="24" height="8" fill="#fff"/>
                                </svg>
                            @else
                                <svg class="lang-flag" viewBox="0 0 24 16" aria-hidden="true" focusable="false">
                                    <rect width="24" height="16" fill="#23407f"/>
                                    <path d="M0 0 24 16M24 0 0 16" stroke="#fff" stroke-width="4"/>
                                    <path d="M0 0 24 16M24 0 0 16" stroke="#c8102e" stroke-width="1.6"/>
                                    <path d="M12 0v16M0 8h24" stroke="#fff" stroke-width="6"/>
                                    <path d="M12 0v16M0 8h24" stroke="#c8102e" stroke-width="3"/>
                                </svg>
                            @endif
                            {{ $localeLabel }}
                        </a>
                    @endforeach
                </div>
            </nav>
        </div>
    </header>

    <main>@yield('content')</main>

    <footer class="site-footer" id="kontak">
        <div class="wrap footer-main">
            <div class="footer-about">
                <a class="brand brand-light" href="{{ route('home') }}">
                    <img class="brand-logo" src="{{ Vite::asset('resources/img/logo.png') }}" alt="ALBERA" style="width: 46px; height: 46px; border-radius: 50%; object-fit: cover; object-position: center; background: #fff;">
                    <span class="brand-copy">
                        <strong>ALBERA</strong>
                        <small>{{ __('messages.company_name') }}</small>
                    </span>
                </a>
                <p>{{ __('messages.footer_tagline') }}</p>
                <div class="socials" aria-label="{{ __('messages.socials') }}">
                    <a href="https://www.threads.com/@albera.official" target="_blank" rel="noopener noreferrer">Threads <span>↗</span></a>
                    <a href="https://www.tiktok.com/@alberaofficial?is_from_webapp=1&sender_device=pc" target="_blank" rel="noopener noreferrer">TikTok <span>↗</span></a>
                    <a href="https://www.facebook.com/share/1FVvQ5YWyT/" target="_blank" rel="noopener noreferrer">Facebook <span>↗</span></a>
                    <a href="https://www.instagram.com/albera.official?stkn=MTN0bzE2ZDNjN2Fzcw==" target="_blank" rel="noopener noreferrer">Instagram <span>↗</span></a>
                </div>
            </div>
            <div class="footer-column">
                <h2>{{ __('messages.explore') }}</h2>
                <a href="{{ route('about') }}">{{ __('messages.about_albera') }}</a>
                <a href="{{ route('products.index') }}">{{ __('messages.products') }}</a>
                <a href="{{ route('articles.index') }}">{{ __('messages.latest_articles') }}</a>
                <a href="{{ route('directors.index') }}">{{ __('messages.management_board') }}</a>
            </div>
            <div class="footer-column footer-address">
                <h2>{{ __('messages.meet_us') }}</h2>
                <p>{{ __('messages.company_name') }}</p>
                <p>{{ __('messages.in_indonesia') }}</p>
                <a href="mailto:agrolestariberkahnusantara@gmail.com">agrolestariberkahnusantara@gmail.com</a>
                <a href="https://wa.me/6281128851991" target="_blank" rel="noopener noreferrer">+62 811-2885-1991</a>
            </div>
        </div>

    </footer>

    <a class="whatsapp-float" href="https://wa.me/6281128851991?text=Halo%20ALBERA%2C%20saya%20ingin%20bertanya%20tentang%20produk." target="_blank" rel="noopener noreferrer" aria-label="{{ __('messages.whatsapp_label') }}">
        <span class="whatsapp-icon">WA</span><span class="whatsapp-label">{{ __('messages.whatsapp_label') }}</span>
    </a>
</body>
</html>
