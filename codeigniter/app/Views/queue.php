
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

$current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
echo $current_url;
?>
    </div>
</body>
</html>
