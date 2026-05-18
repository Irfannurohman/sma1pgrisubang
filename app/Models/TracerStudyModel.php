<?php

namespace App\Models;

use CodeIgniter\Model;

class TracerStudyModel extends Model
{
    protected $table = 'tracer_study';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nisn', 'nama', 'tahun_lulus', 'status_setelah_lulus',
        'nama_pt', 'jurusan_kuliah', 'nama_perusahaan', 'posisi',
        'gaji_range', 'kesesuaian_jurusan', 'saran'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = false;

    public function getStatistikStatus()
    {
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT 
                status_setelah_lulus,
                COUNT(*) as total
            FROM tracer_study
            GROUP BY status_setelah_lulus
        ");
        return $query->getResultArray();
    }

    public function getRataResponden()
    {
        return $this->countAllResults();
    }

    public function getByTahun($tahun)
    {
        return $this->where('tahun_lulus', $tahun)->findAll();
    }
}
