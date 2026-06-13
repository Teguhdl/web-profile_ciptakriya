@extends('web.layouts.master')

@section('content')
<section class="cke-section" style="padding-top: 120px; min-height: 100vh;">
    <div class="cke-container">
        
        <x-cke.button variant="ghost" href="{{ url('layanan') }}" iconLeft="arrow-right" style="margin-bottom: 2rem; transform: scaleX(-1); display: inline-flex;"><span style="transform: scaleX(-1);">Kembali ke Layanan</span></x-cke.button>

        <div style="display: grid; grid-template-columns: 1fr; gap: 3rem;">
            @if($product->image)
            <div style="width: 100%; height: 400px; border-radius: var(--radius-lg); overflow: hidden; background: var(--surface-card); box-shadow: var(--shadow-md);">
                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            @endif

            <div>
                <x-cke.badge tone="brand" style="margin-bottom: 1rem;">Layanan Kami</x-cke.badge>
                <h1 style="font-family: var(--font-display); font-weight: var(--fw-black); font-size: var(--fs-4xl); color: var(--text-strong); margin-bottom: 1.5rem;">{{ $product->title }}</h1>
                
                <div class="cke-about__p prose prose-red max-w-none text-justify">
                    {!! $product->content !!}
                </div>
                
                <div style="margin-top: 3rem;">
                    <x-cke.button variant="primary" href="{{ url('/') }}#kontak">Konsultasi Layanan Ini</x-cke.button>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
