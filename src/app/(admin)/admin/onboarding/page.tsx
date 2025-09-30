import Link from "next/link";

import { Button } from "@/components/ui/button";
import {
  Card,
  CardContent,
  CardFooter,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";

const steps = [
  {
    title: "Configure fleet presets",
    description:
      "Choose the vehicles you'll spotlight in the demo, set sample availability, and confirm maintenance windows.",
  },
  {
    title: "Tune business rules",
    description:
      "Adjust pricing multipliers, loyalty perks, and approvals so stakeholders see your operational precision.",
  },
  {
    title: "Stage customer narrative",
    description:
      "Curate the booking journey that investors or prospects should follow after you hand them the reins.",
  },
];

export default function AdminOnboardingPage() {
  return (
    <div className="space-y-12">
      <header className="space-y-3">
        <p className="text-xs font-semibold uppercase tracking-[0.3em] text-primary">
          Start here
        </p>
        <h1 className="text-3xl font-semibold tracking-tight">Admin onboarding</h1>
        <p className="max-w-2xl text-sm text-slate-600">
          This guided checklist shows stakeholders how your team stands up a rental operation in minutes.
          Complete these steps before inviting them to the customer experience.
        </p>
      </header>

      <section className="grid gap-6 md:grid-cols-3">
        {steps.map((step, index) => (
          <Card key={step.title} className="relative border-slate-200/80 bg-white/95">
            <CardHeader className="space-y-3">
              <span className="inline-flex size-10 items-center justify-center rounded-full bg-primary text-sm font-semibold text-primary-foreground">
                {index + 1}
              </span>
              <CardTitle className="text-lg text-slate-900">{step.title}</CardTitle>
            </CardHeader>
            <CardContent>
              <p className="text-sm text-slate-600">{step.description}</p>
            </CardContent>
            <CardFooter>
              <Button
                asChild
                variant="outline"
                className="border-slate-300 text-slate-700 hover:border-primary hover:text-primary"
              >
                <Link href={index === steps.length - 1 ? "/customer" : "/admin"}>
                  {index === steps.length - 1
                    ? "Preview customer journey"
                    : "Open admin tools"}
                </Link>
              </Button>
            </CardFooter>
          </Card>
        ))}
      </section>

      <Card className="border-primary/20 bg-primary/10 text-sm text-primary/90">
        <CardHeader>
          <CardTitle className="text-primary">Ready to hand over the keys?</CardTitle>
        </CardHeader>
        <CardContent>
          Once stakeholders finish the admin tour, direct them to the <Link href="/customer" className="underline">customer experience</Link> and let them try a live reservation.
        </CardContent>
      </Card>
    </div>
  );
}
