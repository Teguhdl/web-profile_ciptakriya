/* @ds-bundle: {"format":3,"namespace":"CiptaKriyaEngineeringDesignSystem_d6b0c6","components":[{"name":"Badge","sourcePath":"components/core/Badge.jsx"},{"name":"Button","sourcePath":"components/core/Button.jsx"},{"name":"Card","sourcePath":"components/core/Card.jsx"},{"name":"Input","sourcePath":"components/forms/Input.jsx"},{"name":"SectionHeader","sourcePath":"components/marketing/SectionHeader.jsx"},{"name":"ServiceCard","sourcePath":"components/marketing/ServiceCard.jsx"},{"name":"Stat","sourcePath":"components/marketing/Stat.jsx"}],"sourceHashes":{"components/core/Badge.jsx":"cfabe3c9ebb7","components/core/Button.jsx":"e7671cca62a2","components/core/Card.jsx":"94c459eeaeab","components/forms/Input.jsx":"f7720b414571","components/marketing/SectionHeader.jsx":"f041d99090d3","components/marketing/ServiceCard.jsx":"3488563c347e","components/marketing/Stat.jsx":"c53948b2dbfe","ui_kits/web-profile/About.jsx":"42b801346dac","ui_kits/web-profile/Contact.jsx":"ce96f4aeffb5","ui_kits/web-profile/Experience.jsx":"e23bced90763","ui_kits/web-profile/Header.jsx":"831b41f61f20","ui_kits/web-profile/Hero.jsx":"42be6a59cf21","ui_kits/web-profile/Partners.jsx":"27724974467a","ui_kits/web-profile/Projects.jsx":"349a568911e6","ui_kits/web-profile/Services.jsx":"8355b323af07"},"inlinedExternals":[],"unexposedExports":[]} */

