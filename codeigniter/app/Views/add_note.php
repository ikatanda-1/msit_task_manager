
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
            width: 30%;
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
            width: 97%;
            height: 100px;
            padding: 8px;
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
    </style>
    
</head>
<body>
<?= view('header') ?>
<?= view('left_menu') ?>
    <h1><?= esc($ticket_title) ?></h1>

    <!-- Display error or success messages -->
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red; text-align: center;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green; text-align: center;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <form action="<?= site_url('tickets/store_note') ?>" method="post">
        <input type="hidden" name="ticket_id" value="<?= esc($ticket_id) ?>">
        <label for="comment_desc">Add a Note:</label>
        <textarea id="comment_desc" name="comment_desc" placeholder="Write your note here..." required></textarea>
        <button type="submit">Save Note</button>
    </form>
</body>
</html>
