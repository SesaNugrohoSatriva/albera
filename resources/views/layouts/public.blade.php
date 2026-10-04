<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $description ?? 'ALBERA menghadirkan solusi nutrisi tanaman untuk pertanian Indonesia.' }}">
    <title>{{ $title ?? 'ALBERA | Tumbuh Bersama Pertanian Indonesia' }}</title>
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
                    <small>PT. Agro Lestari Berkah Nusantara</small>
                </span>
            </a>
            <button class="menu-toggle" type="button" @click="open = !open" aria-label="Buka menu navigasi" :aria-expanded="open">
                <span></span><span></span>
            </button>
            <nav class="site-menu" :class="{ 'is-open': open }" aria-label="Navigasi utama">
                <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                <div class="nav-dropdown" @click.outside="aboutMenuOpen = false">
                    <button
                        class="nav-dropdown-toggle {{ request()->routeIs('about', 'vision-mission', 'directors.*') ? 'active' : '' }}"
                        type="button"
                        @click="aboutMenuOpen = !aboutMenuOpen"
                        aria-controls="about-nav-menu"
                        :aria-expanded="aboutMenuOpen.toString()">
                        Tentang <span aria-hidden="true">▾</span>
                    </button>
                    <div class="nav-dropdown-menu" id="about-nav-menu" x-cloak x-show="aboutMenuOpen">
                        <a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}" @click="open = false; aboutMenuOpen = false" @if (request()->routeIs('about')) aria-current="page" @endif>Tentang ALBERA</a>
                        <a class="{{ request()->routeIs('vision-mission') ? 'active' : '' }}" href="{{ route('vision-mission') }}" @click="open = false; aboutMenuOpen = false" @if (request()->routeIs('vision-mission')) aria-current="page" @endif>Visi &amp; Misi</a>
                        <a class="{{ request()->routeIs('directors.*') ? 'active' : '' }}" href="{{ route('directors.index') }}" @click="open = false; aboutMenuOpen = false" @if (request()->routeIs('directors.*')) aria-current="page" @endif>Direksi</a>
                    </div>
                </div>
                <a class="{{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">Produk</a>
                <a class="{{ request()->routeIs('articles.*') ? 'active' : '' }}" href="{{ route('articles.index') }}">Artikel</a>
                <a class="nav-contact {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Hubungi kami <span aria-hidden="true">↗</span></a>
            </nav>
        </div>
    </header>

    <main>@yield('content')</main>

    <footer class="site-footer" id="kontak">
        <div class="wrap footer-main">
            <div class="footer-about">
                <a class="brand brand-light" href="{{ route('home') }}">
                    <img class="brand-logo" src="{{ Vite::asset('resources/img/logo.png') }}" alt="ALBERA">
                </a>
                <p>Mendukung produktivitas pertanian melalui solusi nutrisi tanaman yang berkualitas, konsisten, dan bertanggung jawab.</p>
                <div class="socials" aria-label="Media sosial">
                    <a href="https://www.threads.com/@albera.official" target="_blank" rel="noopener noreferrer">Threads <span>↗</span></a>
                    <a href="https://www.tiktok.com/@alberaofficial?is_from_webapp=1&sender_device=pc" target="_blank" rel="noopener noreferrer">TikTok <span>↗</span></a>
                    <a href="https://www.facebook.com/share/1FVvQ5YWyT/" target="_blank" rel="noopener noreferrer">Facebook <span>↗</span></a>
                    <a href="https://www.instagram.com/albera.official?stkn=MTN0bzE2ZDNjN2Fzcw==" target="_blank" rel="noopener noreferrer">Instagram <span>↗</span></a>
                </div>
            </div>
            <div class="footer-column">
                <h2>Jelajahi</h2>
                <a href="{{ route('about') }}">Tentang kami</a>
                <a href="{{ route('products.index') }}">Produk</a>
                <a href="{{ route('articles.index') }}">Artikel & insight</a>
                <a href="{{ route('directors.index') }}">Direksi</a>
            </div>
            <div class="footer-column footer-address">
                <h2>Temui kami</h2>
                <p>PT. Agro Lestari Berkah Nusantara</p>
                <p>Indonesia</p>
                <a href="mailto:info@ptalbera.co.id">info@ptalbera.co.id</a>
                <a href="https://wa.me/6281128851991" target="_blank" rel="noopener noreferrer">+62 811-2885-1991</a>
            </div>
        </div>

    </footer>

    <a class="whatsapp-float" href="https://wa.me/6281128851991?text=Halo%20ALBERA%2C%20saya%20ingin%20bertanya%20tentang%20produk." target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp ALBERA">
        <span class="whatsapp-icon">WA</span><span class="whatsapp-label">Tanya ALBERA</span>
    </a>
</body>
</html>