(() => {

const __ds_ns = (window.CiptaKriyaEngineeringDesignSystem_d6b0c6 = window.CiptaKriyaEngineeringDesignSystem_d6b0c6 || {});

const __ds_scope = {};

(__ds_ns.__errors = __ds_ns.__errors || []);

// components/core/Badge.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
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
function Badge({
  children,
  tone = 'neutral',
  dot = false,
  className = '',
  ...rest
}) {
  ensureStyles();
  const cls = ['cke-badge', `cke-badge--${tone}`, className].filter(Boolean).join(' ');
  return /*#__PURE__*/React.createElement("span", _extends({
    className: cls
  }, rest), dot && /*#__PURE__*/React.createElement("span", {
    className: "cke-badge__dot"
  }), children);
}
Object.assign(__ds_scope, { Badge });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/Badge.jsx", error: String((e && e.message) || e) }); }

// components/core/Button.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
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
function Button({
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
  const cls = ['cke-btn', `cke-btn--${variant}`, `cke-btn--${size}`, block ? 'cke-btn--block' : '', className].filter(Boolean).join(' ');
  const content = /*#__PURE__*/React.createElement(React.Fragment, null, iconLeft, children && /*#__PURE__*/React.createElement("span", null, children), iconRight);
  if (href && !disabled) {
    return /*#__PURE__*/React.createElement("a", _extends({
      href: href,
      className: cls
    }, rest), content);
  }
  return /*#__PURE__*/React.createElement("button", _extends({
    type: type,
    className: cls,
    disabled: disabled
  }, rest), content);
}
Object.assign(__ds_scope, { Button });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/Button.jsx", error: String((e && e.message) || e) }); }

// components/core/Card.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
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
function Card({
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
  const cls = ['cke-card', `cke-card--${elevation}`, interactive ? 'cke-card--interactive' : '', padded ? 'cke-card--pad' : '', className].filter(Boolean).join(' ');
  return /*#__PURE__*/React.createElement("div", _extends({
    className: cls
  }, rest), accent && /*#__PURE__*/React.createElement("div", {
    className: "cke-card__accent"
  }), media && /*#__PURE__*/React.createElement("div", {
    className: "cke-card__media",
    style: {
      height: mediaHeight
    }
  }, typeof media === 'string' ? /*#__PURE__*/React.createElement("img", {
    src: media,
    alt: ""
  }) : media), padded ? children : /*#__PURE__*/React.createElement("div", {
    className: "cke-card__body"
  }, children));
}
Object.assign(__ds_scope, { Card });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/Card.jsx", error: String((e && e.message) || e) }); }

// components/forms/Input.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
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
function Input({
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
  return /*#__PURE__*/React.createElement("div", {
    className: cls
  }, label && /*#__PURE__*/React.createElement("label", {
    className: "cke-field__label",
    htmlFor: fieldId
  }, label, required && /*#__PURE__*/React.createElement("span", {
    className: "req"
  }, "*")), multiline ? /*#__PURE__*/React.createElement("textarea", _extends({
    id: fieldId,
    className: "cke-field__control",
    rows: rows
  }, rest)) : /*#__PURE__*/React.createElement("input", _extends({
    id: fieldId,
    className: "cke-field__control"
  }, rest)), hint && /*#__PURE__*/React.createElement("span", {
    className: "cke-field__hint"
  }, hint));
}
Object.assign(__ds_scope, { Input });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/Input.jsx", error: String((e && e.message) || e) }); }

// components/marketing/SectionHeader.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
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
function SectionHeader({
  eyebrow,
  title,
  subtitle,
  align = 'left',
  onDark = false,
  className = '',
  ...rest
}) {
  ensureStyles();
  const cls = ['cke-sh', align === 'center' ? 'cke-sh--center' : '', onDark ? 'cke-sh--onDark' : '', className].filter(Boolean).join(' ');
  return /*#__PURE__*/React.createElement("div", _extends({
    className: cls
  }, rest), eyebrow && /*#__PURE__*/React.createElement("span", {
    className: "cke-sh__eyebrow"
  }, eyebrow), title && /*#__PURE__*/React.createElement("h2", {
    className: "cke-sh__title"
  }, title), subtitle && /*#__PURE__*/React.createElement("p", {
    className: "cke-sh__sub"
  }, subtitle));
}
Object.assign(__ds_scope, { SectionHeader });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/marketing/SectionHeader.jsx", error: String((e && e.message) || e) }); }

// components/marketing/ServiceCard.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
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
function ServiceCard({
  icon,
  title,
  description,
  index,
  className = '',
  ...rest
}) {
  ensureStyles();
  const cls = ['cke-service', className].filter(Boolean).join(' ');
  return /*#__PURE__*/React.createElement("div", _extends({
    className: cls
  }, rest), index != null && /*#__PURE__*/React.createElement("span", {
    className: "cke-service__index"
  }, index), icon && /*#__PURE__*/React.createElement("div", {
    className: "cke-service__icon"
  }, icon), /*#__PURE__*/React.createElement("h3", {
    className: "cke-service__title"
  }, title), description && /*#__PURE__*/React.createElement("p", {
    className: "cke-service__desc"
  }, description));
}
Object.assign(__ds_scope, { ServiceCard });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/marketing/ServiceCard.jsx", error: String((e && e.message) || e) }); }

// components/marketing/Stat.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
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
function Stat({
  value,
  suffix,
  label,
  onDark = false,
  className = '',
  ...rest
}) {
  ensureStyles();
  const cls = ['cke-stat', onDark ? 'cke-stat--onDark' : '', className].filter(Boolean).join(' ');
  return /*#__PURE__*/React.createElement("div", _extends({
    className: cls
  }, rest), /*#__PURE__*/React.createElement("div", {
    className: "cke-stat__value"
  }, value, suffix && /*#__PURE__*/React.createElement("span", {
    className: "cke-stat__suffix"
  }, suffix)), label && /*#__PURE__*/React.createElement("div", {
    className: "cke-stat__label"
  }, label));
}
Object.assign(__ds_scope, { Stat });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/marketing/Stat.jsx", error: String((e && e.message) || e) }); }

// ui_kits/web-profile/About.jsx
try { (() => {
// CKE Web Profile — About (Tentang Kami: text + stacked photos)
const {
  SectionHeader: AboutHeader,
  Button: AboutButton,
  Badge: AboutBadge
} = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;
function About({
  onNav
}) {
  return /*#__PURE__*/React.createElement("section", {
    id: "tentang",
    className: "cke-section cke-about"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-container cke-about__grid"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-about__copy"
  }, /*#__PURE__*/React.createElement(AboutHeader, {
    eyebrow: "// Tentang Kami",
    title: /*#__PURE__*/React.createElement(React.Fragment, null, "Mitra terpercaya untuk ", /*#__PURE__*/React.createElement("em", null, "proyek industri"), " Anda")
  }), /*#__PURE__*/React.createElement("p", {
    className: "cke-about__p"
  }, /*#__PURE__*/React.createElement("strong", null, "PT. Cipta Kriya Engineering"), " adalah perusahaan konstruksi mekanikal & elektrikal yang berbasis di Kabupaten Subang, Jawa Barat. Kami menangani pembangunan dan instalasi batching plant, pekerjaan civil, perbaikan dan maintenance alat berat, hingga fabrikasi dan modifikasi."), /*#__PURE__*/React.createElement("p", {
    className: "cke-about__p"
  }, "Didukung tenaga kerja profesional dan berpengalaman, kami berkomitmen memberikan hasil kerja berkualitas, tepat waktu, serta mengutamakan standar keselamatan kerja (K3) di setiap pelaksanaan proyek."), /*#__PURE__*/React.createElement("div", {
    className: "cke-about__chips"
  }, /*#__PURE__*/React.createElement(AboutBadge, {
    tone: "brand"
  }, "Industri Semen"), /*#__PURE__*/React.createElement(AboutBadge, {
    tone: "green"
  }, "Ready-Mix"), /*#__PURE__*/React.createElement(AboutBadge, {
    tone: "brand"
  }, "Pertambangan"), /*#__PURE__*/React.createElement(AboutBadge, {
    tone: "green"
  }, "FMCG"), /*#__PURE__*/React.createElement(AboutBadge, {
    tone: "brand"
  }, "Peternakan")), /*#__PURE__*/React.createElement(AboutButton, {
    variant: "outline",
    onClick: () => onNav('layanan'),
    iconRight: /*#__PURE__*/React.createElement("i", {
      "data-lucide": "arrow-right"
    })
  }, "Bidang Usaha Kami")), /*#__PURE__*/React.createElement("div", {
    className: "cke-about__media"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-about__photo cke-about__photo--back",
    style: {
      backgroundImage: "url('../../assets/photos/site-loader.png')"
    }
  }), /*#__PURE__*/React.createElement("div", {
    className: "cke-about__photo cke-about__photo--front",
    style: {
      backgroundImage: "url('../../assets/photos/silo-fabrication.png')"
    }
  }), /*#__PURE__*/React.createElement("div", {
    className: "cke-about__badge"
  }, /*#__PURE__*/React.createElement("span", {
    className: "cke-about__badge-num"
  }, "100+"), /*#__PURE__*/React.createElement("span", {
    className: "cke-about__badge-lbl"
  }, "Proyek dipercayakan")))));
}
window.CKEAbout = About;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/web-profile/About.jsx", error: String((e && e.message) || e) }); }

// ui_kits/web-profile/Contact.jsx
try { (() => {
// CKE Web Profile — Contact (navy info panel + form) and Footer
const {
  Input: CInput,
  Button: CButton,
  Badge: CBadge
} = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;
function Contact() {
  const [sent, setSent] = React.useState(false);
  const submit = e => {
    e.preventDefault();
    setSent(true);
  };
  return /*#__PURE__*/React.createElement("section", {
    id: "kontak",
    className: "cke-section cke-contact"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-container cke-contact__grid"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-contact__panel"
  }, /*#__PURE__*/React.createElement("span", {
    className: "cke-contact__kicker"
  }, "// Hubungi Kami"), /*#__PURE__*/React.createElement("h2", {
    className: "cke-contact__h"
  }, "Mari bangun bersama"), /*#__PURE__*/React.createElement("p", {
    className: "cke-contact__lead"
  }, "Kami siap menjawab pertanyaan dan mendiskusikan kebutuhan proyek Anda."), /*#__PURE__*/React.createElement("ul", {
    className: "cke-contact__list"
  }, /*#__PURE__*/React.createElement("li", null, /*#__PURE__*/React.createElement("span", {
    className: "cke-contact__ico"
  }, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "phone"
  })), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    className: "k"
  }, "Telepon"), /*#__PURE__*/React.createElement("div", {
    className: "v"
  }, "0878-2264-1078"))), /*#__PURE__*/React.createElement("li", null, /*#__PURE__*/React.createElement("span", {
    className: "cke-contact__ico"
  }, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "mail"
  })), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    className: "k"
  }, "Email"), /*#__PURE__*/React.createElement("div", {
    className: "v"
  }, "ciptakriyaengineering@gmail.com"))), /*#__PURE__*/React.createElement("li", null, /*#__PURE__*/React.createElement("span", {
    className: "cke-contact__ico"
  }, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "map-pin"
  })), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    className: "k"
  }, "Kantor"), /*#__PURE__*/React.createElement("div", {
    className: "v"
  }, "Jl. Raya Cibeunying, Kec. Cipendeuy,", /*#__PURE__*/React.createElement("br", null), "Kabupaten Subang, Jawa Barat"))), /*#__PURE__*/React.createElement("li", null, /*#__PURE__*/React.createElement("span", {
    className: "cke-contact__ico"
  }, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "clock"
  })), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    className: "k"
  }, "Jam Kerja"), /*#__PURE__*/React.createElement("div", {
    className: "v"
  }, "Sen \u2013 Jum \xB7 08.00 \u2013 17.00 WIB"))))), /*#__PURE__*/React.createElement("div", {
    className: "cke-contact__formwrap"
  }, sent ? /*#__PURE__*/React.createElement("div", {
    className: "cke-contact__success"
  }, /*#__PURE__*/React.createElement("span", {
    className: "cke-contact__check"
  }, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "check"
  })), /*#__PURE__*/React.createElement("h3", null, "Terima kasih!"), /*#__PURE__*/React.createElement("p", null, "Pesan Anda telah terkirim. Tim kami akan menghubungi Anda kembali."), /*#__PURE__*/React.createElement(CButton, {
    variant: "outline",
    onClick: () => setSent(false)
  }, "Kirim pesan lain")) : /*#__PURE__*/React.createElement("form", {
    className: "cke-contact__form",
    onSubmit: submit
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-contact__two"
  }, /*#__PURE__*/React.createElement(CInput, {
    label: "Nama Lengkap",
    required: true,
    placeholder: "Nama Anda"
  }), /*#__PURE__*/React.createElement(CInput, {
    label: "Email",
    required: true,
    type: "email",
    placeholder: "anda@perusahaan.com"
  })), /*#__PURE__*/React.createElement("div", {
    className: "cke-contact__two"
  }, /*#__PURE__*/React.createElement(CInput, {
    label: "No. Telepon",
    placeholder: "+62"
  }), /*#__PURE__*/React.createElement(CInput, {
    label: "Layanan",
    placeholder: "mis. Batching Plant"
  })), /*#__PURE__*/React.createElement(CInput, {
    label: "Pesan Anda",
    required: true,
    multiline: true,
    rows: 4,
    placeholder: "Ceritakan kebutuhan proyek Anda"
  }), /*#__PURE__*/React.createElement(CButton, {
    type: "submit",
    variant: "primary",
    block: true,
    size: "lg",
    iconRight: /*#__PURE__*/React.createElement("i", {
      "data-lucide": "send"
    })
  }, "Kirim Pesan")))));
}
function Footer({
  onNav
}) {
  const links = [{
    id: 'beranda',
    label: 'Beranda'
  }, {
    id: 'tentang',
    label: 'Tentang'
  }, {
    id: 'layanan',
    label: 'Layanan'
  }, {
    id: 'proyek',
    label: 'Proyek'
  }, {
    id: 'mitra',
    label: 'Mitra'
  }];
  return /*#__PURE__*/React.createElement("footer", {
    className: "cke-footer"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-container cke-footer__grid"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-footer__brand"
  }, /*#__PURE__*/React.createElement("span", {
    className: "cke-footer__chip"
  }, /*#__PURE__*/React.createElement("img", {
    src: "../../assets/logo/cke-logomark.png",
    alt: "CKE"
  })), /*#__PURE__*/React.createElement("p", {
    className: "cke-footer__tag"
  }, "We Solve Your Problem \u2014 konstruksi mekanikal & elektrikal untuk industri.")), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("h4", null, "Navigasi"), /*#__PURE__*/React.createElement("ul", null, links.map(l => /*#__PURE__*/React.createElement("li", {
    key: l.id
  }, /*#__PURE__*/React.createElement("a", {
    href: '#' + l.id,
    onClick: e => {
      e.preventDefault();
      onNav(l.id);
    }
  }, l.label))))), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("h4", null, "Layanan"), /*#__PURE__*/React.createElement("ul", null, /*#__PURE__*/React.createElement("li", null, "Konstruksi Mekanikal"), /*#__PURE__*/React.createElement("li", null, "Konstruksi Elektrikal"), /*#__PURE__*/React.createElement("li", null, "Batching Plant"), /*#__PURE__*/React.createElement("li", null, "Pergudangan & Modifikasi"))), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("h4", null, "Kontak"), /*#__PURE__*/React.createElement("ul", {
    className: "cke-footer__contact"
  }, /*#__PURE__*/React.createElement("li", null, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "phone"
  }), " 0878-2264-1078"), /*#__PURE__*/React.createElement("li", null, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "mail"
  }), " ciptakriyaengineering@gmail.com"), /*#__PURE__*/React.createElement("li", null, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "map-pin"
  }), " Cipendeuy, Subang, Jawa Barat")))), /*#__PURE__*/React.createElement("div", {
    className: "cke-footer__bar"
  }, /*#__PURE__*/React.createElement("span", null, "\xA9 2026 PT. Cipta Kriya Engineering. All rights reserved."), /*#__PURE__*/React.createElement("span", {
    className: "cke-footer__npwp"
  }, "NPWP 53.853.307.6-439.000")));
}
window.CKEContact = Contact;
window.CKEFooter = Footer;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/web-profile/Contact.jsx", error: String((e && e.message) || e) }); }

