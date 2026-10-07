@extends('layouts.public', [
    'title' => __('messages.about_albera'),
    'description' => __('messages.about_meta_description')
])

@section('content')
    <section class="collection-page">
        <div class="wrap page-intro">
            <div class="detail-breadcrumb">
                <a href="{{ route('home') }}">{{ __('messages.home') }}</a>
                <span>/</span>
                <span>{{ __('messages.about') }}</span>
            </div>

            <div class="eyebrow">
                {{ __('messages.about_albera') }}
            </div>

            <h1>
                {{ __('messages.about_headline') }}<br>
                <em>{{ __('messages.about_headline_emphasis') }}</em>
            </h1>
        </div>

        <div class="wrap about-page-content">
            <div class="about-page-image">
                <img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?auto=format&fit=crop&w=1800&q=85"
                    alt="Pertanian modern dan produktif" loading="lazy">
            </div>

            <div class="about-page-copy">
                <div class="eyebrow">
                    {{ __('messages.who_we_are') }}
                </div>

                <h2>
                    {{ __('messages.about_solution_heading') }}
                </h2>

                <p>
                    {{ __('messages.about_description_1') }}
                </p>

                <p>
                    {{ __('messages.about_description_2') }}
                </p>

                <a class="button button-green" href="{{ route('contact') }}">
                    {{ __('messages.contact_albera') }}
                    <span>↗</span>
                </a>
            </div>
        </div>

        <div class="wrap about-principles">
            <div class="eyebrow">
                {{ __('messages.albera_commitment') }}
            </div>

            <div class="principle-grid">
                <article>
                    <span>01</span>
                    <h3>{{ __('messages.principle_1_title') }}</h3>
                    <p>
                        {{ __('messages.principle_1_text') }}
                    </p>
                </article>

                <article>
                    <span>02</span>
                    <h3>{{ __('messages.principle_2_title') }}</h3>
                    <p>
                        {{ __('messages.principle_2_text') }}
                    </p>
                </article>

                <article>
                    <span>03</span>
                    <h3>{{ __('messages.principle_3_title') }}</h3>
                    <p>
                        {{ __('messages.principle_3_text') }}
                    </p>
                </article>
            </div>
        </div>
    </section>
@endsection