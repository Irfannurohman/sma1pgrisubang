<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nisn', 'nama_siswa', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'nama_orang_tua', 'kelas', 'jurusan',
        'tahun_lulus', 'status_kelulusan', 'foto'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = false;

    public function getSiswaByNisn($nisn)
    {
        return $this->where('nisn', $nisn)->first();
    }

    public function searchSiswa($keyword)
    {
        return $this->like('nama_siswa', $keyword)
                    ->orLike('nisn', $keyword)
                    ->findAll();
    }

    public function getSiswaByTahun($tahun)
    {
        return $this->where('tahun_lulus', $tahun)->findAll();
    }

    public function getStatistikKelulusan()
    {
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT 
                tahun_lulus,
                COUNT(*) as total,
                SUM(CASE WHEN status_kelulusan = 'LULUS' THEN 1 ELSE 0 END) as lulus,
                SUM(CASE WHEN status_kelulusan = 'TIDAK LULUS' THEN 1 ELSE 0 END) as tidak_lulus
            FROM siswa
            GROUP BY tahun_lulus
            ORDER BY tahun_lulus DESC
        ");
        return $query->getResultArray();
    }
}
