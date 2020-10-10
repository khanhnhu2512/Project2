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

                // revenue
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
                // echo $total_product;
                // change
                $pre_month = date('m') - 1;
                $total_revenue_preMonth = 0;
                $total_product_preMonth = 0;
                $preMonth_order = $this->getEverything_id('order_list', 'month(create_time)', $pre_month);
                $preMonth_product = $this->getEverything_id('order_detail', 'month(create_time)', $pre_month);
                // product
                foreach ($preMonth_order as $k => $v) {
                    $detail_order = $this->getEverything_id('order_detail', 'id_order', $v['id_order']);
                    foreach ($detail_order as $k => $v) {
                        $total_product_preMonth += $v['qty'];
                    }
                }
                $changeProduct = $total_product - $total_product_preMonth;

                // order
                $total_order_Premonth = count($preMonth_order);
                $changeOrder = $total_order - $total_order_Premonth;

                foreach ($preMonth_order as $k => $v) {
                    $total_revenue_preMonth += $v['total_price'];
                }
                $profit = ($total_revenue / $total_revenue_preMonth) * 100;
                $profit = $profit - 100;
                $profit = number_format($profit, 1);
                // echo $profit;
                // lifetime income
                $totalProduct = $this->getObject('order_list');
                $lifeTime_income = 0;
                foreach ($totalProduct as $k => $v) {
                    $lifeTime_income += $v['total_price'];
                }
                $lifeTime_income = number_format($lifeTime_income);
                $total_revenue = number_format($total_revenue);

                // echo $lifeTime_income;
                // lifetime order
                $totalOrder = $this->getObject('order_list');
                $lifeTime_order = count($totalOrder);

                // best selled
                $best_selled = $this->OrderByLimit('product', 'sold', 'DESC', '5');
                // mostview
                $most_view = $this->OrderByLimit('product', 'view', 'DESC', '5');
                // customers
                // $customers = 
                // echo $total_product;
                require_once 'views/home.php';
                break;


            case ('signout'):
                session_unset();
                header("location:../index.php");
                break;

            case 'category':
                $category = $this->getObject('product_category');
                if (isset($_GET['action'])) {
                    if ($_GET['action'] == 'delete') {
                        $id = $_GET['id'];
                        $this->delete('product_category', 'id', $id);
                        header('location:index.php?method=category');
                    }
                }
                include_once 'views/category.php';
                break;
            case 'add-category':
                $category_name = $this->getObject('product_category_name');
                $category_infomation = $category_name[0];
                // echo "<pre>";
                // print_r($category_infomation);
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $this->addCategory($name);
                    $id_category = $this->getId('product_category', 'id');
                    $this->addCategory_information($id_category['id']);

                    foreach ($category_information as $k => $v) {
                        if (isset($_POST[$k])) {
                            $category_information[$k] = $_POST[$k];
                        } else {
                            $category_information[$k] = 0;
                        }
                    }
                    foreach ($category_information as $k => $v) {
                        $this->editCategory_information($id_category['id'], $k, $v);
                    }

                    header('location:index.php?method=category');
                }
                include_once 'views/add-category.php';
                break;
            case 'edit-category':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $category = $this->getObject_id('product_category', 'id', $id);
                $category_information = $this->getObject_id('product_category_information', 'id_category', $category['id']);
                $category_information_name = $this->getObject('product_category_name');
                $category_information_name = $category_information_name[0];
                // echo "<pre>";
                // print_r($category_information_name);
                if (isset($_POST['submit'])) {
                    if (isset($_POST['name'])) {
                        $name = $_POST['name'];
                        $this->editCategory($id, $name);
                    }
                    foreach ($category_information as $k => $v) {
                        if (isset($_POST[$k])) {
                            $category_information[$k] = $_POST[$k];
                        } else {
                            $category_information[$k] = 0;
                        }
                    }
                    foreach ($category_information as $k => $v) {
                        $this->editCategory_information($id, $k, $v);
                    }
                    header('location:index.php?method=category');
                }

                include_once 'views/edit-category.php';
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
                $category = $this->getObject('product_category');
                if (isset($_GET['type'])) {
                    $type = $_GET['type'];
                    $category_information = $this->getObject_id('product_category_information', 'id_category', $type);
                    $category_information_name = $this->getObject('product_category_name');
                    $category_information_name = $category_information_name[0];
                }

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
                        $price = $_POST['price'];
                        $qty = $_POST['qty'];
                        $description = $_POST['description'];
                        $this->addProduct($table, $name, $type, $image, $price, $qty, $description,);
                        $log = "<p>Succesful!</p>";
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
            case 'error404':
                include_once 'views/404.php';
                break;
            default:
                break;
        }
    }
}
