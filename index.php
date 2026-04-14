<?php
require_once 'config.php';
$wishes = array_reverse(getWishes());
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Opening – Apotek Parahyangan Suite</title>
    <style>
        /* ── ARENA UNO FONT FACE ── */
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Regular.woff2') format('woff2'),url('Web-Fonts/ArenaUno-Regular.woff') format('woff'); font-weight:400; font-style:normal; font-display:swap; }
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Italic.woff2') format('woff2'),url('Web-Fonts/ArenaUno-Italic.woff') format('woff'); font-weight:400; font-style:italic; font-display:swap; }
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Light.woff2') format('woff2'),url('Web-Fonts/ArenaUno-Light.woff') format('woff'); font-weight:300; font-style:normal; font-display:swap; }
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Medium.woff2') format('woff2'),url('Web-Fonts/ArenaUno-Medium.woff') format('woff'); font-weight:500; font-style:normal; font-display:swap; }
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Bold.woff2') format('woff2'),url('Web-Fonts/ArenaUno-Bold.woff') format('woff'); font-weight:700; font-style:normal; font-display:swap; }
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Heavy.woff2') format('woff2'),url('Web-Fonts/ArenaUno-Heavy.woff') format('woff'); font-weight:900; font-style:normal; font-display:swap; }
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Thin.woff2') format('woff2'),url('Web-Fonts/ArenaUno-Thin.woff') format('woff'); font-weight:100; font-style:normal; font-display:swap; }
    </style>
    <style>
        :root {
            --primary: #A64786;
            --primary-dark: #8a3870;
            --primary-light: #f0d4e8;
            --primary-pale: #fdf4fa;
            --gold: #c9a96e;
            --dark: #2a1a2e;
            --text: #4a3a4e;
            --white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Arena Uno', sans-serif;
            background: var(--primary-pale);
            color: var(--text);
            overflow-x: hidden;
        }

        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            background: linear-gradient(160deg, #fdf4fa 0%, #f5e0f0 40%, #edd0e8 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 60px 20px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -80px; right: -80px;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(166,71,134,0.18) 0%, transparent 70%);
            border-radius: 50%;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -100px; left: -80px;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(166,71,134,0.12) 0%, transparent 70%);
            border-radius: 50%;
        }

        .petal {
            position: absolute;
            width: 12px; height: 18px;
            background: rgba(166,71,134,0.28);
            border-radius: 50% 0 50% 0;
            animation: fall linear infinite;
            pointer-events: none;
        }

        @keyframes fall {
            0%   { transform: translateY(-20px) rotate(0deg); opacity: 0.8; }
            100% { transform: translateY(110vh) rotate(360deg); opacity: 0; }
        }

        .badge {
            display: inline-block;
            background: var(--primary);
            color: #fff;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 3px;
            text-transform: uppercase;
            padding: 6px 20px;
            border-radius: 50px;
            margin-bottom: 24px;
            position: relative; z-index: 1;
        }

        .hero-title {
            font-family: 'Arena Uno', serif;
            font-size: clamp(2.4rem, 6vw, 4.2rem);
            font-weight: 900;
            color: var(--dark);
            line-height: 1.15;
            position: relative; z-index: 1;
        }

        .hero-title span {
            color: var(--primary);
            font-style: normal;
            font-weight: 900;
        }

        .hero-subtitle {
            font-family: 'Arena Uno', serif;
            font-size: clamp(1rem, 2.5vw, 1.4rem);
            font-weight: 300;
            color: var(--gold);
            letter-spacing: 2px;
            margin: 10px 0 32px;
            position: relative; z-index: 1;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0 auto 36px;
            width: fit-content;
            position: relative; z-index: 1;
        }

        .divider::before, .divider::after {
            content: '';
            width: 60px; height: 1px;
            background: var(--primary);
            opacity: 0.5;
        }

        .divider-icon { color: var(--primary); font-size: 1.1rem; }

        /* ── INFO CARDS ── */
        .info-grid {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            justify-content: center;
            position: relative; z-index: 1;
            margin-bottom: 40px;
        }

        .info-card {
            background: rgba(255,255,255,0.75);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(166,71,134,0.25);
            border-radius: 16px;
            padding: 20px 28px;
            min-width: 180px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(166,71,134,0.1);
        }

        .info-card .icon { font-size: 1.6rem; margin-bottom: 8px; }
        .info-card .label { font-size: 0.68rem; letter-spacing: 2px; text-transform: uppercase; color: var(--primary); font-weight: 600; margin-bottom: 4px; }
        .info-card .value { font-size: 0.9rem; font-weight: 500; color: var(--dark); line-height: 1.4; }

        .cta-btn {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            padding: 14px 40px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-decoration: none;
            box-shadow: 0 6px 24px rgba(166,71,134,0.4);
            transition: transform 0.2s, box-shadow 0.2s;
            position: relative; z-index: 1;
        }

        .cta-btn:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(166,71,134,0.5); }

        /* ── SECTIONS ── */
        section { padding: 80px 20px; }

        .container { max-width: 860px; margin: 0 auto; }

        .section-label {
            text-align: center;
            font-size: 0.7rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .section-title {
            font-family: 'Arena Uno', serif;
            font-size: clamp(1.6rem, 4vw, 2.4rem);
            font-weight: 700;
            color: var(--dark);
            text-align: center;
            margin-bottom: 48px;
        }

        /* ── ABOUT ── */
        .about { background: #fff; }

        .about-text {
            text-align: center;
            font-size: 1rem;
            line-height: 1.9;
            color: var(--text);
            max-width: 640px;
            margin: 0 auto 40px;
        }

        .highlight-box {
            background: var(--primary-pale);
            border-left: 4px solid var(--primary);
            border-radius: 0 12px 12px 0;
            padding: 20px 24px;
            font-style: italic;
            color: var(--dark);
            font-family: 'Arena Uno', serif;
            font-weight: 300;
            font-size: 1.05rem;
            text-align: center;
            max-width: 560px;
            margin: 0 auto;
        }

        /* ── MAP ── */
        .map-section { background: var(--primary-pale); }

        .map-wrapper {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(166,71,134,0.18);
            border: 2px solid rgba(166,71,134,0.2);
        }

        .map-wrapper iframe { display: block; width: 100%; height: 380px; border: none; }

        .map-address {
            background: #fff;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .map-address .pin { font-size: 1.4rem; }
        .map-address p { font-size: 0.88rem; line-height: 1.6; color: var(--text); }
        .map-address strong { color: var(--dark); }

        /* ── WISH FORM ── */
        .wish-section { background: #fff; }

        /* ── RSVP ── */
        .rsvp-section { background: var(--primary-pale); }

        .rsvp-form {
            background: #fff;
            border: 1px solid rgba(166,71,134,0.2);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(166,71,134,0.08);
            max-width: 560px;
            margin: 0 auto;
        }

        .rsvp-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 20px;
        }

        .rsvp-option input[type=radio] { display: none; }

        .rsvp-option label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 20px 12px;
            border: 2px solid rgba(166,71,134,0.2);
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.88rem;
            font-weight: 500;
            color: var(--text);
            text-align: center;
        }

        .rsvp-option label .opt-icon { font-size: 1.8rem; }

        .rsvp-option input[type=radio]:checked + label {
            border-color: var(--primary);
            background: var(--primary-pale);
            color: var(--primary);
            box-shadow: 0 4px 16px rgba(166,71,134,0.18);
        }

        .guests-field { display: none; }
        .guests-field.visible { display: block; }

        .wish-form {
            background: linear-gradient(135deg, #fdf4fa, #f5e0f0);
            border: 1px solid rgba(166,71,134,0.25);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(166,71,134,0.1);
            max-width: 600px;
            margin: 0 auto 60px;
        }

        .form-group { margin-bottom: 20px; }

        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--primary-dark);
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 14px 18px;
            border: 1.5px solid rgba(166,71,134,0.3);
            border-radius: 12px;
            font-family: 'Arena Uno', sans-serif;
            font-size: 0.92rem;
            color: var(--dark);
            background: rgba(255,255,255,0.85);
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            resize: none;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(166,71,134,0.15);
        }

        .form-group textarea { height: 110px; }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            border: none;
            border-radius: 12px;
            font-family: 'Arena Uno', sans-serif;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            letter-spacing: 1px;
            box-shadow: 0 6px 20px rgba(166,71,134,0.35);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .submit-btn:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(166,71,134,0.45); }
        .submit-btn:disabled { opacity: 0.6; cursor: not-allowed; transform: none; }

        #form-msg {
            text-align: center;
            margin-top: 14px;
            font-size: 0.88rem;
            font-weight: 500;
            min-height: 20px;
        }

        .msg-success { color: #2e7d32; }
        .msg-error   { color: #c62828; }

        /* ── WISH WALL ── */
        .wish-wall { margin-top: 20px; }

        .wish-wall-title {
            font-family: 'Arena Uno', serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark);
            text-align: center;
            margin-bottom: 28px;
        }

        .wish-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 16px;
            max-height: 480px;
            overflow-y: auto;
            padding-right: 4px;
        }

        .wish-list::-webkit-scrollbar { width: 5px; }
        .wish-list::-webkit-scrollbar-track { background: var(--primary-pale); border-radius: 10px; }
        .wish-list::-webkit-scrollbar-thumb { background: var(--primary); border-radius: 10px; }

        .wish-card {
            background: linear-gradient(135deg, #fdf4fa, #fff);
            border: 1px solid rgba(166,71,134,0.2);
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 2px 12px rgba(166,71,134,0.07);
            animation: fadeUp 0.4s ease;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .wish-card .wish-name {
            font-weight: 600;
            color: var(--primary-dark);
            font-size: 0.92rem;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .wish-card .wish-name::before { content: '✦'; font-size: 0.7rem; color: var(--primary); }

        .wish-card .wish-msg {
            font-size: 0.85rem;
            color: var(--text);
            line-height: 1.65;
            font-style: italic;
        }

        .wish-card .wish-time {
            font-size: 0.72rem;
            color: #bbb;
            margin-top: 10px;
        }

        .no-wishes {
            text-align: center;
            color: #ccc;
            font-style: italic;
            font-size: 0.9rem;
            padding: 30px;
            grid-column: 1/-1;
        }

        /* ── FOOTER ── */
        footer {
            background: var(--dark);
            color: rgba(255,255,255,0.6);
            text-align: center;
            padding: 32px 20px;
            font-size: 0.82rem;
            line-height: 1.8;
        }

        footer strong { color: var(--primary); }

        /* ── COUNTDOWN ── */
        .countdown-wrap {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
            margin: 36px 0;
        }

        .countdown-box {
            background: rgba(255,255,255,0.8);
            border: 1px solid rgba(166,71,134,0.25);
            border-radius: 14px;
            padding: 16px 22px;
            text-align: center;
            min-width: 80px;
            box-shadow: 0 4px 16px rgba(166,71,134,0.08);
        }

        .countdown-box .num {
            font-family: 'Arena Uno', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            line-height: 1;
        }

        .countdown-box .lbl {
            font-size: 0.65rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--text);
            margin-top: 4px;
        }

        /* ── DECORATIVE ELEMENTS ── */
        .deco-ribbon {
            width: 100%;
            display: flex;
            justify-content: center;
            overflow: hidden;
            line-height: 0;
            pointer-events: none;
        }

        .deco-ribbon img {
            width: 100%;
            max-width: 860px;
            height: auto;
            display: block;
        }

        .deco-ribbon-top {
            margin-bottom: -2px;
        }

        .deco-ribbon-bottom {
            margin-top: -2px;
            transform: scaleY(-1);
        }

        /* Amplop dekoratif di section ucapan */
        .amplop-deco {
            display: flex;
            justify-content: center;
            margin-bottom: 32px;
        }

        .amplop-deco img {
            width: clamp(120px, 25vw, 200px);
            height: auto;
            filter: drop-shadow(0 8px 24px rgba(166,71,134,0.25));
            animation: floatAnim 4s ease-in-out infinite;
        }

        @keyframes floatAnim {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-10px); }
        }

        /* Pita pojok kanan atas hero */
        .hero-ribbon-corner {
            position: absolute;
            top: 0; right: 0;
            width: clamp(100px, 20vw, 180px);
            height: auto;
            z-index: 2;
            pointer-events: none;
            opacity: 0.85;
        }

        /* Pita pojok kiri bawah hero */
        .hero-ribbon-corner-left {
            position: absolute;
            bottom: 0; left: 0;
            width: clamp(80px, 16vw, 150px);
            height: auto;
            z-index: 2;
            pointer-events: none;
            opacity: 0.7;
            transform: rotate(180deg);
        }

        /* Separator pita antar section */
        .section-ribbon-sep {
            width: 100%;
            background: #fff;
            display: flex;
            justify-content: center;
            padding: 0;
            overflow: hidden;
        }

        .section-ribbon-sep img {
            width: clamp(200px, 60vw, 480px);
            height: auto;
            opacity: 0.6;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 600px) {
            .wish-form { padding: 28px 20px; }
            .rsvp-form { padding: 28px 20px; }
            .info-card { min-width: 140px; padding: 16px 18px; }
            .hero-ribbon-corner { width: 90px; }
            .hero-ribbon-corner-left { width: 70px; }
        }
    </style>
