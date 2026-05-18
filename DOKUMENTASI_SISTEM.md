# DOKUMENTASI SISTEM
## SISTEM INFORMASI KELULUSAN & TRACKING ALUMNI
### SMA PGRI 1 SUBANG

---

## 1. PENDAHULUAN

### 1.1 Deskripsi Sistem

Sistem Informasi Kelulusan & Tracking Alumni adalah aplikasi berbasis web yang dibangun untuk membantu SMA PGRI 1 Subang dalam mengelola data kelulusan siswa dan melakukan pelacakan (tracking) terhadap perkembangan alumni setelah lulus. Sistem ini memungkinkan siswa/alumni untuk mengecek status kelulusan melalui NISN, melacak data alumni, dan mengisi tracer study. Sementara itu, administrator dan kepala sekolah dapat mengelola seluruh data melalui dashboard khusus.

### 1.2 Tujuan

1. Memudahkan siswa dalam mengecek hasil kelulusan secara online
2. Melacak perkembangan alumni setelah lulus dari SMA PGRI 1 Subang
3. Mendokumentasikan data tracer study alumni
4. Menyediakan laporan statistik kelulusan dan aktivitas alumni
5. Menghasilkan surat keterangan lulus (SKL) dalam format cetak

### 1.3 Pengguna Sistem

| Role | Deskripsi |
|------|-----------|
| **Publik (Siswa/Alumni)** | Mengecek kelulusan, tracking alumni, mengisi tracer study |
| **Admin** | CRUD data siswa, alumni, tracer study; melihat laporan |
| **Kepala Sekolah** | Melihat data siswa, alumni, tracer study, dan laporan |

---

## 2. TEKNOLOGI YANG DIGUNAKAN

### 2.1 Tech Stack

| Teknologi | Versi | Kegunaan |
|-----------|-------|----------|
| **PHP** | ^8.2 | Bahasa pemrograman backend |
| **CodeIgniter 4** | ^4.7 | Framework MVC PHP |
| **MySQL** | 8.x | Database management system |
| **Bootstrap** | 5.3 | CSS framework untuk UI |
| **Font Awesome** | 6.5 | Icon set |
| **Google Fonts** | - | Font Plus Jakarta Sans |
| **Apache** | - | Web server (Laragon) |
| **Web Audio API** | - | Sound effects countdown |

### 2.2 Arsitektur MVC

Sistem menggunakan arsitektur MVC (Model-View-Controller) dari CodeIgniter 4:

```
Request → Routes → Controller → Model → Database
                        ↓
                    View (HTML + CSS + JS)
```

- **Model**: Berinteraksi dengan database (CRUD)
- **View**: Template tampilan menggunakan PHP native + Bootstrap
- **Controller**: Logika bisnis dan routing

### 2.3 Pola Desain

- **Singleton**: Database connection via `\Config\Database::connect()`
- **Active Record**: CI4 Model untuk operasi database
- **Front Controller**: Semua request melalui `index.php`

---

## 3. STRUKTUR DATABASE

### 3.1 Entity Relationship Diagram (ERD)

```
┌─────────────────────────────────────────────────────────────────────┐
│                         db_kelulusan                                │
├─────────────────────────────────────────────────────────────────────┤
│                                                                     │
│  ┌──────────────┐       ┌──────────────────┐                       │
│  │    users      │       │     siswa        │                       │
│  ├──────────────┤       ├──────────────────┤                       │
│  │ id (PK)      │       │ id (PK)          │                       │
│  │ username     │       │ nisn (UNIQUE)    │──┐                    │
│  │ password     │       │ nama_siswa       │  │                    │
│  │ nama_lengkap │       │ tempat_lahir     │  │                    │
│  │ role         │       │ tanggal_lahir    │  │                    │
│  │ created_at   │       │ jenis_kelamin    │  │                    │
│  │ updated_at   │       │ nama_orang_tua   │  │                    │
│  └──────────────┘       │ kelas            │  │                    │
│                         │ jurusan          │  │                    │
│                         │ tahun_lulus      │  │                    │
│                         │ status_kelulusan │  │                    │
│  ┌──────────────────┐   │ foto             │  │                    │
│  │  tracer_study    │   │ created_at       │  │                    │
│  ├──────────────────┤   │ updated_at       │  │                    │
│  │ id (PK)          │   └──────────────────┘  │                    │
│  │ nisn             │──┘                      │                    │
│  │ nama             │                         │                    │
│  │ tahun_lulus      │         ┌────────────────┴───┐               │
│  │ status_setelah   │         │     alumni          │               │
│  │   _lulus         │         ├────────────────────┤               │
│  │ nama_pt          │         │ id (PK)            │               │
│  │ jurusan_kuliah   │         │ nisn (UNIQUE)      │───────────────┘
│  │ nama_perusahaan  │         │ nama_alumni        │               │
│  │ posisi           │         │ jenis_kelamin      │               │
│  │ gaji_range       │         │ tahun_lulus        │               │
│  │ kesesuaian_jurusan│        │ no_hp              │               │
│  │ saran            │         │ email              │               │
│  │ created_at       │         │ alamat             │               │
│  │ updated_at       │         │ status_aktivitas   │               │
│  └──────────────────┘         │ nama_instansi      │               │
│                               │ jurusan_kuliah     │               │
│                               │ posisi_kerja       │               │
│                               │ tahun_masuk        │               │
│                               │ tahun_lulus_kuliah │               │
│                               │ foto               │               │
│                               │ created_at         │               │
│                               │ updated_at         │               │
│                               └────────────────────┘               │
└─────────────────────────────────────────────────────────────────────┘
```

