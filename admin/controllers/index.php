<?php
    require_once "../admin/model/index.php";
    class C_website extends M_admin
    {
        public $m_admin;
        function __construct()
        {
            $this->admin = new M_admin();
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
                    $total_page = $this->getPagination($table,$limit);
                    if($page>$total_page) $page=$total_page;  
                    $start=($page-1)*$limit;
                    $product = $this->pagination($table,$start,$limit);
                    
                    //*page
                    require_once 'views/index.php';
                break;
                

                case('logout'):
                    session_unset();
                    header("location:../index.php");
                break;

                case('profile'):
                    require_once 'views/profile.php';          
                break;

                case('list-user'):
                    $_SESSION['users'] = $this->getObject("user");                   
                    require_once ('views/list-user.php');
                break;

                case('list-product'):
                    $_SESSION['product-iphone'] = $this->getObject("product_iphone");
                    require_once ('views/list-product.php');
                break;

                case('display'):
                break;
               
                case('edit-user'):
                    if (isset($_GET['id'])){
                        $id = $_GET['id'];
                    }
                    $table = 'user';
                    $object = 'id';
                    $user = $this->getEverything_id($table,$object,$id);
                    if (isset($_POST['update'])){
                        $fullname = $_POST['fullname'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $lv = $_POST['lv'];
                        $this->editUser($table,$id,$username,$password,$fullname,$email,$lv);
                        $log = "Done!";
                    }
                    
                    
                    include_once 'views/edit-user.php';
                break;

                case('add-product'):
                    $log = null;
                    if (isset($_POST['add'])){
                        if(!empty($_POST['name']) && !empty($_POST['image']) && !empty($_POST['price']) && !empty($_POST['amount']) && !empty($_POST['content'])){
                            $table = 'product_iphone';
                            $name = $_POST['name'];
                            $image = $_POST['image'];
                            $price = $_POST['price'];
                            $amount = $_POST['amount'];
                            $content = $_POST['content'];
                            $this->addProduct($table,$name,$image,$price,$amount,$content);
                            $log="<p>Succesful!</p>";
                        }
                        else{
                            $log="<p>Error!</p>";
                        }
                    }
                    include_once 'views/add-product.php';
                         
                break;

                case('delete-user'):
                    if (isset($_GET['id'])){
                        $id = $_GET['id'];
                    }
                    $table ='user';
                    $object = 'id';
                    $this->delete($table,$object,$id);
                    include_once 'views/list-user.php';
                break;
                default:
                break;
            }

        }
    } 
?>