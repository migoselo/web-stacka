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

const HowItWorks: React.FC = () => {
  const [active, setActive] = useState(0);

  return (
    <section
      id="how-it-works"
      style={{
        fontFamily: "Montserrat, sans-serif",
        paddingTop: "40px",
        paddingBottom: "150px",
        textAlign: "center",
      }}
    >
      <h2 style={{ fontWeight: 600, fontSize: "40px", marginBottom: "10px", color: "#000000" }}>
        How it Works
      </h2>

      <p style={{ fontSize: "16px", color: "#9D9D9D", marginBottom: "50px" }}>
        Find, organize, and access study notes in a few simple steps.
      </p>

      <div
        style={{
          width: "1206px",
          height: "361px",
          margin: "0 auto",
          display: "flex",
          borderRadius: "24px",
          overflow: "hidden",
        }}
      >

        {/* STEP 01 */}
        <div
          onMouseEnter={() => setActive(0)}
          style={{
            flex: active === 0 ? 4 : 1,
            background: "#F6ECEA",
            padding: active === 0 ? "50px" : "30px 0",
            boxShadow: active === 0 ? "0 8px 24px rgba(0,0,0,0.1)" : "none",
            display: "flex",
            flexDirection: "column",
            justifyContent: active === 0 ? "center" : "space-between",
            alignItems: active === 0 ? "flex-start" : "center",
            transition: "all 0.4s ease",
            cursor: "pointer",
            textAlign: active === 0 ? "left" : "center",
          }}
        >
          {active === 0 ? (
            <>
              <p style={{ fontSize: "25px", marginBottom: "10px", color: "#000000", marginTop: "-80px" }}>
                STEP 01
              </p>

              <h3 style={{ fontSize: "25px", fontWeight: 600, marginBottom: "5px", color: "#000000", marginTop: "70px" }}>
                Create Your Account
              </h3>

              <p style={{ fontSize: "16px", color: "#1F1F1F" }}>
                Register with your campus email to start using the app.
              </p>
            </>
          ) : (
            <>
              <span style={{ fontSize: "25px", fontWeight: 500, color: "#000000" }}>
                01
              </span>

              <span
                style={{
                  transform: "rotate(-90deg)",
                  fontSize: "20px",
                  fontWeight: 600,
                  whiteSpace: "nowrap",
                  color: "#1F1F1F",
                }}
              >
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
              onMouseEnter={() => setActive(index + 1)}
              style={{
                flex: isActive ? 4 : 1,
                background: step.color,
                padding: isActive ? "50px" : "30px 0",
                display: "flex",
                flexDirection: "column",
                justifyContent: isActive ? "center" : "space-between",
                alignItems: isActive ? "flex-start" : "center",
                transition: "all 0.4s ease",
                cursor: "pointer",
                textAlign: isActive ? "left" : "center",
              }}
            >
              {isActive ? (
                <>
                  <p style={{ fontSize: "25px", marginBottom: "10px", color: "#000000", marginTop: "-80px" }}>
                    STEP {step.number}
                  </p>

                  <h3 style={{ fontSize: "25px", fontWeight: 600, marginBottom: "5px", color: "#000000", marginTop: "70px" }}>
                    {step.title}
                  </h3>

                  <p style={{ fontSize: "16px", color: "#1F1F1F" }}>
                    {step.desc}
                  </p>
                </>
              ) : (
                <>
                  <span style={{ fontSize: "25px", fontWeight: 500, color: "#000000" }}>
                    {step.number}
                  </span>

                  <span
                    style={{
                      transform: "rotate(-90deg)",
                      fontSize: "20px",
                      fontWeight: 600,
                      whiteSpace: "nowrap",
                      color: "#1F1F1F",
                    }}
                  >
                    {step.title}
                  </span>

                  <div style={{ height: "45px" }} />
                </>
              )}
            </div>
          );
        })}
      </div>
    </section>
  );
};

export default HowItWorks;