<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 50%;
            border-collapse: collapse; 
            position: relative;
            
            
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .view_users{
            margin: 0 auto;
            position: relative;
            top: 200px;
            margin-top: 100px;
            max-width: 800px;
        }
    </style>
</head>
<body>
<?= view('header') ?>

<?= view('left_menu') ?>
 <div class='view_users'>
    <table>
        <thead><tr>
            <td colspan=8>User List</td></tr>
            <tr>   
                <th>Last Name <a href="<?= site_url('users/asc') ?>">ASC &uarr; </a>
                
                <a href="<?= site_url('users/desc') ?>">DESC
                &darr;</a></th>
                <th>First Name</th>
                <th>Middle Name</th>
                
                <th>Email Address</th>
                <th>Phone</th>
                <th>Physical Address</th>
                <th>User Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                        <a href="<?= site_url('profile/' . $user->user_id) ?>">
                            <?= esc($user->l_name) ?>
                        </a>
                        </td>
                        <td><?= esc($user->f_name) ?></td>
                        <td><?= esc($user->m_name) ?></td>
                        
                        <td><?= esc($user->email_addr) ?></td>
                        <td><?= esc($user->tel_no) ?></td>
                        <td><?= esc($user->physic_address) ?></td>
                        <td><?= esc($user->type_name) ?></td>
                        <td><?= esc($user->status_desc) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
            </div>
</body>
</html>
