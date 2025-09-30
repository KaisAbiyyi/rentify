import Link from "next/link";

export default function CustomerLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <div className="min-h-screen bg-slate-50 text-slate-900">
      <header className="sticky top-0 z-50 border-b border-black/5 bg-white/90 backdrop-blur supports-[backdrop-filter]:bg-white/60">
        <div className="mx-auto flex w-full max-w-6xl items-center justify-between px-6 py-4">
          <Link href="/" className="text-xl font-semibold tracking-tight">
            Rentify Showcase
          </Link>
          <nav className="hidden items-center gap-6 text-sm font-medium md:flex">
            <Link href="#capabilities" className="transition hover:text-primary">
              Capabilities
            </Link>
            <Link href="#workflow" className="transition hover:text-primary">
              Workflow
            </Link>
            <Link href="#fleet" className="transition hover:text-primary">
              Fleet Preview
            </Link>
            <Link href="/customer" className="rounded-full border border-primary/20 px-4 py-2 transition hover:border-primary hover:bg-primary hover:text-primary-foreground">
              Customer Mode
            </Link>
          </nav>
          <Link
            href="/admin/onboarding"
            className="rounded-full bg-primary px-4 py-2 text-sm font-semibold text-primary-foreground shadow-sm transition hover:bg-primary/90"
          >
            Get Started
          </Link>
        </div>
      </header>
      <main className="mx-auto w-full max-w-6xl px-6 pb-16 pt-8">
        {children}
      </main>
      <footer className="border-t border-black/5 bg-white/70 py-8">
        <div className="mx-auto flex w-full max-w-6xl flex-col gap-2 px-6 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between">
          <p>© {new Date().getFullYear()} Rentify Experience Studio</p>
          <div className="flex gap-4">
            <Link href="/admin" className="hover:text-slate-900">
              Admin Portal
            </Link>
            <Link href="/customer" className="hover:text-slate-900">
              Customer Experience
            </Link>
          </div>
        </div>
      </footer>
    </div>
  );
}
