<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{
    protected $table = 'alumni';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nisn', 'nama_alumni', 'jenis_kelamin', 'tahun_lulus',
        'no_hp', 'email', 'alamat', 'status_aktivitas',
        'nama_instansi', 'jurusan_kuliah', 'posisi_kerja',
        'tahun_masuk', 'tahun_lulus_kuliah', 'foto'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = false;

    public function getAlumniByNisn($nisn)
    {
        return $this->where('nisn', $nisn)->first();
    }

    public function searchAlumni($keyword)
    {
        return $this->like('nama_alumni', $keyword)
                    ->orLike('nisn', $keyword)
                    ->findAll();
    }

    public function getStatistikAktivitas()
    {
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT 
                status_aktivitas,
                COUNT(*) as total
            FROM alumni
            GROUP BY status_aktivitas
        ");
        $results = $query->getResultArray();

        $default = [
            'BEKERJA' => 0,
            'KULIAH' => 0,
            'WIRAUSAHA' => 0,
            'MENIKAH' => 0,
            'BELUM' => 0
        ];

        foreach ($results as $row) {
            if (!empty($row['status_aktivitas'])) {
                $default[$row['status_aktivitas']] = $row['total'];
            }
        }

        $final = [];
        foreach ($default as $status => $total) {
            $final[] = ['status_aktivitas' => $status, 'total' => $total];
        }
        return $final;
    }

    public function getAlumniByTahun($tahun)
    {
        return $this->where('tahun_lulus', $tahun)->findAll();
    }

    public function getAlumniTerbaru($limit = 10)
    {
        return $this->orderBy('created_at', 'DESC')->findAll($limit);
    }
}
