'use client';

import React from "react";

const HeroSection: React.FC = () => {
  return (
    <section
      // Jarak pt ditingkatkan agar posisi konten lebih ke bawah
      className="px-4 md:px-0 pt-32 md:pt-56 pb-8 md:pb-20 flex flex-col justify-center items-center text-center w-full overflow-hidden"
    >
      <h1
        className="max-w-[95%] md:max-w-none w-full md:w-[800px]"
        style={{
          fontFamily: "Montserrat, sans-serif",
          fontWeight: 600,
          fontSize: "clamp(24px, 6vw, 55px)", 
          lineHeight: "1.2",
          letterSpacing: "0.02em",
          textAlign: "center",
          color: "#000000",
        }}
      >
        All Your Study{" "}
        <span
          className="inline-flex items-center justify-center rounded-lg md:rounded-[15px]"
          style={{
            background: "linear-gradient(to right, #E9EAE0, #EDD6D3)",
            // Rasio EM untuk menjaga bentuk background tetap konsisten & responsif
            width: "3.3em",  
            height: "1.1em", 
            display: "inline-flex",
            verticalAlign: "middle",
            lineHeight: "0",
          }}
        >
          Notes
        </span>
        {" "}in
        <br />
        <span className="block mt-2">
          One Place
        </span>
      </h1>

      <p
        className="max-w-[85%] md:max-w-none w-full md:w-[796px] text-sm md:text-base"
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

      <button
        className="text-white w-[150px] h-[50px] rounded-[15px] hover:opacity-90 mt-8 md:mt-10 transition-opacity"
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

export { HeroSection };