</head>
<body>

<!-- Falling petals -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const hero = document.querySelector('.hero');
        for (let i = 0; i < 18; i++) {
            const p = document.createElement('div');
            p.className = 'petal';
            p.style.cssText = `
                left: ${Math.random() * 100}%;
                top: ${Math.random() * -20}%;
                animation-duration: ${5 + Math.random() * 8}s;
                animation-delay: ${Math.random() * 6}s;
                opacity: ${0.3 + Math.random() * 0.5};
                transform: scale(${0.6 + Math.random()});
            `;
            hero.appendChild(p);
        }
    });
</script>

<!-- HERO -->
<section class="hero">
    <!-- Pita dekoratif pojok -->
    <img src="pita.png" alt="" class="hero-ribbon-corner" aria-hidden="true">
    <img src="pita.png" alt="" class="hero-ribbon-corner-left" aria-hidden="true">

    <img src="LOGO-APOTEK-PARAHYANGAN.png" alt="Logo Apotek Parahyangan Suite" style="width: 200px; height: auto; margin-bottom: 28px; position: relative; z-index: 1; filter: drop-shadow(0 6px 16px rgba(166,71,134,0.25));">
    <div class="badge">✦ Undangan ✦</div>
    <h1 class="hero-title">Grand Opening<br><span>Apotek Parahyangan Suite</span></h1>
    <p class="hero-subtitle">— Jadilah Bagian dari Momen Bersejarah Ini —</p>

    <div class="divider">
        <span class="divider-icon">❀</span>
    </div>

    <div class="info-grid">
        <div class="info-card">
            <div class="icon">🗓</div>
            <div class="label">Hari / Tanggal</div>
            <div class="value">Minggu<br>19 April 2026</div>
        </div>
        <div class="info-card">
            <div class="icon">⏰</div>
            <div class="label">Waktu</div>
            <div class="value">Pukul 08.00 WIB<br>– selesai</div>
        </div>
        <div class="info-card">
            <div class="icon">📍</div>
            <div class="label">Lokasi</div>
            <div class="value">Parahyangan Suites Clinic<br>Gedung SOHO PVJ</div>
        </div>
    </div>

    <!-- Countdown -->
    <div class="countdown-wrap" id="countdown">
        <div class="countdown-box"><div class="num" id="cd-days">--</div><div class="lbl">Hari</div></div>
        <div class="countdown-box"><div class="num" id="cd-hours">--</div><div class="lbl">Jam</div></div>
        <div class="countdown-box"><div class="num" id="cd-mins">--</div><div class="lbl">Menit</div></div>
        <div class="countdown-box"><div class="num" id="cd-secs">--</div><div class="lbl">Detik</div></div>
    </div>

    <a href="#ucapan" class="cta-btn">Kirim Ucapan ✦</a>
