'use client';

import React from "react";

const HeroSection: React.FC = () => {
  return (
    <section
      className="px-4 md:px-0 pt-12 md:pt-[115px] pb-8 md:pb-20"
      style={{
        display: "flex",
        justifyContent: "center",
        alignItems: "center",
        textAlign: "center",
        flexDirection: "column",
      }}
    >
      <h1
        className="max-w-xs md:max-w-none w-full md:w-[704px] px-2 md:px-0"
        style={{
          fontFamily: "Montserrat, sans-serif",
          fontWeight: 600,
          fontSize: "clamp(20px, 7vw, 55px)",
          lineHeight: "1.2",
          letterSpacing: "2%",
          textAlign: "center",
          color: "#000000",
        }}
      >
        All Your Study{" "}
        <span
          className="inline-block px-2 py-1 md:px-0 md:py-0 md:w-[182px] md:h-[61px] md:leading-[61px] rounded-lg md:rounded-[15px]"
          style={{
            background:
              "linear-gradient(to right, #E9EAE0, #EDD6D3)",
          }}
        >
          Notes
        </span>
        {" "}in
        <br />
        <span style={{ display: "block", marginTop: "8px" }}>
          One Place
        </span>
      </h1>

      <p
        className="max-w-xs md:max-w-none w-full md:w-[796px] px-2 md:px-0 text-sm md:text-base"
        style={{
          marginTop: "16px",
          fontFamily: "Montserrat, sans-serif",
          fontWeight: 500,
          textAlign: "center",
          color: "#000000",
        }}
      >
        A structured space to discover high-quality study notes.
      </p>

        {/* Button */}
        <button
          className="text-white w-[150px] h-[50px] rounded-[15px] hover:opacity-90 mt-8 md:mt-10"
          onClick={() => window.open('https://play.google.com/store/apps/details?id=com.stacka.app', '_blank')}
          style={{
            background: "linear-gradient(180deg,  #3F3F3F, #1F1F1F)",
            fontFamily: "Montserrat",
            fontWeight: 600,
            fontSize: "16px",
          }}
        >
          Get the App
        </button>

    </section>
  );
};

const FeatureSection: React.FC = () => {
  return (
    <div
      className="px-4 md:px-0 py-8 md:py-0 w-full md:w-[1500px] mx-auto"
      style={{
        height: "auto",
        marginTop: "20px",
        marginBottom: "40px",
        display: "flex",
        justifyContent: "center",
        alignItems: "center",
        borderRadius: "20px",
        background:
          "linear-gradient(185deg, rgba(255,255,255,0.59) 10%, rgba(233,234,224,0.95) 100%)",
      }}
    >
      <img
        src="/assets/images/home.svg"
        alt="product"
        className="w-full max-w-[900px] h-auto"
        style={{
          objectFit: "contain",
        }}
      />
    </div>
  );
};

export { HeroSection, FeatureSection };
