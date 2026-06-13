@extends('web.layouts.master')

@section('content')
<section class="cke-section cke-services" style="padding-top: 120px; background: var(--surface-default); min-height: 100vh;">
    <div class="cke-container">
        <x-cke.section-header align="center" eyebrow="// Bidang Usaha">
            <x-slot name="title">Layanan <em>Kami</em></x-slot>
        </x-cke.section-header>

        {{-- Search & Filter --}}
        <div style="margin-top: 3rem; margin-bottom: 3rem; display: flex; justify-content: center;">
            <form action="{{ url('layanan') }}" method="GET" style="display: flex; gap: 0.5rem; width: 100%; max-width: 500px;">
                <x-cke.input type="text" name="search" placeholder="Cari layanan..." value="{{ request('search') }}" style="flex: 1; margin: 0;" />
                <x-cke.button type="submit" variant="primary" style="margin-top: 0;">Cari</x-cke.button>
            </form>
        </div>

        <div class="cke-services__grid" id="product-container">
            @include('web.pages.partials.product-list')
        </div>
    </div>
</section>
@endsection