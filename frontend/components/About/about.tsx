import Image from "next/image";

export default function About() {
  return (
    <div
      id="about"
      className="w-full md:w-[1440px] h-auto md:h-[980px] mx-auto px-4 md:px-0 bg-white flex flex-col items-center py-12 md:py-0"
    >
      {/* LOGO */}
      <div className="mt-6 md:mt-[60px]">
        <Image
          src="/assets/images/Logo 2.svg"
          alt="Stacka Logo"
          width={40}
          height={40}
          className="w-10 h-10 md:w-[60px] md:h-[60px]"
        />
      </div>

      {/* TITLE */}
      <div className="mt-6 md:mt-[30px] w-full md:w-[592px] text-center px-2">
        <h1
          className="text-lg md:text-[40px] font-semibold text-black leading-snug"
          style={{ fontFamily: "Montserrat, sans-serif" }}
        >
          Why Study Notes Are Still Hard to Find
        </h1>
        <p
          className="text-xs md:text-[14px] mt-2 md:mt-[12px]"
          style={{ fontFamily: "Montserrat", color: "#9D9D9D" }}
        >
          Students struggle to find reliable notes in one place.
        </p>
      </div>

      {/* CARD SECTION */}
      <div className="mt-8 md:mt-[50px] w-full md:w-[1205px] md:h-[247px] flex flex-col md:flex-row justify-between gap-4 md:gap-0">
        <div
          className="w-full md:w-[370px] h-auto md:h-[220px] bg-white rounded-2xl md:rounded-[30px] p-6 md:p-[28px]"
          style={{ boxShadow: "0px 0px 33px rgba(0,0,0,0.08)" }}
        >
          <h3
            className="text-lg md:text-[20px] font-semibold text-black"
            style={{ fontFamily: "Montserrat" }}
          >
            Hard to Understand <br /> Materials
          </h3>

          <p
            className="text-xs md:text-[14px] mt-2 md:mt-[12px]"
            style={{ fontFamily: "Montserrat", color: "#9D9D9D" }}
          >
            Lecture materials are often difficult to understand without clear
            explanations or structured notes.
          </p>
        </div>

        <div
          className="w-full md:w-[370px] h-auto md:h-[220px] bg-white rounded-2xl md:rounded-[30px] p-6 md:p-[28px]"
          style={{ boxShadow: "0px 0px 33px rgba(0,0,0,0.08)" }}
        >
          <h3
            className="text-lg md:text-[20px] font-semibold text-black"
            style={{ fontFamily: "Montserrat" }}
          >
            Limited Study <br /> Resources
          </h3>

          <p
            className="text-xs md:text-[14px] mt-2 md:mt-[12px]"
            style={{ fontFamily: "Montserrat", color: "#9D9D9D" }}
          >
            Valuable study materials and notes are often hard to access or
            shared only within small groups.
          </p>
        </div>

        <div
          className="w-full md:w-[370px] h-auto md:h-[220px] bg-white rounded-2xl md:rounded-[30px] p-6 md:p-[28px]"
          style={{ boxShadow: "0px 0px 33px rgba(0,0,0,0.08)" }}
        >
          <h3
            className="text-lg md:text-[20px] font-semibold text-black"
            style={{ fontFamily: "Montserrat" }}
          >
            Scattered and <br /> Disorganized Notes
          </h3>

          <p
            className="text-xs md:text-[14px] mt-2 md:mt-[12px]"
            style={{ fontFamily: "Montserrat", color: "#9D9D9D" }}
          >
            Study notes are spread across different platforms, making them
            difficult to organize and review.
          </p>
        </div>
      </div>

      {/* MEET STACKA */}
      <div className="mt-8 md:mt-[70px] w-full max-w-[1201px] flex flex-col md:flex-row gap-8 md:gap-8 px-4 md:px-0">
        {/* LEFT */}
        <div className="w-full md:w-[421px] flex-shrink-0">
          <h2
            className="text-2xl md:text-[40px] font-semibold flex items-center gap-1 md:gap-2 text-black"
            style={{ fontFamily: "Montserrat, sans-serif" }}
          >
            Meet
            {/* STACKA WITH SVG */}
            <span className="relative inline-block text-black">
              Stacka
              <Image
                src="/assets/images/Coret.svg"
                alt="coret"
                fill
                className="absolute left-[-10px] bottom-[-10px] scale-[2.37] md:scale-[2.17] translate-x-3"
              />
            </span>
          </h2>
        </div>

        {/* RIGHT TEXT */}
        <div
            className="w-full md:w-[747px] text-sm md:text-[16px] leading-relaxed space-y-3 md:space-y-[18px] text-justify"
            style={{ fontFamily: "Montserrat", color: "#9D9D9D" }}
        >
          <p>
            Stacka is a platform designed to help students access shared study
            notes, organize their learning materials, and discover valuable
            academic resources from peers and seniors in one place. Instead of searching through scattered files, group chats, or
            multiple platforms, students can easily find structured notes that
            support their learning.
          </p>

          <p>
            By bringing study materials together into a single organized space,
            Stacka makes it easier for students to explore useful notes, stay
            organized, and focus on what truly matters — learning and preparing
            for exams more effectively.
          </p>
        </div>
      </div>
    </div>
  );
}
