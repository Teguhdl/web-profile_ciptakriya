@extends('web.layouts.master')

@section('content')
<section class="cke-section cke-about" style="padding-top: 120px;">
    <div class="cke-container">
        <x-cke.section-header eyebrow="// Profil Perusahaan">
            <x-slot name="title">Lebih dekat dengan <em>Cipta Kriya Engineering</em></x-slot>
        </x-cke.section-header>

        <div class="cke-about__grid" style="margin-top: 3rem;">
            <div class="cke-about__copy">
                @if(!empty($page_company_profile_content))
                    <div class="cke-about__p prose prose-red max-w-none text-justify">
                        {!! $page_company_profile_content !!}
                    </div>
                @else
                    <p class="cke-about__p" style="margin-bottom:1rem; text-align:justify;">
                        <strong>PT. CIPTA KRIYA ENGINEERING (CKE)</strong> didirikan pada tahun <strong>2021</strong> sebagai perusahaan engineering multi-disiplin yang melayani kebutuhan konstruksi mekanikal, konstruksi elektrikal, instalasi & maintenance, batching plant, pergudangan, hingga modifikasi & fabrikasi. Kami hadir sebagai mitra solusi bagi industri semen, ready-mix, pertambangan, FMCG, dan peternakan.
                    </p>
                    <p class="cke-about__p" style="text-align:justify;">
                        Dengan motto <em>“We Solve Your Problem”</em>, PT Cipta Kriya Engineering berkomitmen mengutamakan profesionalisme, integritas, dan standar K3 di setiap proyek. Tim engineer dan teknisi kami berpengalaman menangani lebih dari 100+ proyek industri di Indonesia.
                    </p>
                @endif
                
                <div class="cke-about__chips" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
                    <x-cke.badge tone="brand">Profesional</x-cke.badge>
                    <x-cke.badge tone="green">Integritas</x-cke.badge>
                    <x-cke.badge tone="brand">Standar K3</x-cke.badge>
                    <x-cke.badge tone="green">Tepat Waktu</x-cke.badge>
                </div>
            </div>

            <div id="profile-gallery" class="cke-about__media" style="{{ !$profile_show_gallery ? 'display: none;' : '' }}">
                <div class="cke-about__photo cke-about__photo--back" style="background-image: url('{{ asset($profile_image_main ?? 'assets/web/photos/site-loader.png') }}')"></div>
                <div class="cke-about__photo cke-about__photo--front" style="background-image: url('{{ asset($profile_image_1 ?? 'assets/web/photos/silo-fabrication.png') }}')"></div>
                <div class="cke-about__badge" style="background-color: {{ $profile_badge_bg_color ?? '#0f172a' }};">
                    <span class="cke-about__badge-num" style="color: {{ $profile_badge_text_color ?? '#b6d335' }};">{{ $profile_badge_number ?? '2021' }}</span>
                    <span class="cke-about__badge-lbl">{{ $profile_badge_label ?? 'Tahun Berdiri' }}</span>
                </div>
            </div>
        </div>

        {{-- SECTION 2: SERTIFIKASI --}}
        <div style="margin-top: 5rem; display: flex; flex-wrap: wrap; gap: 3rem; align-items: center;">
            {{-- Kiri: Logo ISO & SNI --}}
            <div style="flex: 1; min-width: 250px; display: flex; justify-content: center; align-items: center;">
                <img id="profile-cert-logo" src="{{ asset($profile_cert_image ?? 'assets/web/iso-sni-logo.png') }}" loading="lazy" alt="ISO and SNI Logos" style="width: 100%; max-width: 200px;">
            </div>

            {{-- Kanan: Text Description --}}
            <div style="flex: 2; min-width: 300px;">
                <div class="cke-card cke-card--pad cke-card--raised" style="border-left: 4px solid var(--color-primary);">
                    @if(!empty($page_profile_cert_content))
                        <div class="cke-about__p prose prose-red max-w-none text-justify">
                            {!! $page_profile_cert_content !!}
                        </div>
                    @else
                        <p class="cke-about__p" style="margin-bottom: 1rem; text-align:justify;">
                            PT Cipta Kriya Engineering berbasis di <strong>Kabupaten Subang, Jawa Barat</strong>, dan didukung oleh workshop fabrikasi, tim engineering, serta tenaga teknisi yang berpengalaman menangani proyek skala industri sesuai standar nasional maupun internasional.
                        </p>
                        <p class="cke-about__p" style="text-align:justify;">
                            Kami berkomitmen terhadap mutu, K3 (Keselamatan, Kesehatan, Kerja), serta tepat waktu dalam setiap penyerahan proyek. Setiap pekerjaan dieksekusi mengikuti prosedur QC, dokumentasi as-built, dan jaminan after-sales sehingga klien dapat fokus pada operasional bisnisnya.
                        </p>
                    @endif
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
