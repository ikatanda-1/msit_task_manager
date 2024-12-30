<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
    <title>Time Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .time-container {
            width: 60%;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background-color: #f9f9f9;
            position: relative;
            top: 100px;
        }
        .time-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .filter-form {
            margin-bottom: 20px;
        }
        .filter-form input {
            padding: 5px;
            margin-right: 10px;
        }
        .time-table {
            width: 100%;
            border-collapse: collapse;
        }
        .time-table, .time-table th, .time-table td {
            border: 1px solid #ddd;
        }
        .time-table th, .time-table td {
            padding: 10px;
            text-align: left;
        }
        .time-table th {
            background-color: #f4f4f4;
        }
        button{
            padding: 10px;
            background-color: #2ea44f;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?= view('header') ?>

<?= view('left_menu') ?>
    <div class="time-container">
        <div class="time-header">Time Records</div>

        <!-- Date Filter Form -->
        <form method="get" class="filter-form">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" value="<?= esc($startDate) ?>">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" value="<?= esc($endDate) ?>">
            <button type="submit">Filter</button>
        </form>

        <?php if (!empty($timeData)): ?>
            <table class="time-table">
                <thead>
                    <tr>
                        <th>Date Clocked</th>
                        <th>Client Name</th>
                        <th>Ticket Comment</th>
                        <th>Time Comment</th>
                        <th>Hours</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($timeData as $data): ?>
                        <tr>
                            <td><?= esc($data->date_clocked) ?></td>
                            <td><?= esc($data->reg_name) ?></td>
                            <td><?= esc($data->ticket_comment) ?></td>
                            <td><?= esc($data->time_comment) ?></td>
                            <td><?= esc($data->hours) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No time records found for the selected date range.</p>
        <?php endif; ?>
    </div>
</body>
</html>







