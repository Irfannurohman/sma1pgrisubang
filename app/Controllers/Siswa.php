<?php

namespace App\Controllers;

use App\Models\SiswaModel; 

class Siswa extends BaseController
{
    public function index()
    {
        return view('landingpage');
    }

    public function cek()
    {
        $model = new SiswaModel();
        $nisn = $this->request->getPost('nisn');
        
        $data = $model->where('nisn', $nisn)->first();

        if ($data) {
            return view('hasil_kelulusan', ['siswa' => $data]);
        } else {
            return redirect()->to('/')->with('error', 'NISN tidak ditemukan!');
        }
    }
}