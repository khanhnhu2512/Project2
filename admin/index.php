<?php 
    // session_start();
    if(!isset($_SESSION)){
        session_start();
    }
    if ($_SESSION['lv'] == 1) {
        include_once '../admin/controllers/index.php';
        $website = new C_website();
        $website->control();
    }
    else{
        header('location:../index.php');
    }
    
?>