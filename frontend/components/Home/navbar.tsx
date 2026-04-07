'use client';

import React, { useState, useEffect } from "react";
import Image from "next/image";

const Navbar: React.FC = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [isVisible, setIsVisible] = useState(true);
  const [lastScrollY, setLastScrollY] = useState(0);

  useEffect(() => {
    const handleScroll = () => {
      const currentScrollY = window.scrollY;

      // Show navbar when scrolling up or at top
      // Hide navbar when scrolling down
      if (currentScrollY < lastScrollY || currentScrollY < 50) {
        setIsVisible(true);
      } else if (currentScrollY > lastScrollY && currentScrollY > 100) {
        setIsVisible(false);
      }

      setLastScrollY(currentScrollY);
    };

    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, [lastScrollY]);

  return (
    <div className="flex justify-center mt-5 md:mt-10 px-4 md:px-0">
      <div className="flex items-center justify-between w-full md:w-[792px] h-auto md:h-[70px] px-4 md:px-8 py-3 md:py-3 bg-white rounded-lg md:rounded-[23px] shadow-[0px_0px_33px_0px_rgba(0,0,0,0.12)]">

        {/* Logo */}
        <div className="flex items-center gap-2 md:gap-3">
          <Image
            src="/assets/images/Logo.svg"
            alt="Stacka Logo"
            width={24}
            height={28}
            className="md:w-[31px] md:h-[34px]"
            unoptimized
          />
          <span
            className="text-lg md:text-2xl font-semibold text-black"
            style={{
              fontFamily: "Raleway",
              fontWeight: 600,
            }}
          >
            Stacka
          </span>
        </div>

        {/* Hamburger Menu Mobile */}
        <button
          className="md:hidden flex flex-col gap-1"
          onClick={() => setIsOpen(!isOpen)}
        >
          <div className="w-5 h-0.5 bg-black transition-all"></div>
          <div className="w-5 h-0.5 bg-black transition-all"></div>
          <div className="w-5 h-0.5 bg-black transition-all"></div>
        </button>

        {/* Menu - Desktop */}
        <div
          className="hidden md:flex gap-10 text-[16px]"
          style={{
            fontFamily: "Montserrat",
            fontWeight: 500
          }}
        >
          <a href="#getapp" className="text-black hover:text-gray-600">Home</a>
          <a href="#about" className="text-black hover:text-gray-600">About</a>
          <a href="#how-it-works" className="text-black hover:text-gray-600">How It Works</a>
        </div>

        {/* Menu - Mobile Dropdown */}
        {isOpen && (
          <div
            className="absolute top-20 left-4 right-4 bg-white rounded-lg shadow-lg p-4 md:hidden flex flex-col gap-3 z-50"
            style={{
              fontFamily: "Montserrat",
              fontWeight: 500
            }}
          >
            <a href="/" className="text-black py-2 hover:text-gray-600">Home</a>
            <a href="#about" className="text-black py-2 hover:text-gray-600">About</a>
            <a href="#how-it-works" className="text-black py-2 hover:text-gray-600">How It Works</a>
            <button
              className="text-white w-full h-10 rounded-2xl font-semibold mt-2"
              style={{
                background: "linear-gradient(180deg, #3F3F3F, #1F1F1F)",
                fontFamily: "Montserrat",
                fontWeight: 600,
                fontSize: "14px",
              }}
            >
              Sticky Board
            </button>
          </div>
        )}

        {/* Button - Desktop */}
        <button
          className="hidden md:block text-white w-[155px] h-[50px] rounded-[15px] hover:opacity-90"
          style={{
            background: "linear-gradient(180deg,  #3F3F3F, #1F1F1F)",
            fontFamily: "Montserrat",
            fontWeight: 600,
            fontSize: "16px",
          }}
        >
          Sticky Board
        </button>

      </div>
    </div>
  );
};

export default Navbar;