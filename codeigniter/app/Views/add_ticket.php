
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
    input {
        margin: 5px;
        align: right;
        width: 200px;

    }
    .container_doc{
        max-width: 400px;

    }

    </style>
</head>
<body>
<?= view('header') ?>
<?= view('left_menu') ?>
    <div class='container_doc'>

    
    <form method="post" action="<?= site_url('tickets/addTicket') ?>">
    <label for="user_id">User ID:</label>
    <input type="text" name="user_id" id="user_id" required><br>

    <label for="client_id">Client ID:</label>
    <input type="text" name="client_id" id="client_id" required><br>

    <label for="ticket_type">Ticket Type:</label>
    <input type="text" name="ticket_type" id="ticket_type" required><br>

    <label for="due_date">Due Date:</label>
    <input type="date" name="due_date" id="due_date" required><br>

    <label for="ticket_comment">Comment:</label>
    <textarea name="ticket_comment" id="ticket_comment" required></textarea><br>

    <button type="submit">Add Ticket</button>
</form>

    </div>
</body>
</html>
