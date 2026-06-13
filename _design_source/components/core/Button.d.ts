import * as React from 'react';

/**
 * Primary call-to-action button for Cipta Kriya Engineering.
 * Pill-shaped, brand-blue by default; supports leaf-green, outline, ghost and inverse treatments.
 *
 * @startingPoint section="Core" subtitle="Brand button — all variants & sizes" viewport="700x220"
 */
export interface ButtonProps {
  children?: React.ReactNode;
  /** Visual treatment. @default "primary" */
  variant?: 'primary' | 'secondary' | 'outline' | 'ghost' | 'inverse';
  /** @default "md" */
  size?: 'sm' | 'md' | 'lg';
  /** Stretch to full container width. @default false */
  block?: boolean;
  /** Icon element rendered before the label. */
  iconLeft?: React.ReactNode;
  /** Icon element rendered after the label. */
  iconRight?: React.ReactNode;
  /** Render as an anchor instead of a button. */
  href?: string;
  type?: 'button' | 'submit' | 'reset';
  disabled?: boolean;
  className?: string;
}

export function Button(props: ButtonProps): JSX.Element;
