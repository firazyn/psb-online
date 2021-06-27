<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
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
		$this->forge->createTable('user', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		// menghapus tabel user
		$this->forge->dropTable('user');
	}
}
