<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '16'
			],
			'password'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
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
		$this->forge->addKey('username', TRUE);

		// Membuat tabel user
		$this->forge->createTable('admin', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		// menghapus tabel admin
		$this->forge->dropTable('admin');
	}
}
