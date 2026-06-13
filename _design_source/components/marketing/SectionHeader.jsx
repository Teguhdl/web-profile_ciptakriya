import React from 'react';

const STYLE_ID = 'cke-sectionheader-styles';
const CSS = `
.cke-sh{ display:flex; flex-direction:column; gap:var(--space-3); max-width:680px; }
.cke-sh--center{ align-items:center; text-align:center; margin-inline:auto; }
.cke-sh__eyebrow{
  display:inline-flex; align-items:center; gap:.5em;
  font-family:var(--font-mono); font-weight:var(--fw-medium);
  font-size:var(--fs-xs); letter-spacing:var(--ls-eyebrow); text-transform:uppercase;
  color:var(--color-primary);
}
.cke-sh__eyebrow::before{ content:""; width:1.6em; height:2px; background:var(--color-primary); display:inline-block; }
.cke-sh--center .cke-sh__eyebrow::before{ display:none; }
.cke-sh__title{
  font-family:var(--font-display); font-weight:var(--fw-black);
  font-size:var(--fs-2xl); line-height:var(--lh-snug); letter-spacing:var(--ls-tight);
  color:var(--text-strong); margin:0;
}
.cke-sh__title em{ font-style:normal; color:var(--color-primary); }
.cke-sh__sub{
  font-family:var(--font-body); font-size:var(--fs-md); line-height:var(--lh-relaxed);
  color:var(--text-muted); margin:0;
}
.cke-sh--onDark .cke-sh__title{ color:#fff; }
.cke-sh--onDark .cke-sh__sub{ color:var(--cke-blue-100); }
.cke-sh--onDark .cke-sh__eyebrow{ color:var(--cke-blue-300); }
.cke-sh--onDark .cke-sh__eyebrow::before{ background:var(--cke-blue-300); }
`;

function ensureStyles() {
  if (typeof document === 'undefined') return;
  if (!document.getElementById(STYLE_ID)) {
    const el = document.createElement('style');
    el.id = STYLE_ID;
    el.textContent = CSS;
    document.head.appendChild(el);
  }
}

export function SectionHeader({
  eyebrow,
  title,
  subtitle,
  align = 'left',
  onDark = false,
  className = '',
  ...rest
}) {
  ensureStyles();
  const cls = [
    'cke-sh',
    align === 'center' ? 'cke-sh--center' : '',
    onDark ? 'cke-sh--onDark' : '',
    className,
  ].filter(Boolean).join(' ');
  return (
    <div className={cls} {...rest}>
      {eyebrow && <span className="cke-sh__eyebrow">{eyebrow}</span>}
      {title && <h2 className="cke-sh__title">{title}</h2>}
      {subtitle && <p className="cke-sh__sub">{subtitle}</p>}
    </div>
  );
}
