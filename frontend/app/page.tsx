import { HeroSection } from "@/components/Home/getapp";
import { FeatureSection } from "@/components/Home/FeatureSection";
import About from "@/components/About/about";
import HowItWorks from "@/components/How It Works/howitworks";


export default function Home() {
  return (
    <main className="bg-white">
      <HeroSection />
      <FeatureSection />
      <About />
      <HowItWorks />
    </main>
  );
}