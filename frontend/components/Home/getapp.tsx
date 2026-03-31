import React from "react";

const HeroSection: React.FC = () => {
  return (
    <section
      style={{
        display: "flex",
        justifyContent: "center",
        alignItems: "center",
        textAlign: "center",
        paddingTop: "115px",
        paddingBottom: "80px",
        flexDirection: "column",
      }}
    >
      <h1
        style={{
          fontFamily: "Montserrat, sans-serif",
          fontWeight: 600,
          fontSize: "55px",
          lineHeight: "100%",
          letterSpacing: "2%",
          width: "704px",
          height: "134px",
          textAlign: "center",
          color: "#000000",
        }}
      >
        All Your Study{" "}
        <span
          style={{
            display: "inline-block",
            width: "182px",
            height: "61px",
            borderRadius: "15px",
            background:
              "linear-gradient(to right, #E9EAE0, #EDD6D3)",
            lineHeight: "61px",
          }}
        >
          Notes
        </span>
        {" "}in
        <br />
        <span style={{ display: "block", marginTop: "15px" }}>
          One Place
        </span>
      </h1>

      <p
        style={{
          marginTop: "24px",
          fontFamily: "Montserrat, sans-serif",
          fontWeight: 500,
          fontSize: "16px",
          width: "796px",
          height: "20px",
          textAlign: "center",
          color: "#000000",
        }}
      >
        A structured space to discover high-quality study notes.
      </p>

        {/* Button */}
        <button
          className="text-white w-[150px] h-[50px] rounded-[15px]"
          style={{
            background: "linear-gradient(180deg,  #3F3F3F, #1F1F1F)",
            fontFamily: "Montserrat",
            fontWeight: 600,
            fontSize: "16px",
            fontStyle: "semibold",
            marginTop: "40px"
          }}
        >
          Get the App
        </button>

    </section>
  );
};

const FeatureSection: React.FC = () => {
  return (
    <div
      style={{
        width: "1500px",
        height: "700px",
        margin: "-40px auto 0",
        display: "flex",
        justifyContent: "center",
        alignItems: "center",
        borderRadius: "20px",
        background:
          "linear-gradient(185deg, rgba(255,255,255,0.59) 10%, rgba(233,234,224,0.95) 100%)",
      }}
    >
      <img
        src="/assets/images/home.svg"
        alt="product"
        style={{
          maxWidth: "900px",
          width: "100%",
          objectFit: "contain",
        }}
      />
    </div>
  );
};

export { HeroSection, FeatureSection };
