<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\AlumniModel;
use App\Models\TracerStudyModel;
use App\Models\UserModel;

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
}
