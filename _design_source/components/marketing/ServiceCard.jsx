import React from 'react';

const STYLE_ID = 'cke-servicecard-styles';
const CSS = `
.cke-service{
  position:relative; display:flex; flex-direction:column; gap:var(--space-3);
  background:var(--surface-card); border:1px solid var(--border-subtle);
  border-radius:var(--radius-lg); padding:var(--space-6) var(--space-5);
  transition:box-shadow var(--dur-base) var(--ease-standard),
    transform var(--dur-base) var(--ease-standard), border-color var(--dur-base) var(--ease-standard);
  overflow:hidden;
}
.cke-service::before{
  content:""; position:absolute; left:0; top:0; bottom:0; width:3px;
  background:linear-gradient(180deg,var(--cke-blue-500),var(--cke-green-500));
  transform:scaleY(0); transform-origin:top; transition:transform var(--dur-base) var(--ease-out);
}
.cke-service:hover{ box-shadow:var(--shadow-lg); transform:translateY(-3px); border-color:var(--cke-blue-200); }
.cke-service:hover::before{ transform:scaleY(1); }
.cke-service__icon{
  width:52px; height:52px; border-radius:var(--radius-md);
  display:flex; align-items:center; justify-content:center;
  background:var(--cke-blue-50); color:var(--cke-blue-600);
  transition:background var(--dur-base) var(--ease-standard), color var(--dur-base) var(--ease-standard);
}
.cke-service:hover .cke-service__icon{ background:var(--cke-blue-500); color:#fff; }
.cke-service__index{
  position:absolute; top:var(--space-5); right:var(--space-5);
  font-family:var(--font-mono); font-size:var(--fs-sm); font-weight:var(--fw-medium);
  color:var(--cke-steel-300);
}
.cke-service__title{
  font-family:var(--font-display); font-weight:var(--fw-bold); font-size:var(--fs-lg);
  color:var(--text-strong); margin:0; letter-spacing:var(--ls-tight);
}
.cke-service__desc{
  font-family:var(--font-body); font-size:var(--fs-sm); line-height:var(--lh-relaxed);
  color:var(--text-muted); margin:0;
}
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

export function ServiceCard({ icon, title, description, index, className = '', ...rest }) {
  ensureStyles();
  const cls = ['cke-service', className].filter(Boolean).join(' ');
  return (
    <div className={cls} {...rest}>
      {index != null && <span className="cke-service__index">{index}</span>}
      {icon && <div className="cke-service__icon">{icon}</div>}
      <h3 className="cke-service__title">{title}</h3>
      {description && <p className="cke-service__desc">{description}</p>}
    </div>
  );
}
