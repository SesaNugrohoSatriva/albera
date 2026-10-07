@extends('layouts.public', [
    'title' => __('messages.products_page_title'),
    'description' => __('messages.products_page_description')
])

@section('content')
    <section class="collection-page">
        <div class="wrap page-intro">
            <div class="detail-breadcrumb">
                <a href="{{ route('home') }}">{{ __('messages.home') }}</a>
                <span>/</span>
                <span>{{ __('messages.products') }}</span>
            </div>

            <div class="eyebrow">
                {{ __('messages.catalogue') }}
            </div>

            <h1>
                {{ __('messages.products_highlight_title') }}<br>
                <em style="font-size: 60px;">{{ __('messages.products_company_name') }}</em>
            </h1>

            <p>
                {{ __('messages.product_title') }} {{ __('messages.product_subtitle') }}
            </p>
        </div>

        <div class="wrap collection-content">
            @if($products->isNotEmpty())
                <div class="product-grid">
                    @foreach($products as $product)
                        @php($formattedProductName = str_replace('®', '<sup>®</sup>', preg_replace('/\s*\*R\b/u', '<sup>®</sup>', preg_replace('/\bNPK\s+\d+(?:-\d+)*/u', '<span class="product-name-formula">$0</span>', e($product->name)))))
                        <article class="product-tile">
                            <a class="product-visual" href="{{ route('products.show', $product->slug) }}">
                                @if($product->image)
                                    <img src="{{ route('media', ['path' => $product->image]) }}" alt="{{ $product->name }}" loading="lazy">
                                @else
                                    <div class="product-placeholder">
                                        <span>ALBERA</span>
                                        <strong>{!! $formattedProductName !!}</strong>
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
                                    {!! $formattedProductName !!}
                                </a>
                            </h2>

                            <p>
                                {{ Str::limit($product->description, 145) }}
                            </p>

                            <a class="text-link" href="{{ route('products.show', $product->slug) }}">
                                {{ __('messages.view_detail') }} <span>↗</span>
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
                    <p>{{ __('messages.products_coming_soon') }}</p>
                </div>
            @endif
        </div>
    </section>
@endsection