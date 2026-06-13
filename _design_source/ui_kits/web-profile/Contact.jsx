// CKE Web Profile — Contact (navy info panel + form) and Footer
const { Input: CInput, Button: CButton, Badge: CBadge } = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;

function Contact() {
  const [sent, setSent] = React.useState(false);
  const submit = (e) => { e.preventDefault(); setSent(true); };

  return (
    <section id="kontak" className="cke-section cke-contact">
      <div className="cke-container cke-contact__grid">
        <div className="cke-contact__panel">
          <span className="cke-contact__kicker">// Hubungi Kami</span>
          <h2 className="cke-contact__h">Mari bangun bersama</h2>
          <p className="cke-contact__lead">Kami siap menjawab pertanyaan dan mendiskusikan kebutuhan proyek Anda.</p>

          <ul className="cke-contact__list">
            <li><span className="cke-contact__ico"><i data-lucide="phone"></i></span>
              <div><div className="k">Telepon</div><div className="v">0878-2264-1078</div></div></li>
            <li><span className="cke-contact__ico"><i data-lucide="mail"></i></span>
              <div><div className="k">Email</div><div className="v">ciptakriyaengineering@gmail.com</div></div></li>
            <li><span className="cke-contact__ico"><i data-lucide="map-pin"></i></span>
              <div><div className="k">Kantor</div><div className="v">Jl. Raya Cibeunying, Kec. Cipendeuy,<br/>Kabupaten Subang, Jawa Barat</div></div></li>
            <li><span className="cke-contact__ico"><i data-lucide="clock"></i></span>
              <div><div className="k">Jam Kerja</div><div className="v">Sen – Jum · 08.00 – 17.00 WIB</div></div></li>
          </ul>
        </div>

        <div className="cke-contact__formwrap">
          {sent ? (
            <div className="cke-contact__success">
              <span className="cke-contact__check"><i data-lucide="check"></i></span>
              <h3>Terima kasih!</h3>
              <p>Pesan Anda telah terkirim. Tim kami akan menghubungi Anda kembali.</p>
              <CButton variant="outline" onClick={() => setSent(false)}>Kirim pesan lain</CButton>
            </div>
          ) : (
            <form className="cke-contact__form" onSubmit={submit}>
              <div className="cke-contact__two">
                <CInput label="Nama Lengkap" required placeholder="Nama Anda" />
                <CInput label="Email" required type="email" placeholder="anda@perusahaan.com" />
              </div>
              <div className="cke-contact__two">
                <CInput label="No. Telepon" placeholder="+62" />
                <CInput label="Layanan" placeholder="mis. Batching Plant" />
              </div>
              <CInput label="Pesan Anda" required multiline rows={4} placeholder="Ceritakan kebutuhan proyek Anda" />
              <CButton type="submit" variant="primary" block size="lg" iconRight={<i data-lucide="send"></i>}>Kirim Pesan</CButton>
            </form>
          )}
        </div>
      </div>
    </section>
  );
}

function Footer({ onNav }) {
  const links = [
    { id: 'beranda', label: 'Beranda' }, { id: 'tentang', label: 'Tentang' },
    { id: 'layanan', label: 'Layanan' }, { id: 'proyek', label: 'Proyek' }, { id: 'mitra', label: 'Mitra' },
  ];
  return (
    <footer className="cke-footer">
      <div className="cke-container cke-footer__grid">
        <div className="cke-footer__brand">
          <span className="cke-footer__chip"><img src="../../assets/logo/cke-logomark.png" alt="CKE" /></span>
          <p className="cke-footer__tag">We Solve Your Problem — konstruksi mekanikal &amp; elektrikal untuk industri.</p>
        </div>
        <div>
          <h4>Navigasi</h4>
          <ul>{links.map((l) => (
            <li key={l.id}><a href={'#' + l.id} onClick={(e) => { e.preventDefault(); onNav(l.id); }}>{l.label}</a></li>
          ))}</ul>
        </div>
        <div>
          <h4>Layanan</h4>
          <ul>
            <li>Konstruksi Mekanikal</li><li>Konstruksi Elektrikal</li>
            <li>Batching Plant</li><li>Pergudangan & Modifikasi</li>
          </ul>
        </div>
        <div>
          <h4>Kontak</h4>
          <ul className="cke-footer__contact">
            <li><i data-lucide="phone"></i> 0878-2264-1078</li>
            <li><i data-lucide="mail"></i> ciptakriyaengineering@gmail.com</li>
            <li><i data-lucide="map-pin"></i> Cipendeuy, Subang, Jawa Barat</li>
          </ul>
        </div>
      </div>
      <div className="cke-footer__bar">
        <span>© 2026 PT. Cipta Kriya Engineering. All rights reserved.</span>
        <span className="cke-footer__npwp">NPWP 53.853.307.6-439.000</span>
      </div>
    </footer>
  );
}

window.CKEContact = Contact;
window.CKEFooter = Footer;
