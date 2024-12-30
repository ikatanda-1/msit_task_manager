
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
    <title>Task Management System Documentation</title>
    <style>
    pre {
        border: solid 1px #ccc;
        width: 1000px;
        padding: 10px;
    }

    </style>
</head>
<body>
    <div class='container_doc'>
    <h1>Documentation for Task Management System</h1>
    <h2>Overview</h2>
    <p>The Task Management System is a web-based application designed to streamline the creation, assignment, and tracking of tasks across teams and individuals. It provides robust features for ticket management, status updates, and reporting, ensuring efficient workflow management.</p>
    <h2>Key Features</h2>
    <ul>
        <li><strong>Ticket Management:</strong> Create, view, update, and delete tickets. Assign tickets to users with relevant details and deadlines. Track ticket progress through various statuses.</li>
        <li><strong>Status Updates:</strong> Dynamically update the status of a ticket. Ensure consistent and real-time updates for better task tracking.</li>
        <li><strong>User-Friendly Interface:</strong> Clean and intuitive forms for ticket handling. Integration of helpful views like header and left_menu for navigation.</li>
        <li><strong>Data Security:</strong> Protection against XSS through data escaping (esc()). Ensures only authenticated users can manage tasks and statuses.</li>
    </ul>
    <h2>Modules</h2>
    <h3>1. TicketsController</h3>
    <p>Handles the logic for updating ticket statuses.</p>
    <pre>
        public function updateTicketStatus($ticketId)
        {
            $ticketsModel = new TicketsModel(); // Instantiate the model
            $newStatus = $this->request->getPost('filter_status'); // Get new status
            $updated = $ticketsModel->updateTicketStatus($ticketId, $newStatus); // Update status

            if (!$updated) {
                throw new PageNotFoundException("Unable to update the ticket status for Ticket ID: $ticketId");
            }

            return redirect()->to("/tickets/view/$ticketId")->with('status', 'Ticket status updated successfully.');
        }
    </pre>
    <p><strong>Functionality:</strong> Updates the status of a ticket based on user input (filter_status) and redirects back to the ticket view with a success message.</p>
    <h3>2. TicketsModel</h3>
    <p>Interfaces with the database to update ticket statuses.</p>
    <pre>
        public function updateTicketStatus($ticketId, $status)
        {
            return $this->db->table('tickets')
                ->where('ticket_id', $ticketId)
                ->update(['ticket_status' => $status]);
        }
    </pre>
    <h3>3. Views</h3>
    <p>Provides user interfaces for managing tickets and updating statuses.</p>
   
    
    <h2>Workflow</h2>
    <ol>
        <li><strong>View Ticket:</strong> Navigate to the ticket details page to see the current status and details.</li>
        <li><strong>Update Status:</strong> Access the update_ticket_status.php page. Select the new status from the dropdown and submit the form.</li>
        <li><strong>Database Update:</strong> The updateTicketStatus method in TicketsModel updates the ticket_status field in the tickets table.</li>
        <li><strong>Redirect:</strong> Upon successful update, the user is redirected back to the ticket view with a confirmation message.</li>
    </ol>
    <h2>Routes</h2>
    <p><strong>Updating Ticket Status:</strong></p>
    <pre>
        $routes->post('tickets/update_status/(:num)', 'TicketsController::updateTicketStatus/$1');
    </pre>
    <h2>Best Practices</h2>
    <ul>
        <li><strong>Validation:</strong> Ensure the filter_status input is validated to allow only predefined status values.</li>
        <li><strong>Error Handling:</strong> Use exceptions like PageNotFoundException to handle cases where updates fail.</li>
        <li><strong>UI Consistency:</strong> Maintain a consistent look and feel across all pages.</li>
        <li><strong>Security:</strong> Escape all dynamic content in views to prevent XSS attacks. Use CSRF protection for all forms.</li>
    </ul>
    <h2>Future Enhancements</h2>
    <ul>
        <li><strong>Role-Based Access Control:</strong> Restrict status updates to specific user roles (e.g., managers or admins).</li>
        <li><strong>Notifications:</strong> Send notifications to assigned users upon status changes.</li>
        <li><strong>Reporting:</strong> Generate reports on ticket progress and completion rates.</li>
        <li><strong>Audit Logs:</strong> Track changes to ticket statuses for accountability.</li>
    </ul>
    </div>
</body>
</html>
