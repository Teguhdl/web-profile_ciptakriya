import * as React from 'react';

/**
 * Labelled text field with hint and error states. Set `multiline` for a textarea.
 * Forwards all native input/textarea attributes (type, value, placeholder, onChange…).
 */
export interface InputProps {
  /** Field label rendered above the control. */
  label?: React.ReactNode;
  /** Show a required asterisk. @default false */
  required?: boolean;
  /** Helper or error text below the control. */
  hint?: React.ReactNode;
  /** Apply the error treatment (red border + red hint). @default false */
  error?: boolean;
  /** Render a <textarea> instead of an <input>. @default false */
  multiline?: boolean;
  /** Textarea rows when multiline. @default 4 */
  rows?: number;
  id?: string;
  type?: string;
  name?: string;
  value?: string;
  defaultValue?: string;
  placeholder?: string;
  disabled?: boolean;
  onChange?: (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => void;
  className?: string;
}

export function Input(props: InputProps): JSX.Element;
