@extends('web.layouts.master')

@section('content')

<!-- 1. Hero -->
<section id="beranda" class="cke-hero">
    <div class="cke-hero__media" style="background-image: url('{{ asset('assets/web/photos/batching-plant.png') }}')"></div>
    <div class="cke-hero__scrim"></div>
    <div class="cke-hero__inner">
        <span class="cke-hero__eyebrow">// PT. Cipta Kriya Engineering — Subang, Jawa Barat</span>
        <h1 class="cke-hero__title">We Solve<br/>Your Problem</h1>
        <p class="cke-hero__lead">
            Mechanical & electrical construction, fabrication and installation
            for cement, ready-mix, mining and heavy industry across Indonesia.
        </p>
        <div class="cke-hero__cta">
            <x-cke.button size="lg" variant="primary" href="#kontak" iconRight="arrow-right">Hubungi Kami</x-cke.button>
            <x-cke.button size="lg" variant="inverse" href="#proyek">Lihat Proyek</x-cke.button>
        </div>
        <div class="cke-hero__tags">
            <span>@include('web.partials.icon', ['name' => 'shield-check', 'size' => 20]) Standar K3</span>
            <span>@include('web.partials.icon', ['name' => 'badge-check', 'size' => 20]) Berpengalaman sejak 2021</span>
            <span>@include('web.partials.icon', ['name' => 'map-pin', 'size' => 20]) Nasional</span>
        </div>
    </div>
</section>

<!-- 2. About -->
<section id="tentang" class="cke-section cke-about">
    <div class="cke-container cke-about__grid">
        <div class="cke-about__copy">
            <x-cke.section-header eyebrow="// Tentang Kami">
                <x-slot name="title">Mitra terpercaya untuk <em>proyek industri</em> Anda</x-slot>
            </x-cke.section-header>
            
            <p class="cke-about__p text-justify" style="margin-top: 1rem;">
                <strong>PT. Cipta Kriya Engineering</strong> adalah perusahaan konstruksi
                mekanikal & elektrikal yang berbasis di Kabupaten Subang, Jawa Barat. Kami
                menangani pembangunan dan instalasi batching plant, pekerjaan civil, perbaikan
                dan maintenance alat berat, hingga fabrikasi dan modifikasi.
            </p>
            <p class="cke-about__p text-justify">
                Didukung tenaga kerja profesional dan berpengalaman, kami berkomitmen memberikan
                hasil kerja berkualitas, tepat waktu, serta mengutamakan standar keselamatan
                kerja (K3) di setiap pelaksanaan proyek.
            </p>
            
            <div class="cke-about__chips" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
                <x-cke.badge tone="brand">Industri Semen</x-cke.badge>
                <x-cke.badge tone="green">Ready-Mix</x-cke.badge>
                <x-cke.badge tone="brand">Pertambangan</x-cke.badge>
                <x-cke.badge tone="green">FMCG</x-cke.badge>
                <x-cke.badge tone="brand">Peternakan</x-cke.badge>
            </div>
            
            <x-cke.button variant="outline" href="{{ url('layanan') }}" iconRight="arrow-right">Bidang Usaha Kami</x-cke.button>
        </div>

        <div class="cke-about__media">
            <div class="cke-about__photo cke-about__photo--back" style="background-image: url('{{ asset('assets/web/photos/site-loader.png') }}')"></div>
            <div class="cke-about__photo cke-about__photo--front" style="background-image: url('{{ asset('assets/web/photos/silo-fabrication.png') }}')"></div>
            <div class="cke-about__badge">
                <span class="cke-about__badge-num">100+</span>
                <span class="cke-about__badge-lbl">Proyek dipercayakan</span>
            </div>
        </div>
    </div>
</section>

<!-- 3. Services -->
<section id="layanan" class="cke-section cke-services">
    <div class="cke-container">
        <x-cke.section-header align="center" eyebrow="// Bidang Usaha" subtitle="Enam lini layanan inti untuk mendukung kebutuhan proyek industri dari hulu ke hilir.">
            <x-slot name="title">Apa yang kami <em>kerjakan</em></x-slot>
        </x-cke.section-header>
        
        <div class="cke-services__grid" style="margin-top: 3rem;">
            @php
            $static_services = [
              ['icon' => 'cog', 'title' => 'Konstruksi Mekanikal', 'desc' => 'Fabrikasi & erection struktur mekanikal berat, conveyor, screw, dan bucket elevator.'],
              ['icon' => 'zap', 'title' => 'Konstruksi Elektrikal', 'desc' => 'Panel listrik, instalasi daya, penarikan kabel, terminasi dan commissioning.'],
              ['icon' => 'wrench', 'title' => 'Instalasi & Maintenance', 'desc' => 'Perbaikan dan perawatan alat berat, silo, mixer dan unit produksi.'],
              ['icon' => 'factory', 'title' => 'Batching Plant', 'desc' => 'Pembangunan, mobilisasi, dismantle dan improvement batching plant.'],
              ['icon' => 'warehouse', 'title' => 'Pergudangan', 'desc' => 'Pembangunan gudang, racking, lantai kerja dan ruang engineering.'],
              ['icon' => 'hammer', 'title' => 'Modifikasi & Fabrikasi', 'desc' => 'Pabrikasi baru, replating, modifikasi unit dan penggantian komponen.'],
            ];
            @endphp
            @foreach($static_services as $index => $s)
                <a href="{{ url('layanan') }}" class="block text-inherit no-underline">
                    <x-cke.service-card 
                        index="{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}" 
                        icon="{{ $s['icon'] }}" 
                        title="{{ $s['title'] }}" 
                        description="{{ $s['desc'] }}" 
                    />
                </a>
            @endforeach
        </div>
    </div>
