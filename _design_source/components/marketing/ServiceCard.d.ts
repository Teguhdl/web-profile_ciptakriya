import * as React from 'react';

/**
 * Service / capability card with a tinted icon tile, hover lift and a blue→green
 * edge bar that wipes in on hover. Optional mono index in the corner.
 */
export interface ServiceCardProps {
  /** Icon node (e.g. a Lucide <i data-lucide> or inline SVG). */
  icon?: React.ReactNode;
  /** Service name. */
  title: React.ReactNode;
  /** Short supporting description. */
  description?: React.ReactNode;
  /** Optional index label shown in the top-right (e.g. "01"). */
  index?: React.ReactNode;
  className?: string;
}

export function ServiceCard(props: ServiceCardProps): JSX.Element;
