import { Badge } from "@/components/ui/badge";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";

const insights = [
  {
    title: "Revenue per city",
    detail: "Austin and Denver lead the week with a combined +12% uplift after EV promotion.",
  },
  {
    title: "Booking lead times",
    detail: "45% of trips are booked < 24h in advance, suggesting opportunity for loyalty perks.",
  },
  {
    title: "Customer sentiment",
    detail:
      "4.8/5 average rating on post-trip surveys, with highest marks for pickup experience.",
  },
];

const experiments = [
  "Launch 3-day weekend bundles focused on remote work travelers.",
  "Offer in-app concierge upsells when rentals include child seats.",
  "Pilot EV charging partnerships for overnight bookings.",
];

export default function AdminInsightsPage() {
  return (
    <div className="space-y-10">
      <header className="space-y-3">
        <p className="text-xs font-semibold uppercase tracking-[0.3em] text-primary">
          Growth intelligence
        </p>
        <h1 className="text-3xl font-semibold tracking-tight">Insights</h1>
        <p className="max-w-2xl text-sm text-slate-600">
          Highlight trends your stakeholders care about, then convert them into experiments that customers will
          feel on the storefront.
        </p>
      </header>

      <section className="grid gap-6 md:grid-cols-3">
        {insights.map((item) => (
          <Card key={item.title} className="border-slate-200/80 bg-white/95">
            <CardHeader>
              <CardTitle className="text-lg text-slate-900">{item.title}</CardTitle>
            </CardHeader>
            <CardContent className="text-sm text-slate-600">{item.detail}</CardContent>
          </Card>
        ))}
      </section>

      <Card className="border-primary/30 bg-primary/5">
        <CardHeader>
          <CardTitle className="text-lg text-primary">Suggested experiments</CardTitle>
        </CardHeader>
        <CardContent className="space-y-3 text-sm text-primary/90">
          {experiments.map((item) => (
            <Badge
              key={item}
              variant="outline"
              className="block w-full border-primary/20 bg-white/40 py-3 text-left text-primary"
            >
              {item}
            </Badge>
          ))}
        </CardContent>
      </Card>
    </div>
  );
}
