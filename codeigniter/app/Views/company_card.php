<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Details</title>
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 50px;
            background-color: #f9f9f9;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card h1 {
            margin-top: 0;
            font-size: 24px;
        }
        .card p {
            margin: 5px 0;
            font-size: 14px;
        }
        .card p span {
            font-weight: bold;
        }
    </style>
    
</head>
<body>
<?= view('header') ?>

<?= view('left_menu') ?>
    <div class="card">
        <h1><?= esc($company->reg_name) ?></h1>
        <p><span>Registration Number:</span> <?= esc($company->reg_no) ?></p>
        <p><span>Address:</span> <?= esc($company->re_address) ?></p>
        <p><span>Type:</span> <?= esc($company->type_desc) ?></p>
        <h3>Contact Person</h3>
        <p><span>Name:</span> <?= esc($company->f_name) ?> <?= esc($company->l_name) ?></p>
        <p><span>Email:</span> <?= esc($company->email_addr) ?></p>
        <p><span>Phone:</span> <?= esc($company->tel_no) ?></p>
        <div class="links">
        <a href="<?= site_url('edit_company/'.$company->id) ?>">Edit</a>
        <a href="<?= site_url('tickets/client/'.$company->id) ?>">Tickets</a>
        <a href="<?= site_url('tickets/create/'.$company->id) ?>">Add ticket</a>
        </div>
    </div>
</body>
</html>
