<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketsPriorityModel extends Model
{
    protected $table = 'ticket_priority';

public function getAllPriorities()
    {
        return $this->select('priority_id, p_desc')->findAll();
    }

}