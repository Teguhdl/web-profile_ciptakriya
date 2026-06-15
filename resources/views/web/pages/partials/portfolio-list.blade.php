@forelse($portfolios as $p)
    <a href="{{ route('portfolio.detail', $p) }}" class="block text-inherit no-underline">
        <x-cke.card interactive accent media="{{ asset($p->image ?? 'assets/web/dashboard/dashboard.webp') }}" mediaHeight="240px">
            <x-cke.badge tone="{{ $p->tone ?? 'brand' }}">{{ $p->tag ?? 'Proyek' }}</x-cke.badge>
            <h3 class="cke-projects__title">{{ $p->title }}</h3>
            <div class="cke-projects__meta">
                <span>@include('web.partials.icon', ['name' => 'building-2', 'size' => 16]) {{ $p->client ?? '-' }}</span>
                <span class="cke-projects__year">{{ $p->year }}</span>
            </div>
        </x-cke.card>
    </a>
@empty
    <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 2rem; color: var(--text-muted);">
        Belum ada proyek yang terdaftar.
    </div>
@endforelse