// ui_kits/web-profile/Experience.jsx
try { (() => {
// CKE Web Profile — Pengalaman Pekerjaan (work experience ledger with year filter)
const {
  SectionHeader: ExpHeader,
  Badge: ExpBadge
} = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;
const EXPERIENCE = [{
  year: '2026',
  client: 'PT SCG Readymix Indonesia',
  scope: 'Pekerjaan Solo Ring Road & pembuatan silo batu',
  cat: 'Civil',
  tone: 'brand'
}, {
  year: '2026',
  client: 'PT Global Dairi Alami',
  scope: 'Replating Versa (alat berat)',
  cat: 'Fabrikasi',
  tone: 'green'
}, {
  year: '2026',
  client: 'PT Lintas Marga Sedaya',
  scope: 'Perbaikan hydrant MO Kertajati — Astra Infratoll Road',
  cat: 'Mekanikal',
  tone: 'brand'
}, {
  year: '2026',
  client: 'PT Prima Top Boga',
  scope: 'Perbaikan & perluasan gudang sparepart dan ruang engineering',
  cat: 'Pergudangan',
  tone: 'green'
}, {
  year: '2025',
  client: 'PT SCG Readymix Indonesia',
  scope: 'Pembangunan Batching Plant Cimareme',
  cat: 'Batching Plant',
  tone: 'brand'
}, {
  year: '2025',
  client: 'PT SCG Readymix Indonesia',
  scope: 'Sediment pit & water treatment (Semarang)',
  cat: 'Civil',
  tone: 'brand'
}, {
  year: '2025',
  client: 'Trans Studio Bandung',
  scope: 'Service perahu',
  cat: 'Maintenance',
  tone: 'green'
}, {
  year: '2024',
  client: 'PT SCG Pipe & Precast Indonesia',
  scope: 'Jasa service berkala silo semen (type 1 & 5) — Plant 1 & 2',
  cat: 'Maintenance',
  tone: 'green'
}, {
  year: '2024',
  client: 'PT Indoglas Jaya',
  scope: 'Bongkar & pasang cone silo',
  cat: 'Mekanikal',
  tone: 'brand'
}, {
  year: '2024',
  client: 'PT Pacific Prestress Indonesia',
  scope: 'Vacuum lifter, NBR rubber pad & jasa services',
  cat: 'Fabrikasi',
  tone: 'green'
}, {
  year: '2023',
  client: 'CV Sunardi MJR',
  scope: 'Rekondisi batching plant — Proyek Bendungan Tiu Suntuk',
  cat: 'Batching Plant',
  tone: 'brand'
}, {
  year: '2023',
  client: 'PT SCG Readymix Indonesia',
  scope: 'Overhaul, civil & installation — Sumbawa New Batching',
  cat: 'Batching Plant',
  tone: 'brand'
}, {
  year: '2023',
  client: 'PT Win Textile',
  scope: 'Repair drying & heat setting Textino, mesin Bianco',
  cat: 'Mekanikal',
  tone: 'brand'
}, {
  year: '2022',
  client: 'PT Universal Agri Bisnisindo',
  scope: 'Fabrikasi & pemasangan lantai kerja, screw, pintu & sample pallet',
  cat: 'Fabrikasi',
  tone: 'green'
}, {
  year: '2022',
  client: 'PT SCG Readymix Indonesia',
  scope: 'Overhaul MBP-15 ex Pemalang, cleaning & painting fuel tank',
  cat: 'Maintenance',
  tone: 'green'
}];
const YEARS = ['Semua', '2026', '2025', '2024', '2023', '2022'];
function Experience() {
  const [filter, setFilter] = React.useState('Semua');
  const rows = filter === 'Semua' ? EXPERIENCE : EXPERIENCE.filter(e => e.year === filter);
  return /*#__PURE__*/React.createElement("section", {
    id: "pengalaman",
    className: "cke-section cke-exp"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-container"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-exp__head"
  }, /*#__PURE__*/React.createElement(ExpHeader, {
    eyebrow: "// Pengalaman Pekerjaan",
    title: /*#__PURE__*/React.createElement(React.Fragment, null, "Rekam jejak ", /*#__PURE__*/React.createElement("em", null, "proyek"), " kami"),
    subtitle: "Sebagian dari pekerjaan yang telah kami selesaikan bersama klien industri."
  }), /*#__PURE__*/React.createElement("div", {
    className: "cke-exp__filter",
    role: "tablist"
  }, YEARS.map(y => /*#__PURE__*/React.createElement("button", {
    key: y,
    className: 'cke-exp__year' + (filter === y ? ' is-active' : ''),
    onClick: () => setFilter(y)
  }, y)))), /*#__PURE__*/React.createElement("div", {
    className: "cke-exp__ledger"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-exp__lhead"
  }, /*#__PURE__*/React.createElement("span", null, "Tahun"), /*#__PURE__*/React.createElement("span", null, "Klien"), /*#__PURE__*/React.createElement("span", null, "Lingkup Pekerjaan"), /*#__PURE__*/React.createElement("span", null, "Kategori")), rows.map((e, i) => /*#__PURE__*/React.createElement("div", {
    className: "cke-exp__row",
    key: i
  }, /*#__PURE__*/React.createElement("span", {
    className: "cke-exp__yr"
  }, e.year), /*#__PURE__*/React.createElement("span", {
    className: "cke-exp__client"
  }, e.client), /*#__PURE__*/React.createElement("span", {
    className: "cke-exp__scope"
  }, e.scope), /*#__PURE__*/React.createElement("span", {
    className: "cke-exp__cat"
  }, /*#__PURE__*/React.createElement(ExpBadge, {
    tone: e.tone
  }, e.cat))))), /*#__PURE__*/React.createElement("p", {
    className: "cke-exp__note"
  }, "Menampilkan ", rows.length, " dari 100+ proyek yang telah dipercayakan kepada kami.")));
}
window.CKEExperience = Experience;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/web-profile/Experience.jsx", error: String((e && e.message) || e) }); }

