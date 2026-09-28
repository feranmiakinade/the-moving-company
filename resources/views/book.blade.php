<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Book Your Ride | The Moving Company</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --yellow: #F5C518;
            --yellow-dark: #E0AE0C;
            --black: #0F0F0F;
            --near-black: #1A1A1A;
            --white: #FFFFFF;
            --gray: #A8A8A8;
            box-sizing: border-box;
        }

        * { box-sizing: inherit; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: var(--black);
            color: var(--white);
            -webkit-font-smoothing: antialiased;
        }

        a { -webkit-tap-highlight-color: transparent; }

        :focus-visible {
            outline: 2px solid var(--yellow);
            outline-offset: 3px;
        }

        /* ---------- NAVBAR ---------- */
        .nav-wrap {
            position: relative;
            z-index: 20;
            padding: 22px 24px 0;
        }

        nav {
            max-width: 1500px;
            margin: 0 auto;
            background: rgba(15, 15, 15, 0.85);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 100px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 20px 12px 24px;
        }

        .logo { display: flex; align-items: center; }
        .logo img { height: 52px; width: auto; display: block; }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 32px;
            list-style: none;
        }

        .nav-links a {
            color: #D0D0D0;
            text-decoration: none;
            font-size: 14.5px;
            font-weight: 500;
            transition: color 0.2s ease;
            white-space: nowrap;
        }

        .nav-links a:hover { color: var(--yellow); }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .nav-cta {
            padding: 12px 22px;
            border-radius: 50px;
            background: var(--yellow);
            color: #111111;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
            transition: transform .15s ease, box-shadow .15s ease;
        }
        .nav-cta:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(245,197,24,0.3);
        }

        /* mobile menu toggle */
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            width: 40px; height: 40px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .menu-toggle span {
            display: block;
            width: 22px; height: 2px;
            background: var(--white);
            position: relative;
            transition: .2s;
        }
        .menu-toggle span::before, .menu-toggle span::after {
            content: "";
            position: absolute;
            left: 0;
            width: 22px; height: 2px;
            background: var(--white);
            transition: .2s;
        }
        .menu-toggle span::before { top: -7px; }
        .menu-toggle span::after { top: 7px; }
        .menu-toggle.open span { background: transparent; }
        .menu-toggle.open span::before { transform: rotate(45deg); top: 0; }
        .menu-toggle.open span::after { transform: rotate(-45deg); top: 0; }

        .mobile-panel {
            max-width: 1500px;
            margin: 8px auto 0;
            background: rgba(15,15,15,0.95);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 20px;
            padding: 6px 8px;
            display: none;
            flex-direction: column;
            overflow: hidden;
            max-height: 0;
            transition: max-height .25s ease;
        }
        .mobile-panel.show { display: flex; max-height: 320px; }
        .mobile-panel a {
            color: #eee;
            text-decoration: none;
            padding: 14px 16px;
            font-size: 15.5px;
            font-weight: 500;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .mobile-panel a:last-child { border-bottom: none; }

        /* ---------- HERO ---------- */
        .booking-hero {
            max-width: 1500px;
            margin: 0 auto;
            padding: 100px 40px 70px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: 12.5px;
            letter-spacing: 3px;
            color: var(--yellow);
            font-weight: 700;
            margin-bottom: 22px;
        }
        .eyebrow::before {
            content: "";
            width: 32px;
            height: 2px;
            background: var(--yellow);
        }

        .booking-hero h1 {
            font-size: clamp(2.8rem, 6.5vw, 5.4rem);
            line-height: 0.98;
            font-weight: 900;
            letter-spacing: -2.5px;
            text-transform: uppercase;
            max-width: 700px;
        }

        .booking-hero p {
            margin-top: 26px;
            max-width: 520px;
            color: #B8B8B8;
            font-size: 17px;
            line-height: 1.7;
        }

        /* ---------- CARS SECTION ---------- */
        .booking-cars {
            background: #FFFFFF;
            color: #111111;
            padding: 90px 24px 110px;
        }

        .booking-container { max-width: 1500px; margin: 0 auto; }

        .booking-section-title { margin-bottom: 50px; max-width: 640px; }
        .booking-section-title .eyebrow { color: #111111; }
        .booking-section-title .eyebrow::before { background: var(--yellow); }

        .booking-section-title h2 {
            font-size: clamp(2.1rem, 4vw, 3.4rem);
            line-height: 1.02;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: -1.8px;
        }

        .booking-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .booking-card {
            position: relative;
            background: #F6F6F6;
            border: 1px solid rgba(17,17,17,0.06);
            border-radius: 24px;
            padding: 28px;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color .3s ease;
        }

        .booking-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 50px rgba(0,0,0,0.12);
            border-color: rgba(245,197,24,0.4);
        }

        .booking-card-image {
            position: relative;
            border-radius: 16px;
            background: #ffffff;
            margin-bottom: 24px;
            overflow: hidden;
        }

        .booking-card img {
            width: 100%;
            height: 210px;
            object-fit: contain;
            display: block;
            transition: transform .5s ease;
        }
        .booking-card:hover img { transform: scale(1.05); }

        .booking-label {
            display: inline-block;
            font-size: 11px;
            letter-spacing: 2px;
            color: var(--yellow-dark);
            font-weight: 800;
            background: rgba(245,197,24,0.12);
            padding: 5px 12px;
            border-radius: 20px;
        }

        .booking-card h3 {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.4px;
            margin: 14px 0 6px;
        }

        .booking-card p {
            color: #666;
            font-size: 14.5px;
            line-height: 1.6;
        }

        .booking-price {
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px solid rgba(17,17,17,0.1);
            font-size: 15px;
            font-weight: 700;
            color: #444;
        }
        .booking-price .price-note {
            display: block;
            font-size: 12.5px;
            font-weight: 500;
            color: #999;
            margin-top: 2px;
        }

        .booking-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 18px;
            width: 100%;
            padding: 14px;
            background: var(--yellow);
            color: #111111;
            border: none;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: transform .15s ease, box-shadow .15s ease;
        }
        .booking-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(245,197,24,0.3);
        }

        /* ---------- BOOKING FORM ---------- */
        .booking-form-section {
            background: var(--black);
            padding: 100px 24px 120px;
            border-top: 1px solid rgba(255,255,255,0.06);
        }

        .booking-form {
            max-width: 640px;
            margin: 0 auto;
            display: grid;
            gap: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-field { display: flex; flex-direction: column; gap: 8px; }
        .form-field.full { grid-column: 1 / -1; }

        .form-field label {
            font-size: 13px;
            font-weight: 600;
            color: #cfcfcf;
        }

        .form-field input,
        .form-field select,
        .form-field textarea {
            background: var(--near-black);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 12px;
            padding: 14px 16px;
            color: var(--white);
            font-size: 15px;
            font-family: inherit;
        }
        .form-field textarea { resize: vertical; min-height: 100px; }
        .form-field input:focus,
        .form-field select:focus,
        .form-field textarea:focus {
            outline: none;
            border-color: var(--yellow);
        }

        .form-submit {
            margin-top: 10px;
            padding: 16px;
            border: none;
            border-radius: 50px;
            background: var(--yellow);
            color: #111111;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: transform .15s ease, box-shadow .15s ease;
        }
        .form-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 24px rgba(245,197,24,0.3);
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 900px) {
            .nav-links, .nav-right .nav-cta { display: none; }
            .menu-toggle { display: flex; }
            .booking-hero { padding: 80px 20px 60px; }
            .booking-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 600px) {
            .nav-wrap { padding: 12px 12px 0; }
            nav { padding: 8px 12px; }
            .logo img { height: 42px; }
            .booking-hero { padding: 42px 20px 55px; }
            .booking-hero h1 { font-size: clamp(2.4rem, 12vw, 3.6rem); letter-spacing: -1.5px; }
            .booking-hero p { font-size: 15px; }
            .booking-cars { padding: 70px 20px 90px; }
            .booking-card { padding: 22px; }
            .booking-card img { height: 190px; }
            .form-row { grid-template-columns: 1fr; }
            .booking-form-section { padding: 70px 20px 90px; }
        }
        /* ---------- FOOTER ---------- */

