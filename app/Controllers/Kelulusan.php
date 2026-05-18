<?php

namespace App\Controllers;

class Kelulusan extends BaseController
{
    public function index()
    {
        return view('kelulusan');
    }

    public function prosesCek()
    {
        $nisnInput = $this->request->getPost('nisn_input');

        if (!$nisnInput) {
            return redirect()->to('/')->with('error', 'Silakan masukkan NISN terlebih dahulu.');
        }

        $db = \Config\Database::connect();
        $query = $db->table('siswa')->where('nisn', $nisnInput)->get();
        $data['siswa'] = $query->getRowArray();
        $data['nisn'] = $nisnInput;

        if (!$data['siswa']) {
            $data['not_found'] = true;
        }

        return view('kelulusan', $data);
    }

    public function cetak($nisn)
    {
        $db = \Config\Database::connect();
        $query = $db->table('siswa')->where('nisn', $nisn)->get();
        $data['siswa'] = $query->getRowArray();

        if (!$data['siswa']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('hasil_kelulusan', $data);
    }
}
