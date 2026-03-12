import Image from "next/image";

export default function About() {
  return (
    <div
      id="about"
      className="w-[1440px] h-[980px] mx-auto bg-white flex flex-col items-center"
    >
      {/* LOGO */}
      <div className="mt-[60px]">
        <Image
          src="/assets/images/Logo 2.svg"
          alt="Stacka Logo"
          width={60}
          height={60}
        />
      </div>

      {/* TITLE */}
      <div className="mt-[30px] w-[592px] text-center">
        <h1
          className="text-[40px] font-semibold text-black leading-snug"
          style={{ fontFamily: "Montserrat, sans-serif" }}
        >
          Why Study Notes Are Still Hard to Find
        </h1>
        <p
          className="text-gray-500 text-[14px] mt-[12px]"
          style={{ fontFamily: "Montserrat", color: "#9D9D9D" }}
        >
          Students struggle to find reliable notes in one place.
        </p>
      </div>

      {/* CARD SECTION */}
      <div className="mt-[50px] w-[1205px] h-[247px] flex justify-between">
        <div
          className="w-[370px] h-[220px] bg-white rounded-[30px] p-[28px]"
          style={{ boxShadow: "0px 0px 33px rgba(0,0,0,0.08)" }}
        >
          <h3
            className="text-[20px] font-semibold text-black"
            style={{ fontFamily: "Montserrat" }}
          >
            Hard to Understand <br /> Materials
          </h3>

          <p
            className="text-[14px] mt-[12px]"
            style={{ fontFamily: "Montserrat", color: "#9D9D9D" }}
          >
            Lecture materials are often difficult to understand without clear
            explanations or structured notes.
          </p>
        </div>

        <div
          className="w-[370px] h-[220px] bg-white rounded-[30px] p-[28px]"
          style={{ boxShadow: "0px 0px 33px rgba(0,0,0,0.08)" }}
        >
          <h3
            className="text-[20px] font-semibold text-black"
            style={{ fontFamily: "Montserrat" }}
          >
            Limited Study <br /> Resources
          </h3>

          <p
            className="text-[14px] mt-[12px]"
            style={{ fontFamily: "Montserrat", color: "#9D9D9D" }}
          >
            Valuable study materials and notes are often hard to access or
            shared only within small groups.
          </p>
        </div>

        <div
          className="w-[370px] h-[220px] bg-white rounded-[30px] p-[28px]"
          style={{ boxShadow: "0px 0px 33px rgba(0,0,0,0.08)" }}
        >
          <h3
            className="text-[20px] font-semibold text-black"
            style={{ fontFamily: "Montserrat" }}
          >
            Scattered and <br /> Disorganized Notes
          </h3>

          <p
            className="text-[14px] mt-[12px]"
            style={{ fontFamily: "Montserrat", color: "#9D9D9D" }}
          >
            Study notes are spread across different platforms, making them
            difficult to organize and review.
          </p>
        </div>
      </div>

      {/* MEET STACKA */}
      <div className="mt-[70px] w-full max-w-[1201px] flex flex-col md:flex-row gap-8 px-4">
        {/* LEFT */}
        <div className="w-full md:w-[421px]">
          <h2
            className="text-[40px] font-semibold flex items-center gap-2 text-black"
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
                className="absolute left-[-10px] bottom-[-10px] scale-[1.95] translate-x-3"
              />
            </span>
          </h2>
        </div>

        {/* RIGHT TEXT */}
        <div
            className="w-[747px] text-[16px] leading-relaxed space-y-[18px] text-justify"
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
