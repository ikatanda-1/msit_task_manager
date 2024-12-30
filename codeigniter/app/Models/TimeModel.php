<?php
namespace App\Models;

use CodeIgniter\Model;

class TimeModel extends Model
{
    protected $table = 'tm_time';
    protected $primaryKey = 'time_id';
    protected $allowedFields = [
        'date_clocked', 'client_id', 'ticket_id', 'user_id', 'hours', 'ticket_comment'
    ];
    public function getTimeDataByUserId($userId,$startDate = null, $endDate = null)
    {

        $db = \Config\Database::connect();
        $builder = $db->table($this->table);

        // Select fields with necessary joins
        $builder->select('tm_time.date_clocked,tm_clients.reg_name as reg_name, tickets.ticket_comment, tm_time.ticket_comment as time_comment, tm_time.hours')//, tm_clients.reg_name, tickets.ticket_comment, tm_time.ticket_comment as time_comment, tm_time.hours')
            
            ->join('tickets', 'tickets.ticket_id = tm_time.ticket_id')
           
            ->join('tm_clients', 'tm_clients.id = tickets.client_id')
            
            //->join('tm_users', 'tm_users.user_id = tm_time.user_id')
            ->where('tm_time.user_id', $userId)
            ->orderBy('tm_time.date_clocked', 'ASC');
        
        // Apply date filters if provided
        if ($startDate) {
            $builder->where('tm_time.date_clocked >=', $startDate);
        }
        if ($endDate) {
            $builder->where('tm_time.date_clocked <=', $endDate);
        }

        // Execute the query and return results
        return $builder->get()->getResult();
    }
}
