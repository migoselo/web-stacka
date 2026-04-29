'use client';

import React, { useRef, useState } from "react";

// Komponen reusable buat tiap card gambar yang cuma maju ke depan (Z-axis)
const PressableImage = ({
  src,
  alt,
  className = "",
  onClick,
}: {
  src: string;
  alt: string;
  className?: string;
  onClick?: () => void;
}) => {
  const [isHovered, setIsHovered] = useState(false);

  return (
    <div
      onMouseEnter={() => setIsHovered(true)}
      onMouseLeave={() => setIsHovered(false)}
      onClick={onClick}
      className={`cursor-pointer ${className}`}
      style={{
        perspective: "1000px",
      }}
    >
      <img
        src={src}
        alt={alt}
        draggable={false}
        style={{
          width: "100%",
          height: "auto",
          display: "block",
          transformStyle: "preserve-3d",
          // Hanya maju lurus (translateZ) dan sedikit membesar (scale)
          transform: isHovered 
            ? "translateZ(50px) scale(1.05)" 
            : "translateZ(0px) scale(1)",
          // Durasi transisi standar yang smooth
          transition: "transform 0.4s cubic-bezier(0.25, 1, 0.5, 1)",
          filter: isHovered
            ? "drop-shadow(0 25px 40px rgba(0,0,0,0.2))"
            : "drop-shadow(0 15px 25px rgba(0,0,0,0.1))",
          userSelect: "none",
        }}
      />
    </div>
  );
};

// Section utama
export const FeatureSection: React.FC = () => {
  return (
    <section className="w-full flex justify-center mb-20 px-4 md:px-6">
      <div
        className="w-full max-w-[1660px] rounded-[25px] py-16 md:py-24 px-4"
        style={{
          background:
            "linear-gradient(185deg, rgba(255,255,255,0.6) 10%, rgba(233,234,224,0.95) 100%)",
        }}
      >
        {/* DESKTOP: layout absolute mengelilingi HP menggunakan hp.svg */}
        <div className="hidden lg:block relative mx-auto w-full max-w-[900px] min-h-[800px]">
          
          {/* HP tengah khusus Desktop */}
          <img
            src="/assets/images/hp.svg"
            alt="Stacka App Desktop"
            className="w-full h-auto mx-auto"
          />

          {/* 4 Card sebagai gambar interaktif */}
          <PressableImage
            src="/assets/images/explore.svg"
            alt="Explore Categories"
            className="absolute top-[146px] -left-[100px] w-[300px]"
          />
          <PressableImage
            src="/assets/images/findnotes.svg"
            alt="Find Notes Fast"
            className="absolute top-[272px] -right-[100px] w-[300px]"
          />
          <PressableImage
            src="/assets/images/share.svg"
            alt="Share Your Notes"
            className="absolute top-[525px] -right-[100px] w-[300px]"
          />
          <PressableImage
            src="/assets/images/allnotes.svg"
            alt="Recommended Notes"
            className="absolute top-[637px] -left-[100px] w-[300px]"
          />

        </div>

        {/* MOBILE / TABLET: stack vertikal menggunakan s 1.svg */}
        <div className="lg:hidden flex flex-col items-center gap-6 max-w-md mx-auto">
          {/* HP tengah khusus Mobile */}
          <img
            src="/assets/images/s 1.svg"
            alt="Stacka App Mobile"
            className="w-full h-auto mx-auto max-w-[260px] sm:max-w-[320px]"
          />
          
          <PressableImage
            src="/assets/images/explore.svg"
            alt="Explore Categories"
            className="w-full max-w-[320px]"
          />
          <PressableImage
            src="/assets/images/findnotes.svg"
            alt="Find Notes Fast"
            className="w-full max-w-[320px]"
          />
          <PressableImage
            src="/assets/images/share.svg"
            alt="Share Your Notes"
            className="w-full max-w-[320px]"
          />
          <PressableImage
            src="/assets/images/allnotes.svg"
            alt="Recommended Notes"
            className="w-full max-w-[320px]"
          />
        </div>

      </div>
    </section>
  );
};