### 3.2 Struktur Tabel

#### 3.2.1 Tabel `users`

Menyimpan data pengguna sistem (admin dan kepala sekolah).

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT(11) UNSIGNED AUTO_INCREMENT | Primary Key |
| username | VARCHAR(100) NOT NULL UNIQUE | Username login |
| password | VARCHAR(255) NOT NULL | Password (plain text untuk kepraktisan) |
| nama_lengkap | VARCHAR(255) NOT NULL | Nama lengkap pengguna |
| role | ENUM('admin','kepsek') | Hak akses |
| created_at | DATETIME | Timestamp dibuat |
| updated_at | DATETIME | Timestamp diupdate |

#### 3.2.2 Tabel `siswa`

Menyimpan data siswa dan status kelulusan.

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT(11) UNSIGNED AUTO_INCREMENT | Primary Key |
| nisn | VARCHAR(20) NOT NULL UNIQUE | Nomor Induk Siswa Nasional |
| nama_siswa | VARCHAR(255) NOT NULL | Nama lengkap siswa |
| tempat_lahir | VARCHAR(100) | Tempat lahir |
| tanggal_lahir | DATE | Tanggal lahir |
| jenis_kelamin | ENUM('L','P') | Jenis kelamin |
| nama_orang_tua | VARCHAR(255) | Nama orang tua/wali |
| kelas | VARCHAR(50) | Kelas saat lulus (XII MIPA 1, dll) |
| jurusan | VARCHAR(100) | Jurusan (MIPA/IPS) |
| tahun_lulus | YEAR(4) | Tahun kelulusan |
| status_kelulusan | ENUM('LULUS','TIDAK LULUS') | Status kelulusan |
| foto | VARCHAR(255) | Path foto siswa |
| created_at / updated_at | DATETIME | Timestamp |

#### 3.2.3 Tabel `alumni`

Menyimpan data tracking alumni.

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT(11) UNSIGNED AUTO_INCREMENT | Primary Key |
| nisn | VARCHAR(20) NOT NULL UNIQUE | NISN (referensi ke siswa) |
| nama_alumni | VARCHAR(255) NOT NULL | Nama alumni |
| jenis_kelamin | ENUM('L','P') | Jenis kelamin |
| tahun_lulus | YEAR(4) | Tahun lulus |
| no_hp | VARCHAR(20) | Nomor HP |
| email | VARCHAR(255) | Alamat email |
| alamat | TEXT | Alamat tinggal |
| status_aktivitas | ENUM('BEKERJA','KULIAH','WIRAUSAHA','BELUM') | Status setelah lulus |
| nama_instansi | VARCHAR(255) | Nama PT/Perusahaan/Usaha |
| jurusan_kuliah | VARCHAR(255) | Jurusan kuliah |
| posisi_kerja | VARCHAR(255) | Posisi pekerjaan |
| tahun_masuk | YEAR(4) | Tahun masuk kuliah/kerja |
| tahun_lulus_kuliah | YEAR(4) | Tahun lulus kuliah |
| foto | VARCHAR(255) | Path foto alumni |
| created_at / updated_at | DATETIME | Timestamp |

#### 3.2.4 Tabel `tracer_study`

