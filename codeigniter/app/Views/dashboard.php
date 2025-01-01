<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <title>Task Manager</title>
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
        <!-- jQuery and jQuery UI -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .search-container {
            width: 50%;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input {
            width: 50%;
            height: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type=text] {
    height: 55px;
    width: 300px;
    padding: 5px;
    border-radius: 4px;
}
    </style>
</head>
<body>
    <!-- Your content goes here -->
    <?= view('header') ?>

    <?= view('left_menu') ?>
   
   <?= view('search_view') ?>
</body>
</html>
