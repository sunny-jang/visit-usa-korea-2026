import React, { useEffect, useMemo, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { ArrowDown, ArrowRight, CalendarDays, ChevronDown, Globe2, Menu, Newspaper, Plane, Search, Users, X } from 'lucide-react';
import './style.css';

const copy = {
  ko: {
    nav: ['위원회 소개', '회원사', '미국 여행', '뉴스룸', '문의하기'],
    heroKicker: 'THE UNITED STATES, CLOSER THAN EVER',
    heroTitle: <>미국으로 향하는<br/><em>모든 여정을 잇다.</em></>,
    heroBody: '미국방문위원회는 여행 업계와 여행자를 연결하며, 더 넓고 깊은 미국 여행의 가능성을 만듭니다.',
    explore: '미국 여행 둘러보기', about: '위원회 알아보기', scroll: 'SCROLL TO EXPLORE',
    stats: [['40+', '함께하는 회원사'], ['50', '다채로운 주'], ['1', '새로운 여행의 시작']],
    introTag: 'ABOUT VISIT USA KOREA', introTitle: <>한국과 미국을 잇는<br/>가장 든든한 여행 파트너</>,
    introBody: '항공사, 관광청, 호텔, 렌터카와 여행사가 함께 모여 미국 여행 시장의 성장을 이끌고 있습니다. 정확한 정보와 업계 네트워크, 새로운 영감이 이곳에서 만납니다.',
    learn: '위원회 소개 더보기', membersTag: 'OUR MEMBERS', membersTitle: '함께 미국을 더 가깝게', membersBody: '여행의 모든 순간을 만드는 40여 개 파트너를 만나보세요.',
    destinationTag: 'DISCOVER USA', destinationTitle: '한 번의 여행, 끝없는 미국', destinationBody: '익숙한 도시부터 아직 발견하지 못한 풍경까지. 다음 여행의 장면을 골라보세요.',
    cards: [['WEST COAST', '빛과 자유가 흐르는\n태평양의 도시들'], ['THE GREAT OUTDOORS', '대자연 속에서 만나는\n완전히 새로운 나'], ['CITY ESCAPES', '문화와 리듬이 살아있는\n아이코닉 시티']],
    newsTag: 'NEWSROOM', newsTitle: '새로운 소식과 인사이트', allNews: '뉴스룸 전체보기', read: '자세히 보기',
    news: [['2026.08.20', '공지', '2026 Visit USA Korea 회원사 네트워킹 데이 안내'], ['2026.08.12', '업계소식', '미국 여행의 새로운 흐름, 로컬 경험이 답하다'], ['2026.07.28', '보도자료', '미국방문위원회, 하반기 공동 마케팅 프로그램 공개']],
    footer: '미국 여행의 가능성을 연결합니다.', address: '서울특별시 중구 세종대로 00, 00층', admin: '뉴스룸 관리자', rights: '© 2026 Visit USA Korea. All rights reserved.',
    panelTitle: '뉴스룸 관리', panelDesc: '브라우저에 저장되는 시연용 관리자 화면입니다.', add: '새 글 등록', titlePlaceholder: '제목', save: '등록하기', cancel: '닫기', delete: '삭제'
  },
  en: {
    nav: ['About Us', 'Members', 'Discover USA', 'Newsroom', 'Contact'],
    heroKicker: 'THE UNITED STATES, CLOSER THAN EVER',
    heroTitle: <>Connecting every journey<br/><em>to the USA.</em></>,
    heroBody: 'Visit USA Korea connects the travel industry with travelers—unlocking bigger, richer possibilities across America.',
    explore: 'Discover the USA', about: 'About the Committee', scroll: 'SCROLL TO EXPLORE',
    stats: [['40+', 'Member organizations'], ['50', 'Distinctive states'], ['1', 'Journey starts here']],
    introTag: 'ABOUT VISIT USA KOREA', introTitle: <>Your trusted bridge<br/>between Korea and the USA</>,
    introBody: 'Airlines, tourism boards, hotels, rental car companies and travel agencies come together to grow the U.S. travel market. Reliable intelligence, a powerful network and fresh inspiration meet here.',
    learn: 'Learn more about us', membersTag: 'OUR MEMBERS', membersTitle: 'Bringing America closer, together', membersBody: 'Meet 40+ partners shaping every moment of the journey.',
    destinationTag: 'DISCOVER USA', destinationTitle: 'One trip. Endless America.', destinationBody: 'From iconic cities to landscapes yet to be discovered—choose the scene for your next journey.',
    cards: [['WEST COAST', 'Cities of light and freedom\nalong the Pacific'], ['THE GREAT OUTDOORS', 'Find a whole new you\nin the wild'], ['CITY ESCAPES', 'Iconic cities alive with\nculture and rhythm']],
    newsTag: 'NEWSROOM', newsTitle: 'Latest news & insights', allNews: 'View all news', read: 'Read more',
    news: [['2026.08.20', 'NOTICE', '2026 Visit USA Korea Member Networking Day'], ['2026.08.12', 'INSIGHT', 'The new shape of U.S. travel: Go local'], ['2026.07.28', 'PRESS', 'Visit USA Korea unveils second-half joint marketing program']],
    footer: 'Connecting you to the possibilities of America.', address: '00 Sejong-daero, Jung-gu, Seoul, Korea', admin: 'Newsroom Admin', rights: '© 2026 Visit USA Korea. All rights reserved.',
    panelTitle: 'Manage Newsroom', panelDesc: 'Demo admin panel. Posts are saved in this browser.', add: 'New post', titlePlaceholder: 'Post title', save: 'Publish', cancel: 'Close', delete: 'Delete'
  }
};

const members = ['UNITED AIRLINES','DELTA','AMERICAN AIRLINES','HAWAIIAN AIRLINES','VISIT CALIFORNIA','BRAND USA','LAS VEGAS','VISIT SEATTLE','NYC TOURISM','GO HAWAII','DISCOVER LA','SAN FRANCISCO','VISIT FLORIDA','ALAMO','HERTZ','MARRIOTT','HILTON','WYNN','DISNEY PARKS','UNIVERSAL','EXPEDIA','TRIP.COM','KOREAN AIR','ASIANA','AIR PREMIA','AVIS','BUDGET','NATIONAL','LA TOURISM','WASHINGTON DC','TEXAS TOURISM','CHICAGO','BOSTON USA','PHILADELPHIA','PORTLAND','UTAH','ARIZONA','COLORADO','ALASKA','GUAM'];
const photos = [
  'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1800&q=85',
  'https://images.unsplash.com/photo-1501594907352-04cda38ebc29?auto=format&fit=crop&w=1000&q=85',
  'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1000&q=85',
  'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?auto=format&fit=crop&w=1000&q=85'
];

function App(){
  const [lang,setLang]=useState('ko'); const [menu,setMenu]=useState(false); const [admin,setAdmin]=useState(false); const [draft,setDraft]=useState('');
  const t=copy[lang];
  const [extra,setExtra]=useState(()=>{try{return JSON.parse(localStorage.getItem('vuk-news')||'[]')}catch{return []}});
  useEffect(()=>{document.documentElement.lang=lang; localStorage.setItem('vuk-news',JSON.stringify(extra))},[lang,extra]);
  const news=useMemo(()=>[...extra.map(x=>[x.date,lang==='ko'?'관리자 등록':'ADMIN',x.title]),...t.news],[extra,t.news,lang]);
  const publish=()=>{if(!draft.trim())return; setExtra([{title:draft.trim(),date:new Date().toISOString().slice(0,10).replaceAll('-','.')},...extra]);setDraft('')};
  return <div className="app">
    <header><a className="brand" href="#top" aria-label="Visit USA Korea"><span className="brand-mark"><i></i><b></b></span><span>VISIT<br/>USA <strong>KOREA</strong></span></a>
      <nav>{t.nav.map((n,i)=><a key={n} href={'#'+['about','members','discover','news','contact'][i]}>{n}</a>)}</nav>
      <div className="tools"><button onClick={()=>setLang(lang==='ko'?'en':'ko')}><Globe2/> {lang==='ko'?'EN':'KO'}</button><button className="search"><Search/></button><button className="hamb" onClick={()=>setMenu(!menu)}>{menu?<X/>:<Menu/>}</button></div>
    </header>
    <div className={'mobile-menu '+(menu?'show':'')}>{t.nav.map((n,i)=><a onClick={()=>setMenu(false)} key={n} href={'#'+['about','members','discover','news','contact'][i]}>{n}<ArrowRight/></a>)}</div>
    <main id="top">
      <section className="hero" style={{'--hero':`url(${photos[0]})`}}><div className="wash"></div><div className="route route1"></div><div className="route route2"></div>
        <div className="hero-content"><div className="eyebrow light"><Plane/> {t.heroKicker}</div><h1>{t.heroTitle}</h1><p>{t.heroBody}</p><div className="actions"><a href="#discover" className="primary">{t.explore}<ArrowRight/></a><a href="#about" className="secondary">{t.about}</a></div></div>
        <div className="scroll"><ArrowDown/><span>{t.scroll}</span></div><div className="hero-number">01<span>/ 03</span></div>
      </section>
      <section className="stats">{t.stats.map(([v,l])=><div key={l}><strong>{v}</strong><span>{l}</span></div>)}</section>
      <section className="about" id="about"><div className="about-copy"><div className="eyebrow">{t.introTag}</div><h2>{t.introTitle}</h2><p>{t.introBody}</p><a href="#members" className="text-link">{t.learn}<ArrowRight/></a></div><div className="about-art"><div className="photo-main"></div><div className="usa-word">USA</div><div className="seal"><span>CONNECTING<br/>TRAVEL<br/>TOGETHER</span><Plane/></div></div></section>
      <section className="members" id="members"><div className="section-head"><div><div className="eyebrow">{t.membersTag}</div><h2>{t.membersTitle}</h2></div><p>{t.membersBody}</p></div>
        {[0,1].map(row=><div className={'ticker row'+row} key={row}><div className="ticker-track">{[...members.slice(row*20,row*20+20),...members.slice(row*20,row*20+20)].map((m,i)=><div className="member" key={m+i}>{m}</div>)}</div></div>)}
      </section>
      <section className="discover" id="discover"><div className="eyebrow light">{t.destinationTag}</div><div className="discover-head"><h2>{t.destinationTitle}</h2><p>{t.destinationBody}</p></div><div className="dest-grid">{t.cards.map((c,i)=><article key={c[0]} style={{backgroundImage:`linear-gradient(0deg,rgba(3,18,35,.8),transparent 65%),url(${photos[i+1]})`}}><span>0{i+1}</span><div><small>{c[0]}</small><h3>{c[1].split('\n').map(x=><React.Fragment key={x}>{x}<br/></React.Fragment>)}</h3><button aria-label={t.read}><ArrowRight/></button></div></article>)}</div></section>
      <section className="news" id="news"><div className="section-head"><div><div className="eyebrow">{t.newsTag}</div><h2>{t.newsTitle}</h2></div><a className="text-link" href="#news">{t.allNews}<ArrowRight/></a></div><div className="news-list">{news.slice(0,4).map((n,i)=><article key={n[0]+n[2]}><div className="date"><CalendarDays/><span>{n[0]}</span></div><span className="tag">{n[1]}</span><h3>{n[2]}</h3><ArrowRight/><>{extra.length>0&&i<extra.length&&<button className="quick-delete" onClick={()=>setExtra(extra.filter((_,j)=>j!==i))}>{t.delete}</button>}</></article>)}</div></section>
    </main>
    <footer id="contact"><div className="footer-top"><a className="brand footer-brand" href="#top"><span className="brand-mark"><i></i><b></b></span><span>VISIT<br/>USA <strong>KOREA</strong></span></a><h2>{t.footer}</h2></div><div className="footer-bottom"><div><p>{t.address}</p><p>hello@visitusakorea.kr · +82 2 0000 0000</p></div><button onClick={()=>setAdmin(true)}><Newspaper/> {t.admin}</button><span>{t.rights}</span></div></footer>
    {admin&&<div className="modal-back"><div className="modal"><button className="modal-x" onClick={()=>setAdmin(false)}><X/></button><div className="eyebrow">CMS DEMO</div><h2>{t.panelTitle}</h2><p>{t.panelDesc}</p><label>{t.add}</label><input value={draft} onChange={e=>setDraft(e.target.value)} placeholder={t.titlePlaceholder} onKeyDown={e=>e.key==='Enter'&&publish()}/><button className="primary" onClick={publish}>{t.save}<ArrowRight/></button><div className="admin-list">{extra.map((n,i)=><div key={n.date+n.title}><span>{n.date}</span><b>{n.title}</b><button onClick={()=>setExtra(extra.filter((_,j)=>j!==i))}>{t.delete}</button></div>)}</div></div></div>}
  </div>
}
createRoot(document.getElementById('root')).render(<App/>);
