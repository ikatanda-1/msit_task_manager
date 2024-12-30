<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Ticket Status</title>
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            width: 30%;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .form-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group button {
          
            width: 100%;
            padding: 10px;
            background-color: #2ea44f;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }
        .form-group button:hover {
            
            background-color: #238636;
        }

  

    </style>
</head>
<body>
<?= view('header') ?>

<?= view('left_menu') ?>
    <div class="form-container">
        <div class="form-header">
        Update status

        </div>
        <form method="post" action="<?= site_url('tickets/update_status/' . $ticketId) ?>">
            <div class="form-group">
                <label for="filter_status">Ticket Status:</label>
           
                <?= view('form_component/ticket_status') ?>
            </div>
            <div class="form-group">
                <button type="submit">Update Status</button>
            </div>
        </form>
    </div>
</body>
</html>

