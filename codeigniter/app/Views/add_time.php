<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Note</title>
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f8fa;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            width: 50%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #d0d7de;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        textarea {
            width: 98%;
            height: 100px;
            padding: 10px;
            border: 1px solid #d0d7de;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #2ea44f;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #22863a;
        }
        input {
            width: 98%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .notif{
            text-align: center;
            margin-top: 20px;
            color: green;
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;

        }
    </style>
    
</head>
<body>
<?= view('header') ?>
<?= view('left_menu') ?>
    <h1>Add Time</h1>

    <!-- Display error or success messages -->
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red; text-align: center;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green; text-align: center;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <form action="<?= site_url('tickets/store_time') ?>" method="post">
    <label for="comment_desc">Time in decimals:</label>
        <input type='date' name='date_clocked' id='date_clocked' required>
        <input type="hidden" name="ticket_id" value="<?= esc($ticket_id) ?>">
        <input type='hidden' name='user_id' value="<?= esc($session->get('id')) ?>">
        <input type='number' placeholder='0.00' step="0.01" id="time_desc" name="time_desc"  required></textarea>
        <textarea id="comment_time" name="comment_time" placeholder="Enter comment" ></textarea>
        
        <button type="submit">Save time</button>
    </form>
</body>
</html>
