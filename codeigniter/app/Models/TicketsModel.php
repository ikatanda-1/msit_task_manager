<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketsModel extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'ticket_id';
    protected $allowedFields = [
        'ticket_id',
        'client_id', 
        'ticket_type', 
        'ticket_status', 
        'due_date', 
        'create_date', 
        'ticket_comment', 
        'user_id',
        'status_id'
        ];

    public function getCompanyTickets($clientId)
    {
        return $this->db->table('tm_clients')
            ->select('
                tickets.ticket_id,
                tm_clients.reg_name,
                ticket_types.type_desc, 
                tickets.ticket_comment AS description, 
                tm_users.user_id,
                tm_users.f_name AS allocated_to, 
                tickets.due_date, 
                GROUP_CONCAT(CONCAT(date(ticket_comments.date_created),": ",ticket_comments.comment_desc) SEPARATOR " | ") AS notes
            ')
            ->join('tickets', 'tickets.client_id = tm_clients.id')
            ->join('ticket_types', 'ticket_types.type_id = tickets.ticket_type')
            ->join('tm_users', 'tm_users.user_id = tickets.user_id')
            ->join('ticket_comments', 'ticket_comments.ticket_id = tickets.ticket_id', 'left')
            ->where('tm_clients.id', $clientId)
            ->groupBy('tickets.ticket_id') // Ensures notes are grouped per ticket
            ->get()
            ->getResultArray();
    }

    public function updateTicketStatus($ticketId, $status)
    {
        return $this->db->table($this->table)
            ->where('ticket_id', $ticketId)
            ->update(['ticket_status' => $status]);
    }

 
public function addTicket(array $data)
    {
        return $this->insert($data);
    }
    
    
    public function getTicketsByClientId($clientId)
    {
        return $this->db->table($this->table)
            ->select('ticket_priority.p_desc as priority, tm_clients.reg_name, ticket_types.type_desc, 
            tickets.ticket_comment, date(tickets.create_date) as create_date, tickets.due_date,
            tickets_status.status_desc')
            ->join('ticket_priority', 'ticket_priority.priority_id = tickets.prior_id')
            ->join('tm_clients', 'tm_clients.id = tickets.client_id')
            ->join('ticket_types', 'ticket_types.type_id = tickets.ticket_type')
            ->join('tickets_status', 'tickets_status.status_id = tickets.ticket_status')
            ->where('tickets.client_id', $clientId)
            ->get()
            ->getResultArray();
    }

    public function getTicketCommentById($ticket_id)
    {
        return $this->select('ticket_comment')
                    ->where('ticket_id', $ticket_id)
                    ->first();
    }

}
