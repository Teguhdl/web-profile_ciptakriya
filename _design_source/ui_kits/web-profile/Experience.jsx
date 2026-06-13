// CKE Web Profile — Pengalaman Pekerjaan (work experience ledger with year filter)
const { SectionHeader: ExpHeader, Badge: ExpBadge } = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;

const EXPERIENCE = [
  { year: '2026', client: 'PT SCG Readymix Indonesia', scope: 'Pekerjaan Solo Ring Road & pembuatan silo batu', cat: 'Civil', tone: 'brand' },
  { year: '2026', client: 'PT Global Dairi Alami', scope: 'Replating Versa (alat berat)', cat: 'Fabrikasi', tone: 'green' },
  { year: '2026', client: 'PT Lintas Marga Sedaya', scope: 'Perbaikan hydrant MO Kertajati — Astra Infratoll Road', cat: 'Mekanikal', tone: 'brand' },
  { year: '2026', client: 'PT Prima Top Boga', scope: 'Perbaikan & perluasan gudang sparepart dan ruang engineering', cat: 'Pergudangan', tone: 'green' },
  { year: '2025', client: 'PT SCG Readymix Indonesia', scope: 'Pembangunan Batching Plant Cimareme', cat: 'Batching Plant', tone: 'brand' },
  { year: '2025', client: 'PT SCG Readymix Indonesia', scope: 'Sediment pit & water treatment (Semarang)', cat: 'Civil', tone: 'brand' },
  { year: '2025', client: 'Trans Studio Bandung', scope: 'Service perahu', cat: 'Maintenance', tone: 'green' },
  { year: '2024', client: 'PT SCG Pipe & Precast Indonesia', scope: 'Jasa service berkala silo semen (type 1 & 5) — Plant 1 & 2', cat: 'Maintenance', tone: 'green' },
  { year: '2024', client: 'PT Indoglas Jaya', scope: 'Bongkar & pasang cone silo', cat: 'Mekanikal', tone: 'brand' },
  { year: '2024', client: 'PT Pacific Prestress Indonesia', scope: 'Vacuum lifter, NBR rubber pad & jasa services', cat: 'Fabrikasi', tone: 'green' },
  { year: '2023', client: 'CV Sunardi MJR', scope: 'Rekondisi batching plant — Proyek Bendungan Tiu Suntuk', cat: 'Batching Plant', tone: 'brand' },
  { year: '2023', client: 'PT SCG Readymix Indonesia', scope: 'Overhaul, civil & installation — Sumbawa New Batching', cat: 'Batching Plant', tone: 'brand' },
  { year: '2023', client: 'PT Win Textile', scope: 'Repair drying & heat setting Textino, mesin Bianco', cat: 'Mekanikal', tone: 'brand' },
  { year: '2022', client: 'PT Universal Agri Bisnisindo', scope: 'Fabrikasi & pemasangan lantai kerja, screw, pintu & sample pallet', cat: 'Fabrikasi', tone: 'green' },
  { year: '2022', client: 'PT SCG Readymix Indonesia', scope: 'Overhaul MBP-15 ex Pemalang, cleaning & painting fuel tank', cat: 'Maintenance', tone: 'green' },
];

const YEARS = ['Semua', '2026', '2025', '2024', '2023', '2022'];

function Experience() {
  const [filter, setFilter] = React.useState('Semua');
  const rows = filter === 'Semua' ? EXPERIENCE : EXPERIENCE.filter((e) => e.year === filter);

  return (
    <section id="pengalaman" className="cke-section cke-exp">
      <div className="cke-container">
        <div className="cke-exp__head">
          <ExpHeader
            eyebrow="// Pengalaman Pekerjaan"
            title={<>Rekam jejak <em>proyek</em> kami</>}
            subtitle="Sebagian dari pekerjaan yang telah kami selesaikan bersama klien industri."
          />
          <div className="cke-exp__filter" role="tablist">
            {YEARS.map((y) => (
              <button key={y}
                className={'cke-exp__year' + (filter === y ? ' is-active' : '')}
                onClick={() => setFilter(y)}>{y}</button>
            ))}
          </div>
        </div>

        <div className="cke-exp__ledger">
          <div className="cke-exp__lhead">
            <span>Tahun</span><span>Klien</span><span>Lingkup Pekerjaan</span><span>Kategori</span>
          </div>
          {rows.map((e, i) => (
            <div className="cke-exp__row" key={i}>
              <span className="cke-exp__yr">{e.year}</span>
              <span className="cke-exp__client">{e.client}</span>
              <span className="cke-exp__scope">{e.scope}</span>
              <span className="cke-exp__cat"><ExpBadge tone={e.tone}>{e.cat}</ExpBadge></span>
            </div>
          ))}
        </div>
        <p className="cke-exp__note">Menampilkan {rows.length} dari 100+ proyek yang telah dipercayakan kepada kami.</p>
      </div>
    </section>
  );
}

window.CKEExperience = Experience;
