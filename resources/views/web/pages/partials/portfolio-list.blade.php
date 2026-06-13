@php
$static_projects = [
  ['img' => 'assets/web/dashboard/background-1.jpg', 'tag' => 'Batching Plant', 'tone' => 'brand', 'title' => 'Pembangunan Batching Plant Cimareme', 'client' => 'PT SCG Readymix Indonesia', 'year' => '2025'],
  ['img' => 'assets/web/dashboard/background-2.jpg', 'tag' => 'Fabrikasi', 'tone' => 'green', 'title' => 'Pabrikasi & Pemasangan Silo', 'client' => 'Storage Tank', 'year' => '2024'],
  ['img' => 'assets/web/dashboard/dashboard.webp', 'tag' => 'Mekanikal', 'tone' => 'brand', 'title' => 'Bongkar Pasang Bearing Roller Crusher', 'client' => 'Industri Semen', 'year' => '2023'],
  ['img' => 'assets/web/dashboard/background-1.jpg', 'tag' => 'Maintenance', 'tone' => 'green', 'title' => 'Penggantian Grate Plate Cooler', 'client' => 'Industri Semen', 'year' => '2023'],
  ['img' => 'assets/web/dashboard/background-2.jpg', 'tag' => 'Civil & Install', 'tone' => 'brand', 'title' => 'Mobilisasi & Instalasi Batching Plant', 'client' => 'PT SCG Readymix — Sumbawa', 'year' => '2023'],
];
@endphp

@foreach($static_projects as $i => $p)
    <a href="{{ url('portofolio') }}" class="block text-inherit no-underline">
        <x-cke.card interactive accent media="{{ asset($p['img']) }}" mediaHeight="240px">
            <x-cke.badge tone="{{ $p['tone'] }}">{{ $p['tag'] }}</x-cke.badge>
            <h3 class="cke-projects__title">{{ $p['title'] }}</h3>
            <div class="cke-projects__meta">
                <span>@include('web.partials.icon', ['name' => 'building-2', 'size' => 16]) {{ $p['client'] }}</span>
                <span class="cke-projects__year">{{ $p['year'] }}</span>
            </div>
        </x-cke.card>
    </a>
@endforeach