.site-footer {
    background: var(--black);
    border-top: 1px solid rgba(255,255,255,0.08);
    padding: 80px 24px 0;
    position: relative;
    overflow: hidden;
}

/* faint yellow glow along the top edge, echoes the hero accent */
.site-footer::before {
    content: "";
    position: absolute;
    top: -1px;
    left: 50%;
    width: min(600px, 70%);
    height: 1px;
    transform: translateX(-50%);
    background: linear-gradient(90deg, transparent, rgba(245,197,24,0.5), transparent);
}

.footer-container {
    max-width: 1500px;
    margin: 0 auto;
}

.footer-top {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 60px;
    padding-bottom: 70px;
}

.footer-brand {
    max-width: 280px;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.footer-logo {
    display: inline-block;
    width: fit-content;
    transition: opacity .2s ease;
}

.footer-logo:hover {
    opacity: 0.8;
}

.footer-logo img {
    height: 34px;
    width: auto;
    display: block;
}

.footer-brand p {
    font-size: 14.5px;
    color: #8a8a8a;
    line-height: 1.6;
    margin: 0;
}

.footer-social {
    display: flex;
    gap: 12px;
    margin-top: 4px;
}

.footer-social a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border: 1px solid rgba(255,255,255,0.14);
    border-radius: 50%;
    color: #c9c9c9;
    transition: border-color .2s ease, color .2s ease, transform .2s ease;
}

