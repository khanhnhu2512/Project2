<?php
    include_once 'website/models/users.php';
    class C_website extends M_users
    {
        public $m_users;
        function __construct()
        {
            $this->m_users = new M_users();
        }

        public function control(){
            $method = 'home';
            if (isset($_GET['method'])){
                $method = $_GET['method'];
            }

            switch ($method){
                case('home'):
                    $product = $this->m_users->getProduct();
                    include_once 'website/views/home/index.php';
                break;

                case('login'):  
                    if(!empty($_POST['username']) && !empty($_POST['password'])){
                        $username = ($_POST['username']);
                        $password = ($_POST['password']);
                        if ($this->m_users->login($username,$password)) {
                            $user = $_SESSION['user'];
                            if ($user['lv']==1){
                            header('location:admin/controller/');
                            }
                            else{
                                header('location:users/controller/');
                            }
                        }
                        else{
                            $log = "Tên đăng nhập hoặc mật khẩu không đúng!";
                        }
                    }
                    require_once 'website/views/users/login/index.php';
                break;

                case('signup'):
                    $this->log ="";
                    if(!empty($_POST['fullname']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repassword'])){
                        if($_POST['password']==$_POST['repassword']){
                            $username = $_POST['username'];
                            $fullname = $_POST['fullname'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $this->m_users->signup($username,$fullname,$email,$password);
                            $log = "Đăng ký thành công!";
                        }
                        else{
                            $log = "Nhập lại mật khẩu không khớp!";
                        }
                    }
                    else{
                        $log = "Các trường có dấu * không được để trống!";
                    }
                    require_once 'website/views/users/signup/index.php';
                break;

                
                case('delete'):
                    if (isset($_GET['id'])){
                        $id = $_GET['id'];
                    }
                    else{
                        header("localtion: View/list-nv.php");
                    }
                    $this->model->deleteMember($id);
                    echo "<p>Succesful!</p>";
                break;
                default:
                break;
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
?>