Menyimpan data tracer study yang diisi alumni.

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT(11) UNSIGNED AUTO_INCREMENT | Primary Key |
| nisn | VARCHAR(20) NOT NULL | NISN pengisi |
| nama | VARCHAR(255) NOT NULL | Nama pengisi |
| tahun_lulus | YEAR(4) | Tahun lulus |
| status_setelah_lulus | ENUM('BEKERJA','KULIAH','WIRAUSAHA','BELUM_BEKERJA') | Status saat ini |
| nama_pt | VARCHAR(255) | Nama perguruan tinggi |
| jurusan_kuliah | VARCHAR(255) | Jurusan kuliah |
| nama_perusahaan | VARCHAR(255) | Nama perusahaan |
| posisi | VARCHAR(255) | Posisi/jabatan |
| gaji_range | VARCHAR(100) | Range gaji |
| kesesuaian_jurusan | ENUM('SESUAI','TIDAK_SESUAI','CUKUP_SESUAI') | Kesesuaian jurusan |
| saran | TEXT | Saran untuk almamater |
| created_at / updated_at | DATETIME | Timestamp |

### 3.3 Relasi Antar Tabel

```
users    → tidak berelasi langsung (otentikasi)
siswa    → nisn → alumni (one-to-one via nisn)
siswa    → nisn → tracer_study (one-to-many via nisn)
alumni   → nisn → tracer_study (one-to-many via nisn)
```

---

## 4. USE CASE DIAGRAM

```
┌─────────────────────────────────────────────────────────────────────┐
│                      SISTEM INFORMASI KELULUSAN                    │
│                      & TRACKING ALUMNI                             │
├─────────────────────────────────────────────────────────────────────┤
│                                                                     │
│  ┌───────────────────┐                                             │
│  │                   │                                             │
│  │   Siswa/Alumni    │─────── Cek Kelulusan ────────────────────   │
│  │   (Publik)        │─────── Tracking Alumni ─────────────────    │
│  │                   │─────── Isi Tracer Study ────────────────    │
│  └───────────────────┘                                             │
│         extends                                                    │
│  ┌───────────────────┐         ┌──────────────────┐               │
│  │                   │         │                  │               │
│  │     Admin         │─────────│  Login Sistem    │               │
│  │                   │         │                  │               │
│  │  - CRUD Siswa     │         └──────────────────┘               │
│  │  - CRUD Alumni    │                                             │
│  │  - CRUD Tracer    │                                             │
│  │  - Lihat Laporan  │                                             │
│  │  - Cetak SKL      │                                             │
│  └───────────────────┘                                             │
│                                                                     │
│  ┌───────────────────┐                                             │
│  │                   │                                             │
│  │ Kepala Sekolah    │─────── Lihat Data Siswa ────────────────    │
│  │                   │─────── Lihat Data Alumni ──────────────     │
│  │                   │─────── Lihat Tracer Study ──────────────    │
│  │                   │─────── Lihat Laporan ───────────────────    │
│  └───────────────────┘                                             │
│                                                                     │
└─────────────────────────────────────────────────────────────────────┘
```

---

## 5. ACTIVITY DIAGRAM

### 5.1 Activity Diagram - Cek Kelulusan

```
┌──────┐      ┌──────────────────┐      ┌───────────┐      ┌─────────────┐
│User  │      │  Sistem          │      │Database   │      │  View       │
├──────┤      ├──────────────────┤      ├───────────┤      ├─────────────┤
│      │      │                  │      │           │      │             │
│Buka  │─────>│Tampilkan halaman│      │           │      │             │
│halaman│     │cek kelulusan    │      │           │      │             │
│      │      │                  │      │           │      │             │
│      │      │  ┌─────────┐    │      │           │      │             │
│Input │─────>│  │Countdown│    │      │           │      │             │
│NISN  │      │  │10 detik │    │      │           │      │             │
│      │      │  └─────────┘    │      │           │      │             │
│      │      │Query NISN──────>│──────>SELECT *   │      │             │
│      │      │                │<──────FROM siswa  │      │             │
│      │      │<───────────────│      │WHERE nisn  │      │             │
│      │      │                │      │           │      │             │
│      │      │Tampilkan hasil│      │           │──────>│LULUS/       │
│      │<─────│atau "tidak    │      │           │      │TIDAK LULUS  │
│      │      │ditemukan"     │      │           │      │             │
└──────┘      └──────────────────┘      └───────────┘      └─────────────┘
```

### 5.2 Activity Diagram - Kelola Data Siswa (Admin)

