import react from '@vitejs/plugin-react';
import { defineConfig } from 'vite';

export default defineConfig({
  base: '/visit-usa-korea-2026/',
  plugins: [react()],
  build: { outDir: 'dist', emptyOutDir: true },
});
