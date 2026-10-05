@extends('layouts.public', [
    'title' => 'Produk | ALBERA',
    'description' => 'Jelajahi produk pupuk ALBERA dan informasi lengkap formulasi serta kemasannya.'
])

@section('content')
    <section class="collection-page">
        <div class="wrap page-intro">
            <div class="detail-breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span>/</span>
                <span>Produk</span>
            </div>

            <div class="eyebrow">
                Katalog ALBERA
            </div>

            <h1>
                Produk Unggulan<br>
                <em>PT Agro Berkah Lestari Nusantara</em>
            </h1>

            <p>
                Kenali pilihan nutrisi tanaman ALBERA, formulasi N-P-K, kategori, dan kemasannya.
            </p>
        </div>

        <div class="wrap collection-content">
            @if($products->isNotEmpty())
                <div class="product-grid">
                    @foreach($products as $product)
                        <article class="product-tile">
                            <a class="product-visual" href="{{ route('products.show', $product->slug) }}">
                                @if($product->image)
                                    <img src="{{ route('media', ['path' => $product->image]) }}" alt="{{ $product->name }}" loading="lazy">
                                @else
                                    <div class="product-placeholder">
                                        <span>ALBERA</span>
                                        <strong>{{ $product->name }}</strong>
                                        <small>
                                            NPK {{ $product->nitrogen }}-{{ $product->phosphorus }}-{{ $product->potassium }}
                                        </small>
                                    </div>
                                @endif
                            </a>

                            <div class="product-meta">
                                <span>{{ $product->category }}</span>
                                <span>{{ $product->netto }}</span>
                            </div>

                            <h2>
                                <a href="{{ route('products.show', $product->slug) }}">
                                    {{ $product->name }}
                                </a>
                            </h2>

                            <p>
                                {{ Str::limit($product->description, 145) }}
                            </p>

                            <a class="text-link" href="{{ route('products.show', $product->slug) }}">
                                Lihat detail <span>↗</span>
                            </a>
                        </article>
                    @endforeach
                </div>

                <div class="collection-pagination">
                    {{ $products->links() }}
                </div>
            @else
                <div class="empty-content">
                    <span>01</span>
                    <p>Produk unggulan ALBERA akan segera hadir.</p>
                </div>
            @endif
        </div>
    </section>
@endsection