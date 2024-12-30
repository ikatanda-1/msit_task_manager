<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketTypesModel extends Model
{
    protected $table = 'ticket_types';
    protected $primaryKey = 'type_id';
    protected $allowedFields = ['type_desc'];
}
