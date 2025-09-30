import Link from "next/link";

import { Button } from "@/components/ui/button";
import {
  Card,
  CardContent,
  CardFooter,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";

const vehicles = [
  {
    id: "EV-201",
    name: "Aurora EV Sedan",
    price: "$145/day",
    perks: ["Hands-free delivery", "Onboard Wi-Fi", "Level 3 fast-charge"],
  },
  {
    id: "SUV-118",
    name: "Trailblazer Hybrid",
    price: "$120/day",
    perks: ["Unlimited mileage", "Roof storage", "Adaptive cruise"],
  },
  {
    id: "CMP-402",
    name: "Metro Zip Compact",
    price: "$74/day",
    perks: ["Best for city rides", "Smart parking assist", "4 USB-C ports"],
  },
];

export default function CustomerExperiencePage() {
  return (
    <div className="space-y-16 py-10">
      <section className="space-y-4 text-center">
        <p className="text-xs font-semibold uppercase tracking-[0.3em] text-primary">
          Customer Sandbox
        </p>
        <h1 className="text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">
          Explore your rental marketplace in action
        </h1>
        <p className="mx-auto max-w-2xl text-sm text-slate-600 sm:text-base">
          Everything here is powered by the same admin controls you just explored. Swap inventory, change pricing, or launch campaigns and watch the customer flow react instantly.
        </p>
      </section>

      <section className="grid gap-6 lg:grid-cols-[1fr_320px]">
        <div className="space-y-6">
          {vehicles.map((vehicle) => (
            <Card key={vehicle.id} className="border-slate-200/80 bg-white/95">
              <CardHeader className="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                <div>
                  <p className="text-xs font-semibold uppercase tracking-[0.2em] text-primary">
                    {vehicle.id}
                  </p>
                  <CardTitle className="text-xl text-slate-900">{vehicle.name}</CardTitle>
                </div>
                <span className="rounded-full bg-slate-900 px-3 py-1 text-sm font-medium text-white">
                  {vehicle.price}
                </span>
              </CardHeader>
              <CardContent>
                <ul className="grid gap-2 text-sm text-slate-600 sm:grid-cols-2">
                  {vehicle.perks.map((perk) => (
                    <li key={perk} className="flex gap-2">
                      <span className="mt-1 h-1.5 w-1.5 rounded-full bg-primary" />
                      <span>{perk}</span>
                    </li>
                  ))}
                </ul>
              </CardContent>
              <CardFooter className="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <p className="text-sm text-slate-600">
                  Live availability syncs with the admin booking queue.
                </p>
                <Button className="rounded-full px-4 py-2 text-sm font-semibold">
                  Reserve this vehicle
                </Button>
              </CardFooter>
            </Card>
          ))}
        </div>
        <aside className="space-y-4 rounded-3xl border border-slate-200 bg-slate-900 p-6 text-white shadow-lg shadow-slate-900/20">
          <h2 className="text-lg font-semibold">Control Center Sync</h2>
          <p className="text-sm text-white/80">
            Trip approval rules, surge pricing, and add-ons are all driven by admin settings. Demonstrate how fast you can roll out a new promotion, then refresh this view to see the impact.
          </p>
          <div className="rounded-2xl bg-white/10 p-4">
            <p className="text-xs uppercase tracking-[0.25em] text-white/70">
              Suggested next step
            </p>
            <p className="mt-2 text-sm font-medium">
              Return to the <Link href="/admin" className="underline">admin dashboard</Link> to create a weekend bundle, then revisit this page to watch rates update.
            </p>
          </div>
        </aside>
      </section>
    </div>
  );
}