// ui_kits/web-profile/Header.jsx
try { (() => {
// CKE Web Profile — Header (fixed nav, transparent over hero, solid on scroll)
const {
  Button
} = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;
function Header({
  onNav
}) {
  const [scrolled, setScrolled] = React.useState(false);
  const [open, setOpen] = React.useState(false);
  React.useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 40);
    window.addEventListener('scroll', onScroll, {
      passive: true
    });
    onScroll();
    return () => window.removeEventListener('scroll', onScroll);
  }, []);
  const links = [{
    id: 'beranda',
    label: 'Beranda'
  }, {
    id: 'tentang',
    label: 'Tentang Kami'
  }, {
    id: 'layanan',
    label: 'Layanan'
  }, {
    id: 'proyek',
    label: 'Proyek'
  }, {
    id: 'pengalaman',
    label: 'Pengalaman'
  }, {
    id: 'mitra',
    label: 'Mitra'
  }];
  const go = id => {
    setOpen(false);
    onNav(id);
  };
  return /*#__PURE__*/React.createElement("header", {
    className: 'cke-hd' + (scrolled ? ' cke-hd--solid' : '')
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-hd__inner"
  }, /*#__PURE__*/React.createElement("a", {
    className: "cke-hd__brand",
    href: "#beranda",
    onClick: e => {
      e.preventDefault();
      go('beranda');
    }
  }, /*#__PURE__*/React.createElement("span", {
    className: "cke-hd__logochip"
  }, /*#__PURE__*/React.createElement("img", {
    src: "../../assets/logo/cke-logomark.png",
    alt: "Cipta Kriya Engineering"
  })), /*#__PURE__*/React.createElement("span", {
    className: "cke-hd__wordmark"
  }, /*#__PURE__*/React.createElement("strong", null, "CIPTA KRIYA"), /*#__PURE__*/React.createElement("em", null, "ENGINEERING"))), /*#__PURE__*/React.createElement("nav", {
    className: "cke-hd__nav"
  }, links.map(l => /*#__PURE__*/React.createElement("a", {
    key: l.id,
    href: '#' + l.id,
    className: "cke-hd__link",
    onClick: e => {
      e.preventDefault();
      go(l.id);
    }
  }, l.label)), /*#__PURE__*/React.createElement(Button, {
    size: "sm",
    variant: "primary",
    onClick: () => go('kontak')
  }, "Kontak")), /*#__PURE__*/React.createElement("button", {
    className: "cke-hd__burger",
    "aria-label": "Menu",
    onClick: () => setOpen(!open)
  }, /*#__PURE__*/React.createElement("i", {
    "data-lucide": open ? 'x' : 'menu'
  }))), open && /*#__PURE__*/React.createElement("div", {
    className: "cke-hd__mobile"
  }, links.map(l => /*#__PURE__*/React.createElement("a", {
    key: l.id,
    href: '#' + l.id,
    onClick: e => {
      e.preventDefault();
      go(l.id);
    }
  }, l.label)), /*#__PURE__*/React.createElement(Button, {
    variant: "primary",
    block: true,
    onClick: () => go('kontak')
  }, "Kontak")));
}
window.CKEHeader = Header;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/web-profile/Header.jsx", error: String((e && e.message) || e) }); }

