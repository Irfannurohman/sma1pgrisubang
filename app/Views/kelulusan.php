<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Kelulusan 2026 - SMA PGRI 1 Subang</title>
    <link rel="icon" type="image/png" href="<?= base_url('logo%20pgri.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #6366f1; --secondary: #10b981; --dark: #0f172a; --text-gray: #64748b; --border: #e2e8f0; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 50%, #e8eaf6 100%); min-height: 100vh; position: relative; }
        body::before {
            content: ''; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(circle at 20% 80%, rgba(99, 102, 241, 0.08) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(16, 185, 129, 0.06) 0%, transparent 50%);
            pointer-events: none; z-index: -1;
        }
        nav { display: flex; justify-content: space-between; align-items: center; padding: 25px 8%; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); box-shadow: 0 4px 20px rgba(0,0,0,0.05); position: sticky; top: 0; z-index: 1000; border-bottom: 1px solid var(--border); }
        .logo-section { display: flex; align-items: center; gap: 15px; }
        .logo-img { height: 50px; width: auto; }
        .brand-text h1 { font-size: 24px; font-weight: 800; color: var(--dark); margin: 0; }
        .brand-text p { font-size: 13px; color: var(--primary); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0; }
        .btn-nav { background: var(--dark); color: white; padding: 12px 24px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 14px; display: flex; align-items: center; gap: 8px; transition: all 0.3s; }
        .btn-nav:hover { background: var(--primary); transform: translateY(-2px); color: white; }
        .btn-outline { background: transparent; color: var(--dark); border: 2px solid var(--border); }
        .btn-outline:hover { background: var(--dark); color: white; border-color: var(--dark); }
        .hero { padding: 80px 8% 60px; display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 60px; align-items: center; }
        .hero-content .badge { background: #eef2ff; color: var(--primary); padding: 10px 20px; border-radius: 50px; font-weight: 700; font-size: 13px; display: inline-flex; align-items: center; gap: 8px; margin-bottom: 25px; border: 1px solid #e0e7ff; }
        .hero-content h2 { font-size: 48px; font-weight: 800; line-height: 1.1; margin-bottom: 20px; color: var(--dark); }
        .hero-content h2 span { background: linear-gradient(135deg, #6366f1, #a855f7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .hero-content p { color: var(--text-gray); font-size: 17px; max-width: 500px; margin-bottom: 30px; }
        .card-search { background: rgba(255, 255, 255, 0.95); padding: 45px 35px; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.08); text-align: center; border: 1px solid var(--border); backdrop-filter: blur(20px); }
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
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        .result-card { max-width: 500px; margin: 40px auto; background: white; border-radius: 24px; padding: 40px; text-align: center; box-shadow: 0 20px 40px rgba(0,0,0,0.08); border: 1px solid var(--border); }
        .result-icon { width: 90px; height: 90px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 40px; }
        .result-card h2 { font-size: 32px; font-weight: 800; margin-bottom: 5px; }
        .result-card .nisn-text { color: var(--text-gray); font-size: 15px; margin-bottom: 20px; }
        .result-card .detail-item { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid var(--border); font-size: 14px; }
        .result-card .detail-item:last-child { border-bottom: none; }
        .result-card .detail-item .label { color: var(--text-gray); font-weight: 600; }
        .result-card .detail-item .value { font-weight: 700; color: var(--dark); }
        .btn-cetak { display: inline-flex; align-items: center; gap: 8px; background: var(--dark); color: white; padding: 14px 30px; border-radius: 12px; text-decoration: none; font-weight: 700; margin-top: 20px; transition: all 0.3s; }
        .btn-cetak:hover { background: var(--primary); color: white; transform: translateY(-2px); }
        .not-found { max-width: 500px; margin: 30px auto; background: white; border-radius: 24px; padding: 50px 35px; text-align: center; box-shadow: 0 20px 40px rgba(0,0,0,0.08); border: 1px solid var(--border); }
        .not-found .nf-icon { width: 80px; height: 80px; border-radius: 50%; background: #fef2f2; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: #ef4444; font-size: 34px; }
        .not-found h4 { font-weight: 800; color: var(--dark); margin-bottom: 8px; }
        .not-found p { color: var(--text-gray); font-size: 14px; }
        .features { padding: 80px 8%; text-align: center; }
        .features h2 { font-size: 36px; font-weight: 800; margin-bottom: 50px; }
        .feature-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; max-width: 1000px; margin: 0 auto; }
        .feature-card { background: rgba(255,255,255,0.9); padding: 35px 25px; border-radius: 20px; border: 1px solid var(--border); backdrop-filter: blur(10px); transition: all 0.3s; }
        .feature-card:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.06); border-color: var(--primary); }
        .feature-card .f-icon { width: 65px; height: 65px; border-radius: 18px; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center; font-size: 26px; color: var(--primary); background: #f5f3ff; }
        footer { background: linear-gradient(135deg, var(--dark), #1e293b); color: white; padding: 50px 8% 30px; border-radius: 40px 40px 0 0; margin-top: 40px; text-align: center; }
        footer small { color: #94a3b8; }
        @media (max-width: 768px) { .hero { grid-template-columns: 1fr; padding: 40px 5%; text-align: center; } .hero-content h2 { font-size: 32px; } .feature-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

<nav>
    <div class="logo-section">
        <img src="<?= base_url('logo%20pgri.png') ?>" alt="Logo PGRI" class="logo-img">
        <div class="brand-text">
            <h1>SMA PGRI 1 SUBANG</h1>
            <p>Berakhlak, Cerdas, Berprestasi</p>
        </div>
    </div>
    <div style="display:flex;gap:10px;">
        <a href="<?= base_url('tracer-study') ?>" class="btn-nav btn-outline"><i class="fa-solid fa-clipboard-question"></i> Tracer Study</a>
        <a href="<?= base_url('alumni') ?>" class="btn-nav btn-outline"><i class="fa-solid fa-user-graduate"></i> Tracking Alumni</a>
        <a href="<?= base_url('login') ?>" class="btn-nav"><i class="fa-solid fa-user-shield"></i> Login</a>
    </div>
</nav>

<section class="hero">
    <div class="hero-content">
        <div class="badge"><i class="fa-solid fa-calendar-check"></i> Tahun Pelajaran 2025/2026</div>
        <h2>Pengumuman<br><span>Kelulusan</span> 2026</h2>
        <p>Masukkan NISN resmi untuk mengecek hasil kelulusan Anda secara langsung dan cepat.</p>
        <div class="official-badge" style="display:flex;align-items:center;gap:15px;background:rgba(255,255,255,0.9);padding:18px 22px;border-radius:14px;border-left:4px solid var(--secondary);max-width:450px;">
            <i class="fa-solid fa-circle-check" style="color:var(--secondary);font-size:26px;"></i>
            <div><strong style="font-size:14px;">Sistem Informasi Resmi</strong><br><small style="color:var(--text-gray);">Data dari database SMA PGRI 1 Subang</small></div>
        </div>
    </div>
    <div class="card-search">
        <div class="search-icon"><i class="fa-solid fa-graduation-cap"></i></div>
        <h3>Cek Kelulusan</h3>
        <p class="instruction">Masukkan NISN Anda</p>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger py-2 small"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('proses-cek') ?>" method="POST">
            <div class="input-wrapper">
                <i class="fa-solid fa-id-card"></i>
                <input type="text" name="nisn_input" placeholder="Masukkan 10 digit NISN" required maxlength="20" value="<?= isset($nisn) ? $nisn : '' ?>">
            </div>
            <button type="submit" class="btn-search" id="btnSearch">
                <span><i class="fa-solid fa-magnifying-glass"></i> Cek Sekarang</span>
            </button>
        </form>
    </div>
</section>

<?php if (isset($not_found) && $not_found): ?>
<div class="not-found">
    <div class="nf-icon"><i class="fa-solid fa-circle-exclamation"></i></div>
    <h4>NISN Tidak Ditemukan</h4>
    <p>NISN <strong><?= esc($nisn) ?></strong> tidak terdaftar. Silakan periksa kembali NISN Anda.</p>
</div>
<?php elseif (isset($siswa) && $siswa): ?>
<div class="result-card">
    <div class="result-icon" style="background:<?= $siswa['status_kelulusan'] == 'LULUS' ? '#f0fdf4' : '#fef2f2' ?>;">
        <i class="fa-solid <?= $siswa['status_kelulusan'] == 'LULUS' ? 'fa-check-circle' : 'fa-xmark-circle' ?>" style="color:<?= $siswa['status_kelulusan'] == 'LULUS' ? '#10b981' : '#ef4444' ?>;"></i>
    </div>
    <h2 style="color:<?= $siswa['status_kelulusan'] == 'LULUS' ? '#10b981' : '#ef4444' ?>;"><?= $siswa['status_kelulusan'] ?></h2>
    <p class="nisn-text">NISN: <?= $siswa['nisn'] ?></p>

    <div style="text-align:left;margin-top:20px;">
        <div class="detail-item"><span class="label">Nama</span><span class="value"><?= $siswa['nama_siswa'] ?></span></div>
        <div class="detail-item"><span class="label">Kelas</span><span class="value"><?= $siswa['kelas'] ?></span></div>
        <div class="detail-item"><span class="label">Jurusan</span><span class="value"><?= $siswa['jurusan'] ?></span></div>
        <div class="detail-item"><span class="label">Tahun Lulus</span><span class="value"><?= $siswa['tahun_lulus'] ?></span></div>
    </div>

    <?php if ($siswa['status_kelulusan'] == 'LULUS'): ?>
    <a href="<?= base_url('cetak-kelulusan/' . $siswa['nisn']) ?>" class="btn-cetak" target="_blank">
        <i class="fa-solid fa-print"></i> Cetak Surat Kelulusan
    </a>
    <?php endif; ?>
</div>
<?php endif; ?>

<section class="features">
    <h2>Layanan Sistem Informasi</h2>
    <div class="feature-grid">
        <div class="feature-card">
            <div class="f-icon"><i class="fa-solid fa-check-circle"></i></div>
            <h4>Cek Kelulusan</h4>
            <p>Hasil kelulusan langsung dari database sekolah, cepat dan akurat.</p>
        </div>
        <div class="feature-card">
            <div class="f-icon" style="color:#10b981;background:#f0fdf4;"><i class="fa-solid fa-route"></i></div>
            <h4>Tracking Alumni</h4>
            <p>Pantau perkembangan alumni setelah lulus dengan input NISN.</p>
        </div>
        <div class="feature-card">
            <div class="f-icon" style="color:#f59e0b;background:#fffbeb;"><i class="fa-solid fa-clipboard-list"></i></div>
            <h4>Tracer Study</h4>
            <p>Isi data untuk membantu pendataan perkembangan alumni.</p>
        </div>
    </div>
</section>

<footer>
    <p>&copy; 2026 SMA PGRI 1 SUBANG - Sistem Informasi Kelulusan & Tracking Alumni</p>
    <small>Jl. Otto Iskandardinata No. 83, Subang, Jawa Barat 41211</small>
</footer>

<div id="loadingOverlay" class="loading-overlay">
    <div class="loading-content">
        <img src="<?= base_url('logo%20pgri.png') ?>" alt="Loading..." class="loading-logo">
        <div class="countdown-number" id="countdownNumber">5</div>
        <p>Memeriksa data kelulusan...</p>
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
.loading-content {
    text-align: center;
}
.loading-logo {
    width: 80px; height: auto;
    animation: pulse-load 1.2s ease-in-out infinite;
}
.countdown-number {
    font-size: 48px; font-weight: 800; color: #6366f1;
    margin-top: 15px;
    animation: fade-load 0.5s ease-in-out infinite;
}
.loading-content p {
    margin-top: 10px; font-weight: 700; color: #0f172a;
    font-size: 16px;
}
.countdown-number.danger { color: #ef4444; animation: pulse-load 0.4s ease-in-out infinite; }
.countdown-number.warning { color: #f59e0b; }
@keyframes pulse-load {
    0%, 100% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.15); opacity: 0.7; }
}
@keyframes fade-load {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}
</style>
<script>
var AudioCtx = window.AudioContext || window.webkitAudioContext;

function playTick(remaining) {
    var ctx = new AudioCtx();
    var t = ctx.currentTime;

    // deep kick thud
    var kick = ctx.createOscillator();
    var kgain = ctx.createGain();
    kick.connect(kgain);
    kgain.connect(ctx.destination);
    kick.frequency.setValueAtTime(150, t);
    kick.frequency.exponentialRampToValueAtTime(40, t + 0.15);
    kick.type = 'sine';
    kgain.gain.setValueAtTime(0.6, t);
    kgain.gain.exponentialRampToValueAtTime(0.001, t + 0.2);
    kick.start(t);
    kick.stop(t + 0.2);

    // rising ping - pitch increases as countdown nears 0
    var ping = ctx.createOscillator();
    var pgain = ctx.createGain();
    ping.connect(pgain);
    pgain.connect(ctx.destination);
    var pingFreq = 400 + (10 - remaining) * 80;
    ping.frequency.value = pingFreq;
    ping.type = 'triangle';
    pgain.gain.setValueAtTime(0.2, t + 0.05);
    pgain.gain.exponentialRampToValueAtTime(0.001, t + 0.25);
    ping.start(t + 0.05);
    ping.stop(t + 0.25);

    // low rumble that gets louder as countdown progresses
    var rumble = ctx.createOscillator();
    var rgain = ctx.createGain();
    rumble.connect(rgain);
    rgain.connect(ctx.destination);
    rumble.frequency.value = 60;
    rumble.type = 'sawtooth';
    var rumbleVol = 0.05 + (10 - remaining) * 0.03;
    rgain.gain.setValueAtTime(rumbleVol, t);
    rgain.gain.exponentialRampToValueAtTime(0.001, t + 0.5);
    rumble.start(t);
    rumble.stop(t + 0.5);
}

function playFinal() {
    var ctx = new AudioCtx();
    var t = ctx.currentTime;

    // dramatic rising sweep
    var sweep = ctx.createOscillator();
    var sgain = ctx.createGain();
    sweep.connect(sgain);
    sgain.connect(ctx.destination);
    sweep.frequency.setValueAtTime(200, t);
    sweep.frequency.exponentialRampToValueAtTime(1200, t + 0.8);
    sweep.type = 'sawtooth';
    sgain.gain.setValueAtTime(0.3, t);
    sgain.gain.setValueAtTime(0.3, t + 0.6);
    sgain.gain.exponentialRampToValueAtTime(0.001, t + 0.9);
    sweep.start(t);
    sweep.stop(t + 0.9);

    // ta-da chord
    var notes = [523.25, 659.25, 783.99, 1046.5];
    notes.forEach(function(freq, i) {
        var osc = ctx.createOscillator();
        var gain = ctx.createGain();
        osc.connect(gain);
        gain.connect(ctx.destination);
        osc.frequency.value = freq;
        osc.type = 'sine';
        var startT = t + 0.7 + i * 0.08;
        gain.gain.setValueAtTime(0, t);
        gain.gain.setValueAtTime(0.35, startT);
        gain.gain.exponentialRampToValueAtTime(0.001, startT + 0.6);
        osc.start(startT);
        osc.stop(startT + 0.6);
    });
}

document.querySelector('form[action*="proses-cek"]')?.addEventListener('submit', function(e) {
    e.preventDefault();
    var form = this;
    var overlay = document.getElementById('loadingOverlay');
    var countEl = document.getElementById('countdownNumber');
    var count = 10;
    countEl.textContent = count;
    countEl.className = 'countdown-number';
    overlay.classList.add('active');
    playTick(count);
    var timer = setInterval(function() {
        count--;
        countEl.textContent = count;
        countEl.className = 'countdown-number' + (count <= 3 ? ' danger' : count <= 6 ? ' warning' : '');
        if (count > 0) playTick(count);
        if (count <= 0) {
            clearInterval(timer);
            playFinal();
            setTimeout(function() { form.submit(); }, 1200);
        }
    }, 1000);
});
</script>

</body>
</html>
