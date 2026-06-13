Labelled text field with hint and error states; pass `multiline` for a textarea. Forwards all native input attributes.

```jsx
<Input label="Full Name" required placeholder="Your name" />
<Input label="Email" type="email" required hint="We'll reply within 1 business day" />
<Input label="Message" multiline rows={5} required placeholder="Tell us about your project" />
<Input label="Phone" error hint="Enter a valid number" />
```
