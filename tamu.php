<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tamu – Grand Opening Apotek Parahyangan Suite</title>
    <style>
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Regular.woff2') format('woff2'),url('Web-Fonts/ArenaUno-Regular.woff') format('woff'); font-weight:400; font-style:normal; font-display:swap; }
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Light.woff2') format('woff2'),url('Web-Fonts/ArenaUno-Light.woff') format('woff'); font-weight:300; font-style:normal; font-display:swap; }
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Medium.woff2') format('woff2'),url('Web-Fonts/ArenaUno-Medium.woff') format('woff'); font-weight:500; font-style:normal; font-display:swap; }
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Bold.woff2') format('woff2'),url('Web-Fonts/ArenaUno-Bold.woff') format('woff'); font-weight:700; font-style:normal; font-display:swap; }
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Heavy.woff2') format('woff2'),url('Web-Fonts/ArenaUno-Heavy.woff') format('woff'); font-weight:900; font-style:normal; font-display:swap; }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary: #A64786;
            --primary-dark: #8a3870;
            --primary-pale: #fdf4fa;
            --primary-light: #f0d4e8;
            --gold: #c9a96e;
            --dark: #2a1a2e;
            --text: #4a3a4e;
        }

        body {
            font-family: 'Arena Uno', sans-serif;
            background: var(--primary-pale);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── BACKGROUND DECORATION ── */
        .page-wrap {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            position: relative;
            overflow: hidden;
        }

        .page-wrap::before {
            content: '';
            position: absolute;
            top: -120px; right: -120px;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(166,71,134,0.12) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .page-wrap::after {
            content: '';
            position: absolute;
            bottom: -100px; left: -100px;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(166,71,134,0.08) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        /* ── CARD ── */
        .card {
            background: #fff;
            border-radius: 28px;
            padding: 48px 44px;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 16px 56px rgba(166,71,134,0.14);
            position: relative;
            z-index: 1;
        }

        /* Pita pojok */
        .ribbon-corner {
            position: absolute;
            top: 0; right: 0;
            width: 90px;
            opacity: 0.5;
            pointer-events: none;
        }

        /* Logo */
        .logo-wrap {
            text-align: center;
            margin-bottom: 24px;
        }

        .logo-wrap img {
            width: 110px;
            height: auto;
            filter: drop-shadow(0 4px 12px rgba(166,71,134,0.2));
        }

        /* Heading */
        .card-badge {
            display: inline-block;
            background: var(--primary);
            color: #fff;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            padding: 5px 16px;
            border-radius: 50px;
            margin-bottom: 16px;
        }

        .card-title {
            font-size: clamp(1.4rem, 4vw, 1.9rem);
            font-weight: 900;
            color: var(--dark);
            line-height: 1.2;
            margin-bottom: 6px;
        }

        .card-title span { color: var(--primary); }

        .card-subtitle {
            font-size: 0.85rem;
            font-weight: 300;
            color: var(--text);
            margin-bottom: 28px;
            line-height: 1.6;
        }

        /* Promo banner */
        .promo-banner {
            background: linear-gradient(135deg, #fdf4fa, #f0d4e8);
            border: 1.5px solid rgba(166,71,134,0.25);
            border-radius: 16px;
            padding: 18px 20px;
            margin-bottom: 28px;
            display: flex;
            gap: 14px;
            align-items: flex-start;
        }

        .promo-icon {
            font-size: 2rem;
            line-height: 1;
            flex-shrink: 0;
        }

        .promo-text h3 {
            font-size: 0.88rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 4px;
        }

        .promo-text p {
            font-size: 0.8rem;
            font-weight: 300;
            color: var(--text);
            line-height: 1.55;
        }

        .promo-text strong {
            color: var(--primary);
            font-weight: 700;
        }

        /* Form */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--primary-dark);
            margin-bottom: 8px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.1rem;
            pointer-events: none;
        }

        .form-group input {
            width: 100%;
            padding: 14px 18px 14px 42px;
            border: 1.5px solid rgba(166,71,134,0.25);
            border-radius: 12px;
            font-family: 'Arena Uno', sans-serif;
            font-size: 0.92rem;
            color: var(--dark);
            background: #fff;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(166,71,134,0.12);
        }

        .form-group input::placeholder { color: #c0a8bc; }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            border: none;
            border-radius: 14px;
            font-family: 'Arena Uno', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            letter-spacing: 0.5px;
            box-shadow: 0 8px 24px rgba(166,71,134,0.35);
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 8px;
        }

        .submit-btn:hover { transform: translateY(-2px); box-shadow: 0 12px 32px rgba(166,71,134,0.45); }
        .submit-btn:disabled { opacity: 0.6; cursor: not-allowed; transform: none; }

        #form-msg {
            text-align: center;
            margin-top: 14px;
            font-size: 0.88rem;
            font-weight: 500;
            min-height: 20px;
        }

        .msg-error { color: #c62828; }

        /* ── SUCCESS STATE ── */
        .success-state {
            display: none;
            text-align: center;
            padding: 20px 0;
        }

        .success-state .success-icon {
            font-size: 4rem;
            margin-bottom: 16px;
            animation: popIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes popIn {
            from { transform: scale(0); opacity: 0; }
            to   { transform: scale(1); opacity: 1; }
        }

        .success-state h2 {
            font-size: 1.5rem;
            font-weight: 900;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .success-state p {
            font-size: 0.88rem;
            font-weight: 300;
            color: var(--text);
            line-height: 1.7;
            margin-bottom: 6px;
        }

        .success-state .highlight {
            color: var(--primary);
            font-weight: 700;
        }

        .success-banner {
            background: linear-gradient(135deg, #fdf4fa, #f0d4e8);
            border: 1.5px solid rgba(166,71,134,0.25);
            border-radius: 14px;
            padding: 16px 20px;
            margin: 20px 0;
            font-size: 0.85rem;
            line-height: 1.6;
            color: var(--text);
        }

        .back-btn {
            display: inline-block;
            margin-top: 8px;
            color: var(--primary);
            font-size: 0.82rem;
            font-weight: 500;
            text-decoration: none;
            border-bottom: 1px solid rgba(166,71,134,0.3);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            font-size: 0.75rem;
            color: rgba(74,58,78,0.45);
        }

        @media (max-width: 520px) {
            .card { padding: 36px 24px; border-radius: 20px; }
            .ribbon-corner { width: 70px; }
        }
    </style>
</head>
<body>

<div class="page-wrap">
    <div class="card">
        <!-- Pita dekoratif -->
        <img src="pita.png" alt="" class="ribbon-corner" aria-hidden="true">

        <!-- Logo -->
        <div class="logo-wrap">
            <img src="LOGO-APOTEK-PARAHYANGAN.png" alt="Logo Apotek Parahyangan Suite">
        </div>

        <!-- Form state -->
        <div id="formState">
            <div style="text-align:center; margin-bottom: 20px;">
                <span class="card-badge">✦ Grand Opening ✦</span>
                <h1 class="card-title">Daftar sebagai<br><span>Tamu Undangan</span></h1>
                <p class="card-subtitle">Isi data Anda untuk konfirmasi kehadiran di Grand Opening Apotek Parahyangan Suite, <strong>19 April 2026</strong>.</p>
            </div>

            <!-- Promo banner -->
            <div class="promo-banner">
                <div class="promo-icon">🎁</div>
                <div class="promo-text">
                    <h3>Dapatkan Penawaran Spesial!</h3>
                    <p>Tamu yang mendaftar akan mendapatkan <strong>voucher diskon eksklusif</strong> dan <strong>hadiah kejutan</strong> khusus di hari Grand Opening. Jangan sampai terlewat!</p>
                </div>
            </div>

            <form id="tamuForm">
                <div class="form-group">
                    <label for="tamu-name">Nama Lengkap</label>
                    <div class="input-wrap">
                        <span class="input-icon">👤</span>
                        <input type="text" id="tamu-name" name="name" placeholder="Masukkan nama lengkap Anda" maxlength="100" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tamu-phone">Nomor WhatsApp</label>
                    <div class="input-wrap">
                        <span class="input-icon">📱</span>
                        <input type="tel" id="tamu-phone" name="phone" placeholder="Contoh: 08123456789" maxlength="20" required>
                    </div>
                </div>
                <button type="submit" class="submit-btn" id="submitBtn">✦ Daftar & Dapatkan Penawaran</button>
                <div id="form-msg"></div>
            </form>
        </div>

        <!-- Success state -->
        <div class="success-state" id="successState">
            <div class="success-icon">🎉</div>
            <h2>Pendaftaran Berhasil!</h2>
            <p>Terima kasih, <span class="highlight" id="successName"></span>!</p>
            <p>Data Anda telah kami terima. Kami akan menghubungi Anda melalui WhatsApp untuk informasi penawaran spesial Grand Opening.</p>
            <div class="success-banner">
                🎁 <strong>Penawaran spesial</strong> menanti Anda di hari Grand Opening.<br>
                Tunjukkan nomor WhatsApp Anda saat hadir untuk mendapatkan hadiah kejutan!
            </div>
            <a href="index.php" class="back-btn">← Kembali ke halaman undangan</a>
        </div>
    </div>
</div>

<footer>© 2026 Apotek Parahyangan Suite. All rights reserved.</footer>

<script>
document.getElementById('tamuForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn  = document.getElementById('submitBtn');
    const msg  = document.getElementById('form-msg');
    const name = document.getElementById('tamu-name').value.trim();

    btn.disabled = true;
    btn.textContent = 'Mendaftarkan...';
    msg.textContent = '';
    msg.className = '';

    try {
        const fd = new FormData(this);
        const res  = await fetch('submit-tamu.php', { method: 'POST', body: fd });
        const data = await res.json();

        if (data.success) {
            document.getElementById('formState').style.display = 'none';
            document.getElementById('successName').textContent = name;
            const ss = document.getElementById('successState');
            ss.style.display = 'block';
        } else {
            msg.textContent = '⚠ ' + data.message;
            msg.className = 'msg-error';
            btn.disabled = false;
            btn.textContent = '✦ Daftar & Dapatkan Penawaran';
        }
    } catch {
        msg.textContent = '⚠ Terjadi kesalahan. Coba lagi.';
        msg.className = 'msg-error';
        btn.disabled = false;
        btn.textContent = '✦ Daftar & Dapatkan Penawaran';
    }
});
</script>

</body>
</html>