// ui_kits/web-profile/Hero.jsx
try { (() => {
// CKE Web Profile — Hero (full-bleed site photo, navy wash, display headline)
const {
  Button: HeroButton
} = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;
function Hero({
  onNav
}) {
  return /*#__PURE__*/React.createElement("section", {
    id: "beranda",
    className: "cke-hero"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-hero__media",
    style: {
      backgroundImage: "url('../../assets/photos/batching-plant.png')"
    }
  }), /*#__PURE__*/React.createElement("div", {
    className: "cke-hero__scrim"
  }), /*#__PURE__*/React.createElement("div", {
    className: "cke-hero__inner"
  }, /*#__PURE__*/React.createElement("span", {
    className: "cke-hero__eyebrow"
  }, "// PT. Cipta Kriya Engineering \u2014 Subang, Jawa Barat"), /*#__PURE__*/React.createElement("h1", {
    className: "cke-hero__title"
  }, "We Solve", /*#__PURE__*/React.createElement("br", null), "Your Problem"), /*#__PURE__*/React.createElement("p", {
    className: "cke-hero__lead"
  }, "Mechanical & electrical construction, fabrication and installation for cement, ready-mix, mining and heavy industry across Indonesia."), /*#__PURE__*/React.createElement("div", {
    className: "cke-hero__cta"
  }, /*#__PURE__*/React.createElement(HeroButton, {
    size: "lg",
    variant: "primary",
    onClick: () => onNav('kontak'),
    iconRight: /*#__PURE__*/React.createElement("i", {
      "data-lucide": "arrow-right"
    })
  }, "Hubungi Kami"), /*#__PURE__*/React.createElement(HeroButton, {
    size: "lg",
    variant: "inverse",
    onClick: () => onNav('proyek')
  }, "Lihat Proyek")), /*#__PURE__*/React.createElement("div", {
    className: "cke-hero__tags"
  }, /*#__PURE__*/React.createElement("span", null, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "shield-check"
  }), " Standar K3"), /*#__PURE__*/React.createElement("span", null, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "badge-check"
  }), " Berpengalaman sejak 2021"), /*#__PURE__*/React.createElement("span", null, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "map-pin"
  }), " Nasional"))));
}
window.CKEHero = Hero;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/web-profile/Hero.jsx", error: String((e && e.message) || e) }); }

