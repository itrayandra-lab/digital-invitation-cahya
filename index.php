<?php
require_once 'config.php';

$wishes = array_reverse(getWishes());

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function asset(string $path): string
{
    return str_replace(' ', '%20', $path);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light only">
    <meta name="format-detection" content="telephone=no">
    <title>25 | 50 - A Journey of Learning, Beauty &amp; Life</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@0,300;0,400;0,500;0,700;1,400;1,500&display=swap');

        @font-face {
            font-family: 'Arena Uno';
            src: url('Web-Fonts/ArenaUno-Thin.woff2') format('woff2'),
                 url('Web-Fonts/ArenaUno-Thin.woff') format('woff');
            font-weight: 100;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Arena Uno';
            src: url('Web-Fonts/ArenaUno-ThinItalic.woff2') format('woff2'),
                 url('Web-Fonts/ArenaUno-ThinItalic.woff') format('woff');
            font-weight: 100;
            font-style: italic;
            font-display: swap;
        }
        @font-face {
            font-family: 'Arena Uno';
            src: url('Web-Fonts/ArenaUno-Light.woff2') format('woff2'),
                 url('Web-Fonts/ArenaUno-Light.woff') format('woff');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Arena Uno';
            src: url('Web-Fonts/ArenaUno-LightItalic.woff2') format('woff2'),
                 url('Web-Fonts/ArenaUno-LightItalic.woff') format('woff');
            font-weight: 300;
            font-style: italic;
            font-display: swap;
        }
        @font-face {
            font-family: 'Arena Uno';
            src: url('Web-Fonts/ArenaUno-Regular.woff2') format('woff2'),
                 url('Web-Fonts/ArenaUno-Regular.woff') format('woff');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Arena Uno';
            src: url('Web-Fonts/ArenaUno-Italic.woff2') format('woff2'),
                 url('Web-Fonts/ArenaUno-Italic.woff') format('woff');
            font-weight: 400;
            font-style: italic;
            font-display: swap;
        }
        @font-face {
            font-family: 'Arena Uno';
            src: url('Web-Fonts/ArenaUno-Medium.woff2') format('woff2'),
                 url('Web-Fonts/ArenaUno-Medium.woff') format('woff');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Arena Uno';
            src: url('Web-Fonts/ArenaUno-MediumItalic.woff2') format('woff2'),
                 url('Web-Fonts/ArenaUno-MediumItalic.woff') format('woff');
            font-weight: 500;
            font-style: italic;
            font-display: swap;
        }
        @font-face {
            font-family: 'Arena Uno';
            src: url('Web-Fonts/ArenaUno-Bold.woff2') format('woff2'),
                 url('Web-Fonts/ArenaUno-Bold.woff') format('woff');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Arena Uno';
            src: url('Web-Fonts/ArenaUno-BoldItalic.woff2') format('woff2'),
                 url('Web-Fonts/ArenaUno-BoldItalic.woff') format('woff');
            font-weight: 700;
            font-style: italic;
            font-display: swap;
        }
        @font-face {
            font-family: 'Arena Uno';
            src: url('Web-Fonts/ArenaUno-Heavy.woff2') format('woff2'),
                 url('Web-Fonts/ArenaUno-Heavy.woff') format('woff');
            font-weight: 900;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Arena Uno';
            src: url('Web-Fonts/ArenaUno-HeavyItalic.woff2') format('woff2'),
                 url('Web-Fonts/ArenaUno-HeavyItalic.woff') format('woff');
            font-weight: 900;
            font-style: italic;
            font-display: swap;
        }

        :root {
            --sage-900: #6d7560;
            --sage-800: #7b836c;
            --sage-700: #8d957c;
            --sage-500: #aab091;
            --sage-300: #d6dbc8;
            --sage-150: #edf0e6;
            --paper: #f7f2e8;
            --paper-2: #fcfaf5;
            --paper-3: #f2ebde;
            --ink: #3f372d;
            --muted: #6e6658;
            --line: rgba(70, 61, 50, 0.10);
            --line-2: rgba(109, 117, 96, 0.18);
            --shadow: 0 22px 58px rgba(52, 43, 35, 0.12);
            --shadow-soft: 0 12px 30px rgba(52, 43, 35, 0.08);
            --radius-xl: 30px;
            --radius-lg: 24px;
            --radius-md: 18px;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            color: var(--ink);
            font-family: 'Alegreya Sans', 'Segoe UI', system-ui, sans-serif;
            font-weight: 400;
            line-height: 1.65;
            overflow-x: hidden;
            background:
                radial-gradient(circle at 14% 8%, rgba(255,255,255,0.28), transparent 20%),
                radial-gradient(circle at 86% 16%, rgba(255,255,255,0.18), transparent 18%),
                linear-gradient(180deg, #b9bea8 0 28%, #f8f4eb 28% 100%);
        }

        body::before,
        body::after {
            content: '';
            position: fixed;
            inset: auto;
            pointer-events: none;
            z-index: 0;
            background-repeat: no-repeat;
            background-size: contain;
            opacity: 0.10;
            filter: saturate(0.8);
        }

        body::before {
            top: 16px;
            left: -32px;
            width: 220px;
            height: 220px;
            background-image: url('<?= asset("assets/background-decorative/stamp.png") ?>');
            transform: rotate(-11deg);
        }

        body::after {
            right: -38px;
            bottom: -16px;
            width: 280px;
            height: 280px;
            background-image: url('<?= asset("assets/background-decorative/vintage stamp.png") ?>');
            transform: rotate(12deg);
        }

        img {
            display: block;
            max-width: 100%;
        }

        a {
            color: inherit;
        }

        .shell {
            position: relative;
            z-index: 1;
        }

        .container {
            width: min(1160px, calc(100% - 32px));
            margin: 0 auto;
        }

        .section {
            position: relative;
            padding: 96px 0;
        }

        .section.section--soft {
            background:
                linear-gradient(180deg, rgba(255,255,255,0.46), rgba(245,238,226,0.60)),
                linear-gradient(180deg, rgba(171,181,148,0.12), rgba(171,181,148,0.04));
        }

        .section.section--sage {
            background:
                linear-gradient(180deg, rgba(180,188,164,0.24), rgba(245,238,226,0.48)),
                linear-gradient(180deg, rgba(255,255,255,0.18), rgba(255,255,255,0.02));
        }

        .section.section--cream {
            background:
                linear-gradient(180deg, rgba(251,248,242,0.84), rgba(246,240,230,0.96)),
                linear-gradient(180deg, rgba(166,176,145,0.10), rgba(166,176,145,0.03));
        }

        .section.section--cream:nth-of-type(even) {
            background:
                linear-gradient(180deg, rgba(247,242,232,0.94), rgba(242,235,222,0.98)),
                linear-gradient(180deg, rgba(166,176,145,0.08), rgba(166,176,145,0.02));
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 7px 13px;
            border-radius: 999px;
            border: 1px solid rgba(109,117,96,0.16);
            background: rgba(255,255,255,0.55);
            color: var(--sage-800);
            letter-spacing: 0.22em;
            font-size: 0.64rem;
            text-transform: uppercase;
            font-weight: 700;
        }

        .section-kicker {
            margin: 0 0 10px;
            text-align: center;
            color: var(--sage-800);
            font-size: 0.68rem;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            font-weight: 700;
        }

        .section-title {
            margin: 0 auto 14px;
            max-width: 900px;
            text-align: center;
            font-size: clamp(2rem, 4.6vw, 3.25rem);
            line-height: 1.06;
            letter-spacing: -0.05em;
            color: var(--ink);
            font-weight: 700;
        }

        .section-copy {
            margin: 0 auto;
            max-width: 760px;
            text-align: center;
            color: var(--muted);
            font-size: 0.98rem;
            line-height: 1.95;
            font-weight: 300;
        }

        .section-shell {
            position: relative;
        }

        .section-shell::before {
            content: '';
            position: absolute;
            inset: 0;
            pointer-events: none;
            background:
                radial-gradient(circle at 50% 0%, rgba(255,255,255,0.20), transparent 34%),
                radial-gradient(circle at 18% 18%, rgba(155,165,137,0.06), transparent 18%);
            opacity: 0.65;
        }

        .card {
            position: relative;
            background: linear-gradient(180deg, rgba(255,253,248,0.98), rgba(247,240,229,0.98));
            border: 1px solid rgba(70, 61, 50, 0.07);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-soft);
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 10% 14%, rgba(255,255,255,0.55) 0 1px, transparent 1px 100%),
                radial-gradient(circle at 90% 18%, rgba(255,255,255,0.35) 0 1px, transparent 1px 100%),
                linear-gradient(135deg, rgba(255,255,255,0.34), rgba(255,255,255,0));
            pointer-events: none;
            mix-blend-mode: multiply;
            opacity: 0.7;
        }

        .card-pad {
            position: relative;
            z-index: 1;
            padding: 20px;
        }

        .hero {
            min-height: 92vh;
            display: grid;
            align-items: center;
            padding: 26px 0 34px;
            position: relative;
        }

        .hero-card {
            width: min(1080px, calc(100% - 24px));
            margin: 0 auto;
            padding: clamp(20px, 3.5vw, 34px);
            display: grid;
            grid-template-columns: minmax(0, 1.02fr) minmax(300px, 0.98fr);
            gap: 18px;
            align-items: center;
            text-align: center;
            border-radius: 34px;
            background:
                radial-gradient(circle at 50% 0%, rgba(255,255,255,0.60), transparent 38%),
                radial-gradient(circle at 10% 18%, rgba(174,184,150,0.18), transparent 18%),
                linear-gradient(180deg, rgba(255,253,247,0.98), rgba(245,239,229,0.98));
        }

        .hero-card::after {
            content: '';
            position: absolute;
            inset: 16px;
            border-radius: 26px;
            border: 1px dashed rgba(109,117,96,0.16);
            pointer-events: none;
        }

        .hero-content,
        .hero-visual {
            position: relative;
            z-index: 1;
        }

        .hero-brand {
            display: grid;
            justify-items: center;
            gap: 6px;
        }

        .hero-number {
            margin: 8px 0 0;
            font-size: clamp(4.3rem, 11vw, 7.2rem);
            line-height: 0.88;
            letter-spacing: 0.02em;
            color: var(--sage-800);
            font-weight: 700;
        }

        .hero-tagline {
            margin: 4px 0 0;
            color: var(--sage-800);
            font-size: clamp(0.96rem, 2.05vw, 1.22rem);
            line-height: 1.18;
            font-weight: 400;
        }

        .hero-script {
            margin: 4px 0 0;
            font-size: clamp(1.02rem, 2vw, 1.38rem);
            line-height: 1.18;
            color: var(--ink);
            font-style: italic;
            font-weight: 400;
        }

        .hero-copy {
            margin: 12px auto 0;
            max-width: 740px;
            color: var(--muted);
            font-size: 0.92rem;
            line-height: 1.76;
            font-weight: 300;
        }

        .hero-actions {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 16px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 0;
            cursor: pointer;
            text-decoration: none;
            border-radius: 999px;
            padding: 12px 18px;
            font: inherit;
            font-weight: 700;
            transition: transform 180ms ease, box-shadow 180ms ease, opacity 180ms ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(0);
            box-shadow: 0 8px 16px rgba(111,119,95,0.16);
        }

        .btn-primary {
            color: #fff;
            background: linear-gradient(135deg, #8b9377, #6f775f);
            box-shadow: 0 12px 24px rgba(111,119,95,0.22);
        }

        .btn-secondary {
            color: var(--sage-800);
            background: rgba(255,255,255,0.82);
            border: 1px solid rgba(109,117,96,0.16);
        }

        .hero-note {
            margin-top: 12px;
            color: var(--sage-800);
            font-size: 0.82rem;
            font-weight: 700;
        }

        .hero-visual {
            display: grid;
            gap: 14px;
            align-content: center;
            justify-items: center;
        }

        .hero-frame {
            width: min(100%, 420px);
            position: relative;
            border-radius: 28px;
            padding: 16px;
            background: rgba(255,255,255,0.52);
            box-shadow: 0 16px 34px rgba(52,43,35,0.10);
            transform: rotate(1deg);
        }

        .hero-frame::before {
            content: '';
            position: absolute;
            inset: 10px;
            border-radius: 20px;
            border: 1px dashed rgba(109,117,96,0.16);
            pointer-events: none;
        }

        .hero-frame img {
            width: 100%;
            aspect-ratio: 0.9 / 1;
            object-fit: cover;
            object-position: center 18%;
            border-radius: 22px;
            box-shadow: 0 14px 26px rgba(52,43,35,0.12);
        }

        .hero-pin {
            position: absolute;
            left: 10px;
            top: 18px;
            width: 120px;
            height: 120px;
            background: url('<?= asset("assets/foreground-decorative/pine leaf.png") ?>') center/contain no-repeat;
            opacity: 0.38;
            pointer-events: none;
            transform: rotate(-10deg);
            animation: floatSlow 8s ease-in-out infinite;
        }

        .hero-stamp {
            position: absolute;
            right: 4px;
            bottom: 8px;
            width: 130px;
            height: 130px;
            background: url('<?= asset("assets/background-decorative/stamp.png") ?>') center/contain no-repeat;
            opacity: 0.18;
            pointer-events: none;
            transform: rotate(10deg);
        }

        .hero-scroll {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: 16px;
            color: var(--sage-800);
            font-size: 0.66rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            font-weight: 700;
        }

        .hero-scroll::before,
        .hero-scroll::after {
            content: '';
            width: 44px;
            height: 1px;
            background: rgba(109,117,96,0.30);
        }

        .support-band {
            padding-top: 72px;
            padding-bottom: 72px;
        }

        .rsvp-intro {
            display: grid;
            gap: 12px;
            align-content: start;
        }

        .rsvp-intro .big-lead {
            max-width: 460px;
        }

        .rsvp-intro .body-copy {
            max-width: 460px;
        }

        .rsvp-split {
            grid-template-columns: minmax(0, 0.92fr) minmax(0, 1.08fr);
        }

        .separator {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 12px 0;
        }

        .separator img {
            width: min(420px, 72vw);
            opacity: 0.70;
            filter: drop-shadow(0 8px 12px rgba(52,43,35,0.08));
        }

        .split-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            gap: 14px;
            margin-top: 14px;
            align-items: stretch;
        }

        .detail-list {
            display: grid;
            gap: 10px;
        }

        .detail-row {
            display: grid;
            grid-template-columns: 94px minmax(0, 1fr);
            gap: 14px;
            align-items: start;
            padding: 12px 0;
            border-top: 1px solid var(--line);
        }

        .detail-row:first-child {
            border-top: 0;
            padding-top: 0;
        }

        .detail-row-label {
            color: var(--sage-800);
            font-size: 0.64rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            font-weight: 700;
        }

        .detail-row-value {
            color: var(--ink);
            font-size: 0.92rem;
            line-height: 1.7;
            font-weight: 500;
        }

        .detail-row-value small {
            display: block;
            margin-top: 4px;
            color: var(--muted);
            font-size: 0.84rem;
            line-height: 1.55;
            font-weight: 300;
        }

        .text-card,
        .visual-card,
        .map-card,
        .info-card,
        .form-card,
        .wall-card {
            border-radius: var(--radius-lg);
        }

        .section-card-head {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
        }

        .section-card-head .eyebrow {
            background: rgba(109,117,96,0.10);
        }

        .big-lead {
            margin: 0 0 12px;
            font-size: clamp(1.3rem, 2.25vw, 1.95rem);
            line-height: 1.12;
            letter-spacing: -0.04em;
            color: var(--ink);
            font-weight: 700;
        }

        .body-copy {
            margin: 0;
            color: var(--muted);
            font-size: 0.92rem;
            line-height: 1.82;
            font-weight: 300;
        }

        .mini-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 12px;
            margin-top: 18px;
        }

        .mini-card {
            padding: 16px 14px;
            border-radius: 18px;
            background: rgba(255,255,255,0.84);
            border: 1px solid rgba(70,61,50,0.08);
            box-shadow: 0 10px 20px rgba(52,43,35,0.05);
        }

        .mini-card .mini-label {
            display: block;
            margin-bottom: 6px;
            color: var(--sage-800);
            font-size: 0.62rem;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            font-weight: 700;
        }

        .mini-card .mini-value {
            color: var(--ink);
            font-size: 0.92rem;
            line-height: 1.6;
            font-weight: 500;
        }

        .detail-box {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            padding: 14px;
            border-radius: 16px;
            background: rgba(255,255,255,0.84);
            border: 1px solid rgba(70,61,50,0.08);
            box-shadow: 0 8px 18px rgba(52,43,35,0.04);
        }

        .detail-box img {
            width: 24px;
            height: 24px;
            object-fit: contain;
            flex: 0 0 auto;
            opacity: 0.9;
        }

        .detail-box strong {
            display: block;
            margin-bottom: 4px;
            color: var(--ink);
            font-size: 0.95rem;
            font-weight: 700;
        }

        .detail-box span {
            color: var(--muted);
            font-size: 0.86rem;
            line-height: 1.6;
            font-weight: 300;
        }

        .illustration-card {
            min-height: 100%;
            display: grid;
            place-items: center;
            padding: 20px;
            background:
                radial-gradient(circle at 70% 22%, rgba(255,255,255,0.52), transparent 24%),
                linear-gradient(180deg, rgba(250,247,240,0.94), rgba(240,234,222,0.98));
        }

        .illustration-card::after {
            content: '';
            position: absolute;
            inset: 18px;
            border-radius: 18px;
            border: 1px dashed rgba(109,117,96,0.16);
            pointer-events: none;
        }

        .illustration-card img {
            width: min(280px, 72%);
            max-height: 340px;
            object-fit: contain;
            filter: drop-shadow(0 14px 24px rgba(52,43,35,0.12));
        }

        .map-card {
            padding: 16px;
        }

        .map-frame {
            position: relative;
            min-height: 380px;
            overflow: hidden;
            border-radius: 22px;
            background: linear-gradient(135deg, #d8e2d1, #c9d3bd 52%, #ddd0c1);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.18);
        }

        .map-frame::before {
            content: 'Lokasi Acara';
            position: absolute;
            left: 16px;
            top: 16px;
            z-index: 2;
            padding: 7px 12px;
            border-radius: 999px;
            background: rgba(255,255,255,0.84);
            color: var(--sage-800);
            font-size: 0.62rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            font-weight: 700;
        }

        .map-frame iframe {
            width: 100%;
            height: 100%;
            min-height: 380px;
            border: 0;
            filter: saturate(0.9) contrast(0.96);
        }

        .map-overlay {
            position: absolute;
            left: 16px;
            right: 16px;
            bottom: 16px;
            z-index: 2;
            padding: 16px;
            border-radius: 18px;
            background: rgba(255,252,246,0.90);
            backdrop-filter: blur(12px);
            box-shadow: var(--shadow-soft);
        }

        .map-overlay strong {
            display: block;
            color: var(--ink);
            margin-bottom: 4px;
            font-size: 1rem;
        }

        .map-overlay span {
            color: var(--muted);
            line-height: 1.65;
            font-size: 0.9rem;
            font-weight: 300;
        }

        .info-card,
        .form-card,
        .wall-card {
            padding: 20px;
        }

        .info-list {
            display: grid;
            gap: 12px;
            margin: 18px 0 0;
            padding: 0;
            list-style: none;
        }

        .info-list li {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            padding-top: 12px;
            border-top: 1px solid var(--line);
        }

        .info-list li:first-child {
            padding-top: 0;
            border-top: 0;
        }

        .info-list img {
            width: 24px;
            height: 24px;
            object-fit: contain;
            flex: 0 0 auto;
            opacity: 0.9;
        }

        .info-list strong {
            display: block;
            margin-bottom: 3px;
            color: var(--ink);
            font-size: 0.96rem;
            font-weight: 700;
        }

        .info-list span {
            color: var(--muted);
            font-size: 0.88rem;
            line-height: 1.6;
            font-weight: 300;
        }

        .info-card h3,
        .form-intro h3,
        .wish-head h3 {
            margin: 0 0 10px;
            color: var(--ink);
            font-size: clamp(1.4rem, 2.6vw, 2.05rem);
            line-height: 1.1;
            letter-spacing: -0.04em;
            font-weight: 700;
        }

        .mini-note {
            margin-top: 14px;
            color: var(--sage-800);
            font-size: 0.82rem;
            font-weight: 700;
        }

        .reservation-visual,
        .wish-visual {
            position: relative;
            overflow: hidden;
            min-height: 100%;
            display: grid;
            place-items: center;
            padding: 0;
            background:
                radial-gradient(circle at 75% 22%, rgba(255,255,255,0.60), transparent 28%),
                linear-gradient(180deg, rgba(249,245,237,0.94), rgba(239,233,222,0.98));
        }

        .reservation-visual::after,
        .wish-visual::after {
            content: '';
            position: absolute;
            inset: 18px;
            border-radius: 18px;
            border: 1px dashed rgba(109,117,96,0.16);
            pointer-events: none;
        }

        .qr-box {
            width: min(200px, 66%);
            aspect-ratio: 1;
            border-radius: 18px;
            border: 1px solid rgba(109,117,96,0.20);
            background:
                linear-gradient(135deg, rgba(255,255,255,0.90), rgba(239,232,220,0.96)),
                repeating-linear-gradient(0deg, rgba(111,119,95,0.08) 0 1px, transparent 1px 10px),
                repeating-linear-gradient(90deg, rgba(111,119,95,0.08) 0 1px, transparent 1px 10px);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.24), 0 14px 28px rgba(52,43,35,0.08);
            position: relative;
        }

        .qr-box::before,
        .qr-box::after {
            content: '';
            position: absolute;
            inset: 16px;
            border-radius: 16px;
            border: 2px solid rgba(109,117,96,0.12);
        }

        .qr-box::after {
            inset: 52px;
            border-color: rgba(109,117,96,0.22);
            transform: rotate(8deg);
        }

        .field {
            margin-bottom: 14px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            color: var(--sage-800);
            font-size: 0.64rem;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            font-weight: 700;
        }

        .field input,
        .field textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid rgba(109,117,96,0.16);
            border-radius: 14px;
            font: inherit;
            color: var(--ink);
            background: rgba(255,255,255,0.92);
            outline: none;
            transition: box-shadow 150ms ease, border-color 150ms ease, transform 150ms ease;
        }

        .field input:focus,
        .field textarea:focus {
            border-color: rgba(109,117,96,0.34);
            box-shadow: 0 0 0 4px rgba(166,176,145,0.12);
        }

        .field textarea {
            min-height: 140px;
            resize: vertical;
        }

        .choice-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .choice {
            position: relative;
        }

        .choice input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .choice label {
            min-height: 100%;
            display: grid;
            gap: 8px;
            align-content: start;
            padding: 15px 14px;
            border-radius: 16px;
            border: 1px solid rgba(109,117,96,0.14);
            background: rgba(255,255,255,0.84);
            box-shadow: 0 10px 20px rgba(52,43,35,0.05);
            cursor: pointer;
            transition: transform 150ms ease, box-shadow 150ms ease, border-color 150ms ease, background 150ms ease;
        }

        .choice label img {
            width: 22px;
            height: 22px;
            object-fit: contain;
        }

        .choice label strong {
            color: var(--ink);
            font-size: 0.95rem;
            font-weight: 700;
            line-height: 1.4;
        }

        .choice label span {
            color: var(--muted);
            font-size: 0.84rem;
            line-height: 1.55;
            font-weight: 300;
        }

        .choice input:checked + label {
            border-color: rgba(109,117,96,0.34);
            background: linear-gradient(180deg, rgba(255,255,255,0.96), rgba(233,238,223,0.96));
            box-shadow: 0 14px 26px rgba(109,117,96,0.14);
            transform: translateY(-1px);
        }

        .guests-field {
            display: none;
        }

        .guests-field.visible {
            display: block;
        }

        .message {
            display: none;
            margin-top: 6px;
            border-radius: 16px;
            padding: 12px 14px;
            font-size: 0.92rem;
            line-height: 1.6;
        }

        .message.is-visible {
            display: block;
        }

        .message.success {
            color: #2d6b3a;
            background: rgba(99,176,111,0.12);
            border: 1px solid rgba(99,176,111,0.18);
        }

        .message.error {
            color: #9b4747;
            background: rgba(210,103,103,0.10);
            border: 1px solid rgba(210,103,103,0.18);
        }

        .wish-visual-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            object-position: center;
            border-radius: inherit;
            transform: none;
            filter: none;
        }

        .wish-envelope {
            position: relative;
            width: min(260px, 74%);
            aspect-ratio: 1.25;
            border-radius: 24px;
            background:
                linear-gradient(180deg, #ded7c9, #cfc6b6);
            box-shadow: 0 18px 34px rgba(52,43,35,0.12);
            transform: rotate(-8deg);
        }

        .wish-envelope::before,
        .wish-envelope::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 24px;
        }

        .wish-envelope::before {
            background:
                linear-gradient(135deg, transparent 0 48%, rgba(255,255,255,0.34) 48% 52%, transparent 52%),
                linear-gradient(225deg, transparent 0 48%, rgba(255,255,255,0.28) 48% 52%, transparent 52%);
            clip-path: polygon(0 16%, 50% 54%, 100% 16%, 100% 100%, 0 100%);
            opacity: 0.95;
        }

        .wish-envelope::after {
            inset: 18px;
            border: 1px solid rgba(109,117,96,0.18);
            clip-path: polygon(0 0, 100% 0, 100% 76%, 50% 100%, 0 76%);
        }

        .wish-sigil {
            position: absolute;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: rgba(109,117,96,0.20);
            border: 1px solid rgba(109,117,96,0.22);
            display: grid;
            place-items: center;
            color: var(--ink);
            font-size: 0.72rem;
            font-weight: 700;
            transform: translate(-50%, -50%) rotate(8deg);
        }

        .wish-sigil::before {
            content: '✦';
        }

        .wish-visual::before {
            content: '';
            position: absolute;
            right: 18px;
            bottom: 18px;
            width: 150px;
            height: 150px;
            background: url('<?= asset("assets/foreground-decorative/pine cones.png") ?>') center/contain no-repeat;
            opacity: 0.85;
            pointer-events: none;
        }

        .wish-head {
            margin-bottom: 14px;
        }

        .wish-head p {
            margin: 0;
            color: var(--muted);
            font-size: 0.92rem;
            line-height: 1.7;
            font-weight: 300;
        }

        .wish-wall {
            margin-top: 18px;
        }

        .rsvp-form {
            padding: 20px;
        }

        .contact-strip {
            display: grid;
            gap: 14px;
            margin-top: 18px;
        }

        .contact-section {
            padding-top: 72px;
            padding-bottom: 72px;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
            max-width: 640px;
            margin-inline: auto;
        }

        .contact-card {
            padding: 22px 24px;
            border-radius: 18px;
            background: rgba(255,255,255,0.84);
            border: 1px solid rgba(70,61,50,0.08);
            box-shadow: 0 10px 20px rgba(52,43,35,0.05);
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .contact-card__info {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .contact-card strong {
            display: block;
            color: var(--ink);
            font-size: 1rem;
        }

        .contact-card span {
            color: var(--muted);
            font-size: 0.9rem;
            line-height: 1.65;
            font-weight: 300;
        }

        .contact-card__btn {
            width: 100%;
            text-align: center;
        }

        .contact-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .wish-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 10px;
            max-height: 480px;
            overflow-y: auto;
            padding-right: 4px;
        }

        .wish-list::-webkit-scrollbar {
            width: 6px;
        }

        .wish-list::-webkit-scrollbar-track {
            background: var(--paper-3);
            border-radius: 10px;
        }

        .wish-list::-webkit-scrollbar-thumb {
            background: var(--sage-800);
            border-radius: 10px;
        }

        .wish-card {
            padding: 16px;
            border-radius: 16px;
            background: linear-gradient(135deg, #faf7ef, #ffffff);
            border: 1px solid rgba(109,117,96,0.12);
            box-shadow: 0 8px 18px rgba(52,43,35,0.04);
            animation: fadeUp 0.45s ease;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes floatSlow {
            0%, 100% { transform: translateY(0) rotate(-10deg); }
            50% { transform: translateY(-8px) rotate(-8deg); }
        }

        .wish-name {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 6px;
            color: var(--sage-800);
            font-size: 0.92rem;
            font-weight: 700;
        }

        .wish-name::before {
            content: '◆';
            font-size: 0.62rem;
            color: var(--sage-700);
        }

        .wish-msg {
            color: var(--ink);
            font-size: 0.86rem;
            line-height: 1.68;
            font-style: italic;
            font-weight: 300;
        }

        .wish-time {
            margin-top: 10px;
            color: #8d8577;
            font-size: 0.72rem;
        }

        .no-wishes {
            grid-column: 1 / -1;
            padding: 30px;
            text-align: center;
            color: #9b9386;
            font-style: italic;
            font-size: 0.9rem;
        }

        .footer {
            background:
                linear-gradient(180deg, rgba(63,70,58,0.98), rgba(45,51,44,0.98)),
                radial-gradient(circle at 50% 0%, rgba(255,255,255,0.08), transparent 24%);
            color: rgba(255,255,255,0.78);
            text-align: center;
            padding: 42px 20px 48px;
            font-size: 0.82rem;
            line-height: 1.8;
            position: relative;
            overflow: hidden;
        }

        .footer p {
            margin: 6px 0;
        }

        .footer strong {
            color: #fff;
            font-weight: 700;
        }

        .footer::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url('<?= asset("assets/background-decorative/vintage stamp.png") ?>') right bottom / 220px no-repeat;
            opacity: 0.06;
            pointer-events: none;
        }

        .footer-inner {
            position: relative;
            z-index: 1;
            width: min(1080px, 100%);
            margin: 0 auto;
        }

        .footer-sep {
            display: flex;
            justify-content: center;
            margin: 0 0 18px;
            opacity: 0.58;
        }

        .footer-sep img {
            width: min(340px, 70vw);
            filter: brightness(0) invert(0.95);
        }

        .footer-logos {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 22px auto 0;
            max-width: 860px;
            opacity: 0.9;
        }

        .footer-logo {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 8px;
        }

        .footer-logo img {
            max-height: 120px;
            width: auto;
            max-width: 100%;
            object-fit: contain;
            filter: brightness(0) invert(1);
            opacity: 0.88;
        }

        .footer-copy {
            margin-top: 10px;
        }

        .reveal {
            opacity: 0;
            transform: translateY(14px);
            transition: opacity 700ms ease, transform 700ms ease;
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .delay-1 { transition-delay: 120ms; }
        .delay-2 { transition-delay: 240ms; }
        .delay-3 { transition-delay: 360ms; }

        .cover {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            overflow: hidden;
        }

        .cover-left,
        .cover-right {
            flex: 0 0 50%;
            height: 100%;
            background-size: cover;
            background-position: center;
            transition: transform 1.2s cubic-bezier(0.77, 0, 0.18, 1);
        }

        .cover-left {
            background-image: url('<?= asset('assets/d-kiri.png') ?>');
        }

        .cover-right {
            background-image: url('<?= asset('assets/d-kanan.png') ?>');
        }

        .cover.open .cover-left {
            transform: translateX(-100%);
        }

        .cover.open .cover-right {
            transform: translateX(100%);
        }

        .cover-btn {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10000;
            padding: 18px 40px;
            border: 2px solid rgba(255,255,255,0.4);
            border-radius: 50px;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(8px);
            color: #3d6b52;
            font-family: 'Alegreya Sans', sans-serif;
            font-size: 1.1rem;
            font-weight: 500;
            letter-spacing: 3px;
            cursor: pointer;
            transition: opacity 0.6s ease, transform 0.3s ease;
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
            text-transform: uppercase;
        }

        .cover-btn:hover {
            transform: translate(-50%, -50%) scale(1.05);
            background: rgba(255,255,255,0.2);
            border-color: rgba(255,255,255,0.6);
        }

        .cover-btn.hidden {
            opacity: 0;
            pointer-events: none;
        }

        body.cover-open {
            overflow: auto;
        }

        body:not(.cover-open) {
            overflow: hidden;
        }

        @media (max-width: 960px) {
            .hero-card {
                grid-template-columns: 1fr;
            }

            .split-grid {
                grid-template-columns: 1fr;
            }

            .mini-grid,
            .contact-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .choice-grid {
                grid-template-columns: 1fr;
            }

            .rsvp-split {
                grid-template-columns: 1fr;
            }

            .detail-row {
                grid-template-columns: 1fr;
                gap: 4px;
            }

            .map-frame,
            .map-frame iframe {
                min-height: 360px;
            }

            .footer-logos {
                max-width: 460px;
            }
        }

        @media (max-width: 640px) {
            .cover-left {
                background-position: right;
            }

            .cover-right {
                background-position: left;
            }

            .container {
                width: min(100% - 20px, 1160px);
            }

            .hero {
                min-height: auto;
                padding: 22px 0 28px;
            }

            .hero-card,
            .card-pad,
            .info-card,
            .form-card,
            .wall-card,
            .map-card {
                padding: 16px;
            }

            .hero-card {
                width: min(100%, calc(100% - 12px));
                border-radius: 24px;
            }

            .hero-number {
                font-size: clamp(3.6rem, 18vw, 5.2rem);
            }

            .wish-visual {
                min-height: 240px;
                padding: 0;
            }

            .wish-visual-image {
                min-height: 240px;
            }

            .detail-grid,
            .choice-grid {
                grid-template-columns: 1fr;
            }

            .choice-grid {
                gap: 10px;
            }

            .rsvp-intro,
            .rsvp-form {
                padding: 16px;
            }

            .hero-actions .btn {
                width: 100%;
            }

            .section {
                padding: 68px 0;
            }

            .section-title {
                font-size: clamp(1.85rem, 9vw, 2.4rem);
                margin-bottom: 10px;
            }

            .section-copy,
            .body-copy,
            .hero-copy {
                font-size: 0.92rem;
                line-height: 1.8;
            }

            .rsvp-intro .big-lead {
                max-width: 100%;
                font-size: 1.45rem;
            }

            .rsvp-intro .body-copy {
                max-width: 100%;
            }

            .map-frame,
            .map-frame iframe {
                min-height: 320px;
            }

            .wish-list {
                grid-template-columns: 1fr;
            }

            .mini-grid,
            .contact-grid {
                grid-template-columns: 1fr;
            }

            .contact-actions {
                gap: 8px;
            }

            .contact-grid {
                max-width: 100%;
            }

            .support-band,
            .contact-section {
                padding-top: 52px;
                padding-bottom: 52px;
            }

            .detail-row {
                grid-template-columns: 1fr;
            }

            .separator img {
                width: min(300px, 74vw);
            }

            body::before,
            body::after {
                opacity: 0.07;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            *, *::before, *::after {
                animation: none !important;
                transition: none !important;
            }
            .reveal {
                opacity: 1;
                transform: none;
            }
        }
    </style>
</head>
<body>
<div class="cover" id="cover">
    <div class="cover-left"></div>
    <div class="cover-right"></div>
</div>
<button class="cover-btn" id="coverBtn">Open Invitation</button>
<div class="shell">
    <header class="hero">
        <div class="container">
            <article class="card hero-card reveal">
                <div class="hero-content">
                    <div class="hero-brand">
                        <span class="eyebrow">Undangan</span>
                        <div class="hero-number">25 | 50</div>
                        <div class="hero-tagline">A Journey of Learning,<br>Beauty &amp; Life</div>
                        <div class="hero-script">When Beauty Meets Wisdom.</div>
                    </div>

                    <p class="hero-copy">
                        Dengan penuh rasa syukur, kami mengundang Bapak/Ibu untuk hadir dalam majelis syukur atas nikmat, rahmat, dan perjalanan kehidupan yang Allah anugerahkan. Sebuah momen hangat
                        untuk berbagi kisah, refleksi, dan keindahan dalam kebersamaan.
                    </p>

                    <div class="hero-actions">
                        <a class="btn btn-primary" href="#rsvp">Reservasi Kehadiran</a>
                        <a class="btn btn-secondary" href="#wishes">Titipkan Ucapan</a>
                    </div>

                    <div class="hero-note">* Acara berlangsung dalam suasana hangat dan tenang.</div>
                    <div class="hero-scroll">Scroll to explore</div>
                </div>

                <div class="hero-visual">
                    <div class="hero-frame">
                        <div class="hero-pin" aria-hidden="true"></div>
                        <div class="hero-stamp" aria-hidden="true"></div>
                        <img src="<?= asset('assets/cahya.webp') ?>?v=2" alt="Cahya Khairani">
                    </div>
                </div>
            </article>
        </div>
    </header>

    <div class="separator" aria-hidden="true">
        <img src="<?= asset('assets/foreground-decorative/stroke leaf.png') ?>" alt="">
    </div>

    <section class="section section--sage">
        <div class="container">
            <p class="section-kicker">Tentang Acara</p>
            <h2 class="section-title">Kami Mengundang Kehadiran Anda</h2>
            <p class="section-copy">
                Momentum ini kami rangkai sebagai ruang untuk merayakan perjalanan, mengapresiasi proses,
                dan menikmati kebersamaan yang sederhana namun bermakna.
            </p>

            <div class="split-grid">
                <article class="card card-pad reveal">
                    <div class="section-card-head">
                        <span class="eyebrow">Momen Bersejarah</span>
                    </div>
                    <h3 class="big-lead">Perayaan ini kami harap menjadi ruang yang lembut, hangat, dan penuh rasa syukur.</h3>
                    <p class="body-copy">
                        Kami mengundang Bapak/Ibu/Saudara/i untuk hadir dan menjadi bagian dari
                        perayaan yang tenang dan bermakna. Kehadiran Anda akan menjadi bagian
                        penting dari cerita yang kami rayakan hari itu.
                    </p>
                    <div class="mini-card" style="margin-top:18px;background:rgba(180,188,164,0.10);">
                        <span class="mini-label">Kehadiran Anda</span>
                        <div class="mini-value">Menjadi bagian penting dari perayaan yang sederhana namun bermakna ini.</div>
                    </div>
                </article>

                <article class="card card-pad reveal delay-1">
                    <div class="section-card-head">
                        <span class="eyebrow">Informasi Acara</span>
                    </div>
                    <h3 class="big-lead">Detail Singkat Yang Perlu Diketahui</h3>
                    <p class="body-copy">
                        Informasi inti ditampilkan ringkas agar mudah dipindai, sementara detail lokasi lengkap
                        kami letakkan di section berikutnya.
                    </p>

                    <div class="detail-list">
                        <div class="detail-row">
                            <div class="detail-row-label">Tanggal</div>
                            <div class="detail-row-value">04 Juli 2026</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-row-label">Waktu</div>
                            <div class="detail-row-value">08.00 s.d selesai</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-row-label">Lokasi</div>
                            <div class="detail-row-value">Tangkal Pinus Jayagiri Lembang</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-row-label">Dress Code</div>
                            <div class="detail-row-value">
                                Earth Tone
                                <small>Dengan nuansa gading, krem, sage, kuning lembut, dan cokelat.</small>
                            </div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-row-label">Catatan</div>
                            <div class="detail-row-value">Mohon hadir 15 menit sebelum acara dimulai.</div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="section section--cream">
        <div class="container">
            <p class="section-kicker">Lokasi</p>
            <h2 class="section-title">Kami Menunggu Anda di Sini</h2>
            <div class="split-grid">
                <article class="card map-card reveal">
                    <div class="map-frame">
                        <iframe
                            src="https://www.google.com/maps?q=Tangkal%20Pinus%20Jayagiri%20Lembang&output=embed"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Peta lokasi acara">
                        </iframe>
                        <div class="map-overlay">
                            <strong>Tangkal Pinus Jayagiri Lembang</strong>
                            <span>Genteng, Jayagiri, Kec. Lembang, Kabupaten Bandung Barat, Bandung, Jawa Barat</span>
                        </div>
                    </div>
                </article>

                <article class="card info-card reveal delay-1">
                    <div class="section-card-head">
                        <span class="eyebrow">Arah Lokasi</span>
                    </div>
                    <h3>Kami nantikan kehadiran Bapak/Ibu dengan penuh sukacita.</h3>
                    <p class="body-copy">
                        Kami sertakan detail lokasi dan petunjuk Google Maps agar Bapak/Ibu dapat menuju tempat acara dengan dengan lebih mudah.
                    </p>

                    <ul class="info-list">
                        <li>
                            <img src="<?= asset('assets/icon/loc.png') ?>" alt="">
                            <div>
                                <strong>Alamat lengkap</strong>
                                <span>Tangkal Pinus Jayagiri Lembang, Bandung Barat</span>
                            </div>
                        </li>
                        <li>
                            <img src="<?= asset('assets/icon/clock.png') ?>" alt="">
                            <div>
                                <strong>Waktu terbaik datang</strong>
                                <span>Pagi hari agar lebih santai dan terasa lebih nyaman</span>
                            </div>
                        </li>
                    </ul>

                    <div style="margin-top:18px;">
                        <a class="btn btn-primary" href="https://www.google.com/maps/search/?api=1&query=Tangkal%20Pinus%20Jayagiri%20Lembang" target="_blank" rel="noopener">Buka Google Maps</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="section section--sage" id="rsvp">
        <div class="container">
            <p class="section-kicker">KONFIRMASI</p>
            <h2 class="section-title">Apakah Anda Akan Hadir?</h2>
            <div class="split-grid rsvp-split">
                <article class="card card-pad reveal rsvp-intro">
                    <div class="section-card-head">
                        <span class="eyebrow">Konfirmasi</span>
                    </div>
                    <h3 class="big-lead">Mohon lakukan konfirmasi kehadiran agar kami dapat menyiapkan pengalaman terbaik bagi setiap tamu.</h3>
                    <p class="body-copy">
                        Form ini dibuat sederhana supaya Anda bisa konfirmasi kehadiran dengan cepat dan nyaman. Kami sangat menghargai kabar dari Anda.
                    </p>
                    <div class="mini-card" style="margin-top:16px;background:rgba(180,188,164,0.10);">
                        <span class="mini-label">KENAPA KONFIRMASI HADIR?</span>
                        <div class="mini-value">Agar kami bisa menyiapkan alur acara, kenyamanan tamu, dan kebutuhan tempat dengan lebih baik.</div>
                    </div>
                </article>

                <article class="card form-card rsvp-form reveal delay-1">
                    <form id="rsvpForm">
                        <div class="field">
                            <label for="rsvp-name">Nama lengkap</label>
                            <input type="text" id="rsvp-name" name="name" placeholder="Masukkan nama Anda" maxlength="100" required>
                        </div>

                        <div class="field">
                            <label for="rsvp-phone">No. HP / WhatsApp</label>
                            <input type="tel" id="rsvp-phone" name="phone" placeholder="Contoh: 08123456789" maxlength="20">
                        </div>

                        <div class="field">
                            <label>Konfirmasi kehadiran</label>
                            <div class="choice-grid">
                                <div class="choice">
                                    <input type="radio" id="rsvp-hadir" name="attendance" value="hadir" required>
                                    <label for="rsvp-hadir">
                                        <img src="<?= asset('assets/icon/clock.png') ?>" alt="">
                                        <strong>Ya, saya hadir</strong>
                                        <span>Kami menantikan kehadiran Anda</span>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" id="rsvp-tidak" name="attendance" value="tidak">
                                    <label for="rsvp-tidak">
                                        <img src="<?= asset('assets/icon/loc.png') ?>" alt="">
                                        <strong>Maaf, belum bisa</strong>
                                        <span>Terima kasih sudah memberi kabar</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="field guests-field" id="guestsField">
                            <label for="rsvp-guests">Jumlah tamu yang dibawa</label>
                            <input type="number" id="rsvp-guests" name="guests" min="1" max="20" value="1">
                        </div>

                        <button type="submit" class="btn btn-primary" id="rsvpBtn">Kirim Reservasi</button>
                        <div id="rsvp-msg" class="message" role="status" aria-live="polite"></div>
                    </form>
                </article>
            </div>
        </div>
    </section>

    <section class="section section--cream" id="ucapan">
        <div class="container">
            <p class="section-kicker">Ucapan &amp; Doa</p>
            <h2 class="section-title">Titipkan Doa &amp; Ucapan Terbaik Anda</h2>
            <span id="wishes"></span>
            <div class="split-grid">
                <article class="card wish-visual reveal">
                    <img
                        src="<?= asset('assets/map-digital-invitation.png') ?>?v=1"
                        alt="Ilustrasi doa dan ucapan"
                        class="wish-visual-image"
                    >
                </article>

                <article class="card form-card reveal delay-1">
                    <form id="wishForm">
                        <div class="field">
                            <label for="name">Nama Anda</label>
                            <input type="text" id="name" name="name" placeholder="Tuliskan nama Anda" maxlength="100" required>
                        </div>

                        <div class="field">
                            <label for="message">Ucapan</label>
                            <textarea id="message" name="message" placeholder="Tuliskan doa dan ucapan terbaik Anda untuk kami" maxlength="500" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submitBtn">Kirim Ucapan &amp; Doa</button>
                        <div id="form-msg" class="message" role="status" aria-live="polite"></div>
                    </form>
                </article>
            </div>

            <article class="card wall-card wish-wall reveal delay-2">
                <div class="wish-head">
                    <h3>Dinding Doa &amp; Ucapan</h3>
                    <p>Setiap kata baik yang Anda titipkan menjadi bagian kecil dari hari yang indah ini.</p>
                </div>
                <div class="wish-list" id="wishList">
                    <?php if (empty($wishes)): ?>
                        <div class="no-wishes">Belum ada ucapan. Jadilah yang pertama meninggalkan doa hangat untuk kami.</div>
                    <?php else: ?>
                        <?php foreach ($wishes as $w): ?>
                            <div class="wish-card">
                                <div class="wish-name"><?= e($w['name'] ?? '') ?></div>
                                <div class="wish-msg">"<?= e($w['message'] ?? '') ?>"</div>
                                <div class="wish-time"><?= e($w['time'] ?? '') ?></div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </article>
        </div>
    </section>

    <section class="section section--sage contact-section support-band">
        <div class="container">
            <div class="contact-strip">
                <p class="section-kicker">KONFIRMASI KEHADIRAN</p>
                <h2 class="section-title" style="margin-bottom:8px;">Butuh Bantuan Konfirmasi Kehadiran?</h2>
                <p class="section-copy" style="max-width:700px;">
                    Jika Anda mengalami kendala atau ingin mengonfirmasi kehadiran, silakan hubungi kami melalui WhatsApp di bawah ini.
                </p>

                <div class="contact-grid">
                    <article class="contact-card reveal">
                        <div class="contact-card__info">
                            <strong>Gesti</strong>
                            <span>+62 821-6971-6742</span>
                        </div>
                        <a class="btn btn-primary contact-card__btn" href="https://wa.me/6282169716742" target="_blank" rel="noopener">WhatsApp Gesti</a>
                    </article>
                    <article class="contact-card reveal delay-1">
                        <div class="contact-card__info">
                            <strong>Ulfi</strong>
                            <span>+62 895-2592-3084</span>
                        </div>
                        <a class="btn btn-secondary contact-card__btn" href="https://wa.me/6289525923084" target="_blank" rel="noopener">WhatsApp Ulfi</a>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <div class="separator" aria-hidden="true">
        <img src="<?= asset('assets/foreground-decorative/stroke leaf.png') ?>" alt="">
    </div>

    <footer class="footer">
        <div class="footer-inner">
            <p><strong>25 | 50</strong></p>
            <p>A Journey of Learning, Beauty &amp; Life</p>
            <p>When Beauty Meets Wisdom.</p>
            <p class="footer-copy" style="font-size:0.75rem; opacity:0.68;">Terima kasih telah menjadi bagian dari perjalanan penuh makna ini.</p>

            <div class="footer-logos" aria-hidden="true">
                <div class="footer-logo"><img src="<?= asset('assets/logo/all-logo.png') ?>" alt=""></div>
            </div>

            <p style="font-size:0.72rem; opacity:0.48; margin-top:18px;">&copy; 2026 All rights reserved.</p>
        </div>
    </footer>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cover = document.getElementById('cover');
        const btn = document.getElementById('coverBtn');

        if (cover && btn) {
            btn.addEventListener('click', () => {
                cover.classList.add('open');
                btn.classList.add('hidden');
                document.body.classList.add('cover-open');
            });
        }

        const observeTargets = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        observeTargets.forEach((target) => observer.observe(target));
    });

    const guestsField = document.getElementById('guestsField');
    const hadirRadio = document.getElementById('rsvp-hadir');
    const tidakRadio = document.getElementById('rsvp-tidak');
    const guestsInput = document.getElementById('rsvp-guests');

    function syncGuestsField() {
        const show = hadirRadio && hadirRadio.checked;
        if (!guestsField || !guestsInput) return;
        guestsField.classList.toggle('visible', !!show);
        guestsInput.disabled = !show;
    }

    [hadirRadio, tidakRadio].forEach((radio) => {
        if (radio) radio.addEventListener('change', syncGuestsField);
    });
    syncGuestsField();

    function setMessage(el, text, type) {
        el.textContent = text;
        el.className = 'message is-visible ' + type;
    }

    function clearMessage(el) {
        el.textContent = '';
        el.className = 'message';
    }

    function escHtml(str) {
        return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
    }

    const wishForm = document.getElementById('wishForm');
    if (wishForm) {
        wishForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = document.getElementById('submitBtn');
            const msg = document.getElementById('form-msg');
            const name = document.getElementById('name').value.trim();
            const message = document.getElementById('message').value.trim();

            btn.disabled = true;
            btn.textContent = 'Mengirim...';
            clearMessage(msg);

            try {
                const fd = new FormData();
                fd.append('name', name);
                fd.append('message', message);

                const res = await fetch('submit.php', { method: 'POST', body: fd });
                const data = await res.json();

                if (data.success) {
                    setMessage(msg, data.message, 'success');
                    this.reset();

                    const list = document.getElementById('wishList');
                    const noWish = list.querySelector('.no-wishes');
                    if (noWish) noWish.remove();

                    const now = new Date();
                    const timeStr = now.toLocaleDateString('id-ID', { day:'2-digit', month:'short', year:'numeric' }) + ', ' +
                                     now.toLocaleTimeString('id-ID', { hour:'2-digit', minute:'2-digit' });

                    const card = document.createElement('div');
                    card.className = 'wish-card';
                    card.innerHTML = `
                        <div class="wish-name">${escHtml(name)}</div>
                        <div class="wish-msg">"${escHtml(message)}"</div>
                        <div class="wish-time">${timeStr}</div>
                    `;
                    list.prepend(card);
                } else {
                    setMessage(msg, data.message || 'Terjadi kesalahan.', 'error');
                }
            } catch (error) {
                setMessage(msg, 'Terjadi kesalahan. Coba lagi.', 'error');
            }

            btn.disabled = false;
            btn.textContent = 'Kirim Ucapan & Doa';
        });
    }

    const rsvpForm = document.getElementById('rsvpForm');
    if (rsvpForm) {
        rsvpForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = document.getElementById('rsvpBtn');
            const msg = document.getElementById('rsvp-msg');

            btn.disabled = true;
            btn.textContent = 'Mengirim...';
            clearMessage(msg);

            try {
                const fd = new FormData(this);
                const res = await fetch('rsvp.php', { method: 'POST', body: fd });
                const text = await res.text();
                let data;
                try {
                    data = JSON.parse(text);
                } catch {
                    data = { success: false, message: 'Server error. Coba lagi.' };
                }

                if (data.success) {
                    setMessage(msg, data.message, 'success');
                    this.reset();
                    syncGuestsField();
                } else {
                    setMessage(msg, data.message || 'Terjadi kesalahan.', 'error');
                }
            } catch (err) {
                setMessage(msg, 'Terjadi kesalahan. Coba lagi.', 'error');
            }

            btn.disabled = false;
            btn.textContent = 'Kirim Reservasi';
        });
    }
</script>
</body>
</html>

