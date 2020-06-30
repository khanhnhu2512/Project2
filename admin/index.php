<?php 
    // session_start();
    if(!isset($_SESSION)){
        session_start();
    }
    include_once '../admin/controllers/index.php';
    $website = new C_website();
    $website->control();
?>