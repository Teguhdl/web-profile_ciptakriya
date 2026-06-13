@extends('web.layouts.master')

@section('content')
<section class="cke-section" style="padding-top: 120px; min-height: 100vh;">
    <div class="cke-container">
        
        <x-cke.section-header align="center" eyebrow="// Klien Kami">
            <x-slot name="title">Mitra & <em>Kerja Sama</em></x-slot>
        </x-cke.section-header>

        <div style="margin-top: 4rem; display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 2rem;">
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
            @endphp
            @foreach($static_partners as $mitra)
                <div class="cke-card cke-card--pad cke-card--raised" style="display: flex; align-items: center; justify-content: center; height: 120px; transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <img src="{{ asset($mitra['logo']) }}" alt="{{ $mitra['name'] }}" title="{{ $mitra['name'] }}" style="max-width: 100%; max-height: 100%; object-fit: contain; filter: grayscale(100%); transition: filter 0.3s;" onmouseover="this.style.filter='grayscale(0%)'" onmouseout="this.style.filter='grayscale(100%)'">
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Stats Strip from Dashboard -->
<section class="cke-stats" style="margin-top: 5rem;">
    <div class="cke-container cke-stats__row">
        <x-cke.stat value="100" suffix="+" label="Proyek Selesai" onDark />
        <x-cke.stat value="14" suffix="+" label="Klien Korporat" onDark />
        <x-cke.stat value="6" label="Lini Layanan" onDark />
        <x-cke.stat value="100" suffix="%" label="Komitmen K3" onDark />
    </div>
</section>
@endsection