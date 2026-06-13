import React from 'react';

const STYLE_ID = 'cke-button-styles';
const CSS = `
.cke-btn{
  --_bg: var(--color-primary);
  --_fg: #fff;
  --_bd: transparent;
  display:inline-flex; align-items:center; justify-content:center; gap:.55em;
  font-family:var(--font-body); font-weight:var(--fw-semibold); line-height:1;
  border:var(--border-w-thick) solid var(--_bd); border-radius:var(--radius-pill);
  background:var(--_bg); color:var(--_fg); cursor:pointer; white-space:nowrap;
  text-decoration:none; transition:background var(--dur-fast) var(--ease-standard),
    border-color var(--dur-fast) var(--ease-standard), transform var(--dur-fast) var(--ease-standard),
    box-shadow var(--dur-fast) var(--ease-standard); user-select:none;
}
.cke-btn:hover{ text-decoration:none; }
.cke-btn:active{ transform:translateY(1px); }
.cke-btn:focus-visible{ outline:none; box-shadow:0 0 0 4px var(--ring-brand); }
.cke-btn[disabled]{ opacity:.5; cursor:not-allowed; pointer-events:none; }

/* sizes */
.cke-btn--sm{ font-size:var(--fs-sm); padding:.5rem 1rem; }
.cke-btn--md{ font-size:var(--fs-base); padding:.7rem 1.5rem; }
.cke-btn--lg{ font-size:var(--fs-md); padding:.9rem 2rem; }

/* variants */
.cke-btn--primary{ --_bg:var(--color-primary); --_fg:#fff; box-shadow:var(--shadow-brand); }
.cke-btn--primary:hover{ --_bg:var(--color-primary-hover); }
.cke-btn--secondary{ --_bg:var(--color-secondary); --_fg:#fff; }
.cke-btn--secondary:hover{ --_bg:var(--color-secondary-hover); }
.cke-btn--outline{ --_bg:transparent; --_fg:var(--cke-navy-700); --_bd:var(--border-strong); }
.cke-btn--outline:hover{ --_bd:var(--color-primary); --_fg:var(--color-primary); }
.cke-btn--ghost{ --_bg:transparent; --_fg:var(--color-primary); --_bd:transparent; }
.cke-btn--ghost:hover{ --_bg:var(--surface-tint); }
.cke-btn--inverse{ --_bg:#fff; --_fg:var(--cke-navy-700); box-shadow:var(--shadow-md); }
.cke-btn--inverse:hover{ --_bg:var(--cke-blue-50); }
.cke-btn--block{ width:100%; }
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

export function Button({
  children,
  variant = 'primary',
  size = 'md',
  block = false,
  iconLeft = null,
  iconRight = null,
  href = null,
  type = 'button',
  disabled = false,
  className = '',
  ...rest
}) {
  ensureStyles();
  const cls = [
    'cke-btn',
    `cke-btn--${variant}`,
    `cke-btn--${size}`,
    block ? 'cke-btn--block' : '',
    className,
  ].filter(Boolean).join(' ');

  const content = (
    <>
      {iconLeft}
      {children && <span>{children}</span>}
      {iconRight}
    </>
  );

  if (href && !disabled) {
    return <a href={href} className={cls} {...rest}>{content}</a>;
  }
  return <button type={type} className={cls} disabled={disabled} {...rest}>{content}</button>;
}
