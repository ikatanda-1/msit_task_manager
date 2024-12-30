
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task manager</title>
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">

    <style>
        /* Style the dropdown container */
        select {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            color: #24292f;
            border: 1px solid #d0d7de;
            border-radius: 6px;
            background-color: #f6f8fa;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Style individual options */
        option {
            padding: 10px;
            font-size: 14px;
            color: #0366d6; /* Text color */
            background-color: #ffffff; /* Background color */
        }
        button {
             padding: 8px;
            font-size: 14px;
            border-radius: 6px;
    
            }
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #d0d7de;
            
        }
        /* Highlight the selected option */
        select:focus option:checked {
            background-color: #eaf5ff;
            color: #0366d6;
        }
      
    </style>
</head>
<body>
    <!-- Your content goes here -->
    <?= view('header') ?>

    <?= view('left_menu') ?>
 
    

    <div class="container">
        <h2>Add New Client</h2>
        
        <?php if (session()->getFlashdata('success')): ?>
            <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>

        <form action="<?= site_url('client/save') ?>" method="post">
            <div class="form-group">
                <label for="client_type_id">Client Type:</label>
                <select id="client_type_id" name="client_type_id" required>
                    <option value="">Select Client Type</option>
                    <?php foreach ($client_types as $type): ?>
                        <option value="<?= $type['type_id'] ?>"><?= esc($type['type_desc']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="reg_name">Registered Name:</label>
                <input type="text" id="reg_name" name="reg_name" required>
            </div>

            <div class="form-group">
                <label for="reg_no">Registration Number:</label>
                <input type="text" id="reg_no" name="reg_no" required>
            </div>

            <div class="form-group">
                <label for="re_address">Registered Address:</label>
                <textarea id="re_address" name="re_address" rows="3" required></textarea>
            </div>

            <button type="submit">Add Client</button>
        </form>
    </div>
</body>
</html>






