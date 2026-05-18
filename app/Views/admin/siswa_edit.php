<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa - SMA PGRI 1 Subang</title>
    <link rel="icon" type="image/png" href="<?= base_url('logo%20pgri.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #6366f1; --dark: #0f172a; --light-bg: #f1f5f9; --border: #e2e8f0; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--light-bg); display: flex; min-height: 100vh; }
        .sidebar {
            width: 280px; background: var(--dark); color: white; padding: 30px 20px;
            display: flex; flex-direction: column; position: fixed; top: 0; left: 0; height: 100vh; z-index: 1000;
        }
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
        .card-panel { background: white; border-radius: 20px; padding: 30px; border: 1px solid var(--border); box-shadow: 0 4px 15px rgba(0,0,0,0.04); max-width: 800px; }
        .form-label { font-weight: 600; font-size: 13px; color: var(--dark); }
        .form-control, .form-select { border-radius: 10px; padding: 10px 14px; border: 2px solid var(--border); font-size: 14px; }
        .form-control:focus, .form-select:focus { border-color: var(--primary); box-shadow: none; }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon" style="background:none;box-shadow:none;border-radius:0;"><img src="<?= base_url('logo%20pgri.png') ?>" alt="Logo" style="width:50px;height:auto;"></div>
        <div><h5>SMA PGRI 1</h5><small>Panel Admin</small></div>
    </div>
    <a href="<?= base_url('admin/dashboard') ?>" class="nav-item"><i class="fa-solid fa-chart-pie"></i><span>Dashboard</span></a>
    <a href="<?= base_url('admin/siswa') ?>" class="nav-item active"><i class="fa-solid fa-users"></i><span>Data Siswa</span></a>
    <a href="<?= base_url('admin/alumni') ?>" class="nav-item"><i class="fa-solid fa-user-graduate"></i><span>Data Alumni</span></a>
    <a href="<?= base_url('admin/tracer') ?>" class="nav-item"><i class="fa-solid fa-clipboard-list"></i><span>Tracer Study</span></a>
    <a href="<?= base_url('admin/laporan') ?>" class="nav-item"><i class="fa-solid fa-file-chart-bar"></i><span>Laporan</span></a>
    <div class="sidebar-footer"><a href="<?= base_url('logout') ?>" class="nav-item"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></div>
</div>
<div class="main-content">
    <div class="top-bar">
        <div class="page-title">
            <h2>Edit Siswa</h2>
        </div>
        <a href="<?= base_url('admin/siswa') ?>" class="btn btn-outline-secondary rounded-pill px-4"><i class="fa-solid fa-arrow-left me-1"></i> Kembali</a>
    </div>
    <div class="card-panel">
        <form action="<?= base_url('admin/siswa/update') ?>" method="post">
            <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">NISN</label>
                    <input type="text" name="nisn" class="form-control" value="<?= $siswa['nisn'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" value="<?= $siswa['nama_siswa'] ?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="<?= $siswa['tempat_lahir'] ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="<?= $siswa['tanggal_lahir'] ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select">
                        <option value="L" <?= $siswa['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="P" <?= $siswa['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nama Orang Tua</label>
                    <input type="text" name="nama_orang_tua" class="form-control" value="<?= $siswa['nama_orang_tua'] ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control" value="<?= $siswa['kelas'] ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Jurusan</label>
                    <select name="jurusan" class="form-select">
                        <option value="MIPA" <?= $siswa['jurusan'] == 'MIPA' ? 'selected' : '' ?>>MIPA</option>
                        <option value="IPS" <?= $siswa['jurusan'] == 'IPS' ? 'selected' : '' ?>>IPS</option>
                        <option value="BAHASA" <?= $siswa['jurusan'] == 'BAHASA' ? 'selected' : '' ?>>Bahasa</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tahun Lulus</label>
                    <select name="tahun_lulus" class="form-select">
                        <?php for($t = date('Y'); $t >= 2020; $t--): ?>
                        <option value="<?= $t ?>" <?= $siswa['tahun_lulus'] == $t ? 'selected' : '' ?>><?= $t ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status Kelulusan</label>
                    <select name="status_kelulusan" class="form-select">
                        <option value="LULUS" <?= $siswa['status_kelulusan'] == 'LULUS' ? 'selected' : '' ?>>LULUS</option>
                        <option value="TIDAK LULUS" <?= $siswa['status_kelulusan'] == 'TIDAK LULUS' ? 'selected' : '' ?>>TIDAK LULUS</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-5 py-2"><i class="fa-solid fa-save me-1"></i> Update</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
