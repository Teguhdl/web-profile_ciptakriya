// CKE Web Profile — Header (fixed nav, transparent over hero, solid on scroll)
const { Button } = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;

function Header({ onNav }) {
  const [scrolled, setScrolled] = React.useState(false);
  const [open, setOpen] = React.useState(false);

  React.useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 40);
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
    return () => window.removeEventListener('scroll', onScroll);
  }, []);

  const links = [
    { id: 'beranda', label: 'Beranda' },
    { id: 'tentang', label: 'Tentang Kami' },
    { id: 'layanan', label: 'Layanan' },
    { id: 'proyek', label: 'Proyek' },
    { id: 'pengalaman', label: 'Pengalaman' },
    { id: 'mitra', label: 'Mitra' },
  ];

  const go = (id) => { setOpen(false); onNav(id); };

  return (
    <header className={'cke-hd' + (scrolled ? ' cke-hd--solid' : '')}>
      <div className="cke-hd__inner">
        <a className="cke-hd__brand" href="#beranda" onClick={(e) => { e.preventDefault(); go('beranda'); }}>
          <span className="cke-hd__logochip">
            <img src="../../assets/logo/cke-logomark.png" alt="Cipta Kriya Engineering" />
          </span>
          <span className="cke-hd__wordmark">
            <strong>CIPTA KRIYA</strong>
            <em>ENGINEERING</em>
          </span>
        </a>

        <nav className="cke-hd__nav">
          {links.map((l) => (
            <a key={l.id} href={'#' + l.id} className="cke-hd__link"
               onClick={(e) => { e.preventDefault(); go(l.id); }}>{l.label}</a>
          ))}
          <Button size="sm" variant="primary" onClick={() => go('kontak')}>Kontak</Button>
        </nav>

        <button className="cke-hd__burger" aria-label="Menu" onClick={() => setOpen(!open)}>
          <i data-lucide={open ? 'x' : 'menu'}></i>
        </button>
      </div>

      {open && (
        <div className="cke-hd__mobile">
          {links.map((l) => (
            <a key={l.id} href={'#' + l.id} onClick={(e) => { e.preventDefault(); go(l.id); }}>{l.label}</a>
          ))}
          <Button variant="primary" block onClick={() => go('kontak')}>Kontak</Button>
        </div>
      )}
    </header>
  );
}

window.CKEHeader = Header;
