"use client";
import { useState } from "react";

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
    desc: "Register with your email to start using the app.",
  },
  ...steps.map((s) => ({ ...s })),
];

const HowItWorks: React.FC = () => {
  const [active, setActive] = useState(0);
  const [mobileActive, setMobileActive] = useState(0);

  return (
    <section
      id="how-it-works"
      className="px-4 lg:px-0"
      style={{
        fontFamily: "Montserrat, sans-serif",
        paddingTop: "100px",
        paddingBottom: "150px",
        textAlign: "center",
      }}
    >
      <h2 className="text-2xl lg:text-[40px] font-semibold mb-2 lg:mb-[10px] text-black">
        How it Works
      </h2>

      <p className="text-xs lg:text-[16px] text-gray-400 mb-8 lg:mb-[50px]">
        Find, organize, and access study notes in a few simple steps.
      </p>

      {/* ── DESKTOP LAYOUT ── */}
      <div 
        className="hidden lg:block" 
        style={{ 
          width: "100%",
          overflow: "hidden" 
        }}
      >
        <div
          style={{
            width: "1206px",
            height: "361px",
            margin: "0 auto",
            borderRadius: "24px",
            overflow: "hidden",
            cursor: "pointer",
            display: "flex",
          }}
        >
          {allSteps.map((step, index) => {
            const isActive = active === index;
            return (
              <div
                key={index}
                onClick={() => setActive(index)}
                style={{
                  width: isActive ? "674px" : "133px",
                  height: "361px",
                  background: step.color,
                  padding: isActive ? "55px 65px" : "0",
                  boxShadow: isActive ? "0 8px 24px rgba(0,0,0,0.1)" : "none",
                  display: "flex",
                  flexDirection: "column",
                  justifyContent: isActive ? "flex-start" : "space-between",
                  alignItems: "center",
                  transition: "all 0.3s ease",
                  textAlign: isActive ? "left" : "center",
                  overflow: "hidden",
                  flexShrink: 0,
                }}
              >
                {isActive ? (
                  <div style={{ textAlign: "left", width: "100%" }}>
                    <p style={{ fontSize: "25px", fontWeight: 500, color: "#000000", marginBottom: "40px" }}>
                      STEP {step.number}
                    </p>
                    <h3 style={{ fontSize: "25px", fontWeight: 600, marginBottom: "8px", color: "#000000" }}>
                      {step.title}
                    </h3>
                    <p style={{ fontSize: "16px", color: "#1F1F1F", maxWidth: "400px", lineHeight: "1.5" }}>
                      {step.desc}
                    </p>
                  </div>
                ) : (
                  <>
                    <span style={{ fontSize: "25px", fontWeight: 500, color: "#000000", marginTop: "35px" }}>
                      {step.number}
                    </span>
                    <span 
                      style={{ 
                        writingMode: "vertical-rl",
                        transform: "rotate(180deg)",
                        fontSize: "20px", 
                        fontWeight: 600, 
                        whiteSpace: "nowrap", 
                        color: "#1F1F1F", 
                        marginBottom: "35px",
                        display: "inline-block"
                      }}
                    >
                      {step.title}
                    </span>
                  </>
                )}
              </div>
            );
          })}
        </div>
      </div>

      {/* ── MOBILE & TABLET LAYOUT ── */}
      <div 
        className="flex lg:hidden"
        style={{ 
          flexDirection: "column", 
          borderRadius: "24px", 
          overflow: "hidden", 
          width: "100%",
          maxWidth: "500px",
          margin: "0 auto"
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
                padding: isActive ? "28px 24px" : "15px 24px",
                // ✅ minHeight saat tertutup dinaikkan jadi 80px biar agak gedean
                minHeight: isActive ? "140px" : "80px", 
                boxShadow: isActive ? "0 8px 24px rgba(0,0,0,0.08)" : "none",
                transition: "all 0.3s ease",
                cursor: "pointer",
                textAlign: "left",
                overflow: "hidden",
              }}
            >
              {isActive ? (
                <>
                  <p style={{ fontSize: "13px", margin: "0 0 8px", color: "#000000" }}>STEP {step.number}</p>
                  <h3 style={{ fontSize: "20px", fontWeight: 600, margin: "0 0 6px", color: "#000000" }}>{step.title}</h3>
                  <p style={{ fontSize: "13px", color: "#1F1F1F", margin: 0, lineHeight: "1.6" }}>{step.desc}</p>
                </>
              ) : (
                <div style={{ display: "flex", alignItems: "center", justifyContent: "space-between", width: "100%" }}>
                  <span style={{ fontSize: "16px", fontWeight: 500, color: "#000000" }}>{step.number}</span>
                  <span style={{ fontSize: "15px", fontWeight: 600, color: "#1F1F1F" }}>{step.title}</span>
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