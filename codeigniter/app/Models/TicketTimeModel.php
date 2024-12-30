<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketTimeModel extends Model
{
    protected $table = 'tm_time';
    protected $primaryKey = 'time_id';
    protected $allowedFields = ['user_id', 'ticket_id', 'date_clocked', 'ticket_comment', 'hours'];
}
