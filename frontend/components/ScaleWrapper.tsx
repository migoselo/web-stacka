"use client";
import { useEffect, useRef } from "react";

export default function ScaleWrapper({ children }: { children: React.ReactNode }) {
  const wrapperRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    const DESIGN_WIDTH = 1440;

    const scale = () => {
      const vw = window.innerWidth;
      const ratio = vw / DESIGN_WIDTH;
      if (wrapperRef.current) {
        wrapperRef.current.style.transform = `scale(${ratio})`;
        wrapperRef.current.style.transformOrigin = "top left";
        document.body.style.height = `${wrapperRef.current.scrollHeight * ratio}px`;
      }
    };

    scale();
    window.addEventListener("resize", scale);
    return () => window.removeEventListener("resize", scale);
  }, []);

  return (
    <div ref={wrapperRef} style={{ width: "1440px", position: "relative" }}>
      {children}
    </div>
  );
}