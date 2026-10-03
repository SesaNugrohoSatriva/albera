@extends('layouts.public', [
    'title' => $product->name . ' | ALBERA',
    'description' => Str::limit($product->description, 155)
])

@section('content')
    <section class="detail-hero">
        <div class="wrap detail-breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <span>/</span>
            <a href="{{ route('home') }}#produk">Produk</a>
            <span>/</span>
            <span>{{ $product->name }}</span>
        </div>

        <div class="wrap product-detail-grid">
            <div class="detail-product-image{{ $product->image ? ' has-image' : '' }}">
                @if($product->image)
                    <img src="{{ route('media', ['path' => $product->image]) }}" alt="{{ $product->name }}">
                @else
                    <div class="product-placeholder">
                        <span>ALBERA</span>
                        <strong>{{ $product->name }}</strong>
                        <small>
                            NPK {{ $product->nitrogen }}-{{ $product->phosphorus }}-{{ $product->potassium }}
                        </small>
                    </div>
                @endif
            </div>

            <div class="detail-product-copy">
                <div class="eyebrow">
                    {{ $product->category }}
                </div>

                <h1>{{ $product->name }}</h1>

                <p class="lead">
                    {{ $product->description }}
                </p>

                <div class="formula-block">
                    <span>FORMULA N — P — K</span>
                    <strong>
                        {{ $product->nitrogen }}
                        <i>—</i>
                        {{ $product->phosphorus }}
                        <i>—</i>
                        {{ $product->potassium }}
                    </strong>
                </div>

                <dl class="product-specs">
                    <div>
                        <dt>Netto</dt>
                        <dd>{{ $product->netto }}</dd>
                    </div>

                    <div>
                        <dt>Kategori</dt>
                        <dd>{{ $product->category }}</dd>
                    </div>

                    <div>
                        <dt>Sertifikasi</dt>
                        <dd>
                            {{ $product->certification ?: 'Informasi tersedia melalui tim kami' }}
                        </dd>
                    </div>
                </dl>

                <a class="button button-green"
                    href="https://wa.me/6281128851991?text={{ urlencode('Halo ALBERA, saya ingin bertanya tentang ' . $product->name . '.') }}"
                    target="_blank" rel="noopener noreferrer">
                    Tanyakan produk ini <span>↗</span>
                </a>
            </div>
        </div>
    </section>

    @if($relatedProducts->isNotEmpty())
        <section class="related-section section-pad">
            <div class="wrap">
                <div class="eyebrow">
                    Pilihan lainnya
                </div>

                <h2 class="related-title">
                    Produk <em>ALBERA.</em>
                </h2>

                <div class="product-grid">
                    @foreach($relatedProducts as $related)
                        <article class="product-tile">
                            <a class="product-visual" href="{{ route('products.show', $related->slug) }}">
                                @if($related->image)
                                    <img src="{{ route('media', ['path' => $related->image]) }}" alt="{{ $related->name }}" loading="lazy">
                                @else
                                    <div class="product-placeholder">
                                        <span>ALBERA</span>
                                        <strong>{{ $related->name }}</strong>
                                        <small>
                                            NPK {{ $related->nitrogen }}-{{ $related->phosphorus }}-{{ $related->potassium }}
                                        </small>
                                    </div>
                                @endif
                            </a>

                            <div class="product-meta">
                                <span>{{ $related->category }}</span>
                                <span>{{ $related->netto }}</span>
                            </div>

                            <h3>
                                <a href="{{ route('products.show', $related->slug) }}">
                                    {{ $related->name }}
                                </a>
                            </h3>

                            <a class="text-link" href="{{ route('products.show', $related->slug) }}">
                                Lihat detail <span>↗</span>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection