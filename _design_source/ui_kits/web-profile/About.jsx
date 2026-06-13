// CKE Web Profile — About (Tentang Kami: text + stacked photos)
const { SectionHeader: AboutHeader, Button: AboutButton, Badge: AboutBadge } = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;

function About({ onNav }) {
  return (
    <section id="tentang" className="cke-section cke-about">
      <div className="cke-container cke-about__grid">
        <div className="cke-about__copy">
          <AboutHeader
            eyebrow="// Tentang Kami"
            title={<>Mitra terpercaya untuk <em>proyek industri</em> Anda</>}
          />
          <p className="cke-about__p">
            <strong>PT. Cipta Kriya Engineering</strong> adalah perusahaan konstruksi
            mekanikal &amp; elektrikal yang berbasis di Kabupaten Subang, Jawa Barat. Kami
            menangani pembangunan dan instalasi batching plant, pekerjaan civil, perbaikan
            dan maintenance alat berat, hingga fabrikasi dan modifikasi.
          </p>
          <p className="cke-about__p">
            Didukung tenaga kerja profesional dan berpengalaman, kami berkomitmen memberikan
            hasil kerja berkualitas, tepat waktu, serta mengutamakan standar keselamatan
            kerja (K3) di setiap pelaksanaan proyek.
          </p>
          <div className="cke-about__chips">
            <AboutBadge tone="brand">Industri Semen</AboutBadge>
            <AboutBadge tone="green">Ready-Mix</AboutBadge>
            <AboutBadge tone="brand">Pertambangan</AboutBadge>
            <AboutBadge tone="green">FMCG</AboutBadge>
            <AboutBadge tone="brand">Peternakan</AboutBadge>
          </div>
          <AboutButton variant="outline" onClick={() => onNav('layanan')} iconRight={<i data-lucide="arrow-right"></i>}>
            Bidang Usaha Kami
          </AboutButton>
        </div>

        <div className="cke-about__media">
          <div className="cke-about__photo cke-about__photo--back"
               style={{ backgroundImage: "url('../../assets/photos/site-loader.png')" }}></div>
          <div className="cke-about__photo cke-about__photo--front"
               style={{ backgroundImage: "url('../../assets/photos/silo-fabrication.png')" }}></div>
          <div className="cke-about__badge">
            <span className="cke-about__badge-num">100+</span>
            <span className="cke-about__badge-lbl">Proyek dipercayakan</span>
          </div>
        </div>
      </div>
    </section>
  );
}

window.CKEAbout = About;
