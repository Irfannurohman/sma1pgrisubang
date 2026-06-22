<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\AlumniModel;
use App\Models\TracerStudyModel;
use App\Models\UserModel;
use App\Models\PengaturanKelulusanModel;

class Admin extends BaseController
{
    public function index()
    {
        return redirect()->to('/admin/dashboard');
    }

    public function dashboard()
    {
        $siswaModel = new SiswaModel();
        $alumniModel = new AlumniModel();
        $tracerModel = new TracerStudyModel();

        $data = [
            'total_siswa' => $siswaModel->countAllResults(),
            'total_alumni' => $alumniModel->countAllResults(),
            'total_tracer' => $tracerModel->countAllResults(),
            'statistik_kelulusan' => $siswaModel->getStatistikKelulusan(),
            'alumni_terbaru' => $alumniModel->getAlumniTerbaru(5),
        ];

        return view('admin/dashboard', $data);
    }

    public function siswa()
    {
        $model = new SiswaModel();
        $tahun = $this->request->getGet('tahun');

        if ($tahun) {
            $data['siswa'] = $model->where('tahun_lulus', $tahun)->orderBy('nama_siswa', 'ASC')->findAll();
        } else {
            $data['siswa'] = $model->orderBy('tahun_lulus', 'DESC')->orderBy('nama_siswa', 'ASC')->findAll();
        }

        $data['tahun_terpilih'] = $tahun;
        $data['daftar_tahun'] = $model->select('tahun_lulus')->distinct()->orderBy('tahun_lulus', 'DESC')->findAll();
        return view('admin/siswa', $data);
    }

    public function siswaTambah()
    {
        return view('admin/siswa_tambah');
    }

    public function siswaSimpan()
    {
        $model = new SiswaModel();
        $model->save([
            'nisn' => $this->request->getPost('nisn'),
            'nama_siswa' => $this->request->getPost('nama_siswa'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'nama_orang_tua' => $this->request->getPost('nama_orang_tua'),
            'kelas' => $this->request->getPost('kelas'),
            'jurusan' => $this->request->getPost('jurusan'),
            'tahun_lulus' => $this->request->getPost('tahun_lulus'),
            'status_kelulusan' => $this->request->getPost('status_kelulusan'),
        ]);
        session()->setFlashdata('success', 'Data siswa berhasil ditambahkan.');
        return redirect()->to('/admin/siswa');
    }

    public function siswaEdit($id)
    {
        $model = new SiswaModel();
        $data['siswa'] = $model->find($id);
        return view('admin/siswa_edit', $data);
    }

    public function siswaUpdate()
    {
        $model = new SiswaModel();
        $model->save([
            'id' => $this->request->getPost('id'),
            'nisn' => $this->request->getPost('nisn'),
            'nama_siswa' => $this->request->getPost('nama_siswa'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'nama_orang_tua' => $this->request->getPost('nama_orang_tua'),
            'kelas' => $this->request->getPost('kelas'),
            'jurusan' => $this->request->getPost('jurusan'),
            'tahun_lulus' => $this->request->getPost('tahun_lulus'),
            'status_kelulusan' => $this->request->getPost('status_kelulusan'),
        ]);
        session()->setFlashdata('success', 'Data siswa berhasil diperbarui.');
        return redirect()->to('/admin/siswa');
    }

    public function siswaHapus($id)
    {
        $model = new SiswaModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Data siswa berhasil dihapus.');
        return redirect()->to('/admin/siswa');
    }

    // ============================================================
    // IMPORT SISWA VIA EXCEL
    // ============================================================
    public function importSiswa()
    {
        return view('admin/import_siswa');
    }

    public function prosesImport()
    {
        $file = $this->request->getFile('file_excel');

        if (!$file || !$file->isValid()) {
            session()->setFlashdata('error', 'File tidak valid. Silakan pilih file Excel.');
            return redirect()->to('/admin/siswa/import');
        }

        $ext = $file->getClientExtension();
        if (!in_array($ext, ['xlsx', 'xls'])) {
            session()->setFlashdata('error', 'Format file harus .xlsx atau .xls');
            return redirect()->to('/admin/siswa/import');
        }

        $filePath = $file->getTempName();

        try {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            // Skip header row
            $model = new SiswaModel();
            $berhasil = 0;
            $gagal = 0;
            $errors = [];

            for ($i = 1; $i < count($rows); $i++) {
                $row = $rows[$i];
                
                // Skip empty rows
                if (empty($row[0]) && empty($row[1])) continue;

                // Format: NISN, Nama Siswa, Tempat Lahir, Tanggal Lahir, Jenis Kelamin, Nama Orang Tua, Kelas, Jurusan, Tahun Lulus, Status Kelulusan
                $nisn = trim($row[0] ?? '');
                $nama = trim($row[1] ?? '');
                
                if (empty($nisn) || empty($nama)) {
                    $gagal++;
                    $errors[] = "Baris " . ($i + 1) . ": NISN atau Nama kosong.";
                    continue;
                }

                // Check duplicate NISN
                $existing = $model->where('nisn', $nisn)->first();
                if ($existing) {
                    $gagal++;
                    $errors[] = "Baris " . ($i + 1) . ": NISN $nisn sudah terdaftar (" . $existing['nama_siswa'] . ").";
                    continue;
                }

                try {
                    // Parse tanggal lahir
                    $tglLahir = null;
                    if (!empty($row[3])) {
                        if (is_numeric($row[3])) {
                            // Excel serial date
                            $tglLahir = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3])->format('Y-m-d');
                        } else {
                            $tglLahir = date('Y-m-d', strtotime($row[3]));
                        }
                    }

                    $model->save([
                        'nisn' => $nisn,
                        'nama_siswa' => $nama,
                        'tempat_lahir' => trim($row[2] ?? ''),
                        'tanggal_lahir' => $tglLahir,
                        'jenis_kelamin' => strtoupper(trim($row[4] ?? '')),
                        'nama_orang_tua' => trim($row[5] ?? ''),
                        'kelas' => trim($row[6] ?? ''),
                        'jurusan' => trim($row[7] ?? ''),
                        'tahun_lulus' => trim($row[8] ?? ''),
                        'status_kelulusan' => strtoupper(trim($row[9] ?? 'LULUS')),
                    ]);
                    $berhasil++;
                } catch (\Exception $e) {
                    $gagal++;
                    $errors[] = "Baris " . ($i + 1) . ": " . $e->getMessage();
                }
            }

            $msg = "Import selesai! $berhasil data berhasil diimport.";
            if ($gagal > 0) {
                $msg .= " $gagal data gagal.";
            }

            session()->setFlashdata('success', $msg);
            if (!empty($errors)) {
                session()->setFlashdata('import_errors', $errors);
            }

        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal membaca file Excel: ' . $e->getMessage());
        }

        return redirect()->to('/admin/siswa/import');
    }

