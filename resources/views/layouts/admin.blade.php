<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin ALBERA' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/site.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <a class="brand brand-light" href="{{ route('admin.dashboard') }}"><span class="brand-mark">A<span>.</span></span><span class="brand-copy"><strong>ALBERA</strong><small>CONTENT STUDIO</small></span></a>
            <p class="admin-nav-label">Workspace</p>
            <nav class="admin-nav" aria-label="Navigasi admin">
                <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><span>01</span>Ringkasan</a>
                <a class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}"><span>02</span>Produk</a>
                <a class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}" href="{{ route('admin.articles.index') }}"><span>03</span>Artikel</a>
                <a class="{{ request()->routeIs('admin.directors.*') ? 'active' : '' }}" href="{{ route('admin.directors.index') }}"><span>04</span>Direksi</a>
            </nav>
            <div class="admin-sidebar-bottom">
                <a href="{{ route('home') }}" target="_blank">Lihat situs <span>↗</span></a>
                <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit">Keluar dari admin</button></form>
            </div>
        </aside>
        <div class="admin-main">
            <header class="admin-topbar"><span>PT. Agro Lestari Berkah Nusantara <span aria-hidden="true">/</span> Admin</span><div class="admin-user"><span class="admin-avatar">{{ mb_substr(auth()->user()->name, 0, 1) }}</span>{{ auth()->user()->name }}</div></header>
            <main class="admin-content">
                @if(session('status'))<div class="admin-flash" role="status">{{ session('status') }}</div>@endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>