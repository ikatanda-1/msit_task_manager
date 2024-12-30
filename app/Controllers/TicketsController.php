<?php

namespace App\Controllers;
use App\Models\ClientModel;
use App\Models\TicketsModel;
use App\Models\UserModel;
use App\Models\TicketTypesModel;
use App\Models\TicketTimeModel;
use App\Models\TicketStatusModel;
use App\Models\TicketsPriorityModel;

class TicketsController extends BaseController
{
    public function index()
    {
        $session = session();
        $userId = $session->get('user_id'); // Retrieve current user's ID from session
        $this->showForm();
        $this->get_priority();
        if (!$userId) {
            echo $session->get('username');
            //return redirect()->to('/login'); // Redirect if not logged in
        }

        $model = new TicketsModel();

        // Get query parameters for sorting and filtering
        $sortBy = $this->request->getGet('sort_by') ?? 'tickets.due_date';
        $filterDueDate = $this->request->getGet('filter_due_date');
        $filterStatus = $this->request->getGet('filter_status');
        $showClosed = $this->request->getGet('show_closed');
        $filterPriority = $this->request->getGet('filter_priority');

        // Build query
        $query = $model->select('ticket_priority.p_desc as priority,
        tickets.ticket_id,tickets.client_id, tm_clients.reg_name, ticket_types.type_desc, tickets_status.status_desc, tickets.due_date, ' .
            'DATEDIFF(tickets.due_date, tickets.create_date) as days_due, tickets.ticket_comment'
        )
        ->join('ticket_priority', 'ticket_priority.priority_id = tickets.prior_id')
        ->join('tm_clients', 'tm_clients.id = tickets.client_id')
        ->join('ticket_types', 'ticket_types.type_id = tickets.ticket_type')
        ->join('tickets_status', 'tickets_status.status_id = tickets.ticket_status')
        ->where('tickets.user_id', $userId);

        if ($filterDueDate) {
            $query->where('tickets.due_date >=', $filterDueDate);
        }
        if ($filterStatus) {
            $query->where('tickets_status.status_id', $filterStatus);
        }
        if ($filterPriority) {
            $query->where('ticket_priority.priority_id', $filterPriority);
        }
        if (!$showClosed) {
            $query->where('tickets_status.status_id !=', 4); // Exclude closed tickets
        }
        $tickets = $query->orderBy($sortBy, 'ASC')->findAll();

        return view('tickets_view', [
            'tickets' => $tickets,
            'sortBy' => $sortBy,
            'filterDueDate' => $filterDueDate,
            'filterStatus' => $filterStatus,
            'showClosed' => $showClosed,
            'filterPriority' => $filterPriority
        ]);
    }
/* start: showForm() */
    public function showForm()
    {
        $statusModel = new TicketStatusModel();
        $statuses = $statusModel->getAllStatuses();

        return view('form_component/ticket_status', ['statuses' => $statuses]);
    }

/* ends: showForm() */

/* start: get_priority() */
public function get_priority()
{
    $priorityModel = new TicketsPriorityModel();
    $priorities = $priorityModel->getAllPriorities();

    return view('form_component/ticket_priority', ['priorities' => $priorities]);
}

/* ends: get_priority() */

    public function create()
    {
        $clientsModel = new ClientModel();
        $usersModel = new UserModel();
        $ticketTypesModel = new TicketTypesModel();
        $this->get_priority();
        // Fetch data for suggestive fields
        $clients = $clientsModel->findAll();
        $staff = $usersModel->where('user_type', 2)->findAll();
        $ticketTypes = $ticketTypesModel->findAll();

        return view('add_ticket', [
            'clients' => $clients,
            'staff' => $staff,
            'ticketTypes' => $ticketTypes,
        ]);
    }

    public function store()
    {
        $ticketsModel = new TicketsModel();

        // Get form data
        $data = [
            'client_id' => $this->request->getPost('client_id'),
            'user_id' => $this->request->getPost('user_id'),
            'ticket_type' => $this->request->getPost('ticket_type'),
            'create_date' => date('Y-m-d'), // Default to current date
        ];

        if ($ticketsModel->insert($data)) {
            return redirect()->to('/tickets')->with('success', 'Ticket added successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to add ticket.');
        }
    }

    public function profile($ticketId)
    {
        $model = new TicketsModel();
        $ticket= $model->find($ticketId);

        if (!$ticket) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Ticket not found');
        }

        return view('ticket_profile', ['ticket' => $ticket]);
    }



    public function add_note($ticket_id)
{
    $session = session();
    $user_id = $session->get('user_id'); // Get the currently logged-in user's ID

    if (!$user_id) {
        return redirect()->to('/login')->with('error', 'Please log in to add a note.');
    }

    return view('add_note', [
        'ticket_id' => $ticket_id,
        'user_id' => $user_id,
    ]);
}

public function store_note()
{
    $session = session();
    $user_id = $session->get('user_id'); // Get the currently logged-in user's ID

    if (!$user_id) {
        return redirect()->to('/login')->with('error', 'Please log in to add a note.');
    }

    $ticket_id = $this->request->getPost('ticket_id');
    $comment_desc = $this->request->getPost('comment_desc');

    // Validate input
    if (empty($comment_desc)) {
        return redirect()->back()->withInput()->with('error', 'Comment cannot be empty.');
    }

    // Insert the note into the ticket_comments table
    $ticketCommentsModel = new \App\Models\TicketCommentsModel();
    $data = [
        'ticket_id' => $ticket_id,
        'user_id' => $user_id,
        'date_created' => date('Y-m-d H:i:s'), // Current timestamp
        'comment_desc' => $comment_desc,
    ];

    if ($ticketCommentsModel->insert($data)) {
        return redirect()->to('/tickets/' . $ticket_id)->with('success', 'Note added successfully.');
    } else {
        return redirect()->back()->withInput()->with('error', 'Failed to add note.');
    }
}
public function view($ticket_id)
{
    $db = \Config\Database::connect();
    $builder = $db->table('tickets');
    $builder_second = $db->table('tm_time');

    // Join query to fetch ticket details
    $builder->select('ticket_priority.p_desc as priority,
    tickets.ticket_id,tickets.ticket_comment, tickets.due_date, tickets.create_date,
     tm_users.f_name, tm_clients.reg_name, ticket_comments.comment_desc, 
    tickets_status.status_desc as t_status')   
        ->join('tm_users', 'tm_users.user_id = tickets.user_id')
        ->join('ticket_priority', 'ticket_priority.priority_id = tickets.prior_id')
        ->join('tm_clients', 'tm_clients.id = tickets.client_id')
        ->join('tickets_status', 'tickets_status.status_id = tickets.ticket_status')
        ->join('ticket_comments', 'ticket_comments.ticket_id = tickets.ticket_id', 'left') // Left join to include tickets without comments
        ->where('tickets.ticket_id', $ticket_id);
   $builder_second->select('tm_time.date_clocked as date_clocked,
    tm_time.hours as hours,tm_time.ticket_comment as comment_time')
        ->where('tm_time.ticket_id', $ticket_id);

    $query = $builder->get();
    $query2 = $builder_second->get();
    $result = $query->getResult();
    $result2 = $query2->getResult();

    if (empty($result)) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Ticket not found");
    }

    return view('ticket_profile', ['ticketDetails' => $result,
    'ticketTime' => $result2
    ]);
}

/* start: add_time() */

public function add_time($ticket_id)
{
    $session = session();
    $user_id = $session->get('user_id'); // Get the currently logged-in user's ID

    if (!$user_id) {
        return redirect()->to('/login')->with('error', 'Please log in to add a note.');
    }

    return view('add_time', [
        'ticket_id' => $ticket_id,
        'user_id' => $user_id,
    ]);
}

/* ends: add_time() */
/* start: store_time() */

public function store_time()
{
    $session = session();
    $user_id = $session->get('user_id'); // Get the currently logged-in user's ID

    if (!$user_id) {
        return redirect()->to('/login')->with('error', 'Please log in to add a note.');
    }

    $ticket_id = $this->request->getPost('ticket_id');
    $time_desc = $this->request->getPost('time_desc');
    $date_clocked = $this->request->getPost('date_clocked');
    $comment_time = $this->request->getPost('comment_time');
    

    // Validate input
    if (empty($time_desc)) {
        return redirect()->back()->withInput()->with('error', 'Time cannot be empty.');
    }

    // Insert the note into the ticket_comments table
    $time = new TicketTimeModel();
    $data = [
        'ticket_id' => $ticket_id,
        'user_id' => $user_id,
        'date_clocked' => $date_clocked, //  date of activity
        'ticket_comment' => $comment_time,
        'hours' => $time_desc,
    ];

    if ($time->insert($data)) {
        return redirect()->to('/tickets/add_time/' . $ticket_id)->with('success', '<div class="notif">Time added successfully.</div>');
    } else {
        return redirect()->back()->withInput()->with('error', '<div class="notif">Failed to add note.</div>');
    }
}
/* ends: store_time() */

/* start: updateTicketStatus() */
public function updateTicketStatus($ticketId)
{
    $ticketsModel = new TicketsModel(); // Instantiate the model

    // Get the new status from the request
    $newStatus = $this->request->getPost('filter_status');

    // Update the ticket status
    $updated = $ticketsModel->updateTicketStatus($ticketId, $newStatus);

    if (!$updated) {
        throw new PageNotFoundException("Unable to update the ticket status for Ticket ID: $ticketId");
    }

    // Redirect to a success page or back to the ticket view
    return redirect()->to("/tickets/$ticketId")->with('status', 'Ticket status updated successfully.');
}
/* ends: updateTicketStatus() */

public function updateStatusForm($ticketId){
    $this->showForm();

    return view('update_ticket_status', ['ticketId' => $ticketId]);
}
/* start: createTicket() */
public function createTicket($id)
{
    $ticketsModel = new TicketsModel();

    $userId = $this->request->getPost('user_id');
    $clientId = $id;
    $ticketType = $this->request->getPost('ticket_type');
    $dueDate = $this->request->getPost('due_date');
    $ticketComment = $this->request->getPost('ticket_comment');
    $status_id = 1;

    if ($ticketsModel->addNewTicket($userId, $clientId, $ticketType, $dueDate, $ticketComment)) {
        return redirect()->to('add_ticket/'.$clientId)->with('success', 'Ticket created successfully!');
    } else {
        return redirect()->back()->with('error', 'Failed to create ticket.');
    }
}


/* ends: createTicket() */


/* start: client() */
public function client($clientId)
    {
        $ticketModel = new TicketsModel();
        $data = [
            'tickets' => $ticketModel->getTicketsByClientId($clientId),
        ];

        return view('tickets_client', $data);
    }
    /* ends: client() */

}
