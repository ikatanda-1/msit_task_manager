
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Client List</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
  <style>
    /* GitHub day-time inspired styling */
    body {
      margin: 0;
      font-family: 'Roboto', sans-serif;
      background-color: #f6f8fa;
      color: #24292f;
    }
    .container {
       
      width: 90%;
      max-width: 960px;
      margin: 40px auto; 
      margin-top: 120px;
      background-color: #ffffff;
      border: 1px solid #d0d7de;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      position: relative; 
      top: 200px;
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    .sort-links {
      margin-bottom: 10px;
      text-align: right;
    }
    .sort-links a {
      color: #0366d6;
      text-decoration: none;
      margin: 0 10px;
    }
    .sort-links a:hover {
      text-decoration: underline;
    }
    .btn-group {
      margin-bottom: 20px;
      text-align: right;
    }
    .btn-group a {
      display: inline-block;
      margin: 0 5px;
      padding: 6px 10px;
      background-color: #2ea44f;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      font-weight: 500;
    }
    .btn-group a:hover {
      background-color: #238636;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 15px;
    }
    th, td {
      border: 1px solid #d0d7de;
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #eaecef;
    }
    .pagination {
      text-align: center;
    }
    .pagination a {
      color: #0366d6;
      text-decoration: none;
      margin: 0 5px;
    }
    .pagination a:hover {
      text-decoration: underline;
    }

    .pagination ul li {
    margin: 0;
    padding: 0;
}

.pagination ul li a {
    display: block; /* Ensure the link fills the li */
    padding: 0 15px; /* Add spacing between links */
    font-size: 14px;
    font-weight: 500;
    text-decoration: none; /* Remove underline */
    color: #24292f; /* Dark text for readability */
    /*line-height: 50px;  Vertically center the text */
}

.pagination ul li a:hover {
    background-color: #eaecef; /* Light hover effect */
    color: #0366d6; /* GitHub-style blue on hover */
    border-radius: 4px; /* Rounded edges on hover */
    text-decoration: none;
}
input[type=text] {
    height: 25px;
    width: 200px;
    margin: 10px;
    border-radius: 4px;
}
  </style>
    

</head>
<body>
<?= view('header') ?>
<?= view('left_menu') ?>
  <div class="container">
    <h1>Client List</h1>
    
    <?php
      // Determine the toggle for ascending/descending
      $toggle_order = ($order === 'ASC') ? 'DESC' : 'ASC';
    ?>
    
    <!-- Sort Links -->
    <div class="sort-links">
      Sort by:
      <a href="<?= site_url('client?sort_by=reg_name&order=' . $toggle_order . '&limit=' . $limit) ?>">
        reg_name
      </a> |
      <a href="<?= site_url('client?sort_by=reg_no&order=' . $toggle_order . '&limit=' . $limit) ?>">
        reg_no
      </a> | 
      <a href="<?= site_url('new_client') ?>">Add client</a>
    </div>

    <!-- Display Limit Buttons -->
    <div class="btn-group">
    <?= view('search_view') ?>

      Show:
      <a href="<?= site_url('client?sort_by='.$sort_by.'&order='.$order.'&limit=15') ?>">15</a>
      <a href="<?= site_url('client?sort_by='.$sort_by.'&order='.$order.'&limit=50') ?>">50</a>
      <a href="<?= site_url('client?sort_by='.$sort_by.'&order='.$order.'&limit=100') ?>">100</a>
    </div>
    <div id="search-results"></div>
    <!-- Client Table -->
    <table>
      <thead>
        <tr>
          <th>Client Name</th>
          <th>Address</th>
          <th>Reg No</th>
        </tr>
      </thead>
      <tbody>
      <?php if (!empty($clients)): ?>
        <?php foreach ($clients as $c): ?>
          <tr>
            <td>
            <a href="<?= site_url('company/' . $c->id) ?>">
            <?= esc($c->reg_name) ?>
        </a>
           </td>
            <td><?= esc($c->re_address) ?></td>
            <td><?= esc($c->reg_no) ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="3">No clients found.</td>
        </tr>
      <?php endif; ?>
      </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="pagination">
      <?= $pager->links() ?>
    </div>
  </div>
</body>
</html>
