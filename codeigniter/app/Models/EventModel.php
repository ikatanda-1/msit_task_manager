<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'start_date', 'end_date'];

    public function getEvents($start, $end)
    {
        return $this->where('start_date >=', $start)
                    ->where('end_date <=', $end)
                    ->findAll();
    }
}
