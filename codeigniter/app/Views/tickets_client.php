<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Tickets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .card h3 {
            margin: 0 0 10px;
        }
        .card p {
            margin: 5px 0;
        }
    </style>
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
</head>
<body>
<?= view('header') ?>

<?= view('left_menu') ?>
<div class="container">
    <h1>Tickets</h1>

    <?php if (!empty($tickets)): ?>
        <?php foreach ($tickets as $ticket): ?>
            <div class="card">
                <h3><?= esc($ticket['type_desc']) ?></h3>
                <p><strong>Client Name:</strong> <?= esc($ticket['reg_name']) ?></p>
                <p><strong>Comment:</strong> <?= esc($ticket['ticket_comment']) ?></p>
                <p><strong>Priority:</strong> <?= esc($ticket['priority']) ?></p>
                <p><strong>Status:</strong> <?= esc($ticket['status_desc']) ?></p>
                <p><strong>Date created:</strong> <?= esc($ticket['create_date']) ?></p>
                <p><strong>Due date:</strong> <?= esc($ticket['due_date']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No tickets found for this client.</p>
    <?php endif; ?>
    </div>
</body>
</html>
