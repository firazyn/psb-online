<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
	protected $table = 'admin';
	protected $primaryKey = 'username';
	protected $useTimestamps = true;
	protected $useSoftDeletes = true;
	protected $allowedFields = ['username',  'password'];

	public function getLogin($username)
	{
		return $this->where('username', $username)->where('deleted_at', NULL)->get()->getRow();
	}
}
