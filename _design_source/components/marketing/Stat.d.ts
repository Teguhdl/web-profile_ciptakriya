import * as React from 'react';

/**
 * Big display metric with brand-tinted suffix and mono caption.
 * Use in stat strips ("100+ projects", "15+ industries").
 */
export interface StatProps {
  /** The number / main figure. */
  value: React.ReactNode;
  /** Small accent suffix (e.g. "+", "%"). */
  suffix?: React.ReactNode;
  /** Mono uppercase caption under the figure. */
  label?: React.ReactNode;
  /** Light treatment for dark backgrounds. @default false */
  onDark?: boolean;
  className?: string;
}

export function Stat(props: StatProps): JSX.Element;
