@extends('layouts.admin', ['title' => 'Produk | Admin ALBERA'])

@section('content')
<div class="admin-heading"><div><span class="admin-kicker">Katalog produk</span><h1>Produk</h1><p>Atur formulasi, informasi kemasan, dan publikasi produk.</p></div><a class="admin-button" href="{{ route('admin.products.create') }}"><span>+</span> Tambah produk</a></div>
<section class="admin-panel"><div class="admin-panel-head"><h2>Semua produk</h2><span>{{ $products->total() }} item</span></div>
    @if($products->isEmpty())<div class="admin-empty">Belum ada produk.<br><a href="{{ route('admin.products.create') }}">Tambahkan produk pertama</a></div>
    @else<div class="admin-table-wrap"><table class="admin-table"><thead><tr><th>Produk</th><th>Formula N-P-K</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr></thead><tbody>
        @foreach($products as $product)<tr><td><div style="display:flex;align-items:center;gap:10px">@if($product->image)<img class="admin-thumb" src="{{ route('media', ['path' => $product->image]) }}" alt="">@else<span class="admin-placeholder-thumb">A</span>@endif<div><strong>{{ $product->name }}</strong><small>Netto {{ $product->netto }}</small></div></div></td><td>{{ $product->nitrogen }} — {{ $product->phosphorus }} — {{ $product->potassium }}</td><td>{{ $product->category }}</td><td><span class="admin-status {{ $product->is_published ? '' : 'admin-status-draft' }}">{{ $product->is_published ? 'Tayang' : 'Draft' }}</span></td><td><div class="admin-actions"><a class="admin-button admin-button-muted" href="{{ route('admin.products.edit', $product) }}">Ubah</a><form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Hapus produk ini?')">@csrf @method('DELETE')<button class="admin-button admin-button-danger" type="submit">Hapus</button></form></div></td></tr>@endforeach
    </tbody></table></div><div class="admin-pagination">{{ $products->links() }}</div>@endif
</section>
@endsection