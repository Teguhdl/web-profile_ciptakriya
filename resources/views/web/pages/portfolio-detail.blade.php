@extends('web.layouts.master')

@section('content')
<section class="cke-section" style="padding-top: 140px; padding-bottom: 5rem; min-height: 100vh; background: var(--surface-bg);">
    <div class="cke-container">
        
        {{-- Tombol Kembali --}}
        <div style="margin-bottom: 2.5rem;">
            <a href="{{ url('/portofolio') }}" class="cke-btn cke-btn--ghost" style="display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none; font-weight: var(--fw-bold); color: var(--cke-navy-500); transition: all 0.3s ease;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="transform: rotate(180deg);"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                Kembali ke Portofolio
            </a>
        </div>

        {{-- Grid Utama Detail Portofolio --}}
        <div style="background: var(--surface-card); border-radius: var(--radius-2xl); border: 1px solid var(--border-color); box-shadow: var(--shadow-xl); overflow: hidden; padding: 2.5rem; transition: transform 0.3s ease;">
            
            <div class="cke-detail-grid" style="display: grid; grid-template-columns: 1fr; gap: 3rem;">
                
                {{-- Kiri: Galeri Gambar --}}
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    {{-- Gambar Utama --}}
                    <div id="main-image-container" style="position: relative; width: 100%; height: 480px; border-radius: var(--radius-xl); overflow: hidden; border: 1px solid var(--border-color); background: #f8fafc; display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-md);">
                        @if($portfolio->image)
                            <img id="main-project-image" src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.2s ease;">
                        @else
                            <div style="color: var(--text-muted); text-align: center;">
                                <svg width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" style="margin: 0 auto 1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375 0 11-.75 0 .375 0 01.75 0z"></path></svg>
                                <span>Tidak ada gambar proyek</span>
                            </div>
                        @endif
                    </div>

                    {{-- Mini Thumbnails (Jika ada lebih dari 1 gambar) --}}
                    @if($portfolio->images->count() > 0)
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(80px, 1fr)); gap: 0.75rem; margin-top: 0.5rem;">
                            {{-- Thumbnail Gambar Utama --}}
                            @if($portfolio->image)
                                <div class="gallery-thumb active" onclick="switchMainImage('{{ asset($portfolio->image) }}', this)" style="aspect-ratio: 1; border-radius: var(--radius-lg); overflow: hidden; cursor: pointer; border: 2px solid var(--cke-navy-500); opacity: 1; transition: all 0.2s ease;">
                                    <img src="{{ asset($portfolio->image) }}" alt="Main Image Thumb" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            @endif

                            {{-- Gambar Pendukung dari Galeri --}}
                            @foreach($portfolio->images as $galleryImg)
                                <div class="gallery-thumb" onclick="switchMainImage('{{ asset($galleryImg->image_path) }}', this)" style="aspect-ratio: 1; border-radius: var(--radius-lg); overflow: hidden; cursor: pointer; border: 2px solid transparent; opacity: 0.6; transition: all 0.2s ease;" onmouseover="this.style.opacity='1'" onmouseout="if(!this.classList.contains('active')) this.style.opacity='0.6'">
                                    <img src="{{ asset($galleryImg->image_path) }}" alt="Gallery Thumb" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Kanan: Detail Informasi --}}
                <div style="display: flex; flex-direction: column; justify-content: space-between; gap: 2rem;">
                    <div>
                        {{-- Kategori Badge --}}
                        <div style="margin-bottom: 1.25rem;">
                            <x-cke.badge tone="{{ $portfolio->tone ?? 'brand' }}" style="font-size: var(--fs-sm); font-weight: var(--fw-semibold); text-transform: uppercase; letter-spacing: 0.05em; padding: 0.4rem 1rem;">
                                {{ $portfolio->tag ?? 'Proyek' }}
                            </x-cke.badge>
                        </div>

                        {{-- Judul Proyek --}}
                        <h1 style="font-family: var(--font-display); font-weight: var(--fw-black); font-size: var(--fs-4xl); color: var(--text-strong); margin-bottom: 2rem; line-height: 1.2;">
                            {{ $portfolio->title }}
                        </h1>

                        {{-- Metadata Section --}}
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2.5rem; border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color); padding: 1.5rem 0;">
                            <div>
                                <span style="display: block; font-size: var(--fs-xs); text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted); font-weight: var(--fw-bold); margin-bottom: 0.25rem;">Klien / Instansi</span>
                                <span style="font-size: var(--fs-lg); font-weight: var(--fw-semibold); color: var(--text-strong);">{{ $portfolio->client ?? 'Rahasia / Internal' }}</span>
                            </div>
                            <div>
                                <span style="display: block; font-size: var(--fs-xs); text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted); font-weight: var(--fw-bold); margin-bottom: 0.25rem;">Tahun Pengerjaan</span>
                                <span style="font-size: var(--fs-lg); font-weight: var(--fw-semibold); color: var(--text-strong);">{{ $portfolio->year ?? '-' }}</span>
                            </div>
                        </div>

                        {{-- Deskripsi Proyek --}}
                        <div>
                            <h3 style="font-family: var(--font-display); font-weight: var(--fw-bold); font-size: var(--fs-lg); color: var(--text-strong); margin-bottom: 0.75rem;">Deskripsi Proyek</h3>
                            <div class="prose prose-red text-justify" style="font-size: var(--fs-base); line-height: 1.7; color: var(--text-muted); white-space: pre-line;">
                                {!! nl2br(e($portfolio->description)) !!}
                            </div>
                        </div>
                    </div>

                    {{-- Hubungi / CTA --}}
                    <div style="margin-top: 1.5rem; border-top: 1px solid var(--border-color); padding-top: 1.5rem;">
                        <x-cke.button variant="primary" href="{{ url('/') }}#kontak" style="width: 100%; justify-content: center; font-size: var(--fs-base); padding: 0.875rem 2rem;">
                            Konsultasikan Proyek Serupa
                        </x-cke.button>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<script>
    function switchMainImage(imageUrl, thumbElement) {
        // Ganti URL gambar utama dengan transisi halus
        const mainImage = document.getElementById('main-project-image');
        if (mainImage) {
            mainImage.style.opacity = '0.3';
            setTimeout(() => {
                mainImage.src = imageUrl;
                mainImage.style.opacity = '1';
            }, 100);
        }

        // Hapus class active & reset styling dari semua thumbnail
        const thumbs = document.querySelectorAll('.gallery-thumb');
        thumbs.forEach(t => {
            t.classList.remove('active');
            t.style.border = '2px solid transparent';
            t.style.opacity = '0.6';
        });

        // Set thumbnail terpilih menjadi active
        thumbElement.classList.add('active');
        thumbElement.style.border = '2px solid var(--cke-navy-500)';
        thumbElement.style.opacity = '1';
    }
</script>

<style>
    /* Styling responsif grid utama */
    @media (min-width: 1024px) {
        .cke-detail-grid {
            grid-template-columns: 1.3fr 1fr !important;
        }
    }
    
    .gallery-thumb {
        transition: all 0.2s ease;
    }
    
    .gallery-thumb:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-sm);
    }
    
    .gallery-thumb.active {
        box-shadow: var(--shadow-md);
    }
</style>
@endsection
