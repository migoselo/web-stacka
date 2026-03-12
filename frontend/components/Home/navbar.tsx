import React from "react";
import Image from "next/image";

const Navbar: React.FC = () => {
  return (
    <div className="flex justify-center mt-10">
      <div className="flex items-center justify-between w-[792px] h-[70px] px-8 py-3 bg-white rounded-[23px] shadow-[0px_0px_33px_0px_rgba(0,0,0,0.12)]">

        {/* Logo */}
        <div className="flex items-center gap-3">
          <Image
            src="/assets/images/Logo.svg"
            alt="Stacka Logo"
            width={31}
            height={34}
            unoptimized
            style={{ marginLeft: "-10px" }}
          />
          <span
            style={{
              fontFamily: "Raleway",
              fontWeight: 600,
              fontSize: "24px",
              color: "#1F1F1F",
              marginLeft: "3px"
            }}
          >
            Stacka
          </span>
        </div>

        {/* Menu */}
        <div
          className="flex gap-10 text-[16px]"
          style={{
            fontFamily: "Montserrat",
            fontWeight: 500
          }}
        >
          <a href="/" className="text-black">Home</a>
          <a href="#about" className="text-black">About</a>
          <a href="#how-it-works" className="text-black">How It Works</a>
        </div>

        {/* Button */}
        <button
          className="text-white w-[155px] h-[50px] rounded-[15px]"
          style={{
            background: "linear-gradient(180deg,  #3F3F3F, #1F1F1F)",
            fontFamily: "Montserrat",
            fontWeight: 600,
            fontSize: "16px",
            fontStyle: "semibold",
            marginRight: "-15px"
          }}
        >
          Sticky Board
        </button>

      </div>
    </div>
  );
};

export default Navbar;