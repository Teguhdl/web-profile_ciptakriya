// CKE Web Profile — Services (Bidang Usaha grid)
const { SectionHeader: SvcHeader, ServiceCard: SvcCard } = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;

const SERVICES = [
  { icon: 'cog', title: 'Konstruksi Mekanikal', desc: 'Fabrikasi & erection struktur mekanikal berat, conveyor, screw, dan bucket elevator.' },
  { icon: 'zap', title: 'Konstruksi Elektrikal', desc: 'Panel listrik, instalasi daya, penarikan kabel, terminasi dan commissioning.' },
  { icon: 'wrench', title: 'Instalasi & Maintenance', desc: 'Perbaikan dan perawatan alat berat, silo, mixer dan unit produksi.' },
  { icon: 'factory', title: 'Batching Plant', desc: 'Pembangunan, mobilisasi, dismantle dan improvement batching plant.' },
  { icon: 'warehouse', title: 'Pergudangan', desc: 'Pembangunan gudang, racking, lantai kerja dan ruang engineering.' },
  { icon: 'hammer', title: 'Modifikasi & Fabrikasi', desc: 'Pabrikasi baru, replating, modifikasi unit dan penggantian komponen.' },
];

function Services() {
  return (
    <section id="layanan" className="cke-section cke-services">
      <div className="cke-container">
        <SvcHeader
          align="center"
          eyebrow="// Bidang Usaha"
          title={<>Apa yang kami <em>kerjakan</em></>}
          subtitle="Enam lini layanan inti untuk mendukung kebutuhan proyek industri dari hulu ke hilir."
        />
        <div className="cke-services__grid">
          {SERVICES.map((s, i) => (
            <SvcCard key={s.title} index={String(i + 1).padStart(2, '0')}
                     icon={<i data-lucide={s.icon}></i>}
                     title={s.title} description={s.desc} />
          ))}
        </div>
      </div>
    </section>
  );
}

window.CKEServices = Services;
