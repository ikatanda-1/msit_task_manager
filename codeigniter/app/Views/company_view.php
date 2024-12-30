
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
    <title>Company Tickets</title>
</head>
<body>
<?= view('header') ?>

<?= view('left_menu') ?>

<?= view('company_profile') ?>
    <?php if (!empty($tickets)): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Allocated To</th>
                    <th>Date Due</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $ticket): ?>
                    <tr>
                        <td><?= esc($ticket['type_desc']) ?></td>
                        <td>
                            
                        <a href="<?= site_url('tickets/' . $ticket['ticket_id']) ?>"> 
                        <?= esc($ticket['description']) ?>
                        </a>
                    
                    </td>
                        <td>
                        <a href="<?= site_url('profile/' . $ticket['user_id']) ?>">    
                        <?= esc($ticket['allocated_to']) ?>
                    
                    </td>
                        <td><?= esc($ticket['due_date']) ?></td>
                        <td><?= esc($ticket['notes']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No tickets available for this company.</p>
    <?php endif; ?>
</body>
</html>
