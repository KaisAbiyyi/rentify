import { Badge } from "@/components/ui/badge";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";

const maintenance = [
  {
    vehicle: "Aurora EV Sedan",
    task: "Battery calibration",
    due: "Oct 3",
    duration: "4 hrs",
  },
  {
    vehicle: "Trailblazer Hybrid",
    task: "ADAS sensor alignment",
    due: "Oct 7",
    duration: "6 hrs",
  },
  {
    vehicle: "Metro Zip Compact",
    task: "Interior detailing",
    due: "Oct 1",
    duration: "3 hrs",
  },
];

const inventory = [
  {
    name: "Aurora EV Sedan",
    status: "32 available",
    occupancy: "68% utilization",
    tags: ["Executive", "EV"],
  },
  {
    name: "Trailblazer Hybrid",
    status: "21 available",
    occupancy: "74% utilization",
    tags: ["SUV", "Hybrid"],
  },
  {
    name: "Metro Zip Compact",
    status: "44 available",
    occupancy: "81% utilization",
    tags: ["City", "Compact"],
  },
];

export default function AdminFleetPage() {
  return (
    <div className="space-y-10">
      <header className="space-y-3">
        <p className="text-xs font-semibold uppercase tracking-[0.3em] text-primary">
          Fleet readiness
        </p>
        <h1 className="text-3xl font-semibold tracking-tight">Maintenance & availability</h1>
        <p className="max-w-2xl text-sm text-slate-600">
          Keep vehicles healthy with predictive maintenance windows, charge schedules, and auto-generated
          service tickets.
        </p>
      </header>

      <section className="grid gap-6 lg:grid-cols-[1fr_320px]">
        <div className="space-y-4">
          {inventory.map((item) => (
            <Card key={item.name} className="border-slate-200/80 bg-white/95">
              <CardHeader className="gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                  <CardTitle className="text-lg text-slate-900">{item.name}</CardTitle>
                  <p className="text-sm text-slate-500">{item.occupancy}</p>
                </div>
                <Badge className="bg-primary/10 text-xs font-semibold text-primary">
                  {item.status}
                </Badge>
              </CardHeader>
              <CardContent>
                <div className="flex flex-wrap gap-2">
                  {item.tags.map((tag) => (
                    <Badge key={tag} variant="outline" className="border-slate-200 text-slate-600">
                      {tag}
                    </Badge>
                  ))}
                </div>
              </CardContent>
            </Card>
          ))}
        </div>
        <Card className="border-slate-200/80 bg-white/95">
          <CardHeader>
            <CardTitle className="text-lg">Up next in maintenance</CardTitle>
          </CardHeader>
          <CardContent className="space-y-3 text-sm text-slate-600">
            {maintenance.map((item) => (
              <div
                key={item.vehicle}
                className="rounded-2xl border border-dashed border-slate-200 bg-slate-50/70 p-4"
              >
                <p className="text-sm font-semibold text-slate-900">{item.vehicle}</p>
                <p className="mt-2">{item.task}</p>
                <p className="mt-2 text-xs uppercase tracking-[0.2em] text-primary">
                  {item.due} • {item.duration}
                </p>
              </div>
            ))}
          </CardContent>
        </Card>
      </section>
    </div>
  );
}
