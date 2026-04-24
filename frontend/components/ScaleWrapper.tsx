// "use client";
// import { useEffect, useRef, useState } from "react";

// export default function ScaleWrapper({ children }: { children: React.ReactNode }) {
//   const wrapperRef = useRef<HTMLDivElement>(null);

//   useEffect(() => {
//     const DESIGN_WIDTH = 1440;
//     const isMobile = window.innerWidth < 768;

//     if (isMobile) {
//       // Mobile: tiap section jadi full screen snap
//       document.documentElement.style.scrollSnapType = "y mandatory";
//       document.documentElement.style.overflowY = "scroll";
//       document.documentElement.style.height = "100%";
//       document.body.style.height = "100%";

//       // Kasih snap ke semua section langsung di children
//       if (wrapperRef.current) {
//         const sections = wrapperRef.current.querySelectorAll("div[id], section[id]");
//         sections.forEach((el) => {
//           (el as HTMLElement).style.scrollSnapAlign = "start";
//           (el as HTMLElement).style.minHeight = "100svh";
//           (el as HTMLElement).style.display = "flex";
//           (el as HTMLElement).style.flexDirection = "column";
//           (el as HTMLElement).style.justifyContent = "center";
//         });
//       }

//       // Scale tetap jalan
//       const ratio = Math.max(window.innerWidth / DESIGN_WIDTH, 0.45);
//       if (wrapperRef.current) {
//         wrapperRef.current.style.transform = `scale(${ratio})`;
//         wrapperRef.current.style.transformOrigin = "top left";
//       }

//     } else {
//       // Desktop: normal scale
//       const scale = () => {
//         const ratio = window.innerWidth / DESIGN_WIDTH;
//         if (wrapperRef.current) {
//           wrapperRef.current.style.transform = `scale(${ratio})`;
//           wrapperRef.current.style.transformOrigin = "top left";
//           document.body.style.height = `${wrapperRef.current.scrollHeight * ratio}px`;
//         }
//       };
//       scale();
//       window.addEventListener("resize", scale);
//       return () => window.removeEventListener("resize", scale);
//     }
//   }, []);

//   return (
//     <div ref={wrapperRef} style={{ width: "1440px", position: "relative", display: "flex", flexDirection: "column" }}>
//       {children}
//     </div>
//   );
// }