</section>

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
            @php
            $static_projects = [
              ['img' => 'assets/web/photos/batching-plant.png', 'tag' => 'Batching Plant', 'tone' => 'brand', 'title' => 'Pembangunan Batching Plant Cimareme', 'client' => 'PT SCG Readymix Indonesia', 'year' => '2025'],
              ['img' => 'assets/web/photos/silo-fabrication.png', 'tag' => 'Fabrikasi', 'tone' => 'green', 'title' => 'Pabrikasi & Pemasangan Silo', 'client' => 'Storage Tank', 'year' => '2024'],
              ['img' => 'assets/web/photos/mechanical-work.png', 'tag' => 'Mekanikal', 'tone' => 'brand', 'title' => 'Bongkar Pasang Bearing Roller Crusher', 'client' => 'Industri Semen', 'year' => '2023'],
              ['img' => 'assets/web/photos/cooler-grate.png', 'tag' => 'Maintenance', 'tone' => 'green', 'title' => 'Penggantian Grate Plate Cooler', 'client' => 'Industri Semen', 'year' => '2023'],
              ['img' => 'assets/web/photos/site-loader.png', 'tag' => 'Civil & Install', 'tone' => 'brand', 'title' => 'Mobilisasi & Instalasi Batching Plant', 'client' => 'PT SCG Readymix — Sumbawa', 'year' => '2023'],
            ];
            @endphp
            @foreach($static_projects as $i => $p)
                <a href="{{ url('portofolio') }}" class="block text-inherit no-underline {{ $i === 0 ? 'cke-projects__feature' : '' }}">
                    <x-cke.card interactive accent media="{{ asset($p['img']) }}" mediaHeight="{{ $i === 0 ? '320px' : '200px' }}">
                        <x-cke.badge tone="{{ $p['tone'] }}">{{ $p['tag'] }}</x-cke.badge>
                        <h3 class="cke-projects__title">{{ $p['title'] }}</h3>
                        <div class="cke-projects__meta">
                            <span>@include('web.partials.icon', ['name' => 'building-2', 'size' => 16]) {{ $p['client'] }}</span>
                            <span class="cke-projects__year">{{ $p['year'] }}</span>
                        </div>
                    </x-cke.card>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- 5. Experience Ledger -->
@php
$experiences = [
  ['year' => '2026', 'client' => 'PT SCG Readymix Indonesia', 'scope' => 'Pekerjaan Solo Ring Road & pembuatan silo batu', 'cat' => 'Civil', 'tone' => 'brand'],
  ['year' => '2026', 'client' => 'PT Global Dairi Alami', 'scope' => 'Replating Versa (alat berat)', 'cat' => 'Fabrikasi', 'tone' => 'green'],
  ['year' => '2026', 'client' => 'PT Lintas Marga Sedaya', 'scope' => 'Perbaikan hydrant MO Kertajati — Astra Infratoll Road', 'cat' => 'Mekanikal', 'tone' => 'brand'],
  ['year' => '2026', 'client' => 'PT Prima Top Boga', 'scope' => 'Perbaikan & perluasan gudang sparepart dan ruang engineering', 'cat' => 'Pergudangan', 'tone' => 'green'],
  ['year' => '2025', 'client' => 'PT SCG Readymix Indonesia', 'scope' => 'Pembangunan Batching Plant Cimareme', 'cat' => 'Batching Plant', 'tone' => 'brand'],
  ['year' => '2025', 'client' => 'PT SCG Readymix Indonesia', 'scope' => 'Sediment pit & water treatment (Semarang)', 'cat' => 'Civil', 'tone' => 'brand'],
  ['year' => '2025', 'client' => 'Trans Studio Bandung', 'scope' => 'Service perahu', 'cat' => 'Maintenance', 'tone' => 'green'],
  ['year' => '2024', 'client' => 'PT SCG Pipe & Precast Indonesia', 'scope' => 'Jasa service berkala silo semen (type 1 & 5) — Plant 1 & 2', 'cat' => 'Maintenance', 'tone' => 'green'],
  ['year' => '2024', 'client' => 'PT Indoglas Jaya', 'scope' => 'Bongkar & pasang cone silo', 'cat' => 'Mekanikal', 'tone' => 'brand'],
  ['year' => '2024', 'client' => 'PT Pacific Prestress Indonesia', 'scope' => 'Vacuum lifter, NBR rubber pad & jasa services', 'cat' => 'Fabrikasi', 'tone' => 'green'],
  ['year' => '2023', 'client' => 'CV Sunardi MJR', 'scope' => 'Rekondisi batching plant — Proyek Bendungan Tiu Suntuk', 'cat' => 'Batching Plant', 'tone' => 'brand'],
  ['year' => '2023', 'client' => 'PT SCG Readymix Indonesia', 'scope' => 'Overhaul, civil & installation — Sumbawa New Batching', 'cat' => 'Batching Plant', 'tone' => 'brand'],
  ['year' => '2023', 'client' => 'PT Win Textile', 'scope' => 'Repair drying & heat setting Textino, mesin Bianco', 'cat' => 'Mekanikal', 'tone' => 'brand'],
  ['year' => '2022', 'client' => 'PT Universal Agri Bisnisindo', 'scope' => 'Fabrikasi & pemasangan lantai kerja, screw, pintu & sample pallet', 'cat' => 'Fabrikasi', 'tone' => 'green'],
  ['year' => '2022', 'client' => 'PT SCG Readymix Indonesia', 'scope' => 'Overhaul MBP-15 ex Pemalang, cleaning & painting fuel tank', 'cat' => 'Maintenance', 'tone' => 'green'],
];
$years = ['Semua', '2026', '2025', '2024', '2023', '2022'];
@endphp

