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
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Regular.woff2') format('woff2'); font-weight:400; font-display:swap; }
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Bold.woff2') format('woff2'); font-weight:700; font-display:swap; }
        @font-face { font-family:'Arena Uno'; src:url('Web-Fonts/ArenaUno-Light.woff2') format('woff2'); font-weight:300; font-display:swap; }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary: #A64786;
            --primary-dark: #8a3870;
            --pale: #fdf4fa;
            --dark: #2a1a2e;
            --text: #4a3a4e;
            --green: #2e7d32;
            --red: #c62828;
        }

        body {
            font-family: 'Arena Uno', sans-serif;
            background: var(--pale);
            color: var(--text);
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
            background: #fff;
            border-radius: 20px;
            padding: 48px 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 12px 40px rgba(166,71,134,0.15);
            text-align: center;
        }

        .login-box img { width: 120px; margin-bottom: 24px; }

        .login-box h1 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 6px;
        }

        .login-box p {
            font-size: 0.85rem;
            color: var(--text);
            margin-bottom: 28px;
            font-weight: 300;
        }

        .login-box input[type=password] {
            width: 100%;
            padding: 14px 18px;
            border: 1.5px solid rgba(166,71,134,0.3);
            border-radius: 12px;
            font-family: 'Arena Uno', sans-serif;
            font-size: 0.95rem;
            color: var(--dark);
            outline: none;
            margin-bottom: 16px;
            transition: border-color 0.2s;
        }

        .login-box input[type=password]:focus { border-color: var(--primary); }

        .login-box button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            border: none;
            border-radius: 12px;
            font-family: 'Arena Uno', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(166,71,134,0.35);
        }

        .error-msg { color: var(--red); font-size: 0.85rem; margin-top: 12px; }

        /* ── DASHBOARD ── */
        .topbar {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            padding: 18px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .topbar-left { display: flex; align-items: center; gap: 14px; }
        .topbar-left img { width: 48px; height: auto; }
        .topbar-left h1 { font-size: 1.1rem; font-weight: 700; }
        .topbar-left span { font-size: 0.78rem; font-weight: 300; opacity: 0.85; display: block; }

        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: #fff;
            border: 1px solid rgba(255,255,255,0.4);
            padding: 8px 20px;
            border-radius: 50px;
            font-family: 'Arena Uno', sans-serif;
            font-size: 0.82rem;
            cursor: pointer;
            text-decoration: none;
        }

        .dashboard-body { padding: 32px 24px; max-width: 1100px; margin: 0 auto; }

        /* Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 16px;
            margin-bottom: 36px;
        }

        .stat-card {
            background: #fff;
            border-radius: 16px;
            padding: 24px 20px;
            text-align: center;
            box-shadow: 0 4px 16px rgba(166,71,134,0.08);
            border-top: 4px solid var(--primary);
        }

        .stat-card.green { border-top-color: var(--green); }
        .stat-card.red   { border-top-color: var(--red); }

        .stat-card .stat-num {
            font-size: 2.4rem;
            font-weight: 900;
            color: var(--primary);
            line-height: 1;
        }

        .stat-card.green .stat-num { color: var(--green); }
        .stat-card.red   .stat-num { color: var(--red); }

        .stat-card .stat-label {
            font-size: 0.78rem;
            font-weight: 300;
            color: var(--text);
            margin-top: 6px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Table */
        .table-wrap {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(166,71,134,0.08);
            overflow: hidden;
        }

        .table-header {
            padding: 20px 24px;
            border-bottom: 1px solid #f0e0ec;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .table-header h2 { font-size: 1rem; font-weight: 700; color: var(--dark); }

        .export-btn {
            background: var(--primary);
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 50px;
            font-family: 'Arena Uno', sans-serif;
            font-size: 0.8rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .table-scroll { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.88rem;
        }

        thead th {
            background: var(--pale);
            color: var(--primary);
            font-weight: 700;
            padding: 12px 16px;
            text-align: left;
            font-size: 0.75rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        tbody tr { border-bottom: 1px solid #f5edf8; }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: #fdf4fa; }

        tbody td { padding: 14px 16px; color: var(--text); vertical-align: middle; }

        .badge-hadir {
            background: #e8f5e9;
            color: var(--green);
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 700;
        }

        .badge-tidak {
            background: #fce4e4;
            color: var(--red);
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 700;
        }

        .empty-state {
            text-align: center;
            padding: 48px 20px;
            color: #ccc;
            font-style: italic;
            font-size: 0.9rem;
        }

        /* ── TABS ── */
        .tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 24px;
            border-bottom: 2px solid #f0e0ec;
        }

        .tab-btn {
            padding: 10px 24px;
            border: none;
            background: none;
            font-family: 'Arena Uno', sans-serif;
            font-size: 0.88rem;
            font-weight: 700;
            color: var(--text);
            cursor: pointer;
            border-bottom: 3px solid transparent;
            margin-bottom: -2px;
            transition: color 0.2s, border-color 0.2s;
        }

        .tab-btn.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }

        .tab-panel { display: none; }
        .tab-panel.active { display: block; }

        /* wish message cell */
        .wish-msg-cell {
            max-width: 360px;
            font-style: italic;
            color: var(--text);
            font-size: 0.85rem;
        }

        @media (max-width: 600px) {
            .topbar { padding: 14px 16px; }
            .dashboard-body { padding: 20px 12px; }
            .login-box { padding: 32px 20px; }
            .tab-btn { padding: 8px 14px; font-size: 0.8rem; }
        }
    </style>
</head>
<body>

<?php if (!$isAdmin): ?>
<!-- LOGIN -->
<div class="login-wrap">
    <div class="login-box">
        <img src="LOGO-APOTEK-PARAHYANGAN.png" alt="Logo">
        <h1>Dashboard Admin</h1>
        <p>Masukkan password untuk melihat data kehadiran</p>
        <form method="POST">
            <input type="password" name="password" placeholder="Password admin..." autofocus required>
            <button type="submit">Masuk</button>
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
        <img src="LOGO-APOTEK-PARAHYANGAN.png" alt="Logo">
        <div>
            <h1>Dashboard Kehadiran</h1>
            <span>Grand Opening – Apotek Parahyangan Suite</span>
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