```
┌───────────────────────────┐
│       Admin Login         │
└───────────┬───────────────┘
            ▼
┌───────────────────────────┐
│   Dashboard Admin         │
└───────────┬───────────────┘
            ▼
┌───────────────────────────┐
│   Pilih Menu "Data Siswa" │
└───────────┬───────────────┘
            ▼
     ┌──────┴──────┐
     ▼             ▼
┌──────────┐ ┌──────────┐
│Tambah    │ │Lihat/Edit│
│Siswa     │ │/Hapus    │
└────┬─────┘ └────┬─────┘
     ▼            ▼
┌──────────┐ ┌──────────┐
│Form Input│ │Filter by │
│Data Siswa│ │Tahun     │
└────┬─────┘ └────┬─────┘
     ▼            ▼
┌──────────┐ ┌──────────┐
│Simpan ke │ │Update/   │
│Database  │ │Delete    │
└──────────┘ └──────────┘
```

### 5.3 Activity Diagram - Isi Tracer Study (Publik)

```
┌──────┐      ┌──────────────────┐      ┌───────────────┐
│User  │      │  Sistem          │      │   Database    │
├──────┤      ├──────────────────┤      ├───────────────┤
│      │      │                  │      │               │
│Buka  │─────>│Tampilkan form    │      │               │
│halaman│     │tracer study      │      │               │
│      │      │                  │      │               │
│Isi form─────>│Validasi input   │      │               │
│      │      │(required dll)    │      │               │
│      │      │  ┌──────┐        │      │               │
│      │      │  │Valid?│────────│──→   │               │
│      │      │  └──┬───┘        │      │               │
│      │      │     ▼ Invalid    │      │               │
│      │<────│Kembali + error    │      │               │
│      │      │     ▼ Valid      │      │               │
│      │      │Simpan data──────>│──────>INSERT INTO    │
│      │      │                  │      │tracer_study   │
│      │      │                  │<─────┤               │
│      │<─────│Sukses + notif    │      │               │
└──────┘      └──────────────────┘      └───────────────┘
```

---

## 6. SEQUENCE DIAGRAM

### 6.1 Login Sequence

```
┌─────┐          ┌──────────┐          ┌──────────┐          ┌─────────┐
│User │          │Auth      │          │UserModel │          │Database │
│     │          │Controller│          │          │          │         │
├─────┤          ├──────────┤          ├──────────┤          ├─────────┤
│     │POST login│          │          │          │          │         │
│     │─────────>│          │          │          │          │         │
│     │          │getUser() │          │          │          │         │
│     │          │─────────>│          │          │          │         │
│     │          │          │find()    │          │          │         │
│     │          │          │──────────>──────────>SELECT *  │         │
│     │          │          │          │<─────────│FROM users│         │
│     │          │<─────────│          │          │          │         │
│     │          │          │          │          │          │         │
│     │          │Cek role  │          │          │          │         │
│     │          │& password│          │          │          │         │
│     │          │          │          │          │          │         │
│     │          │  ┌───┐   │          │          │          │         │
│     │          │  │OK?│───│──────────│──────────│          │         │
│     │          │  └─┬─┘   │          │          │          │         │
│     │          │    │     │          │          │          │         │
│     │  Redirect│◄───┘     │          │          │          │         │
│     │<─────────│to /admin │          │          │          │         │
│     │          │/kepsek   │          │          │          │         │
└─────┘          └──────────┘          └──────────┘          └─────────┘
```

---

## 7. CLASS DIAGRAM