</section>

<!-- Ribbon separator -->
<div class="section-ribbon-sep">
    <img src="pita.png" alt="" aria-hidden="true">
</div>

<!-- ABOUT -->
<section class="about">
    <div class="container">
        <p class="section-label">Tentang Acara</p>
        <h2 class="section-title">Kami Mengundang Kehadiran Anda</h2>
        <p class="about-text">
            Dengan penuh rasa syukur, kami dengan bangga mengundang Anda untuk hadir dan merayakan momen istimewa bersama kami.<br><br>
            Apotek Parahyangan Suite hadir sebagai wujud komitmen kami dalam menghadirkan pengalaman farmasi yang lebih dari sekadar layanan — sebuah perpaduan antara Care, Beauty, dan Science yang dirancang untuk mendukung kesehatan dan kepercayaan diri secara menyeluruh.<br><br>
            Kami percaya bahwa setiap individu berhak mendapatkan pelayanan yang tidak hanya profesional dan terpercaya, tetapi juga personal, nyaman, dan berorientasi pada kualitas hidup yang lebih baik.
        </p>
        <div class="highlight-box">
            Kehadiran Anda adalah kehormatan bagi kami. Mari bersama-sama merayakan langkah awal menuju pengalaman kesehatan dan kecantikan yang lebih terintegrasi, personal, dan bermakna.
        </div>
    </div>
