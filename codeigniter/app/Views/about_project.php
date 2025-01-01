<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Ticket</title>
    <link rel="stylesheet" href="<?= base_url('assets/css.css') ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-top: 0;
            font-size: 24px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?= view('header') ?>

<?= view('left_menu') ?>
<div class='form-container'>
<h2>About Our Task Management System</h2>
Welcome to our Task Management System, a robust and intuitive platform designed to streamline task tracking, enhance productivity, and improve team collaboration. Built using CodeIgniter 4 and deployed on a secure Apache server, this system is tailored to meet the needs of businesses, teams, and individuals who aim to optimize their workflows.

<h3>Our Vision</h3>
The Task Management System was created to address the challenges of managing tasks, tracking time, and maintaining accountability in a dynamic work environment. By providing a centralized platform, our goal is to help users stay organized, prioritize effectively, and achieve their goals with efficiency.

<h3>Key Features</h3><ul>
<li>User Authentication</li>Secure login and role-based access control to ensure data privacy and system integrity.
<li>Ticket Management</li>Create, assign, and update tasks with statuses and priority levels for clear accountability.
<li>Client Management</li>Link tasks to specific clients, enabling comprehensive tracking and reporting.
<li>Time Logging</li>Record time spent on tasks and generate detailed timesheets.
<li>Notifications</li>Stay updated with task assignments and status changes.
<li>Reporting Tools</li>Gain insights into productivity, task completion rates, and time utilization.
<li>Customizable Interface</li>: Enjoy an intuitive design with options like dark mode for enhanced usability.

    </ul>
<h2>Technology Behind the System</h2>
The Task Management System is powered by modern web technologies:

<p><strong>Framework</strong>: CodeIgniter 4 for efficient and modular application development.</p>
<p><strong>Database</strong>: MySQL for reliable data storage and management.</p>
<p><strong>Server</strong>: Deployed on an Apache server with WHM and cPanel for secure and scalable hosting.
</p><p><strong>Why Choose Our System?</strong>
Our system simplifies task management by offering an all-in-one solution. Whether you're a small business managing client tasks or a team collaborating on shared projects, the platform is flexible enough to adapt to your needs. With features like detailed reporting, time tracking, and user-friendly navigation, it’s designed to save you time and effort while boosting productivity.

<h3>Future Enhancements</h3>
We are committed to continuous improvement. Planned features include role-based access control for advanced permissions, enhanced reporting tools, and performance metrics to provide deeper insights. Feedback from users will guide the evolution of the system.

Thank you for choosing our Task Management System. Together, let’s achieve more with less effort!
    </div>
    </body>
    </html>