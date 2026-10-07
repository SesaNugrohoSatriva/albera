@extends('layouts.public', [
    'title' => $product->name . ' | ALBERA',
    'description' => Str::limit(app(\App\Services\TranslationService::class)->translate($product->description, app()->getLocale()), 155)
])

@section('content')
    @php($formattedProductName = str_replace('®', '<sup>®</sup>', preg_replace('/\s*\*R\b/u', '<sup>®</sup>', preg_replace('/\bNPK\s+\d+(?:-\d+)*/u', '<span class="product-name-formula">$0</span>', e($product->name)))))
    <section class="detail-hero">
        <div class="wrap detail-breadcrumb">
            <a href="{{ route('home') }}">{{ __('messages.home') }}</a>
            <span>/</span>
            <a href="{{ route('home') }}#produk">{{ __('messages.products') }}</a>
            <span>/</span>
            <span>{!! $formattedProductName !!}</span>
        </div>

        <div class="wrap product-detail-grid">
            <div class="detail-product-image{{ $product->image ? ' has-image' : '' }}">
                @if($product->image)
                    <img src="{{ route('media', ['path' => $product->image]) }}" alt="{{ $product->name }}">
                @else
                    <div class="product-placeholder">
                        <span>ALBERA</span>
                        <strong>{!! $formattedProductName !!}</strong>
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

                <h1>{!! $formattedProductName !!}</h1>

                <p class="lead">
                    {{ app(\App\Services\TranslationService::class)->translate($product->description, app()->getLocale()) }}
                </p>

                <div class="formula-block">
                    <span>{{ __('messages.formula_label') }}</span>
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
                        <dt>{{ __('messages.netto') }}</dt>
                        <dd>{{ $product->netto }}</dd>
                    </div>

                    <div>
                        <dt>{{ __('messages.category') }}</dt>
                        <dd>{{ $product->category }}</dd>
                    </div>

                    <div>
                        <dt>{{ __('messages.certification') }}</dt>
                        <dd>
                            {{ $product->certification ?: __('messages.certification_fallback') }}
                        </dd>
                    </div>
                </dl>

                <a class="button button-green"
                    href="https://wa.me/6281128851991?text={{ urlencode(__('messages.whatsapp_product_message', ['product' => str_replace('*R', '®', $product->name)])) }}"
                    target="_blank" rel="noopener noreferrer">
                    {{ __('messages.ask_about_product') }} <span>↗</span>
                </a>
            </div>
        </div>
    </section>

    @if($relatedProducts->isNotEmpty())
        <section class="related-section section-pad">
            <div class="wrap">
                <div class="eyebrow">
                    {{ __('messages.other_choices') }}
                </div>

                <h2 class="related-title">
                    {{ __('messages.product_albera') }} <em>ALBERA.</em>
                </h2>

                <div class="product-grid">
                    @foreach($relatedProducts as $related)
                        @php($formattedRelatedName = str_replace('®', '<sup>®</sup>', preg_replace('/\s*\*R\b/u', '<sup>®</sup>', preg_replace('/\bNPK\s+\d+(?:-\d+)*/u', '<span class="product-name-formula">$0</span>', e($related->name)))))
                        <article class="product-tile">
                            <a class="product-visual" href="{{ route('products.show', $related->slug) }}">
                                @if($related->image)
                                    <img src="{{ route('media', ['path' => $related->image]) }}" alt="{{ $related->name }}" loading="lazy">
                                @else
                                    <div class="product-placeholder">
                                        <span>ALBERA</span>
                                        <strong>{!! $formattedRelatedName !!}</strong>
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
                                    {!! $formattedRelatedName !!}
                                </a>
                            </h3>

                            <a class="text-link" href="{{ route('products.show', $related->slug) }}">
                                {{ __('messages.view_detail') }} <span>↗</span>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection