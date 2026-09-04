// 현대이지웹 서버 업로드용 빌드.
// GitHub Pages 빌드(vite.pages.config.ts)와 별개로 두어 양쪽을 함께 유지합니다.
// base 는 업로드 위치에 맞춥니다: 웹루트면 '/', 검증용 서브폴더면 '/new/' 등.
import react from '@vitejs/plugin-react';
import { defineConfig } from 'vite';

export default defineConfig({
  base: process.env.VUSA_BASE || '/',
  plugins: [react()],
  build: { outDir: 'dist-deploy', emptyOutDir: true },
});
