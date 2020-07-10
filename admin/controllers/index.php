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

                case('list-order'):
                    $_SESSION['order'] = $this->getObject("order_list");
                    if (isset($_GET['action'])){
                        $action = $_GET['action'];
                        $id = $_GET['id'];
                        if ($action == 'accept-order'){
                            $this->acceptOrder($id);
                            header('location:index.php?method=list-order');
                        }
                        if ($action == 'delete-order'){

                            $this->delete('order_list','id_order',$id);
                            $this->delete('order_detail','id_order',$id);
                            header('location:index.php?method=list-order');
                        }
                    }               
                    require_once ('views/list-order.php');
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
                        $user['lv'] = $lv;
                    }
                    
                    
                    include_once 'views/edit-user.php';
                break;

                case('edit-product'):
                    $log = null;
                    if (isset($_GET['id'])){
                        $id = $_GET['id'];
                    }
                    $table = 'product_iphone';
                    $object = 'id';
                    $product = $this->getEverything_id($table,$object,$id);
                    
                    // print_r($product);
                    if (isset($_POST['update-img'])){
                        $target_dir = "../images/image-product/";
                        $_SESSION['image-upload'] = $_FILES["fileToUpload"];
                        $target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $progress = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                        // $product['image'] = $_SESSION['image-upload']['name'];
                    }
                    if (isset($_POST['edit'])){
                        if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['amount']) && !empty($_POST['content'])){
                            $table = 'product_iphone';
                            $name = $_POST['name'];
                            $image = (isset($_SESSION['image-upload'])) ? $_SESSION['image-upload']['name'] : $product['image'];
                            $price = $_POST['price'];
                            $amount = $_POST['amount'];
                            $content = $_POST['content'];
                            $this->editProduct($table,$id,$name,$image,$price,$amount,$content);
                            $log="<p>Succesful!</p>";
                            $product['image'] = $image; 
                        }
                        else{
                            $log="<p>Error!</p>";
                        }
                    }
                    include_once 'views/edit-product.php';
                break;

                case('add-product'):
                    $log = null;
                    
                    if (isset($_POST['update-img'])){
                        $target_dir = "../images/image-product/";
                        $_SESSION['image-upload'] = $_FILES["fileToUpload"];
                        $target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $progress = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                        // if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        //     echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                        //   } else {
                        //     echo "Sorry, there was an error uploading your file.";
                        //   }
                    }

                    // if(isset($_SESSION['image-upload'])){echo " Test".$_SESSION['image-upload']['name'];}
                    if (isset($_POST['add'])){
                        if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['amount']) && !empty($_POST['content'])){
                            $table = 'product_iphone';
                            $name = $_POST['name'];
                            $image = $_SESSION['image-upload']['name'];
                            // echo " Test2 ".$image2;
                            // $image = $_FILES["fileToUpload"]["name"];
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
                case('delete-product'):
                    if (isset($_GET['id'])){
                        $id = $_GET['id'];
                    }
                    $table ='product_iphone';
                    $object = 'id';
                    $this->delete($table,$object,$id);
                    $logDelete = true;
                    header('location:index.php?method=list-product');
                    // echo "<script> alert('Deleted!'); </script>";
                    include_once 'views/list-product.php';
                    
                break;
                default:
                break;
            }

        }
    } 
?>