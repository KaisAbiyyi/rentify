## Rentify Simulation Studio

Rentify is a showcase-ready rental car platform simulation that proves your team can ship complex fleet operations and customer experiences. The app guides prospects through an operator-first onboarding before unlocking the customer storefront, highlighting how quickly you can launch a full rental ecosystem.

### Highlights

- **Dual personas** – Dedicated route groups for admin (`/admin`) and customer (`/customer`) experiences with unique layouts and storytelling.
- **Shadcn-powered admin shell** – Responsive sidebar navigation, top controls, and polished dashboards built with `sidebar`, `card`, `badge`, and `button` components.
- **Guided narrative** – The landing page funnels visitors into the admin onboarding flow, then invites them to try the customer journey.
- **Tailwind CSS v4** – Modern theming with inline CSS variables for rapid customization.

## Getting Started

All scripts use [Bun](https://bun.sh/).

```bash
bun install
bun run dev
```

Visit <http://localhost:3000> and begin with the **Get Started** CTA to enter the admin onboarding tour. After completing the admin path, jump into `/customer` to explore the renter-facing sandbox.

### Project Structure

```
src/app
├─ (customer)          # Customer-facing shell with navbar
│  ├─ layout.tsx
│  ├─ page.tsx         # Landing / marketing narrative
│  └─ customer/page.tsx# Customer sandbox experience
└─ (admin)             # Admin portal with shadcn sidebar
	└─ admin
		├─ layout.tsx    # Sidebar + header wrapper
		├─ page.tsx      # Operations overview dashboard
		├─ bookings/page.tsx
		├─ fleet/page.tsx
		├─ insights/page.tsx
		└─ onboarding/page.tsx
```

Shared UI primitives live under `src/components/ui`, generated through `bunx shadcn@latest add ...` for consistency.

## Demo Flow

1. **Landing page** – Position the simulation, review capabilities, and trigger the admin tour via **Get Started**.
2. **Admin onboarding** – Complete the three-card checklist to configure fleet presets, business rules, and customer storytelling.
3. **Admin control center** – Navigate the sidebar to inspect overview metrics, bookings queue, fleet maintenance, and insights cards.
4. **Customer sandbox** – Switch roles with one click to showcase live inventory cards synchronized with admin logic.

## Testing and QA

- Run a production build: `bun run build`
- After adding features, execute an end-to-end walkthrough with the `#playwright` MCP to capture screenshots and validate the user journey.
- If a technology choice is unclear, reach for `#context7` documentation before coding.

## Contributing

1. Create a feature branch per todo entry (`todo.md` tracks branch names and identifiers).
2. Use `bunx shadcn@latest add -name <component>` for UI scaffolding.
3. Keep the visual polish tight—adjust spacing, typography, and states so the demo stays presentation-ready.

## License

This project is released under the MIT License. See [`LICENSE`](./LICENSE) for details.
