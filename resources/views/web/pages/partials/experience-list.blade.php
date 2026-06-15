@forelse($experiences as $e)
    <div class="cke-exp__row">
        <span class="cke-exp__yr">{{ $e->year }}</span>
        <span class="cke-exp__client">{{ $e->client }}</span>
        <span class="cke-exp__scope">{{ $e->scope }}</span>
        <span class="cke-exp__cat"><x-cke.badge tone="{{ $e->tone }}">{{ $e->category }}</x-cke.badge></span>
    </div>
@empty
    <div style="text-align: center; padding: 4rem 2rem; color: var(--text-muted); background: var(--surface-card);">
        Belum ada rekam jejak pekerjaan yang terdaftar.
    </div>
@endforelse

@if($experiences->hasPages())
    <div style="padding: 2rem 1.5rem; background: var(--surface-card); border-top: 1px solid var(--border-subtle); display: flex; justify-content: center;">
        {{ $experiences->links('web.layouts.pagination') }}
    </div>
@endif
