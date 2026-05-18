<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSiswaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nisn' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
            ],
            'nama_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'nama_orang_tua' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'jurusan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tahun_lulus' => [
                'type' => 'YEAR',
                'constraint' => 4,
            ],
            'status_kelulusan' => [
                'type' => 'ENUM',
                'constraint' => ['LULUS', 'TIDAK LULUS'],
                'default' => 'LULUS',
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}
