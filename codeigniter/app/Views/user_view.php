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
            width: 100%;
            border-collapse: collapse;
            
            
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
            
            
            
            
            width: 90%;
      max-width: 900px;
      margin: 40px auto; 
      margin-top: 200px;
      background-color: #ffffff;
      border: 1px solid #d0d7de;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      position: relative; 
      top: 120px;
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