</section>

<!-- MAP -->
<section class="map-section">
    <div class="container">
        <p class="section-label">Lokasi</p>
        <h2 class="section-title">Kami Menunggu Anda di Sini</h2>
        <div class="map-wrapper">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.5!2d107.5897!3d-6.8897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7a9b1234567%3A0xabcdef1234567890!2sJl.%20Karang%20Tinggal%20No.2%2C%20Cipedes%2C%20Sukajadi%2C%20Bandung!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <div class="map-address">
                <span class="pin">📍</span>
                <p><strong>Parahyangan Suites Clinic</strong><br>
                Jl. Karang Tinggal No.2, Cipedes, Kec. Sukajadi,<br>
                Kota Bandung – Gedung SOHO PVJ</p>
            </div>
        </div>
    </div>
</section>

<!-- Ribbon separator -->
<div class="section-ribbon-sep">
    <img src="pita.png" alt="" aria-hidden="true">
</div>

<!-- RSVP -->
<section class="rsvp-section" id="rsvp">
    <div class="container">
        <p class="section-label">Konfirmasi Kehadiran</p>
        <h2 class="section-title">Apakah Anda Akan Hadir?</h2>

        <div class="rsvp-form">
            <form id="rsvpForm">
                <div class="form-group">
                    <label for="rsvp-name">Nama Lengkap</label>
                    <input type="text" id="rsvp-name" name="name" placeholder="Masukkan nama Anda..." maxlength="100" required>
                </div>
                <div class="form-group">
                    <label for="rsvp-phone">No. HP / WhatsApp <span style="font-weight:300;opacity:0.6;">(opsional)</span></label>
                    <input type="tel" id="rsvp-phone" name="phone" placeholder="Contoh: 08123456789" maxlength="20">
                </div>
                <div class="form-group">
                    <label>Konfirmasi Kehadiran</label>
                    <div class="rsvp-options">
                        <div class="rsvp-option">
                            <input type="radio" id="rsvp-hadir" name="attendance" value="hadir" required>
                            <label for="rsvp-hadir">
                                <span class="opt-icon">🎉</span>
                                Ya, saya akan hadir
                            </label>
                        </div>
                        <div class="rsvp-option">
                            <input type="radio" id="rsvp-tidak" name="attendance" value="tidak">
                            <label for="rsvp-tidak">
                                <span class="opt-icon">🙏</span>
                                Maaf, tidak bisa hadir
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group guests-field" id="guestsField">
                    <label for="rsvp-guests">Jumlah Tamu yang Dibawa</label>
                    <input type="number" id="rsvp-guests" name="guests" min="1" max="20" value="1">
                </div>
                <button type="submit" class="submit-btn" id="rsvpBtn">✦ Kirim Konfirmasi</button>
                <div id="rsvp-msg"></div>
            </form>
        </div>
    </div>
