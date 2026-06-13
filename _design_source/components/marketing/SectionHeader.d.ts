import * as React from 'react';

/**
 * Section intro block: mono eyebrow + display title + muted subtitle.
 * Used at the top of every marketing section.
 *
 * @startingPoint section="Marketing" subtitle="Section intro — eyebrow, title, subtitle" viewport="700x240"
 */
export interface SectionHeaderProps {
  /** Small uppercase mono kicker above the title. */
  eyebrow?: React.ReactNode;
  /** Main heading. Wrap a fragment in <em> to color it brand-blue. */
  title?: React.ReactNode;
  /** Supporting line below the title. */
  subtitle?: React.ReactNode;
  /** @default "left" */
  align?: 'left' | 'center';
  /** Light text treatment for dark/photo backgrounds. @default false */
  onDark?: boolean;
  className?: string;
}

export function SectionHeader(props: SectionHeaderProps): JSX.Element;
