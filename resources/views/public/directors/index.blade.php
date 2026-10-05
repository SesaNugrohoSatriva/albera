@extends('layouts.public', [
    'title' => 'Management Board | ALBERA',
    'description' => 'Kenali tim yang mendukung operasional dan pengembangan PT. Agro Lestari Berkah Nusantara.'
])

@section('content')
    <section class="collection-page management-page">
        <div class="wrap page-intro">
            <div class="detail-breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span>/</span>
                <span>Management Board</span>
            </div>

            <div class="eyebrow">
                MANAGEMENT BOARD
            </div>

            <h1>P.T. Agro Lestari Berkah Nusantara</h1>

            <p>
                Kenali tim yang mendukung operasional dan pengembangan PT. Agro Lestari Berkah Nusantara.
            </p>
        </div>

        <div class="wrap collection-content management-content">
            <div class="management-panel">
                <div class="management-panel-heading">Management Board</div>

                <div class="management-chart" aria-label="Struktur Management Board">
                    <article class="management-card management-card-director">
                        <h2>Fahmi Rosyadi</h2>
                        <p>Direktur</p>
                    </article>

                    <div class="management-connector" aria-hidden="true"></div>

                    <article class="management-card management-card-manager">
                        <h2>Deby Hastono</h2>
                        <p>Manajer Operasional</p>
                    </article>

                    <div class="management-branch" aria-hidden="true">
                        <span class="management-branch-stem"></span>
                        <span class="management-branch-line"></span>
                        <span class="management-branch-drop management-branch-drop-left"></span>
                        <span class="management-branch-drop management-branch-drop-right"></span>
                    </div>

                    <div class="management-team">
                        <article class="management-card">
                            <h2>Muslih Riza</h2>
                            <p>Technical Service</p>
                        </article>

                        <div class="management-team-connector" aria-hidden="true"></div>

                        <article class="management-card">
                            <h2>Amin Luthfy</h2>
                            <p>Admin/Finance</p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection