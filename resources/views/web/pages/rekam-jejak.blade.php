@extends('web.layouts.master')

@section('content')
<section class="cke-section cke-exp" style="padding-top: 120px; background: var(--surface-default); min-height: 100vh;">
    <div class="cke-container">
        <x-cke.section-header align="center" eyebrow="// Pengalaman Pekerjaan">
            <x-slot name="title">Rekam jejak <em>proyek</em> kami</x-slot>
        </x-cke.section-header>

        {{-- Search & Filter --}}
        <div style="margin-top: 3rem; margin-bottom: 3rem;">
            <form id="filter-form" action="{{ url('rekam-jejak') }}" method="GET" style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center; align-items: flex-end;">
                <div style="flex: 1; min-width: 200px; max-width: 300px;">
                    <x-cke.input type="text" name="search" label="Cari Klien / Pekerjaan" placeholder="Kata kunci..." value="{{ request('search') }}" />
                </div>
                <div style="flex: 1; min-width: 200px; max-width: 300px;">
                    <label class="cke-field__label" style="display:block; margin-bottom:0.45rem;">Tahun</label>
                    <select name="year" class="cke-field__control" style="cursor: pointer;">
                        <option value="">Semua Tahun</option>
                        @foreach($years as $year)
                            @if($year !== 'Semua')
                                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-cke.button type="submit" variant="primary" style="height: 48px;">Filter</x-cke.button>
                </div>
            </form>
        </div>

        <div class="cke-exp__ledger" style="margin-bottom: 2rem;">
            <div class="cke-exp__lhead">
                <span>Tahun</span><span>Klien</span><span>Lingkup Pekerjaan</span><span>Kategori</span>
            </div>
            
            <div id="experience-container">
                @include('web.pages.partials.experience-list')
            </div>
        </div>
        <p class="cke-exp__note" style="text-align: center; margin-top: 1.5rem;">
            Menampilkan sebagian dari rekam jejak proyek yang telah dipercayakan kepada kami.
        </p>
    </div>
</section>
@endsection
