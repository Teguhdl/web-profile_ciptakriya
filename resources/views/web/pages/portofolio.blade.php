@extends('web.layouts.master')

@section('content')
<section class="cke-section cke-projects" style="padding-top: 120px; background: var(--surface-default); min-height: 100vh;">
    <div class="cke-container">
        <x-cke.section-header align="center" eyebrow="// Dokumentasi Pekerjaan">
            <x-slot name="title">Proyek yang telah kami <em>selesaikan</em></x-slot>
        </x-cke.section-header>

        {{-- Search & Filter --}}
        <div style="margin-top: 3rem; margin-bottom: 3rem;">
            <form id="filter-form" action="{{ url('portofolio') }}" method="GET" style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center; align-items: flex-end;">
                <div style="flex: 1; min-width: 200px; max-width: 300px;">
                    <x-cke.input type="text" name="search" label="Cari Proyek" placeholder="Kata kunci..." value="{{ request('search') }}" />
                </div>
                <div style="flex: 1; min-width: 200px; max-width: 300px;">
                    <label class="cke-field__label" style="display:block; margin-bottom:0.45rem;">Tahun</label>
                    <select name="year" class="cke-field__control" style="cursor: pointer;">
                        <option value="">Semua Tahun</option>
                        @foreach($years as $year)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-cke.button type="submit" variant="primary" style="height: 48px;">Filter</x-cke.button>
                </div>
            </form>
        </div>

        <div class="cke-projects__grid" id="portfolio-container">
            @include('web.pages.partials.portfolio-list')
        </div>
    </div>
</section>
@endsection
