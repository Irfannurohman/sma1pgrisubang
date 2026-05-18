<?php

namespace App\Controllers;

use App\Models\AlumniModel;

class Alumni extends BaseController
{
    public function index()
    {
        return view('alumni/index');
    }

    public function tracking()
    {
        $nisn = $this->request->getPost('nisn');
        
        if (!$nisn) {
            return redirect()->to('/alumni')->with('error', 'Silakan masukkan NISN terlebih dahulu.');
        }

        $model = new AlumniModel();
        $data['alumni'] = $model->getAlumniByNisn($nisn);
        $data['nisn'] = $nisn;

        if (!$data['alumni']) {
            $data['not_found'] = true;
        }

        return view('alumni/index', $data);
    }

    public function updateStatus()
    {
        $nisn = $this->request->getPost('nisn');
        $model = new AlumniModel();
        $alumni = $model->getAlumniByNisn($nisn);

        if ($alumni) {
            $model->save([
                'id' => $alumni['id'],
                'status_aktivitas' => $this->request->getPost('status_aktivitas'),
                'nama_instansi' => $this->request->getPost('nama_instansi'),
                'jurusan_kuliah' => $this->request->getPost('jurusan_kuliah'),
                'posisi_kerja' => $this->request->getPost('posisi_kerja'),
                'no_hp' => $this->request->getPost('no_hp'),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
            ]);
            session()->setFlashdata('success', 'Data berhasil diperbarui!');
        } else {
            session()->setFlashdata('error', 'NISN tidak ditemukan.');
        }

        return redirect()->to('/alumni');
    }
}
