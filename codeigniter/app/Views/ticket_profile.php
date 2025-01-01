<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Profile</title>
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
           
        }
        .ticket-container {
            position: absolute;
            width: 60%;
            top: 100px;

            
            padding: 20px;
            
            border: 1px solid #ddd;
            border-radius: 8px;
            
            background-color: #f9f9f9;
        }
        .ticket-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .ticket-info {
            margin-bottom: 15px;
        }
        .ticket-info label {
            font-weight: bold;
            display: inline-block;
            width: 120px;
        }
        .ticket-comments {
            margin-top: 20px;
        }
        .comment {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
        }
    </style>
</head>
<body>
<?= view('header') ?>

<?= view('left_menu') ?>
    <div class="ticket-container">
        <div class="ticket-header">
        <?= esc($ticketDetails[0]->ticket_comment) ?>

        </div>

        <?php if (!empty($ticketDetails)): ?>
            <!-- Assuming $ticketDetails contains at least one record -->
            <div class="ticket-info">
                <label>Date due:</label>
                <span><?= esc($ticketDetails[0]->due_date) ?></span>
            </div>
            <div class="ticket-info">
                <label>Assigned User:</label>
                <span><?= esc($ticketDetails[0]->f_name) ?></span>
            </div>
            <div class="ticket-info">
                <label>Client Name:</label>
                <span><?= esc($ticketDetails[0]->reg_name) ?></span>
            </div>
            <div class="ticket-info">
                <label>Status:</label>
                <span><?= esc($ticketDetails[0]->t_status) ?>
                <a href="<?= site_url('tickets/update_ticket_status/' . $ticketDetails[0]->ticket_id) ?>">[Change]</a>
            </span>
            </div>
            <div class="ticket-info">
                <label>Priority:</label>
                <span><?= esc($ticketDetails[0]->priority) ?>
                
            </span>
            </div>

            <div class="ticket-comments">
                <h3>Notes:</h3>
                <a href="<?= site_url('tickets/add_note/' . $ticketDetails[0]->ticket_id) ?>">Add new note</a>
                <?php foreach ($ticketDetails as $detail): ?>
                    <?php if (!empty($detail->comment_desc)): ?>
                        <div class="comment">
                            <?= "[".esc($detail->create_date)."]".esc($detail->comment_desc) ?>
                        </div>
                    <?php else: ?>
                        <p>No notes available for this ticket.</p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            
<!-- view time for this ticket 
 tm_time.date_clocked as date_clocked,tm_time.hours as hours,tm_time.ticket_comment as comment_time

-->

            <div class="ticket-comments">
                <h3>Time:</h3>
                <a href="<?= site_url('tickets/add_time/' . $ticketDetails[0]->ticket_id) ?>">Add time</a>
                <?php foreach ($ticketTime as $time): ?>
                    <?php if (!empty($time->date_clocked)): ?>
                        <div class="comment">
                            <?= "[".esc($time->date_clocked)."] ".esc($time->comment_time)." Hrs:".esc($time->hours) ?>
                        </div>
                        
                    <?php else: ?>
                        <p>No notes available for this ticket.</p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>                


        <?php else: ?>
            <p>Ticket details not available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
