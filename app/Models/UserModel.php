<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table = 'user';
	protected $primaryKey = 'username';
	protected $useTimestamps = true;
	protected $useSoftDeletes = true;
	protected $allowedFields = ['email', 'username',  'password'];

	public function getLogin($username)
	{
		return $this->where('username', $username)->where('deleted_at', NULL)->get()->getRow();
	}
}
