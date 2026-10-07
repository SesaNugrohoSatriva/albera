@extends('layouts.public', [
    'title' => __('messages.vision_mission_title'),
    'description' => __('messages.vision_mission_description')
])

@section('content')
    <section class="collection-page vision-mission-page">
        <div class="wrap page-intro">
            <div class="detail-breadcrumb">
                <a href="{{ route('home') }}">{{ __('messages.home') }}</a>
                <span>/</span>
                <span>{{ __('messages.vision_mission') }}</span>
            </div>

            <div class="eyebrow">
                {{ __('messages.about_albera') }}
            </div>

            <h1>{{ __('messages.vision_mission') }}</h1>
        </div>

        <div class="vision-section about-vision vision-mission-content">
            <div class="wrap vision-layout">
                <div class="vision-title">
                    <div class="eyebrow">
                        {{ __('messages.vision_title') }}
                    </div>

                    <h2>
                        {{ __('messages.vision') }} <br> {{ __('messages.and') }} <br> {{ __('messages.mission') }}
                    </h2>
                </div>

                <div class="vision-content">
                    <div class="vision-item">
                        <span>{{ __('messages.vision_upper') }}</span>

                        <p>
                            {{ __('messages.vision_text') }}
                        </p>
                    </div>

                    <div class="vision-item">
                        <span>{{ __('messages.mission_upper') }}</span>

                        <div class="mission-lines">
                            <p>
                                {{ __('messages.mission_point_1') }}
                            </p>

                            <p>
                                {{ __('messages.mission_point_2') }}
                            </p>

                            <p>
                                {{ __('messages.mission_point_3') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection