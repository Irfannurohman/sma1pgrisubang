<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem - SMA PGRI 1 SUBANG</title>
    <link rel="icon" type="image/png" href="<?= base_url('logo%20pgri.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #6366f1;
            --dark: #0f172a;
            --accent-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            backdrop-filter: blur(10px);
            border: 1px solid white;
            text-align: center;
        }

        .logo-login { height: 65px; width: auto; margin-bottom: 15px; }

        .brand-logo {
            background: var(--accent-gradient);
            width: 65px;
            height: 65px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 28px;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }

        .login-header h2 {
            font-weight: 800;
            color: var(--dark);
            font-size: 28px;
            margin-bottom: 8px;
        }

        .form-label {
            font-weight: 700;
            font-size: 14px;
            color: var(--dark);
            margin-bottom: 8px;
            display: block;
        }

        .form-control, .form-select {
            border-radius: 12px;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            font-size: 15px;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: none;
            background: white;
        }

        .input-group-text {
            border-radius: 0 12px 12px 0;
            background: white;
            border: 2px solid #e2e8f0;
            border-left: none;
            cursor: pointer;
            color: var(--text-gray);
        }

        .password-input {
            border-right: none;
        }

        .btn-login {
            background: var(--dark);
            color: white;
            padding: 15px;
            border-radius: 12px;
            font-weight: 700;
            width: 100%;
            border: none;
            transition: all 0.3s;
            margin-top: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .btn-login:hover {
            background: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="brand-logo" style="background:none;box-shadow:none;">
        <img src="<?= base_url('logo%20pgri.png') ?>" alt="Logo SMA PGRI 1 Subang" style="width:80px;height:auto;">
    </div>
    
    <div class="login-header">
        <h2>Login Sistem</h2>
        <p class="text-muted small mb-4">Masukkan kredensial Anda untuk mengakses dashboard.</p>
    </div>

    <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-danger py-2 small" role="alert">
            <i class="fa-solid fa-circle-exclamation me-1"></i> <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif;?>

    <form action="<?= base_url('auth/loginProcess'); ?>" method="post">
        <?= csrf_field() ?>
        
        <div class="mb-3 text-start">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3 text-start">
            <label class="form-label">Password</label>
            <div class="input-group">
                <input type="password" name="password" id="passwordField" class="form-control password-input" required>
                <span class="input-group-text" onclick="togglePassword()">
                    <i class="fa-solid fa-eye" id="eyeIcon"></i>
                </span>
            </div>
        </div>

        <div class="mb-4 text-start">
            <label class="form-label">Masuk Sebagai</label>
            <select name="role" class="form-select" required>
                <option value="" disabled selected> Pilih Hak Akses </option>
                <option value="admin">Admin</option>
                <option value="kepsek">Kepala Sekolah</option>
            </select>
        </div>

        <button type="submit" class="btn-login">
            <span>Masuk</span> <i class="fa-solid fa-arrow-right"></i>
        </button>
    </form>

    <div class="mt-4">
        <a href="<?= base_url('/'); ?>" class="text-decoration-none small text-muted">
            <i class="fa-solid fa-house me-1"></i> Kembali
        </a>
    </div>
</div>

<div id="loadingOverlay" class="loading-overlay">
    <div class="loading-content">
        <img src="<?= base_url('logo%20pgri.png') ?>" alt="Loading..." class="loading-logo">
        <p>Memproses login...</p>
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
function togglePassword() {
    const passwordField = document.getElementById('passwordField');
    const eyeIcon = document.getElementById('eyeIcon');
    
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
}
document.querySelector('form')?.addEventListener('submit', function() {
    document.getElementById('loadingOverlay').classList.add('active');
});
</script>

</body>
</html>