<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Calon extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'       => [
				'type'           => 'INT',
				'constraint'     => '5',
				'auto_increment' => true

			],
			'user_calon' => [
				'type'           => 'VARCHAR',
				'constraint'     => '16'
			],

			'nama_calon'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '16'
			],
			'wali_calon'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '16'
			],
			'status_calon'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'     		 => TRUE,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'     		 => TRUE,
			],
			'deleted_at' => [
				'type'           => 'DATETIME',
				'null'     		 => TRUE,
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);
		$this->forge->addForeignKey('user_calon', 'user', 'username');

		// Membuat tabel user
		$this->forge->createTable('calon', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		// menghapus tabel calon
		$this->forge->dropTable('calon');
	}
}
