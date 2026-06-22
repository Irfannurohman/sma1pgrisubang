<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Kelulusan - SMA PGRI 1 Subang</title>
    <link rel="icon" type="image/png" href="<?= base_url('logo%20pgri.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
        .card-panel { background: white; border-radius: 20px; padding: 30px; border: 1px solid var(--border); box-shadow: 0 4px 15px rgba(0,0,0,0.04); margin-bottom: 25px; }
        .card-panel h5 { font-weight: 700; font-size: 18px; margin-bottom: 20px; color: var(--dark); }
        .form-label { font-weight: 600; font-size: 14px; color: var(--dark); }
        .form-control, .form-select { border-radius: 12px; padding: 12px 16px; border: 2px solid var(--border); font-weight: 500; }
        .form-control:focus, .form-select:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(99,102,241,0.1); }
        .btn-primary { background: var(--primary); border: none; padding: 12px 30px; border-radius: 12px; font-weight: 700; }
        .btn-primary:hover { background: var(--primary-dark); }
        .preview-box { background: linear-gradient(135deg, var(--dark), #1e293b); border-radius: 20px; padding: 30px; color: white; text-align: center; }
        .preview-box .time-block { display: inline-block; background: rgba(255,255,255,0.1); border-radius: 12px; padding: 12px 16px; margin: 0 5px; min-width: 70px; }
        .preview-box .time-block .number { font-size: 28px; font-weight: 800; color: #818cf8; }
        .preview-box .time-block .label { font-size: 10px; text-transform: uppercase; letter-spacing: 1px; color: #94a3b8; }
        .status-badge { display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px; border-radius: 50px; font-weight: 600; font-size: 12px; }
        .status-aktif { background: #f0fdf4; color: #10b981; }
        .status-nonaktif { background: #fef2f2; color: #ef4444; }
        .table th { font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-gray); }
        .table td { vertical-align: middle; font-size: 14px; }
        @media (max-width: 768px) { .sidebar { width: 70px; padding: 20px 10px; } .sidebar-brand h5, .sidebar-brand small, .nav-item span, .sidebar-footer span, .nav-label { display: none; } .main-content { margin-left: 70px; padding: 20px; } }
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
    <a href="<?= base_url('kepsek/dashboard') ?>" class="nav-item"><i class="fa-solid fa-chart-pie"></i><span>Dashboard</span></a>
    <a href="<?= base_url('kepsek/siswa') ?>" class="nav-item"><i class="fa-solid fa-users"></i><span>Data Siswa</span></a>
    <a href="<?= base_url('kepsek/alumni') ?>" class="nav-item"><i class="fa-solid fa-user-graduate"></i><span>Data Alumni</span></a>
    <a href="<?= base_url('kepsek/tracer') ?>" class="nav-item"><i class="fa-solid fa-clipboard-list"></i><span>Tracer Study</span></a>
    <a href="<?= base_url('kepsek/laporan') ?>" class="nav-item"><i class="fa-solid fa-chart-bar"></i><span>Laporan</span></a>
    <a href="<?= base_url('kepsek/pengaturan-kelulusan') ?>" class="nav-item active"><i class="fa-solid fa-clock"></i><span>Pengaturan Kelulusan</span></a>
    <a href="<?= base_url('kepsek/keterserapan') ?>" class="nav-item"><i class="fa-solid fa-chart-line"></i><span>Keterserapan</span></a>
    <div class="sidebar-footer">
        <a href="<?= base_url('logout') ?>" class="nav-item"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
    </div>
</div>
<div class="main-content">
    <div class="top-bar">
        <div class="page-title">
            <h2><i class="fa-solid fa-clock me-2" style="color:var(--primary);"></i>Pengaturan Kelulusan</h2>
            <p>Atur tanggal & jam pengumuman kelulusan (countdown)</p>
        </div>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show py-2" role="alert">
            <i class="fa-solid fa-circle-check me-1"></i> <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close py-2" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-7">
            <div class="card-panel">
                <h5><i class="fa-solid fa-gear me-2" style="color:var(--primary);"></i> Atur Waktu Pengumuman</h5>
                <form action="<?= base_url('kepsek/pengaturan-kelulusan/simpan') ?>" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Tahun Ajaran</label>
                            <input type="text" name="tahun_ajaran" class="form-control" placeholder="misal: 2025/2026" value="<?= isset($pengaturan['tahun_ajaran']) ? $pengaturan['tahun_ajaran'] : '2025/2026' ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Pengumuman</label>
                            <input type="date" name="tanggal_pengumuman" class="form-control" value="<?= isset($pengaturan['tanggal_pengumuman']) ? $pengaturan['tanggal_pengumuman'] : '' ?>" required id="inputTanggal">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jam Pengumuman</label>
                            <input type="time" name="jam_pengumuman" class="form-control" value="<?= isset($pengaturan['jam_pengumuman']) ? substr($pengaturan['jam_pengumuman'], 0, 5) : '10:00' ?>" required id="inputJam">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <div class="form-control" style="background:#f0fdf4;border-color:#bbf7d0;color:#16a34a;font-weight:700;">
                                <i class="fa-solid fa-circle-check me-1"></i> Otomatis Aktif
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Pesan Sebelum Pengumuman <small class="text-muted">(opsional)</small></label>
                            <textarea name="pesan_sebelum" class="form-control" rows="2" placeholder="misal: Harap bersabar menunggu waktu pengumuman..."><?= isset($pengaturan['pesan_sebelum']) ? $pengaturan['pesan_sebelum'] : '' ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Pesan Setelah Lulus <small class="text-muted">(opsional)</small></label>
                            <textarea name="pesan_sesudah" class="form-control" rows="2" placeholder="misal: Bagi yang lulus, silakan mengambil SKL di sekolah pada tanggal..."><?= isset($pengaturan['pesan_sesudah']) ? $pengaturan['pesan_sesudah'] : '' ?></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save me-1"></i> Simpan Pengaturan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card-panel">
                <h5><i class="fa-solid fa-eye me-2" style="color:var(--secondary);"></i> Preview Countdown</h5>
                <?php if (isset($pengaturan) && $pengaturan): ?>
                <div class="preview-box">
                    <div style="margin-bottom:15px;">
                        <i class="fa-solid fa-lock" style="font-size:28px;color:#f59e0b;"></i>
                    </div>
                    <h6 style="font-weight:700;margin-bottom:5px;">Pengumuman Kelulusan</h6>
                    <p style="font-size:12px;color:#94a3b8;margin-bottom:15px;"><?= date('d F Y', strtotime($pengaturan['tanggal_pengumuman'])) ?>, Pukul <?= date('H:i', strtotime($pengaturan['jam_pengumuman'])) ?> WIB</p>
                    <div id="previewCountdown">
                        <div class="time-block"><div class="number" id="pDays">00</div><div class="label">Hari</div></div>
                        <div class="time-block"><div class="number" id="pHours">00</div><div class="label">Jam</div></div>
                        <div class="time-block"><div class="number" id="pMinutes">00</div><div class="label">Menit</div></div>
                        <div class="time-block"><div class="number" id="pSeconds">00</div><div class="label">Detik</div></div>
                    </div>
                    <div style="margin-top:15px;">
                        <span class="status-badge <?= (strtotime($pengaturan['tanggal_pengumuman'] . ' ' . $pengaturan['jam_pengumuman']) > time()) ? 'status-nonaktif' : 'status-aktif' ?>">
                            <i class="fa-solid fa-circle" style="font-size:8px;"></i>
                            <?= (strtotime($pengaturan['tanggal_pengumuman'] . ' ' . $pengaturan['jam_pengumuman']) > time()) ? 'Belum Dibuka' : 'Sudah Dibuka' ?>
                        </span>
                    </div>
                </div>
                <script>
                (function(){
                    var target = new Date("<?= $pengaturan['tanggal_pengumuman'] . 'T' . $pengaturan['jam_pengumuman'] ?>").getTime();
                    setInterval(function(){
                        var now = new Date().getTime();
                        var diff = target - now;
                        if(diff <= 0) { diff = 0; }
                        var d = Math.floor(diff / (1000*60*60*24));
                        var h = Math.floor((diff % (1000*60*60*24)) / (1000*60*60));
                        var m = Math.floor((diff % (1000*60*60)) / (1000*60));
                        var s = Math.floor((diff % (1000*60)) / 1000);
                        document.getElementById('pDays').textContent = String(d).padStart(2,'0');
                        document.getElementById('pHours').textContent = String(h).padStart(2,'0');
                        document.getElementById('pMinutes').textContent = String(m).padStart(2,'0');
                        document.getElementById('pSeconds').textContent = String(s).padStart(2,'0');
                    }, 1000);
                })();
                </script>
                <?php else: ?>
                <div class="text-center py-4">
                    <i class="fa-solid fa-calendar-xmark" style="font-size:48px;color:#e2e8f0;"></i>
                    <p class="text-muted mt-3">Belum ada pengaturan. Silakan isi form di samping.</p>
                </div>
                <?php endif; ?>
            </div>

            <?php if (!empty($semua_pengaturan)): ?>
            <div class="card-panel">
                <h5><i class="fa-solid fa-history me-2" style="color:#f59e0b;"></i> Riwayat Pengaturan</h5>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead><tr><th>Tahun</th><th>Tanggal</th><th>Jam</th><th>Status</th><th>Aksi</th></tr></thead>
                        <tbody>
                        <?php foreach($semua_pengaturan as $p): ?>
                        <tr>
                            <td><strong><?= $p['tahun_ajaran'] ?></strong></td>
                            <td><?= date('d/m/Y', strtotime($p['tanggal_pengumuman'])) ?></td>
                            <td><?= date('H:i', strtotime($p['jam_pengumuman'])) ?></td>
                            <td>
                                <span class="status-badge <?= $p['is_aktif'] ? 'status-aktif' : 'status-nonaktif' ?>">
                                    <?= $p['is_aktif'] ? 'Aktif' : 'Nonaktif' ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= base_url('kepsek/pengaturan-kelulusan/hapus/'.$p['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus riwayat pengaturan ini?');" title="Hapus"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="card-panel" style="border-left: 4px solid var(--secondary);">
                <h5><i class="fa-solid fa-file-excel me-2" style="color:#10b981;"></i> Import Data Siswa & Kelulusan</h5>
                <p class="text-muted" style="font-size:14px;">Masukkan data siswa sekaligus status kelulusannya secara massal dari file Excel.</p>
                <div class="mt-3">
                    <a href="<?= base_url('kepsek/siswa/import') ?>" class="btn btn-outline-success" style="font-weight:700;">
                        <i class="fa-solid fa-upload me-1"></i> Buka Menu Import Excel
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card-panel" style="border-left: 4px solid var(--primary);">
                <h5><i class="fa-solid fa-file-pdf me-2" style="color:#ef4444;"></i> Status PDF Generator</h5>
                <p class="text-muted" style="font-size:14px;">Sistem ini menggunakan <strong>DomPDF Internal</strong>. PDF otomatis di-generate <em>real-time</em> saat siswa klik download. <strong>Tidak perlu integrasi Autocrat / Google Drive.</strong></p>
                <div class="mt-3">
                    <span class="badge bg-success py-2 px-3" style="font-size:13px;"><i class="fa-solid fa-check-circle me-1"></i> DomPDF Aktif & Siap</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

