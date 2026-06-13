import React from 'react';

const STYLE_ID = 'cke-card-styles';
const CSS = `
.cke-card{
  display:flex; flex-direction:column; background:var(--surface-card);
  border:1px solid var(--border-subtle); border-radius:var(--radius-card);
  overflow:hidden; transition:box-shadow var(--dur-base) var(--ease-standard),
    transform var(--dur-base) var(--ease-standard), border-color var(--dur-base) var(--ease-standard);
}
.cke-card--pad{ padding:var(--space-5); }
.cke-card--flat{ box-shadow:none; }
.cke-card--raised{ box-shadow:var(--shadow-md); }
.cke-card--interactive{ cursor:pointer; }
.cke-card--interactive:hover{ box-shadow:var(--shadow-lg); transform:translateY(-3px); border-color:var(--cke-blue-200); }
.cke-card__media{ position:relative; overflow:hidden; background:var(--cke-steel-100); }
.cke-card__media img{ width:100%; height:100%; object-fit:cover; display:block;
  transition:transform var(--dur-slow) var(--ease-standard); }
.cke-card--interactive:hover .cke-card__media img{ transform:scale(1.06); }
.cke-card__body{ padding:var(--space-5); display:flex; flex-direction:column; gap:var(--space-2); flex:1; }
.cke-card__accent{ height:4px; background:linear-gradient(90deg,var(--cke-blue-500),var(--cke-green-500)); }
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

export function Card({
  children,
  elevation = 'raised',
  interactive = false,
  accent = false,
  media = null,
  mediaHeight = 200,
  padded = false,
  className = '',
  ...rest
}) {
  ensureStyles();
  const cls = [
    'cke-card',
    `cke-card--${elevation}`,
    interactive ? 'cke-card--interactive' : '',
    padded ? 'cke-card--pad' : '',
    className,
  ].filter(Boolean).join(' ');
  return (
    <div className={cls} {...rest}>
      {accent && <div className="cke-card__accent" />}
      {media && (
        <div className="cke-card__media" style={{ height: mediaHeight }}>
          {typeof media === 'string' ? <img src={media} alt="" /> : media}
        </div>
      )}
      {padded ? children : <div className="cke-card__body">{children}</div>}
    </div>
  );
}
