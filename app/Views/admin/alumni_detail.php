<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Alumni - SMA PGRI 1 Subang</title>
    <link rel="icon" type="image/png" href="<?= base_url('logo%20pgri.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #6366f1; --dark: #0f172a; --text-gray: #64748b; --light-bg: #f1f5f9; --border: #e2e8f0; }
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
        .card-panel { background: white; border-radius: 20px; padding: 30px; border: 1px solid var(--border); box-shadow: 0 4px 15px rgba(0,0,0,0.04); }
        .info-label { font-size: 12px; color: var(--text-gray); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
        .info-value { font-size: 16px; font-weight: 600; color: var(--dark); }
        .status-badge { padding: 8px 20px; border-radius: 50px; font-weight: 700; font-size: 14px; display: inline-block; }
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
    <a href="<?= base_url('admin/alumni') ?>" class="nav-item active"><i class="fa-solid fa-user-graduate"></i><span>Data Alumni</span></a>
    <a href="<?= base_url('admin/tracer') ?>" class="nav-item"><i class="fa-solid fa-clipboard-list"></i><span>Tracer Study</span></a>
    <a href="<?= base_url('admin/laporan') ?>" class="nav-item"><i class="fa-solid fa-chart-bar"></i><span>Laporan</span></a>
    

    <a href="<?= base_url('admin/pengaturan-kelulusan') ?>" class="nav-item"><i class="fa-solid fa-clock"></i><span>Pengaturan Kelulusan</span></a>
    <a href="<?= base_url('admin/keterserapan') ?>" class="nav-item"><i class="fa-solid fa-chart-line"></i><span>Keterserapan</span></a>
    <div class="sidebar-footer"><a href="<?= base_url('logout') ?>" class="nav-item"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></div>
</div>
<div class="main-content">
    <div class="top-bar">
        <div class="page-title">
            <h2>Detail Alumni</h2>
        </div>
        <a href="<?= base_url('admin/alumni') ?>" class="btn btn-outline-secondary rounded-pill px-4"><i class="fa-solid fa-arrow-left me-1"></i> Kembali</a>
    </div>
    <div class="card-panel">
        <div class="row align-items-center mb-4">
            <div class="col-auto">
                <div style="width:80px;height:80px;border-radius:20px;background:linear-gradient(135deg,#6366f1,#a855f7);display:flex;align-items:center;justify-content:center;color:white;font-size:32px;">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>
            </div>
            <div class="col">
                <h3 style="font-weight:800;"><?= $alumni['nama_alumni'] ?></h3>
                <span class="status-badge" style="background:<?= $alumni['status_aktivitas'] == 'BEKERJA' ? '#f0fdf4' : ($alumni['status_aktivitas'] == 'KULIAH' ? '#eef2ff' : ($alumni['status_aktivitas'] == 'WIRAUSAHA' ? '#fffbeb' : '#f1f5f9')) ?>;color:<?= $alumni['status_aktivitas'] == 'BEKERJA' ? '#10b981' : ($alumni['status_aktivitas'] == 'KULIAH' ? '#6366f1' : ($alumni['status_aktivitas'] == 'WIRAUSAHA' ? '#f59e0b' : '#64748b')) ?>">
                    <?= $alumni['status_aktivitas'] ?>
                </span>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="info-label">NISN</div>
                <div class="info-value"><?= $alumni['nisn'] ?></div>
            </div>
            <div class="col-md-6">
                <div class="info-label">Jenis Kelamin</div>
                <div class="info-value"><?= $alumni['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></div>
            </div>
            <div class="col-md-6">
                <div class="info-label">Tahun Lulus</div>
                <div class="info-value"><?= $alumni['tahun_lulus'] ?></div>
            </div>
            <div class="col-md-6">
                <div class="info-label">No. HP</div>
                <div class="info-value"><?= $alumni['no_hp'] ?: '-' ?></div>
            </div>
            <div class="col-md-6">
                <div class="info-label">Email</div>
                <div class="info-value"><?= $alumni['email'] ?: '-' ?></div>
            </div>
            <div class="col-md-6">
                <div class="info-label">Alamat</div>
                <div class="info-value"><?= $alumni['alamat'] ?: '-' ?></div>
            </div>
            <?php if($alumni['status_aktivitas'] == 'KULIAH'): ?>
            <div class="col-md-6">
                <div class="info-label">Perguruan Tinggi</div>
                <div class="info-value"><?= $alumni['nama_instansi'] ?: '-' ?></div>
            </div>
            <div class="col-md-6">
                <div class="info-label">Jurusan Kuliah</div>
                <div class="info-value"><?= $alumni['jurusan_kuliah'] ?: '-' ?></div>
            </div>
            <?php elseif($alumni['status_aktivitas'] == 'BEKERJA'): ?>
            <div class="col-md-6">
                <div class="info-label">Perusahaan</div>
                <div class="info-value"><?= $alumni['nama_instansi'] ?: '-' ?></div>
            </div>
            <div class="col-md-6">
                <div class="info-label">Posisi</div>
                <div class="info-value"><?= $alumni['posisi_kerja'] ?: '-' ?></div>
            </div>
            <?php elseif($alumni['status_aktivitas'] == 'WIRAUSAHA'): ?>
            <div class="col-md-6">
                <div class="info-label">Bidang Usaha</div>
                <div class="info-value"><?= $alumni['nama_instansi'] ?: '-' ?></div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


