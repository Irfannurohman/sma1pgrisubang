<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Study - Kepala Sekolah - SMA PGRI 1 Subang</title>
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
        .card-panel { background: white; border-radius: 20px; padding: 25px; border: 1px solid var(--border); box-shadow: 0 4px 15px rgba(0,0,0,0.04); }
        .stat-mini { display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px; margin-bottom: 25px; }
        .stat-mini-item { background: var(--light-bg); border-radius: 12px; padding: 15px; text-align: center; }
        .stat-mini-item .num { font-size: 22px; font-weight: 800; color: var(--dark); }
        .stat-mini-item .lbl { font-size: 12px; color: var(--text-gray); font-weight: 600; }
        .table th { font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-gray); border-top: none; }
        .table td { vertical-align: middle; font-size: 13px; }
        .badge-status { padding: 5px 12px; border-radius: 50px; font-weight: 600; font-size: 11px; }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon" style="background:none;box-shadow:none;border-radius:0;"><img src="<?= base_url('logo%20pgri.png') ?>" alt="Logo" style="width:50px;height:auto;"></div>
        <div><h5>SMA PGRI 1</h5><small>Kepala Sekolah</small></div>
    </div>
    <a href="<?= base_url('kepsek/dashboard') ?>" class="nav-item"><i class="fa-solid fa-chart-pie"></i><span>Dashboard</span></a>
    <a href="<?= base_url('kepsek/siswa') ?>" class="nav-item"><i class="fa-solid fa-users"></i><span>Data Siswa</span></a>
    <a href="<?= base_url('kepsek/alumni') ?>" class="nav-item"><i class="fa-solid fa-user-graduate"></i><span>Data Alumni</span></a>
    <a href="<?= base_url('kepsek/tracer') ?>" class="nav-item active"><i class="fa-solid fa-clipboard-list"></i><span>Tracer Study</span></a>
    <a href="<?= base_url('kepsek/laporan') ?>" class="nav-item"><i class="fa-solid fa-file-chart-bar"></i><span>Laporan</span></a>
    <div class="sidebar-footer"><a href="<?= base_url('logout') ?>" class="nav-item"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></div>
</div>
<div class="main-content">
    <div class="top-bar">
        <div class="page-title"><h2>Tracer Study</h2><p>Data responden tracer study alumni</p></div>
    </div>
    <?php if(!empty($statistik)): ?>
    <div class="stat-mini">
        <?php $warna = ['BEKERJA'=>'#10b981','KULIAH'=>'#6366f1','WIRAUSAHA'=>'#f59e0b','BELUM_BEKERJA'=>'#94a3b8']; ?>
        <?php foreach($statistik as $st): ?>
        <div class="stat-mini-item"><div class="num" style="color:<?= $warna[$st['status_setelah_lulus']]??'#64748b' ?>"><?= $st['total'] ?></div><div class="lbl"><?= str_replace('_',' ',$st['status_setelah_lulus']) ?></div></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <div class="card-panel">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead><tr><th>NISN</th><th>Nama</th><th>Tahun Lulus</th><th>Status</th><th>PT/Perusahaan</th></tr></thead>
                <tbody>
                    <?php if(!empty($tracer)): ?>
                        <?php foreach($tracer as $t): ?>
                        <tr>
                            <td><strong><?= $t['nisn'] ?></strong></td>
                            <td><?= $t['nama'] ?></td>
                            <td><?= $t['tahun_lulus'] ?></td>
                            <td><span class="badge-status" style="background:<?= $t['status_setelah_lulus']=='BEKERJA'?'#f0fdf4':($t['status_setelah_lulus']=='KULIAH'?'#eef2ff':($t['status_setelah_lulus']=='WIRAUSAHA'?'#fffbeb':'#f1f5f9'))?>;color:<?= $t['status_setelah_lulus']=='BEKERJA'?'#10b981':($t['status_setelah_lulus']=='KULIAH'?'#6366f1':($t['status_setelah_lulus']=='WIRAUSAHA'?'#f59e0b':'#64748b'))?>"><?= str_replace('_',' ',$t['status_setelah_lulus']) ?></span></td>
                            <td><?= $t['nama_pt'] ?: $t['nama_perusahaan'] ?: '-' ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center text-muted py-4">Belum ada data.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
