-- ============================================================
-- DATABASE: db_kelulusan
-- Sistem Informasi Kelulusan & Tracking Alumni
-- SMA PGRI 1 SUBANG
-- ============================================================

CREATE DATABASE IF NOT EXISTS db_kelulusan;
USE db_kelulusan;

-- ------------------------------------------------------------
-- Table: pengaturan_kelulusan (Pengaturan Waktu Pengumuman)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS pengaturan_kelulusan (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tahun_ajaran VARCHAR(20) NOT NULL,
    tanggal_pengumuman DATE NOT NULL,
    jam_pengumuman TIME NOT NULL,
    pesan_sebelum TEXT DEFAULT NULL,
    pesan_sesudah TEXT DEFAULT NULL,
    is_aktif TINYINT(1) DEFAULT 1,
    created_at DATETIME DEFAULT NULL,
    updated_at DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table: users (Admin & Kepala Sekolah)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(255) NOT NULL,
    role ENUM('admin', 'kepsek') DEFAULT 'admin',
    created_at DATETIME DEFAULT NULL,
    updated_at DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table: siswa (Data Siswa)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS siswa (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nisn VARCHAR(20) NOT NULL UNIQUE,
    nama_siswa VARCHAR(255) NOT NULL,
    tempat_lahir VARCHAR(100) DEFAULT NULL,
    tanggal_lahir DATE DEFAULT NULL,
    jenis_kelamin ENUM('L', 'P') DEFAULT NULL,
    nama_orang_tua VARCHAR(255) DEFAULT NULL,
    kelas VARCHAR(50) DEFAULT NULL,
    jurusan VARCHAR(100) DEFAULT NULL,
    tahun_lulus YEAR(4) DEFAULT NULL,
    status_kelulusan ENUM('LULUS', 'TIDAK LULUS') DEFAULT 'LULUS',
    foto VARCHAR(255) DEFAULT NULL,
    created_at DATETIME DEFAULT NULL,
    updated_at DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table: alumni (Tracking Alumni)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS alumni (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nisn VARCHAR(20) NOT NULL UNIQUE,
    nama_alumni VARCHAR(255) NOT NULL,
    jenis_kelamin ENUM('L', 'P') DEFAULT NULL,
    tahun_lulus YEAR(4) DEFAULT NULL,
    no_hp VARCHAR(20) DEFAULT NULL,
    email VARCHAR(255) DEFAULT NULL,
    alamat TEXT DEFAULT NULL,
    status_aktivitas ENUM('BEKERJA', 'KULIAH', 'WIRAUSAHA', 'BELUM') DEFAULT 'BELUM',
    nama_instansi VARCHAR(255) DEFAULT NULL,
    jurusan_kuliah VARCHAR(255) DEFAULT NULL,
    posisi_kerja VARCHAR(255) DEFAULT NULL,
    tahun_masuk YEAR(4) DEFAULT NULL,
    tahun_lulus_kuliah YEAR(4) DEFAULT NULL,
    foto VARCHAR(255) DEFAULT NULL,
    created_at DATETIME DEFAULT NULL,
    updated_at DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table: tracer_study (Tracer Study Alumni)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS tracer_study (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nisn VARCHAR(20) NOT NULL,
    nama VARCHAR(255) NOT NULL,
    tahun_lulus YEAR(4) DEFAULT NULL,
    status_setelah_lulus ENUM('BEKERJA', 'KULIAH', 'WIRAUSAHA', 'BELUM_BEKERJA') DEFAULT 'BELUM_BEKERJA',
    nama_pt VARCHAR(255) DEFAULT NULL,
    jurusan_kuliah VARCHAR(255) DEFAULT NULL,
    nama_perusahaan VARCHAR(255) DEFAULT NULL,
    posisi VARCHAR(255) DEFAULT NULL,
    gaji_range VARCHAR(100) DEFAULT NULL,
    kesesuaian_jurusan ENUM('SESUAI', 'TIDAK_SESUAI', 'CUKUP_SESUAI') DEFAULT NULL,
    saran TEXT DEFAULT NULL,
    created_at DATETIME DEFAULT NULL,
    updated_at DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table: migrations (CI4 Migration Tracking)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS migrations (
    id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    version VARCHAR(255) NOT NULL,
    class VARCHAR(255) NOT NULL,
    group_name VARCHAR(255) NOT NULL,
    namespace VARCHAR(255) NOT NULL,
    time INT(11) NOT NULL,
    batch INT(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- SEED DATA
-- ============================================================

-- Users (password: admin123 / kepsek123)
INSERT INTO users (username, password, nama_lengkap, role, created_at) VALUES
('admin', 'admin123', 'Administrator', 'admin', NOW()),
('kepsek', 'kepsek123', 'Drs. H. Asep Kahlan Husen, M.MPd.', 'kepsek', NOW());

-- Siswa
INSERT INTO siswa (nisn, nama_siswa, tempat_lahir, tanggal_lahir, jenis_kelamin, nama_orang_tua, kelas, jurusan, tahun_lulus, status_kelulusan) VALUES
('0062789012', 'Ahmad Fauzi', 'Subang', '2005-01-15', 'L', 'Dadan Gunawan', 'XII MIPA 1', 'MIPA', '2024', 'LULUS'),
('0062789013', 'Siti Nurhaliza', 'Subang', '2005-03-20', 'P', 'Asep Saepuloh', 'XII MIPA 2', 'MIPA', '2024', 'LULUS'),
('0062789014', 'Rudi Hermawan', 'Bandung', '2005-07-10', 'L', 'Herman', 'XII IPS 1', 'IPS', '2024', 'LULUS'),
('0062789015', 'Dewi Sartika', 'Subang', '2005-11-25', 'P', 'Usep', 'XII IPS 2', 'IPS', '2024', 'TIDAK LULUS'),
('0062789016', 'Bambang Suprayogi', 'Jakarta', '2004-05-30', 'L', 'Suprayogi', 'XII MIPA 1', 'MIPA', '2023', 'LULUS'),
('0062789017', 'Fitri Handayani', 'Subang', '2004-09-12', 'P', 'Handoyo', 'XII IPS 1', 'IPS', '2023', 'LULUS'),
('0062789018', 'Gilang Permana', 'Subang', '2006-02-14', 'L', 'Permana', 'XII MIPA 2', 'MIPA', '2025', 'LULUS'),
('0062789019', 'Annisa Rahma', 'Subang', '2006-06-18', 'P', 'Rahmat', 'XII IPS 2', 'IPS', '2025', 'LULUS'),
('0062789020', 'Hendra Kusuma', 'Cirebon', '2005-04-22', 'L', 'Kusuma', 'XII MIPA 1', 'MIPA', '2024', 'LULUS'),
('0062789021', 'Indah Permatasari', 'Subang', '2006-08-05', 'P', 'Permata', 'XII MIPA 2', 'MIPA', '2025', 'LULUS');

-- Alumni
INSERT INTO alumni (nisn, nama_alumni, jenis_kelamin, tahun_lulus, no_hp, email, alamat, status_aktivitas, nama_instansi, jurusan_kuliah, posisi_kerja, tahun_masuk) VALUES
('0062789012', 'Ahmad Fauzi', 'L', '2024', '081234567890', 'ahmad.fauzi@gmail.com', 'Subang', 'KULIAH', 'Universitas Padjadjaran', 'Teknik Informatika', NULL, '2024'),
('0062789013', 'Siti Nurhaliza', 'P', '2024', '081234567891', 'siti.nurhaliza@gmail.com', 'Subang', 'KULIAH', 'Universitas Indonesia', 'Kedokteran', NULL, '2024'),
('0062789014', 'Rudi Hermawan', 'L', '2024', '081234567892', 'rudi.hermawan@gmail.com', 'Bandung', 'BEKERJA', 'PT Pertamina', NULL, 'Staff IT', '2024'),
('0062789016', 'Bambang Suprayogi', 'L', '2023', '081234567893', 'bambang@gmail.com', 'Jakarta', 'BEKERJA', 'PT Gojek Indonesia', NULL, 'Software Engineer', '2023'),
('0062789017', 'Fitri Handayani', 'P', '2023', '081234567894', 'fitri@gmail.com', 'Subang', 'WIRAUSAHA', 'Catering Fitri', NULL, NULL, '2023'),
('0062789018', 'Gilang Permana', 'L', '2025', '081234567895', 'gilang@gmail.com', 'Subang', 'KULIAH', 'ITB', 'Sistem Informasi', NULL, '2025'),
('0062789019', 'Annisa Rahma', 'P', '2025', '081234567896', 'annisa@gmail.com', 'Subang', 'BELUM', NULL, NULL, NULL, NULL),
('0062789020', 'Hendra Kusuma', 'L', '2024', '081234567897', 'hendra@gmail.com', 'Cirebon', 'BEKERJA', 'PT Telkom Indonesia', NULL, 'Network Engineer', '2024');

-- Tracer Study
INSERT INTO tracer_study (nisn, nama, tahun_lulus, status_setelah_lulus, nama_pt, jurusan_kuliah, nama_perusahaan, posisi, gaji_range, kesesuaian_jurusan) VALUES
('0062789012', 'Ahmad Fauzi', '2024', 'KULIAH', 'Universitas Padjadjaran', 'Teknik Informatika', NULL, NULL, NULL, NULL),
('0062789013', 'Siti Nurhaliza', '2024', 'KULIAH', 'Universitas Indonesia', 'Kedokteran', NULL, NULL, NULL, NULL),
('0062789014', 'Rudi Hermawan', '2024', 'BEKERJA', NULL, NULL, 'PT Pertamina', 'Staff IT', '5-10 Juta', 'SESUAI'),
('0062789018', 'Gilang Permana', '2025', 'KULIAH', 'ITB', 'Sistem Informasi', NULL, NULL, NULL, NULL);
