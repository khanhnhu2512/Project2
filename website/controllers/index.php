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
            $page = 1;
            $limit = 4;
            if (isset($_GET['method'])){
                $method = $_GET['method'];
            }
            if (isset($_GET['page'])){
                $page = $_GET['page'];
            }

            
            switch ($method){
                case('home'):
                    // $product = $this->m_users->getProduct();
                    //*page
                    // $table = 'product';
                    // $total_page = $this->m_users->getPagination($table,$limit);
                    // if($page>$total_page) $page=$total_page;  
                    // $start=($page-1)*$limit;
                    // $product = $this->m_users->pagination($table,$start,$limit);
                    $_SESSION['type'] = $this->getObject("product_category");
                    $product = array();
                    // echo "<pre>";
                    // print_r($_SESSION['type']);
                    foreach ($_SESSION['type'] as $k =>$val){
                        switch ($val['id']){
                            case '1':
                                $product[$val['id']] = $this->Random('product','type',$val['id'],4);       
                            break;
                            case '2':
                                $product[$val['id']] = $this->Random('product','type',$val['id'],3);       
                            break;
                            case '3':
                                $product[$val['id']] = $this->Random('product','type',$val['id'],2);       
                            break;
                            case '4':
                                $product[$val['id']] = $this->Random('product','type',$val['id'],3);       
                            break;
                        }
                    }
                    // echo "<pre>";
                    // print_r($product);
                    
                    //*page
                    include_once 'website/views/home/index.php';
                break;
                case ('list-product'):
                    $type = $_GET['type'];
                    $_SESSION['category'] = $this->getEverything_id("product_category", "id", $type);
                    // echo "<pre>";
                    // print_r($_SESSION['category']['name']);
                    $_SESSION['product'] = $this->getEverything_id("product", "type", $type);
                    $product = $_SESSION['product'];
                    switch ($_SESSION['category'][0]['id']){
                        case '1':
                            $col = 3;
                        break;
                        case '2':
                            $col = 4;
                        break;
                        case '3':
                            $col = 6;
                        break;
                        case '4':
                            $col = 4;
                        break;
                    }
                    $_SESSION['type'] = $this->getObject("product_category");
                    require_once('website/views/home/list-product.php');
                    break;
                case('detail'):
                    $table = 'product';
                    if (isset($_GET['id'])){
                        $id = $_GET['id'];
                    }
                    $product = $this->m_users->getObject_id($id,$table);
                    include_once 'website/views/home/product_details.php';
                break;
                case('login'): 
                    if(isset($_POST['submit'])){
                        if(!empty($_POST['username']) && !empty($_POST['password'])){
                            $username = ($_POST['username']);
                            $password = ($_POST['password']);
                            // $log="";
                            if ($this->m_users->login($username,$password)) {
                                $user = $_SESSION['user'];
                                if ($user['lv']==1){
                                    $_SESSION['lv']=1;
                                    header('location:/Project1/admin/index.php');
                                }
                                else{
                                    $_SESSION['lv']=2;
                                    header('location:/Project1/user/index.php');
                                }
                            }
                            else{
                                $log = "Tên đăng nhập hoặc mật khẩu không đúng!";
                            }
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


                
                case('cart'):
                    require_once 'website/views/users/login/index.php';
                break;
                default:
                    header('website/home/index.php');
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
