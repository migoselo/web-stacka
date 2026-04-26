'use client';

import React, { useState, useRef, useEffect } from 'react';

// --- Types ---
interface NoteData {
  id: number;
  color: string;
  mode: 'type' | 'draw';
  text: string;
}

interface NoteProps extends NoteData {
  onTextChange: (id: number, newText: string) => void;
  onRemove: (id: number) => void;
}

// --- Component: StickyNote ---
const StickyNote = ({ id, color, mode, text, onTextChange, onRemove }: NoteProps) => {
  const canvasRef = useRef<HTMLCanvasElement>(null);
  const [isDrawing, setIsDrawing] = useState(false);

  useEffect(() => {
    const canvas = canvasRef.current;
    if (canvas) {
      const ctx = canvas.getContext('2d');
      if (ctx) {
        ctx.lineCap = 'round';
        ctx.lineJoin = 'round';
        ctx.strokeStyle = 'black';
        ctx.lineWidth = 3;
      }
    }
  }, []);

  const getCoordinates = (e: React.MouseEvent | React.TouchEvent) => {
    const canvas = canvasRef.current;
    if (!canvas) return { x: 0, y: 0 };
    const rect = canvas.getBoundingClientRect();
    
    const clientX = 'touches' in e ? e.touches[0].clientX : e.clientX;
    const clientY = 'touches' in e ? e.touches[0].clientY : e.clientY;

    return {
      x: clientX - rect.left,
      y: clientY - rect.top
    };
  };

  const startDrawing = (e: React.MouseEvent | React.TouchEvent) => {
    if (mode !== 'draw') return;
    setIsDrawing(true);
    const { x, y } = getCoordinates(e);
    const ctx = canvasRef.current?.getContext('2d');
    if (ctx) {
      ctx.beginPath();
      ctx.moveTo(x, y);
    }
  };

  const draw = (e: React.MouseEvent | React.TouchEvent) => {
    if (!isDrawing || mode !== 'draw') return;
    const { x, y } = getCoordinates(e);
    const ctx = canvasRef.current?.getContext('2d');
    if (ctx) {
      ctx.lineTo(x, y);
      ctx.stroke();
    }
  };

  const stopDrawing = () => setIsDrawing(false);

  return (
    <div 
      className="relative shadow-lg flex items-center justify-center overflow-hidden transition-all duration-300 animate-in fade-in zoom-in shrink-0"
      style={{ 
        width: '300px', 
        height: '300px', 
        backgroundColor: color,
        borderRadius: '20px', 
        fontFamily: "'Patrick Hand', cursive" 
      }}
    >
      <button 
        onClick={() => onRemove(id)}
        className="absolute top-5 right-5 z-30"
      >
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M18 6L6 18M6 6L18 18" stroke="black" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
        </svg>
      </button>

      <textarea
        value={text}
        onChange={(e) => onTextChange(id, e.target.value)}
        className={`w-full h-full bg-transparent p-12 outline-none resize-none text-center flex items-center justify-center leading-tight 
                    ${mode === 'type' ? 'z-20 opacity-100' : 'z-0 opacity-0 pointer-events-none'}`}
        style={{ fontSize: '30px', border: 'none' }}
      />

      <canvas
        ref={canvasRef}
        width={300}
        height={300}
        onMouseDown={startDrawing}
        onMouseMove={draw}
        onMouseUp={stopDrawing}
        onMouseLeave={stopDrawing}
        onTouchStart={startDrawing}
        onTouchMove={draw}
        onTouchEnd={stopDrawing}
        className={`absolute inset-0 ${mode === 'draw' ? 'z-10 cursor-crosshair' : 'z-0'}`}
      />
    </div>
  );
};

// --- Main Board Component ---
export default function StackaBoard() {
  const [notes, setNotes] = useState<NoteData[]>([]);
  const [activeTab, setActiveTab] = useState<'type' | 'draw'>('type');

  const noteColors = ['#EDD6D3', '#E9EAE1'];

  const handleAddNote = (selectedMode: 'type' | 'draw') => {
    setActiveTab(selectedMode);
    const newNote: NoteData = {
      id: Date.now(),
      text: '',
      color: noteColors[notes.length % 2],
      mode: selectedMode
    };
    setNotes([...notes, newNote]);
  };

  const handleTextChange = (id: number, newText: string) => {
    setNotes(prev => prev.map(n => n.id === id ? { ...n, text: newText } : n));
  };

  const handleRemoveNote = (id: number) => {
    setNotes(prev => prev.filter(n => n.id !== id));
  };

  return (
    <div className="flex bg-white min-h-screen w-full overflow-x-hidden">
      {/* SIDEBAR */}
      <aside className="fixed bottom-8 left-1/2 -translate-x-1/2 lg:bottom-auto lg:left-15 lg:top-1/2 lg:-translate-y-1/2 flex flex-row lg:flex-col gap-[20px] z-50 bg-white/80 lg:bg-transparent p-4 lg:p-0 rounded-full shadow-lg lg:shadow-none backdrop-blur-md lg:backdrop-blur-none">
        
        <button onClick={() => handleAddNote('draw')}>
          <img 
            src="/assets/images/pensil.svg" 
            alt="Draw Mode"
            className="w-12 h-12 lg:w-14 lg:h-14 object-contain"
          />
        </button>

        <button onClick={() => handleAddNote('type')}>
          <img 
            src="/assets/images/notes.svg" 
            alt="Type Mode"
            className="w-12 h-12 lg:w-14 lg:h-14 object-contain"
          />
        </button>

      </aside>

      {/* CANVAS AREA */}
      <main className="flex-1 p-6 sm:p-10 lg:p-16 mb-24 lg:mb-0">
        <div className="max-w-[1050px] mx-auto lg:ml-[200px]">

          <div className="flex flex-wrap gap-[24px] lg:gap-[38px] justify-center lg:justify-start items-start">
            {notes.map((note) => (
              <StickyNote 
                key={note.id}
                {...note}
                onTextChange={handleTextChange}
                onRemove={handleRemoveNote}
              />
            ))}
            {notes.length === 0 && (
              <div className="w-full text-center mt-20 text-gray-400 font-medium">
                Pilih mode di samping untuk membuat catatan baru.
              </div>
            )}
          </div>
        </div>
      </main>
    </div>
  );
}