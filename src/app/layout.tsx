import type { Metadata } from "next";
import { Geist, Geist_Mono } from "next/font/google";
import "./globals.css";

const geistSans = Geist({
  variable: "--font-geist-sans",
  subsets: ["latin"],
});

const geistMono = Geist_Mono({
  variable: "--font-geist-mono",
  subsets: ["latin"],
});

export const metadata: Metadata = {
  title: "Rentify Simulation Studio",
  description:
    "Demonstrate a production-ready rental car platform across admin and customer journeys.",
  metadataBase: new URL("https://rentify-demo.local"),
  openGraph: {
    title: "Rentify Simulation Studio",
    description:
      "Tour the admin control center, then explore the customer storefront for a rental car brand.",
    url: "https://rentify-demo.local",
    siteName: "Rentify Showcase",
  },
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <body
        className={`${geistSans.variable} ${geistMono.variable} antialiased bg-background text-foreground`}
      >
        {children}
      </body>
    </html>
  );
}
