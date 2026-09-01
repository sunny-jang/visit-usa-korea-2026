import React from 'react';
import { createRoot } from 'react-dom/client';
import App from './main.jsx';
import './style.css';
import './hero-adjustments.css';

createRoot(document.getElementById('root')).render(<App />);
