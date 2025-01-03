
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

    .bimonthly_div{
        width: 300px;
        border-radius: 3px;
    }
    .transition_view {
        transition: opacity 0.5s ease;
    }
    </style>
</head>
<body>
<?= view('header') ?>
<?= view('left_menu') ?>
    <div class='container_doc'>
This project is actively being developped. Check again later.<P>
    <button class='add_to_queue'>Add item</button>
<?php


?>


<div id="monthly" style="display: block;" class='transition_view'>
<h1>Monthly queue</h2>
    



</div>

    <div id="bimonthly" style="display: block;" class='transition_view'>
            <h1>Bi-monthly queue</h1>
            <div class='bimonthly_div'>Odd months

                    <p>Activities that should be done on odd months.
            </div>

            <div class='bimonthly_div'>Even months
                    <p>Activities that should be done on even months.
            </div>
    </div>
</div>
</body>
</html>