// ui_kits/web-profile/Partners.jsx
try { (() => {
// CKE Web Profile — Stats strip (navy band) + Partners marquee
const {
  Stat: StatBlock,
  SectionHeader: PartHeader
} = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;
const PARTNERS = [{
  name: 'SCG',
  logo: 'scg.png'
}, {
  name: 'Jayamix by SCG',
  logo: 'jayamix.png'
}, {
  name: 'Semen Padang',
  logo: 'semen-padang.png'
}, {
  name: 'Indocement — Tiga Roda',
  logo: 'indocement.png'
}, {
  name: 'Indofood',
  logo: 'indofood.png'
}, {
  name: 'Win Textile',
  logo: 'wintex.png'
}, {
  name: 'De Heus',
  logo: 'de-heus.png'
}, {
  name: 'Pionirbeton',
  logo: 'pionirbeton.png'
}];
function StatsStrip() {
  return /*#__PURE__*/React.createElement("section", {
    className: "cke-stats"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-container cke-stats__row"
  }, /*#__PURE__*/React.createElement(StatBlock, {
    value: "100",
    suffix: "+",
    label: "Proyek Selesai",
    onDark: true
  }), /*#__PURE__*/React.createElement(StatBlock, {
    value: "14",
    suffix: "+",
    label: "Klien Korporat",
    onDark: true
  }), /*#__PURE__*/React.createElement(StatBlock, {
    value: "6",
    label: "Lini Layanan",
    onDark: true
  }), /*#__PURE__*/React.createElement(StatBlock, {
    value: "100",
    suffix: "%",
    label: "Komitmen K3",
    onDark: true
  })));
}
function Partners() {
  const row1 = PARTNERS.slice(0, 4);
  const row2 = PARTNERS.slice(4);
  const Logo = ({
    p
  }) => /*#__PURE__*/React.createElement("div", {
    className: "cke-partner",
    title: p.name
  }, /*#__PURE__*/React.createElement("img", {
    src: '../../assets/clients/' + p.logo,
    alt: p.name,
    loading: "lazy"
  }));
  return /*#__PURE__*/React.createElement("section", {
    id: "mitra",
    className: "cke-section cke-partners"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-container"
  }, /*#__PURE__*/React.createElement(PartHeader, {
    align: "center",
    eyebrow: "// Mitra & Klien",
    title: /*#__PURE__*/React.createElement(React.Fragment, null, "Dipercaya oleh ", /*#__PURE__*/React.createElement("em", null, "industri terkemuka")),
    subtitle: "Perusahaan yang telah mempercayakan kebutuhan proyeknya kepada kami."
  })), /*#__PURE__*/React.createElement("div", {
    className: "cke-marquee"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-marquee__edge cke-marquee__edge--l"
  }), /*#__PURE__*/React.createElement("div", {
    className: "cke-marquee__edge cke-marquee__edge--r"
  }), /*#__PURE__*/React.createElement("div", {
    className: "cke-marquee__track cke-marquee__track--left"
  }, [...row1, ...row1, ...row1].map((p, i) => /*#__PURE__*/React.createElement(Logo, {
    key: 'a' + i,
    p: p
  }))), /*#__PURE__*/React.createElement("div", {
    className: "cke-marquee__track cke-marquee__track--right"
  }, [...row2, ...row2, ...row2].map((p, i) => /*#__PURE__*/React.createElement(Logo, {
    key: 'b' + i,
    p: p
  })))));
}
window.CKEStatsStrip = StatsStrip;
window.CKEPartners = Partners;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/web-profile/Partners.jsx", error: String((e && e.message) || e) }); }

