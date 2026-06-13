import * as React from 'react';

/**
 * Small uppercase mono pill for status, categories and metadata.
 */
export interface BadgeProps {
  children?: React.ReactNode;
  /** Color tone. @default "neutral" */
  tone?: 'neutral' | 'brand' | 'green' | 'success' | 'warning' | 'danger' | 'solid' | 'outline';
  /** Show a leading status dot. @default false */
  dot?: boolean;
  className?: string;
}

export function Badge(props: BadgeProps): JSX.Element;
