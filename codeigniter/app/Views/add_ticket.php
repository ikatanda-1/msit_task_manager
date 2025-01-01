
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Ticket</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
    <style>
        form {
            width: 50%;
            margin: 0 auto;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        select, input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #2ea44f;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #22863a;
        }
        input {
            padding: 8px;
            width: 300px;
        }
        .container {
            max-width: 600px;
            position: relative;
            top: 50px;
        }
        label {
            align-items: center;
        }
        
    </style>
</head>
<body>
<?= view('header') ?>
<?= view('left_menu') ?>
    <div class='container'>
    <h1>New Ticket</h1>
   
    <form action="<?= base_url('tickets/add') ?>" method="post">
        <table >
            <tr>
                <td width='100'><label for="client_name">Client</label></td>
                <td><input type='text' name='client_regname' id='client_regname' required></td>
            </tr>
            <tr>
                <td><label for="interested_name">Contact</label></td>
                <td><input type='text' name='interested_name' id='interested_name' required></td>
            </tr>
            <tr>
                <td><label for="ticket_type">Type</label></td>
                <td><input type='text' name='ticket_type' id='ticket_type' required></td>
            </tr>
            <tr>
                <td><label for="ticket_comment">Comment</label></td>
                <td><input type='text' name='ticket_comment' id='ticket_comment' required></td>
            </tr>
            <tr>
                <td><label for="date_due">Due</label></td>
                <td><input type='date' name='date_due' id='date_due' required></td>
            </tr>
            <tr>
                <td><label for="priority">Priority</label></td>
                <td>
                    
                <?= view('form_component/ticket_priority') ?>
                </td>
            </tr>
            <tr>
                <td><label for="allocated_to">Allocated to</label></td>
                <td><input type='text' name='allocated_to' id='allocated_to' required></td>
            </tr>
            
            <tr><td></td><td> 
        <button type="submit">Add Ticket</button>
        </td></tr>
    </table>
    </form>
    
            </div>
</body>
</html>