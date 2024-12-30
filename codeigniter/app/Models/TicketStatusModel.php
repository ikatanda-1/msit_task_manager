<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketStatusModel extends Model
{
    protected $table = 'tickets_status';

    public function getAllStatuses()
    {
        return $this->select('status_id, status_desc')->findAll();
    }
}
