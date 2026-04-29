import React from 'react';

const Footer: React.FC = () => {
  return (
    <>
      {/* CSS untuk menangani responsivitas font dan padding */}
      <style>{`
        .footer-text {
          font-size: 22px; /* Ukuran default (Desktop) */
        }

        @media (max-width: 768px) {
          .footer-text {
            font-size: 18px; /* Tablet */
          }
        }

        @media (max-width: 480px) {
          .footer-text {
            font-size: 16px; /* Mobile */
          }
        }
      `}</style>

      <footer
        style={{
          width: '100%',
          backgroundColor: '#EDD6D3',
          minHeight: '80px',
          display: 'flex',
          alignItems: 'center',
          justifyContent: 'center',
          padding: '0 20px',
          boxSizing: 'border-box',
        }}
      >
        <div
          style={{
            maxWidth: '1440px',
            width: '100%',
            textAlign: 'center',
            fontFamily: "'Montserrat'",
            fontWeight: 500,
            letterSpacing: '0.02em', // Letter spacing 2%
            color: '#000000',
          }}
          className="footer-text"
        >
          © 2026 Stacka. All rights reserved.
        </div>
      </footer>
    </>
  );
};

export default Footer;