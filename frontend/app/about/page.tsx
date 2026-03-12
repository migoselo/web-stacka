import About from "@/components/About/about";
import type { Metadata } from "next";

export const metadata: Metadata = {
  title: "About Us - Stacka",
  description: "Learn about Stacka - A platform for students to access shared study notes and organize learning materials",
};

export default function AboutPage() {
  return <About />;
}
