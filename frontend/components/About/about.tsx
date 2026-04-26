import Image from "next/image";

export default function About() {
  return (
    <div
      id="about"
      className="w-full xl:w-[1440px] h-auto lg:h-[980px] mx-auto px-4 md:px-6 lg:px-0 bg-white flex flex-col items-center py-6 lg:py-0"
    >
      {/* LOGO */}
      <div className="mt-0 md:mt-10 lg:mt-[60px]">
        <Image
          src="/assets/images/Logo 2.svg"
          alt="Stacka Logo"
          width={40}
          height={40}
          className="w-10 h-10 lg:w-[60px] lg:h-[60px]"
        />
      </div>

      {/* TITLE SECTION */}
      <div className="mt-[30px] w-full md:w-[90%] lg:w-[650px] text-center px-2">
        <h1
          className="text-xl md:text-2xl lg:text-[40px] font-semibold text-black leading-snug"
          style={{ 
            fontFamily: "Montserrat, sans-serif",
            letterSpacing: "0.02em" 
          }}
        >
          Why Study Notes Are Still <br className="lg:hidden" /> Hard to Find
        </h1>
        
        <p
          className="text-xs md:text-[13px] lg:text-[14px] mt-[21px]"
          style={{ fontFamily: "Montserrat", color: "#9D9D9D" }}
        >
          Students struggle to find reliable notes in one place.
        </p>
      </div>

      {/* CARD SECTION */}
      <div className="mt-5 md:mt-[55px] w-full lg:w-[1205px] flex flex-col md:flex-row md:flex-nowrap justify-between gap-6 md:gap-[20px] lg:gap-[31px]">
        
        {/* Card 1 */}
        <div
          className="w-full md:flex-1 lg:w-[381px] h-auto lg:h-[247px] bg-white rounded-2xl lg:rounded-[30px] flex flex-col cursor-pointer transition-all duration-300 ease-in-out hover:scale-[1.03] hover:shadow-2xl"
          style={{ 
            boxShadow: "0px 0px 33px rgba(0,0,0,0.08)",
            paddingTop: "51px",
            paddingBottom: "50px",
            paddingLeft: "38px",
            paddingRight: "38px"
          }}
        >
          <h3
            className="text-lg md:text-[16px] lg:text-[20px] font-semibold text-black leading-tight"
            style={{ fontFamily: "Montserrat" }}
          >
            Hard to Understand <br className="hidden lg:block" /> Materials
          </h3>
          <p
            className="text-xs md:text-[12px] lg:text-[14px] mt-2 lg:mt-[12px] leading-relaxed"
            style={{ fontFamily: "Montserrat", color: "#9D9D9D" }}
          >
            Lecture materials are often difficult to understand without clear
            explanations or structured notes.
          </p>
        </div>

        {/* Card 2 */}
        <div
          className="w-full md:flex-1 lg:w-[381px] h-auto lg:h-[247px] bg-white rounded-2xl lg:rounded-[30px] flex flex-col cursor-pointer transition-all duration-300 ease-in-out hover:scale-[1.03] hover:shadow-2xl"
          style={{ 
            boxShadow: "0px 0px 33px rgba(0,0,0,0.08)",
            paddingTop: "51px",
            paddingBottom: "50px",
            paddingLeft: "38px",
            paddingRight: "38px"
          }}
        >
          <h3
            className="text-lg md:text-[16px] lg:text-[20px] font-semibold text-black leading-tight"
            style={{ fontFamily: "Montserrat" }}
          >
            Limited Study <br className="hidden lg:block" /> Resources
          </h3>
          <p
            className="text-xs md:text-[12px] lg:text-[14px] mt-2 lg:mt-[12px] leading-relaxed"
            style={{ fontFamily: "Montserrat", color: "#9D9D9D" }}
          >
            Valuable study materials and notes are often hard to access or
            shared only within small groups.
          </p>
        </div>

        {/* Card 3 */}
        <div
          className="w-full md:flex-1 lg:w-[381px] h-auto lg:h-[247px] bg-white rounded-2xl lg:rounded-[30px] flex flex-col cursor-pointer transition-all duration-300 ease-in-out hover:scale-[1.03] hover:shadow-2xl"
          style={{ 
            boxShadow: "0px 0px 33px rgba(0,0,0,0.08)",
            paddingTop: "51px",
            paddingBottom: "50px",
            paddingLeft: "38px",
            paddingRight: "38px"
          }}
        >
          <h3
            className="text-lg md:text-[16px] lg:text-[20px] font-semibold text-black leading-tight"
            style={{ fontFamily: "Montserrat" }}
          >
            Scattered and <br className="hidden lg:block" /> Disorganized Notes
          </h3>
          <p
            className="text-xs md:text-[12px] lg:text-[14px] mt-2 lg:mt-[12px] leading-relaxed"
            style={{ fontFamily: "Montserrat", color: "#9D9D9D" }}
          >
            Study notes are spread across different platforms, making them
            difficult to organize and review.
          </p>
        </div>
      </div>

      {/* MEET STACKA SECTION */}
      <div className="mt-12 lg:mt-[140px] w-full max-w-[1201px] flex flex-col lg:flex-row gap-8 lg:gap-8 px-4 lg:px-0">
        <div className="w-full lg:w-[421px] flex-shrink-0">
          <h2
            className="text-3xl lg:text-[40px] font-semibold flex items-center gap-1 lg:gap-2 text-black"
            style={{ fontFamily: "Montserrat, sans-serif" }}
          >
            Meet
            <span className="relative inline-block text-black ml-1">
              Stacka
              <Image
                src="/assets/images/Coret.svg"
                alt="coret"
                fill
                className="absolute left-[-10px] bottom-[-10px] scale-[2.6] md:scale-[2.6] lg:scale-[2.47] translate-x-3"
              />
            </span>
          </h2>
        </div>

        <div
            className="w-full lg:w-[747px] text-sm md:text-base lg:text-[16px] leading-relaxed space-y-4 lg:space-y-[18px] text-justify"
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
            By bringing study materials together into a single, organized space,
            Stacka makes it easier for students to explore useful notes, stay
            organized, and focus on what truly matters — learning and preparing
            for exams more effectively.
          </p>
        </div>
      </div>
    </div>
  );
}