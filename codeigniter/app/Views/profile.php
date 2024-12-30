<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
    <title>User Profile</title>
</head>
<body>
<?= view('header') ?>

<?= view('left_menu') ?>
<div class="container" style="text-align: left;">
    <h1>User Profile</h1>
    <p><strong>First Name:</strong> <?= esc($user['f_name']) ?></p>
    <p><strong>Middle Name:</strong> <?= esc($user['m_name']) ?></p>
    <p><strong>Last Name:</strong> <?= esc($user['l_name']) ?></p>
    <p><strong>User Type:</strong> <?= esc($user['type_name']) ?></p>
    <p><strong>User Status:</strong> <?= esc($user['status_desc']) ?></p>

    <a href="<?= site_url('edit_profile') ?>">Edit Profile</a>
    </div>
</body>
</html>
