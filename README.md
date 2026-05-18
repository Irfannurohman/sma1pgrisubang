# SI SKL-Tracking

<div align="center">

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.7-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)

**Sistem Informasi Kelulusan & Tracking Alumni**

[![License](https://img.shields.io/badge/License-MIT-green.svg?style=flat-square)](LICENSE)
[![PHP Version](https://img.shields.io/badge/PHP-%3E%3D8.2-blue.svg?style=flat-square)](https://www.php.net/)
[![CodeIgniter](https://img.shields.io/badge/Framework-CodeIgniter%204-red.svg?style=flat-square)](https://codeigniter.com/)
[![Database](https://img.shields.io/badge/Database-MySQL%208-orange.svg?style=flat-square)](https://www.mysql.com/)

<p align="center">
  <img src="https://img.shields.io/badge/SMA-PGRI%201%20Subang-0056A3?style=flat-square&logo=school&logoColor=white" alt="School Badge" />
</p>

![Landing Page](assets/landing_page.png)

</div>

---

##  Daftar Isi

- [Tentang Proyek](#tentang-proyek)
- [Fitur Utama](#fitur-utama)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Arsitektur Sistem](#arsitektur-sistem)
- [Struktur Database](#struktur-database)
- [Instalasi](#instalasi)
- [Penggunaan](#penggunaan)
- [Role & Akses](#role--akses)
- [Endpoint API](#endpoint-api)
- [Screenshots](#screenshots)
- [Pengembangan](#pengembangan)
- [Keamanan](#keamanan)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)
- [Kontak](#kontak)

---

##  Tentang Proyek

**SI SKL-Tracking** adalah sistem informasi berbasis web yang dikembangkan untuk **SMA PGRI 1 Subang** dalam rangka mengelola data kelulusan siswa dan melakukan tracking perkembangan alumni setelah lulus.

Sistem ini menyediakan platform yang terintegrasi untuk:

- **Cek Kelulusan Online** - Siswa dapat mengecek status kelulusan mereka menggunakan NISN (Nomor Induk Siswa Nasional)
- **Cetak Surat Keterangan Lulus (SKL)** - Generate dan cetak sertifikat kelulusan dengan format resmi
- **Tracking Alumni** - Memantau perkembangan alumni setelah lulus (bekerja, kuliah, wirausaha, dll)
- **Tracer Study** - Survei komprehensif untuk mengumpulkan data追踪 alumni pasca kelulusan
- **Dashboard Administratif** - Panel admin untuk mengelola seluruh data siswa, alumni, dan laporan
- **Panel Kepala Sekolah** - Akses read-only untuk monitoring dan pengambilan keputusan

Sistem ini dikembangkan sebagai proyek akademik untuk modernisasi administrasi sekolah dan meningkatkan transparansi informasi kelulusan serta memudahkan追踪 perkembangan alumni.

---

##  Fitur Utama

###  Publik (Tanpa Login)

| Fitur | Deskripsi |
|-------|-----------|
| Cek Kelulusan | Input NISN dengan animasi countdown 10 detik dan efek suara suspense |
| Cetak SKL | Generate surat keterangan lulus format A4 siap cetak dengan kop sekolah |
| Tracking Alumni | Cari data alumni berdasarkan NISN dan lihat status aktivitas |
| Update Data Alumni | Alumni dapat memperbarui data diri dan status aktivitas tanpa login |
| Tracer Study | Formulir survei komprehensif untuk追踪 alumni pasca kelulusan |

###  Admin

| Fitur | Deskripsi |
|-------|-----------|
| Dashboard | Ringkasan statistik: total siswa, alumni, tracer study, grafik kelulusan per tahun |
| CRUD Siswa | Tambah, lihat, edit, hapus data siswa dengan filter tahun lulus |
| CRUD Alumni | Kelola data alumni lengkap dengan foto dan status aktivitas |
| Manajemen Tracer | Lihat semua respons tracer study dan kelola data |
| Laporan | Statistik kelulusan, breakdown aktivitas alumni, status tracer study |
| Profil | Manajemen informasi profil admin |

###  Kepala Sekolah (Read-Only)

| Fitur | Deskripsi |
|-------|-----------|
| Dashboard | Statistik lengkap sama seperti admin (view-only) |
| Lihat Data Siswa | Akses data siswa tanpa kemampuan edit/hapus |
| Lihat Data Alumni | Monitoring data alumni secara real-time |
| Lihat Tracer Study | Akses data survei tracer study |
| Laporan | Statistik dan laporan untuk pengambilan keputusan |

---

##  Teknologi yang Digunakan

###  Backend

| Teknologi | Versi | Kegunaan |
|-----------|-------|----------|
| **PHP** | 8.2+ | Bahasa pemrograman utama |
| **CodeIgniter 4** | 4.7+ | Framework PHP dengan arsitektur MVC |
| **MySQL** | 8.0+ | Database relasional untuk penyimpanan data |

###  Frontend

| Teknologi | Versi | Kegunaan |
|-----------|-------|----------|
| **Bootstrap** | 5.3 | CSS framework untuk responsive design |
| **Font Awesome** | 6.5 | Ikon vektor untuk UI |
| **Google Fonts** | - | Tipografi (Plus Jakarta Sans) |
| **Web Audio API** | - | Efek suara countdown pada cek kelulusan |

###  Development & Testing

| Teknologi | Versi | Kegunaan |
|-----------|-------|----------|
| **PHPUnit** | 10.5+ | Testing framework |
| **FakerPHP** | - | Generator data dummy untuk testing |
| **vfsStream** | - | Virtual filesystem untuk testing |

###  Server & Environment

| Teknologi | Kegunaan |
|-----------|----------|
| **Laragon** | Local development server (Windows) |
| **Apache** | Web server |

---

##  Arsitektur Sistem

###  Pattern & Design

```
MVC Architecture (CodeIgniter 4)
├── Model        → Active Record Pattern untuk operasi database
├── View         → Template PHP dengan Bootstrap 5
└── Controller   → Front Controller Pattern melalui index.php

Additional Patterns:
├── Singleton    → Database connection via \Config\Database::connect()
├── Middleware   → LoginFilter untuk authentication & authorization
└── Session      → PHP session-based authentication
```

###  Struktur Proyek

```
si_skl-tracking/
├── app/
│   ├── Config/           # Konfigurasi aplikasi (routes, database, filters)
│   ├── Controllers/      # Controller utama (Admin, Alumni, Auth, Kelulusan, Kepalasekolah, TracerStudy)
│   ├── Database/
│   │   ├── Migrations/   # Schema migrations
│   │   └── Seeds/        # Seed data untuk development
│   ├── Filters/          # Middleware filters (LoginFilter)
│   ├── Models/           # Data models (AlumniModel, SiswaModel, TracerStudyModel, UserModel)
│   └── Views/            # Template views terorganisir per modul
├── public/               # Public assets (logo, tanda tangan, cap sekolah)
├── writable/             # Logs, cache, sessions, uploads
├── database.sql          # SQL dump lengkap dengan seed data
└── composer.json         # PHP dependencies
```

---

##  Struktur Database

**Database:** `db_kelulusan`

###  Tabel Utama

```
users
├── id (PK)
├── username (UNIQUE)
├── password
├── nama_lengkap
├── role (admin/kepsek)
└── timestamps

siswa
├── id (PK)
├── nisn (UNIQUE)
├── nama_siswa
├── tempat_lahir, tanggal_lahir
├── jenis_kelamin (L/P)
├── nama_orang_tua
├── kelas, jurusan
├── tahun_lulus
├── status_kelulusan (LULUS/TIDAK LULUS)
├── foto
└── timestamps

alumni
├── id (PK)
├── nisn (UNIQUE)
├── nama_alumni
├── jenis_kelamin (L/P)
├── tahun_lulus
├── no_hp, email, alamat
├── status_aktivitas (BEKERJA/KULIAH/WIRAUSAHA/BELUM)
├── nama_instansi, jurusan_kuliah
├── posisi_kerja, tahun_masuk, tahun_lulus_kuliah
├── foto
└── timestamps

tracer_study
├── id (PK)
├── nisn
├── nama
├── tahun_lulus
├── status_setelah_lulus
├── nama_pt, jurusan_kuliah
├── nama_perusahaan, posisi
├── gaji_range
├── kesesuaian_jurusan
├── saran
└── timestamps
```

###  Relasi Database

```
siswa.nisn ──┬── alumni.nisn (one-to-one)
             └── tracer_study.nisn (one-to-many)
```

---

##  Instalasi

###  Prasyarat

- PHP >= 8.2
- Composer
- MySQL 8.0+
- Web Server (Apache/Nginx) atau [Laragon](https://laragon.org/)

###  Langkah Instalasi

```bash
# 1. Clone repository
git clone https://github.com/muadzie/WEB-TRACKING-STUDY.git
cd WEB-TRACKING-STUDY

# 2. Install dependencies
composer install

# 3. Copy environment file
cp env .env

# 4. Konfigurasi .env
# Edit baris berikut sesuai konfigurasi database Anda:
# database.default.hostname = localhost
# database.default.database = db_kelulusan
# database.default.username = root
# database.default.password =
# database.default.DBDriver = MySQLi

# 5. Generate key
php spark key:generate

# 6. Jalankan migrasi
php spark migrate

# 7. Seed database
php spark db:seed AppSeeder

# 8. Jalankan development server
php spark serve
```

Akses aplikasi di: `http://localhost:8080`

###  Instalasi dengan Laragon

```bash
# 1. Clone ke folder www Laragon
git clone https://github.com/muadzie/WEB-TRACKING-STUDY.git C:\laragon\www\si_skl-tracking

# 2. Buka terminal di folder proyek
composer install

# 3. Buat database 'db_kelulusan' melalui phpMyAdmin

# 4. Import database
# Import file database.sql melalui phpMyAdmin atau:
mysql -u root db_kelulusan < database.sql

# 5. Konfigurasi .env sesuai database lokal

# 6. Akses aplikasi di browser
http://si_skl-tracking.test
```

---

##  Penggunaan

###  Default Credentials

| Role | Username | Password |
|------|----------|----------|
| Admin | `admin` | `admin123` |
| Kepala Sekolah | `kepsek` | `kepsek123` |

> **PENTING:** Segera ubah password default setelah instalasi!

###  Alur Penggunaan

####  Cek Kelulusan
1. Buka halaman utama (`/`)
2. Masukkan NISN siswa
3. Tunggu animasi countdown 10 detik
4. Lihat status kelulusan (LULUS/TIDAK LULUS)
5. Cetak SKL jika diperlukan

####  Tracking Alumni
1. Buka halaman alumni (`/alumni`)
2. Masukkan NISN untuk mencari data
3. Lihat status aktivitas alumni
4. Update data jika diperlukan

####  Tracer Study
1. Buka halaman tracer study (`/tracer-study`)
2. Isi formulir survei lengkap
3. Submit data

####  Panel Admin
1. Login di `/login` dengan role Admin
2. Kelola data siswa, alumni, dan tracer study
3. Lihat laporan dan statistik di dashboard

---

##  Role & Akses

###  Matriks Akses

| Fitur | Publik | Admin | Kepala Sekolah |
|-------|--------|-------|----------------|
| Cek Kelulusan |  |  |  |
| Cetak SKL |  |  |  |
| Tracking Alumni |  |  |  |
| Update Alumni |  |  |  |
| Tracer Study (Isi) |  |  |  |
| Dashboard |  |  |  |
| CRUD Siswa |  |  |  |
| CRUD Alumni |  |  |  |
| Manajemen Tracer |  |  |  |
| Laporan |  |  |  |

###  Authentication Flow

```
Login Page → Input Username + Password + Role
                 ↓
         Auth::loginProcess()
                 ↓
         Validasi User di Database
                 ↓
         Set Session (isLogin, username, role)
                 ↓
         LoginFilter → Redirect sesuai Role
                 ↓
         /admin/dashboard atau /kepsek/dashboard
```

---

##  Endpoint API

###  Public Routes

| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| `GET` | `/` | Halaman cek kelulusan |
| `POST` | `/proses-cek` | Proses cek NISN |
| `GET` | `/cetak-kelulusan/:nisn` | Cetak SKL |
| `GET` | `/alumni` | Halaman tracking alumni |
| `POST` | `/alumni/tracking` | Cari alumni by NISN |
| `POST` | `/alumni/update-status` | Update data alumni |
| `GET` | `/tracer-study` | Form tracer study |
| `POST` | `/tracer/simpan` | Submit tracer study |

###  Admin Routes (Auth Required)

| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| `GET` | `/admin/dashboard` | Dashboard admin |
| `GET` | `/admin/siswa` | Data siswa |
| `GET/POST` | `/admin/siswa/*` | CRUD siswa |
| `GET` | `/admin/alumni` | Data alumni |
| `GET/POST` | `/admin/alumni/*` | CRUD alumni |
| `GET` | `/admin/tracer` | Data tracer study |
| `GET` | `/admin/laporan` | Laporan & statistik |
| `GET` | `/admin/profil` | Profil admin |

###  Kepala Sekolah Routes (Auth Required)

| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| `GET` | `/kepsek/dashboard` | Dashboard kepsek |
| `GET` | `/kepsek/siswa` | Data siswa (read-only) |
| `GET` | `/kepsek/alumni` | Data alumni (read-only) |
| `GET` | `/kepsek/tracer` | Data tracer (read-only) |
| `GET` | `/kepsek/laporan` | Laporan (read-only) |

---

##  Screenshots

> *Tambahkan screenshot aplikasi Anda di sini*

| Halaman | Preview |
|---------|---------|
| Homepage Cek Kelulusan | ![Cek Kelulusan](screenshots/home.png) |
| Hasil Kelulusan | ![Hasil](screenshots/hasil.png) |
| Surat Keterangan Lulus | ![SKL](screenshots/skl.png) |
| Dashboard Admin | ![Dashboard](screenshots/dashboard.png) |
| Data Siswa | ![Siswa](screenshots/siswa.png) |
| Tracking Alumni | ![Alumni](screenshots/alumni.png) |
| Tracer Study | ![Tracer](screenshots/tracer.png) |
| Laporan | ![Laporan](screenshots/laporan.png) |

---

##  Pengembangan

###  Menambahkan Fitur Baru

```bash
# Buat controller baru
php spark make:controller NamaController

# Buat model baru
php spark make:model NamaModel

# Buat migration baru
php spark make:migration CreateNamaTable

# Buat seeder baru
php spark make:seeder NamaSeeder
```

###  Running Tests

```bash
# Jalankan semua test
php vendor/bin/phpunit

# Jalankan test spesifik
php vendor/bin/phpunit tests/Unit
```

###  Database Commands

```bash
# Lihat status migrasi
php spark migrate:status

# Rollback migrasi
php spark migrate:rollback

# Seed database
php spark db:seed AppSeeder
```

---

##  Keamanan

###  Catatan Keamanan

| Status | Item | Keterangan |
|--------|------|------------|
|  | Password Hashing | Password disimpan plain text, disarankan menggunakan `password_hash()` |
|  | CSRF Protection | CSRF filter tersedia tapi dinonaktifkan, aktifkan di `Filters.php` |
|  | Rate Limiting | Belum ada proteksi brute-force pada login |

###  Rekomendasi Keamanan

1. **Hash Password** - Implementasi bcrypt/argon2 untuk penyimpanan password
2. **Aktifkan CSRF** - Uncomment filter CSRF di `app/Config/Filters.php`
3. **Rate Limiting** - Tambahkan throttle pada endpoint login
4. **Input Sanitization** - Validasi dan sanitasi semua input user
5. **HTTPS** - Gunakan HTTPS untuk production
6. **Environment** - Set `CI_ENVIRONMENT = production` di `.env`

---

##  Kontribusi

Kontribusi sangat diterima! Berikut cara berkontribusi:

```bash
# 1. Fork repository
# 2. Buat feature branch
git checkout -b feature/AmazingFeature

# 3. Commit perubahan
git commit -m 'feat: add AmazingFeature'

# 4. Push ke branch
git push origin feature/AmazingFeature

# 5. Buat Pull Request
```

###  Guidelines Kontribusi

- Ikuti coding style yang sudah ada
- Tambahkan test untuk fitur baru
- Update dokumentasi jika diperlukan
- Gunakan conventional commits

---

##  Lisensi

Proyek ini dilisensikan di bawah **MIT License**. Lihat file [LICENSE](LICENSE) untuk detail.

---

##  Kontak

**Developer:** muadzie

**Repository:** [https://github.com/muadzie/WEB-TRACKING-STUDY](https://github.com/muadzie/WEB-TRACKING-STUDY)

**Organisasi:** SMA PGRI 1 Subang

---

<div align="center">

**Dibuat dengan  untuk SMA PGRI 1 Subang**

[![GitHub stars](https://img.shields.io/github/stars/muadzie/WEB-TRACKING-STUDY?style=social)](https://github.com/muadzie/WEB-TRACKING-STUDY/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/muadzie/WEB-TRACKING-STUDY?style=social)](https://github.com/muadzie/WEB-TRACKING-STUDY/network/members)
[![GitHub issues](https://img.shields.io/github/issues/muadzie/WEB-TRACKING-STUDY?style=social)](https://github.com/muadzie/WEB-TRACKING-STUDY/issues)

</div>
