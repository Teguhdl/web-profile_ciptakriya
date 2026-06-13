// CKE Web Profile — Projects (Dokumentasi Pekerjaan)
const { SectionHeader: PrjHeader, Card, Badge: PrjBadge, Button: PrjButton } = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;

const PROJECTS = [
  { img: 'batching-plant.png', tag: 'Batching Plant', tone: 'brand', title: 'Pembangunan Batching Plant Cimareme', client: 'PT SCG Readymix Indonesia', year: '2025' },
  { img: 'silo-fabrication.png', tag: 'Fabrikasi', tone: 'green', title: 'Pabrikasi & Pemasangan Silo', client: 'Storage Tank', year: '2024' },
  { img: 'mechanical-work.png', tag: 'Mekanikal', tone: 'brand', title: 'Bongkar Pasang Bearing Roller Crusher', client: 'Industri Semen', year: '2023' },
  { img: 'cooler-grate.png', tag: 'Maintenance', tone: 'green', title: 'Penggantian Grate Plate Cooler', client: 'Industri Semen', year: '2023' },
  { img: 'site-loader.png', tag: 'Civil & Install', tone: 'brand', title: 'Mobilisasi & Instalasi Batching Plant', client: 'PT SCG Readymix — Sumbawa', year: '2023' },
];

function Projects({ onNav }) {
  return (
    <section id="proyek" className="cke-section cke-projects">
      <div className="cke-container">
        <div className="cke-projects__head">
          <PrjHeader
            eyebrow="// Dokumentasi Pekerjaan"
            title={<>Proyek yang telah kami <em>selesaikan</em></>}
          />
          <PrjButton variant="ghost" onClick={() => onNav('kontak')} iconRight={<i data-lucide="arrow-up-right"></i>}>
            Diskusikan proyek Anda
          </PrjButton>
        </div>

        <div className="cke-projects__grid">
          {PROJECTS.map((p, i) => (
            <Card key={p.title}
                  interactive accent
                  media={'../../assets/photos/' + p.img}
                  mediaHeight={i === 0 ? 320 : 200}
                  className={i === 0 ? 'cke-projects__feature' : ''}>
              <PrjBadge tone={p.tone}>{p.tag}</PrjBadge>
              <h3 className="cke-projects__title">{p.title}</h3>
              <div className="cke-projects__meta">
                <span><i data-lucide="building-2"></i> {p.client}</span>
                <span className="cke-projects__year">{p.year}</span>
              </div>
            </Card>
          ))}
        </div>
      </div>
    </section>
  );
}

window.CKEProjects = Projects;
