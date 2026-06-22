<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - SMA PGRI 1 Subang</title>
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
        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
        .page-title h2 { font-weight: 800; font-size: 24px; color: var(--dark); }
        .page-title p { color: var(--text-gray); font-size: 14px; }
        .card-panel { background: white; border-radius: 20px; padding: 25px; border: 1px solid var(--border); box-shadow: 0 4px 15px rgba(0,0,0,0.04); }
        .summary-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px; }
        .summary-card { text-align: center; padding: 25px; border-radius: 16px; }
        .summary-card .num { font-size: 36px; font-weight: 800; }
        .summary-card .lbl { font-size: 14px; font-weight: 600; margin-top: 5px; }
        .table th { font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-gray); border-top: none; }
        .table td { vertical-align: middle; font-size: 13px; }
        .print-btn { position: fixed; bottom: 30px; right: 30px; z-index: 999; }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon" style="background:none;box-shadow:none;border-radius:0;"><img src="<?= base_url('logo%20pgri.png') ?>" alt="Logo" style="width:50px;height:auto;"></div>
        <div><h5>SMA PGRI 1</h5><small>Panel Admin</small></div>
    </div>
    <a href="<?= base_url('admin/dashboard') ?>" class="nav-item"><i class="fa-solid fa-chart-pie"></i><span>Dashboard</span></a>
    <a href="<?= base_url('admin/siswa') ?>" class="nav-item"><i class="fa-solid fa-users"></i><span>Data Siswa</span></a>
    <a href="<?= base_url('admin/alumni') ?>" class="nav-item"><i class="fa-solid fa-user-graduate"></i><span>Data Alumni</span></a>
    <a href="<?= base_url('admin/tracer') ?>" class="nav-item"><i class="fa-solid fa-clipboard-list"></i><span>Tracer Study</span></a>
    <a href="<?= base_url('admin/laporan') ?>" class="nav-item active"><i class="fa-solid fa-chart-bar"></i><span>Laporan</span></a>
    

    <a href="<?= base_url('admin/pengaturan-kelulusan') ?>" class="nav-item"><i class="fa-solid fa-clock"></i><span>Pengaturan Kelulusan</span></a>
    <a href="<?= base_url('admin/keterserapan') ?>" class="nav-item"><i class="fa-solid fa-chart-line"></i><span>Keterserapan</span></a>
    <div class="sidebar-footer"><a href="<?= base_url('logout') ?>" class="nav-item"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></div>
</div>
<div class="main-content">
    <div class="top-bar">
        <div class="page-title">
            <h2>Laporan & Statistik</h2>
            <p>Rekapitulasi data kelulusan, alumni, dan tracer study</p>
        </div>
        <button onclick="window.print()" class="btn btn-dark rounded-pill px-4 py-2"><i class="fa-solid fa-print me-1"></i> Cetak Laporan</button>
    </div>

    <div class="summary-grid">
        <div class="summary-card" style="background:#eef2ff;">
            <div class="num" style="color:var(--primary);"><?= $total_siswa ?></div>
            <div class="lbl" style="color:var(--dark);">Total Siswa</div>
        </div>
        <div class="summary-card" style="background:#f0fdf4;">
            <div class="num" style="color:var(--secondary);"><?= $total_alumni ?></div>
            <div class="lbl" style="color:var(--dark);">Total Alumni</div>
        </div>
        <div class="summary-card" style="background:#fffbeb;">
            <div class="num" style="color:#f59e0b;"><?= $total_tracer ?></div>
            <div class="lbl" style="color:var(--dark);">Respon Tracer</div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card-panel">
                <h5 style="font-weight:700;margin-bottom:20px;"><i class="fa-solid fa-chart-simple me-2" style="color:var(--primary);"></i> Statistik Kelulusan</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead><tr><th>Tahun</th><th>Total</th><th>Lulus</th><th>%</th></tr></thead>
                        <tbody>
                            <?php if(!empty($statistik_kelulusan)): ?>
                                <?php foreach($statistik_kelulusan as $s): ?>
                                <tr><td><?= $s['tahun_lulus'] ?></td><td><?= $s['total'] ?></td><td><?= $s['lulus'] ?></td><td><?= $s['total']>0 ? round(($s['lulus']/$s['total'])*100,1) : 0 ?>%</td></tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="4" class="text-center text-muted">Belum ada data.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-panel">
                <h5 style="font-weight:700;margin-bottom:20px;"><i class="fa-solid fa-chart-simple me-2" style="color:var(--secondary);"></i> Statistik Alumni</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead><tr><th>Status</th><th>Jumlah</th></tr></thead>
                        <tbody>
                            <?php if(!empty($statistik_alumni)): ?>
                                <?php foreach($statistik_alumni as $sa): ?>
                                <tr><td><?= $sa['status_aktivitas'] ?></td><td><?= $sa['total'] ?></td></tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="2" class="text-center text-muted">Belum ada data.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card-panel">
                <h5 style="font-weight:700;margin-bottom:20px;"><i class="fa-solid fa-chart-simple me-2" style="color:#f59e0b;"></i> Statistik Tracer Study</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead><tr><th>Status Setelah Lulus</th><th>Jumlah</th></tr></thead>
                        <tbody>
                            <?php if(!empty($statistik_tracer)): ?>
                                <?php foreach($statistik_tracer as $st): ?>
                                <tr><td><?= str_replace('_', ' ', $st['status_setelah_lulus']) ?></td><td><?= $st['total'] ?></td></tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="2" class="text-center text-muted">Belum ada data.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