.footer-social a:hover {
    border-color: var(--yellow);
    color: var(--yellow);
    transform: translateY(-2px);
}

.footer-social svg {
    width: 15px;
    height: 15px;
}

.footer-links {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 40px;
}

.footer-column {
    display: flex;
    flex-direction: column;
    gap: 13px;
}

.footer-column h4 {
    font-size: 12px;
    letter-spacing: 2px;
    color: var(--yellow);
    font-weight: 700;
    margin-bottom: 9px;
}

.footer-column a,
.footer-column span {
    font-size: 14.5px;
    color: #c9c9c9;
    text-decoration: none;
    width: fit-content;
    transition: color .15s ease, transform .15s ease;
}

.footer-column a:hover {
    color: var(--yellow);
    transform: translateX(3px);
}

.footer-column span {
    color: #8a8a8a;
}

.footer-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    padding: 26px 0;
    border-top: 1px solid rgba(255,255,255,0.08);
}

.footer-bottom p {
    font-size: 13px;
    color: #7a7a7a;
    margin: 0;
}

@media (max-width: 900px) {

    .footer-top {
        grid-template-columns: 1fr;
        gap: 44px;
        padding-bottom: 50px;
    }

    .footer-links {
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

}

@media (max-width: 600px) {

    .site-footer {
        padding: 60px 20px 0;
    }

    .footer-links {
        grid-template-columns: 1fr 1fr;
        gap: 32px 20px;
    }

    .footer-bottom {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        text-align: left;
    }

}
/* ================================
   BOOKING PAGE ANIMATIONS
================================ */

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}


/* Hero */

.booking-hero h1 {
    animation: fadeUp 0.8s ease forwards;
}

.booking-hero p {
    opacity: 0;
    animation: fadeUp 0.8s ease 0.15s forwards;
}


/* Available rides */

.booking-section-header {
    opacity: 0;
    animation: fadeUp 0.8s ease 0.25s forwards;
}

.booking-card {
    opacity: 0;
    animation: fadeUp 0.7s ease forwards;
}

.booking-card:nth-child(1) {
    animation-delay: 0.3s;
}

.booking-card:nth-child(2) {
    animation-delay: 0.45s;
}

.booking-card:nth-child(3) {
    animation-delay: 0.6s;
}


/* Booking form */

