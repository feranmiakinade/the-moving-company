<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>TMC — The Moving Company</title>
<style>
  :root{
    --yellow:#F5C518;
    --yellow-dark:#E0AE0C;
    --black:#0d0d0d;
    --near-black:#141414;
    --white:#ffffff;
    --muted:#cfcfcf;
    box-sizing:border-box;
  }
  *{box-sizing:inherit; margin:0; padding:0;}
  html,body{height:100%;}
  body{
    font-family:'Inter',-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,Arial,sans-serif;
    background:var(--black);
    color:var(--white);
    -webkit-font-smoothing:antialiased;
  }

  /* ---------- HERO / BACKGROUND ---------- */
  .hero{
    position:relative;
    min-height:100vh;
    min-height:100dvh;
    width:100%;
    overflow:hidden;
    display:flex;
    flex-direction:column;
    background:#0a0908;
  }
  .hero-video{
    position:absolute;
    inset:0;
    width:100%;
    height:100%;
    object-fit:cover;
    z-index:0;
    display:block;
    pointer-events:none;
  }
  .hero-overlay{
    position:absolute;
    inset:0;
    z-index:1;
    background:
      linear-gradient(115deg, rgba(6,6,6,0.82) 0%, rgba(6,6,6,0.72) 28%, rgba(10,10,10,0.46) 48%, rgba(20,16,10,0.25) 62%, rgba(30,24,14,0.12) 100%),
      radial-gradient(ellipse at 78% 55%, rgba(74,60,38,0.52) 0%, rgba(43,36,25,0.38) 30%, rgba(23,19,12,0.32) 55%, rgba(10,9,8,0.55) 75%),
      rgba(10,9,8,0.18);
    pointer-events:none;
  }
  .hero::before{
    content:"";
    position:absolute;
    inset:0;
    z-index:2;
    background:
      repeating-linear-gradient(115deg, rgba(255,255,255,0.05) 0 2px, transparent 2px 14px),
      repeating-linear-gradient(25deg, rgba(255,255,255,0.03) 0 1px, transparent 1px 22px);
    mix-blend-mode:overlay;
    opacity:0.55;
    pointer-events:none;
  }
  .hero::after{
    content:"";
    position:absolute;
    right:-10%;
    top:-5%;
    width:70%;
    height:120%;
    z-index:2;
    background:radial-gradient(closest-side, rgba(255,255,255,0.10), transparent 70%);
    pointer-events:none;
  }

  /* ---------- NAVBAR ---------- */
  .nav-wrap{
    position:relative;
    z-index:10;
    padding:22px 24px 0;
  }
  nav{
    max-width:1500px;
    margin:0 auto;
    background:rgba(15,15,15,0.72);
    backdrop-filter:blur(14px);
    -webkit-backdrop-filter:blur(14px);
    border:1px solid rgba(255,255,255,0.06);
    border-radius:100px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:12px 20px 12px 24px;
  }
  .logo{
    display:flex;
    align-items:center;
    gap:10px;
    flex-shrink:0;
    text-decoration:none;
  }
  .logo img{
    display:block;
    height:52px;
    width:auto;
    max-width:180px;
  }
  .logo-text{
    display:flex;
    flex-direction:column;
    line-height:1;
  }

  .nav-links{
    display:flex;
    align-items:center;
    gap:36px;
    list-style:none;
  }
  .nav-links a{
    color:#e9e9e9;
    text-decoration:none;
    font-size:15px;
    font-weight:500;
    position:relative;
    padding-bottom:4px;
    white-space:nowrap;
  }
  .nav-links a.active{ color:var(--white); }
  .nav-links a.active::after{
    content:"";
    position:absolute;
    left:0; right:0; bottom:-2px;
    height:3px;
    border-radius:2px;
    background:var(--yellow);
  }
  .nav-links a:hover{ color:var(--yellow); }

  .nav-right{
    display:flex;
    align-items:center;
    gap:18px;
    flex-shrink:0;
  }
  .call-us{
    display:flex;
    align-items:center;
    gap:10px;
  }
  .call-icon{
    width:38px;height:38px;
    background:var(--yellow);
    border-radius:50%;
    display:flex;align-items:center;justify-content:center;
    flex-shrink:0;
  }
  .call-icon svg{ width:17px; height:17px; }
  .call-text{ line-height:1.25; }
  .call-text .label{ font-size:11.5px; color:#b9b9b9; display:block; }
  .call-text .number{ font-size:14px; font-weight:700; color:var(--white); }

  .divider{
    width:1px;
    height:30px;
    background:rgba(255,255,255,0.15);
  }

  .btn{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:13px 24px;
    border-radius:100px;
    font-weight:700;
    font-size:14.5px;
    text-decoration:none;
    border:none;
    cursor:pointer;
    white-space:nowrap;
    transition:transform .15s ease, box-shadow .15s ease;
  }
  .btn:hover{ transform:translateY(-1px); }
  .btn-primary{
    background:var(--yellow);
    color:#141414;
  }
  .btn-primary:hover{ box-shadow:0 8px 20px rgba(245,197,24,0.35); }
  .btn-outline{
    background:transparent;
    color:var(--white);
    border:1.5px solid var(--yellow);
  }
  .btn-outline:hover{ background:rgba(245,197,24,0.08); }
  .btn svg{ width:15px; height:15px; }

  /* mobile nav toggle */
  .menu-toggle{
    display:none;
    background:none;
    border:none;
    cursor:pointer;
    width:40px;height:40px;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
  }
  .menu-toggle span{
    display:block;
    width:22px;height:2px;
    background:var(--white);
    position:relative;
    transition:.2s;
  }
  .menu-toggle span::before,.menu-toggle span::after{
    content:"";
    position:absolute;
    left:0;
    width:22px;height:2px;
    background:var(--white);
    transition:.2s;
  }
  .menu-toggle span::before{ top:-7px; }
  .menu-toggle span::after{ top:7px; }
  .menu-toggle.open span{ background:transparent; }
  .menu-toggle.open span::before{ transform:rotate(45deg); top:0; }
  .menu-toggle.open span::after{ transform:rotate(-45deg); top:0; }

  .mobile-panel{
    max-width:1500px;
    margin:8px auto 0;
    background:rgba(15,15,15,0.92);
    border:1px solid rgba(255,255,255,0.08);
    border-radius:20px;
    padding:6px 8px;
    display:none;
    flex-direction:column;
    overflow:hidden;
    max-height:0;
    transition:max-height .25s ease;
  }
  .mobile-panel.show{ display:flex; max-height:420px; }
  .mobile-panel a{
    color:#eee;
    text-decoration:none;
    padding:14px 16px;
    font-size:15.5px;
    font-weight:500;
    border-bottom:1px solid rgba(255,255,255,0.06);
  }
  .mobile-panel a:last-child{ border-bottom:none; }
  .mobile-call{
    display:flex;
    align-items:center;
    gap:10px;
    padding:16px;
  }
  .mobile-cta{ padding:12px 16px 16px; display:flex; gap:10px; }
  .mobile-cta .btn{ flex:1; justify-content:center; }

  /* ---------- HERO CONTENT ---------- */
  .hero-content{
    position:relative;
    z-index:10;
    flex:1;
    display:flex;
    align-items:center;
    padding:60px 24px 90px;
  }
  .hero-inner{
    max-width:1500px;
    margin:0 auto;
    width:100%;
  }
  .eyebrow{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:26px;
  }
  .eyebrow .line{
    width:40px;
    height:2px;
    background:var(--yellow);
  }
  .eyebrow span{
    font-size:12.5px;
    letter-spacing:3px;
    color:#d9d9d9;
    font-weight:600;
  }

  h1{
    font-size:clamp(2.6rem, 6.2vw, 5.4rem);
    line-height:0.98;
    font-weight:900;
    letter-spacing:-2px;
    color:var(--white);
    max-width:11ch;
    text-transform:uppercase;
  }

  .lede{
    margin-top:30px;
    font-size:17px;
    line-height:1.6;
    color:#d6d6d6;
    max-width:440px;
    font-weight:400;
  }

  .cta-row{
    margin-top:38px;
    display:flex;
    gap:16px;
    flex-wrap:wrap;
  }

  /* ---------- RESPONSIVE ---------- */
  @media (max-width:980px){
    .nav-links, .nav-right .call-us, .nav-right .divider{ display:none; }
    .menu-toggle{ display:flex; }
    nav{ padding:10px 14px 10px 18px; }
    .hero-content{ padding:40px 20px 70px; }
  }

  @media (max-width:600px){
    .logo-mark{ font-size:21px; }
    .logo-mark svg{ width:28px; }
    .logo-sub{ font-size:8px; letter-spacing:1.2px; }
    .nav-right .btn-primary{ padding:10px 16px; font-size:13px; }
    h1{ letter-spacing:-1px; max-width:9ch; }
    .lede{ font-size:15.5px; max-width:100%; }
    .cta-row{ flex-direction:column; }
    .cta-row .btn{ width:100%; justify-content:center; }
    .eyebrow span{ font-size:11px; letter-spacing:2px; }
  }

  @media (max-width:380px){
    h1{ font-size:2.3rem; }
  }

  :focus-visible{
    outline:2px solid var(--yellow);
    outline-offset:3px;
  }
  /* ---------- INTRO SECTION ---------- */
.intro-section{
  background:#ffffff;
  padding:110px 24px;
  border-top:1px solid rgba(245,197,24,0.18);
}
.intro-content{
  max-width:1500px;
  margin:0 auto;
  display:flex;
  align-items:center;
  gap:42px;
  padding-left:40px;
  padding-right:40px;
}
.intro-visual{
  flex:1;
  display:flex;
  justify-content:center;
  transform:translateX(-28px);
}
.intro-visual img{
  display:block;
  width:min(100%, 520px);
  height:auto;
  border-radius:26px;
  box-shadow:0 30px 70px rgba(0,0,0,0.12);
}
.intro-copy{
  flex:1;
  max-width:580px;
  transform:translateX(10px);
}
.intro-eyebrow{
  display:inline-block;
  font-size:12.5px;
  letter-spacing:3px;
  color:#111111;
  font-weight:800;
  margin-bottom:20px;
  padding:0;
  border-radius:0;
  background:transparent;
}
.intro-section h2{
  font-size:clamp(2.2rem, 4.5vw, 3.6rem);
  line-height:1.05;
  font-weight:900;
  letter-spacing:-1.5px;
  color:var(--yellow);
  text-transform:uppercase;
  margin-bottom:28px;
}
.intro-text{
  font-size:17px;
  line-height:1.7;
  color:#2a2a2a;
  max-width:52ch;
  margin-bottom:34px;
}
.intro-link{
  display:inline-flex;
  align-items:center;
  gap:10px;
  color:#111111;
  background:transparent;
  text-decoration:none;
  font-weight:800;
  font-size:15px;
  letter-spacing:0.3px;
  padding:0;
  border-radius:0;
  transition:gap .15s ease, color .15s ease;
}
.intro-link:hover{
  transform:none;
  box-shadow:none;
  color:var(--yellow-dark);
}
.intro-link span{
  font-size:16px;
  transition:transform .15s ease;
}
.intro-link:hover span{
  transform:translateX(2px);
}

@media (max-width:900px){
  .intro-content{ flex-direction:column; gap:28px; }
  .intro-visual,
  .intro-copy{ width:100%; }
  .intro-copy{ max-width:100%; }
}

@media (max-width:600px){
  .intro-section{ padding:70px 20px; }
  .intro-text{ font-size:15.5px; }
}
/* ---------- CARS SECTION ---------- */
.cars-section{
  background:var(--black);
  padding:110px 24px 120px;
}
.cars-header{
  max-width:1500px;
  margin:0 auto 60px;
  max-width:640px;
}
.cars-eyebrow{
  font-size:12.5px;
  letter-spacing:3px;
  color:var(--yellow);
  font-weight:700;
  margin-bottom:20px;
}
.cars-section h2{
  font-size:clamp(2rem, 4vw, 3.2rem);
  line-height:1.05;
  font-weight:900;
  letter-spacing:-1.5px;
  color:var(--white);
  text-transform:uppercase;
  margin-bottom:22px;
}
.cars-description{
  font-size:16.5px;
  line-height:1.6;
  color:#c9c9c9;
  max-width:46ch;
}

/* ---------- CARS SECTION (reduced size) ---------- */
.cars-section{
  background:var(--black);
  padding:70px 24px 80px;
}
.cars-header{
  max-width:1500px;
  margin:0 auto 40px;
  max-width:640px;
}

/* ---------- CARS GRID (no borders, image-only, smaller) ---------- */
.cars-grid{
  max-width:1500px;
  margin:0 auto;
  display:grid;
  grid-template-columns:repeat(3, 1fr);
  gap:14px;
}

.car-card{
  position:relative;
  background:transparent;
  border:none;
  outline:none;
  cursor:pointer;
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content:flex-end;
  min-height:260px;
  padding:20px 16px 18px;
  overflow:visible;
  transition:transform .35s ease;
}
.car-card:hover{
  transform:translateY(-6px);
}

/* soft spotlight glow behind the car on hover */
.car-card::before{
  content:"";
  position:absolute;
  left:50%;
  top:42%;
  width:70%;
  height:70%;
  background:radial-gradient(closest-side, rgba(245,197,24,0.10), transparent 75%);
  transform:translate(-50%,-50%);
  z-index:0;
  opacity:0;
  transition:opacity .35s ease;
}
.car-card:hover::before{
  opacity:1;
}

/* grounding shadow under the car */
.car-card::after{
  content:"";
  position:absolute;
  left:50%;
  bottom:66px;
  width:56%;
  height:10px;
  background:radial-gradient(ellipse, rgba(0,0,0,0.55) 0%, transparent 75%);
  transform:translateX(-50%);
  z-index:1;
  filter:blur(2px);
  transition:width .35s ease, opacity .35s ease;
}
.car-card:hover::after{
  width:64%;
  opacity:0.8;
}

.car-card img{
  position:relative;
  width:100%;
  height:auto;
  max-height:190px;
  object-fit:contain;
  display:block;
  z-index:2;
  filter:drop-shadow(0 18px 22px rgba(0,0,0,0.5));
  transition:transform 0.5s ease, filter 0.5s ease;
}
.car-card:hover img{
  transform:scale(1.05) translateY(-4px);
}

.car-card-content{
  position:relative;
  z-index:3;
  width:100%;
  text-align:center;
  margin-top:14px;
}

.car-card-label{
  display:inline-block;
  font-size:10.5px;
  letter-spacing:2px;
  font-weight:700;
  color:var(--yellow);
  margin-bottom:8px;
}

.car-card-content h3{
  font-size:22px;
  font-weight:800;
  color:var(--white);
  letter-spacing:-0.3px;
  margin:0 0 6px;
}

.car-card-content p{
  font-size:14.5px;
  color:#a8a8a8;
  margin:0;
  line-height:1.5;
}

/* ---------- RESPONSIVE ---------- */
@media (max-width:900px){
  .cars-grid{
    grid-template-columns:1fr 1fr;
  }
}

@media (max-width:600px){
  .cars-section{ padding:50px 20px 60px; }
  .cars-grid{
    grid-template-columns:1fr;
    gap:12px;
  }
  .car-card{
    min-height:230px;
    padding:16px 16px 16px;
  }
  .car-card img{ max-height:170px; }
}
/* ---------- SERVICES SECTION ---------- */
.services-section{
  background:#ffffff;
  padding:110px 24px;
  border-top:1px solid rgba(17,17,17,0.08);
}
.services-container{
  max-width:1500px;
  margin:0 auto;
}
.services-header{
  max-width:640px;
  margin-bottom:70px;
}
.services-eyebrow{
  font-size:12.5px;
  letter-spacing:3px;
  color:var(--yellow);
  font-weight:700;
  margin-bottom:20px;
}
.services-section h2{
  font-size:clamp(2rem, 4vw, 3.2rem);
  line-height:1.05;
  font-weight:900;
  letter-spacing:-1.5px;
  color:#111111;
  text-transform:uppercase;
}

.services-grid{
  display:grid;
  grid-template-columns:repeat(4, 1fr);
  gap:0;
  border-top:1px solid rgba(17,17,17,0.14);
  padding-top:8px;
}
.service-item{
  padding:30px 18px 30px 24px;
  border-right:1px solid rgba(17,17,17,0.12);
  margin-left:8px;
  color:#111111;
  display:flex;
  flex-direction:column;
  gap:18px;
}
.service-item:last-child{
  border-right:none;
  margin-right:0;
}
.service-item:first-child{
  margin-left:0;
}
.service-item .service-image{
  width:100%;
  height:150px;
  border-radius:16px;
  background:rgba(17,17,17,0.06);
  border:1px solid rgba(17,17,17,0.1);
  object-fit:cover;
  display:block;
}
.service-item .service-number{
  font-size:13px;
  font-weight:800;
  letter-spacing:2px;
  color:var(--yellow);
  margin-bottom:0;
}
.service-item h3{
  font-size:22px;
  line-height:1.2;
  margin-bottom:0;
  color:#111111;
}
.service-item p{
  font-size:15px;
  line-height:1.7;
  color:rgba(17,17,17,0.8);
  margin-top:-4px;
}
.service-item .service-image {
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}

.service-item:hover .service-image {
    transform: translateY(-8px) scale(1.04);
    box-shadow: 0 18px 40px rgba(0, 0, 0, 0.18);
}
/* ---------- HOW IT WORKS SECTION ---------- */
.how-section{
  background:var(--black);
  padding:110px 24px;
}
.how-container{
  max-width:1500px;
  margin:0 auto;
}
.how-header{
  max-width:640px;
  margin-bottom:70px;
}
.how-eyebrow{
  font-size:12.5px;
  letter-spacing:3px;
  color:var(--yellow);
  font-weight:700;
  margin-bottom:20px;
}
.how-section h2{
  font-size:clamp(2rem, 4vw, 3.2rem);
  line-height:1.05;
  font-weight:900;
  letter-spacing:-1.5px;
  color:var(--white);
  text-transform:uppercase;
}

.how-grid{
  display:grid;
  grid-template-columns:repeat(3, 1fr);
  gap:40px;
  position:relative;
}

/* connecting line running behind the steps */
.how-grid::before{
  content:"";
  position:absolute;
  top:14px;
  left:0;
  right:0;
  height:1px;
  background:rgba(255,255,255,0.12);
  z-index:0;
}

.how-step{
  position:relative;
  z-index:1;
  display:flex;
  flex-direction:column;
  gap:24px;
}

.how-number{
  display:flex;
  align-items:center;
  justify-content:center;
  width:30px;
  height:30px;
  border-radius:50%;
  background:var(--black);
  border:1.5px solid var(--yellow);
  color:var(--yellow);
  font-size:12.5px;
  font-weight:700;
  flex-shrink:0;
}

.how-step h3{
  font-size:19px;
  font-weight:800;
  color:var(--white);
  letter-spacing:-0.2px;
  margin-bottom:12px;
  line-height:1.25;
}

.how-step p{
  font-size:14.5px;
  line-height:1.6;
  color:#b8b8b8;
  max-width:30ch;
}

/* ---------- RESPONSIVE ---------- */
@media (max-width:900px){
  .how-grid{
    grid-template-columns:1fr;
    gap:44px;
  }
  .how-grid::before{
    top:0;
    bottom:0;
    left:14px;
    right:auto;
    width:1px;
    height:auto;
  }
  .how-step{
    flex-direction:row;
    gap:20px;
  }
  .how-section{ padding:80px 20px; }
  .how-header{ margin-bottom:48px; }
}

@media (max-width:600px){
  .how-step p{ max-width:100%; }
}
/* ---------- ABOUT SECTION ---------- */
.about-section{
  background:var(--near-black);
  padding:110px 24px;
  border-top:1px solid rgba(255,255,255,0.06);
}
.about-container{
  max-width:1500px;
  margin:0 auto;
  display:grid;
  grid-template-columns:1fr 1.15fr;
  gap:80px;
  align-items:start;
}

.about-header{
  position:sticky;
  top:120px;
}
.about-eyebrow{
  font-size:12.5px;
  letter-spacing:3px;
  color:var(--yellow);
  font-weight:700;
  margin-bottom:20px;
}
.about-section h2{
  font-size:clamp(2rem, 4vw, 3.2rem);
  line-height:1.05;
  font-weight:900;
  letter-spacing:-1.5px;
  color:var(--white);
  text-transform:uppercase;
}

.about-content{
  max-width:560px;
}
.about-intro{
  font-size:20px;
  line-height:1.5;
  color:var(--white);
  font-weight:600;
  margin-bottom:26px;
}
.about-content p{
  font-size:16px;
  line-height:1.7;
  color:#b8b8b8;
  margin-bottom:22px;
  max-width:52ch;
}
.about-content p:last-of-type{
  margin-bottom:34px;
}

.about-link{
  display:inline-flex;
  align-items:center;
  gap:10px;
  color:var(--yellow);
  text-decoration:none;
  font-weight:700;
  font-size:15px;
  letter-spacing:0.3px;
  border-bottom:1.5px solid transparent;
  transition:gap .15s ease, border-color .15s ease;
}
.about-link:hover{
  gap:14px;
  border-color:var(--yellow);
}
.about-link span{
  font-size:16px;
  transition:transform .15s ease;
}
.about-link:hover span{
  transform:translateX(2px);
}

/* ---------- RESPONSIVE ---------- */
@media (max-width:900px){
  .about-container{
    grid-template-columns:1fr;
    gap:36px;
  }
  .about-header{
    position:static;
  }
  .about-section{ padding:80px 20px; }
}

@media (max-width:600px){
  .about-intro{ font-size:18px; }
  .about-content p{ font-size:15px; }
}
/* ---------- INSTAGRAM SECTION ---------- */
.instagram-section{
  background:#ffffff;
  padding:120px 24px;
  border-top:1px solid rgba(17,17,17,0.08);
  text-align:center;
}
.instagram-container{
  max-width:640px;
  margin:0 auto;
}
.instagram-eyebrow{
  font-size:12.5px;
  letter-spacing:3px;
  color:var(--yellow);
  font-weight:700;
  margin-bottom:20px;
}
.instagram-section h2{
  font-size:clamp(2.2rem, 4.5vw, 3.6rem);
  line-height:1.05;
  font-weight:900;
  letter-spacing:-1.5px;
  color:#111111;
  text-transform:uppercase;
  margin-bottom:26px;
}
.instagram-text{
  font-size:16.5px;
  line-height:1.65;
  color:#2a2a2a;
  max-width:48ch;
  margin:0 auto 40px;
}

.instagram-link{
  display:inline-flex;
  align-items:center;
  gap:10px;
  padding:16px 32px;
  border-radius:100px;
  background:var(--yellow);
  color:#141414;
  text-decoration:none;
  font-weight:700;
  font-size:15px;
  transition:transform .15s ease, box-shadow .15s ease;
}
.instagram-link:hover{
  transform:translateY(-2px);
  box-shadow:0 10px 24px rgba(245,197,24,0.3);
}
.instagram-link span{
  font-size:17px;
  transition:transform .15s ease;
}
.instagram-link:hover span{
  transform:translate(2px,-2px);
}
/* ---------- FOOTER ---------- */
.site-footer{
  background:var(--black);
  border-top:1px solid rgba(255,255,255,0.08);
  padding:80px 24px 0;
}
.footer-container{
  max-width:1500px;
  margin:0 auto;
}

.footer-top{
  display:grid;
  grid-template-columns:1fr 2fr;
  gap:60px;
  padding-bottom:70px;
}

.footer-brand{
  max-width:280px;
}
.footer-logo{
  display:inline-block;
  margin-bottom:18px;
}
.footer-logo img{
  height:34px;
  width:auto;
  display:block;
}
.footer-brand p{
  font-size:14.5px;
  color:#8a8a8a;
  line-height:1.6;
}

.footer-links{
  display:grid;
  grid-template-columns:repeat(3, 1fr);
  gap:40px;
}

.footer-column{
  display:flex;
  flex-direction:column;
}
.footer-column h4{
  font-size:12px;
  letter-spacing:2px;
  color:var(--yellow);
  font-weight:700;
  margin-bottom:22px;
}
.footer-column a,
.footer-column span{
  font-size:14.5px;
  color:#c9c9c9;
  text-decoration:none;
  margin-bottom:14px;
  transition:color .15s ease;
}
.footer-column a:hover{
  color:var(--yellow);
}
.footer-column span{
  color:#8a8a8a;
}

.footer-bottom{
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:20px;
  padding:26px 0;
  border-top:1px solid rgba(255,255,255,0.08);
}
.footer-bottom p{
  font-size:13px;
  color:#7a7a7a;
  margin:0;
}

/* ---------- RESPONSIVE ---------- */
@media (max-width:900px){
  .footer-top{
    grid-template-columns:1fr;
    gap:44px;
    padding-bottom:50px;
  }
  .footer-links{
    grid-template-columns:repeat(3, 1fr);
    gap:24px;
  }
}

@media (max-width:600px){
  .site-footer{ padding:60px 20px 0; }
  .footer-links{
    grid-template-columns:1fr 1fr;
    gap:32px 20px;
  }
  .footer-bottom{
    flex-direction:column;
    align-items:flex-start;
    gap:6px;
  }
}
/* ---------- ANIMATIONS ---------- */

/* HERO LOAD-IN */

.hero .eyebrow,
.hero h1,
.hero .lede,
.hero .cta-row {
    opacity: 0;
    transform: translateY(12px);
    animation: heroIn 0.55s ease-out forwards;
}

.hero .eyebrow {
    animation-delay: 0.05s;
}

.hero h1 {
    animation-delay: 0.12s;
}

.hero .lede {
    animation-delay: 0.2s;
}

.hero .cta-row {
    animation-delay: 0.28s;
}

nav {
    opacity: 0;
    animation: heroIn 0.6s ease-out forwards;
}

@keyframes heroIn {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


/* SCROLL REVEAL */

.reveal {
    opacity: 0;
    transform: translateY(16px);
    transition:
        opacity 0.55s ease-out,
        transform 0.55s ease-out;
}

.reveal.is-visible {
    opacity: 1;
    transform: translateY(0);
}


/* STAGGER */

.reveal-group.is-visible > * {
    transition-delay: calc(var(--i, 0) * 50ms);
}


/* REDUCED MOTION */

@media (prefers-reduced-motion: reduce) {

    .hero .eyebrow,
    .hero h1,
    .hero .lede,
    .hero .cta-row,
    nav {
        animation: none;
        opacity: 1;
        transform: none;
    }

    .reveal {
        opacity: 1;
        transform: none;
        transition: none;
    }
}
/* =========================================
   MOBILE OPTIMIZATION
   ========================================= */

@media (max-width: 600px) {

    html,
    body {
        width: 100%;
        max-width: 100%;
        overflow-x: hidden;
    }

    img,
    video {
        max-width: 100%;
    }

    /* NAVBAR */

    .nav-wrap {
        padding: 14px 14px 0;
    }

    nav {
        width: 100%;
        padding: 8px 10px 8px 14px;
        border-radius: 60px;
    }

    .logo img {
        height: 42px;
        max-width: 145px;
    }

    .nav-right {
        gap: 6px;
    }

    .nav-right .btn-primary {
        padding: 10px 14px;
        font-size: 12.5px;
    }

    .menu-toggle {
        width: 38px;
        height: 38px;
    }


    /* HERO */

    .hero-content {
        padding: 35px 20px 55px;
    }

    .hero-inner {
        width: 100%;
    }

    .eyebrow {
        margin-bottom: 20px;
    }

    h1 {
        font-size: clamp(2.6rem, 15vw, 4.2rem);
        line-height: 0.94;
        letter-spacing: -1.5px;
        max-width: 8ch;
    }

    .lede {
        margin-top: 22px;
        font-size: 15px;
        line-height: 1.6;
        max-width: 330px;
    }

    .cta-row {
        margin-top: 28px;
        gap: 10px;
    }

    .cta-row .btn {
        width: 100%;
        min-height: 50px;
        justify-content: center;
    }


    /* INTRO */

    .intro-section {
        padding: 70px 20px;
    }

    .intro-content {
    padding-left: 0;
    padding-right: 0;
    gap: 24px;
}

.intro-visual {
    width: 100%;
    justify-content: center;
    transform: none;
}

.intro-visual img {
    margin: 0 auto;
}

.intro-section h2 {
    font-size: clamp(2.2rem, 12vw, 3.4rem);
    letter-spacing: -1.5px;
}

    .intro-text {
        font-size: 15.5px;
        line-height: 1.7;
    }


    /* CARS */

    .cars-section {
        padding: 65px 20px 75px;
    }

    .cars-header {
        margin-bottom: 35px;
    }

    .cars-section h2 {
        font-size: clamp(2rem, 11vw, 3rem);
        letter-spacing: -1px;
    }

    .cars-description {
        font-size: 15px;
    }

    .cars-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }

    .car-card {
        min-height: 240px;
        padding: 12px 10px 10px;
    }

    .car-card img {
        max-height: 175px;
    }

    .car-card-content {
        margin-top: 12px;
    }

    .car-card-content h3 {
        font-size: 20px;
    }

    .car-card-content p {
        font-size: 14px;
    }
    .car-card {
    cursor: pointer;
  }


    /* SERVICES */

    .services-section {
        padding: 75px 20px;
    }

    .services-header {
        margin-bottom: 45px;
    }

    .services-section h2 {
        font-size: clamp(2rem, 11vw, 3rem);
        letter-spacing: -1px;
    }
.service-item .service-image {
    transition: transform 0.35s ease, box-shadow 0.35s ease;
}

.service-item:hover .service-image {
    transform: translateY(-6px) scale(1.03);
    box-shadow: 0 16px 35px rgba(0, 0, 0, 0.15);
}
    .services-grid {
        grid-template-columns: 1fr;
        padding-top: 0;
    }

    .service-item,
    .service-item:first-child,
    .service-item:last-child {
        margin: 0;
        padding: 28px 0;
        border-right: none;
        border-bottom: 1px solid rgba(17,17,17,0.12);
    }

    .service-item:last-child {
        border-bottom: none;
    }

    .service-item h3 {
        font-size: 20px;
    }

    .service-item p {
        font-size: 14.5px;
    }


    /* HOW IT WORKS */

    .how-section {
        padding: 75px 20px;
    }

    .how-header {
        margin-bottom: 45px;
    }

    .how-section h2 {
        font-size: clamp(2rem, 11vw, 3rem);
        letter-spacing: -1px;
    }

    .how-grid {
        gap: 36px;
    }

    .how-step {
        gap: 16px;
    }

    .how-step h3 {
        font-size: 18px;
        margin-bottom: 8px;
    }

    .how-step p {
        font-size: 14px;
        line-height: 1.6;
    }


    /* ABOUT */

    .about-section {
        padding: 75px 20px;
    }

    .about-container {
        gap: 35px;
    }

    .about-section h2 {
        font-size: clamp(2rem, 11vw, 3rem);
        letter-spacing: -1px;
    }

    .about-intro {
        font-size: 18px;
        line-height: 1.5;
    }

    .about-content p {
        font-size: 15px;
        line-height: 1.7;
    }


    /* INSTAGRAM */

    .instagram-section {
        padding: 80px 20px;
    }

    .instagram-section h2 {
        font-size: clamp(2.2rem, 12vw, 3.5rem);
        letter-spacing: -1.5px;
    }

    .instagram-text {
        font-size: 15px;
    }

    .instagram-link {
        width: 100%;
        justify-content: center;
        padding: 15px 24px;
    }


    /* FOOTER */

    .site-footer {
        padding: 60px 20px 0;
    }

    .footer-top {
        gap: 40px;
    }

    .footer-links {
        grid-template-columns: 1fr 1fr;
        gap: 30px 20px;
    }

    .footer-column h4 {
        margin-bottom: 18px;
    }

    .footer-column a,
    .footer-column span {
        font-size: 14px;
    }

    .footer-bottom {
        padding: 22px 0;
    }

    .footer-bottom p {
        font-size: 12px;
        line-height: 1.5;
    }
.intro-visual{
  width:100%;
  justify-content:center;
  transform:none;
}

.intro-visual img{
  margin:0 auto;
}
}
</style>
</head>
<body>

 <section class="hero">
        <video
            class="hero-video"
            autoplay
            muted
            loop
            playsinline
            aria-hidden="true"
        >
            <source src="{{ asset('videos/hero-video.mp4') }}" type="video/mp4">
        </video>
        <div class="hero-overlay" aria-hidden="true"></div>

  <div class="nav-wrap">
    <nav>
      <a href="#" class="logo" aria-label="The Moving Company home">
        <img src="{{ asset('logo/logo.png') }}" alt="The Moving Company logo">
      </a>

      <ul class="nav-links">
        <li><a href="#" class="active">Home</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#instagram">Contact</a></li>
      </ul>

      <div class="nav-right">
        <div class="call-us">
          <div class="call-icon">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.5 21 3 13.5 3 4.2c0-.6.4-1 1-1h3.4c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.5.1.4 0 .8-.3 1L6.6 10.8z" fill="#111"/>
            </svg>
          </div>
          <div class="call-text">
            <span class="label">Call Us</span>
            <span class="number">+234 907 279 3802</span>
          </div>
        </div>
        <div class="divider"></div>
        <a href="/book" class="btn btn-primary">
          Get a Quote
          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 12h14M13 6l6 6-6 6" stroke="#141414" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>

        <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu" aria-expanded="false">
          <span></span>
        </button>
      </div>
    </nav>

    <div class="mobile-panel" id="mobilePanel">
      <a href="#" class="active">Home</a>
      <a href="#services">Services</a>
      <a href="#about">About</a>
      <a href="#contact">Contact</a>
      <div class="mobile-call">
        <div class="call-icon">
          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.5 21 3 13.5 3 4.2c0-.6.4-1 1-1h3.4c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.5.1.4 0 .8-.3 1L6.6 10.8z" fill="#111"/>
          </svg>
        </div>
        <div class="call-text">
          <span class="label">Call Us</span>
          <span class="number">+234 801 234 5678</span>
        </div>
      </div>
      <div class="mobile-cta">
        <a href="#quote" class="btn btn-primary">Get a Quote</a>
      </div>
    </div>
  </div>

  <div class="hero-content">
    <div class="hero-inner">
      <div class="eyebrow">
        <span class="line"></span>
        <span>MOVING MADE SIMPLE.</span>
      </div>
      <h1>Move without the stress.</h1>
      <p class="lede">Premium car rentals for every journey. Choose your ride, hit the road and make every drive worth remembering.</p>
      <div class="cta-row">
        <a href="/book" class="btn btn-primary">
          Book Now
          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 12h14M13 6l6 6-6 6" stroke="#141414" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
       <a href="#cars" class="btn btn-outline">Find Your Ride</a>
      </div>
    </div>
  </div>
</section>
<section class="intro-section">
    <div class="intro-content">
        <div class="intro-visual">
            <img src="{{ asset('images/ridepic.png') }}" alt="Customer booking a move on a phone">
        </div>

        <div class="intro-copy">
            <p class="intro-eyebrow">THE MOVING COMPANY</p>
            <h2>
                YOUR JOURNEY<br>
                STARTS HERE.
            </h2>
            <p class="intro-text">
                The right car can change the way you experience a journey.
                At The Moving Company, we make it easy to find a ride that
                fits the moment whether you're heading across town,
                making plans for the weekend, or simply choosing to move
                differently.
            </p>
            <a href="#" class="intro-link">
                Discover The Moving Company
                <span>→</span>
            </a>
        </div>
    </div>
</section>
<section class="cars-section" id="cars">

    <div class="cars-header">

        <p class="cars-eyebrow">FIND YOUR RIDE</p>

        <h2>
            YOUR RIDE.<br>
            YOUR WAY.
        </h2>

        <p class="cars-description">
            Explore our selection of cars and find the right one
            for wherever the road takes you.
        </p>

    </div>


        <div class="cars-grid">

        <div class="car-card" onclick="window.location.href='/book?vehicle=Toyota%20Prado'">
    <img src="images\toyotaprado.png" alt="Toyota Prado">

    <div class="car-card-overlay"></div>

    <div class="car-card-content">
        <h3>Toyota Prado</h3>
        <p>Premium · Comfort meets style.</p>
    </div>

</div>


        <div class="car-card" onclick="window.location.href='/book?vehicle=Lexus%20GX%20460'">

    <img src="images\lexusgx460.png" alt="Lexus GS 360">

    <div class="car-card-overlay"></div>

    <div class="car-card-content">
        <h3>Lexus GX 460</h3>
        <p>Performance · Made for the open road.</p>
    </div>

</div>


        <div class="car-card" onclick="window.location.href='/book?vehicle=Lexus%20ES%20350'">

    <img src="images\lexuses350.png" alt="Lexus ES 350">

    <div class="car-card-overlay"></div>

    <div class="car-card-content">
        <h3>Lexus ES 350</h3>
        <p>Everyday · Simple. Comfortable. Reliable.</p>
    </div>

</div>

    </div>

</section>
<section class="services-section" id="services">

    <div class="services-container">

        <div class="services-header">

            <p class="services-eyebrow">WHY THE MOVING COMPANY</p>

            <h2>
                BUILT AROUND<br>
                YOUR JOURNEY.
            </h2>

        </div>


        <div class="services-grid">

            <div class="service-item">

                <img class="service-image" src="{{ asset('images/rideride.png') }}" alt="Fast and safe ride service">

                <h3>Fast & Safe</h3>

                <p>
                    Reliable service designed to get you on the road
                    smoothly and safely.
                </p>

            </div>


            <div class="service-item">

                <img class="service-image" src="{{ asset('images/ridarida.png') }}" alt="Luxury vehicle rental service">

                <h3>Luxury Vehicle Rentals</h3>

                <p>
                    Premium vehicles for when you want to travel
                    in comfort and style.
                </p>

            </div>


            <div class="service-item">

                <img class="service-image" src="{{ asset('images/ruderude.png') }}" alt="Every occasion vehicle rental service">

                <h3>Every Occasion</h3>

                <p>
                    A ride suited to different journeys, events
                    and occasions.
                </p>

            </div>


            <div class="service-item">

                <img class="service-image" src="{{ asset('images/bararb.png') }}" alt="Nationwide booking service">

                <h3>Nationwide Booking</h3>

                <p>
                    Book with The Moving Company from anywhere
                    in Nigeria.
                </p>

            </div>

        </div>

    </div>

</section>
<section class="how-section" id="how-it-works">

    <div class="how-container">

        <div class="how-header">
            <p class="how-eyebrow">HOW IT WORKS</p>

            <h2>
                FROM BOOKING<br>
                TO THE ROAD.
            </h2>
        </div>

        <div class="how-grid">

            <div class="how-step">
                <span class="how-number">01</span>

                <div>
                    <h3>Choose Your Ride</h3>
                    <p>
                        Explore our vehicles and choose the one
                        that fits your journey.
                    </p>
                </div>
            </div>

            <div class="how-step">
                <span class="how-number">02</span>

                <div>
                    <h3>Make Your Booking</h3>
                    <p>
                        Tell us when and where you need your ride
                        and we'll handle the details.
                    </p>
                </div>
            </div>

            <div class="how-step">
                <span class="how-number">03</span>

                <div>
                    <h3>Hit The Road</h3>
                    <p>
                        Your ride is ready. Get in, start the journey
                        and enjoy the drive.
                    </p>
                </div>
            </div>

        </div>

    </div>

</section>
<section class="about-section" id="about">

    <div class="about-container">

        <div class="about-header">
            <p class="about-eyebrow">ABOUT THE MOVING COMPANY</p>

            <h2>
                MORE THAN<br>
                A RIDE.
            </h2>
        </div>

        <div class="about-content">

            <p class="about-intro">
                The Moving Company is built around one simple idea:
                getting there should feel just as good as the destination.
            </p>

            <p>
                We make it easier to find a vehicle that fits the moment
                whether you're heading out for the day, attending an event,
                travelling for business or simply looking for a better way
                to move.
            </p>

            <p>
                With carefully selected vehicles and a straightforward
                booking experience, we're here to make every journey
                comfortable, seamless and worth remembering.
            </p>

            <a href="#cars" class="about-link">
                Explore Our Rides
                <span>→</span>
            </a>

        </div>

    </div>

</section>
<section class="instagram-section" id="instagram">

    <div class="instagram-container">

        <p class="instagram-eyebrow">FOLLOW THE MOVEMENT</p>

        <h2>
            SEE WHAT'S<br>
            HAPPENING.
        </h2>

        <p class="instagram-text">
            Follow The Moving Company on Instagram for our latest rides,
            updates, journeys and everything happening behind the wheel.
        </p>

        <a href="https://www.instagram.com/themovingcompany__/" 
           target="_blank" 
           rel="noopener noreferrer"
           class="instagram-link">
            Follow us on Instagram
            <span>↗</span>
        </a>

    </div>

</section>

<script>
  const toggle = document.getElementById('menuToggle');
  const panel = document.getElementById('mobilePanel');
  toggle.addEventListener('click', () => {
    const isOpen = panel.classList.toggle('show');
    toggle.classList.toggle('open', isOpen);
    toggle.setAttribute('aria-expanded', isOpen);
  });
</script>
<footer class="site-footer">

    <div class="footer-container">

        <div class="footer-top">

            <div class="footer-brand">
                <a href="/" class="footer-logo">
                    <img src="{{ asset('logo/logo.png') }}" alt="The Moving Company">
                </a>

                <p>
                    Your journey. Your ride.
                </p>
            </div>

            <div class="footer-links">

                <div class="footer-column">
                    <h4>Explore</h4>

                    <a href="/">Home</a>
                    <a href="#cars">Cars</a>
                    <a href="#services">Services</a>
                    <a href="#about">About</a>
                </div>

                <div class="footer-column">
                    <h4>Connect</h4>

                    <a href="#how-it-works">How It Works</a>

                    <a href="https://www.instagram.com/themovingcompany__/"
                       target="_blank"
                       rel="noopener noreferrer">
                        Instagram
                    </a>

                    <a href="/book">Book Now</a>
                </div>

                <div class="footer-column">
                    <h4>Contact</h4>

                    <a href="tel:+2349072793802">
                        ++234 907 279 3802
                    </a>

                    <span>Nigeria</span>
                </div>

            </div>

        </div>

        <div class="footer-bottom">

            <p>
                © {{ date('Y') }} The Moving Company. All rights reserved.
            </p>

            <p>
                Your journey. Your ride.
            </p>

        </div>

    </div>

</footer>
<script>
  // Mark section headers and content blocks for scroll-reveal
  document.querySelectorAll(
    '.intro-content, .cars-header, .services-header, .how-header, .about-header, .about-content, .reviews-header, .instagram-container'
  ).forEach(el => el.classList.add('reveal'));

  // Mark grids that should stagger their children in
  document.querySelectorAll('.cars-grid, .services-grid, .how-grid, .reviews-grid')
    .forEach(grid => {
      grid.classList.add('reveal-group');
      [...grid.children].forEach((child, i) => {
        child.classList.add('reveal');
        child.style.setProperty('--i', i);
      });
    });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting){
        entry.target.classList.add('is-visible');
        if (entry.target.classList.contains('reveal-group')){
          entry.target.querySelectorAll('.reveal').forEach(el => el.classList.add('is-visible'));
        }
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });

  document.querySelectorAll('.reveal, .reveal-group').forEach(el => observer.observe(el));
</script>
</body>
</html>