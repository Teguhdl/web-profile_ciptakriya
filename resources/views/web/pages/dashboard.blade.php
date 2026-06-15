@extends('web.layouts.master')

@section('content')

<!-- 1. Hero -->
@if($dashboard_show_hero)
<section id="beranda" class="cke-hero">
    <div class="cke-hero__media" style="background-image: url('{{ $dashboard_hero_image }}')"></div>
    <div class="cke-hero__scrim"></div>
    <div class="cke-hero__inner">
        <span class="cke-hero__eyebrow">// {{ $settings['system_name'] ?? 'PT. Cipta Kriya Engineering' }} — {{ $settings['company_locality'] ?? 'Subang' }}, {{ $settings['company_region'] ?? 'Jawa Barat' }}</span>
        <h1 class="cke-hero__title">{!! nl2br(e($dashboard_hero_title)) !!}</h1>
        <p class="cke-hero__lead">
            {{ $dashboard_hero_subtitle }}
        </p>
        <div class="cke-hero__cta">
            <x-cke.button size="lg" variant="primary" href="#kontak" iconRight="arrow-right">Hubungi Kami</x-cke.button>
            <x-cke.button size="lg" variant="inverse" href="#proyek">Lihat Proyek</x-cke.button>
        </div>
        <div class="cke-hero__tags">
            <span>@include('web.partials.icon', ['name' => 'shield-check', 'size' => 20]) Standar K3</span>
            <span>@include('web.partials.icon', ['name' => 'badge-check', 'size' => 20]) Berpengalaman sejak {{ $global_stats['founding'] }}</span>
            <span>@include('web.partials.icon', ['name' => 'map-pin', 'size' => 20]) Nasional</span>
        </div>
    </div>
</section>
@endif

<!-- 2. About -->
@if($dashboard_show_about)
<section id="tentang" class="cke-section cke-about">
    <div class="cke-container cke-about__grid">
        <div class="cke-about__copy">
            <x-cke.section-header eyebrow="// Tentang Kami">
                <x-slot name="title">{!! str_replace(['[', ']'], ['<em>', '</em>'], e($dashboard_about_title)) !!}</x-slot>
            </x-cke.section-header>
            
            <div class="cke-about__p text-justify" style="margin-top: 1rem;">
                @if(!empty($page_about_content))
                    {!! $page_about_content !!}
                @else
                    <p>
                        <strong>PT. Cipta Kriya Engineering</strong> adalah perusahaan konstruksi
                        mekanikal & elektrikal yang berbasis di Kabupaten Subang, Jawa Barat. Kami
                        menangani pembangunan dan instalasi batching plant, pekerjaan civil, perbaikan
                        dan maintenance alat berat, hingga fabrikasi dan modifikasi.
                    </p>
                    <p>
                        Didukung tenaga kerja profesional dan berpengalaman, kami berkomitmen memberikan
                        hasil kerja berkualitas, tepat waktu, serta mengutamakan standar keselamatan
                        kerja (K3) di setiap pelaksanaan proyek.
                    </p>
                @endif
            </div>
            
            @if(!empty($dashboard_about_tags))
                <div class="cke-about__chips" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
                    @foreach(explode(',', $dashboard_about_tags) as $tagIndex => $tagValue)
                        <x-cke.badge tone="{{ $tagIndex % 2 === 0 ? 'brand' : 'green' }}">{{ trim($tagValue) }}</x-cke.badge>
                    @endforeach
                </div>
            @endif
            
            <x-cke.button variant="outline" href="{{ url('profil-perusahaan') }}" iconRight="arrow-right">Profil Perusahaan</x-cke.button>
        </div>

        <div class="cke-about__media">
            <div class="cke-about__photo cke-about__photo--back" style="background-image: url('{{ asset($dashboard_about_image_1) }}')"></div>
            <div class="cke-about__photo cke-about__photo--front" style="background-image: url('{{ asset($dashboard_about_image_2) }}')"></div>
            <div class="cke-about__badge">
                <span class="cke-about__badge-num">{{ $global_stats['projects'] }}+</span>
                <span class="cke-about__badge-lbl">Proyek dipercayakan</span>
            </div>
        </div>
    </div>
