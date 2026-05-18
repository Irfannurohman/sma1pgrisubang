<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Alumni - SMA PGRI 1 Subang</title>
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
        .stat-mini { display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px; margin-bottom: 25px; }
        .stat-mini-item { background: var(--light-bg); border-radius: 12px; padding: 15px; text-align: center; }
        .stat-mini-item .num { font-size: 22px; font-weight: 800; color: var(--dark); }
        .stat-mini-item .lbl { font-size: 12px; color: var(--text-gray); font-weight: 600; }
        .btn-action { padding: 6px 14px; border-radius: 8px; font-size: 12px; font-weight: 600; }
        .badge-status { padding: 5px 12px; border-radius: 50px; font-weight: 600; font-size: 11px; }
        .table th { font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-gray); border-top: none; }
        .table td { vertical-align: middle; font-size: 13px; }
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
    <a href="<?= base_url('admin/laporan') ?>" class="nav-item"><i class="fa-solid fa-file-chart-bar"></i><span>Laporan</span></a>
    <div class="sidebar-footer"><a href="<?= base_url('logout') ?>" class="nav-item"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></div>
</div>
<div class="main-content">
    <div class="top-bar">
        <div class="page-title">
            <h2>Data Alumni</h2>
            <p>Tracking dan monitoring alumni SMA PGRI 1 Subang</p>
        </div>
        <a href="<?= base_url('admin/alumni/tambah') ?>" class="btn btn-dark rounded-pill px-4 py-2"><i class="fa-solid fa-plus me-1"></i> Tambah Alumni</a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show py-2"><?= session()->getFlashdata('success') ?><button type="button" class="btn-close py-2" data-bs-dismiss="alert"></button></div>
    <?php endif; ?>

    <?php if(!empty($statistik)): ?>
    <div class="stat-mini">
        <?php 
        $warna = ['BEKERJA' => '#10b981', 'KULIAH' => '#6366f1', 'WIRAUSAHA' => '#f59e0b', 'BELUM' => '#94a3b8'];
        foreach($statistik as $st): ?>
        <div class="stat-mini-item">
            <div class="num" style="color:<?= $warna[$st['status_aktivitas']] ?? '#64748b' ?>"><?= $st['total'] ?></div>
            <div class="lbl"><?= $st['status_aktivitas'] ?></div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="card-panel">
        <form method="GET" action="<?= base_url('admin/alumni') ?>" class="mb-3 d-flex align-items-center gap-2">
            <label class="fw-semibold small me-1" style="color:var(--text-gray);">Filter Tahun Lulus:</label>
            <select name="tahun" class="form-select" style="width:auto;display:inline-block;border-radius:10px;padding:8px 30px 8px 12px;font-size:13px;" onchange="this.form.submit()">
                <option value="">Semua Tahun</option>
                <?php foreach($daftar_tahun as $t): ?>
                <option value="<?= $t['tahun_lulus'] ?>" <?= ($tahun_terpilih == $t['tahun_lulus']) ? 'selected' : '' ?>><?= $t['tahun_lulus'] ?></option>
                <?php endforeach; ?>
            </select>
            <?php if($tahun_terpilih): ?>
            <a href="<?= base_url('admin/alumni') ?>" class="btn btn-sm btn-outline-secondary" style="border-radius:10px;font-size:12px;padding:6px 12px;"><i class="fa-solid fa-times"></i> Reset</a>
            <?php endif; ?>
        </form>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama Alumni</th>
                        <th>Tahun Lulus</th>
                        <th>Status</th>
                        <th>Instansi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($alumni)): ?>
                        <?php foreach($alumni as $a): ?>
                        <tr>
                            <td><strong><?= $a['nisn'] ?></strong></td>
                            <td><?= $a['nama_alumni'] ?></td>
                            <td><?= $a['tahun_lulus'] ?></td>
                            <td>
                                <span class="badge-status" style="background:<?= $a['status_aktivitas'] == 'BEKERJA' ? '#f0fdf4' : ($a['status_aktivitas'] == 'KULIAH' ? '#eef2ff' : ($a['status_aktivitas'] == 'WIRAUSAHA' ? '#fffbeb' : '#f1f5f9')) ?>;color:<?= $a['status_aktivitas'] == 'BEKERJA' ? '#10b981' : ($a['status_aktivitas'] == 'KULIAH' ? '#6366f1' : ($a['status_aktivitas'] == 'WIRAUSAHA' ? '#f59e0b' : '#64748b')) ?>">
                                    <?= $a['status_aktivitas'] ?>
                                </span>
                            </td>
                            <td><?= $a['nama_instansi'] ?: '-' ?></td>
                            <td>
                                <a href="<?= base_url('admin/alumni/detail/'.$a['id']) ?>" class="btn btn-sm btn-outline-info btn-action me-1"><i class="fa-solid fa-eye"></i></a>
                                <a href="<?= base_url('admin/alumni/edit/'.$a['id']) ?>" class="btn btn-sm btn-outline-primary btn-action me-1"><i class="fa-solid fa-edit"></i></a>
                                <a href="<?= base_url('admin/alumni/hapus/'.$a['id']) ?>" class="btn btn-sm btn-outline-danger btn-action" onclick="return confirm('Hapus data alumni ini?')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data alumni.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