```
┌────────────────────────────────────────────────────────────────────┐
│                    CONTROLLERS                                     │
├────────────────────────────────────────────────────────────────────┤
│                                                                    │
│  ┌─────────────────────────────────────────────────────────┐       │
│  │                BaseController                           │       │
│  └──────────────────────┬──────────────────────────────────┘       │
│          ┌──────────────┼──────────────┬──────────────┐            │
│          ▼              ▼              ▼              ▼            │
│  ┌──────────┐  ┌──────────┐  ┌──────────┐  ┌──────────────┐      │
│  │  Admin   │  │Kepalasek-│  │  Auth    │  │  Kelulusan   │      │
│  │Controller│  │olah      │  │Controller│  │  Controller  │      │
│  ├──────────┤  │Controller│  ├──────────┤  ├──────────────┤      │
│  │+index()  │  ├──────────┤  │+index()  │  │+index()      │      │
│  │+dashboard│  │+dashboard│  │+loginProc│  │+prosesCek()  │      │
│  │+siswa()  │  │+siswa()  │  │+logout() │  │+cetak($nisn) │      │
│  │+siswaTmbh│  │+alumni() │  └──────────┘  └──────────────┘      │
│  │+siswaSimp│  │+tracer() │                                       │
│  │+siswaEdit│  │+laporan()│        ┌──────────────────┐           │
│  │+siswaUpdt│  └──────────┘        │  TracerStudy     │           │
│  │+siswaHps │                      │  Controller      │           │
│  │+alumni() │                      ├──────────────────┤           │
│  │+alumniDet│                      │+index()          │           │
│  │+alumniTmb│                      │+simpan()         │           │
│  │+alumniSim│        ┌──────────┐  └──────────────────┘           │
│  │+alumniEdt│        │  Alumni  │                                  │
│  │+alumniUpd│        │Controller│                                  │
│  │+alumniHps│        ├──────────┤                                  │
│  │+tracer() │        │+index()  │                                  │
│  │+tracerHps│        │+tracking │                                  │
│  │+laporan()│        │+updateSt │                                  │
│  │+profil() │        └──────────┘                                  │
│  └──────────┘                                                      │
│                                                                    │
├────────────────────────────────────────────────────────────────────┤
│                    MODELS                                          │
├────────────────────────────────────────────────────────────────────┤
│                                                                    │
│  ┌─────────────┐  ┌──────────────┐  ┌──────────────────┐          │
│  │  SiswaModel │  │  AlumniModel  │  │ TracerStudyModel │          │
│  ├─────────────┤  ├──────────────┤  ├──────────────────┤          │
│  │#table=siswa │  │#table=alumni │  │#table=tracer_stdy│          │
│  │+getSiswaByNs│  │+getAlumniByNs│  │+getStatistikStts│          │
│  │+searchSiswa │  │+searchAlumni │  │+getRataResponden│          │
│  │+getByTahun  │  │+getStatistik │  │+getByTahun()    │          │
│  │+getStatistik│  │+getByTahun   │  └──────────────────┘          │
│  └─────────────┘  │+getAlumniTerb│                                 │
│                   └──────────────┘                                 │
│                                                                    │
├────────────────────────────────────────────────────────────────────┤
│                    VIEWS                                           │
├────────────────────────────────────────────────────────────────────┤
│                                                                    │
│  ┌─────────────────────────────────────────────────────────┐       │
│  │  Public: kelulusan.php, alumni/index.php,               │       │
│  │          tracer_study/form.php, hasil_kelulusan.php     │       │
│  │  Auth: login.php                                        │       │
│  │  Admin: dashboard, siswa, siswa_tambah, siswa_edit,     │       │
│  │         alumni, alumni_detail, alumni_tambah,           │       │
│  │         alumni_edit, tracer, laporan, profil            │       │
│  │  Kepsek: dashboard, siswa, alumni, tracer, laporan      │       │
│  └─────────────────────────────────────────────────────────┘       │
│                                                                    │
└────────────────────────────────────────────────────────────────────┘
```

---

## 8. FLOWCHART SISTEM

### 8.1 Alur Cek Kelulusan

```
                    START
                      │
                      ▼
            ┌──────────────────┐
            │  Halaman Utama   │
            └──────────────────┘
                      │
                      ▼
            ┌──────────────────┐
            │  Input NISN      │
            └──────────────────┘
                      │
                      ▼
            ┌──────────────────┐
            │  Countdown 10s   │
            │  + Backsound     │
            └──────────────────┘
                      │
                      ▼
            ┌──────────────────┐
            │  Query ke DB     │
            │  siswa WHERE nisn│
            └──────────────────┘
                      │
            ┌─────────┴─────────┐
            │                   │
          Data?              Tidak?
            │                   │
            ▼                   ▼
    ┌────────────────┐  ┌────────────────┐
    │ Status LULUS/  │  │ "NISN Tidak   │
    │ TIDAK LULUS    │  │ Ditemukan"    │
    └────────────────┘  └────────────────┘
            │                   │
            └─────────┬─────────┘
                      │
                      ▼
            ┌──────────────────┐
            │  Jika LULUS →   │
            │  Cetak Surat    │
            └──────────────────┘
                      │
                      ▼
                     END
```

### 8.2 Alur Tracking Alumni

```
                    START
                      │
                      ▼
            ┌──────────────────┐
            │  Halaman Alumni  │
            └──────────────────┘
                      │
                      ▼
            ┌──────────────────┐
            │  Input NISN      │
            └──────────────────┘
                      │
                      ▼
            ┌──────────────────┐
            │  Query ke DB     │
            │  alumni WHERE    │
            │  nisn            │
            └──────────────────┘
                      │
            ┌─────────┴─────────┐
            │                   │
          Data?              Tidak?
            │                   │
            ▼                   ▼
    ┌────────────────┐  ┌────────────────┐
    │ Tampilkan info │  │ "Data Tidak   │
    │: nama, status, │  │ Ditemukan"    │
    │ instansi, dll  │  └────────────────┘
    └────────────────┘
            │
            ▼
    ┌────────────────────┐
    │ Update Data Alumni │
    │ (form optional)    │
    └────────────────────┘
                      │
                      ▼
                     END
```

