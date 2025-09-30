import { Badge } from "@/components/ui/badge";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";

const bookings = [
  {
    reference: "RQ-98421",
    renter: "Nova Labs",
    status: "Awaiting approval",
    start: "Oct 2",
    end: "Oct 6",
  },
  {
    reference: "RQ-98422",
    renter: "Urban Travels",
    status: "Payment review",
    start: "Oct 4",
    end: "Oct 9",
  },
  {
    reference: "RQ-98435",
    renter: "Helio Ventures",
    status: "Confirmed",
    start: "Oct 12",
    end: "Oct 16",
  },
];

export default function AdminBookingsPage() {
  return (
    <div className="space-y-10">
      <header className="space-y-3">
        <p className="text-xs font-semibold uppercase tracking-[0.3em] text-primary">
          Booking oversight
        </p>
        <h1 className="text-3xl font-semibold tracking-tight">Approvals & queue</h1>
        <p className="max-w-2xl text-sm text-slate-600">
          Triage the reservations that need human attention, then automate repeatable decisions with rules.
        </p>
      </header>

      <Card className="border-slate-200/80 bg-white/95">
        <CardHeader>
          <CardTitle className="text-lg">Manual review queue</CardTitle>
        </CardHeader>
        <CardContent className="overflow-hidden p-0">
          <table className="w-full min-w-[480px] border-collapse text-left text-sm">
            <thead className="bg-slate-50 text-xs uppercase tracking-[0.2em] text-slate-500">
              <tr>
                <th className="px-6 py-4">Reference</th>
                <th className="px-6 py-4">Renter</th>
                <th className="px-6 py-4">Status</th>
                <th className="px-6 py-4">Start</th>
                <th className="px-6 py-4">Return</th>
              </tr>
            </thead>
            <tbody>
              {bookings.map((booking, index) => (
                <tr
                  key={booking.reference}
                  className={index % 2 === 0 ? "bg-white" : "bg-slate-50/60"}
                >
                  <td className="px-6 py-4 font-medium text-slate-900">{booking.reference}</td>
                  <td className="px-6 py-4">{booking.renter}</td>
                  <td className="px-6 py-4">
                    <Badge variant="outline" className="border-primary/30 text-primary">
                      {booking.status}
                    </Badge>
                  </td>
                  <td className="px-6 py-4">{booking.start}</td>
                  <td className="px-6 py-4">{booking.end}</td>
                </tr>
              ))}
            </tbody>
          </table>
        </CardContent>
      </Card>
    </div>
  );
}
