<?php
require_once "user/model/index.php";
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
        $_SESSION['management_site'] = $this->getObject('management_site');
        $_SESSION['management_site'] = $_SESSION['management_site']['0'];
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        }
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if (!isset($_SESSION['lv'])) { //chua dang nhap
            switch ($method) {
                case ('home'):
                    $product['bestseller'] = $this->OrderBy('product', 'sold', 'DESC');
                    $product['new'] = $this->OrderBy('product', 'create_time', 'DESC');
                    // echo count($product['mostview']);
                    $banner = $this->getObject('management_image_banner');
                    include_once 'user/views/index.php';
                    break;
                case ('search'):
                    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
                    $product = $this->search('product', 'name', $keyword);
                    $category = $this->getObject("product_category");
                    if (isset($_GET['type'])) {
                        $type = $_GET['type'];
                        $product = $this->getEverything_id('product', 'type', $type);
                    } else {
                        $type = 0;
                    }
                    // if (isset($_GET['filter-price'])) {
                    //     $filter_price = $_GET['filter-price'];
                    //     $product = $this->getEverything_id('product', 'type', $type);
                    // } else {
                    //     $type = 0;
                    // }
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
                    include_once('user/views/index-list-search.php');
                    break;
                case ('list-product'):
                    $_SESSION['product'] = $this->getObject("product");
                    $product = $_SESSION['product'];
                    $category = $this->getObject("product_category");
                    if (isset($_GET['type'])) {
                        $type = $_GET['type'];
                        $product = $this->getEverything_id('product', 'type', $type);
                    } else {
                        $type = 0;
                    }
                    if (isset($_GET['filter'])) {
                        $filter = $_GET['filter'];
                        switch ($filter) {
                            case '<100':
                                $product = $this->filter('product', 'price < 100');
                                break;
                            case '100-200':
                                $product = $this->filterAnd('product', 'price >= 100', 'price<200');
                                break;
                            case '200-500':
                                $product = $this->filterAnd('product', 'price >= 200', 'price<500');
                                break;
                            case '500-1000':
                                $product = $this->filterAnd('product', 'price >= 500', 'price<1000');
                                break;
                            case '>1000':
                                $product = $this->filter('product', 'price >= 1000');
                                break;
                        }
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

                    require_once('user/views/index-list-product.php');
                    break;
                case 'error404':
                    include_once 'user/views/404.php';
                    break;
                case ('detail'):
                    $table = 'product';
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }
                    
                    if (isset($_GET['filter'])) {
                        $filter = $_GET['filter'];
                        switch ($filter) {
                            case '<100':
                                $product = $this->filter('product', 'price < 100');
                                break;
                            case '100-200':
                                $product = $this->filterAnd('product', 'price >= 100', 'price<200');
                                break;
                            case '200-500':
                                $product = $this->filterAnd('product', 'price >= 200', 'price<500');
                                break;
                            case '500-1000':
                                $product = $this->filterAnd('product', 'price >= 500', 'price<1000');
                                break;
                            case '>1000':
                                $product = $this->filter('product', 'price >= 1000');
                                break;
                        }
                    }
                    // view
                    $product_information = $this->getEverything_id('product_information', 'id_product', $id);
                    $product_category_name = $this->getObject('product_category_name');
                    $product_category_name = $product_category_name[0];
                    $product_information = $product_information[0];
                    $views = $this->m_users->getSth('view', $id);
                    $views['view']++;
                    $updateViews = $this->m_users->updateSth('view', $views['view'], $id);
                    $product = $this->m_users->getObject_id($id, $table);
                    $attached_img = $this->getEverything_id('product_images','id_product',$id);
                    // echo "<pre>";
                    // print_r($product_information);
                    include_once 'user/views/index-product-details.php';
                    break;
                case ('form-reset'):
                    if (isset($_POST['submit'])) {
                        echo $_SESSION['code'];
                        if ($_POST['code'] == $_SESSION['code']) {
                            $newpass = $_POST['newpass'];
                            $_SESSION['email'];
                            $test = $this->m_users->resetPass($_SESSION['email'], $newpass);
                            echo $test;
                            $log = "Successfull";
                        } else {
                            $log = "Verify code is incorrect!";
                        }
                    }
                    include_once 'user/views/account/resetform.php';
                    break;
                case ('forget-password'):
                    include_once './plugin/mail.php';

                    if (isset($_POST['submit'])) {
                        $mail = $_POST['email'];
                        $_SESSION['email'] = $mail;
                        $check = $this->m_users->checkUser('email', $mail);
                        if ($check == true) {
                            $_SESSION['code'] = rand(100000, 999999);
                            $code = $_SESSION['code'];
                            $sendTo = $mail;
                            mailResetpass($sendTo, $code);
                            header('location:index.php?method=form-reset');
                        } else {
                            $log = "Email does not exist";
                        }
                    }
                    require_once 'user/views/account/forget-pass.php';
                    break;
                case ('login'):
                    if (isset($_POST['submit'])) {
                        if (!empty($_POST['username']) && !empty($_POST['password'])) {
                            $username = ($_POST['username']);
                            $password = ($_POST['password']);
                            // $log="";
                            if ($this->m_users->login($username, $password)) {
                                $user = $_SESSION['user'];
                                if ($user['lv'] != 100) {
                                    $_SESSION['lv'] = $user['lv'];
                                    $_SESSION['noti'] = $this->getEverything_id('notifications', 'lv', $_SESSION['lv']);
                                    $_SESSION['permission'] = $this->getEverything_id('user_permissions', 'id_lv', $_SESSION['lv']);
                                    $_SESSION['permission'] = $_SESSION['permission']['0'];
                                    // echo $_SESSION['lv'];
                                    header('location:/admin/index.php');
                                } else {
                                    $_SESSION['lv'] = 100;
                                    $_SESSION['noti'] = $this->getEverything_id('notifications', 'lv', $_SESSION['lv']);
                                    header('location:/index.php');
                                }
                            } else {
                                $log = "Tên đăng nhập hoặc mật khẩu không đúng!";
                            }
                        }
                    }
                    require_once 'user/views/account/login.php';
                    break;
                case ('checkmail'):
                    if (isset($_POST['email'])) {
                        $email = $_POST['email'];
                        $rs = $this->m_users->checkUser('email', $email);
                        $error = array(
                            'error' => 'success',
                            'username' => '',
                            'email' => ''
                        );
                        if ($rs == 1) {
                            $error['error'] = 'false';
                            $error['email'] = 'Email already exists';
                        }

                        die(json_encode($error));
                    }

                    break;
                case ('checkusername'):
                    if (isset($_POST['username'])) {
                        $username = $_POST['username'];
                        $rs = $this->m_users->checkUser('username', $username);
                        $error = array(
                            'error' => 'success',
                            'username' => '',
                            'email' => ''
                        );
                        if ($rs == 1) {
                            $error['error'] = 'false';
                            $error['username'] = 'Username already exists';
                        }

                        die(json_encode($error));
                    }

                    break;
                case ('signup'):
                    $this->log = "";
                    if (!empty($_POST['fullname']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repassword'])) {
                        if ($_POST['password'] == $_POST['repassword']) {
                            $username = $_POST['username'];
                            $fullname = $_POST['fullname'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $this->m_users->signup($username, $fullname, $email, $password);
                            $log = "Đăng ký thành công!";
                            header('location:index.php');
                        } else {
                            $log = "Nhập lại mật khẩu không khớp!";
                        }
                    } else {
                        $log = "Các trường có dấu * không được để trống!";
                    }
                    require_once 'user/views/account/register.php';
                    break;




                default:
                    header('location:index.php');
                    break;
            }
        } else {
            if ($_SESSION['lv'] == 100) {
                switch ($method) {
                    case ('home'):
                        $product['mostview'] = $this->OrderBy('product', 'view', 'DESC');
                        $product['bestseller'] = $this->OrderBy('product', 'sold', 'DESC');
                        $product['new'] = $this->OrderBy('product', 'create_time', 'DESC');
                        $banner = $this->getObject('management_image_banner');

                        if (!isset($_SESSION['cart-count'])) {
                            $_SESSION['cart-count'] = 0;
                        }
                        if (isset($_SESSION['cart'])) {
                            $_SESSION['cart-total'] = 0;
                            $_SESSION['cart-count'] = count($_SESSION['cart']);
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $_SESSION['cart-total'] += $value['price'] * $value['qty'];
                            }
                            $total = $_SESSION['cart-total'];
                        }

                        // echo "<pre>";
                        // print_r($_SESSION['cart']);
                        //                 echo "<pre>";
                        // print_r($_SESSION['cart-total']);

                        //*page
                        include_once 'user/views/home.php';
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
                    case ('profile'):
                        require_once 'views/profile.php';
                        break;



                    case ('search'):
                        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
                        $product = $this->search('product', 'name', $keyword);
                        $category = $this->getObject("product_category");
                        if (isset($_GET['type'])) {
                            $type = $_GET['type'];
                            $product = $this->getEverything_id('product', 'type', $type);
                        } else {
                            $type = 0;
                        }
                        if (isset($_GET['filter'])) {
                            $filter = $_GET['filter'];
                            switch ($filter) {
                                case '<100':
                                    $product = $this->filter('product', 'price < 100');
                                    break;
                                case '100-200':
                                    $product = $this->filterAnd('product', 'price >= 100', 'price<200');
                                    break;
                                case '200-500':
                                    $product = $this->filterAnd('product', 'price >= 200', 'price<500');
                                    break;
                                case '500-1000':
                                    $product = $this->filterAnd('product', 'price >= 500', 'price<1000');
                                    break;
                                case '>1000':
                                    $product = $this->filter('product', 'price >= 1000');
                                    break;
                            }
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
                        include_once('user/views/home-list-search.php');
                        break;
                    case ('signout'):
                        session_unset();
                        header("location:index.php");
                        break;

                    case ('list-product'):
                        $_SESSION['product'] = $this->getObject("product");
                        $product = $_SESSION['product'];
                        $category = $this->getObject("product_category");
                        if (isset($_GET['type'])) {
                            $type = $_GET['type'];
                            $product = $this->getEverything_id('product', 'type', $type);
                        } else {
                            $type = 0;
                        }
                        if (isset($_GET['filter'])) {
                            $filter = $_GET['filter'];
                            switch ($filter) {
                                case '<100':
                                    $product = $this->filter('product', 'price < 100');
                                    break;
                                case '100-200':
                                    $product = $this->filterAnd('product', 'price >= 100', 'price<200');
                                    break;
                                case '200-500':
                                    $product = $this->filterAnd('product', 'price >= 200', 'price<500');
                                    break;
                                case '500-1000':
                                    $product = $this->filterAnd('product', 'price >= 500', 'price<1000');
                                    break;
                                case '>1000':
                                    $product = $this->filter('product', 'price >= 1000');
                                    break;
                            }
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

                        require_once('user/views/home-list-product.php');
                        break;




                    case ('add-cart'):
                        $id = isset($_GET['id']) ? $_GET['id'] : "";
                        if (!isset($_SESSION['cart'][$id])) {
                            $table = 'product';
                            // echo $id;
                            $product = $this->getObject_id($id, $table);

                            $_SESSION['cart'][$id] = $product;
                            $_SESSION['cart'][$id]['qty'] = 1;
                            $product['cart-count'] = count($_SESSION['cart']);
                        }

                        header('location:index.php');
                        //     exit();
                        // }
                        include_once 'user/views/home.php';

                        break;

                    case ('delete-cart'):
                        $id = isset($_GET['id']) ? $_GET['id'] : "";
                        if (isset($_SESSION['cart'][$id])) {
                            unset($_SESSION['cart'][$id]);
                            // $_SESSION['cart-count'] --;
                            // echo "xoa";
                        }
                        header('location:index.php?method=home');
                        // include_once 'views/index.php';
                        break;

                    case ('detail'):
                        $table = 'product';
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                        }
                        // view
                        $product_information = $this->getEverything_id('product_information', 'id_product', $id);
                        $product_information = $product_information[0];
                        $product_category_name = $this->getObject('product_category_name');
                        $product_category_name = $product_category_name[0];
                        $attached_img = $this->getEverything_id('product_images','id_product',$id);
                        // echo "<pre>";
                        // print_r($product_information);
                        $views = $this->m_users->getSth('view', $id);
                        $views['view']++;
                        $updateViews = $this->m_users->updateSth('view', $views['view'], $id);
                        $product = $this->m_users->getObject_id($id, $table);
                        include_once 'user/views/home-product-details.php';
                        break;


                    case ('change-qty'):
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                        }
                        if (isset($_GET['qty'])) {
                            $_SESSION['cart'][$id]['qty'] = $_GET['qty'];
                        }
                        $_SESSION['cart-total'] = 0;
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $_SESSION['cart-total'] += $_SESSION['cart'][$key]['qty'] * $_SESSION['cart'][$key]['price'];
                        }


                        break;
                    case ('checkout'):
                        // echo "<pre>";
                        // print_r($_SESSION['cart']);

                        include_once './plugin/mail.php';
                        $total = $_SESSION['cart-total'];
                        if (isset($_POST['submit'])) {
                            $fullname = $_POST['name'];
                            $email = $_POST['email'];
                            $number = $_POST['number'];
                            $address = $_POST['address'];
                            $method = $_POST['method'];

                            // check qty
                            $outofstock = 0;
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $qty = $this->m_users->getSth('qty', $value['id']);
                                if ($value['qty'] > $qty['qty']) {

                                    $outofstock++;
                                }
                            }

                            if ($outofstock == 0) {
                                $add_order_list = $this->m_users->addOrderList('order_list', $_SESSION['user']['username'], $fullname, $email, $number, $_SESSION['cart-total'], $address, $method);
                                $order_id = $this->m_users->getOrderId('order_list');
                                // echo "<pre>";
                                // print_r($order_id['id_order']);
                                foreach ($_SESSION['cart'] as $key => $value) {  //giai phap la function addOrderList se tra ve gia tri cua $order_id luon
                                    $add_order_detail = $this->m_users->addOrderDetail('order_detail', $order_id['id_order'], $key, $value['price'], $value['qty']);
                                    // update qty
                                    $qty = $this->m_users->getSth('qty', $value['id']);
                                    $qty['qty'] -= $value['qty'];
                                    $updateQty = $this->m_users->updateSth('qty', $qty['qty'], $value['id']);
                                    // update sold
                                    $sold = $this->m_users->getSth('sold', $value['id']);
                                    $sold['sold'] += $value['qty'];
                                    $updateSold = $this->m_users->updateSth('sold', $sold['sold'], $value['id']);
                                }
                                // send notification
                                $content = 'New order from ' . $fullname;
                                $permission = $this->getObject('user_permissions');
                                foreach ($permission as $k => $v) {
                                    if ($v['notifications'] == 1) {
                                        $this->addNotifications($v['id_lv'], $content);
                                    }
                                }
                                // send mail
                                $sendTo = $email;
                                mailOrder($sendTo, $_SESSION['cart'], $fullname, $email, $number, $address, $total);

                                // log
                                $log = "Done!";
                            } else {
                                $log = "Out of Stock!";
                            }
                        }
                        include_once 'user/views/checkout.php';
                        break;

                    default:
                        include_once 'user/views/404.php';
                        break;
                }
            }
        }
    }
}