### 8.3 Alur Login - Admin/Kepsek

```
                    START
                      │
                      ▼
            ┌──────────────────┐
            │  Halaman Login   │
            └──────────────────┘
                      │
                      ▼
            ┌──────────────────┐
            │  Input:          │
            │  - Username      │
            │  - Password      │
            │  - Role          │
            └──────────────────┘
                      │
                      ▼
            ┌──────────────────┐
            │  Cek ke database │
            │  users           │
            └──────────────────┘
                      │
            ┌─────────┴─────────┐
            │                   │
      Username valid?        Tidak
            │                   │
            ▼                   ▼
    ┌──────────────┐    ┌──────────────┐
    │ Password     │    │ "Username    │
    │ cocok?       │    │ tidak        │
    └──────┬───────┘    │ ditemukan"   │
       Ya  │            └──────────────┘
           ▼                   │
    ┌──────────────┐           │
    │ Role sesuai  │           │
    │ pilihan?     │───────────┘
    └──────┬───────┘  Tidak
       Ya  │
           ▼
    ┌──────────────────────────┐
    │ Set session: isLogin,   │
    │ username, role           │
    └──────────────────────────┘
                      │
                      ▼
            ┌──────────────────┐
            │ Redirect ke      │
            │ /admin/dashboard │
            │ atau             │
            │ /kepsek/dashboard│
            └──────────────────┘
                      │
                      ▼
                     END
```

---

## 9. ROUTES & ENDPOINT

### 9.1 Public Routes (Tanpa Login)

| Method | URL | Controller::Method | Deskripsi |
|--------|-----|-------------------|-----------|
| GET | `/` | `Kelulusan::index` | Halaman cek kelulusan |
| POST | `/proses-cek` | `Kelulusan::prosesCek` | Proses pengecekan NISN |
| GET | `/cetak-kelulusan/(:any)` | `Kelulusan::cetak` | Cetak surat kelulusan |
| GET | `/alumni` | `Alumni::index` | Halaman tracking alumni |
| POST | `/alumni/tracking` | `Alumni::tracking` | Cari data alumni |
| POST | `/alumni/update-status` | `Alumni::updateStatus` | Update data alumni |
| GET | `/tracer-study` | `TracerStudy::index` | Form tracer study |
| POST | `/tracer/simpan` | `TracerStudy::simpan` | Simpan tracer study |

### 9.2 Auth Routes

| Method | URL | Controller::Method | Deskripsi |
|--------|-----|-------------------|-----------|
| GET | `/login` | `Auth::index` | Halaman login |
| POST | `/auth/loginProcess` | `Auth::loginProcess` | Proses login |
| GET | `/logout` | `Auth::logout` | Logout |

### 9.3 Admin Routes (Filter: login:admin)

| Method | URL | Controller::Method | Deskripsi |
|--------|-----|-------------------|-----------|
| GET | `/admin/dashboard` | `Admin::dashboard` | Dashboard admin |
| GET | `/admin/siswa` | `Admin::siswa` | Data siswa (filter tahun) |
| GET | `/admin/siswa/tambah` | `Admin::siswaTambah` | Form tambah siswa |
| POST | `/admin/siswa/simpan` | `Admin::siswaSimpan` | Simpan siswa baru |
| GET | `/admin/siswa/edit/(:num)` | `Admin::siswaEdit` | Form edit siswa |
| POST | `/admin/siswa/update` | `Admin::siswaUpdate` | Update data siswa |
| GET | `/admin/siswa/hapus/(:num)` | `Admin::siswaHapus` | Hapus siswa |
| GET | `/admin/alumni` | `Admin::alumni` | Data alumni (filter tahun) |
| GET | `/admin/alumni/detail/(:num)` | `Admin::alumniDetail` | Detail alumni |
| GET | `/admin/alumni/tambah` | `Admin::alumniTambah` | Form tambah alumni |
| POST | `/admin/alumni/simpan` | `Admin::alumniSimpan` | Simpan alumni baru |
| GET | `/admin/alumni/edit/(:num)` | `Admin::alumniEdit` | Form edit alumni |
| POST | `/admin/alumni/update` | `Admin::alumniUpdate` | Update alumni |
| GET | `/admin/alumni/hapus/(:num)` | `Admin::alumniHapus` | Hapus alumni |
| GET | `/admin/tracer` | `Admin::tracer` | Data tracer study |
| GET | `/admin/tracer/hapus/(:num)` | `Admin::tracerHapus` | Hapus tracer |
| GET | `/admin/laporan` | `Admin::laporan` | Halaman laporan |
| GET | `/admin/profil` | `Admin::profil` | Profil admin |

