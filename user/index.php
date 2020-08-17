<?php
// session_start();
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['lv'] == 2) {
    include_once '../user/controllers/index.php';
    $website = new C_website();
    $website->control();
}
else{
    header('location:../index.php');
}
?>