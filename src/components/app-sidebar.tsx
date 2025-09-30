"use client";

import {
  BarChart3,
  BookOpenCheck,
  CarFront,
  ClipboardList,
  LifeBuoy,
  Settings,
  ShieldCheck,
} from "lucide-react";
import Link from "next/link";

import {
  Sidebar,
  SidebarContent,
  SidebarFooter,
  SidebarGroup,
  SidebarGroupContent,
  SidebarGroupLabel,
  SidebarHeader,
  SidebarInset,
  SidebarMenu,
  SidebarMenuBadge,
  SidebarMenuButton,
  SidebarMenuItem,
  SidebarProvider,
  SidebarRail,
  SidebarSeparator,
  SidebarTrigger,
} from "@/components/ui/sidebar";

const primaryNavigation = [
  { title: "Overview", url: "/admin", icon: BarChart3, badge: "Live" },
  { title: "Bookings", url: "/admin/bookings", icon: ClipboardList, badge: "7" },
  { title: "Fleet", url: "/admin/fleet", icon: CarFront, badge: null },
  { title: "Insights", url: "/admin/insights", icon: BookOpenCheck, badge: "New" },
];

const secondaryNavigation = [
  { title: "Safety", url: "#", icon: ShieldCheck },
  { title: "Support", url: "#", icon: LifeBuoy },
  { title: "Settings", url: "#", icon: Settings },
];

export function AdminShell({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <SidebarProvider defaultOpen>
      <AppSidebar />
      <SidebarInset className="bg-gradient-to-br from-slate-50 via-white to-slate-100">
        <header className="sticky top-0 z-10 flex items-center justify-between border-b border-white/60 bg-white/80 px-6 py-4 backdrop-blur">
          <div className="flex items-center gap-3">
            <SidebarTrigger className="border border-slate-200 bg-white hover:bg-primary/10 hover:text-primary" />
            <div>
              <p className="text-xs font-semibold uppercase tracking-[0.3em] text-primary">
                Rentify Admin
              </p>
              <h1 className="text-lg font-semibold text-slate-900">
                Operations cockpit
              </h1>
            </div>
          </div>
          <div className="flex items-center gap-3 text-sm text-slate-500">
            <span className="hidden rounded-full border border-slate-200 px-3 py-1 sm:inline-flex">
              Guided demo mode
            </span>
            <Link
              href="/customer"
              className="inline-flex items-center rounded-full bg-primary px-4 py-2 text-sm font-semibold text-primary-foreground shadow-sm transition hover:bg-primary/90"
            >
              Switch to Customer
            </Link>
          </div>
        </header>
        <div className="space-y-8 px-6 py-8">
          {children}
        </div>
      </SidebarInset>
      <SidebarRail />
    </SidebarProvider>
  );
}

export function AppSidebar() {
  return (
    <Sidebar variant="inset">
      <SidebarHeader className="gap-1 p-4">
        <p className="text-xs font-semibold uppercase tracking-[0.3em] text-primary">
          Rentify
        </p>
        <h2 className="text-lg font-semibold text-slate-900">Control Center</h2>
        <p className="text-xs text-slate-500">
          Configure, monitor, and optimize every rental touchpoint.
        </p>
      </SidebarHeader>
      <SidebarSeparator />
      <SidebarContent>
        <SidebarGroup>
          <SidebarGroupLabel>Core navigation</SidebarGroupLabel>
          <SidebarGroupContent>
            <SidebarMenu>
              {primaryNavigation.map((item) => (
                <SidebarMenuItem key={item.title}>
                  <SidebarMenuButton asChild>
                    <Link href={item.url}>
                      <item.icon className="size-4" />
                      <span>{item.title}</span>
                    </Link>
                  </SidebarMenuButton>
                  {item.badge && (
                    <SidebarMenuBadge className="bg-primary/10 text-xs font-semibold text-primary">
                      {item.badge}
                    </SidebarMenuBadge>
                  )}
                </SidebarMenuItem>
              ))}
            </SidebarMenu>
          </SidebarGroupContent>
        </SidebarGroup>
        <SidebarSeparator />
        <SidebarGroup>
          <SidebarGroupLabel>Operational tools</SidebarGroupLabel>
          <SidebarGroupContent>
            <SidebarMenu>
              {secondaryNavigation.map((item) => (
                <SidebarMenuItem key={item.title}>
                  <SidebarMenuButton asChild>
                    <Link href={item.url}>
                      <item.icon className="size-4" />
                      <span>{item.title}</span>
                    </Link>
                  </SidebarMenuButton>
                </SidebarMenuItem>
              ))}
            </SidebarMenu>
          </SidebarGroupContent>
        </SidebarGroup>
      </SidebarContent>
      <SidebarFooter className="p-4">
        <div className="rounded-2xl border border-dashed border-primary/40 bg-primary/10 p-3 text-xs text-primary">
          <p className="font-semibold text-primary/90">Need a custom flow?</p>
          <p className="mt-1 text-primary/80">
            Swap this sidebar with your CRM integrations and analytics widgets.
          </p>
        </div>
      </SidebarFooter>
    </Sidebar>
  );
}
