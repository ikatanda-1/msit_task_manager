
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets</title>
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
    <style>

        table {
           display: block;
            width: 100%;
            border-collapse: collapse;
            margin: auto;
            
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f6f8fa;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .days-due-negative {
            color: red;
        }

        form {
            margin-bottom: 20px;
        }
    .ticket_container {
    display: flex;
    justify-content: space-between; /* Center horizontally */
    align-items: center; /* Center vertically */
    max-width: 900px;
    top: 100px;
    height: 100vh; /* Ensure the container takes the full height of the viewport */
    margin: 0 auto;
}
.no-comments {
            text-align: center;
            margin-top: 20px;
        }
        .ticket-details {
            width: 80%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #d0d7de;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        input[type="date"]{
            width: 100px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input type="text" {
            width: 100px;
            
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button{
            padding: 10px;
            background-color: #2ea44f;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .Critical {
            border: solid 1px #f55142;
            color: #f55142;
            padding: 5px;
            border-radius: 5px;
        }
        .Critical:hover {
            background-color: #f55142;
            color: white;
        }
        .Important {
            border: solid 1px #e0d053;
            color: black;
            padding: 5px;
            border-radius: 5px;
        }
        .Important:hover {
            background-color: #e0d053;
            color: white;
        }
        .Medium {
            border: solid 1px #86dbaa;
            color: black;
            padding: 5px;
            border-radius: 5px;
        }
        .Medium:hover {
            background-color: #86dbaa;
            color: white;
        }
        .Backlog {
            border: solid 1px grey;
            color: black;
            padding: 5px;
            border-radius: 5px;
        }
        .Backlog:hover {
            background-color: grey;
            color: white;
        }
    </style>
</head>
<body>
<?= view('header') ?>

<?= view('left_menu') ?>
    
<div class='ticket_container'>
    <table>
        <thead>
            <tr> 
    <td colspan=8> 
        <form method="get" action="">
        <label for="filter_due_date">From </label>
        <input type="date" id="filter_due_date" name="filter_due_date" value="<?= esc($filterDueDate) ?>">
        <label for="filter_due_date"> Status</label>  
<?= view('form_component/ticket_status') ?>
        <label for="priority">Priority</label>
<?= view('form_component/ticket_priority') ?>       
        <label for='show_closed'>Show Closed</label>
            <input type="checkbox" id="show_closed" name="show_closed" <?= $showClosed ? 'checked' : '' ?>>
        
        
            
        <label for="sort_by">Sort By:</label>
        <select id="sort_by" name="sort_by">
            <option value="tm_clients.reg_name" <?= $sortBy === 'tm_clients.reg_name' ? 'selected' : '' ?>>Client</option>
            <option value="tickets_status.status_desc" <?= $sortBy === 'tickets_status.status_desc' ? 'selected' : '' ?>>Status</option>
            <option value="tickets.due_date" <?= $sortBy === 'tickets.due_date' ? 'selected' : '' ?>>Due Date</option>
            <option value="ticket_priority.priority_id" <?= $sortBy === 'ticket_priority.p_desc' ? 'selected' : '' ?>>Priority</option>
        
        </select>

        <button type="submit">Apply</button>
    </form>
    <br /> <a href="<?= site_url('tickets/tickets') ?>">back</a> to all tickets
    </td>
    </tr>



            <tr>
                <th>Ticket</th>
                <th>Client</th>
                <th>Notes</th>
                <th>Timesheet</th>
                <th>Type</th>
                <th>Status</th>
                <th>Priority </th>
                <th>Due Date</th>
                
                
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ticket): ?>
                <tr>
                    <!-- Make the company name clickable -->
                    <td>
                    <a href="<?= site_url('tickets/' . $ticket['ticket_id']) ?>">     
                    <?= esc($ticket['ticket_comment']) ?></a></td>
                    


                    <td>
                        <a href="<?= site_url('company/' . $ticket['client_id']) ?>">
                            <?= esc($ticket['reg_name']) ?>
                        </a>
                    </td>



                    <td> 
                    <a href="<?= site_url('tickets/add_note/' . $ticket['ticket_id']) ?>">  
                    New </a></td>
                    <td> 
                        
                        <a href="<?= site_url('tickets/add_time/' . $ticket['ticket_id']) ?>">  
                        Add time</a></td>
                    <td>
                        
                    <a href="<?= site_url('tickets/types/' . $ticket['type_id']) ?>"> 
                    <?= esc($ticket['type_desc']) ?></a>
                </td>
                    <td><?= esc($ticket['status_desc']) ?></td>
                    
                    <td>

                       <div class="<?= esc($ticket['priority']) ?>" > <?= esc($ticket['priority']) ?></div>
                    </td>
                    
                       <td><?= esc($ticket['due_date']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            </div>


</body>
</html>
