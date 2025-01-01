<?php
$session = session();
$userId = $session->get('user_id');

use App\Controllers\UserController;

$userController = new UserController();
$userType = $userController->getUserType();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation with Submenus</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* GitHub Daylight Look and Feel */
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            background-color: #f6f8fa;
            color: #24292f;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        nav.gh_look_and_feel {
            background-color: #ffffff;
            border: 1px solid #d0d7de;
            border-radius: 8px;
            padding: 10px;
            color: #24292f;
            padding-top: 100px;
            width: 120px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        nav.gh_look_and_feel ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav.gh_look_and_feel li {
            margin-bottom: 10px;
        }

        nav.gh_look_and_feel a {
            text-decoration: none;
            color: #24292f;
            font-weight: bold;
            display: block;
            padding: 8px;
            border-radius: 6px;
        }

        nav.gh_look_and_feel a:hover {
            background-color: #f1f8ff;
            color: #0366d6;
        }

        nav.gh_look_and_feel .submenu {
            display: none; /* Initially hide submenus */
            margin-left: 20px; /* Indent submenus */
        }

        nav.gh_look_and_feel .submenu li {
            margin-bottom: 5px;
        }

        nav.gh_look_and_feel .submenu a {
            font-weight: normal;
            margin: 6px;
            color: #24292f;
        }

        nav.gh_look_and_feel .submenu a:hover {
            background-color: #eaeff2;
            color: #0366d6;
        }
    </style>
</head>
<body>
    
    <nav class="gh_look_and_feel">
        <ul>
            <li>
                <a href="#" class="toggle-menu">Tickets</a>
                <ul class="submenu">
                    <li><a href="<?= site_url('/tickets/create') ?>">New ticket</a></li>
                    <li><a href="<?= site_url('tickets/tickets') ?>">My tickets</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="#" class="toggle-menu">Clients</a>
                <ul class="submenu">
                    <li><a href="<?= site_url('new_client') ?>">Add client</a></li>
                    <li><a href="<?= site_url('clients') ?>">View clients</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="toggle-menu">Time</a>
                <ul class="submenu">
                
                    <li><a href="<?= site_url('time/sheet/').$userId ?>">Time sheet</a></li>
                </ul>
            </li>
            <?php if ($userType == 1): ?> 
                <li>
                    <a href="#" class="toggle-menu">Users</a>
                    <ul class="submenu">
                        <li><a href="<?= site_url('users/new') ?>">Add new</a></li>
                        <li><a href="<?= site_url('users') ?>">Users</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <li><a href="#" class="toggle-menu">Queue</a>
                     <ul class="submenu">
                        <li><a href="<?= site_url('events/new') ?>">Add to queue</a></li>
                        <li><a href="<?= site_url('events') ?>">My queues</a></li>
                    </ul>
            </li>
            <li><a href="<?= site_url('/profile/').$userId ?>">Profile</a></li>
            <li><a href="<?= site_url('logout') ?>">Log out</a></li>
        </ul>
    </nav>

    <script>
        $(document).ready(function() {
            // Toggle submenu on parent click
            $('.toggle-menu').click(function(e) {
                e.preventDefault(); // Prevent default anchor behavior
                $(this).next('.submenu').slideToggle(); // Toggle the next submenu
            });
        });
    </script>
</body>
</html>
