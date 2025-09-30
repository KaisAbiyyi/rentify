import Link from "next/link";

const highlights = [
  {
    title: "End-to-end fleet visibility",
    description:
      "Track vehicle availability, maintenance status, and utilization without leaving the dashboard.",
  },
  {
    title: "Automated pricing intelligence",
    description:
      "Dynamic pricing tools adapt to seasonality and demand to keep margins healthy.",
  },
  {
    title: "Customer-first experiences",
    description:
      "Mobile-ready customer journeys make browsing, reserving, and managing trips effortless.",
  },
];

const workflow = [
  {
    step: "01",
    title: "Brief the team",
    description:
      "Configure fleet, policies, and brand voice inside the admin portal.",
  },
  {
    step: "02",
    title: "Orchestrate operations",
    description:
      "Monitor bookings, handle approvals, and coordinate maintenance.",
  },
  {
    step: "03",
    title: "Delight customers",
    description:
      "Guide renters through a curated catalog and seamless reservation flow.",
  },
];

const fleet = [
  {
    name: "Aurora EV Sedan",
    segment: "Executive",
    range: "410 km",
    rate: "$145/day",
  },
  {
    name: "Trailblazer Hybrid",
    segment: "SUV",
    range: "780 km",
    rate: "$120/day",
  },
  {
    name: "Metro Zip Compact",
    segment: "City",
    range: "620 km",
    rate: "$74/day",
  },
];

export default function CustomerLanding() {
  return (
    <div className="space-y-24">
      <section className="grid gap-8 lg:grid-cols-[1.25fr_1fr] lg:items-center">
        <div className="space-y-6">
          <span className="inline-flex items-center rounded-full border border-primary/20 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-primary">
            Immersive demo
          </span>
          <h1 className="text-4xl font-semibold tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
            A rental car platform that sells your vision in minutes.
          </h1>
          <p className="text-lg text-slate-600">
            Showcase how your team orchestrates fleet operations, pricing, and customer journeys.
            Walk investors and prospects through a guided simulation that proves your craft end-to-end.
          </p>
          <div className="flex flex-col gap-3 sm:flex-row">
            <Link
              href="/admin/onboarding"
              className="inline-flex items-center justify-center rounded-full bg-primary px-6 py-3 text-sm font-semibold text-primary-foreground shadow-lg shadow-primary/20 transition hover:bg-primary/90"
            >
              Start with the Admin Tour
            </Link>
            <Link
              href="/customer"
              className="inline-flex items-center justify-center rounded-full border border-slate-300 px-6 py-3 text-sm font-semibold text-slate-700 transition hover:border-primary hover:text-primary"
            >
              Preview Customer Site
            </Link>
          </div>
        </div>
        <div className="relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/60">
          <div className="absolute inset-0 bg-gradient-to-br from-primary/10 via-transparent to-primary/5" />
          <div className="relative space-y-4">
            <p className="text-sm font-semibold text-primary">Admin highlights</p>
            <ul className="space-y-4">
              {highlights.map((item) => (
                <li key={item.title} className="rounded-2xl border border-slate-200 bg-white/70 p-5 shadow-sm">
                  <h3 className="text-base font-semibold text-slate-900">
                    {item.title}
                  </h3>
                  <p className="mt-2 text-sm text-slate-600">{item.description}</p>
                </li>
              ))}
            </ul>
          </div>
        </div>
      </section>

      <section id="capabilities" className="space-y-8">
        <h2 className="text-2xl font-semibold tracking-tight text-slate-900">
          Why teams adopt the Rentify simulation
        </h2>
        <p className="max-w-3xl text-slate-600">
          This interactive walkthrough demonstrates how your organization runs vehicle inventory, pricing,
          and customer care. Every component is production-ready so future clients can picture their rollout instantly.
        </p>
        <div className="grid gap-6 md:grid-cols-3">
          {highlights.map((item) => (
            <div key={item.title} className="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
              <h3 className="text-base font-semibold text-slate-900">{item.title}</h3>
              <p className="mt-2 text-sm text-slate-600">{item.description}</p>
            </div>
          ))}
        </div>
      </section>

      <section id="workflow" className="space-y-8">
        <div className="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
          <div>
            <h2 className="text-2xl font-semibold tracking-tight text-slate-900">Guided workflow</h2>
            <p className="max-w-xl text-slate-600">
              We begin in the admin portal to configure the business, then we hand the reins to your customers to explore availability, bundles, and trip planning.
            </p>
          </div>
          <Link
            href="/admin"
            className="inline-flex items-center gap-2 rounded-full border border-slate-300 px-5 py-2 text-sm font-semibold text-slate-700 transition hover:border-primary hover:text-primary"
          >
            Jump to Admin Dashboard
          </Link>
        </div>
        <div className="grid gap-4 md:grid-cols-3">
          {workflow.map((item) => (
            <div key={item.step} className="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
              <span className="text-xs font-semibold uppercase tracking-[0.2em] text-primary">
                {item.step}
              </span>
              <h3 className="mt-3 text-lg font-semibold text-slate-900">{item.title}</h3>
              <p className="mt-2 text-sm text-slate-600">{item.description}</p>
            </div>
          ))}
        </div>
      </section>

      <section id="fleet" className="space-y-8">
        <div className="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
          <div>
            <h2 className="text-2xl font-semibold tracking-tight text-slate-900">
              Fleet snapshots customers can explore later
            </h2>
            <p className="max-w-xl text-slate-600">
              Every vehicle card is wired for real-time availability inside the admin view.
            </p>
          </div>
          <Link
            href="/customer"
            className="inline-flex items-center gap-2 rounded-full bg-slate-900 px-5 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-700"
          >
            View as a Customer
          </Link>
        </div>
        <div className="grid gap-6 md:grid-cols-3">
          {fleet.map((item) => (
            <article key={item.name} className="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
              <header className="space-y-1">
                <p className="text-xs font-semibold uppercase tracking-[0.2em] text-primary">
                  {item.segment}
                </p>
                <h3 className="text-lg font-semibold text-slate-900">{item.name}</h3>
              </header>
              <dl className="mt-4 space-y-1 text-sm text-slate-600">
                <div className="flex justify-between">
                  <dt>Electric range</dt>
                  <dd className="font-medium text-slate-800">{item.range}</dd>
                </div>
                <div className="flex justify-between">
                  <dt>Sample rate</dt>
                  <dd className="font-medium text-slate-800">{item.rate}</dd>
                </div>
              </dl>
            </article>
          ))}
        </div>
      </section>
    </div>
  );
}
