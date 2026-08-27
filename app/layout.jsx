import '../src/style.css';

export const metadata = {
  title: 'Visit USA Korea',
  description: '미국 관광 홍보와 한미 여행 산업의 성장을 연결하는 미국방문위원회 한국 지부',
};

export default function RootLayout({ children }) {
  return (
    <html lang="ko">
      <body>{children}</body>
    </html>
  );
}