.booking-form-wrapper {
    opacity: 0;
    animation: fadeUp 0.8s ease 0.3s forwards;
}
/* =========================================
   BOOKING HERO SLIDER
========================================= */

.booking-hero {
    position: relative;
    background: #0F0F0F;
    min-height: 680px;
    overflow: hidden;
}

.booking-slider {
    position: relative;
    width: 100%;
    min-height: 680px;
}

.booking-slide {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 1500px;
    width: 100%;
    margin: 0 auto;
    padding: 80px 70px 100px;
    opacity: 0;
    visibility: hidden;
    transform: translateX(40px);
    transition:
        opacity 0.7s ease,
        transform 0.7s ease,
        visibility 0.7s ease;
}

.booking-slide.active {
    opacity: 1;
    visibility: visible;
    transform: translateX(0);
}


/* ---------- TEXT ---------- */

.slide-content {
    position: relative;
    z-index: 3;
    width: 45%;
}

.slide-number {
    display: block;
    margin-bottom: 18px;
    color: #F5C518;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
}

.slide-category {
    display: inline-block;
    margin-bottom: 18px;
    color: #A8A8A8;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
}

.slide-content h1 {
    margin: 0;
    color: #FFFFFF;
    font-size: clamp(2.4rem, 4.5vw, 4.8rem);
    line-height: 0.94;
    letter-spacing: -2.5px;
    font-weight: 900;
}

.slide-content p {
    margin: 28px 0 0;
    max-width: 420px;
    color: #A8A8A8;
    font-size: 16px;
    line-height: 1.6;
}


/* ---------- BUTTON ---------- */

.slide-button {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    margin-top: 30px;
    padding: 14px 22px;
    background: #F5C518;
    color: #141414;
    border-radius: 100px;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease;
}

.slide-button span {
    font-size: 18px;
}

.slide-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(245, 197, 24, 0.2);
}


/* ---------- CAR ---------- */

