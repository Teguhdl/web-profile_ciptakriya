// CKE Web Profile — Hero (full-bleed site photo, navy wash, display headline)
const { Button: HeroButton } = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;

function Hero({ onNav }) {
  return (
    <section id="beranda" className="cke-hero">
      <div className="cke-hero__media" style={{ backgroundImage: "url('../../assets/photos/batching-plant.png')" }}></div>
      <div className="cke-hero__scrim"></div>
      <div className="cke-hero__inner">
        <span className="cke-hero__eyebrow">// PT. Cipta Kriya Engineering — Subang, Jawa Barat</span>
        <h1 className="cke-hero__title">We Solve<br/>Your Problem</h1>
        <p className="cke-hero__lead">
          Mechanical &amp; electrical construction, fabrication and installation
          for cement, ready-mix, mining and heavy industry across Indonesia.
        </p>
        <div className="cke-hero__cta">
          <HeroButton size="lg" variant="primary" onClick={() => onNav('kontak')} iconRight={<i data-lucide="arrow-right"></i>}>Hubungi Kami</HeroButton>
          <HeroButton size="lg" variant="inverse" onClick={() => onNav('proyek')}>Lihat Proyek</HeroButton>
        </div>
        <div className="cke-hero__tags">
          <span><i data-lucide="shield-check"></i> Standar K3</span>
          <span><i data-lucide="badge-check"></i> Berpengalaman sejak 2021</span>
          <span><i data-lucide="map-pin"></i> Nasional</span>
        </div>
      </div>
    </section>
  );
}

window.CKEHero = Hero;
