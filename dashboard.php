<?php
require_once 'config.php';
session_start();

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    if ($_POST['password'] === ADMIN_PASSWORD) {
        $_SESSION['admin'] = true;
    } else {
        $loginError = 'Password salah.';
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: dashboard.php');
    exit;
}

$isAdmin = !empty($_SESSION['admin']);
$rsvpList   = $isAdmin ? getRsvp() : [];
$wishesList = $isAdmin ? array_reverse(getWishes()) : [];
$tamuList   = $isAdmin ? array_reverse(getTamu()) : [];

$totalHadir  = count(array_filter($rsvpList, fn($r) => $r['attendance'] === 'hadir'));
$totalTidak  = count(array_filter($rsvpList, fn($r) => $r['attendance'] === 'tidak'));
$totalTamu   = array_sum(array_column(array_filter($rsvpList, fn($r) => $r['attendance'] === 'hadir'), 'guests'));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin – Apotek Parahyangan Suite</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap');
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Regular.woff2') format('woff2'); font-weight:400; font-display:swap; }
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Bold.woff2') format('woff2'); font-weight:700; font-display:swap; }
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Light.woff2') format('woff2'); font-weight:300; font-display:swap; }
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Heavy.woff2') format('woff2'); font-weight:900; font-display:swap; }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --sage-900: #6d7560;
            --sage-800: #7b836c;
            --sage-700: #8d957c;
            --sage-500: #aab091;
            --sage-300: #d6dbc8;
            --sage-150: #edf0e6;
            --paper:   #f7f2e8;
            --paper-2: #fcfaf5;
            --paper-3: #f2ebde;
            --ink:     #3f372d;
            --muted:   #6e6658;
            --line:    rgba(70,61,50,0.10);
            --shadow:  0 22px 58px rgba(52,43,35,0.12);
            --shadow-soft: 0 12px 30px rgba(52,43,35,0.08);
            --green: #4a7c59;
            --green-bg: #eaf3ec;
            --red:   #8b3a2f;
            --red-bg:#f9eae8;
            --radius-xl: 30px;
            --radius-lg: 24px;
            --radius-md: 18px;
        }

        body {
            font-family: 'Alegreya Sans', 'Segoe UI', system-ui, sans-serif;
            background: var(--paper);
            color: var(--ink);
            min-height: 100vh;
        }

        /* ── LOGIN ── */
        .login-wrap {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-box {
            background: linear-gradient(180deg, rgba(255,253,248,0.98), rgba(247,240,229,0.98));
            border: 1px solid rgba(70,61,50,0.07);
            border-radius: var(--radius-xl);
            padding: 52px 44px;
            width: 100%;
            max-width: 420px;
            box-shadow: var(--shadow);
            text-align: center;
        }

        .login-box img { width: 110px; margin: 0 auto 24px; }

        .login-kicker {
            font-size: 0.68rem;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--sage-800);
            margin-bottom: 8px;
        }

        .login-box h1 {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--ink);
            letter-spacing: -0.03em;
            margin-bottom: 8px;
        }

        .login-box p {
            font-size: 0.88rem;
            color: var(--muted);
            margin-bottom: 28px;
            font-weight: 300;
            line-height: 1.7;
        }

        .login-box input[type=password] {
            width: 100%;
            padding: 14px 18px;
            border: 1.5px solid rgba(109,117,96,0.22);
            border-radius: var(--radius-md);
            font-family: inherit;
            font-size: 0.95rem;
            color: var(--ink);
            background: rgba(255,255,255,0.72);
            outline: none;
            margin-bottom: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .login-box input[type=password]:focus {
            border-color: var(--sage-700);
            box-shadow: 0 0 0 3px rgba(141,149,124,0.14);
        }

        .login-box button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #8b9377, #6f775f);
            color: #fff;
            border: none;
            border-radius: 999px;
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 12px 24px rgba(111,119,95,0.22);
            transition: transform 180ms ease, box-shadow 180ms ease;
        }

        .login-box button:hover { transform: translateY(-2px); }

        .error-msg {
            color: var(--red);
            font-size: 0.84rem;
            margin-top: 14px;
            background: var(--red-bg);
            padding: 10px 16px;
            border-radius: var(--radius-md);
        }

        /* ── TOPBAR ── */
        .topbar {
            background: linear-gradient(180deg, rgba(255,253,248,0.98), rgba(247,240,229,0.95));
            border-bottom: 1px solid rgba(70,61,50,0.08);
            color: var(--ink);
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            box-shadow: 0 4px 18px rgba(52,43,35,0.07);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-left { display: flex; align-items: center; gap: 14px; }
        .topbar-title { font-family: 'Arena Uno', sans-serif; }
        .topbar-title h1 { font-size: 1.05rem; font-weight: 700; color: var(--ink); line-height: 1.2; }
        .topbar-title span { font-size: 0.72rem; font-weight: 300; color: var(--muted); display: block; letter-spacing: 0.06em; text-transform: uppercase; margin-top: 1px; }

        .logout-btn {
            background: rgba(255,255,255,0.72);
            color: var(--sage-800);
            border: 1px solid rgba(109,117,96,0.22);
            padding: 8px 22px;
            border-radius: 999px;
            font-family: inherit;
            font-size: 0.8rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
            letter-spacing: 0.04em;
        }

        .logout-btn:hover { background: rgba(255,255,255,0.95); }

        /* ── DASHBOARD BODY ── */
        .dashboard-body { padding: 28px 32px; max-width: 1140px; margin: 0 auto; }

        .dash-kicker {
            font-size: 0.66rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--sage-800);
            margin-bottom: 4px;
        }

        .dash-heading {
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: var(--ink);
            margin-bottom: 24px;
            line-height: 1.2;
        }

        /* ── STATS ── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 14px;
            margin-bottom: 32px;
            padding-bottom: 32px;
            border-bottom: 1px solid rgba(70,61,50,0.08);
        }

        .stat-card {
            background: linear-gradient(180deg, rgba(255,253,248,0.98), rgba(247,240,229,0.98));
            border: 1px solid rgba(70,61,50,0.07);
            border-radius: var(--radius-lg);
            padding: 24px 20px;
            text-align: center;
            box-shadow: var(--shadow-soft);
            border-top: 3px solid var(--sage-500);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 50% 0%, rgba(255,255,255,0.45), transparent 55%);
            pointer-events: none;
        }

        .stat-card.green { border-top-color: var(--green); }
        .stat-card.red   { border-top-color: var(--red); }

        .stat-num {
            font-family: 'Arena Uno', sans-serif;
            font-size: 2.6rem;
            font-weight: 900;
            color: var(--sage-800);
            line-height: 1;
            position: relative;
        }

        .stat-card.green .stat-num { color: var(--green); }
        .stat-card.red   .stat-num { color: var(--red); }

        .stat-label {
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--muted);
            margin-top: 7px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            position: relative;
        }

        /* ── TABS ── */
        .tabs {
            display: flex;
            gap: 4px;
            margin-bottom: 20px;
            border-bottom: 2px solid rgba(70,61,50,0.08);
        }

        .tab-btn {
            padding: 10px 22px;
            border: none;
            background: none;
            font-family: inherit;
            font-size: 0.86rem;
            font-weight: 700;
            color: var(--muted);
            cursor: pointer;
            border-bottom: 3px solid transparent;
            margin-bottom: -2px;
            transition: color 0.2s, border-color 0.2s;
            letter-spacing: 0.02em;
        }

        .tab-btn.active {
            color: var(--sage-900);
            border-bottom-color: var(--sage-700);
        }

        .tab-btn:hover:not(.active) { color: var(--ink); }

        .tab-panel { display: none; }
        .tab-panel.active { display: block; }

        /* ── TABLE WRAP ── */
        .table-wrap {
            background: linear-gradient(180deg, rgba(255,253,248,0.98), rgba(247,240,229,0.98));
            border: 1px solid rgba(70,61,50,0.07);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-soft);
            overflow: hidden;
        }

        .table-header {
            padding: 20px 24px;
            border-bottom: 1px solid rgba(70,61,50,0.07);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .table-header h2 {
            font-size: 0.94rem;
            font-weight: 700;
            color: var(--ink);
            letter-spacing: 0.01em;
        }

        .export-btn {
            background: linear-gradient(135deg, #8b9377, #6f775f);
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 999px;
            font-family: inherit;
            font-size: 0.78rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 6px 16px rgba(111,119,95,0.2);
            transition: transform 180ms ease;
        }

        .export-btn:hover { transform: translateY(-1px); }

        .table-scroll { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.87rem;
        }

        thead th {
            background: rgba(237,240,230,0.55);
            color: var(--sage-800);
            font-weight: 700;
            padding: 12px 16px;
            text-align: left;
            font-size: 0.7rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        tbody tr { border-bottom: 1px solid rgba(70,61,50,0.06); }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: rgba(237,240,230,0.28); }

        tbody td {
            padding: 13px 16px;
            color: var(--muted);
            vertical-align: middle;
        }

        tbody td:nth-child(2) { color: var(--ink); font-weight: 500; }

        .badge-hadir {
            background: var(--green-bg);
            color: var(--green);
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 0.76rem;
            font-weight: 700;
            letter-spacing: 0.04em;
        }

        .badge-tidak {
            background: var(--red-bg);
            color: var(--red);
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 0.76rem;
            font-weight: 700;
            letter-spacing: 0.04em;
        }

        .empty-state {
            text-align: center;
            padding: 56px 20px;
            color: var(--sage-500);
            font-style: italic;
            font-size: 0.92rem;
        }

        .wish-msg-cell {
            max-width: 380px;
            font-style: italic;
            color: var(--muted);
            font-size: 0.85rem;
            line-height: 1.6;
        }

        @media (max-width: 640px) {
            .topbar { padding: 12px 16px; }
            .dashboard-body { padding: 24px 14px; }
            .login-box { padding: 36px 22px; }
            .tab-btn { padding: 8px 12px; font-size: 0.8rem; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
</head>
<body>

<?php if (!$isAdmin): ?>
<!-- LOGIN -->
<div class="login-wrap">
    <div class="login-box">
        <p class="login-kicker">Admin Area</p>
        <h1>Dashboard Admin</h1>
        <p>Masukkan password untuk melihat data kehadiran &amp; reservasi.</p>
        <form method="POST">
            <input type="password" name="password" placeholder="Password admin..." autofocus required>
            <button type="submit">Masuk →</button>
        </form>
        <?php if (!empty($loginError)): ?>
            <p class="error-msg">⚠ <?= htmlspecialchars($loginError) ?></p>
        <?php endif; ?>
    </div>
</div>

<?php else: ?>
<!-- DASHBOARD -->
<div class="topbar">
    <div class="topbar-left">
        <div class="topbar-title">
            <h1>Dashboard Kehadiran</h1>
            <span>25 | 50 · A Journey of Learning, Beauty &amp; Life</span>
        </div>
    </div>
    <a href="?logout=1" class="logout-btn">Keluar</a>
</div>

<div class="dashboard-body">

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-num"><?= count($rsvpList) ?></div>
            <div class="stat-label">Total Responden</div>
        </div>
        <div class="stat-card green">
            <div class="stat-num"><?= $totalHadir ?></div>
            <div class="stat-label">Konfirmasi Hadir</div>
        </div>
        <div class="stat-card red">
            <div class="stat-num"><?= $totalTidak ?></div>
            <div class="stat-label">Tidak Hadir</div>
        </div>
        <div class="stat-card">
            <div class="stat-num"><?= $totalTamu ?></div>
            <div class="stat-label">Estimasi Tamu</div>
        </div>
        <div class="stat-card">
            <div class="stat-num"><?= count($wishesList) ?></div>
            <div class="stat-label">Total Ucapan</div>
        </div>
        <div class="stat-card">
            <div class="stat-num"><?= count($tamuList) ?></div>
            <div class="stat-label">Tamu Terdaftar</div>
        </div>
    </div>

    <!-- Tabs -->
    <div class="tabs">
        <button class="tab-btn active" onclick="switchTab('kehadiran', this)">🎟 Kehadiran (<?= count($rsvpList) ?>)</button>
        <button class="tab-btn" onclick="switchTab('ucapan', this)">💌 Ucapan (<?= count($wishesList) ?>)</button>
        <button class="tab-btn" onclick="switchTab('tamu', this)">👤 Tamu (<?= count($tamuList) ?>)</button>
    </div>

    <!-- Tab: Kehadiran -->
    <div class="tab-panel active" id="tab-kehadiran">
        <div class="table-wrap">
            <div class="table-header">
                <h2>Daftar Konfirmasi Kehadiran</h2>
                <a href="export.php" class="export-btn">⬇ Export Excel</a>
            </div>
            <div class="table-scroll">
                <?php if (empty($rsvpList)): ?>
                    <div class="empty-state">Belum ada data konfirmasi kehadiran.</div>
                <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>No. HP</th>
                            <th>Kehadiran</th>
                            <th>Jumlah Tamu</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_reverse($rsvpList) as $i => $r): ?>
                        <tr>
                            <td><?= count($rsvpList) - $i ?></td>
                            <td><?= $r['name'] ?></td>
                            <td><?= $r['phone'] ?: '-' ?></td>
                            <td>
                                <?php if ($r['attendance'] === 'hadir'): ?>
                                    <span class="badge-hadir">✓ Hadir</span>
                                <?php else: ?>
                                    <span class="badge-tidak">✗ Tidak Hadir</span>
                                <?php endif; ?>
                            </td>
                            <td><?= $r['attendance'] === 'hadir' ? $r['guests'] . ' orang' : '-' ?></td>
                            <td><?= $r['time'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Tab: Ucapan -->
    <div class="tab-panel" id="tab-ucapan">
        <div class="table-wrap">
            <div class="table-header">
                <h2>Daftar Ucapan & Doa</h2>
                <a href="export.php?type=ucapan" class="export-btn">⬇ Export Excel</a>
            </div>
            <div class="table-scroll">
                <?php if (empty($wishesList)): ?>
                    <div class="empty-state">Belum ada ucapan masuk.</div>
                <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Ucapan / Doa</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($wishesList as $i => $w): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $w['name'] ?></td>
                            <td class="wish-msg-cell">"<?= $w['message'] ?>"</td>
                            <td><?= $w['time'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Tab: Tamu Terdaftar -->
    <div class="tab-panel" id="tab-tamu">
        <div class="table-wrap">
            <div class="table-header">
                <h2>Daftar Tamu Terdaftar</h2>
                <a href="export.php?type=tamu" class="export-btn">⬇ Export Excel</a>
            </div>
            <div class="table-scroll">
                <?php if (empty($tamuList)): ?>
                    <div class="empty-state">Belum ada tamu yang mendaftar.</div>
                <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>No. WhatsApp</th>
                            <th>Waktu Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tamuList as $i => $t): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $t['name'] ?></td>
                            <td><?= $t['phone'] ?></td>
                            <td><?= $t['time'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

<script>
function switchTab(name, btn) {
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.getElementById('tab-' + name).classList.add('active');
    btn.classList.add('active');
}
</script>
</div>
<?php endif; ?>

</body>
</html>
