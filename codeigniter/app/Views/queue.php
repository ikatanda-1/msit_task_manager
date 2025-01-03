
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
        width: 100%;
        border: solid thin #ccc;
        border-radius: 3px;
        margin: 8px;
    }
    .transition_view {
        transition: opacity 0.5s ease;
    }
    .tag {
        border: solid thin #ccc;
        width: 60px;
        padding: 5px;
        background-color: #ddd;
        border-radius: 5px;
        font-size: 10px;
    }
    .container_doc {
        text-align: left;
        padding: 3px;
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
            <div class='bimonthly_div'><div class='tag'>Odd months +</div>

                    <p>Activities that should be done on odd months.
            </div>

            <div class='bimonthly_div'> <div class='tag'>Even months +</div>
                    <p>Activities that should be done on even months.
            </div>
    </div>
    <div id="biannual" style="display: block;" class='transition_view'>
    <h1>Biannual</h1>

    </div>
    <div id="annual" style="display: block;" class='transition_view'>
    <h1>Annual</h1>
        <div class='tag'>
            Company tax +
        </div>
    </div>
</div>
</body>
</html>