</section>
@endif

<!-- 3. Services -->
<section id="layanan" class="cke-section cke-services">
    <div class="cke-container">
        <x-cke.section-header align="center" eyebrow="// Bidang Usaha" subtitle="Enam lini layanan inti untuk mendukung kebutuhan proyek industri dari hulu ke hilir.">
            <x-slot name="title">Apa yang kami <em>kerjakan</em></x-slot>
        </x-cke.section-header>
        
        <div class="cke-services__grid" style="margin-top: 3rem;">
            @foreach($dashboard_services as $index => $s)
                <a href="#layanan" class="block text-inherit no-underline">
                    <x-cke.service-card 
                        index="{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}" 
                        icon="{{ $s['icon'] ?? 'cog' }}" 
                        title="{{ $s['title'] ?? '' }}" 
                        description="{{ $s['desc'] ?? '' }}" 
                    />
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- 3.5 Video Section -->
@if($dashboard_show_video)
<section id="video" class="cke-section cke-video" style="background: var(--cke-neutral-50); padding: 5rem 0;">
    <div class="cke-container" style="max-width: 900px; text-align: center;">
        <x-cke.section-header align="center" eyebrow="// Profil Video" subtitle="{{ $dashboard_video_desc }}">
            <x-slot name="title">{!! nl2br(e($dashboard_video_title)) !!}</x-slot>
        </x-cke.section-header>
        
        <div style="margin-top: 3rem; border-radius: var(--radius-xl); overflow: hidden; box-shadow: var(--shadow-2xl); border: 1px solid var(--border-subtle); position: relative; aspect-ratio: 16/9; background: #000;">
            <video 
                src="{{ asset($dashboard_video_url) }}" 
                controls 
                preload="metadata" 
                style="width: 100%; height: 100%; object-fit: cover;"
                poster="{{ $dashboard_hero_image }}">
                Browsermu tidak mendukung tag video HTML5.
            </video>
        </div>
    </div>
</section>
@endif

<!-- 4. Projects -->
<section id="proyek" class="cke-section cke-projects">
    <div class="cke-container">
        <div class="cke-projects__head">
            <x-cke.section-header eyebrow="// Dokumentasi Pekerjaan">
                <x-slot name="title">Proyek yang telah kami <em>selesaikan</em></x-slot>
            </x-cke.section-header>
            <x-cke.button variant="ghost" href="#kontak" iconRight="arrow-up-right">Diskusikan proyek Anda</x-cke.button>
        </div>

        <div class="cke-projects__grid">
            @foreach($portfolios as $i => $p)
                <a href="{{ route('portfolio.detail', $p) }}" class="block text-inherit no-underline {{ $i === 0 ? 'cke-projects__feature' : '' }}">
                    <x-cke.card interactive accent media="{{ asset($p->image ?? 'assets/web/dashboard/dashboard.webp') }}" mediaHeight="{{ $i === 0 ? '320px' : '200px' }}">
                        <x-cke.badge tone="{{ $p->tone ?? 'brand' }}">{{ $p->tag ?? 'Proyek' }}</x-cke.badge>
                        <h3 class="cke-projects__title">{{ $p->title }}</h3>
                        <div class="cke-projects__meta">
                            <span>@include('web.partials.icon', ['name' => 'building-2', 'size' => 16]) {{ $p->client ?? '-' }}</span>
                            <span class="cke-projects__year">{{ $p->year }}</span>
                        </div>
                    </x-cke.card>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section id="pengalaman" class="cke-section cke-exp" x-data="{ filter: 'Semua' }">
    <div class="cke-container">
        <div class="cke-exp__head">
            <x-cke.section-header eyebrow="// Pengalaman Pekerjaan" subtitle="Sebagian dari pekerjaan yang telah kami selesaikan bersama klien industri.">
                <x-slot name="title">Rekam jejak <em>proyek</em> kami</x-slot>
            </x-cke.section-header>
            <div class="cke-exp__filter" role="tablist">
                @foreach($experience_years as $y)
                    <button class="cke-exp__year" :class="{ 'is-active': filter === '{{ $y }}' }" @click="filter = '{{ $y }}'">{{ $y }}</button>
                @endforeach
            </div>
        </div>

        <div class="cke-exp__ledger">
            <div class="cke-exp__lhead">
                <span>Tahun</span><span>Klien</span><span>Lingkup Pekerjaan</span><span>Kategori</span>
            </div>
            
            @foreach($experiences as $e)
                <div class="cke-exp__row" x-show="filter === 'Semua' || filter === '{{ $e->year }}'" x-transition:enter="transition-all duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                    <span class="cke-exp__yr">{{ $e->year }}</span>
                    <span class="cke-exp__client">{{ $e->client }}</span>
                    <span class="cke-exp__scope">{{ $e->scope }}</span>
                    <span class="cke-exp__cat"><x-cke.badge tone="{{ $e->tone }}">{{ $e->category }}</x-cke.badge></span>
                </div>
            @endforeach
        </div>
        <p class="cke-exp__note">Menampilkan sebagian dari {{ $global_stats['projects'] }}+ proyek yang telah dipercayakan kepada kami.</p>
    </div>
