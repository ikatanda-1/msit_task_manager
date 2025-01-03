<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketTypesModel extends Model
{
    protected $table = 'ticket_types';
    protected $primaryKey = 'type_id';
    protected $allowedFields = ['type_desc'];

    public function getTypeName($type_id){
        /* returns type name from type_id */
        return $this->select('type_id, type_desc')->findAll();
    }
}
