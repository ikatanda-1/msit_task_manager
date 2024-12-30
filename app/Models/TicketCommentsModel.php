<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketCommentsModel extends Model
{
    protected $table = 'ticket_comments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['ticket_id', 'user_id', 'date_created', 'comment_desc'];
    protected $useTimestamps = false; // date_created is manually set
}
