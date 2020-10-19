<?php
 //test 
// thuan
 // nhu test may nhu
    if(!isset($_SESSION)){
        session_start();
    }
    include_once 'user/controllers/index.php';
    $website = new C_website();
    $website->control();
?>
<!-- test -->

