<?php
include_once 'website/models/users.php';
class C_website extends M_users
{
    public $m_users;
    function __construct()
    {
        $this->m_users = new M_users();
    }

    public function control()
    {
        $method = 'home';
        $page = 1;
        $limit = 4;
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        }
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }


        
    }
} 
    
    // if (!empty($_POST)) {
    //     $email = escape($_POST['email']);
    //     $password = md5($_POST['password']);
    //     user_login($email, $password);
    // }
    
    // if (isset($_SESSION['user'])) {
    //     $user = $_SESSION['user'];
    //     if ($user['RoleId']==1||$user['RoleId']==2){
    //     header('location:admin.php');
    //     }
    // }
