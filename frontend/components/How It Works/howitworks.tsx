"use client";
import { useState, useRef } from "react";

const steps = [
  {
    number: "02",
    title: "Explore Notes",
    color: "#FAF3F2",
    desc: "Browse notes by category, exam type, or search what you need.",
  },
  {
    number: "03",
    title: "Open and Save",
    color: "#F6ECEA",
    desc: "Read detailed notes and bookmark useful ones for later.",
  },
  {
    number: "04",
    title: "Upload Notes",
    color: "#EFE0DD",
    desc: "Share your study notes to help other students learn.",
  },
  {
    number: "05",
    title: "Study Smarter",
    color: "#EDD6D3",
    desc: "Access organized note to study more efficiently.",
  },
];

const allSteps = [
  {
    number: "01",
    title: "Create Your Account",
    color: "#F6ECEA",
    desc: "Register with your campus email to start using the app.",
  },
  ...steps.map((s) => ({ ...s })),
];

const HowItWorks: React.FC = () => {
  const [active, setActive] = useState(0);
  const [mobileActive, setMobileActive] = useState(0);
  const containerRef = useRef<HTMLDivElement>(null);

  const handleMouseMove = (e: React.MouseEvent<HTMLDivElement>) => {
    if (!containerRef.current) return;
    const container = containerRef.current;
    const rect = container.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const totalWidth = rect.width;
    const ratio = x / totalWidth;
    // Map ratio to one of 5 panels
    const index = Math.min(4, Math.floor(ratio * 5));
    setActive(index);
  };

  return (
    <section
      id="how-it-works"
      className="px-4 md:px-0"
      style={{
        fontFamily: "Montserrat, sans-serif",
        paddingTop: "40px",
        paddingBottom: "150px",
        textAlign: "center",
      }}
    >
      <h2 className="text-2xl md:text-[40px] font-semibold mb-2 md:mb-[10px] text-black">
        How it Works
      </h2>

      <p className="text-xs md:text-[16px] text-gray-400 mb-8 md:mb-[50px]">
        Find, organize, and access study notes in a few simple steps.
      </p>

      {/* ── DESKTOP LAYOUT ── */}
      <div
        ref={containerRef}
        onMouseMove={handleMouseMove}
        className="hidden md:flex"
        style={{
          width: "1206px",
          height: "361px",
          margin: "0 auto",
          borderRadius: "24px",
          overflow: "hidden",
          cursor: "pointer",
        }}
      >
        {/* STEP 01 */}
        <div
          style={{
            flex: active === 0 ? 4 : 1,
            background: "#F6ECEA",
            padding: active === 0 ? "50px" : "30px 0",
            boxShadow: active === 0 ? "0 8px 24px rgba(0,0,0,0.1)" : "none",
            display: "flex",
            flexDirection: "column",
            justifyContent: active === 0 ? "center" : "space-between",
            alignItems: active === 0 ? "flex-start" : "center",
            transition: "all 0.6s ease",
            textAlign: active === 0 ? "left" : "center",
            overflow: "hidden",
          }}
        >
          {active === 0 ? (
            <>
              <p style={{ fontSize: "25px", marginBottom: "10px", color: "#000000", marginTop: "-80px" }}>
                STEP 01
              </p>
              <h3 style={{ fontSize: "clamp(16px, 5vw, 25px)", fontWeight: 600, marginBottom: "5px", color: "#000000", marginTop: "40px" }}>
                Create Your Account
              </h3>
              <p style={{ fontSize: "16px", color: "#1F1F1F" }}>
                Register with your campus email to start using the app.
              </p>
            </>
          ) : (
            <>
              <span style={{ fontSize: "25px", fontWeight: 500, color: "#000000" }}>01</span>
              <span style={{ transform: "rotate(-90deg)", fontSize: "20px", fontWeight: 600, whiteSpace: "nowrap", color: "#1F1F1F", marginTop: "70px" }}>
                Create Account
              </span>
              <div style={{ height: "45px" }} />
            </>
          )}
        </div>

        {/* STEP 02-05 */}
        {steps.map((step, index) => {
          const isActive = active === index + 1;
          return (
            <div
              key={index}
              style={{
                flex: isActive ? 4 : 1,
                background: step.color,
                padding: isActive ? "50px" : "30px 0",
                display: "flex",
                flexDirection: "column",
                justifyContent: isActive ? "center" : "space-between",
                alignItems: isActive ? "flex-start" : "center",
                transition: "all 0.6s ease",
                textAlign: isActive ? "left" : "center",
                overflow: "hidden",
              }}
            >
              {isActive ? (
                <>
                  <p style={{ fontSize: "25px", marginBottom: "10px", color: "#000000", marginTop: "-80px" }}>
                    STEP {step.number}
                  </p>
                  <h3 style={{ fontSize: "25px", fontWeight: 600, marginBottom: "5px", color: "#000000", marginTop: "40px" }}>
                    {step.title}
                  </h3>
                  <p style={{ fontSize: "16px", color: "#1F1F1F" }}>{step.desc}</p>
                </>
              ) : (
                <>
                  <span style={{ fontSize: "25px", fontWeight: 500, color: "#000000" }}>{step.number}</span>
                  <span style={{ transform: "rotate(-90deg)", fontSize: "20px", fontWeight: 600, whiteSpace: "nowrap", color: "#1F1F1F", marginTop: "70px" }}>
                    {step.title}
                  </span>
                  <div style={{ height: "45px" }} />
                </>
              )}
            </div>
          );
        })}
      </div>

      {/* ── MOBILE LAYOUT ── */}
      <div
        className="flex md:hidden"
        style={{
          flexDirection: "column",
          borderRadius: "24px",
          overflow: "hidden",
          width: "100%",
        }}
      >
        {allSteps.map((step, index) => {
          const isActive = mobileActive === index;
          return (
            <div
              key={index}
              onClick={() => setMobileActive(index)}
              style={{
                background: step.color,
                display: "flex",
                flexDirection: "column",
                justifyContent: "center",
                alignItems: "flex-start",
                padding: isActive ? "28px 24px" : "0px 24px",
                minHeight: isActive ? "140px" : "52px",
                boxShadow: isActive ? "0 8px 24px rgba(0,0,0,0.08)" : "none",
                transition: "all 0.4s ease",
                cursor: "pointer",
                textAlign: "left",
                overflow: "hidden",
              }}
            >
              {isActive ? (
                <>
                  <p style={{ fontSize: "13px", margin: "0 0 8px", color: "#000000" }}>
                    STEP {step.number}
                  </p>
                  <h3 style={{ fontSize: "20px", fontWeight: 600, margin: "0 0 6px", color: "#000000" }}>
                    {step.title}
                  </h3>
                  <p style={{ fontSize: "13px", color: "#1F1F1F", margin: 0, lineHeight: "1.6" }}>
                    {step.desc}
                  </p>
                </>
              ) : (
                <div style={{ display: "flex", alignItems: "center", justifyContent: "space-between", width: "100%" }}>
                  <span style={{ fontSize: "16px", fontWeight: 500, color: "#000000" }}>
                    {step.number}
                  </span>
                  <span style={{ fontSize: "15px", fontWeight: 600, color: "#1F1F1F" }}>
                    {step.title}
                  </span>
                  <div style={{ width: "16px" }} />
                </div>
              )}
            </div>
          );
        })}
      </div>
    </section>
  );
};

export default HowItWorks;