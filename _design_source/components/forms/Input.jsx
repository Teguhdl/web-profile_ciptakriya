import React from 'react';

const STYLE_ID = 'cke-field-styles';
const CSS = `
.cke-field{ display:flex; flex-direction:column; gap:.45rem; }
.cke-field__label{
  font-family:var(--font-body); font-weight:var(--fw-semibold); font-size:var(--fs-sm);
  color:var(--cke-navy-700);
}
.cke-field__label .req{ color:var(--cke-danger); margin-left:.15em; }
.cke-field__control{
  font-family:var(--font-body); font-size:var(--fs-base); color:var(--text-strong);
  background:var(--surface-card); border:var(--border-w) solid var(--border-default);
  border-radius:var(--radius-md); padding:.7rem .9rem; width:100%; box-sizing:border-box;
  transition:border-color var(--dur-fast) var(--ease-standard), box-shadow var(--dur-fast) var(--ease-standard);
}
.cke-field__control::placeholder{ color:var(--text-subtle); }
.cke-field__control:hover{ border-color:var(--border-strong); }
.cke-field__control:focus{ outline:none; border-color:var(--color-primary); box-shadow:0 0 0 3px var(--ring-brand); }
.cke-field__control:disabled{ background:var(--cke-steel-50); color:var(--text-subtle); cursor:not-allowed; }
.cke-field--error .cke-field__control{ border-color:var(--cke-danger); }
.cke-field--error .cke-field__control:focus{ box-shadow:0 0 0 3px color-mix(in srgb,var(--cke-danger) 30%,transparent); }
.cke-field__hint{ font-family:var(--font-body); font-size:var(--fs-xs); color:var(--text-muted); }
.cke-field--error .cke-field__hint{ color:var(--cke-danger); }
textarea.cke-field__control{ resize:vertical; min-height:7rem; line-height:var(--lh-normal); }
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

export function Input({
  label,
  required = false,
  hint,
  error = false,
  multiline = false,
  rows = 4,
  id,
  className = '',
  ...rest
}) {
  ensureStyles();
  const fieldId = id || (label ? `cke-${String(label).toLowerCase().replace(/[^a-z0-9]+/g, '-')}` : undefined);
  const cls = ['cke-field', error ? 'cke-field--error' : '', className].filter(Boolean).join(' ');
  return (
    <div className={cls}>
      {label && (
        <label className="cke-field__label" htmlFor={fieldId}>
          {label}{required && <span className="req">*</span>}
        </label>
      )}
      {multiline
        ? <textarea id={fieldId} className="cke-field__control" rows={rows} {...rest} />
        : <input id={fieldId} className="cke-field__control" {...rest} />}
      {hint && <span className="cke-field__hint">{hint}</span>}
    </div>
  );
}