### 9.4 Kepsek Routes (Filter: login:kepsek)

| Method | URL | Controller::Method | Deskripsi |
|--------|-----|-------------------|-----------|
| GET | `/kepsek/dashboard` | `Kepalasekolah::dashboard` | Dashboard kepsek |
| GET | `/kepsek/siswa` | `Kepalasekolah::siswa` | Lihat data siswa |
| GET | `/kepsek/alumni` | `Kepalasekolah::alumni` | Lihat data alumni |
| GET | `/kepsek/tracer` | `Kepalasekolah::tracer` | Lihat tracer study |
| GET | `/kepsek/laporan` | `Kepalasekolah::laporan` | Lihat laporan |

---

## 10. FITUR-FITUR SISTEM

### 10.1 Fitur Publik

| Fitur | Deskripsi |
|-------|-----------|
| **Cek Kelulusan** | Input NISN → countdown 10 detik dengan backsound → tampilkan status LULUS/TIDAK LULUS + detail siswa |
| **Cetak SKL** | Cetak surat keterangan lulus format A4 dengan kop sekolah, data dinamis dari database |
| **Tracking Alumni** | Input NISN → tampilkan data alumni (nama, tahun lulus, status aktivitas, instansi, dll) |
| **Update Data Alumni** | Alumni dapat memperbarui data (status, no HP, email, alamat, dll) tanpa login |
| **Tracer Study** | Form isian untuk mendata perkembangan alumni setelah lulus (kuliah/kerja/wirausaha) |

### 10.2 Fitur Admin

| Fitur | Deskripsi |
|-------|-----------|
| **Dashboard** | Ringkasan total siswa, alumni, tracer; statistik kelulusan per tahun; alumni terbaru |
| **CRUD Siswa** | Tambah, lihat, edit, hapus data siswa; filter berdasarkan tahun lulus |
| **CRUD Alumni** | Tambah, lihat, edit, hapus data alumni; filter berdasarkan tahun lulus |
| **Tracer Study** | Lihat data tracer study yang diisi alumni; hapus data |
| **Laporan** | Statistik kelulusan, aktivitas alumni, status tracer study |
| **Profil** | Informasi profil admin |

### 10.3 Fitur Kepala Sekolah

| Fitur | Deskripsi |
|-------|-----------|
| **Dashboard** | Ringkasan data dan statistik (read-only) |
| **Data Siswa** | Lihat seluruh data siswa |
| **Data Alumni** | Lihat seluruh data alumni |
| **Tracer Study** | Lihat data tracer study |
| **Laporan** | Lihat laporan statistik |

### 10.4 Fitur Keamanan

| Fitur | Deskripsi |
|-------|-----------|
| **Authentication** | Login dengan username + password + role selection |
| **Authorization** | Filter middleware per role (admin/kepsek) |
| **Session** | Session-based authentication dengan timeout |
| **CSRF Protection** | CSRF token pada form (tracer study) |

### 10.5 Fitur Tambahan

| Fitur | Deskripsi |
|-------|-----------|
| **Countdown Animasi** | 10 detik countdown dengan efek suara (Web Audio API) sebelum hasil kelulusan ditampilkan |
| **Loading Overlay** | Full-screen overlay dengan logo sekolah pada setiap form submit |
| **Favicon Sekolah** | Logo SMA sebagai icon tab browser |
| **Responsive Design** | Tampilan mobile-friendly dengan Bootstrap 5 |
| **Filter Tahun** | Filter data siswa/alumni berdasarkan tahun lulus di admin |

---

## 11. SKENARIO PENGUJIAN

### 11.1 Skenario Cek Kelulusan

| Skenario | Input | Ekspektasi |
|----------|-------|------------|
| NISN valid (LULUS) | `0062789012` | Menampilkan "LULUS" + data siswa + link cetak |
| NISN valid (TIDAK LULUS) | `0062789015` | Menampilkan "TIDAK LULUS" + data siswa |
| NISN tidak terdaftar | `1234567890` | Menampilkan "NISN Tidak Ditemukan" |
| NISN kosong | (kosong) | Redirect + flash error |
| Cetak SKL | `0062789012` | PDF/print-friendly certificate |

### 11.2 Skenario Tracking Alumni

