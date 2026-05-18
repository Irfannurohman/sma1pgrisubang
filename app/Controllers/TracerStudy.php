<?php

namespace App\Controllers;

use App\Models\TracerStudyModel;

class TracerStudy extends BaseController
{
    public function index()
    {
        return view('tracer_study/form');
    }

    public function simpan()
    {
        $model = new TracerStudyModel();

        $rules = [
            'nisn' => 'required|min_length[5]|max_length[20]',
            'nama' => 'required|min_length[3]|max_length[255]',
            'tahun_lulus' => 'required|numeric|min_length[4]|max_length[4]',
            'status_setelah_lulus' => 'required',
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $model->save([
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama'),
            'tahun_lulus' => $this->request->getPost('tahun_lulus'),
            'status_setelah_lulus' => $this->request->getPost('status_setelah_lulus'),
            'nama_pt' => $this->request->getPost('nama_pt'),
            'jurusan_kuliah' => $this->request->getPost('jurusan_kuliah'),
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
            'posisi' => $this->request->getPost('posisi'),
            'gaji_range' => $this->request->getPost('gaji_range'),
            'kesesuaian_jurusan' => $this->request->getPost('kesesuaian_jurusan'),
            'saran' => $this->request->getPost('saran'),
        ]);

        session()->setFlashdata('success', 'Terima kasih! Data tracer study berhasil disimpan.');
        return redirect()->to('/tracer-study');
    }
}
