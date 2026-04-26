'use client';

import React, { useState, useEffect } from "react";
import Image from "next/image";
import Link from "next/link";

const Navbar: React.FC = () => {
  const [isVisible, setIsVisible] = useState(true);
  const [lastScrollY, setLastScrollY] = useState(0);
  const [isScrolled, setIsScrolled] = useState(false);

  // Fungsi untuk scroll ke atas tanpa loading
  const scrollToTop = (e: React.MouseEvent) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  };

  useEffect(() => {
    const handleScroll = () => {
      const currentScrollY = window.scrollY;

      if (currentScrollY > 20) {
        setIsScrolled(true);
      } else {
        setIsScrolled(false);
      }

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
    <nav 
      className={`fixed top-0 left-0 w-full z-[100] transition-all duration-300 ease-in-out ${
        isVisible ? "translate-y-0" : "-translate-y-full"
      }`}
    >
      <div 
        className={`flex justify-center transition-all duration-300 px-2 md:px-0 ${
          isScrolled ? "mt-2 md:mt-4" : "mt-5 md:mt-10"
        }`}
      >
        <div 
          className="flex items-center justify-between w-full max-w-[792px] h-[55px] md:h-[70px] px-3 md:px-8 bg-white rounded-[15px] md:rounded-[23px] shadow-[0px_0px_33px_0px_rgba(0,0,0,0.12)]"
        >

          {/* Logo */}
          <div className="flex items-center gap-1 md:gap-3 cursor-pointer" onClick={scrollToTop}>
            <Image
              src="/assets/images/Logo.svg"
              alt="Stacka Logo"
              width={18}
              height={22}
              className="md:w-[31px] md:h-[34px]"
              unoptimized
            />
            <span
              className="text-sm md:text-2xl font-semibold text-black"
              style={{
                fontFamily: "Raleway",
                fontWeight: 600,
              }}
            >
              Stacka
            </span>
          </div>

          {/* Menu */}
          <div
            className="flex gap-2.5 md:gap-10 text-[10px] md:text-[16px] whitespace-nowrap"
            style={{
              fontFamily: "Montserrat",
              fontWeight: 500
            }}
          >
            {/* Navigasi Home diperbaiki di sini */}
            <a 
              href="#home" 
              onClick={scrollToTop} 
              className="text-black hover:text-gray-600 transition-colors"
            >
              Home
            </a>
            <a href="#about" className="text-black hover:text-gray-600 transition-colors">About</a>
            <a href="#how-it-works" className="text-black hover:text-gray-600 transition-colors">How It Works</a>
          </div>

          {/* Button */}
          <Link href="/sticky-board">
            <button
              className="text-white w-[85px] md:w-[155px] h-[32px] md:h-[50px] rounded-[10px] md:rounded-[15px] hover:opacity-90 flex items-center justify-center transition-opacity"
              style={{
                background: "linear-gradient(180deg,  #3F3F3F, #1F1F1F)",
                fontFamily: "Montserrat",
                fontWeight: 600,
              }}
            >
              <span className="text-[9px] md:text-[16px]">Sticky Board</span>
            </button>
          </Link>
        </div>
      </div>
    </nav>
  );
};

export default Navbar;