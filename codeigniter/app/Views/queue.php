
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
<?= view('header') ?>
<?= view('left_menu') ?>
    <div class='container_doc'>
This project is actively being developped. Check again later.<P>
<?php


?>


<div id="monthly" style="display: block;">
<h1>Monthly queue</h2>
    
<?php 

/*
foreach ($ticket_types as $ticket_type): ?>
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
                
   
    
    

    <?php endforeach;
     */ 
    ?>


</div>

<div id="bimonthly" style="display: block;">
    
<div class='bimonthly_div'>Odd months

<p>Activities that should be done on <pre>odd</pre> months.
</div>

<div class='bimonthly_div'>Even months
    <p>Activities that should be done on <pre>even</pre> months.
</div>
</div>
    </div>
</body>
</html>
