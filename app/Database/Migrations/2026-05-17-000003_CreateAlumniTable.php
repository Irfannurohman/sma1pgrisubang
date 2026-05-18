<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAlumniTable extends Migration
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
            'nama_alumni' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'tahun_lulus' => [
                'type' => 'YEAR',
                'constraint' => 4,
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status_aktivitas' => [
                'type' => 'ENUM',
                'constraint' => ['BEKERJA', 'KULIAH', 'WIRAUSAHA', 'BELUM'],
                'default' => 'BELUM',
            ],
            'nama_instansi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'jurusan_kuliah' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'posisi_kerja' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tahun_masuk' => [
                'type' => 'YEAR',
                'constraint' => 4,
                'null' => true,
            ],
            'tahun_lulus_kuliah' => [
                'type' => 'YEAR',
                'constraint' => 4,
                'null' => true,
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
        $this->forge->createTable('alumni');
    }

    public function down()
    {
        $this->forge->dropTable('alumni');
    }
}
