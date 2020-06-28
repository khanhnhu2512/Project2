<?php
    require_once "../user/model/index.php";
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
                    $table = 'product_iphone';
                    $total_page = $this->m_users->getPagination($table,$limit);
                    if($page>$total_page) $page=$total_page;  
                    $start=($page-1)*$limit;
                    $product = $this->m_users->pagination($table,$start,$limit);
                    
                    //*page
                    include_once 'views/index.php';
                break;
                case('profile'):
                    require_once 'views/profile.php';          
                break;

                case('logout'):
                    session_unset();
                    header("location:../index.php");
                break;

                
                case('add-cart'):
                    $id = isset($_GET['id']) ? $_GET['id'] : "";
                    if(!isset($_SESSION['cart'][$id])){
                        $table = 'product_iphone';
                        $product=$this->getObject_id($id,$table);
                        $_SESSION['cart'][$id]=$product;
                    }
                    
                    if(isset($_SESSION['cart'])){
                            
                            if(isset($_SESSION['cart'][$id])){
                                
                                $_SESSION['cart'][$id]['amount-session']++;
                                
                            }
                            else{
                                $_SESSION['cart'][$id]['amount-session']=1;
                                
                            }
                            header('location:index.php');
                        }
                    else{
                        // $_SESSION['cart'][$id]['amount-session']=1;
                        header('location:index.php');
                        exit();
                    }
                        // include_once 'views/index.php';
                         
                break;
                case('list-cart'): 
                    // $table = 'product_iphone';
                    // $id = isset($_GET['id']) ? $_GET['id'] : ""; 
                    // $product=$this->getObject_id($id,$table);
                    // $_SESSION['cart']=$product;
                    // $_SESSION['cart'][3]['name']=$product['name'];
                    // $_SESSION['cart'][3]['price']=$product['price'];
                    // $_SESSION['cart'][$id]['image']=$product['image'];
                    
                    include_once 'views/list_cart.php';
                break;
                case('delete-cart'):
                    $id = isset($_GET['id']) ? $_GET['id'] : "";
                    if(isset($_SESSION['cart'][$id])){
                        unset($_SESSION['cart'][$id]);
                        // echo "xoa";
                    }
                    include_once 'views/list_cart.php';
                break;

                case('detail-iphone'):
                    $table = 'product_iphone';
                    if (isset($_GET['id'])){
                        $id = $_GET['id'];
                    }
                    $product = $this->m_users->getObject_id($id,$table);
                    include_once 'views/product_details.php';
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
?>