.slide-car {
    position: relative;
    width: 55%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.slide-car::before {
    content: "";
    position: absolute;
    width: 420px;
    height: 420px;
    border-radius: 50%;
    background: rgba(245, 197, 24, 0.04);
    filter: blur(20px);
}

.slide-car img {
    position: relative;
    z-index: 2;
    width: min(100%, 700px);
    max-height: 390px;
    object-fit: contain;
    filter: drop-shadow(0 30px 35px rgba(0, 0, 0, 0.6));
    transform: translateX(30px) scale(0.96);
    transition:
        transform 0.9s cubic-bezier(0.22, 1, 0.36, 1);
}

.booking-slide.active .slide-car img {
    transform: translateX(0) scale(1);
}


/* ---------- CONTROLS ---------- */

.slider-controls {
    position: absolute;
    z-index: 10;
    bottom: 38px;
    left: 70px;
    display: flex;
    align-items: center;
    gap: 18px;
}

.slider-arrow {
    width: 42px;
    height: 42px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    background: transparent;
    color: #FFFFFF;
    font-size: 18px;
    cursor: pointer;
    transition:
        background 0.2s ease,
        color 0.2s ease,
        border-color 0.2s ease;
}

.slider-arrow:hover {
    background: #F5C518;
    color: #141414;
    border-color: #F5C518;
}

.slider-dots {
    display: flex;
    align-items: center;
    gap: 8px;
}

.slider-dot {
    width: 7px;
    height: 7px;
    padding: 0;
    border: none;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    cursor: pointer;
    transition:
        width 0.3s ease,
        background 0.3s ease;
}

.slider-dot.active {
    width: 26px;
    border-radius: 10px;
    background: #F5C518;
}
@media (max-width: 700px) {

    .booking-hero {
        min-height: 680px;
    }

    .booking-slider {
        min-height: 680px;
    }

    .booking-slide {
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 38px 20px 100px;
    }


    /* TEXT */

    .slide-content {
        width: 100%;
        z-index: 4;
    }

    .slide-number {
        margin-bottom: 14px;
    }

    .slide-category {
        margin-bottom: 14px;
    }

    .slide-content h1 {
        font-size: clamp(2.1rem, 8vw, 3.2rem);
        line-height: 0.96;
        letter-spacing: -1.5px;
    }

    .slide-content p {
        margin-top: 20px;
        font-size: 14px;
        max-width: 300px;
    }

    .slide-button {
        margin-top: 22px;
        padding: 13px 20px;
        font-size: 13px;
    }


    /* CAR */

    .slide-car {
        width: 100%;
        height: 240px;
        margin-top: 20px;
    }

    .slide-car::before {
        width: 280px;
        height: 280px;
    }

    .slide-car img {
        width: 100%;
        max-height: 230px;
        transform: translateY(20px) scale(0.94);
    }

    .booking-slide.active .slide-car img {
        transform: translateY(0) scale(1);
    }


    /* CONTROLS */

    .slider-controls {
        left: 20px;
        bottom: 25px;
    }

    .slider-arrow {
        width: 38px;
        height: 38px;
    }

}
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <div class="nav-wrap">
        <nav>
            <a href="/" class="logo">
                <img src="{{ asset('logo/logo.png') }}" alt="The Moving Company">
            </a>

            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/#cars">Cars</a></li>
                <li><a href="/#services">Services</a></li>
                <li><a href="/#about">About</a></li>
            </ul>

            <div class="nav-right">
                <a href="/book" class="nav-cta">Book Now</a>
                <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu" aria-expanded="false">
                    <span></span>
                </button>
            </div>
        </nav>

        <div class="mobile-panel" id="mobilePanel">
            <a href="/">Home</a>
            <a href="/#cars">Cars</a>
            <a href="/#services">Services</a>
            <a href="/#about">About</a>
            <a href="/book">Book Now</a>
        </div>
    </div>

    <!-- HERO -->
    <section class="booking-hero">

    <div class="booking-slider">

        <!-- SLIDE 1 -->
        <div class="booking-slide active">

            <div class="slide-content">

                <span class="slide-category">PREMIUM</span>

                <h1>YOUR RIDE.<br>YOUR WAY.</h1>

                <p>
                    Toyota Prado
                </p>

                <a href="#booking-form" class="slide-button"
                   onclick="document.getElementById('vehicle').value='Toyota Prado'">
                    Book This Ride
                    <span>↗</span>
                </a>
            </div>

            <div class="slide-car">
                <img src="{{ asset('images\toyotaprado.png') }}"
                     alt="Toyota Prado">
            </div>

        </div>


        <!-- SLIDE 2 -->
        <div class="booking-slide">

            <div class="slide-content">

                <span class="slide-category">PERFORMANCE</span>

                <h1>MADE FOR<br>THE OPEN ROAD.</h1>

                <p>
                    Lexus GX 460
                </p>

                <a href="#booking-form" class="slide-button"
                   onclick="document.getElementById('vehicle').value='Lexus GX 460'">
                    Book This Ride
                    <span>↗</span>
                </a>
            </div>

            <div class="slide-car">
                <img src="{{ asset('images\lexusgx460.png') }}"
                     alt="Lexus GX 460">
            </div>

        </div>


        <!-- SLIDE 3 -->
        <div class="booking-slide">

            <div class="slide-content">

                <span class="slide-category">EVERYDAY</span>

                <h1>SIMPLE.<br>COMFORTABLE.<br>RELIABLE.</h1>

                <p>
                    Lexus ES 350 
                </p>

                <a href="#booking-form" class="slide-button"
                   onclick="document.getElementById('vehicle').value='Lexus ES 350'">
                    Book This Ride
                    <span>↗</span>
                </a>
            </div>

            <div class="slide-car">
                <img src="{{ asset('images\lexuses350.png') }}"
                     alt="Lexus ES 350">
            </div>

        </div>


        <!-- SLIDER CONTROLS -->
        <div class="slider-controls">

            <button class="slider-arrow" id="prevSlide" type="button">
                ←
            </button>

            <div class="slider-dots">
                <button class="slider-dot active" data-slide="0" type="button"></button>
                <button class="slider-dot" data-slide="1" type="button"></button>
                <button class="slider-dot" data-slide="2" type="button"></button>
            </div>

            <button class="slider-arrow" id="nextSlide" type="button">
                →
            </button>

        </div>

    </div>

</section>

    <!-- AVAILABLE CARS -->
    <section class="booking-cars" id="available-rides">
        <div class="booking-container">
            <div class="booking-section-title">
                <p class="eyebrow">AVAILABLE RIDES</p>
                <h2>Choose Your Ride.</h2>
            </div>

            <div class="booking-grid">

                <div class="booking-card">
                    <div class="booking-card-image">
                        <img src="{{ asset('images\toyotaprado.png') }}" alt="Toyota Prado">
                    </div>
                    <span class="booking-label">PREMIUM</span>
                    <h3>Toyota Prado</h3>
                    <p>Comfort meets style.</p>
                    <div class="booking-price">
                        Price on request
                        <span class="price-note">Final rate confirmed at booking</span>
                    </div>
                    <a href="#booking-form" class="booking-button" onclick="document.getElementById('vehicle').value='Toyota Prado'">
                        Book This Ride
                    </a>
                </div>

                <div class="booking-card">
                    <div class="booking-card-image">
                        <img src="{{ asset('images\lexusgx460.png') }}" alt="Lexus GX 460">
                    </div>
                    <span class="booking-label">PERFORMANCE</span>
                    <h3>Lexus GX 460</h3>
                    <p>Made for the open road.</p>
                    <div class="booking-price">
                        Price on request
                        <span class="price-note">Final rate confirmed at booking</span>
                    </div>
                    <a href="#booking-form" class="booking-button" onclick="document.getElementById('vehicle').value='Lexus GS 360'">
                        Book This Ride
                    </a>
                </div>

                <div class="booking-card">
                    <div class="booking-card-image">
                        <img src="{{ asset('images\lexuses350.png') }}" alt="Lexus ES 350">
                    </div>
                    <span class="booking-label">EVERYDAY</span>
                    <h3>Lexus ES 350</h3>
                    <p>Simple. Comfortable. Reliable.</p>
                    <div class="booking-price">
                        Price on request
                        <span class="price-note">Final rate confirmed at booking</span>
                    </div>
                    <a href="#booking-form" class="booking-button" onclick="document.getElementById('vehicle').value='Lexus ES 360'">
                        Book This Ride
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- BOOKING FORM -->
    <section class="booking-form-section" id="booking-form">
        <div class="booking-section-title" style="max-width:640px; margin:0 auto 44px;">
            <p class="eyebrow">FINALIZE YOUR BOOKING</p>
            <h2>Confirm The Details.</h2>
        </div>

        <form class="booking-form" id="bookingForm" method="POST" action="https://the-moving-company.onrender.com/book">
    @csrf

    <div class="form-row">
        <div class="form-field">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="full_name" required>
        </div>

        <div class="form-field">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-field">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>
        </div>

        <div class="form-field">
            <label for="vehicle">Selected Vehicle</label>
            <select id="vehicle" name="vehicle" required>
                <option value="">Select a vehicle</option>
                <option value="Toyota Prado">Toyota Prado — ₦135,000/day</option>
                <option value="Lexus GX 460">Lexus GX 460 — ₦150,000/day</option>
                <option value="Lexus ES 350">Lexus ES 350 — ₦100,000/day</option>
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-field">
            <label for="pickup-date">Pickup Date</label>
            <input type="date" id="pickup-date" name="pickup_date" required>
        </div>

        <div class="form-field">
            <label for="return-date">Return Date</label>
            <input type="date" id="return-date" name="return_date" required>
        </div>
    </div>

    <div class="form-field full">
        <label for="pickup-location">Pickup Location</label>
        <input type="text" id="pickup-location" name="pickup_location" required>
    </div>

    <div class="form-field full">
        <label for="notes">Additional Notes</label>
        <textarea
            id="notes"
            name="notes"
            placeholder="Anything we should know?"
        ></textarea>
    </div>

    <div class="booking-total">
        <span>Estimated Total</span>
        <strong id="totalAmount">₦0</strong>
    </div>

    <button type="submit" class="form-submit">
        Continue to Payment
    </button>
</form>
    </section>

   <script>
    /* ---------- MOBILE MENU ---------- */

    const toggle = document.getElementById('menuToggle');
    const panel = document.getElementById('mobilePanel');

    toggle.addEventListener('click', () => {
        const isOpen = panel.classList.toggle('show');

        toggle.classList.toggle('open', isOpen);
        toggle.setAttribute('aria-expanded', isOpen);
    });


    /* ---------- BOOKING DATE ---------- */

    const pickupDate = document.getElementById('pickup-date');

    const today = new Date().toISOString().split('T')[0];

    pickupDate.min = today;

// ---------- BOOKING TOTAL ----------

const vehicleSelect = document.getElementById('vehicle');
const returnDate = document.getElementById('return-date');
const totalAmount = document.getElementById('totalAmount');

const vehicleRates = {
    'Toyota Prado': 135000,
    'Lexus GX 460': 150000,
    'Lexus ES 350': 100000
};

function calculateTotal() {
    const vehicle = vehicleSelect.value;
    const pickup = pickupDate.value;
    const returnValue = returnDate.value;

    if (!vehicle || !pickup || !returnValue) {
        totalAmount.textContent = '₦0';
        return;
    }

    const startDate = new Date(pickup);
    const endDate = new Date(returnValue);

    const difference = endDate - startDate;
    const days = Math.floor(
        difference / (1000 * 60 * 60 * 24)
    ) + 1;

    if (days < 1) {
        totalAmount.textContent = '₦0';
        return;
    }

    const total = vehicleRates[vehicle] * days;

    totalAmount.textContent = '₦' + total.toLocaleString('en-NG');
}

vehicleSelect.addEventListener('change', calculateTotal);
pickupDate.addEventListener('change', calculateTotal);
returnDate.addEventListener('change', calculateTotal);


// ---------- HERO SLIDER ----------

const slides = document.querySelectorAll('.booking-slide');
const dots = document.querySelectorAll('.slider-dot');
const nextButton = document.getElementById('nextSlide');
const prevButton = document.getElementById('prevSlide');

let currentSlide = 0;
let slideTimer;


function showSlide(index) {

    if (index >= slides.length) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = slides.length - 1;
    } else {
        currentSlide = index;
    }

    slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === currentSlide);
    });

    dots.forEach((dot, i) => {
        dot.classList.toggle('active', i === currentSlide);
    });
}


function nextSlide() {
    showSlide(currentSlide + 1);
}


function prevSlide() {
    showSlide(currentSlide - 1);
}


function startSlider() {

    clearInterval(slideTimer);

    slideTimer = setInterval(() => {
        nextSlide();
    }, 6500);
}


nextButton.addEventListener('click', () => {
    nextSlide();
    startSlider();
});


prevButton.addEventListener('click', () => {
    prevSlide();
    startSlider();
});


dots.forEach((dot, index) => {

    dot.addEventListener('click', () => {
        showSlide(index);
        startSlider();
    });

});


showSlide(0);
startSlider();
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
                    <a href="/#cars">Cars</a>
                    <a href="/#services">Services</a>
                    <a href="/#about">About</a>
                </div>

                <div class="footer-column">
                    <h4>Connect</h4>

                    <a href="/#how-it-works">How It Works</a>

                    <a href="https://www.instagram.com/themovingcompany__/"
                       target="_blank"
                       rel="noopener noreferrer">
                        Instagram
                    </a>

                    <a href="/book">Book Now</a>
                </div>

                <div class="footer-column">
                    <h4>Contact</h4>

                    <span>+234 907 279 3802</span>
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
</body>
</html>