<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\AlumniModel;
use App\Models\TracerStudyModel;
use App\Models\PengaturanKelulusanModel;
class Kepalasekolah extends BaseController
{
    public function index()
    {
        return redirect()->to('/kepsek/dashboard');
    }

    public function dashboard()
    {
        $siswaModel = new SiswaModel();
        $alumniModel = new AlumniModel();
        $tracerModel = new TracerStudyModel();

        $data = [
            'total_siswa' => $siswaModel->countAllResults(),
            'total_lulus' => $siswaModel->where('status_kelulusan', 'LULUS')->countAllResults(),
            'total_alumni' => $alumniModel->countAllResults(),
            'total_tracer' => $tracerModel->countAllResults(),
            'statistik_kelulusan' => $siswaModel->getStatistikKelulusan(),
            'statistik_alumni' => $alumniModel->getStatistikAktivitas(),
            'alumni_terbaru' => $alumniModel->getAlumniTerbaru(5),
        ];

        return view('kepsek/dashboard', $data);
    }

    public function siswa()
    {
        $model = new SiswaModel();
        $data['siswa'] = $model->orderBy('tahun_lulus', 'DESC')->orderBy('nama_siswa', 'ASC')->findAll();
        return view('kepsek/siswa', $data);
    }

    public function alumni()
    {
        $model = new AlumniModel();
        $data['alumni'] = $model->orderBy('tahun_lulus', 'DESC')->orderBy('nama_alumni', 'ASC')->findAll();
        $data['statistik'] = $model->getStatistikAktivitas();
        return view('kepsek/alumni', $data);
    }

    public function tracer()
    {
        $model = new TracerStudyModel();
        $data['tracer'] = $model->orderBy('created_at', 'DESC')->findAll();
        $data['statistik'] = $model->getStatistikStatus();
        return view('kepsek/tracer', $data);
    }

    public function laporan()
    {
        $siswaModel = new SiswaModel();
        $alumniModel = new AlumniModel();
        $tracerModel = new TracerStudyModel();

        $data = [
            'statistik_kelulusan' => $siswaModel->getStatistikKelulusan(),
            'statistik_alumni' => $alumniModel->getStatistikAktivitas(),
            'statistik_tracer' => $tracerModel->getStatistikStatus(),
            'total_siswa' => $siswaModel->countAllResults(),
            'total_alumni' => $alumniModel->countAllResults(),
            'total_tracer' => $tracerModel->countAllResults(),
        ];

        return view('kepsek/laporan', $data);
    }
    // ============================================================
    // PENGATURAN KELULUSAN (COUNTDOWN)
    // ============================================================
    public function pengaturanKelulusan()
    {
        $model = new PengaturanKelulusanModel();
        $data['pengaturan'] = $model->getAktif();
        $data['semua_pengaturan'] = $model->orderBy('id', 'DESC')->findAll();
        return view('kepsek/pengaturan_kelulusan', $data);
    }

    public function simpanPengaturan()
    {
        $model = new PengaturanKelulusanModel();

        // Nonaktifkan semua pengaturan sebelumnya
        $model->nonaktifkanSemua();

        $model->save([
            'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
            'tanggal_pengumuman' => $this->request->getPost('tanggal_pengumuman'),
            'jam_pengumuman' => $this->request->getPost('jam_pengumuman'),
            'pesan_sebelum' => $this->request->getPost('pesan_sebelum'),
            'pesan_sesudah' => $this->request->getPost('pesan_sesudah'),
            'is_aktif' => 1,
        ]);

        session()->setFlashdata('success', 'Pengaturan kelulusan berhasil disimpan.');
        return redirect()->to('/kepsek/pengaturan-kelulusan');
    }

    public function hapusPengaturan($id)
    {
        $model = new PengaturanKelulusanModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Riwayat pengaturan berhasil dihapus.');
        return redirect()->to('/kepsek/pengaturan-kelulusan');
    }

    // ============================================================
    // KETERSERAPAN LULUSAN
    // ============================================================
    public function keterserapan()
    {
        $alumniModel = new AlumniModel();
        $db = \Config\Database::connect();

        // Statistik per tahun lulus
        $query = $db->query("
            SELECT 
                tahun_lulus,
                COUNT(*) as total,
                SUM(CASE WHEN status_aktivitas = 'BEKERJA' THEN 1 ELSE 0 END) as bekerja,
                SUM(CASE WHEN status_aktivitas = 'KULIAH' THEN 1 ELSE 0 END) as kuliah,
                SUM(CASE WHEN status_aktivitas = 'WIRAUSAHA' THEN 1 ELSE 0 END) as wirausaha,
                SUM(CASE WHEN status_aktivitas = 'BELUM' THEN 1 ELSE 0 END) as belum,
                SUM(CASE WHEN status_aktivitas = 'MENIKAH' THEN 1 ELSE 0 END) as menikah
            FROM alumni
            GROUP BY tahun_lulus
            ORDER BY tahun_lulus DESC
        ");
        $data['statistik_per_tahun'] = $query->getResultArray();

        // Total keseluruhan
        $queryTotal = $db->query("
            SELECT 
                COUNT(*) as total,
                SUM(CASE WHEN status_aktivitas = 'BEKERJA' THEN 1 ELSE 0 END) as bekerja,
                SUM(CASE WHEN status_aktivitas = 'KULIAH' THEN 1 ELSE 0 END) as kuliah,
                SUM(CASE WHEN status_aktivitas = 'WIRAUSAHA' THEN 1 ELSE 0 END) as wirausaha,
                SUM(CASE WHEN status_aktivitas = 'BELUM' THEN 1 ELSE 0 END) as belum,
                SUM(CASE WHEN status_aktivitas = 'MENIKAH' THEN 1 ELSE 0 END) as menikah
            FROM alumni
        ");
        $data['total_keterserapan'] = $queryTotal->getRowArray();

        // Detail alumni per tahun (jika ada filter)
        $tahun = $this->request->getGet('tahun');
        if ($tahun) {
            $data['detail_alumni'] = $alumniModel->where('tahun_lulus', $tahun)->orderBy('nama_alumni', 'ASC')->findAll();
        }
        $data['tahun_filter'] = $tahun;

        // Daftar tahun
        $data['daftar_tahun'] = $alumniModel->select('tahun_lulus')->distinct()->orderBy('tahun_lulus', 'DESC')->findAll();

        return view('kepsek/keterserapan', $data);
    }
}
