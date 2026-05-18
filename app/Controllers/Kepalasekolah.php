<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\AlumniModel;
use App\Models\TracerStudyModel;

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
}
