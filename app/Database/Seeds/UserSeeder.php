<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->truncate();

        $data = [
            [
                'username' => 'admin',
                'password' => 'admin123',
                'nama_lengkap' => 'Administrator',
                'role' => 'admin'
            ],
            [
                'username' => 'siswa',
                'password' => 'siswa123',
                'nama_lengkap' => 'Siswa Test',
                'role' => 'siswa'
            ],
            [
                'username' => 'kepsek',
                'password' => 'kepsek123',
                'nama_lengkap' => 'Kepala Sekolah',
                'role' => 'kepsek'
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}