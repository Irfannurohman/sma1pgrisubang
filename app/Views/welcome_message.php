<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SKL SMA 1 PGRI Subang - Portal Kelulusan Siswa</title>
    <meta name="description" content="Portal resmi SKL (Surat Keterangan Lulus) SMA 1 PGRI Subang. Akses informasi kelulusan, nilai, dan laporan siswa dengan mudah.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <style {csp-style-nonce}>
        * {
            box-sizing: border-box;
            transition: background-color 300ms ease, color 300ms ease;
        }
        html, body {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif;
            color: #1f2937;
            background-color: #f8fafc;
        }
        a {
            color: inherit;
            text-decoration: none;
        }
        header {
            background-color: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1120px;
            margin: 0 auto;
            padding: 1rem 1.5rem;
        }
        .brand {
            font-size: 1.25rem;
            font-weight: 700;
            color: #dc2626;
        }
        .nav-links {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        .nav-links a {
            padding: .65rem 1rem;
            border-radius: .75rem;
            color: #4b5563;
        }
        .nav-links a.cta {
            background-color: #dc2626;
            color: #ffffff;
            font-weight: 600;
        }
        .hero {
            max-width: 1120px;
            margin: 0 auto;
            padding: 4rem 1.5rem 3rem;
            display: grid;
            gap: 1.5rem;
        }
        .hero-title {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            line-height: 1.05;
            margin: 0;
            color: #1f2937;
            font-weight: 700;
        }
        .hero-school {
            font-size: 1.25rem;
            color: #dc2626;
            font-weight: 600;
            margin: 0.5rem 0 0 0;
        }
        .hero-subtitle {
            max-width: 800px;
            margin-top: 1rem;
            font-size: 1.1rem;
            line-height: 1.8;
            color: #4b5563;
        }
        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 1.75rem;
        }
        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: .9rem 1.5rem;
            border-radius: 999px;
            font-weight: 600;
        }
        .button.primary {
            background-color: #dc2626;
            color: #fff;
        }
        .button.secondary {
            border: 2px solid #dc2626;
            color: #dc2626;
            background: transparent;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1.25rem;
            padding: 0 1.5rem 3rem;
            max-width: 1120px;
            margin: 0 auto;
        }
        .card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 1.25rem;
            padding: 1.75rem;
            box-shadow: 0 16px 40px rgba(15, 23, 42, 0.06);
        }
        .card h3 {
            margin-top: 0;
            margin-bottom: .75rem;
            font-size: 1.15rem;
        }
        .card p {
            margin: 0;
            color: #4b5563;
            line-height: 1.75;
        }
        footer {
            background-color: #ffffff;
            border-top: 1px solid #e5e7eb;
            padding: 2rem 1.5rem;
            color: #6b7280;
        }
        .footer-content {
            max-width: 1120px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .footer-content p {
            margin: 0;
        }
        @media (max-width: 860px) {
            .cards {
                grid-template-columns: 1fr;
            }
            .hero {
                padding-top: 2.5rem;
            }
            .nav-links {
                display: none;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="navbar">
        <div style="display: flex; gap: 0.5rem; align-items: center;">
            <div style="font-size: 1.5rem;">🎓</div>
            <div>
                <a class="brand" href="/">SKL SMA 1 PGRI</a>
                <div style="font-size: 0.75rem; color: #6b7280;">Subang</div>
            </div>
        </div>
        <nav class="nav-links">
            <a href="#fitur">Fitur</a>
            <a href="#pengguna">Pengguna</a>
            <a href="#tentang">Tentang</a>
            <a class="cta" href="/login">Masuk</a>
        </nav>
    </div>
</header>

<main>
    <section class="hero" id="beranda">
        <div>
            <h1 class="hero-title">Selamat Datang di Portal SKL</h1>
            <p class="hero-school">SMA 1 PGRI Subang</p>
            <p class="hero-subtitle">Sistem manajemen Surat Keterangan Lulus (SKL) yang dirancang untuk memberikan kemudahan bagi siswa, guru, dan pimpinan sekolah dalam mengakses informasi kelulusan secara real-time dan aman.</p>
            <div class="hero-actions">
                <a class="button primary" href="/login">Masuk ke Sistem</a>
                <a class="button secondary" href="/register">Daftar Akun Baru</a>
            </div>
        </div>
    </section>

    <section class="cards" id="fitur">
        <article class="card">
            <h3>📋 Pengumuman Kelulusan</h3>
            <p>Lihat daftar kelulusan siswa SMA 1 PGRI Subang secara real-time dan akurat. Informasi diperbarui langsung oleh pihak sekolah.</p>
        </article>
        <article class="card">
            <h3>📊 Laporan & Nilai</h3>
            <p>Siswa dapat mengakses laporan kelulusan, nilai akhir, dan surat keterangan lulus (SKL) melalui akun pribadi mereka.</p>
        </article>
        <article class="card">
            <h3>🔐 Keamanan Terjamin</h3>
            <p>Sistem terenkripsi dan berbasis peran. Data pribadi siswa terlindungi dengan akses yang terbatas hanya untuk pengguna yang berwenang.</p>
        </article>
    </section>

    <section style="max-width: 1120px; margin: 3rem auto 0; padding: 0 1.5rem;" id="pengguna">
        <div style="text-align: center; margin-bottom: 2.5rem;">
            <h2 style="font-size: 2rem; margin: 0 0 0.5rem 0; color: #1f2937;">Untuk Siapa Sistem Ini?</h2>
            <p style="color: #4b5563; margin: 0;">Sistem SKL dirancang untuk memenuhi kebutuhan semua pengguna di lingkungan sekolah</p>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 3rem;">
            <article class="card">
                <h3 style="color: #dc2626;">👨‍🎓 Siswa</h3>
                <p><strong>Fitur utama:</strong></p>
                <ul style="margin: 0.75rem 0; padding-left: 1.5rem; color: #4b5563;">
                    <li>Cek status kelulusan pribadi</li>
                    <li>Lihat nilai dan rapor</li>
                    <li>Download SKL (Surat Keterangan Lulus)</li>
                    <li>Akses informasi kapan saja</li>
                </ul>
            </article>
            <article class="card">
                <h3 style="color: #dc2626;">👨‍🏫 Guru/Wali Kelas</h3>
                <p><strong>Fitur utama:</strong></p>
                <ul style="margin: 0.75rem 0; padding-left: 1.5rem; color: #4b5563;">
                    <li>Kelola data siswa kelas</li>
                    <li>Lihat nilai dan pencapaian siswa</li>
                    <li>Verifikasi status kelulusan</li>
                    <li>Laporan kelengkapan data</li>
                </ul>
            </article>
            <article class="card">
                <h3 style="color: #dc2626;">👔 Kepala Sekolah</h3>
                <p><strong>Fitur utama:</strong></p>
                <ul style="margin: 0.75rem 0; padding-left: 1.5rem; color: #4b5563;">
                    <li>Dashboard statistik kelulusan</li>
                    <li>Lihat laporan keseluruhan</li>
                    <li>Kelola penetapan kelulusan</li>
                    <li>Export data untuk keperluan administratif</li>
                </ul>
            </article>
            <article class="card">
                <h3 style="color: #dc2626;">⚙️ Administrator</h3>
                <p><strong>Fitur utama:</strong></p>
                <ul style="margin: 0.75rem 0; padding-left: 1.5rem; color: #4b5563;">
                    <li>Manajemen pengguna dan akun</li>
                    <li>Pengaturan sistem dan keamanan</li>
                    <li>Backup data dan laporan teknis</li>
                    <li>Monitoring aktivitas sistem</li>
                </ul>
            </article>
        </div>
    </section>

    <section style="max-width: 1120px; margin: 0 auto; padding: 2rem 1.5rem 3rem;" id="tentang">
        <div style="background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%); color: white; border-radius: 1.25rem; padding: 2.5rem; text-align: center;">
            <h2 style="margin: 0 0 1rem 0; font-size: 1.75rem;">Tentang SKL (Surat Keterangan Lulus)</h2>
            <p style="margin: 0; line-height: 1.8; max-width: 700px; margin: 0 auto;">SKL adalah dokumen resmi yang diterbitkan oleh sekolah untuk membuktikan bahwa seorang siswa telah menyelesaikan pendidikan di sekolah tersebut dengan standar kurikulum yang berlaku. Sistem portal ini memudahkan proses pengumuman, verifikasi, dan distribusi SKL kepada siswa.</p>
        </div>
    </section>

    <section style="max-width: 1120px; margin: 0 auto; padding: 0 1.5rem 3rem;">
        <div class="card" style="background: #f0f9ff; border: 2px solid #0ea5e9;">
            <h3 style="color: #0284c7; margin-top: 0;">🚀 Siap untuk Memulai?</h3>
            <p style="margin: 1rem 0; color: #1f2937;">Akses sistem portal SKL dengan akun Anda sekarang. Jika belum memiliki akun, daftarkan diri Anda sebagai siswa untuk mendapatkan akses penuh ke semua fitur.</p>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 1.5rem;">
                <a class="button primary" href="/login" style="background-color: #0284c7;">Login ke Portal</a>
                <a class="button secondary" href="/register" style="border-color: #0284c7; color: #0284c7;">Daftar Siswa Baru</a>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="footer-content">
        <div>
            <p style="font-weight: 600; margin-bottom: 0.5rem;">SMA 1 PGRI Subang</p>
            <p style="font-size: 0.9rem;">Portal Kelulusan & Surat Keterangan Lulus (SKL)</p>
        </div>
        <div style="text-align: right;">
            <p>&copy; <?= date('Y') ?> SMA 1 PGRI Subang. Hak cipta dilindungi undang-undang.</p>
            <p style="font-size: 0.85rem; color: #9ca3af;">Environment: <?= ENVIRONMENT ?> | v1.0.0</p>
        </div>
    </div>
</footer>

</body>
</html>
