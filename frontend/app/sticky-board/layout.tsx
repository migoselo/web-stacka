import type { Metadata } from "next";

export const metadata: Metadata = {
  title: "Sticky Board - Stacka",
};

export default function StickyBoardLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return children;
}
