import React from 'react';

const STYLE_ID = 'cke-stat-styles';
const CSS = `
.cke-stat{ display:flex; flex-direction:column; gap:.2rem; }
.cke-stat__value{
  font-family:var(--font-display); font-weight:var(--fw-black); line-height:1;
  font-size:var(--fs-3xl); letter-spacing:var(--ls-tighter); color:var(--text-strong);
  display:flex; align-items:baseline; gap:.1em;
}
.cke-stat__suffix{ font-size:.55em; color:var(--color-primary); font-weight:var(--fw-bold); }
.cke-stat__label{
  font-family:var(--font-mono); font-size:var(--fs-xs); letter-spacing:var(--ls-wide);
  text-transform:uppercase; color:var(--text-muted);
}
.cke-stat--onDark .cke-stat__value{ color:#fff; }
.cke-stat--onDark .cke-stat__suffix{ color:var(--cke-lime); }
.cke-stat--onDark .cke-stat__label{ color:var(--cke-blue-100); }
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

export function Stat({ value, suffix, label, onDark = false, className = '', ...rest }) {
  ensureStyles();
  const cls = ['cke-stat', onDark ? 'cke-stat--onDark' : '', className].filter(Boolean).join(' ');
  return (
    <div className={cls} {...rest}>
      <div className="cke-stat__value">
        {value}
        {suffix && <span className="cke-stat__suffix">{suffix}</span>}
      </div>
      {label && <div className="cke-stat__label">{label}</div>}
    </div>
  );
}
