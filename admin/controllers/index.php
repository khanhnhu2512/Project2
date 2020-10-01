<?php
include_once "../admin/model/index.php";
class C_website extends M_admin
{
    public $m_admin;
    function __construct()
    {
        $this->admin = new M_admin();
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


        switch ($method) {
            case ('home'):
                // $table = 'product';
                // $total_page = $this->getPagination($table,$limit);
                // if($page>$total_page) $page=$total_page;  
                // $start=($page-1)*$limit;
                // $product = $this->pagination($table,$start,$limit);
                // SELECT * FROM `order_list` WHERE month(create_time) = '7';
                //*page
                $product = $this->getEverything_id('product', 'month(create_time)', "date('m')");
                $user = $this->getObject('user');
                $order = $this->getEverything_id('order_list', 'month(create_time)', "date('m')");
                $total_order = count($order);
                $total_revenue = 0;
                // echo "<pre>";
                // echo 
                // print_r($order);
                foreach ($order as $k => $v) {
                    $total_revenue += $v['total_price'];
                }
                // tong sp da ban
                $total_product = 0;
                foreach ($order as $k => $v) {
                    $detail_order = $this->getEverything_id('order_detail', 'id_order', $v['id_order']);
                    foreach ($detail_order as $k => $v) {
                        $total_product += $v['qty'];
                    }
                }
                // profit
                $pre_month = date('m') - 1;
                $total_revenue_preMonth = 0;
                $preMonth_order = $this->getEverything_id('order_list', 'month(create_time)', $pre_month);
                foreach ($preMonth_order as $k => $v) {
                    $total_revenue_preMonth += $v['total_price'];
                }
                $profit = $total_revenue - $total_revenue_preMonth;

                // best selled
                $best_selled = $this->OrderByLimit('product', 'sold', 'DESC', '10');
                // mostview
                $most_view = $this->OrderByLimit('product', 'view', 'DESC', '10');
                // customers
                // $customers = 
                // echo $total_product;
                require_once 'views/home.php';
                break;


            case ('signout'):
                session_unset();
                header("location:../index.php");
                break;

            case ('profile'):
                require_once 'views/profile.php';
                break;

            case ('list-user'):
                $_SESSION['users'] = $this->getObject("user");
                require_once('views/list-user.php');
                break;

            case ('list-order'):
                $_SESSION['order'] = $this->getObject("order_list");
                if (isset($_GET['action'])) {
                    $action = $_GET['action'];
                    $id = $_GET['id'];
                    if ($action == 'accept-order') {
                        $this->acceptOrder($id);
                        // update sold
                        // $sold = $this->getSth('sold', $id);
                        // $sold['sold'] += $view['view'];
                        // $updateSold = $this->m_users->updateSth('sold', $sold['sold'], $id);
                        header('location:index.php?method=list-order');
                    }
                    if ($action == 'delete-order') {

                        $this->delete('order_list', 'id_order', $id);
                        $this->delete('order_detail', 'id_order', $id);
                        header('location:index.php?method=list-order');
                    }
                }
                require_once('views/list-order.php');
                break;
            case ('detail-order'):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $table = 'order_detail';
                $object = 'id_order';
                $_SESSION['order-detail'] = $this->getEverything_id($table, $object, $id);
                $_SESSION['product'] = $this->getObject("product");
                require_once('views/detail-order.php');
                break;
            case ('detail'):
                $table = 'product';
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $product = $this->getObject_id($table, 'id', $id);
                include_once 'views/product_details.php';
                break;

            case ('list-product'):
                $product = $this->getObject('product');
                $category = $this->getObject('product_category');

                if (isset($_GET['type'])) {
                    $type = $_GET['type'];
                    $product = $this->getEverything_id('product', 'type', $type);
                    if ($type == 0) {
                        $product = $this->getObject('product');
                    }
                } else {
                    $type = 0;
                }
                if (isset($_GET['sort'])) {
                    $sort = $_GET['sort'];
                    switch ($sort) {
                        case 'new':
                            if ($type == 0) {
                                $product = $this->sort('product', 'create_time', 'DESC');
                            } else {
                                $product = $this->sortWhere('product', 'type', $type, 'create_time', 'DESC');
                            }
                            break;
                        case 'view':
                            if ($type == 0) {
                                $product = $this->sort('product', 'view', 'DESC');
                            } else {
                                $product = $this->sortWhere('product', 'type', $type, 'view', 'DESC');
                            }
                            break;
                        case 'price-desc':
                            if ($type == 0) {
                                $product = $this->sort('product', 'price', 'DESC');
                            } else {
                                $product = $this->sortWhere('product', 'type', $type, 'price', 'DESC');
                            }
                            break;
                        case 'price-asc':
                            if ($type == 0) {
                                $product = $this->sort('product', 'price', 'ASC');
                            } else {
                                $product = $this->sortWhere('product', 'type', $type, 'price', 'ASC');
                            }
                            break;
                    }
                }


                require_once('views/list-product.php');
                break;

            case ('display'):
                break;

            case ('edit-user'):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $table = 'user';
                $object = 'id';
                $user = $this->getEverything_id($table, $object, $id);
                if (isset($_POST['update'])) {
                    $fullname = $_POST['fullname'];
                    $username = $_POST['username'];
                    // $password = $_POST['password'];
                    $email = $_POST['email'];
                    $lv = $_POST['lv'];
                    $this->editUser($table, $id, $username, $fullname, $email, $lv);
                    $log = "Done!";
                    $user['lv'] = $lv;
                }


                include_once 'views/edit-user.php';
                break;
            case ('add-role'):
                include_once 'views/add-role.php';
                break;
            case ('role'):
                $permission = $this->getObject('user_permissions');
                $role = $this->getObject('user_level');

                // echo "<pre>";
                // print_r($permission);
                // echo "<pre>";
                // print_r($role);
                include_once 'views/role.php';
                break;
            case ('edit-product'):
                $log = null;
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $table = 'product';
                $object = 'id';
                $product = $this->getobject_id($table, $object, $id);
                $category = $this->getObject("product_category");
                $_SESSION['image-upload']['name'] = $product['image'];
                // echo "<pre>";
                // print_r($product);
                if (isset($_POST['update-img'])) {
                    $target_dir = "../images/image-product/";
                    $_SESSION['image-upload'] = $_FILES["fileToUpload"];
                    $target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $progress = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                    // $product['image'] = $_SESSION['image-upload']['name'];
                }
                if (isset($_POST['submit'])) {
                    if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['qty']) && !empty($_POST['description'])) {
                        $table = 'product';
                        $name = $_POST['name'];
                        // echo $_FILES['fileToUpload']["name"];
                        // echo "a ".$_SESSION['image-upload']['name'];
                        if (($_FILES['fileToUpload']["name"]) != $_SESSION['image-upload']['name']) {
                            $target_dir = "../images/image-product/";
                            $_SESSION['image-upload'] = $_FILES["fileToUpload"];
                            $target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                            $progress = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                        }


                        $image = $_SESSION['image-upload']['name'];
                        $price = $_POST['price'];
                        $qty = $_POST['qty'];
                        $description = $_POST['description'];
                        $this->editProduct($table, $id, $name, $image, $price, $qty, $description);
                        $log = "<script>alert('Successful!')</script>";
                        $product['image'] = $image;
                        // $log="<p>OK!</p>";
                    } else {
                        $log = "<script>alert('Error!')</script>";
                    }
                }
                include_once 'views/edit-product.php';
                break;