</section>

<!-- Ribbon separator -->
<div class="section-ribbon-sep">
    <img src="pita.png" alt="" aria-hidden="true">
</div>

<!-- WISH FORM -->
<section class="wish-section" id="ucapan">
    <div class="container">
        <p class="section-label">Ucapan & Doa</p>
        <h2 class="section-title">Titipkan Doa & Ucapan Terbaik Anda</h2>

        <!-- Amplop dekoratif -->
        <div class="amplop-deco">
            <img src="amplop.png" alt="Amplop Ucapan">
        </div>

        <div class="wish-form">
            <form id="wishForm">
                <div class="form-group">
                    <label for="name">Nama Anda</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama Anda..." maxlength="100" required>
                </div>
                <div class="form-group">
                    <label for="message">Ucapan</label>
                    <textarea id="message" name="message" placeholder="Tuliskan ucapan dan doa tulus Anda untuk kami..." maxlength="500" required></textarea>
                </div>
                <button type="submit" class="submit-btn" id="submitBtn">✦ Kirim Ucapan & Doa</button>
                <div id="form-msg"></div>
            </form>
        </div>

        <!-- Wish Wall -->
        <div class="wish-wall">
            <p class="wish-wall-title">❀ Dinding Doa & Ucapan ❀</p>
            <div class="wish-list" id="wishList">
                <?php if (empty($wishes)): ?>
                    <div class="no-wishes">Belum ada ucapan. Jadilah yang pertama memberikan doa! 🌸</div>
                <?php else: ?>
                    <?php foreach ($wishes as $w): ?>
                    <div class="wish-card">
                        <div class="wish-name"><?= $w['name'] ?></div>
                        <div class="wish-msg">"<?= $w['message'] ?>"</div>
                        <div class="wish-time"><?= $w['time'] ?></div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <p><strong>Apotek Parahyangan Suite</strong></p>
    <p>Jl. Karang Tinggal No.2, Cipedes, Kec. Sukajadi, Kota Bandung</p>
    <p>Gedung SOHO PVJ</p>
    <br>
    <p style="font-size:0.75rem; opacity:0.5;">Kami berterima kasih atas kehadiran dan doa Anda. Sampai jumpa di hari istimewa kami.</p>
    <br>
    <p style="font-size:0.72rem; opacity:0.4;">© 2026 Apotek Parahyangan Suite. All rights reserved.</p>
