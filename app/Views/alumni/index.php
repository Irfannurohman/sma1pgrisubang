<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Alumni - SMA PGRI 1 Subang</title>
    <link rel="icon" type="image/png" href="<?= base_url('logo%20pgri.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #6366f1; --secondary: #10b981; --dark: #0f172a; --text-gray: #64748b; --border: #e2e8f0; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; position: relative; }
        body::before {
            content: ''; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(circle at 20% 80%, rgba(99, 102, 241, 0.08) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(16, 185, 129, 0.06) 0%, transparent 50%);
            pointer-events: none; z-index: -1;
        }
        nav { display: flex; justify-content: space-between; align-items: center; padding: 25px 8%; background: rgba(255,255,255,0.95); backdrop-filter: blur(20px); box-shadow: 0 4px 20px rgba(0,0,0,0.05); position: sticky; top: 0; z-index: 1000; border-bottom: 1px solid var(--border); }
        .logo-section { display: flex; align-items: center; gap: 15px; }
        .logo-img { height: 50px; width: auto; }
        .brand-text h1 { font-size: 22px; font-weight: 800; color: var(--dark); margin: 0; }
        .brand-text p { font-size: 12px; color: var(--primary); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0; }
        .btn-nav { background: var(--dark); color: white; padding: 12px 24px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 14px; display: flex; align-items: center; gap: 8px; transition: all 0.3s; }
        .btn-nav:hover { background: var(--primary); transform: translateY(-2px); color: white; }
        .btn-outline { background: transparent; color: var(--dark); border: 2px solid var(--border); }
        .btn-outline:hover { background: var(--dark); color: white; border-color: var(--dark); }
        .hero { padding: 80px 8% 60px; display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 60px; align-items: center; }
        .hero-content .badge { background: #eef2ff; color: var(--primary); padding: 10px 20px; border-radius: 50px; font-weight: 700; font-size: 13px; display: inline-flex; align-items: center; gap: 8px; margin-bottom: 25px; border: 1px solid #e0e7ff; }
        .hero-content h2 { font-size: 48px; font-weight: 800; line-height: 1.1; margin-bottom: 20px; color: var(--dark); }
        .hero-content h2 span { background: linear-gradient(135deg, #6366f1, #a855f7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .hero-content p { color: var(--text-gray); font-size: 17px; max-width: 500px; margin-bottom: 30px; }
        .card-search { background: rgba(255,255,255,0.95); padding: 45px 35px; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.08); text-align: center; border: 1px solid var(--border); backdrop-filter: blur(20px); }
        .search-icon { background: linear-gradient(135deg, #6366f1, #a855f7); width: 75px; height: 75px; border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 32px; box-shadow: 0 10px 20px rgba(99,102,241,0.3); }
        .card-search h3 { font-size: 24px; font-weight: 800; margin-bottom: 8px; }
        .card-search .instruction { color: var(--text-gray); font-size: 14px; margin-bottom: 25px; }
        .input-wrapper { position: relative; }
        .input-wrapper i { position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: var(--primary); font-size: 18px; }
        .input-wrapper input { width: 100%; padding: 16px 16px 16px 50px; border: 2px solid var(--border); border-radius: 14px; font-size: 16px; font-weight: 600; outline: none; transition: all 0.3s; background: rgba(255,255,255,0.8); }
        .input-wrapper input:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(99,102,241,0.1); }
        .btn-search { width: 100%; background: var(--dark); color: white; border: none; padding: 16px; border-radius: 14px; font-weight: 800; font-size: 16px; margin-top: 20px; cursor: pointer; transition: all 0.3s; display: flex; justify-content: center; align-items: center; gap: 10px; }
        .btn-search:hover { background: var(--primary); transform: translateY(-2px); box-shadow: 0 15px 30px rgba(99,102,241,0.3); }
        .btn-search.loading { background: var(--secondary); cursor: not-allowed; position: relative; overflow: hidden; }
        .btn-search.loading::after { content: ''; position: absolute; top: 50%; left: 50%; width: 20px; height: 20px; margin: -10px 0 0 -10px; border: 2px solid transparent; border-top-color: white; border-radius: 50%; animation: spin 1s linear infinite; }
        .btn-search.loading span { opacity: 0; }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

        .result-card { max-width: 800px; margin: 40px auto; background: white; border-radius: 24px; padding: 35px; box-shadow: 0 20px 40px rgba(0,0,0,0.08); border: 1px solid var(--border); }
        .result-header { display: flex; align-items: center; gap: 20px; margin-bottom: 25px; padding-bottom: 20px; border-bottom: 2px solid var(--border); }
        .result-avatar { width: 70px; height: 70px; border-radius: 18px; background: linear-gradient(135deg, #6366f1, #a855f7); display: flex; align-items: center; justify-content: center; color: white; font-size: 30px; flex-shrink: 0; }
        .result-name h4 { font-weight: 800; font-size: 22px; margin: 0; }
        .result-name p { color: var(--text-gray); margin: 2px 0 0; font-size: 14px; }
        .badge-status { padding: 6px 16px; border-radius: 50px; font-weight: 700; font-size: 13px; display: inline-block; }
        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .info-item .label { font-size: 11px; color: var(--text-gray); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
        .info-item .value { font-size: 15px; font-weight: 600; color: var(--dark); margin-top: 2px; }

        .not-found { max-width: 500px; margin: 30px auto; background: white; border-radius: 24px; padding: 50px 35px; text-align: center; box-shadow: 0 20px 40px rgba(0,0,0,0.08); border: 1px solid var(--border); }
        .not-found .nf-icon { width: 80px; height: 80px; border-radius: 50%; background: #fef2f2; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: #ef4444; font-size: 34px; }
        .not-found h4 { font-weight: 800; color: var(--dark); margin-bottom: 8px; }
        .not-found p { color: var(--text-gray); font-size: 14px; }

        .update-form { max-width: 700px; margin: 50px auto; background: rgba(255,255,255,0.95); border-radius: 24px; padding: 40px; border: 1px solid var(--border); box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .update-form h4 { font-weight: 800; text-align: center; margin-bottom: 8px; }
        .update-form .sub { text-align: center; color: var(--text-gray); margin-bottom: 25px; font-size: 14px; }
        .form-control, .form-select { border-radius: 12px; padding: 12px 16px; border: 2px solid var(--border); font-size: 14px; }
        .form-control:focus, .form-select:focus { border-color: var(--primary); box-shadow: none; }
        .form-label { font-weight: 600; font-size: 13px; color: var(--dark); }

        footer { background: linear-gradient(135deg, var(--dark), #1e293b); color: white; padding: 50px 8% 30px; border-radius: 40px 40px 0 0; margin-top: 60px; text-align: center; }
        footer small { color: #94a3b8; }
        @media (max-width: 768px) { .hero { grid-template-columns: 1fr; padding: 40px 5%; text-align: center; } .hero-content h2 { font-size: 32px; } .hero-content p { max-width: 100%; } .info-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

<nav>
    <div class="logo-section">
        <img src="<?= base_url('logo%20pgri.png') ?>" alt="Logo PGRI" class="logo-img">
        <div class="brand-text">
            <h1>SMA PGRI 1 SUBANG</h1>
            <p>Tracking Alumni</p>
        </div>
    </div>
    <div style="display:flex;gap:10px;">
        <a href="<?= base_url('tracer-study') ?>" class="btn-nav btn-outline"><i class="fa-solid fa-clipboard-question"></i> Tracer Study</a>
        <a href="<?= base_url('/') ?>" class="btn-nav"><i class="fa-solid fa-house"></i> Beranda</a>
    </div>
</nav>

<section class="hero">
    <div class="hero-content">
        <div class="badge"><i class="fa-solid fa-route"></i> Lacak Jejak Alumni</div>
        <h2>Tracking <span>Alumni</span></h2>
        <p>Cari tahu perkembangan alumni SMA PGRI 1 Subang setelah lulus. Cukup masukkan NISN untuk melihat data terbaru.</p>
    </div>

    <div class="card-search">
        <div class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
        <h3>Cari Alumni</h3>
        <p class="instruction">Masukkan NISN untuk tracking data alumni</p>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger py-2 small"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('alumni/tracking') ?>" method="POST">
            <div class="input-wrapper">
                <i class="fa-solid fa-id-card"></i>
                <input type="text" name="nisn" placeholder="Masukkan NISN" required maxlength="20" value="<?= isset($nisn) ? $nisn : '' ?>">
            </div>
            <button type="submit" class="btn-search" id="btnSearch">
                <span><i class="fa-solid fa-search"></i> Tracking Sekarang</span>
            </button>
        </form>
    </div>
</section>

<?php if (isset($not_found) && $not_found): ?>
<div class="not-found">
    <div class="nf-icon"><i class="fa-solid fa-circle-exclamation"></i></div>
    <h4>Data Tidak Ditemukan</h4>
    <p>NISN <strong><?= esc($nisn) ?></strong> tidak terdaftar dalam database alumni. Silakan periksa kembali NISN Anda atau hubungi admin sekolah.</p>
</div>
<?php elseif (isset($alumni) && $alumni): ?>
<div class="result-card">
    <div class="result-header">
        <div class="result-avatar"><i class="fa-solid fa-user-graduate"></i></div>
        <div class="result-name">
            <h4><?= $alumni['nama_alumni'] ?></h4>
            <p>NISN: <?= $alumni['nisn'] ?> • Lulus <?= $alumni['tahun_lulus'] ?></p>
        </div>
        <span class="badge-status ms-auto" style="background:<?= $alumni['status_aktivitas']=='BEKERJA'?'#f0fdf4':($alumni['status_aktivitas']=='KULIAH'?'#eef2ff':($alumni['status_aktivitas']=='WIRAUSAHA'?'#fffbeb':'#f1f5f9'))?>;color:<?= $alumni['status_aktivitas']=='BEKERJA'?'#10b981':($alumni['status_aktivitas']=='KULIAH'?'#6366f1':($alumni['status_aktivitas']=='WIRAUSAHA'?'#f59e0b':'#64748b'))?>">
            <?= $alumni['status_aktivitas'] ?>
        </span>
    </div>

    <div class="info-grid">
        <div class="info-item"><div class="label">NISN</div><div class="value"><?= $alumni['nisn'] ?></div></div>
        <div class="info-item"><div class="label">Jenis Kelamin</div><div class="value"><?= $alumni['jenis_kelamin']=='L'?'Laki-laki':'Perempuan' ?></div></div>
        <div class="info-item"><div class="label">Tahun Lulus</div><div class="value"><?= $alumni['tahun_lulus'] ?></div></div>
        <div class="info-item"><div class="label">No. HP</div><div class="value"><?= $alumni['no_hp'] ?: '-' ?></div></div>
        <div class="info-item"><div class="label">Email</div><div class="value"><?= $alumni['email'] ?: '-' ?></div></div>
        <div class="info-item"><div class="label">Alamat</div><div class="value"><?= $alumni['alamat'] ?: '-' ?></div></div>

        <?php if ($alumni['status_aktivitas'] == 'KULIAH'): ?>
        <div class="info-item"><div class="label">Perguruan Tinggi</div><div class="value"><?= $alumni['nama_instansi'] ?: '-' ?></div></div>
        <div class="info-item"><div class="label">Jurusan</div><div class="value"><?= $alumni['jurusan_kuliah'] ?: '-' ?></div></div>
        <?php elseif ($alumni['status_aktivitas'] == 'BEKERJA'): ?>
        <div class="info-item"><div class="label">Perusahaan</div><div class="value"><?= $alumni['nama_instansi'] ?: '-' ?></div></div>
        <div class="info-item"><div class="label">Posisi</div><div class="value"><?= $alumni['posisi_kerja'] ?: '-' ?></div></div>
        <?php elseif ($alumni['status_aktivitas'] == 'WIRAUSAHA'): ?>
        <div class="info-item"><div class="label">Bidang Usaha</div><div class="value"><?= $alumni['nama_instansi'] ?: '-' ?></div></div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<div class="update-form">
    <h4>Update Data Alumni</h4>
    <p class="sub">Punya data terbaru? Update informasi Anda di sini.</p>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success py-2 small"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('alumni/update-status') ?>" method="post">
        <div class="mb-3">
            <label class="form-label">NISN</label>
            <input type="text" name="nisn" class="form-control" required placeholder="Masukkan NISN">
        </div>
        <div class="mb-3">
            <label class="form-label">Status Saat Ini</label>
            <select name="status_aktivitas" class="form-select" onchange="toggleUpdateFields()" id="updStatus">
                <option value="BELUM">Belum Bekerja/Kuliah</option>
                <option value="BEKERJA">Bekerja</option>
                <option value="KULIAH">Kuliah</option>
                <option value="WIRAUSAHA">Wirausaha</option>
            </select>
        </div>
        <div class="mb-3"><label class="form-label" id="updLabel">Nama Perusahaan/PT/Usaha</label><input type="text" name="nama_instansi" class="form-control"></div>
        <div class="mb-3" id="updJurusan" style="display:none;"><label class="form-label">Jurusan Kuliah</label><input type="text" name="jurusan_kuliah" class="form-control"></div>
        <div class="mb-3" id="updPosisi" style="display:none;"><label class="form-label">Posisi Pekerjaan</label><input type="text" name="posisi_kerja" class="form-control"></div>
        <div class="row g-3 mb-3">
            <div class="col-md-6"><label class="form-label">No. HP</label><input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx"></div>
            <div class="col-md-6"><label class="form-label">Email</label><input type="email" name="email" class="form-control" placeholder="email@example.com"></div>
        </div>
        <div class="mb-3"><label class="form-label">Alamat</label><input type="text" name="alamat" class="form-control" placeholder="Alamat saat ini"></div>
        <button type="submit" class="btn-search"><i class="fa-solid fa-paper-plane me-1"></i> Update Data</button>
    </form>
</div>

<footer>
    <p>&copy; 2026 SMA PGRI 1 SUBANG - Sistem Informasi Kelulusan & Tracking Alumni</p>
    <small>Jl. Otto Iskandardinata No. 83, Subang, Jawa Barat 41211</small>
</footer>

<div id="loadingOverlay" class="loading-overlay">
    <div class="loading-content">
        <img src="<?= base_url('logo%20pgri.png') ?>" alt="Loading..." class="loading-logo">
        <p>Memproses data...</p>
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
function toggleUpdateFields() {
    const v = document.getElementById('updStatus').value;
    document.getElementById('updJurusan').style.display = v === 'KULIAH' ? 'block' : 'none';
    document.getElementById('updPosisi').style.display = v === 'BEKERJA' ? 'block' : 'none';
    const l = document.getElementById('updLabel');
    if (v === 'KULIAH') l.textContent = 'Nama Perguruan Tinggi';
    else if (v === 'BEKERJA') l.textContent = 'Nama Perusahaan';
    else if (v === 'WIRAUSAHA') l.textContent = 'Bidang Usaha';
    else l.textContent = 'Nama Instansi';
}
document.querySelector('form[action*="tracking"]')?.addEventListener('submit', function() {
    document.getElementById('loadingOverlay').classList.add('active');
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
