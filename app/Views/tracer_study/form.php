<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Study - SMA PGRI 1 Subang</title>
    <link rel="icon" type="image/png" href="<?= base_url('logo%20pgri.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #6366f1; --secondary: #10b981; --dark: #0f172a; --text-gray: #64748b; --border: #e2e8f0; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; }
        nav { display: flex; justify-content: space-between; align-items: center; padding: 20px 8%; background: rgba(255,255,255,0.95); backdrop-filter: blur(20px); box-shadow: 0 4px 20px rgba(0,0,0,0.05); position: sticky; top: 0; z-index: 1000; border-bottom: 1px solid var(--border); }
        .logo-section { display: flex; align-items: center; gap: 15px; }
        .logo-img { height: 45px; width: auto; }
        .brand-text h1 { font-size: 22px; font-weight: 800; color: var(--dark); margin: 0; }
        .brand-text p { font-size: 12px; color: var(--primary); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0; }
        .btn-nav { background: var(--dark); color: white; padding: 12px 24px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 14px; transition: all 0.3s; display: inline-flex; align-items: center; gap: 8px; }
        .btn-nav:hover { background: var(--primary); color: white; transform: translateY(-2px); }
        .container-custom { max-width: 800px; margin: 0 auto; padding: 40px 20px; }
        .form-card { background: rgba(255,255,255,0.95); border-radius: 24px; padding: 45px; border: 1px solid var(--border); box-shadow: 0 20px 40px rgba(0,0,0,0.08); }
        .form-header { text-align: center; margin-bottom: 35px; }
        .form-header .icon { width: 80px; height: 80px; border-radius: 20px; background: linear-gradient(135deg, #6366f1, #a855f7); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 34px; box-shadow: 0 10px 20px rgba(99,102,241,0.3); }
        .form-header h2 { font-weight: 800; font-size: 28px; color: var(--dark); }
        .form-header p { color: var(--text-gray); }
        .form-label { font-weight: 600; font-size: 13px; color: var(--dark); }
        .form-control, .form-select { border-radius: 12px; padding: 12px 16px; border: 2px solid var(--border); font-size: 14px; }
        .form-control:focus, .form-select:focus { border-color: var(--primary); box-shadow: none; }
        .form-section { background: #f8fafc; border-radius: 16px; padding: 25px; margin-bottom: 25px; border: 1px solid var(--border); }
        .form-section h5 { font-weight: 700; font-size: 16px; margin-bottom: 20px; color: var(--dark); }
        .btn-submit { background: var(--dark); color: white; border: none; padding: 16px; border-radius: 14px; font-weight: 700; font-size: 16px; width: 100%; transition: all 0.3s; cursor: pointer; }
        .btn-submit:hover { background: var(--primary); transform: translateY(-2px); box-shadow: 0 15px 30px rgba(99,102,241,0.3); }
        footer { background: linear-gradient(135deg, var(--dark), #1e293b); color: white; padding: 30px 8%; text-align: center; margin-top: 60px; }
    </style>
</head>
<body>
<nav>
    <div class="logo-section">
        <img src="<?= base_url('logo%20pgri.png') ?>" alt="Logo PGRI" class="logo-img">
        <div class="brand-text">
            <h1>SMA PGRI 1 SUBANG</h1>
            <p>Tracer Study Alumni</p>
        </div>
    </div>
    <div style="display:flex;gap:10px;">
        <a href="<?= base_url('alumni') ?>" class="btn-nav"><i class="fa-solid fa-users"></i> Tracking Alumni</a>
        <a href="<?= base_url('/') ?>" class="btn-nav"><i class="fa-solid fa-house"></i> Beranda</a>
    </div>
</nav>

<div class="container-custom">
    <div class="form-card">
        <div class="form-header">
            <div class="icon"><i class="fa-solid fa-clipboard-question"></i></div>
            <h2>Tracer Study Alumni</h2>
            <p>Bantu kami mengetahui perkembangan Anda setelah lulus dari SMA PGRI 1 Subang</p>
        </div>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show"><?= session()->getFlashdata('success') ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul class="mb-0"><?php foreach(session()->getFlashdata('errors') as $e): ?><li><?= $e ?></li><?php endforeach; ?></ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('tracer/simpan') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-section">
                <h5><i class="fa-solid fa-user me-2" style="color:var(--primary);"></i> Identitas Diri</h5>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">NISN</label>
                        <input type="text" name="nisn" class="form-control" required placeholder="NISN" value="<?= old('nisn') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required placeholder="Nama" value="<?= old('nama') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tahun Lulus</label>
                        <select name="tahun_lulus" class="form-select">
                            <?php for($t=date('Y');$t>=2020;$t--): ?>
                            <option value="<?=$t?>" <?= old('tahun_lulus')==$t?'selected':''?>><?=$t?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h5><i class="fa-solid fa-briefcase me-2" style="color:var(--secondary);"></i> Status Saat Ini</h5>
                <div class="mb-3">
                    <label class="form-label">Setelah lulus, apa yang Anda lakukan?</label>
                    <select name="status_setelah_lulus" class="form-select" id="tracerStatus" onchange="toggleTracerFields()">
                        <option value="BELUM_BEKERJA" <?= old('status_setelah_lulus')=='BELUM_BEKERJA'?'selected':''?>>Belum Bekerja</option>
                        <option value="KULIAH" <?= old('status_setelah_lulus')=='KULIAH'?'selected':''?>>Melanjutkan Kuliah</option>
                        <option value="BEKERJA" <?= old('status_setelah_lulus')=='BEKERJA'?'selected':''?>>Bekerja</option>
                        <option value="WIRAUSAHA" <?= old('status_setelah_lulus')=='WIRAUSAHA'?'selected':''?>>Wirausaha</option>
                        <option value="MENIKAH" <?= old('status_setelah_lulus')=='MENIKAH'?'selected':''?>>Menikah</option>
                    </select>
                </div>
                <div id="tracerKuliah" style="display:<?= old('status_setelah_lulus')=='KULIAH'?'block':'none'?>;">
                    <div class="row g-3">
                        <div class="col-md-6"><label class="form-label">Nama Perguruan Tinggi</label><input type="text" name="nama_pt" class="form-control" placeholder="Nama PT" value="<?= old('nama_pt') ?>"></div>
                        <div class="col-md-6"><label class="form-label">Jurusan Kuliah</label><input type="text" name="jurusan_kuliah" class="form-control" placeholder="Jurusan" value="<?= old('jurusan_kuliah') ?>"></div>
                    </div>
                </div>
                <div id="tracerKerja" style="display:<?= (old('status_setelah_lulus')=='BEKERJA'||old('status_setelah_lulus')=='WIRAUSAHA')?'block':'none'?>;">
                    <div class="row g-3">
                        <div class="col-md-6"><label class="form-label">Nama Perusahaan</label><input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan" value="<?= old('nama_perusahaan') ?>"></div>
                        <div class="col-md-6"><label class="form-label">Posisi / Jabatan</label><input type="text" name="posisi" class="form-control" placeholder="Posisi" value="<?= old('posisi') ?>"></div>
                        <div class="col-md-6"><label class="form-label">Rentang Gaji</label><select name="gaji_range" class="form-select"><option value="">-</option><option value="< 1 Juta" <?= old('gaji_range')=='< 1 Juta'?'selected':''?>>< Rp 1.000.000</option><option value="1-3 Juta" <?= old('gaji_range')=='1-3 Juta'?'selected':''?>>Rp 1-3 Juta</option><option value="3-5 Juta" <?= old('gaji_range')=='3-5 Juta'?'selected':''?>>Rp 3-5 Juta</option><option value="5-10 Juta" <?= old('gaji_range')=='5-10 Juta'?'selected':''?>>Rp 5-10 Juta</option><option value="> 10 Juta" <?= old('gaji_range')=='> 10 Juta'?'selected':''?>> > Rp 10 Juta</option></select></div>
                        <div class="col-md-6"><label class="form-label">Kesesuaian dengan Jurusan</label><select name="kesesuaian_jurusan" class="form-select"><option value="">-</option><option value="SESUAI" <?= old('kesesuaian_jurusan')=='SESUAI'?'selected':''?>>Sesuai</option><option value="CUKUP_SESUAI" <?= old('kesesuaian_jurusan')=='CUKUP_SESUAI'?'selected':''?>>Cukup Sesuai</option><option value="TIDAK_SESUAI" <?= old('kesesuaian_jurusan')=='TIDAK_SESUAI'?'selected':''?>>Tidak Sesuai</option></select></div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h5><i class="fa-solid fa-message me-2" style="color:#f59e0b;"></i> Saran & Masukan</h5>
                <div class="mb-3">
                    <label class="form-label">Pesan/Saran untuk almamater</label>
                    <textarea name="saran" class="form-control" rows="3" placeholder="Tulis saran Anda..."><?= old('saran') ?></textarea>
                </div>
            </div>

            <button type="submit" class="btn-submit"><i class="fa-solid fa-paper-plane me-2"></i> Kirim Data Tracer Study</button>
        </form>
    </div>
</div>

<footer>
    <p>&copy; 2026 SMA PGRI 1 SUBANG - Sistem Informasi Kelulusan & Tracking Alumni</p>
    <small style="color:#94a3b8;">Jl. Otto Iskandardinata No. 83, Subang, Jawa Barat 41211</small>
</footer>

<div id="loadingOverlay" class="loading-overlay">
    <div class="loading-content">
        <img src="<?= base_url('logo%20pgri.png') ?>" alt="Loading..." class="loading-logo">
        <p>Mengirim data...</p>
    </div>
</div>

<style>
.loading-overlay {
    position: fixed; top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(255,255,255,0.92);
    backdrop-filter: blur(8px);
    display: flex; align-items: center; justify-content: center;
    z-index: 99999;
    opacity: 0; pointer-events: none;
    transition: opacity 0.3s ease;
}
.loading-overlay.active {
    opacity: 1; pointer-events: all;
}
.loading-content { text-align: center; }
.loading-logo { width: 80px; height: auto; animation: pulse-load 1.2s ease-in-out infinite; }
.loading-content p { margin-top: 20px; font-weight: 700; color: #0f172a; font-size: 16px; animation: fade-load 1.2s ease-in-out infinite; }
@keyframes pulse-load { 0%, 100% { transform: scale(1); opacity: 1; } 50% { transform: scale(1.15); opacity: 0.7; } }
@keyframes fade-load { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }
</style>

<script>
function toggleTracerFields() {
    const status = document.getElementById('tracerStatus').value;
    document.getElementById('tracerKuliah').style.display = status === 'KULIAH' ? 'block' : 'none';
    document.getElementById('tracerKerja').style.display = (status === 'BEKERJA' || status === 'WIRAUSAHA') ? 'block' : 'none';
}
<?php if(old('status_setelah_lulus')): ?>
toggleTracerFields();
<?php endif; ?>
document.querySelector('form[action*="tracer/simpan"]')?.addEventListener('submit', function() {
    document.getElementById('loadingOverlay').classList.add('active');
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
