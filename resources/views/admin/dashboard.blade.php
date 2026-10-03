@extends('layouts.admin', ['title' => 'Ringkasan | Admin ALBERA'])

@section('content')
<div class="admin-dashboard">
	<div class="admin-heading admin-dashboard-heading">
		<div>
			<span class="admin-kicker">Ruang kerja</span>
			<h1>Selamat datang, {{ auth()->user()->name }}.</h1>
			<p>Kelola konten yang tampil di company profile ALBERA.</p>
		</div>
		<a class="admin-button" href="{{ route('home') }}" target="_blank">Lihat situs <span>↗</span></a>
	</div>

	<div class="admin-stats">
		<div class="admin-stat"><span>Total produk</span><strong>{{ $productCount }}</strong></div>
		<div class="admin-stat"><span>Total artikel</span><strong>{{ $articleCount }}</strong></div>
	</div>

	<div class="admin-dashboard-section-head">
		<div><span class="admin-kicker">Konten situs</span><h2>Area pengelolaan</h2></div>
		<span>2 bagian</span>
	</div>
	<div class="admin-shortcuts">
		<a class="admin-shortcut" href="{{ route('admin.products.index') }}"><span>01 / Katalog</span><strong>Kelola produk</strong><b>↗</b></a>
		<a class="admin-shortcut" href="{{ route('admin.articles.index') }}"><span>02 / Jurnal</span><strong>Kelola artikel</strong><b>↗</b></a>
	</div>
</div>
@endsection