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
                // echo "<pre>";
                // print_r($_SESSION['management_site']);
                $_SESSION['management_site'] = $this->getObject('management_site');
                $_SESSION['management_site'] = $_SESSION['management_site']['0'];
                $product = $this->getEverything_id('product', 'month(create_time)', date('m'));
                $user = $this->getObject('user');
                $order = $this->getEverything_id('order_list', 'month(create_time)', date('m'));
                $total_order = count($order);
                // echo date('m');
                // revenue
                $total_revenue = 0;
                // echo "<pre>";
                // echo 
                // print_r($_SESSION['permission']);
                foreach ($order as $k => $v) {
                    $total_revenue += $v['total_price'];
                }
                // echo $total_revenue;
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

            case ('delete-notification'):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $methodB = $_GET['methodB'];
                    $this->delete('notifications', 'id', $id);
                    header('location:index.php?method=' . $methodB);
                    $_SESSION['noti'] = $this->getEverything_id('notifications', 'lv', $_SESSION['lv']);
                }
                break;
            case ('signout'):
                session_unset();
                header("location:../index.php");
                break;

            case 'category':
                if ($_SESSION['permission']['product_see'] == 1) {
                    $category = $this->getObject('product_category');
                    if (isset($_GET['action'])) {
                        if ($_GET['action'] == 'delete') {
                            $id = $_GET['id'];
                            $this->delete('product_category', 'id', $id);
                            header('location:index.php?method=category');
                        }
                    }
                } else {
                    include_once('views/404.php');
                }

                include_once 'views/category.php';
                break;
            case 'add-category':
                if ($_SESSION['permission']['product_add'] == 1) {
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
                } else {
                    include_once('views/404.php');
                }
                include_once 'views/add-category.php';
                break;
            case 'edit-category':
                if ($_SESSION['permission']['product_edit'] == 1) {
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
                } else {
                    include_once('views/404.php');
                }
                include_once 'views/edit-category.php';
                break;
            case ('profile'):
                require_once 'views/profile.php';
                break;
            case ('custom'):
                if ($_SESSION['permission']['management'] == 1) {
                    $management = $this->getObject('management_site');
                    $banner_img = $this->getObject('management_image_banner');
                    $management = $management[0];
                    // echo "<pre>";
                    // print_r($management);
                    if (isset($_POST['submit'])) {
                        $management = $this->getObject('management_site');
                        $management = $management[0];
                        $banner_img = $this->getObject('management_image_banner');
                        $target_dir = "../library/images/image-bg/";
                        // echo "<pre>";
                        // print_r($management);
                        // options
                        foreach ($management as $k => $v) {
                            if (($k != 'logo_brand') && ($k != 'logo_website')) {
                                $management[$k] = $_POST[$k];
                            } else {
                                if (isset($_FILES['logo_brand'])) {
                                    $image_upload = $_FILES["logo_brand"];
                                    $target_file = $target_dir . basename($_FILES['logo_brand']["name"]);
                                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                    $progress = move_uploaded_file($_FILES["logo_brand"]["tmp_name"], $target_file);
                                    if ((isset($image_upload['name'])) && ($image_upload['name'] != null)) {
                                        $management['logo_brand'] = $image_upload['name'];
                                    }
                                }
                                if (isset($_FILES['logo_website'])) {
                                    $image_upload = $_FILES["logo_website"];
                                    $target_file = $target_dir . basename($_FILES['logo_website']["name"]);
                                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                    $progress = move_uploaded_file($_FILES["logo_website"]["tmp_name"], $target_file);
                                    if ((isset($image_upload['name'])) && ($image_upload['name'] != null)) {
                                        $management['logo_website'] = $image_upload['name'];
                                    }
                                }
                            }
                        }

                        foreach ($management as $k => $v) {
                            $this->editManagement($k, $v);
                        }

                        // banner
                        if (isset($_FILES["banner_img"])) {
                            $attached_files = $_FILES["banner_img"];
                            foreach ($attached_files['name'] as $k => $v) {
                                $target_file = $target_dir . basename($v);
                                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                $progress = move_uploaded_file($attached_files['tmp_name'][$k], $target_file);
                            }
                            $attached_img_update = $attached_files['name'];
                        }
                        foreach ($attached_img_update as $k => $v) {
                            $i = 0;
                            foreach ($banner_img as $key => $value) {
                                if ($v == $value['url']) {
                                    $i++;
                                }
                            }
                            if ($i == 0) {
                                $this->addBanner_img($v);
                            }
                        }
                        header('location:index.php?method=custom');
                    }
                } else {
                    include_once('views/404.php');
                }
                require_once 'views/management.php';
                break;
            case ('list-user'):
                if ($_SESSION['permission']['user_see'] == 1) {
                    $users = $this->getObject("user");
                    $role = $this->getObject('user_level');
                } else {
                    include_once('views/404.php');
                }
                require_once('views/list-user.php');
                break;

            case ('list-order'):
                if ($_SESSION['permission']['order_see'] == 1) {
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
                } else {
                    include_once('views/404.php');
                }
                require_once('views/list-order.php');
                break;
            case ('detail-order'):
                if ($_SESSION['permission']['order_see'] == 1) {
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }
                    $table = 'order_detail';
                    $object = 'id_order';
                    $order_detail = $this->getEverything_id($table, $object, $id);
                    $product = $this->getObject("product");
                    $order_list = $this->getEverything_id('order_list', 'id_order', $id);
                    $order_list = $order_list[0];
                } else {
                    include_once('views/404.php');
                }
                // echo "<pre>";
                // print_r($order_list);
                require_once('views/detail-order.php');
                break;
            case ('detail'):
                if ($_SESSION['permission']['product_see'] == 1) {
                    $table = 'product';
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }
                    $product = $this->getObject_id($table, 'id', $id);
                } else {
                    include_once('views/404.php');
                }
                include_once 'views/product_details.php';
                break;
            case ('notification'):
                if ($_SESSION['permission']['notifications'] == 1) {
                    $role = $this->getObject('user_level');
                    if (isset($_POST['submit'])) {
                        $lv = $_POST['lv'];
                        $content = $_POST['content'];
                        if ($lv == 0) {
                            foreach ($role as $k => $v) {
                                $this->addNotifications($v['id_lv'], $content);
                            }
                        } else {
                            $this->addNotifications($lv, $content);
                        }
                        $log = "<script>alert('Successful!')</script>";
                    }
                } else {
                    include_once('views/404.php');
                }
                include_once 'views/notification.php';
                break;
            case ('list-product'):
                if ($_SESSION['permission']['product_see'] == 1) {
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
                } else {
                    include_once('views/404.php');
                }
                require_once('views/list-product.php');
                break;
            case ('edit-user'):
                if ($_SESSION['permission']['user_edit'] == 1) {
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $_SESSION['id_user'] = $id;
                    }
                    $user = $this->getEverything_id('user', 'id', $id);
                    $user = $user[0];
                    $role = $this->getObject('user_level');
                    // $role = $role[0];
                    // echo "<pre>";
                    // print_r($role);
                    if (isset($_POST['update'])) {
                        $id = $_SESSION['id_user'];
                        $user = $this->getEverything_id('user', 'id', $id);
                        $user = $user[0];
                        $role = $this->getObject('user_level');
                        $lv = $_POST['lv'];
                        $this->editUser($id, $lv);
                        // $log = "Done!";
                        $log = "<script>alert('Successful!')</script>";
                        // header('location:index.php?method=list-user');
                    }
                } else {
                    include_once('views/404.php');
                }
                include_once 'views/edit-user.php';
                break;
            case ('edit-role'):
                if ($_SESSION['permission']['user_edit'] == 1) {
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $_SESSION['id_role'] = $id;
                    }
                    $permission = $this->getObject('user_permissions');
                    $permission = $permission[0];
                    $role = $this->getEverything_id('user_permissions', 'id_lv', $id);
                    $role = $role[0];
                    $role_info = $this->getEverything_id('user_level', 'id_lv', $id);
                    $role_info = $role_info[0];
                    // echo "<pre>";
                    // print_r($role_info);
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        foreach ($role as $k => $v) {
                            if ($k != 'id_lv') {
                                if (isset($_POST[$k])) {
                                    $role[$k] = $_POST[$k];
                                } else {
                                    $role[$k] = 0;
                                }
                            }
                        }
                        foreach ($role as $k => $v) {
                            if ($k != 'id_lv') {
                                $this->editPermission($_SESSION['id_role'], $k, $v);
                            }
                        }
                    }
                } else {
                    include_once('views/404.php');
                }
                include_once 'views/edit-role.php';
                break;
            case ('add-role'):
                if ($_SESSION['permission']['user_add'] == 1) {
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $permission = $this->getObject('user_permissions');
                        $permission = $permission[0];
                        foreach ($permission as $k => $v) {
                            if ($k != 'id_lv') {
                                if (isset($_POST[$k])) {
                                    $permission[$k] = $_POST[$k];
                                } else {
                                    $permission[$k] = 0;
                                }
                            }
                        }
                        echo "<pre>";
                        print_r($permission);
                        $this->addPermission_name($name);
                        $id_lv = $this->getId('user_level', 'id_lv');
                        $id = $id_lv['id_lv'];
                        $this->addPermission_id($id);
                        foreach ($permission as $k => $v) {
                            if ($k != 'id_lv') {
                                $this->editPermission($id, $k, $v);
                            }
                        }
                        header('location:index.php?method=role');
                    }
                } else {
                    include_once('views/404.php');
                }
                include_once 'views/add-role.php';
                break;
            case ('role'):
                if ($_SESSION['permission']['user_see'] == 1) {
                    $permission = $this->getObject('user_permissions');
                    $role = $this->getObject('user_level');
                } else {
                    include_once('views/404.php');
                }
                include_once 'views/role.php';
                break;
            case ('edit-product'):
                if ($_SESSION['permission']['user_edit'] == 1) {
                    $log = null;
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $_SESSION['id'] = $id;
                    }

                    $table = 'product';
                    $object = 'id';
                    $product = $this->getobject_id($table, $object, $id);
                    $_SESSION['product'] = $product;
                    $category = $this->getObject("product_category");
                    $attached_img = $this->getEverything_id('product_images', 'id_product', $id);
                    $type = $product['type'];
                    $category_information = $this->getObject_id('product_category_information', 'id_category', $type);
                    $category_information_name = $this->getObject('product_category_name');
                    $category_information_name = $category_information_name[0];
                    $product_information = $this->getEverything_id('product_information', 'id_product', $id);
                    $product_information = $product_information[0];
                    if (isset($_POST['submit'])) {
                        // $product = $this->getobject_id($table, $object, $_SESSION['id']);   
                        $product = $_SESSION['product'];
                        $category = $this->getObject("product_category");
                        $attached_img = $this->getEverything_id('product_images', 'id_product', $_SESSION['id']);
                        $type = $product['type'];
                        $category_information = $this->getObject_id('product_category_information', 'id_category', $type);
                        $category_information_name = $this->getObject('product_category_name');
                        $category_information_name = $category_information_name[0];
                        $product_information = $this->getEverything_id('product_information', 'id_product', $_SESSION['id']);
                        $product_information = $product_information[0];
                        $table = 'product';
                        $name = $_POST['name'];
                        $target_dir = "../library/images/image-product/";

                        // print_r($product);
                        // echo $_FILES['fileToUpload']["name"];
                        // echo "a ".$_SESSION['image-upload']['name'];
                        // echo $_SESSION['id'];
                        $image = $product['image'];
                        if ((isset($_FILES['fileToUpload'])) && ($_FILES['fileToUpload']["name"] != $product['image'])) {
                            $image_upload = $_FILES["fileToUpload"];
                            $target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                            $progress = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                            if ((isset($image_upload['name'])) && ($image_upload['name'] != null)) {
                                $image = $image_upload['name'];
                            }
                        }
                        // up attached
                        if (isset($_FILES["filesToUpload"])) {
                            $attached_files = $_FILES["filesToUpload"];
                            foreach ($attached_files['name'] as $k => $v) {
                                $target_file = $target_dir . basename($v);
                                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                $progress = move_uploaded_file($attached_files['tmp_name'][$k], $target_file);
                            }
                            $attached_img_update = $attached_files['name'];
                        }

                        $price = $_POST['price'];
                        $qty = $_POST['qty'];
                        $description = $_POST['description'];
                        $this->editProduct($table, $_SESSION['id'], $name, $image, $price, $qty, $description);
                        // echo $image;
                        $product['image'] = $image;

                        // Techical information
                        foreach ($category_information as $k => $v) {
                            if (isset($_POST[$k])) {
                                $category_information[$k] = $_POST[$k];
                            }
                        }
                        // echo "<pre>";
                        // print_r($category_information);
                        foreach ($category_information as $k => $v) {
                            if (($v != null) && ($v != 1) && ($v != 0)) {
                                $this->editProduct_information($id, $k, $v);
                            }
                        }
                        // add atached img
                        if (isset($attached_img_update)) {
                            foreach ($attached_img_update as $k => $v) {
                                $this->addProduct_images($id, $v);
                            }
                        }

                        $log = "<script>alert('Successful!')</script>";
                    }
                } else {
                    include_once('views/404.php');
                }
                include_once 'views/edit-product.php';
                break;

            case ('add-product'):
                if ($_SESSION['permission']['product_add'] == 1) {
                    $log = null;
                    $image = null;
                    $category = $this->getObject('product_category');
                    $type = 0;
                    if (isset($_GET['type'])) {
                        $type = $_GET['type'];
                        $category_information = $this->getObject_id('product_category_information', 'id_category', $type);
                        $category_information_name = $this->getObject('product_category_name');
                        $category_information_name = $category_information_name[0];
                    }
                    if (isset($_POST['submit'])) {
                        $table = 'product';
                        $target_dir = "../library/images/image-product/";
                        // upfile
                        if (isset($_FILES["fileToUpload"])) {
                            $image_upload = $_FILES["fileToUpload"];
                            $target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                            $progress = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                            $image = $image_upload['name'];
                        }
                        // up attached
                        if (isset($_FILES["filesToUpload"])) {
                            $attached_files = $_FILES["filesToUpload"];
                            foreach ($attached_files['name'] as $k => $v) {
                                $target_file = $target_dir . basename($v);
                                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                $progress = move_uploaded_file($attached_files['tmp_name'][$k], $target_file);
                            }
                            $attached_img = $attached_files['name'];
                        }
                        ///
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $qty = $_POST['qty'];
                        $description = $_POST['description'];
                        $this->addProduct($table, $name, $type, $image, $price, $qty, $description);
                        $id_product = $this->getId('product', 'id');
                        // Techical information
                        foreach ($category_information as $k => $v) {
                            if (isset($_POST[$k])) {
                                $category_information[$k] = $_POST[$k];
                            }
                        }
                        // echo "<pre>";
                        // print_r($category_information);
                        $this->addProduct_information($id_product['id']);
                        foreach ($category_information as $k => $v) {
                            if ($v != null) {
                                $this->editProduct_information($id_product['id'], $k, $v);
                            }
                        }
                        // add atached img
                        foreach ($attached_img as $k => $v) {
                            $this->addProduct_images($id_product['id'], $v);
                        }
                        $log = "<script>alert('Successful!')</script>";
                    }
                } else {
                    include_once('views/404.php');
                }
                include_once 'views/add-product.php';
                break;

            case ('delete-user'):
                if ($_SESSION['permission']['user_edit'] == 1) {
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }
                    $table = 'user';
                    $object = 'id';
                    $this->delete($table, $object, $id);
                } else {
                    include_once('views/404.php');
                }
                include_once 'views/list-user.php';
                break;
            case ('delete-product'):
                if ($_SESSION['permission']['product_delete'] == 1) {
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }
                    $table = 'product';
                    $object = 'id';
                    $this->delete($table, $object, $id);
                    $logDelete = true;
                    header('location:index.php?method=list-product');
                    // echo "<script> alert('Deleted!'); </script>";
                } else {
                    include_once('views/404.php');
                }
                include_once 'views/list-product.php';
                break;
            case 'error404':

                break;
            default:
                include_once 'views/404.php';
                break;
        }
    }
}