            case ('add-product'):
                $log = null;
                $image = null;
                if (isset($_FILES["fileToUpload"])) {
                    $target_dir = "../images/image-product/";
                    $_SESSION['image-upload'] = $_FILES["fileToUpload"];
                    $target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $progress = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                    $image = $_SESSION['image-upload']['name'];
                }

                // if(isset($_SESSION['image-upload'])){echo " Test".$_SESSION['image-upload']['name'];}
                if (isset($_POST['submit'])) {
                    if (!empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['price']) && !empty($_POST['qty']) && !empty($_POST['description'])) {
                        $table = 'product';
                        // upfile
                        $target_dir = "../images/image-product/";
                        $_SESSION['image-upload'] = $_FILES["fileToUpload"];
                        $target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        $progress = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                        ///
                        $name = $_POST['name'];
                        $image = $_SESSION['image-upload']['name'];
                        $type = $_POST['type'];
                        // echo " Test2 ".$image2;
                        // $image = $_FILES["fileToUpload"]["name"];
                        $price = $_POST['price'];
                        $qty = $_POST['qty'];
                        $description = $_POST['description'];
                        $this->addProduct($table, $name, $type, $image, $price, $qty, $description);
                        $log = "<p>Succesful!</p>";
                    } else {
                        $log = "<p>Error!</p>";
                    }
                }
                include_once 'views/add-product.php';

                break;

            case ('delete-user'):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $table = 'user';
                $object = 'id';
                $this->delete($table, $object, $id);
                include_once 'views/list-user.php';
                break;
            case ('delete-product'):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $table = 'product';
                $object = 'id';
                $this->delete($table, $object, $id);
                $logDelete = true;
                header('location:index.php?method=list-product&type=' . $_SESSION['category'][0][id]);
                // echo "<script> alert('Deleted!'); </script>";
                include_once 'views/list-product.php';

                break;
            default:
                break;
        }
    }
}
