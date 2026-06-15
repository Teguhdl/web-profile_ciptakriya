@extends('web.layouts.master')

@section('content')
<section class="cke-section" style="padding-top: 140px; padding-bottom: 80px; min-height: 70vh; display: flex; align-items: center;">
    <div class="cke-container" style="text-align: center; max-width: 600px; margin: 0 auto;">
        
        <h1 style="font-family: var(--font-display); font-size: 7rem; font-weight: var(--fw-black); color: var(--color-primary); line-height: 1; margin-bottom: 1rem;">
            404
        </h1>

        <h2 style="font-family: var(--font-display); font-size: var(--fs-3xl); font-weight: var(--fw-bold); color: var(--text-strong); margin-bottom: 1.5rem;">
            Halaman Tidak Ditemukan
        </h2>

        <p class="cke-about__p" style="margin-bottom: 2.5rem; text-align: center;">
            Maaf, halaman yang Anda cari tidak dapat ditemukan. Mungkin telah dipindahkan, dihapus, atau alamat URL yang dimasukkan salah.
        </p>

        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <x-cke.button variant="primary" href="{{ url('/') }}" iconRight="arrow-right">Kembali ke Beranda</x-cke.button>
            <x-cke.button variant="outline" href="{{ url('/produk') }}">Lihat Produk Kami</x-cke.button>
        </div>
        
    </div>
</section>
@endsection
