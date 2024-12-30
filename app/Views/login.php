<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
    <style>
            

    </style>
</head>
<body>


   
<div class="container">
        <h2>Login</h2>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>
        <form action="<?= site_url('auth/login') ?>" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button class='btn' type="submit">Log In</button>
        </form>
        <div class="links">
        <a href="<?= site_url('auth/register') ?>">Register</a>
        <a href="<?= site_url('auth/forgot_password') ?>">Forgot Password?</a>
        <a href="<?= site_url('/') ?>">Home</a>
        </div>
    </div>
</body>
</html>