</footer>

<script>
// ── Countdown ──
(function() {
    const target = new Date('2026-04-19T08:00:00+07:00').getTime();
    function tick() {
        const now = Date.now();
        const diff = target - now;
        if (diff <= 0) {
            document.getElementById('countdown').innerHTML = '<div style="color:var(--primary);font-family:\'Arena Uno\',sans-serif;font-size:1.4rem;font-weight:700;">🎉 Acara Sedang Berlangsung!</div>';
            return;
        }
        const d = Math.floor(diff / 86400000);
        const h = Math.floor((diff % 86400000) / 3600000);
        const m = Math.floor((diff % 3600000) / 60000);
        const s = Math.floor((diff % 60000) / 1000);
        document.getElementById('cd-days').textContent  = String(d).padStart(2,'0');
        document.getElementById('cd-hours').textContent = String(h).padStart(2,'0');
        document.getElementById('cd-mins').textContent  = String(m).padStart(2,'0');
        document.getElementById('cd-secs').textContent  = String(s).padStart(2,'0');
    }
    tick();
    setInterval(tick, 1000);
})();

// ── Wish Form Submit ──
document.getElementById('wishForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = document.getElementById('submitBtn');
    const msg = document.getElementById('form-msg');
    const name = document.getElementById('name').value.trim();
    const message = document.getElementById('message').value.trim();

    btn.disabled = true;
    btn.textContent = 'Mengirim...';
    msg.textContent = '';
    msg.className = '';

    try {
        const fd = new FormData();
        fd.append('name', name);
        fd.append('message', message);

        const res = await fetch('submit.php', { method: 'POST', body: fd });
        const data = await res.json();

        if (data.success) {
            msg.textContent = '🌸 ' + data.message;
            msg.className = 'msg-success';
            document.getElementById('wishForm').reset();

            // Prepend new card to wish list
            const list = document.getElementById('wishList');
            const noWish = list.querySelector('.no-wishes');
            if (noWish) noWish.remove();

            const now = new Date();
            const timeStr = now.toLocaleDateString('id-ID', {day:'2-digit',month:'short',year:'numeric'}) + ', ' +
                            now.toLocaleTimeString('id-ID', {hour:'2-digit',minute:'2-digit'});

            const card = document.createElement('div');
            card.className = 'wish-card';
            card.innerHTML = `
                <div class="wish-name">${escHtml(name)}</div>
                <div class="wish-msg">"${escHtml(message)}"</div>
                <div class="wish-time">${timeStr}</div>
            `;
            list.prepend(card);
        } else {
            msg.textContent = '⚠ ' + data.message;
            msg.className = 'msg-error';
        }
    } catch {
        msg.textContent = '⚠ Terjadi kesalahan. Coba lagi.';
        msg.className = 'msg-error';
    }

    btn.disabled = false;
    btn.textContent = '✦ Kirim Ucapan & Doa';
});

