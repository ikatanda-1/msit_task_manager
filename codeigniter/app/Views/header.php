<?php
$session = session();
?>
<nav class = 'top-menu'>    
    

    <ul>
        <li><a href="<?= site_url('dash') ?>">Home</a></li>
        <li><a href="<?= site_url('about') ?>">About</a></li>
        <li><a href="<?= site_url('contact') ?>">Contact</a></li>
        
        <li class='li_align_right'> <b>Welcome, <?= esc($session->get('username')) ?></b></li>
    </ul>
   
</nav>