<section id="pengalaman" class="cke-section cke-exp" x-data="{ filter: 'Semua' }">
    <div class="cke-container">
        <div class="cke-exp__head">
            <x-cke.section-header eyebrow="// Pengalaman Pekerjaan" subtitle="Sebagian dari pekerjaan yang telah kami selesaikan bersama klien industri.">
                <x-slot name="title">Rekam jejak <em>proyek</em> kami</x-slot>
            </x-cke.section-header>
            <div class="cke-exp__filter" role="tablist">
                @foreach($years as $y)
                    <button class="cke-exp__year" :class="{ 'is-active': filter === '{{ $y }}' }" @click="filter = '{{ $y }}'">{{ $y }}</button>
                @endforeach
            </div>
        </div>

        <div class="cke-exp__ledger">
            <div class="cke-exp__lhead">
                <span>Tahun</span><span>Klien</span><span>Lingkup Pekerjaan</span><span>Kategori</span>
            </div>
            
            @foreach($experiences as $e)
                <div class="cke-exp__row" x-show="filter === 'Semua' || filter === '{{ $e['year'] }}'" x-transition:enter="transition-all duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                    <span class="cke-exp__yr">{{ $e['year'] }}</span>
                    <span class="cke-exp__client">{{ $e['client'] }}</span>
                    <span class="cke-exp__scope">{{ $e['scope'] }}</span>
                    <span class="cke-exp__cat"><x-cke.badge tone="{{ $e['tone'] }}">{{ $e['cat'] }}</x-cke.badge></span>
                </div>
            @endforeach
        </div>
        <p class="cke-exp__note">Menampilkan sebagian dari 100+ proyek yang telah dipercayakan kepada kami.</p>
    </div>
</section>

<!-- 6. Stats & Partners -->
<section class="cke-stats">
    <div class="cke-container cke-stats__row">
        <x-cke.stat value="100" suffix="+" label="Proyek Selesai" onDark />
        <x-cke.stat value="14" suffix="+" label="Klien Korporat" onDark />
        <x-cke.stat value="6" label="Lini Layanan" onDark />
        <x-cke.stat value="100" suffix="%" label="Komitmen K3" onDark />
    </div>
</section>

<section id="mitra" class="cke-section cke-partners">
    <div class="cke-container">
        <x-cke.section-header align="center" eyebrow="// Mitra & Klien" subtitle="Perusahaan yang telah mempercayakan kebutuhan proyeknya kepada kami.">
            <x-slot name="title">Dipercaya oleh <em>industri terkemuka</em></x-slot>
        </x-cke.section-header>
    </div>
    
    @php
        $static_partners = [
          ['name' => 'SCG', 'logo' => 'assets/web/clients/scg.png'],
          ['name' => 'Jayamix by SCG', 'logo' => 'assets/web/clients/jayamix.png'],
          ['name' => 'Semen Padang', 'logo' => 'assets/web/clients/semen-padang.png'],
          ['name' => 'Indocement — Tiga Roda', 'logo' => 'assets/web/clients/indocement.png'],
          ['name' => 'Indofood', 'logo' => 'assets/web/clients/indofood.png'],
          ['name' => 'Win Textile', 'logo' => 'assets/web/clients/wintex.png'],
          ['name' => 'De Heus', 'logo' => 'assets/web/clients/de-heus.png'],
          ['name' => 'Pionirbeton', 'logo' => 'assets/web/clients/pionirbeton.png'],
        ];
        $half = ceil(count($static_partners) / 2);
        $mitras1 = array_slice($static_partners, 0, $half);
        $mitras2 = array_slice($static_partners, $half);
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
</section>

@endsection

@push('scripts')
<!-- Add Alpine.js for Experience Filter -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
