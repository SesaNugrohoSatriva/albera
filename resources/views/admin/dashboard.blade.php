@extends('layouts.admin', ['title' => 'Ringkasan | Admin ALBERA'])

@section('content')
<div class="admin-heading"><div><span class="admin-kicker">Ruang kerja</span><h1>Selamat datang, {{ auth()->user()->name }}.</h1><p>Kelola konten yang tampil di company profile ALBERA.</p></div><a class="admin-button" href="{{ route('home') }}" target="_blank">Lihat situs <span>↗</span></a></div>
<div class="admin-stats"><div class="admin-stat"><span>Total produk</span><strong>{{ $productCount }}</strong></div><div class="admin-stat"><span>Total artikel</span><strong>{{ $articleCount }}</strong></div><div class="admin-stat"><span>Profil direksi</span><strong>{{ $directorCount }}</strong></div></div>
<p class="admin-welcome">Pilih area konten untuk menambahkan, memperbarui, atau menghapus informasi.</p>
<div class="admin-shortcuts"><a class="admin-shortcut" href="{{ route('admin.products.index') }}"><span>01 / Katalog</span><strong>Kelola produk</strong><b>↗</b></a><a class="admin-shortcut" href="{{ route('admin.articles.index') }}"><span>02 / Jurnal</span><strong>Kelola artikel</strong><b>↗</b></a><a class="admin-shortcut" href="{{ route('admin.directors.index') }}"><span>03 / Organisasi</span><strong>Kelola direksi</strong><b>↗</b></a></div>
@endsection