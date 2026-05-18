<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTracerStudyTable extends Migration
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
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tahun_lulus' => [
                'type' => 'YEAR',
                'constraint' => 4,
            ],
            'status_setelah_lulus' => [
                'type' => 'ENUM',
                'constraint' => ['BEKERJA', 'KULIAH', 'WIRAUSAHA', 'BELUM_BEKERJA'],
                'default' => 'BELUM_BEKERJA',
            ],
            'nama_pt' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'jurusan_kuliah' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nama_perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'posisi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'gaji_range' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'kesesuaian_jurusan' => [
                'type' => 'ENUM',
                'constraint' => ['SESUAI', 'TIDAK_SESUAI', 'CUKUP_SESUAI'],
                'null' => true,
            ],
            'saran' => [
                'type' => 'TEXT',
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
        $this->forge->createTable('tracer_study');
    }

    public function down()
    {
        $this->forge->dropTable('tracer_study');
    }
}
