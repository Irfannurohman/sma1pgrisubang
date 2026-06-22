<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keterserapan Lulusan - SMA PGRI 1 Subang</title>
    <link rel="icon" type="image/png" href="<?= base_url('logo%20pgri.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root { --primary: #6366f1; --primary-dark: #4f46e5; --secondary: #10b981; --dark: #0f172a; --text-gray: #64748b; --light-bg: #f1f5f9; --border: #e2e8f0; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--light-bg); display: flex; min-height: 100vh; }
        .sidebar { width: 280px; background: var(--dark); color: white; padding: 30px 20px; display: flex; flex-direction: column; position: fixed; top: 0; left: 0; height: 100vh; z-index: 1000; }
        .sidebar-brand { display: flex; align-items: center; gap: 15px; padding-bottom: 30px; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 25px; }
        .sidebar-brand h5 { font-weight: 800; font-size: 18px; margin: 0; }
        .sidebar-brand small { color: #94a3b8; font-size: 11px; }
        .nav-item { display: flex; align-items: center; gap: 14px; padding: 13px 18px; border-radius: 12px; color: #94a3b8; text-decoration: none; font-weight: 600; font-size: 14px; transition: all 0.3s; margin-bottom: 4px; }
        .nav-item:hover, .nav-item.active { background: rgba(99, 102, 241, 0.15); color: white; }
        .nav-item i { width: 20px; text-align: center; font-size: 16px; }
        .nav-label { font-size: 11px; text-transform: uppercase; letter-spacing: 1.5px; color: #475569; padding: 15px 18px 8px; font-weight: 700; }
        .sidebar-footer { margin-top: auto; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px; }
        .main-content { margin-left: 280px; flex: 1; padding: 30px 35px; min-height: 100vh; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px; }
        .page-title h2 { font-weight: 800; font-size: 26px; color: var(--dark); }
        .page-title p { color: var(--text-gray); font-size: 14px; }
        
        .stat-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 25px; }
        .stat-card { background: white; border-radius: 20px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.04); border: 1px solid var(--border); display: flex; align-items: center; gap: 20px; }
        .stat-card .icon { width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 28px; }
        .stat-card .info h4 { font-size: 24px; font-weight: 800; margin: 0; color: var(--dark); }
        .stat-card .info p { margin: 0; font-size: 13px; color: var(--text-gray); font-weight: 600; text-transform: uppercase; }
        
        .card-panel { background: white; border-radius: 20px; padding: 30px; border: 1px solid var(--border); box-shadow: 0 4px 15px rgba(0,0,0,0.04); margin-bottom: 25px; }
        .card-panel h5 { font-weight: 700; font-size: 18px; margin-bottom: 20px; color: var(--dark); }
        
        .table th { font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-gray); }
        .table td { vertical-align: middle; font-size: 14px; font-weight: 500; }
        
        .progress { height: 8px; border-radius: 10px; margin-top: 5px; }
        
        @media (max-width: 992px) { .stat-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 768px) { .sidebar { width: 70px; padding: 20px 10px; } .sidebar-brand h5, .sidebar-brand small, .nav-item span, .sidebar-footer span, .nav-label { display: none; } .main-content { margin-left: 70px; padding: 20px; } .stat-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <div style="flex-shrink:0;"><img src="<?= base_url('logo%20pgri.png') ?>" alt="Logo" style="width:50px;height:auto;"></div>
        <div><h5>SMA PGRI 1</h5><small>Panel Admin</small></div>
    </div>
    <a href="<?= base_url('admin/dashboard') ?>" class="nav-item"><i class="fa-solid fa-chart-pie"></i><span>Dashboard</span></a>
    <a href="<?= base_url('admin/siswa') ?>" class="nav-item"><i class="fa-solid fa-users"></i><span>Data Siswa</span></a>
    <a href="<?= base_url('admin/alumni') ?>" class="nav-item"><i class="fa-solid fa-user-graduate"></i><span>Data Alumni</span></a>
    <a href="<?= base_url('admin/tracer') ?>" class="nav-item"><i class="fa-solid fa-clipboard-list"></i><span>Tracer Study</span></a>
    <a href="<?= base_url('admin/laporan') ?>" class="nav-item"><i class="fa-solid fa-chart-bar"></i><span>Laporan</span></a>

    <a href="<?= base_url('admin/pengaturan-kelulusan') ?>" class="nav-item"><i class="fa-solid fa-clock"></i><span>Pengaturan Kelulusan</span></a>
    <a href="<?= base_url('admin/keterserapan') ?>" class="nav-item active"><i class="fa-solid fa-chart-line"></i><span>Keterserapan</span></a>
    <div class="sidebar-footer">
        <a href="<?= base_url('logout') ?>" class="nav-item"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
    </div>
</div>

<div class="main-content">
    <div class="top-bar">
        <div class="page-title">
            <h2><i class="fa-solid fa-chart-line me-2" style="color:var(--primary);"></i>Keterserapan Lulusan</h2>
            <p>Statistik perkembangan & status alumni ("Keurusan") setelah lulus dari sekolah.</p>
        </div>
    </div>

    <?php 
    $tot = isset($total_keterserapan['total']) ? max(1, $total_keterserapan['total']) : 1;
    $pBekerja = round(($total_keterserapan['bekerja'] / $tot) * 100, 1);
    $pKuliah = round(($total_keterserapan['kuliah'] / $tot) * 100, 1);
    $pWirausaha = round(($total_keterserapan['wirausaha'] / $tot) * 100, 1);
    $pBelum = round(($total_keterserapan['belum'] / $tot) * 100, 1);
    $pMenikah = round(($total_keterserapan['menikah'] / $tot) * 100, 1);
    ?>

    <div class="stat-grid">
        <div class="stat-card">
            <div class="icon" style="background:#f0fdf4;color:#10b981;"><i class="fa-solid fa-briefcase"></i></div>
            <div class="info">
                <h4><?= $total_keterserapan['bekerja'] ?? 0 ?> <small style="font-size:14px;color:#10b981;">(<?= $pBekerja ?>%)</small></h4>
                <p>Bekerja</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="icon" style="background:#eef2ff;color:#6366f1;"><i class="fa-solid fa-university"></i></div>
            <div class="info">
                <h4><?= $total_keterserapan['kuliah'] ?? 0 ?> <small style="font-size:14px;color:#6366f1;">(<?= $pKuliah ?>%)</small></h4>
                <p>Melanjutkan Kuliah</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="icon" style="background:#fffbeb;color:#f59e0b;"><i class="fa-solid fa-store"></i></div>
            <div class="info">
                <h4><?= $total_keterserapan['wirausaha'] ?? 0 ?> <small style="font-size:14px;color:#f59e0b;">(<?= $pWirausaha ?>%)</small></h4>
                <p>Wirausaha</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="icon" style="background:#fef2f2;color:#ef4444;"><i class="fa-solid fa-user-clock"></i></div>
            <div class="info">
                <h4><?= $total_keterserapan['belum'] ?? 0 ?> <small style="font-size:14px;color:#ef4444;">(<?= $pBelum ?>%)</small></h4>
                <p>Belum Bekerja</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="icon" style="background:#fdf2f8;color:#ec4899;"><i class="fa-solid fa-heart"></i></div>
            <div class="info">
                <h4><?= $total_keterserapan['menikah'] ?? 0 ?> <small style="font-size:14px;color:#ec4899;">(<?= $pMenikah ?>%)</small></h4>
                <p>Menikah</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card-panel">
                <h5><i class="fa-solid fa-table me-2" style="color:var(--secondary);"></i> Data Keterserapan per Tahun</h5>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tahun Lulus</th>
                                <th>Total Alumni</th>
                                <th>Bekerja</th>
                                <th>Kuliah</th>
                                <th>Wirausaha</th>
                                <th>Menikah</th>
                                <th>Belum/Menganggur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($statistik_per_tahun)): ?>
                                <?php foreach($statistik_per_tahun as $s): ?>
                                <?php $t = max(1, $s['total']); ?>
                                <tr>
                                    <td><strong><?= $s['tahun_lulus'] ?></strong></td>
                                    <td><?= $s['total'] ?> orang</td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center" style="font-size:12px; margin-bottom:2px;">
                                            <span><?= $s['bekerja'] ?></span>
                                            <span class="text-muted"><?= round(($s['bekerja']/$t)*100, 1) ?>%</span>
                                        </div>
                                        <div class="progress"><div class="progress-bar bg-success" style="width: <?= ($s['bekerja']/$t)*100 ?>%"></div></div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center" style="font-size:12px; margin-bottom:2px;">
                                            <span><?= $s['kuliah'] ?></span>
                                            <span class="text-muted"><?= round(($s['kuliah']/$t)*100, 1) ?>%</span>
                                        </div>
                                        <div class="progress"><div class="progress-bar" style="background:#6366f1; width: <?= ($s['kuliah']/$t)*100 ?>%"></div></div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center" style="font-size:12px; margin-bottom:2px;">
                                            <span><?= $s['wirausaha'] ?></span>
                                            <span class="text-muted"><?= round(($s['wirausaha']/$t)*100, 1) ?>%</span>
                                        </div>
                                        <div class="progress"><div class="progress-bar bg-warning" style="width: <?= ($s['wirausaha']/$t)*100 ?>%"></div></div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center" style="font-size:12px; margin-bottom:2px;">
                                            <span><?= $s['menikah'] ?></span>
                                            <span class="text-muted"><?= round(($s['menikah']/$t)*100, 1) ?>%</span>
                                        </div>
                                        <div class="progress"><div class="progress-bar" style="background:#ec4899; width: <?= ($s['menikah']/$t)*100 ?>%"></div></div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center" style="font-size:12px; margin-bottom:2px;">
                                            <span><?= $s['belum'] ?></span>
                                            <span class="text-muted"><?= round(($s['belum']/$t)*100, 1) ?>%</span>
                                        </div>
                                        <div class="progress"><div class="progress-bar bg-danger" style="width: <?= ($s['belum']/$t)*100 ?>%"></div></div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data statistik keterserapan alumni.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-panel">
                <h5><i class="fa-solid fa-chart-pie me-2" style="color:#a855f7;"></i> Grafik Keseluruhan</h5>
                <canvas id="keterserapanChart" width="100" height="100"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('keterserapanChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Bekerja', 'Kuliah', 'Wirausaha', 'Menikah', 'Belum Bekerja'],
            datasets: [{
                data: [<?= $total_keterserapan['bekerja'] ?? 0 ?>, <?= $total_keterserapan['kuliah'] ?? 0 ?>, <?= $total_keterserapan['wirausaha'] ?? 0 ?>, <?= $total_keterserapan['menikah'] ?? 0 ?>, <?= $total_keterserapan['belum'] ?? 0 ?>],
                backgroundColor: ['#10b981', '#6366f1', '#f59e0b', '#ec4899', '#ef4444'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom', labels: { padding: 20, font: { family: "'Plus Jakarta Sans', sans-serif", size: 12 } } }
            },
            cutout: '70%'
        }
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

