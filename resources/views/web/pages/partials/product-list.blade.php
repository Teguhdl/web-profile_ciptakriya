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
