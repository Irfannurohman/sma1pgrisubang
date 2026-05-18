<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AppSeeder extends Seeder
{
    public function run()
    {
        // Users
        $this->db->table('users')->truncate();
        $this->db->table('users')->insertBatch([
            ['username' => 'admin', 'password' => 'admin123', 'nama_lengkap' => 'Administrator', 'role' => 'admin', 'created_at' => date('Y-m-d H:i:s')],
            ['username' => 'kepsek', 'password' => 'kepsek123', 'nama_lengkap' => 'Drs. H. Asep Kahlan Husen, M.MPd.', 'role' => 'kepsek', 'created_at' => date('Y-m-d H:i:s')],
        ]);

        // Siswa
        $this->db->table('siswa')->truncate();
        $this->db->table('siswa')->insertBatch([
            ['nisn' => '0062789012', 'nama_siswa' => 'Ahmad Fauzi', 'tempat_lahir' => 'Subang', 'tanggal_lahir' => '2005-01-15', 'jenis_kelamin' => 'L', 'nama_orang_tua' => 'Dadan Gunawan', 'kelas' => 'XII MIPA 1', 'jurusan' => 'MIPA', 'tahun_lulus' => '2024', 'status_kelulusan' => 'LULUS'],
            ['nisn' => '0062789013', 'nama_siswa' => 'Siti Nurhaliza', 'tempat_lahir' => 'Subang', 'tanggal_lahir' => '2005-03-20', 'jenis_kelamin' => 'P', 'nama_orang_tua' => 'Asep Saepuloh', 'kelas' => 'XII MIPA 2', 'jurusan' => 'MIPA', 'tahun_lulus' => '2024', 'status_kelulusan' => 'LULUS'],
            ['nisn' => '0062789014', 'nama_siswa' => 'Rudi Hermawan', 'tempat_lahir' => 'Bandung', 'tanggal_lahir' => '2005-07-10', 'jenis_kelamin' => 'L', 'nama_orang_tua' => 'Herman', 'kelas' => 'XII IPS 1', 'jurusan' => 'IPS', 'tahun_lulus' => '2024', 'status_kelulusan' => 'LULUS'],
            ['nisn' => '0062789015', 'nama_siswa' => 'Dewi Sartika', 'tempat_lahir' => 'Subang', 'tanggal_lahir' => '2005-11-25', 'jenis_kelamin' => 'P', 'nama_orang_tua' => 'Usep', 'kelas' => 'XII IPS 2', 'jurusan' => 'IPS', 'tahun_lulus' => '2024', 'status_kelulusan' => 'TIDAK LULUS'],
            ['nisn' => '0062789016', 'nama_siswa' => 'Bambang Suprayogi', 'tempat_lahir' => 'Jakarta', 'tanggal_lahir' => '2004-05-30', 'jenis_kelamin' => 'L', 'nama_orang_tua' => 'Suprayogi', 'kelas' => 'XII MIPA 1', 'jurusan' => 'MIPA', 'tahun_lulus' => '2023', 'status_kelulusan' => 'LULUS'],
            ['nisn' => '0062789017', 'nama_siswa' => 'Fitri Handayani', 'tempat_lahir' => 'Subang', 'tanggal_lahir' => '2004-09-12', 'jenis_kelamin' => 'P', 'nama_orang_tua' => 'Handoyo', 'kelas' => 'XII IPS 1', 'jurusan' => 'IPS', 'tahun_lulus' => '2023', 'status_kelulusan' => 'LULUS'],
            ['nisn' => '0062789018', 'nama_siswa' => 'Gilang Permana', 'tempat_lahir' => 'Subang', 'tanggal_lahir' => '2006-02-14', 'jenis_kelamin' => 'L', 'nama_orang_tua' => 'Permana', 'kelas' => 'XII MIPA 2', 'jurusan' => 'MIPA', 'tahun_lulus' => '2025', 'status_kelulusan' => 'LULUS'],
            ['nisn' => '0062789019', 'nama_siswa' => 'Annisa Rahma', 'tempat_lahir' => 'Subang', 'tanggal_lahir' => '2006-06-18', 'jenis_kelamin' => 'P', 'nama_orang_tua' => 'Rahmat', 'kelas' => 'XII IPS 2', 'jurusan' => 'IPS', 'tahun_lulus' => '2025', 'status_kelulusan' => 'LULUS'],
            ['nisn' => '0062789020', 'nama_siswa' => 'Hendra Kusuma', 'tempat_lahir' => 'Cirebon', 'tanggal_lahir' => '2005-04-22', 'jenis_kelamin' => 'L', 'nama_orang_tua' => 'Kusuma', 'kelas' => 'XII MIPA 1', 'jurusan' => 'MIPA', 'tahun_lulus' => '2024', 'status_kelulusan' => 'LULUS'],
            ['nisn' => '0062789021', 'nama_siswa' => 'Indah Permatasari', 'tempat_lahir' => 'Subang', 'tanggal_lahir' => '2006-08-05', 'jenis_kelamin' => 'P', 'nama_orang_tua' => 'Permata', 'kelas' => 'XII MIPA 2', 'jurusan' => 'MIPA', 'tahun_lulus' => '2025', 'status_kelulusan' => 'LULUS'],
        ]);

        // Alumni
        $this->db->table('alumni')->truncate();
        $this->db->table('alumni')->insertBatch([
            ['nisn' => '0062789012', 'nama_alumni' => 'Ahmad Fauzi', 'jenis_kelamin' => 'L', 'tahun_lulus' => '2024', 'no_hp' => '081234567890', 'email' => 'ahmad.fauzi@gmail.com', 'alamat' => 'Subang', 'status_aktivitas' => 'KULIAH', 'nama_instansi' => 'Universitas Padjadjaran', 'jurusan_kuliah' => 'Teknik Informatika', 'tahun_masuk' => '2024'],
            ['nisn' => '0062789013', 'nama_alumni' => 'Siti Nurhaliza', 'jenis_kelamin' => 'P', 'tahun_lulus' => '2024', 'no_hp' => '081234567891', 'email' => 'siti.nurhaliza@gmail.com', 'alamat' => 'Subang', 'status_aktivitas' => 'KULIAH', 'nama_instansi' => 'Universitas Indonesia', 'jurusan_kuliah' => 'Kedokteran', 'tahun_masuk' => '2024'],
            ['nisn' => '0062789014', 'nama_alumni' => 'Rudi Hermawan', 'jenis_kelamin' => 'L', 'tahun_lulus' => '2024', 'no_hp' => '081234567892', 'email' => 'rudi.hermawan@gmail.com', 'alamat' => 'Bandung', 'status_aktivitas' => 'BEKERJA', 'nama_instansi' => 'PT Pertamina', 'posisi_kerja' => 'Staff IT', 'tahun_masuk' => '2024'],
            ['nisn' => '0062789016', 'nama_alumni' => 'Bambang Suprayogi', 'jenis_kelamin' => 'L', 'tahun_lulus' => '2023', 'no_hp' => '081234567893', 'email' => 'bambang@gmail.com', 'alamat' => 'Jakarta', 'status_aktivitas' => 'BEKERJA', 'nama_instansi' => 'PT Gojek Indonesia', 'posisi_kerja' => 'Software Engineer', 'tahun_masuk' => '2023'],
            ['nisn' => '0062789017', 'nama_alumni' => 'Fitri Handayani', 'jenis_kelamin' => 'P', 'tahun_lulus' => '2023', 'no_hp' => '081234567894', 'email' => 'fitri@gmail.com', 'alamat' => 'Subang', 'status_aktivitas' => 'WIRAUSAHA', 'nama_instansi' => 'Catering Fitri', 'tahun_masuk' => '2023'],
            ['nisn' => '0062789018', 'nama_alumni' => 'Gilang Permana', 'jenis_kelamin' => 'L', 'tahun_lulus' => '2025', 'no_hp' => '081234567895', 'email' => 'gilang@gmail.com', 'alamat' => 'Subang', 'status_aktivitas' => 'KULIAH', 'nama_instansi' => 'ITB', 'jurusan_kuliah' => 'Sistem Informasi', 'tahun_masuk' => '2025'],
            ['nisn' => '0062789019', 'nama_alumni' => 'Annisa Rahma', 'jenis_kelamin' => 'P', 'tahun_lulus' => '2025', 'no_hp' => '081234567896', 'email' => 'annisa@gmail.com', 'alamat' => 'Subang', 'status_aktivitas' => 'BELUM'],
            ['nisn' => '0062789020', 'nama_alumni' => 'Hendra Kusuma', 'jenis_kelamin' => 'L', 'tahun_lulus' => '2024', 'no_hp' => '081234567897', 'email' => 'hendra@gmail.com', 'alamat' => 'Cirebon', 'status_aktivitas' => 'BEKERJA', 'nama_instansi' => 'PT Telkom Indonesia', 'posisi_kerja' => 'Network Engineer', 'tahun_masuk' => '2024'],
        ]);

        // Tracer Study
        $this->db->table('tracer_study')->truncate();
        $this->db->table('tracer_study')->insertBatch([
            ['nisn' => '0062789012', 'nama' => 'Ahmad Fauzi', 'tahun_lulus' => '2024', 'status_setelah_lulus' => 'KULIAH', 'nama_pt' => 'Universitas Padjadjaran', 'jurusan_kuliah' => 'Teknik Informatika'],
            ['nisn' => '0062789013', 'nama' => 'Siti Nurhaliza', 'tahun_lulus' => '2024', 'status_setelah_lulus' => 'KULIAH', 'nama_pt' => 'Universitas Indonesia', 'jurusan_kuliah' => 'Kedokteran'],
            ['nisn' => '0062789014', 'nama' => 'Rudi Hermawan', 'tahun_lulus' => '2024', 'status_setelah_lulus' => 'BEKERJA', 'nama_perusahaan' => 'PT Pertamina', 'posisi' => 'Staff IT', 'gaji_range' => '5-10 Juta', 'kesesuaian_jurusan' => 'SESUAI'],
            ['nisn' => '0062789018', 'nama' => 'Gilang Permana', 'tahun_lulus' => '2025', 'status_setelah_lulus' => 'KULIAH', 'nama_pt' => 'ITB', 'jurusan_kuliah' => 'Sistem Informasi'],
        ]);
    }
}
