<!-- Footer -->
<footer class="cke-footer">
    <div class="cke-container cke-footer__grid">
        <div class="cke-footer__brand">
            <span class="cke-footer__chip">
                <img src="{{ asset('assets/web/logo/logo.png') }}" alt="CKE" style="height:40px; width:auto; object-fit:contain;" />
            </span>
            <p class="cke-footer__tag">{{ $settings['system_slogan'] ?? 'We Solve Your Problem — konstruksi mekanikal & elektrikal untuk industri.' }}</p>
            
            <div style="display:flex; gap:0.5rem; margin-top:1rem;">
                @if(isset($settings['social_facebook']))
                <a href="{{ $settings['social_facebook'] }}" target="_blank" style="width:36px; height:36px; background:rgba(255,255,255,0.1); border-radius:var(--radius-md); display:flex; align-items:center; justify-content:center; color:#fff; text-decoration:none; transition:background var(--dur-fast);">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 2h-3c-1.7 0-3 1.3-3 3v3H9v4h3v10h4V12h3l1-4h-4V5c0-.3.2-1 1-1h3V2z" /></svg>
                </a>
                @endif
                @if(isset($settings['social_instagram']))
                <a href="{{ $settings['social_instagram'] }}" target="_blank" style="width:36px; height:36px; background:rgba(255,255,255,0.1); border-radius:var(--radius-md); display:flex; align-items:center; justify-content:center; color:#fff; text-decoration:none; transition:background var(--dur-fast);">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
                @endif
            </div>
        </div>
        
        <div>
            <h4>Navigasi</h4>
            <ul>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ url('profil-perusahaan') }}">Tentang</a></li>
                <li><a href="{{ url('layanan') }}">Layanan</a></li>
                <li><a href="{{ url('portofolio') }}">Proyek</a></li>
                <li><a href="{{ url('mitra') }}">Mitra</a></li>
            </ul>
        </div>
        
        <div>
            <h4>Layanan</h4>
            <ul>
                <li>Konstruksi Mekanikal</li>
                <li>Konstruksi Elektrikal</li>
                <li>Batching Plant</li>
                <li>Pergudangan & Modifikasi</li>
            </ul>
        </div>
        
        <div>
            <h4>Kontak</h4>
            <ul class="cke-footer__contact">
                <li>@include('web.partials.icon', ['name' => 'phone', 'size' => 18]) {{ $settings['contact_phone'] ?? '0878-2264-1078' }}</li>
                <li>@include('web.partials.icon', ['name' => 'mail', 'size' => 18]) {{ $settings['contact_email'] ?? 'ciptakriyaengineering@gmail.com' }}</li>
                <li>@include('web.partials.icon', ['name' => 'map-pin', 'size' => 18]) {{ $settings['contact_address'] ?? 'Subang, Jawa Barat' }}</li>
            </ul>
        </div>
    </div>
    
    <div class="cke-footer__bar">
        <span>© {{ date('Y') }} {{ $settings['system_name'] ?? 'PT. Cipta Kriya Engineering' }}. All rights reserved.</span>
        <span class="cke-footer__npwp">NPWP 53.853.307.6-439.000</span>
    </div>
</footer>