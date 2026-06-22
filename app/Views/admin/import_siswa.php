<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Data Siswa - SMA PGRI 1 Subang</title>
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
        .page-title h2 { font-weight: 800; font-size: 24px; color: var(--dark); }
        .page-title p { color: var(--text-gray); font-size: 14px; }
        
        .card-panel { background: white; border-radius: 20px; padding: 30px; border: 1px solid var(--border); box-shadow: 0 4px 15px rgba(0,0,0,0.04); margin-bottom: 25px; }
        .card-panel h5 { font-weight: 700; font-size: 18px; margin-bottom: 20px; color: var(--dark); }
        
        .upload-area { border: 2px dashed var(--border); border-radius: 15px; padding: 40px; text-align: center; background: #f8fafc; transition: all 0.3s; cursor: pointer; }
        .upload-area:hover { border-color: var(--primary); background: #f1f5f9; }
        .upload-area i { font-size: 48px; color: var(--text-gray); margin-bottom: 15px; }
        
        .alert-error-list { background: #fef2f2; border: 1px solid #fecaca; border-radius: 12px; padding: 20px; color: #991b1b; }
        .alert-error-list ul { margin-bottom: 0; padding-left: 20px; }
        
        @media (max-width: 768px) { .sidebar { width: 70px; padding: 20px 10px; } .sidebar-brand h5, .sidebar-brand small, .nav-item span, .sidebar-footer span, .nav-label { display: none; } .main-content { margin-left: 70px; padding: 20px; } }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <div style="flex-shrink:0;"><img src="<?= base_url('logo%20pgri.png') ?>" alt="Logo" style="width:50px;height:auto;"></div>
        <div><h5>SMA PGRI 1</h5><small>Panel Admin</small></div>
    </div>
    <a href="<?= base_url('admin/dashboard') ?>" class="nav-item"><i class="fa-solid fa-chart-pie"></i><span>Dashboard</span></a>
    <a href="<?= base_url('admin/siswa') ?>" class="nav-item active"><i class="fa-solid fa-users"></i><span>Data Siswa</span></a>
    <a href="<?= base_url('admin/alumni') ?>" class="nav-item"><i class="fa-solid fa-user-graduate"></i><span>Data Alumni</span></a>
    <a href="<?= base_url('admin/tracer') ?>" class="nav-item"><i class="fa-solid fa-clipboard-list"></i><span>Tracer Study</span></a>
    <a href="<?= base_url('admin/laporan') ?>" class="nav-item"><i class="fa-solid fa-chart-bar"></i><span>Laporan</span></a>

    <a href="<?= base_url('admin/pengaturan-kelulusan') ?>" class="nav-item"><i class="fa-solid fa-clock"></i><span>Pengaturan Kelulusan</span></a>
    <a href="<?= base_url('admin/keterserapan') ?>" class="nav-item"><i class="fa-solid fa-chart-line"></i><span>Keterserapan</span></a>
    <div class="sidebar-footer">
        <a href="<?= base_url('logout') ?>" class="nav-item"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
    </div>
</div>

<div class="main-content">
    <div class="top-bar">
        <div class="page-title">
            <h2><i class="fa-solid fa-file-excel me-2" style="color:#10b981;"></i>Import Data Siswa</h2>
            <p>Upload file Excel untuk menambahkan banyak data siswa sekaligus.</p>
        </div>
        <a href="<?= base_url('admin/siswa') ?>" class="btn btn-outline-dark rounded-pill px-4">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show py-3 rounded-4" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i> <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show py-3 rounded-4" role="alert">
            <i class="fa-solid fa-circle-exclamation me-2"></i> <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('import_errors')): ?>
        <div class="alert-error-list mb-4">
            <h6 class="fw-bold"><i class="fa-solid fa-triangle-exclamation me-2"></i>Beberapa baris gagal diimport:</h6>
            <ul>
                <?php foreach(session()->getFlashdata('import_errors') as $err): ?>
                    <li><?= esc($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-6">
            <div class="card-panel">
                <h5>Langkah 1: Download Template</h5>
                <p class="text-muted mb-4">Silakan gunakan template Excel resmi kami agar data terbaca dengan benar oleh sistem.</p>
                <a href="<?= base_url('admin/siswa/template-excel') ?>" class="btn btn-success rounded-pill px-4 py-2 fw-semibold">
                    <i class="fa-solid fa-download me-2"></i> Download Template Excel
                </a>
            </div>
            
            <div class="card-panel">
                <h5><i class="fa-solid fa-info-circle me-2" style="color:var(--primary);"></i> Petunjuk Pengisian</h5>
                <ul class="text-muted mt-3 ps-3" style="font-size:14px; line-height:1.8;">
                    <li>Pastikan tidak mengubah nama kolom di baris pertama (Header).</li>
                    <li><strong>NISN</strong> wajib diisi dan tidak boleh sama dengan data yang sudah ada di database.</li>
                    <li>Kolom <strong>Jenis Kelamin</strong> hanya diisi dengan huruf <code>L</code> atau <code>P</code>.</li>
                    <li>Kolom <strong>Status Kelulusan</strong> diisi dengan <code>LULUS</code> atau <code>TIDAK LULUS</code>.</li>
                    <li>Jangan ada baris kosong di tengah-tengah data.</li>
                </ul>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card-panel h-100">
                <h5>Langkah 2: Upload Data</h5>
                <p class="text-muted mb-4">Pilih file Excel yang sudah Anda isi sesuai format template.</p>
                
                <form action="<?= base_url('admin/siswa/proses-import') ?>" method="POST" enctype="multipart/form-data">
                    <div class="upload-area mb-4" onclick="document.getElementById('file_excel').click()">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <h6 class="fw-bold text-dark">Klik untuk memilih file Excel</h6>
                        <p class="text-muted small mb-0">Format yang didukung: .xlsx, .xls</p>
                        <input type="file" name="file_excel" id="file_excel" accept=".xlsx, .xls" style="display:none;" required onchange="document.getElementById('filename').textContent = this.files[0].name">
                    </div>
                    
                    <div class="mb-4 text-center">
                        <span id="filename" class="fw-semibold text-primary"></span>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold fs-6">
                        <i class="fa-solid fa-upload me-2"></i> Proses Import Data
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

