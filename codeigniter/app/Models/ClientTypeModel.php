<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientTypeModel extends Model
{
    protected $table = 'tm_client_types';
    protected $primaryKey = 'type_id';
    protected $allowedFields = ['type_desc'];
}
