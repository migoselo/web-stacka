'use client';

import React, { useState } from "react";

const AnnotationCard = ({ 
  title, 
  description, 
  top, 
  left,
  right 
}: { 
  title: string; 
  description: string; 
  top: string; 
  left?: string; 
  right?: string;
}) => {
  const [isHovered, setIsHovered] = useState(false);

  return (
    <div
      onMouseEnter={() => setIsHovered(true)}
      onMouseLeave={() => setIsHovered(false)}
      style={{
        position: "absolute",
        top: top,
        left: left,
        right: right, 
        zIndex: 50,
        width: "300px", 
        height: "105px",
        backgroundColor: "white",
        borderRadius: "16px",
        padding: "16px 22px",
        display: "flex",
        flexDirection: "column",
        justifyContent: "center",
        boxSizing: "border-box",
        border: "1px solid rgba(0,0,0,0.05)",
        cursor: "pointer",
        transition: "all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1)",
        transform: isHovered ? "translateY(-12px) scale(1.02)" : "translateY(0) scale(1)",
        boxShadow: isHovered 
          ? "0 20px 40px rgba(0,0,0,0.12)" 
          : "0 8px 16px rgba(0,0,0,0.05)",
        fontFamily: "'Montserrat', sans-serif",
      }}
    >
      <div style={{ fontWeight: 600, fontSize: "16px", color: "#111", marginBottom: "4px" }}>
        {title}
      </div>
      <div style={{ 
        fontWeight: 500, 
        fontSize: "13px", 
        color: "#AEAEAE", 
        lineHeight: "20px",
        letterSpacing: "0",
        wordBreak: "keep-all", 
        overflow: "hidden"
      }}>
        {description}
      </div>
    </div>
  );
};

export const FeatureSection: React.FC = () => {
  return (
    <div className="w-full flex justify-center mb-20 overflow-hidden px-4 md:px-0">
      <div 
        className="flex justify-center items-center w-full max-w-[1660px] relative rounded-[25px]"
        style={{ 
          minHeight: "600px",
          // Nilai diubah dari -20px ke -40px untuk menaikkan seluruh section
          marginTop: "-60px", 
          background: "linear-gradient(185deg, rgba(255,255,255,0.6) 10%, rgba(233,234,224,0.95) 100%)", 
          padding: "100px 20px",
          overflow: "visible"
        }}
      >
        {/* Kontainer Wrapper dengan Skala Responsif */}
        <div className="relative w-full max-w-[900px] origin-center scale-[0.45] sm:scale-[0.6] md:scale-[0.8] lg:scale-100 transition-transform duration-500">
          
          <img 
            src="/assets/images/preview.svg" 
            alt="Stacka App Preview" 
            style={{ 
              width: "100%", 
              height: "auto", 
              display: "block",
              borderRadius: "12px" 
            }} 
          />

          {/* SISI KIRI */}
          <AnnotationCard 
            title="Explore Categories" 
            description="Choose a category to discover relevant notes and study materials."
            top="146px"   
            left="-100px" 
          />

          <AnnotationCard 
            title="Recommended Notes" 
            description="Explore recommended notes shared by students to help you study better."
            top="637px" 
            left="-100px" 
          />

          {/* SISI KANAN */}
          <AnnotationCard 
            title="Find Notes Fast" 
            description="Easily find and explore study notes shared by other students."
            top="272px"   
            right="-100px" 
          />

          <AnnotationCard 
            title="Share Your Notes" 
            description="Share your notes on Stacka and help other students study better."
            top="525px"
            right="-100px" 
          />

        </div>
      </div>
    </div>
  );
};