function escHtml(str) {
    return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

// ── Smooth scroll ──
document.querySelector('.cta-btn').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('ucapan').scrollIntoView({ behavior: 'smooth' });
});

// ── RSVP Form ──
const hadirRadio = document.getElementById('rsvp-hadir');
const tidakRadio = document.getElementById('rsvp-tidak');
const guestsField = document.getElementById('guestsField');

[hadirRadio, tidakRadio].forEach(r => {
    r.addEventListener('change', () => {
        guestsField.classList.toggle('visible', hadirRadio.checked);
    });
});

document.getElementById('rsvpForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = document.getElementById('rsvpBtn');
    const msg = document.getElementById('rsvp-msg');

    btn.disabled = true;
    btn.textContent = 'Mengirim...';
    msg.textContent = '';
    msg.className = '';

    try {
        const fd = new FormData(this);
        const res = await fetch('rsvp.php', { method: 'POST', body: fd });
        const data = await res.json();

        msg.textContent = data.success ? '✓ ' + data.message : '⚠ ' + data.message;
        msg.className = data.success ? 'msg-success' : 'msg-error';
        if (data.success) this.reset();
    } catch {
        msg.textContent = '⚠ Terjadi kesalahan. Coba lagi.';
        msg.className = 'msg-error';
    }

    btn.disabled = false;
    btn.textContent = '✦ Kirim Konfirmasi';
});
</script>

</body>
</html>