</section>

<!-- 6. Stats & Partners -->
<section class="cke-stats">
    <div class="cke-container cke-stats__row">
        <x-cke.stat value="{{ $global_stats['projects'] }}" suffix="+" label="Proyek Selesai" onDark />
        <x-cke.stat value="{{ $global_stats['clients'] }}" suffix="+" label="Klien Korporat" onDark />
        <x-cke.stat value="{{ $global_stats['services'] }}" label="Lini Layanan" onDark />
        <x-cke.stat value="{{ $global_stats['k3_commit'] }}" suffix="%" label="Komitmen K3" onDark />
    </div>
</section>

@if($dashboard_show_mitra)
<section id="mitra" class="cke-section cke-partners">
    <div class="cke-container">
        <x-cke.section-header align="center" eyebrow="// Mitra & Klien" subtitle="Perusahaan yang telah mempercayakan kebutuhan proyeknya kepada kami.">
            <x-slot name="title">Dipercaya oleh <em>industri terkemuka</em></x-slot>
        </x-cke.section-header>
    </div>
    
    @php
        $mitras_list = isset($mitras) ? $mitras->toArray() : [];
        $half = ceil(count($mitras_list) / 2);
        $mitras1 = array_slice($mitras_list, 0, $half);
        $mitras2 = array_slice($mitras_list, $half);
    @endphp
    
    <div class="cke-marquee">
        <div class="cke-marquee__edge cke-marquee__edge--l"></div>
        <div class="cke-marquee__edge cke-marquee__edge--r"></div>
        
        <!-- Track 1 (Left) -->
        <div class="cke-marquee__track cke-marquee__track--left">
            @for($i=0; $i<3; $i++)
                @foreach($mitras1 as $m)
                    <div class="cke-partner" title="{{ $m['name'] }}">
                        <img src="{{ asset($m['logo']) }}" alt="{{ $m['name'] }}" loading="lazy" />
                    </div>
                @endforeach
            @endfor
        </div>
        
        <!-- Track 2 (Right) -->
        <div class="cke-marquee__track cke-marquee__track--right">
            @for($i=0; $i<3; $i++)
                @foreach($mitras2 as $m)
                    <div class="cke-partner" title="{{ $m['name'] }}">
                        <img src="{{ asset($m['logo']) }}" alt="{{ $m['name'] }}" loading="lazy" />
                    </div>
                @endforeach
            @endfor
        </div>
    </div>
</section>
@endif