| Skenario | Input | Ekspektasi |
|----------|-------|------------|
| NISN valid (KULIAH) | `0062789012` | Data alumni + info PT + jurusan |
| NISN valid (BEKERJA) | `0062789014` | Data alumni + info perusahaan + posisi |
| NISN valid (WIRAUSAHA) | `0062789017` | Data alumni + bidang usaha |
| NISN valid (BELUM) | `0062789019` | Data alumni + status BELUM |
| NISN tidak terdaftar | `0000000000` | "Data Tidak Ditemukan" |

### 11.3 Skenario Login

| Skenario | Input | Ekspektasi |
|----------|-------|------------|
| Login admin valid | admin / admin123 / role=admin | Masuk dashboard admin |
| Login kepsek valid | kepsek / kepsek123 / role=kepsek | Masuk dashboard kepsek |
| Role salah | admin / admin123 / role=kepsek | Error "Hak akses tidak sesuai" |
| Password salah | admin / wrongpass | Error "Password Salah" |
| Username tidak ada | nonexistent / x | Error "Username tidak ditemukan" |

### 11.4 Skenario Tracer Study

| Skenario | Input | Ekspektasi |
|----------|-------|------------|
| Isi lengkap (KULIAH) | NISN, nama, tahun, KULIAH, PT, jurusan | Sukses tersimpan |
| Isi lengkap (BEKERJA) | NISN, nama, tahun, BEKERJA, perusahaan, posisi, gaji | Sukses tersimpan |
| Field required kosong | NISN kosong | Validasi error, form tetap terisi |

---

## 12. KELEBIHAN SISTEM

1. **Sederhana & Cepat** — Cukup input NISN, hasil langsung tampil
2. **Dua Role** — Admin (full CRUD) dan Kepala Sekolah (read-only) sesuai kebutuhan
3. **Countdown Dramatis** — 10 detik backsound meningkatkan suspense saat cek kelulusan
4. **Cetak Langsung** — Surat keterangan lulus siap cetak dengan data otomatis dari database
5. **Tanpa Login Publik** — Cek kelulusan, tracking alumni, dan tracer study bisa diakses tanpa login
6. **Anti Error** — Validasi input, flash messages, CSRF protection
7. **Mobile Friendly** — Bootstrap 5 responsive
8. **Filter Tahun** — Admin bisa filter data siswa/alumni per tahun
9. **Seeder Tersedia** — Data sampel langsung siap pakai
10. **Backsound Suspense** — Menggunakan Web Audio API tanpa file eksternal

---

## 13. STRUKTUR DIREKTORI

```
si_skl-tracking/
├── app/
│   ├── Config/
│   │   ├── App.php          # baseURL, uriProtocol
│   │   ├── Database.php     # Koneksi database
│   │   ├── Filters.php      # Daftar filter (LoginFilter)
│   │   └── Routes.php       # Semua route
│   ├── Controllers/
│   │   ├── Admin.php        # CRUD admin
│   │   ├── Alumni.php       # Tracking alumni publik
│   │   ├── Auth.php         # Login/logout
│   │   ├── Kelulusan.php    # Cek kelulusan
│   │   ├── Kepalasekolah.php # Dashboard kepsek
│   │   └── TracerStudy.php  # Tracer study publik
│   ├── Database/
│   │   ├── Migrations/      # 4 file migrasi
│   │   └── Seeds/           # AppSeeder.php
│   ├── Filters/
│   │   └── LoginFilter.php  # Filter otentikasi
│   ├── Models/
│   │   ├── AlumniModel.php
│   │   ├── SiswaModel.php
│   │   ├── TracerStudyModel.php
│   │   └── UserModel.php
│   └── Views/
│       ├── admin/           # 11 file view admin
│       ├── alumni/          # index.php
│       ├── kepsek/          # 5 file view kepsek
│       ├── tracer_study/    # form.php
│       ├── hasil_kelulusan.php  # Cetak SKL
│       ├── kelulusan.php    # Halaman utama
│       └── login.php        # Login form
├── public/
│   ├── logo pgri.png        # Logo sekolah
│   ├── TTD PGRI.png         # Tanda tangan
│   └── CAP BASAH PGRI.png   # Cap/stempel
├── database.sql             # SQL dump manual
├── DOKUMENTASI_SISTEM.md    # File ini
└── composer.json            # PHP dependencies
```

---

## 14. LISENSI

Sistem ini dikembangkan untuk keperluan administrasi SMA PGRI 1 Subang.  
Dibangun menggunakan CodeIgniter 4 (framework open-source MIT license).

---

*Dokumentasi ini disusun sebagai referensi teknis pengembangan skripsi dan pengelolaan sistem.*
