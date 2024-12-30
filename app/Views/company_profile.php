
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
    <style>
    .company-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        </style>
</head>
<body>

<div class='container'>
    <h1>Company Profile</h1>
    <p><strong>Name:</strong> <?= esc($company->reg_name) ?></p>
<p><strong>Address:</strong> <?= esc($company->re_address) ?></p>
<p><strong>Contact:</strong> <?= esc($company->contact_person) ?></p>

</div>
</body>
</html>
