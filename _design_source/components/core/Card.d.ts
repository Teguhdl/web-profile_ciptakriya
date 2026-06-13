import * as React from 'react';

/**
 * Surface container with optional media header, gradient accent strip and hover lift.
 * The building block for product, project and content cards.
 */
export interface CardProps {
  children?: React.ReactNode;
  /** Shadow depth. @default "raised" */
  elevation?: 'flat' | 'raised';
  /** Adds hover lift + media zoom. @default false */
  interactive?: boolean;
  /** Show the blue→green accent strip at the top. @default false */
  accent?: boolean;
  /** Image URL (string) or custom node rendered in the media slot. */
  media?: React.ReactNode | string;
  /** Media slot height in px. @default 200 */
  mediaHeight?: number;
  /** Apply uniform padding instead of the default body wrapper. @default false */
  padded?: boolean;
  className?: string;
}

export function Card(props: CardProps): JSX.Element;
