import React from 'react';

const STYLE_ID = 'cke-badge-styles';
const CSS = `
.cke-badge{
  display:inline-flex; align-items:center; gap:.4em;
  font-family:var(--font-mono); font-weight:var(--fw-medium);
  font-size:var(--fs-2xs); letter-spacing:var(--ls-wide); text-transform:uppercase;
  padding:.35em .7em; border-radius:var(--radius-pill); line-height:1;
  border:1px solid transparent;
}
.cke-badge .cke-badge__dot{ width:.5em; height:.5em; border-radius:50%; background:currentColor; }
.cke-badge--neutral{ background:var(--cke-steel-100); color:var(--cke-steel-600); }
.cke-badge--brand{ background:var(--cke-blue-50); color:var(--cke-blue-700); }
.cke-badge--green{ background:var(--cke-green-50); color:var(--cke-green-700); }
.cke-badge--success{ background:var(--cke-success-bg); color:var(--cke-success); }
.cke-badge--warning{ background:var(--cke-warning-bg); color:#a96c14; }
.cke-badge--danger{ background:var(--cke-danger-bg); color:var(--cke-danger); }
.cke-badge--solid{ background:var(--color-primary); color:#fff; }
.cke-badge--outline{ background:transparent; color:var(--cke-navy-600); border-color:var(--border-default); }
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

export function Badge({ children, tone = 'neutral', dot = false, className = '', ...rest }) {
  ensureStyles();
  const cls = ['cke-badge', `cke-badge--${tone}`, className].filter(Boolean).join(' ');
  return (
    <span className={cls} {...rest}>
      {dot && <span className="cke-badge__dot" />}
      {children}
    </span>
  );
}
