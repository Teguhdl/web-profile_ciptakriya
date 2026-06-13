Surface container with optional photo header, blue→green accent strip and hover lift — the base for product/project/content cards.

```jsx
<Card interactive accent media="assets/photos/batching-plant.png" mediaHeight={220}>
  <Badge tone="brand">Batching Plant</Badge>
  <h3>Pembangunan Batching Plant Cimareme</h3>
  <p>PT SCG Readymix Indonesia · 2025</p>
</Card>
```

Props: `elevation` (`flat`/`raised`), `interactive` (hover lift + image zoom), `accent` (gradient strip), `media` (image URL or node), `mediaHeight`, `padded` (uniform padding, skips the body wrapper).
