'use client';

import React, { useState, useEffect } from "react";
import Image from "next/image";
import Link from "next/link";

const Navbar: React.FC = () => {
  const [isVisible, setIsVisible] = useState(true);
  const [lastScrollY, setLastScrollY] = useState(0);
  const [isScrolled, setIsScrolled] = useState(false);
  const [isOpen, setIsOpen] = useState(false);

  const scrollToTop = (e: React.MouseEvent) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: "smooth" });
    setIsOpen(false);
  };

  useEffect(() => {
    const handleScroll = () => {
      const currentScrollY = window.scrollY;
      setIsScrolled(currentScrollY > 20);

      if (currentScrollY < lastScrollY || currentScrollY < 50) {
        setIsVisible(true);
      } else if (currentScrollY > lastScrollY && currentScrollY > 100) {
        setIsVisible(false);
        setIsOpen(false);
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
        className={`flex justify-center transition-all duration-300 px-4 md:px-0 ${
          isScrolled ? "mt-2 md:mt-4" : "mt-5 md:mt-10"
        }`}
      >
        <div 
          className="relative flex items-center justify-between w-full max-w-[360px] md:max-w-[665px] lg:max-w-[792px] h-[55px] md:h-[70px] px-4 md:px-8 bg-white rounded-[15px] md:rounded-[23px] shadow-[0px_0px_33px_0px_rgba(0,0,0,0.12)]"
        >

          {/* Logo - Desktop tetap 31x34 */}
          <div className="flex items-center gap-2 md:gap-3 cursor-pointer z-10" onClick={scrollToTop}>
            <Image
              src="/assets/images/Logo.svg"
              alt="Stacka Logo"
              width={22}
              height={26}
              className="w-[22px] h-[26px] md:w-[31px] md:h-[34px]"
              unoptimized
            />
            <span
              className="text-lg md:text-2xl font-semibold text-black"
              style={{ fontFamily: "Raleway", fontWeight: 600 }}
            >
              Stacka
            </span>
          </div>

          {/* Menu Horizontal - Muncul di Tablet (md) & Desktop (lg) */}
          <div
            className="hidden md:flex gap-6 lg:gap-10 text-[13px] lg:text-[16px] whitespace-nowrap"
            style={{ fontFamily: "Montserrat", fontWeight: 500 }}
          >
            <a href="#home" onClick={scrollToTop} className="text-black hover:text-gray-600 transition-colors">Home</a>
            <a href="#about" className="text-black hover:text-gray-600 transition-colors">About</a>
            <a href="#how-it-works" className="text-black hover:text-gray-600 transition-colors">How It Works</a>
          </div>

          {/* Hamburger Menu - HANYA Mobile (di bawah md) */}
          <div className="flex md:hidden items-center gap-3">
            <Link href="/sticky-board">
              <button
                className="text-white w-[85px] h-[32px] rounded-[10px] text-[9px] font-semibold"
                style={{ background: "linear-gradient(180deg, #3F3F3F, #1F1F1F)", fontFamily: "Montserrat" }}
              >
                Sticky Board
              </button>
            </Link>
            <button onClick={() => setIsOpen(!isOpen)} className="flex flex-col gap-1.5 z-10">
              <span className={`h-0.5 w-5 bg-black transition-all ${isOpen ? "rotate-45 translate-y-2" : ""}`}></span>
              <span className={`h-0.5 w-5 bg-black transition-all ${isOpen ? "opacity-0" : ""}`}></span>
              <span className={`h-0.5 w-5 bg-black transition-all ${isOpen ? "-rotate-45 -translate-y-2" : ""}`}></span>
            </button>
          </div>

          {/* Dropdown Mobile */}
          <div 
            className={`absolute top-[65px] left-0 w-full bg-white rounded-[15px] shadow-lg py-4 px-6 flex flex-col gap-4 md:hidden transition-all duration-300 origin-top ${
              isOpen ? "scale-y-100 opacity-100" : "scale-y-0 opacity-0 pointer-events-none"
            }`}
            style={{ fontFamily: "Montserrat", fontWeight: 500 }}
          >
            <a href="#home" onClick={scrollToTop} className="text-black py-2 border-b border-gray-100">Home</a>
            <a href="#about" onClick={() => setIsOpen(false)} className="text-black py-2 border-b border-gray-100">About</a>
            <a href="#how-it-works" onClick={() => setIsOpen(false)} className="text-black py-2">How It Works</a>
          </div>

          {/* Button Desktop & Tablet - Desktop tetap 155x50 */}
          <div className="hidden md:block">
            <Link href="/sticky-board">
              <button
                className="text-white w-[120px] lg:w-[155px] h-[42px] lg:h-[50px] rounded-[12px] lg:rounded-[15px] hover:opacity-90 flex items-center justify-center transition-opacity"
                style={{
                  background: "linear-gradient(180deg,  #3F3F3F, #1F1F1F)",
                  fontFamily: "Montserrat",
                  fontWeight: 600,
                }}
              >
                <span className="text-[13px] lg:text-[16px]">Sticky Board</span>
              </button>
            </Link>
          </div>

        </div>
      </div>
    </nav>
  );
};

export default Navbar;