// ui_kits/web-profile/Projects.jsx
try { (() => {
// CKE Web Profile — Projects (Dokumentasi Pekerjaan)
const {
  SectionHeader: PrjHeader,
  Card,
  Badge: PrjBadge,
  Button: PrjButton
} = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;
const PROJECTS = [{
  img: 'batching-plant.png',
  tag: 'Batching Plant',
  tone: 'brand',
  title: 'Pembangunan Batching Plant Cimareme',
  client: 'PT SCG Readymix Indonesia',
  year: '2025'
}, {
  img: 'silo-fabrication.png',
  tag: 'Fabrikasi',
  tone: 'green',
  title: 'Pabrikasi & Pemasangan Silo',
  client: 'Storage Tank',
  year: '2024'
}, {
  img: 'mechanical-work.png',
  tag: 'Mekanikal',
  tone: 'brand',
  title: 'Bongkar Pasang Bearing Roller Crusher',
  client: 'Industri Semen',
  year: '2023'
}, {
  img: 'cooler-grate.png',
  tag: 'Maintenance',
  tone: 'green',
  title: 'Penggantian Grate Plate Cooler',
  client: 'Industri Semen',
  year: '2023'
}, {
  img: 'site-loader.png',
  tag: 'Civil & Install',
  tone: 'brand',
  title: 'Mobilisasi & Instalasi Batching Plant',
  client: 'PT SCG Readymix — Sumbawa',
  year: '2023'
}];
function Projects({
  onNav
}) {
  return /*#__PURE__*/React.createElement("section", {
    id: "proyek",
    className: "cke-section cke-projects"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-container"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-projects__head"
  }, /*#__PURE__*/React.createElement(PrjHeader, {
    eyebrow: "// Dokumentasi Pekerjaan",
    title: /*#__PURE__*/React.createElement(React.Fragment, null, "Proyek yang telah kami ", /*#__PURE__*/React.createElement("em", null, "selesaikan"))
  }), /*#__PURE__*/React.createElement(PrjButton, {
    variant: "ghost",
    onClick: () => onNav('kontak'),
    iconRight: /*#__PURE__*/React.createElement("i", {
      "data-lucide": "arrow-up-right"
    })
  }, "Diskusikan proyek Anda")), /*#__PURE__*/React.createElement("div", {
    className: "cke-projects__grid"
  }, PROJECTS.map((p, i) => /*#__PURE__*/React.createElement(Card, {
    key: p.title,
    interactive: true,
    accent: true,
    media: '../../assets/photos/' + p.img,
    mediaHeight: i === 0 ? 320 : 200,
    className: i === 0 ? 'cke-projects__feature' : ''
  }, /*#__PURE__*/React.createElement(PrjBadge, {
    tone: p.tone
  }, p.tag), /*#__PURE__*/React.createElement("h3", {
    className: "cke-projects__title"
  }, p.title), /*#__PURE__*/React.createElement("div", {
    className: "cke-projects__meta"
  }, /*#__PURE__*/React.createElement("span", null, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "building-2"
  }), " ", p.client), /*#__PURE__*/React.createElement("span", {
    className: "cke-projects__year"
  }, p.year)))))));
}
window.CKEProjects = Projects;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/web-profile/Projects.jsx", error: String((e && e.message) || e) }); }

