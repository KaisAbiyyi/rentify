import { Badge } from "@/components/ui/badge";
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";

const metrics = [
  {
    title: "Active rentals",
    value: "128",
    change: "+32% vs last week",
  },
  {
    title: "Utilization",
    value: "86%",
    change: "+5% after pricing update",
  },
  {
    title: "Maintenance alerts",
    value: "4 vehicles",
    change: "All scheduled for tomorrow",
  },
];

const agenda = [
  {
    name: "Approve pending bookings",
    detail: "7 reservations require manual sign-off due to corporate discounts.",
  },
  {
    name: "Review pricing insights",
    detail: "Dynamic pricing recommends a 6% lift for weekend rates in Austin.",
  },
  {
    name: "Plan maintenance",
    detail: "Align EV charging windows with low-demand hours.",
  },
];

export default function AdminOverviewPage() {
  return (
    <div className="space-y-10">
      <header className="space-y-3">
        <p className="text-xs font-semibold uppercase tracking-[0.3em] text-primary">
          Live operations
        </p>
        <h1 className="text-3xl font-semibold tracking-tight">Overview</h1>
        <p className="max-w-2xl text-sm text-slate-600">
          This dashboard simulates what your operators see each morning—fleet health, booking velocity, and
          the nudges that keep revenue expanding.
        </p>
      </header>

      <section className="grid gap-4 md:grid-cols-3">
        {metrics.map((metric) => (
          <Card key={metric.title} className="border-slate-200/80 bg-white/90">
            <CardHeader>
              <CardDescription className="text-slate-500">
                {metric.title}
              </CardDescription>
              <CardTitle className="text-3xl text-slate-900">
                {metric.value}
              </CardTitle>
            </CardHeader>
            <CardContent>
              <Badge className="bg-primary/10 text-xs font-semibold text-primary">
                {metric.change}
              </Badge>
            </CardContent>
          </Card>
        ))}
      </section>

      <section className="grid gap-6 lg:grid-cols-[1fr_320px]">
        <Card className="border-slate-200/80 bg-white/95">
          <CardHeader>
            <CardTitle className="text-lg">Today's priorities</CardTitle>
            <CardDescription>
              Work through the critical actions before flipping into the customer journey.
            </CardDescription>
          </CardHeader>
          <CardContent className="space-y-3 text-sm text-slate-600">
            {agenda.map((item) => (
              <div
                key={item.name}
                className="rounded-2xl border border-slate-100 bg-slate-50/80 p-4"
              >
                <p className="font-medium text-slate-900">{item.name}</p>
                <p className="mt-2 text-sm text-slate-600">{item.detail}</p>
              </div>
            ))}
          </CardContent>
        </Card>
        <Card className="border-primary/30 bg-primary/10 text-sm text-primary">
          <CardHeader>
            <CardTitle className="text-primary">Switching roles</CardTitle>
            <CardDescription className="text-primary/80">
              Keep this cadence handy when narrating the demo to prospects.
            </CardDescription>
          </CardHeader>
          <CardContent>
            Once these items look good, continue to the customer demo to see how the storefront reacts. The
            navigation shortcuts above make it easy to hop between modes.
          </CardContent>
        </Card>
      </section>
    </div>
  );
}
