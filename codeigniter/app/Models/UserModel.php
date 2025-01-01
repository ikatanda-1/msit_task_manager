<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'tm_users';
    protected $primaryKey = 'user_id';

    // Set the fields that can be inserted or updated
    protected $allowedFields = [
        'user_id',
        'f_name', 
        'user_type',
        'm_name', 
        'l_name', 
        'email_addr', 
        'password', 
        'tel_no', 
        'physic_address'
    ];

    // Optionally, enable timestamps (created_at, updated_at)
    // protected $useTimestamps = true;

    // If your table columns are named differently for timestamps:
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

/* start getUserProfile */

public function getUserProfile($userId)
    {
        return $this->db->table('tm_users')
            ->select('tm_users.f_name, tm_users.m_name, tm_users.l_name, user_types.type_name, user_status.status_desc')
            ->join('user_types', 'tm_users.user_type = user_types.type_id')
            ->join('user_status', 'tm_users.user_status = user_status.status_id')
            ->where('tm_users.user_id', $userId)
            ->get()
            ->getRowArray();
    }
/* ends getUserProfile */

public function getUsers()
{
    return $this->db->table($this->table)
        ->select('tm_users.user_id,tm_users.f_name, tm_users.m_name, tm_users.l_name, tm_users.email_addr, tm_users.tel_no, tm_users.physic_address, user_types.type_name, user_status.status_desc')
        ->join('user_types', 'user_types.type_id = tm_users.user_type')
        ->join('user_status', 'user_status.status_id = tm_users.user_status')
        ->orderBy('tm_users.l_name', 'ASC')
        ->get()
        ->getResult();
}



public function getUserType($userId)
{
    return $this->where('user_id', $userId)->select('user_type')->first();
}
}
