<?php

namespace App\Controllers;

use App\Models\PengaturanKelulusanModel;

class Kelulusan extends BaseController
{
    public function index()
    {
        $pengaturanModel = new PengaturanKelulusanModel();
        $pengaturan = $pengaturanModel->getAktif();
        $sudahWaktunya = $pengaturanModel->isWaktuPengumuman();

        $data = [
            'pengaturan' => $pengaturan,
            'sudah_waktunya' => $sudahWaktunya,
            'waktu_pengumuman' => $pengaturanModel->getWaktuPengumuman(),
        ];

        return view('kelulusan', $data);
    }

    public function prosesCek()
    {
        $pengaturanModel = new PengaturanKelulusanModel();

        // Cek apakah sudah waktunya pengumuman
        if (!$pengaturanModel->isWaktuPengumuman()) {
            return redirect()->to('/')->with('error', 'Pengumuman kelulusan belum dibuka.');
        }

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

        // Pass pengaturan data
        $pengaturan = $pengaturanModel->getAktif();
        $data['pengaturan'] = $pengaturan;
        $data['sudah_waktunya'] = true;
        $data['waktu_pengumuman'] = $pengaturanModel->getWaktuPengumuman();

        return view('kelulusan', $data);
    }

    public function cetak($nisn)
    {
        $pengaturanModel = new PengaturanKelulusanModel();
        if (!$pengaturanModel->isWaktuPengumuman()) {
            return redirect()->to('/');
        }

        $db = \Config\Database::connect();
        $query = $db->table('siswa')->where('nisn', $nisn)->get();
        $data['siswa'] = $query->getRowArray();

        if (!$data['siswa']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['pengaturan'] = $pengaturanModel->getAktif();

        return view('hasil_kelulusan', $data);
    }

}
