<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kepala Sekolah - SMA PGRI 1 Subang</title>
    <link rel="icon" type="image/png" href="<?= base_url('logo%20pgri.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #6366f1; --secondary: #10b981; --dark: #0f172a; --text-gray: #64748b; --light-bg: #f1f5f9; --border: #e2e8f0; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--light-bg); display: flex; min-height: 100vh; }
        .sidebar { width: 280px; background: var(--dark); color: white; padding: 30px 20px; display: flex; flex-direction: column; position: fixed; top: 0; left: 0; height: 100vh; z-index: 1000; }
        .sidebar-brand { display: flex; align-items: center; gap: 15px; padding-bottom: 30px; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 25px; }
        .sidebar-brand .brand-icon { width: 50px; height: 50px; background: linear-gradient(135deg, #6366f1, #a855f7); border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 22px; }
        .sidebar-brand h5 { font-weight: 800; font-size: 18px; margin: 0; }
        .sidebar-brand small { color: #94a3b8; font-size: 11px; }
        .nav-item { display: flex; align-items: center; gap: 14px; padding: 13px 18px; border-radius: 12px; color: #94a3b8; text-decoration: none; font-weight: 600; font-size: 14px; transition: all 0.3s; margin-bottom: 4px; }
        .nav-item:hover, .nav-item.active { background: rgba(99, 102, 241, 0.15); color: white; }
        .nav-item i { width: 20px; text-align: center; font-size: 16px; }
        .sidebar-footer { margin-top: auto; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px; }
        .main-content { margin-left: 280px; flex: 1; padding: 30px 35px; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px; }
        .page-title h2 { font-weight: 800; font-size: 26px; color: var(--dark); }
        .page-title p { color: var(--text-gray); font-size: 14px; }
        .profile-card { display: flex; align-items: center; gap: 15px; background: white; padding: 10px 20px; border-radius: 14px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
        .profile-card .avatar { width: 42px; height: 42px; border-radius: 50%; background: linear-gradient(135deg, #f59e0b, #ef4444); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; }
        .stat-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 35px; }
        .stat-card { background: white; border-radius: 20px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.04); border: 1px solid var(--border); }
        .stat-card .stat-icon { width: 55px; height: 55px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 18px; }
        .stat-card .stat-number { font-size: 32px; font-weight: 800; color: var(--dark); }
        .stat-card .stat-label { color: var(--text-gray); font-size: 14px; font-weight: 500; }
        .content-grid { display: grid; grid-template-columns: 1.5fr 1fr; gap: 25px; }
        .card-panel { background: white; border-radius: 20px; padding: 25px; border: 1px solid var(--border); box-shadow: 0 4px 15px rgba(0,0,0,0.04); }
        .card-panel h5 { font-weight: 700; font-size: 18px; margin-bottom: 20px; color: var(--dark); }
        .table th { font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-gray); border-top: none; }
        .table td { vertical-align: middle; font-size: 14px; }
        .badge-status { padding: 6px 14px; border-radius: 50px; font-weight: 600; font-size: 12px; }
        .timeline-item { display: flex; gap: 15px; padding: 15px 0; border-bottom: 1px solid var(--border); }
        .timeline-item:last-child { border-bottom: none; }
        .timeline-dot { width: 10px; height: 10px; border-radius: 50%; margin-top: 6px; flex-shrink: 0; }
        @media (max-width: 992px) { .stat-grid { grid-template-columns: repeat(2, 1fr); } .content-grid { grid-template-columns: 1fr; } }
        @media (max-width: 768px) { .sidebar { width: 70px; padding: 20px 10px; } .sidebar-brand h5, .sidebar-brand small, .nav-item span, .sidebar-footer span { display: none; } .main-content { margin-left: 70px; padding: 20px; } .stat-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon" style="background:none;box-shadow:none;border-radius:0;"><img src="<?= base_url('logo%20pgri.png') ?>" alt="Logo" style="width:50px;height:auto;"></div>
        <div>
            <h5>SMA PGRI 1</h5>
            <small>Kepala Sekolah</small>
        </div>
    </div>
    <a href="<?= base_url('kepsek/dashboard') ?>" class="nav-item active"><i class="fa-solid fa-chart-pie"></i><span>Dashboard</span></a>
    <a href="<?= base_url('kepsek/siswa') ?>" class="nav-item"><i class="fa-solid fa-users"></i><span>Data Siswa</span></a>
    <a href="<?= base_url('kepsek/alumni') ?>" class="nav-item"><i class="fa-solid fa-user-graduate"></i><span>Data Alumni</span></a>
    <a href="<?= base_url('kepsek/tracer') ?>" class="nav-item"><i class="fa-solid fa-clipboard-list"></i><span>Tracer Study</span></a>
    <a href="<?= base_url('kepsek/laporan') ?>" class="nav-item"><i class="fa-solid fa-chart-bar"></i><span>Laporan</span></a>
    <a href="<?= base_url('kepsek/pengaturan-kelulusan') ?>" class="nav-item"><i class="fa-solid fa-clock"></i><span>Pengaturan Kelulusan</span></a>
    <a href="<?= base_url('kepsek/keterserapan') ?>" class="nav-item"><i class="fa-solid fa-chart-line"></i><span>Keterserapan</span></a>
    <div class="sidebar-footer">
        <a href="<?= base_url('logout') ?>" class="nav-item"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
    </div>
</div>
<div class="main-content">
    <div class="top-bar">
        <div class="page-title">
            <h2>Dashboard</h2>
            <p>Selamat datang, Kepala Sekolah!</p>
        </div>
        <div class="profile-card">
            <div class="avatar"><i class="fa-solid fa-user-tie"></i></div>
            <div><strong style="font-size:14px;">Kepala Sekolah</strong><br><small style="color:var(--text-gray);">Drs. H. Asep Kahlan Husen, M.MPd.</small></div>
        </div>
    </div>
    <div class="stat-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background:#eef2ff;color:var(--primary);"><i class="fa-solid fa-users"></i></div>
            <div class="stat-number"><?= $total_siswa ?></div>
            <div class="stat-label">Total Siswa</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#f0fdf4;color:var(--secondary);"><i class="fa-solid fa-check-circle"></i></div>
            <div class="stat-number"><?= $total_lulus ?></div>
            <div class="stat-label">Siswa Lulus</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#e0e7ff;color:#4f46e5;"><i class="fa-solid fa-user-graduate"></i></div>
            <div class="stat-number"><?= $total_alumni ?></div>
            <div class="stat-label">Total Alumni</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#fffbeb;color:#f59e0b;"><i class="fa-solid fa-clipboard-check"></i></div>
            <div class="stat-number"><?= $total_tracer ?></div>
            <div class="stat-label">Respon Tracer</div>
        </div>
    </div>
    <div class="content-grid">
        <div class="card-panel">
            <h5><i class="fa-solid fa-chart-bar me-2" style="color:var(--primary);"></i> Statistik Kelulusan</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead><tr><th>Tahun</th><th>Total</th><th>Lulus</th><th>Tidak Lulus</th><th>%</th></tr></thead>
                    <tbody>
                        <?php if(!empty($statistik_kelulusan)): ?>
                            <?php foreach($statistik_kelulusan as $s): ?>
                            <tr>
                                <td><strong><?= $s['tahun_lulus'] ?></strong></td>
                                <td><?= $s['total'] ?></td>
                                <td><span class="badge-status" style="background:#f0fdf4;color:var(--secondary);"><?= $s['lulus'] ?></span></td>
                                <td><span class="badge-status" style="background:#fef2f2;color:#ef4444;"><?= $s['tidak_lulus'] ?></span></td>
                                <td><?= $s['total']>0 ? round(($s['lulus']/$s['total'])*100,1) : 0 ?>%</td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="text-center text-muted py-3">Belum ada data kelulusan.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-panel">
            <h5><i class="fa-solid fa-clock-rotate-left me-2" style="color:var(--secondary);"></i> Alumni Terbaru</h5>
            <?php if(!empty($alumni_terbaru)): ?>
                <?php foreach($alumni_terbaru as $a): ?>
                <div class="timeline-item">
                    <div class="timeline-dot" style="background:<?= $a['status_aktivitas']=='BEKERJA'?'#10b981':($a['status_aktivitas']=='KULIAH'?'#6366f1':($a['status_aktivitas']=='WIRAUSAHA'?'#f59e0b':'#94a3b8')) ?>"></div>
                    <div>
                        <strong style="font-size:14px;"><?= $a['nama_alumni'] ?></strong>
                        <br><small style="color:var(--text-gray);"><?= $a['status_aktivitas'] ?><?= $a['nama_instansi'] ? ' - '.$a['nama_instansi'] : '' ?></small>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted text-center py-3">Belum ada data alumni.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
