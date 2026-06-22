<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaturanKelulusanModel extends Model
{
    protected $table = 'pengaturan_kelulusan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'tahun_ajaran', 'tanggal_pengumuman', 'jam_pengumuman',
        'pesan_sebelum', 'pesan_sesudah', 'is_aktif'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = false;

    /**
     * Ambil pengaturan kelulusan yang aktif
     */
    public function getAktif()
    {
        return $this->where('is_aktif', 1)->orderBy('id', 'DESC')->first();
    }

    /**
     * Cek apakah sudah waktunya pengumuman
     * @return bool
     */
    public function isWaktuPengumuman()
    {
        $pengaturan = $this->getAktif();
        if (!$pengaturan) {
            return true; // Jika tidak ada pengaturan, default bisa diakses
        }

        $waktuPengumuman = strtotime($pengaturan['tanggal_pengumuman'] . ' ' . $pengaturan['jam_pengumuman']);
        $waktuSekarang = time();

        return $waktuSekarang >= $waktuPengumuman;
    }

    /**
     * Ambil waktu pengumuman dalam format datetime string
     */
    public function getWaktuPengumuman()
    {
        $pengaturan = $this->getAktif();
        if (!$pengaturan) {
            return null;
        }
        return $pengaturan['tanggal_pengumuman'] . 'T' . $pengaturan['jam_pengumuman'];
    }

    /**
     * Nonaktifkan semua pengaturan lain sebelum aktifkan yang baru
     */
    public function nonaktifkanSemua()
    {
        return $this->where('is_aktif', 1)->set('is_aktif', 0)->update();
    }
}
