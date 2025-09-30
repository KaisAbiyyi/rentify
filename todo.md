# Project TODOs

Keep these items in sync with active feature branches. Update identifiers and statuses before and after every work session.

## Branch `feature/routing-shell`
- [x] ROUTE-001: Configure `(customer)` and `(admin)` route groups with dedicated layouts.
- [x] ROUTE-002: Implement navigation flow so "Get Started" redirects to the admin onboarding path.
- [x] ROUTE-003: Ensure customer and admin experiences load isolated assets and metadata.

## Branch `feature/admin-foundation`
- [x] ADMIN-001: Install core Shadcn components (sidebar, navigation menu, cards) via `bunx shadcn@latest add -name`.
- [x] ADMIN-002: Build the admin dashboard shell with sidebar navigation highlighting active views.
- [x] ADMIN-003: Prototype admin-specific widgets (fleet overview, booking approvals, maintenance alerts).

## Branch `feature/customer-experience`
- [x] CUST-001: Design customer landing hero with rental catalog highlights and testimonials.
- [x] CUST-002: Craft customer booking exploration flow after admin walkthrough completion gate.
- [x] CUST-003: Add responsive navbar with quick access to pricing, fleet, and support links.

## Branch `feature/quality-and-demos`
- [x] QA-001: Script primary admin and customer journeys with #playwright MCP for demos and regression checks.
- [x] QA-002: Capture presentation-ready screenshots after each feature milestone.
- [x] QA-003: Polish styling (spacing, color, typography) to maintain marketplace showcase quality.
