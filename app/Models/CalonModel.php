<?php

namespace App\Models;

use CodeIgniter\Model;

class CalonModel extends Model
{
    protected $table = 'calon';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'user_calon', 'nama_calon',  'wali_calon', 'status_calon', 'bukti_pembayaran',
        'nilai_saintek', 'nilai_soshum', 'nilai_bahasa'
    ];

    public function getUser($username)
    {
        return $this->select('user_calon')
            ->where('user_calon', $username)
            ->where('deleted_at', NULL)
            ->first();
    }

    public function getCalon($username)
    {
        return $this->where(['user_calon' => $username])->first();
    }

    public function download($id)
    {
        return $this->find($id);
    }
}
