<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f6f8fa;
            color: #24292f;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #d0d7de;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #d0d7de;
            border-radius: 6px;
            font-size: 14px;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #2ea44f;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #238636;
        }
        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
    <script>
        function validateForm(event) {
            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;
            const errorElement = document.getElementById('password-error');

            if (password !== passwordConfirmation) {
                event.preventDefault();
                errorElement.textContent = 'Passwords do not match!';
            } else {
                errorElement.textContent = '';
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="<?php echo site_url('auth/register'); ?>" method="post" onsubmit="validateForm(event)">
            <div class="form-group">
                <label for="firstname">First Name <span style="color: red;">*</span></label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="middlename">Middle Name</label>
                <input type="text" id="middlename" name="middlename">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name <span style="color: red;">*</span></label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address <span style="color: red;">*</span></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password <span style="color: red;">*</span></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password <span style="color: red;">*</span></label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                <div id="password-error" class="error"></div>
            </div>
            <div class="form-group">
                <label for="telephone">Telephone Number</label>
                <input type="text" id="telephone" name="telephone">
            </div>
            <div class="form-group">
                <label for="address">Physical Address</label>
                <textarea id="address" name="address" rows="3"></textarea>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>
</body>
</html>
