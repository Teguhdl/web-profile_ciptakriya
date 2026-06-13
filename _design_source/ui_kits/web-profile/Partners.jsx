// CKE Web Profile — Stats strip (navy band) + Partners marquee
const { Stat: StatBlock, SectionHeader: PartHeader } = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;

const PARTNERS = [
  { name: 'SCG', logo: 'scg.png' },
  { name: 'Jayamix by SCG', logo: 'jayamix.png' },
  { name: 'Semen Padang', logo: 'semen-padang.png' },
  { name: 'Indocement — Tiga Roda', logo: 'indocement.png' },
  { name: 'Indofood', logo: 'indofood.png' },
  { name: 'Win Textile', logo: 'wintex.png' },
  { name: 'De Heus', logo: 'de-heus.png' },
  { name: 'Pionirbeton', logo: 'pionirbeton.png' },
];

function StatsStrip() {
  return (
    <section className="cke-stats">
      <div className="cke-container cke-stats__row">
        <StatBlock value="100" suffix="+" label="Proyek Selesai" onDark />
        <StatBlock value="14" suffix="+" label="Klien Korporat" onDark />
        <StatBlock value="6" label="Lini Layanan" onDark />
        <StatBlock value="100" suffix="%" label="Komitmen K3" onDark />
      </div>
    </section>
  );
}

function Partners() {
  const row1 = PARTNERS.slice(0, 4);
  const row2 = PARTNERS.slice(4);
  const Logo = ({ p }) => (
    <div className="cke-partner" title={p.name}>
      <img src={'../../assets/clients/' + p.logo} alt={p.name} loading="lazy" />
    </div>
  );
  return (
    <section id="mitra" className="cke-section cke-partners">
      <div className="cke-container">
        <PartHeader
          align="center"
          eyebrow="// Mitra & Klien"
          title={<>Dipercaya oleh <em>industri terkemuka</em></>}
          subtitle="Perusahaan yang telah mempercayakan kebutuhan proyeknya kepada kami."
        />
      </div>
      <div className="cke-marquee">
        <div className="cke-marquee__edge cke-marquee__edge--l"></div>
        <div className="cke-marquee__edge cke-marquee__edge--r"></div>
        <div className="cke-marquee__track cke-marquee__track--left">
          {[...row1, ...row1, ...row1].map((p, i) => <Logo key={'a' + i} p={p} />)}
        </div>
        <div className="cke-marquee__track cke-marquee__track--right">
          {[...row2, ...row2, ...row2].map((p, i) => <Logo key={'b' + i} p={p} />)}
        </div>
      </div>
    </section>
  );
}

window.CKEStatsStrip = StatsStrip;
window.CKEPartners = Partners;
