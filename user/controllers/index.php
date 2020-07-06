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
                
                

                case('pay-now'):
                
                    include_once 'views/pay.php';
                break;
                case('payment'):
                    // echo "<h1>Done</h1>";
                    
                    // if(isset($_POST['payment'])){
                        if(isset($_POST['payment'])){ 
                            $_SESSION['payment-method']=$_POST['payment-method']; 
                            $_SESSION['address']=$_POST['address'];
                            $add_order = $this->m_users->getEverything_id('order_list','username',$_SESSION['user']['username']);

                            $this->m_users->addOrder($_SESSION['user']['username'],'order_list');
                            $add_order_detail=$this->m_users->addOrderDetail('order_detail',$add_order['id_order'],$_SESSION['total-payment'],$_SESSION['address'],$_SESSION['payment-method']);
                        } 
                        
                        // $_SESSION['address']=$_POST['address'] ;
                        
                        // echo $_SESSION['user']['username'];
                        // $add_order = $this->m_users->getEverything_id('order_list','username',$_SESSION['user']['username']);

                        // $this->m_users->addOrder($_SESSION['user']['username'],'order_list');
                        // $add_order_detail=$this->m_users->addOrderDetail('order_detail',$add_order['id_order'],$_SESSION['total-payment'],$_SESSION['address'],$_SESSION['payment-method']);
                        // echo "done";
                        // echo "<pre>";
                        // print_r($add_order);
                        // print_r($this->m_users->addOrder($_SESSION['user']['username'],'order_list'));
                    // }
                    include_once 'views/pay.php';
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