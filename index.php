<?php 
    session_start();
    include_once 'website/controllers/index.php';
    $website = new C_website();
    $website->control();
?>