<!-- 7. Contact -->
<section id="kontak" class="cke-section cke-contact">
    <div class="cke-container cke-contact__grid">
        <div class="cke-contact__panel">
            <span class="cke-contact__kicker">// Hubungi Kami</span>
            <h2 class="cke-contact__h">Mari bangun bersama</h2>
            <p class="cke-contact__lead">Kami siap menjawab pertanyaan dan mendiskusikan kebutuhan proyek Anda.</p>

            <ul class="cke-contact__list">
                <li><span class="cke-contact__ico">@include('web.partials.icon', ['name' => 'phone'])</span>
                    <div><div class="k">Telepon</div><div class="v">{{ $contact_phone }}</div></div></li>
                <li><span class="cke-contact__ico">@include('web.partials.icon', ['name' => 'mail'])</span>
                    <div>
                        <div class="k">Email</div>
                        <div class="v">{{ $contact_email }}</div>
                        @if(!empty($contact_email_2))<div class="v">{{ $contact_email_2 }}</div>@endif
                    </div>
                </li>
                <li><span class="cke-contact__ico">@include('web.partials.icon', ['name' => 'map-pin'])</span>
                    <div><div class="k">Kantor</div><div class="v">{!! nl2br(e($contact_address)) !!}</div></div></li>
                <li><span class="cke-contact__ico">@include('web.partials.icon', ['name' => 'clock'])</span>
                    <div><div class="k">Jam Kerja</div><div class="v">Senin – Jumat · {{ $contact_hours_mon_fri }}<br>Sabtu · {{ $contact_hours_sat }}</div></div></li>
            </ul>
        </div>

        <div class="cke-contact__formwrap">
            @if(session('success'))
                <div class="cke-contact__success">
                    <span class="cke-contact__check">@include('web.partials.icon', ['name' => 'check'])</span>
                    <h3>Terima kasih!</h3>
                    <p>{{ session('success') }}</p>
                    <x-cke.button variant="outline" href="{{ url('/') }}#kontak">Kirim pesan lain</x-cke.button>
                </div>
            @else
                <form class="cke-contact__form" action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    
                    @if($errors->any())
                        <div style="background:var(--cke-danger-bg);color:var(--cke-danger);padding:1rem;border-radius:var(--radius-md);margin-bottom:1rem;font-size:var(--fs-sm);">
                            <strong>Terjadi Kesalahan!</strong>
                            <ul style="margin-top:0.5rem;padding-left:1rem;list-style:disc;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="cke-contact__two">
                        <x-cke.input label="Nama Lengkap" name="name" required placeholder="Nama Anda" value="{{ old('name') }}" error="{{ $errors->has('name') }}" />
                        <x-cke.input label="Email" name="email" required type="email" placeholder="anda@perusahaan.com" value="{{ old('email') }}" error="{{ $errors->has('email') }}" />
                    </div>
                    <div class="cke-contact__two">
                        <x-cke.input label="No. Telepon" name="phone" placeholder="+62" value="{{ old('phone') }}" error="{{ $errors->has('phone') }}" />
                        <x-cke.input label="Layanan" name="service" placeholder="mis. Batching Plant" value="{{ old('service') }}" error="{{ $errors->has('service') }}" />
                    </div>
                    <x-cke.input label="Pesan Anda" name="message" required multiline rows="4" placeholder="Ceritakan kebutuhan proyek Anda" error="{{ $errors->has('message') }}">{{ old('message') }}</x-cke.input>
                    <x-cke.button type="submit" variant="primary" block size="lg" iconRight="send">Kirim Pesan</x-cke.button>
                </form>
        @endif
        </div>
    </div>

    @if(!empty($settings['google_maps_url']))
    <div class="cke-container" style="margin-top: var(--space-8);">
        <div style="border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-md); border: 1px solid var(--border-subtle); height: 400px; width: 100%;">
            <iframe 
                src="{{ $settings['google_maps_url'] }}" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
    @endif
</section>

@endsection

@push('scripts')
<!-- Add Alpine.js for Experience Filter -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