    public function templateExcel()
    {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Template Data Siswa');

        // Header
        $headers = ['NISN', 'Nama Siswa', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin (L/P)', 'Nama Orang Tua', 'Kelas', 'Jurusan', 'Tahun Lulus', 'Status Kelulusan'];
        foreach ($headers as $col => $header) {
            $cell = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col + 1) . '1';
            $sheet->setCellValue($cell, $header);
            $sheet->getStyle($cell)->getFont()->setBold(true);
            $sheet->getStyle($cell)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
            $sheet->getStyle($cell)->getFill()->getStartColor()->setRGB('4472C4');
            $sheet->getStyle($cell)->getFont()->getColor()->setRGB('FFFFFF');
        }

        // Example row
        $sheet->setCellValue('A2', '0062789099');
        $sheet->setCellValue('B2', 'Contoh Nama Siswa');
        $sheet->setCellValue('C2', 'Subang');
        $sheet->setCellValue('D2', '2006-01-15');
        $sheet->setCellValue('E2', 'L');
        $sheet->setCellValue('F2', 'Nama Orang Tua');
        $sheet->setCellValue('G2', 'XII MIPA 1');
        $sheet->setCellValue('H2', 'MIPA');
        $sheet->setCellValue('I2', '2026');
        $sheet->setCellValue('J2', 'LULUS');

        // Auto-size columns
        foreach (range('A', 'J') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="template_data_siswa.xlsx"');
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');
        exit;
    }

    // ============================================================
    // ALUMNI
    // ============================================================
    public function alumni()
    {
        $model = new AlumniModel();
        $tahun = $this->request->getGet('tahun');

        if ($tahun) {
            $data['alumni'] = $model->where('tahun_lulus', $tahun)->orderBy('nama_alumni', 'ASC')->findAll();
        } else {
            $data['alumni'] = $model->orderBy('tahun_lulus', 'DESC')->orderBy('nama_alumni', 'ASC')->findAll();
        }

        $data['tahun_terpilih'] = $tahun;
        $data['daftar_tahun'] = $model->select('tahun_lulus')->distinct()->orderBy('tahun_lulus', 'DESC')->findAll();
        $data['statistik'] = $model->getStatistikAktivitas();
        return view('admin/alumni', $data);
    }

    public function alumniDetail($id)
    {
        $model = new AlumniModel();
        $data['alumni'] = $model->find($id);
        return view('admin/alumni_detail', $data);
    }

    public function alumniTambah()
    {
        return view('admin/alumni_tambah');
    }

    public function alumniSimpan()
    {
        $model = new AlumniModel();
        $model->save([
            'nisn' => $this->request->getPost('nisn'),
            'nama_alumni' => $this->request->getPost('nama_alumni'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tahun_lulus' => $this->request->getPost('tahun_lulus'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'status_aktivitas' => $this->request->getPost('status_aktivitas'),
            'nama_instansi' => $this->request->getPost('nama_instansi'),
            'jurusan_kuliah' => $this->request->getPost('jurusan_kuliah'),
            'posisi_kerja' => $this->request->getPost('posisi_kerja'),
            'tahun_masuk' => $this->request->getPost('tahun_masuk'),
            'tahun_lulus_kuliah' => $this->request->getPost('tahun_lulus_kuliah'),
        ]);
        session()->setFlashdata('success', 'Data alumni berhasil ditambahkan.');
        return redirect()->to('/admin/alumni');
    }

    public function alumniEdit($id)
    {
        $model = new AlumniModel();
        $data['alumni'] = $model->find($id);
        return view('admin/alumni_edit', $data);
    }

    public function alumniUpdate()
    {
        $model = new AlumniModel();
        $model->save([
            'id' => $this->request->getPost('id'),
            'nisn' => $this->request->getPost('nisn'),
            'nama_alumni' => $this->request->getPost('nama_alumni'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tahun_lulus' => $this->request->getPost('tahun_lulus'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'status_aktivitas' => $this->request->getPost('status_aktivitas'),
            'nama_instansi' => $this->request->getPost('nama_instansi'),
            'jurusan_kuliah' => $this->request->getPost('jurusan_kuliah'),
            'posisi_kerja' => $this->request->getPost('posisi_kerja'),
            'tahun_masuk' => $this->request->getPost('tahun_masuk'),
            'tahun_lulus_kuliah' => $this->request->getPost('tahun_lulus_kuliah'),
        ]);
        session()->setFlashdata('success', 'Data alumni berhasil diperbarui.');
        return redirect()->to('/admin/alumni');
    }

    public function alumniHapus($id)
    {
        $model = new AlumniModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Data alumni berhasil dihapus.');
        return redirect()->to('/admin/alumni');
    }

    // ============================================================
    // TRACER STUDY
    // ============================================================
    public function tracer()
    {
        $model = new TracerStudyModel();
        $data['tracer'] = $model->orderBy('created_at', 'DESC')->findAll();
        $data['statistik'] = $model->getStatistikStatus();
        return view('admin/tracer', $data);
    }

    public function tracerHapus($id)
    {
        $model = new TracerStudyModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Data tracer study berhasil dihapus.');
        return redirect()->to('/admin/tracer');
    }

    // ============================================================
    // LAPORAN
    // ============================================================
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

        return view('admin/laporan', $data);
    }

    public function profil()
    {
        return view('admin/profil');
    }

    // ============================================================
    // PENGATURAN KELULUSAN (COUNTDOWN)
    // ============================================================
    public function pengaturanKelulusan()
    {
        $model = new PengaturanKelulusanModel();
        $data['pengaturan'] = $model->getAktif();
        $data['semua_pengaturan'] = $model->orderBy('id', 'DESC')->findAll();
        return view('admin/pengaturan_kelulusan', $data);
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
        return redirect()->to('/admin/pengaturan-kelulusan');
    }

    public function hapusPengaturan($id)
    {
        $model = new PengaturanKelulusanModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Riwayat pengaturan berhasil dihapus.');
        return redirect()->to('/admin/pengaturan-kelulusan');
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

        return view('admin/keterserapan', $data);
    }
}