// ui_kits/web-profile/Services.jsx
try { (() => {
// CKE Web Profile — Services (Bidang Usaha grid)
const {
  SectionHeader: SvcHeader,
  ServiceCard: SvcCard
} = window.CiptaKriyaEngineeringDesignSystem_d6b0c6;
const SERVICES = [{
  icon: 'cog',
  title: 'Konstruksi Mekanikal',
  desc: 'Fabrikasi & erection struktur mekanikal berat, conveyor, screw, dan bucket elevator.'
}, {
  icon: 'zap',
  title: 'Konstruksi Elektrikal',
  desc: 'Panel listrik, instalasi daya, penarikan kabel, terminasi dan commissioning.'
}, {
  icon: 'wrench',
  title: 'Instalasi & Maintenance',
  desc: 'Perbaikan dan perawatan alat berat, silo, mixer dan unit produksi.'
}, {
  icon: 'factory',
  title: 'Batching Plant',
  desc: 'Pembangunan, mobilisasi, dismantle dan improvement batching plant.'
}, {
  icon: 'warehouse',
  title: 'Pergudangan',
  desc: 'Pembangunan gudang, racking, lantai kerja dan ruang engineering.'
}, {
  icon: 'hammer',
  title: 'Modifikasi & Fabrikasi',
  desc: 'Pabrikasi baru, replating, modifikasi unit dan penggantian komponen.'
}];
function Services() {
  return /*#__PURE__*/React.createElement("section", {
    id: "layanan",
    className: "cke-section cke-services"
  }, /*#__PURE__*/React.createElement("div", {
    className: "cke-container"
  }, /*#__PURE__*/React.createElement(SvcHeader, {
    align: "center",
    eyebrow: "// Bidang Usaha",
    title: /*#__PURE__*/React.createElement(React.Fragment, null, "Apa yang kami ", /*#__PURE__*/React.createElement("em", null, "kerjakan")),
    subtitle: "Enam lini layanan inti untuk mendukung kebutuhan proyek industri dari hulu ke hilir."
  }), /*#__PURE__*/React.createElement("div", {
    className: "cke-services__grid"
  }, SERVICES.map((s, i) => /*#__PURE__*/React.createElement(SvcCard, {
    key: s.title,
    index: String(i + 1).padStart(2, '0'),
    icon: /*#__PURE__*/React.createElement("i", {
      "data-lucide": s.icon
    }),
    title: s.title,
    description: s.desc
  })))));
}
window.CKEServices = Services;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/web-profile/Services.jsx", error: String((e && e.message) || e) }); }

__ds_ns.Badge = __ds_scope.Badge;

__ds_ns.Button = __ds_scope.Button;

__ds_ns.Card = __ds_scope.Card;

__ds_ns.Input = __ds_scope.Input;

__ds_ns.SectionHeader = __ds_scope.SectionHeader;

__ds_ns.ServiceCard = __ds_scope.ServiceCard;

__ds_ns.Stat = __ds_scope.Stat;

})();
