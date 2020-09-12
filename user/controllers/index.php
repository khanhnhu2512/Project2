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
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        }
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if (!isset($_SESSION['lv'])) { //chua dang nhap
            switch ($method) {
                case ('home'):
                    $_SESSION['type'] = $this->getObject("product_category");
                    $product = array();
                    // echo "<pre>";
                    $limit = 4;
                    // print_r($_SESSION['type']);
                    foreach ($_SESSION['type'] as $k => $val) {
                        switch ($val['id']) {
                            case '1':
                                $product[$val['id']] = $this->Random('product', 'type', $val['id'], 8);
                                break;
                            case '2':
                                $product[$val['id']] = $this->Random('product', 'type', $val['id'], 9);
                                break;
                            case '3':
                                $product[$val['id']] = $this->Random('product', 'type', $val['id'], 10);
                                break;
                            case '4':
                                $product[$val['id']] = $this->Random('product', 'type', $val['id'], 9);
                                break;
                        }
                    }

                    // echo "<pre>";
                    // print_r($product);

                    //*page
                    include_once 'user/views/index.php';
                    break;
                case ('list-product'):
                    $type = $_GET['type'];
                    $_SESSION['category'] = $this->getEverything_id("product_category", "id", $type);
                    // echo "<pre>";
                    // print_r($_SESSION['category']['name']);
                    $_SESSION['product'] = $this->getEverything_id("product", "type", $type);
                    $product = $_SESSION['product'];
                    switch ($_SESSION['category'][0]['id']) {
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
                    require_once('user/views/index-list-product.php');
                    break;
                case ('detail'):
                    $table = 'product';
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }
                    $product = $this->m_users->getObject_id($id, $table);
                    include_once 'user/views/index-product-details.php';
                    break;
                case ('login'):
                    if (isset($_POST['submit'])) {
                        if (!empty($_POST['username']) && !empty($_POST['password'])) {
                            $username = ($_POST['username']);
                            $password = ($_POST['password']);
                            // $log="";
                            if ($this->m_users->login($username, $password)) {
                                $user = $_SESSION['user'];
                                if ($user['lv'] == 1) {
                                    $_SESSION['lv'] = 1;
                                    header('location:/Project1/admin/index.php');
                                } else {
                                    $_SESSION['lv'] = 2;
                                    header('location:/Project1/index.php');
                                }
                            } else {
                                $log = "Tên đăng nhập hoặc mật khẩu không đúng!";
                            }
                        }
                    }
                    require_once 'user/views/account/login.php';
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
            if ($_SESSION['lv'] == 2) {
                switch ($method) {
                    case ('home'):
                        $_SESSION['type'] = $this->getObject("product_category");
                        $product = array();
                        foreach ($_SESSION['type'] as $k => $val) {
                            switch ($val['id']) {
                                case '1':
                                    $product[$val['id']] = $this->Random('product', 'type', $val['id'], 4);
                                    break;
                                case '2':
                                    $product[$val['id']] = $this->Random('product', 'type', $val['id'], 3);
                                    break;
                                case '3':
                                    $product[$val['id']] = $this->Random('product', 'type', $val['id'], 2);
                                    break;
                                case '4':
                                    $product[$val['id']] = $this->Random('product', 'type', $val['id'], 3);
                                    break;
                            }
                        }
                        if (!isset($_SESSION['cart-count'])) {
                            $_SESSION['cart-count'] = 0;
                        }
                        if (isset($_SESSION['cart'])) {
                            $_SESSION['cart-total'] = 0;
                            $_SESSION['cart-count'] = count($_SESSION['cart']);
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $_SESSION['cart-total'] += $_SESSION['cart'][$key]['price'];
                            }
                            $total = $_SESSION['cart-total'];
                        }
                        //                 echo "<pre>";
                        // print_r($_SESSION['cart']);

                        //*page
                        include_once 'user/views/home.php';
                        break;
                    case ('profile'):
                        require_once 'views/profile.php';
                        break;

                    case ('signout'):
                        session_unset();
                        header("location:index.php");
                        break;

                    case ('list-product'):
                        $type = $_GET['type'];
                        $_SESSION['category'] = $this->getEverything_id("product_category", "id", $type);
                        // echo "<pre>";
                        // print_r($_SESSION['category']);
                        $_SESSION['product'] = $this->getEverything_id("product", "type", $type);
                        $product = $_SESSION['product'];

                        // echo "<pre>";
                        // print_r($product);+

                        $_SESSION['type'] = $this->getObject("product_category");

                        switch ($_SESSION['category'][0]['id']) {
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
                        if (isset($_SESSION['cart'])) {
                            $total = 0;
                            $_SESSION['cart-count'] = count($_SESSION['cart']);
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $total += $_SESSION['cart'][$key]['price'];
                            }
                        }

                        require_once('user/views/home-list-product.php');
                        break;

                    case ('search'):
                        $keyword = isset($_GET['search']) ? $_GET['search'] : "";
                        $product = $this->search('product','name',$keyword);
                        echo "ok";
                        require_once('user/views/index-list-search.php');
                    break;


                    case ('add-cart'):
                        $id = isset($_GET['id']) ? $_GET['id'] : "";
                        if (!isset($_SESSION['cart'][$id])) {
                            $table = 'product';
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
                        $product = $this->m_users->getObject_id($id, $table);
                        include_once 'user/views/home-product-details.php';
                        break;


                    case ('change-qty'):
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                        }
                        if (isset($_POST['qty'])) {
                            $_SESSION['cart'][$id]['qty'] = $_POST['qty'];
                        }
                        $_SESSION['cart-total'] = 0;
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $_SESSION['cart-total'] += $_SESSION['cart'][$key]['price'];
                        }
                        $result = array(
                            'total' => $_SESSION['cart-total']
                        );
                        die(json_encode($result));

                        break;
                    case ('checkout'):
                        $_SESSION['cart-total'] = 0;
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $_SESSION['cart-total'] += $_SESSION['cart'][$key]['price'];
                        }
                        $total = $_SESSION['cart-total'];
                        if (isset($_POST['submit'])) {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $number = $_POST['number'];
                            $address = $_POST['address'];
                            $method = $_POST['method'];

                            $add_order_list = $this->m_users->addOrderList('order_list', $_SESSION['user']['username'], $_SESSION['cart-total'], $address, $method);
                            $order_id = $this->m_users->getOrderId('order_list');
                            // echo "<pre>";
                            // print_r($order_id['id_order']);
                            foreach ($_SESSION['cart'] as $key => $value) {  //giai phap la function addOrderList se tra ve gia tri cua $order_id luon
                                $add_order_detail = $this->m_users->addOrderDetail('order_detail', $order_id['id_order'], $key, $value['price'], $value['qty']);
                            }
                        }
                        $log = "Done!";
                        include_once 'user/views/checkout.php';
                        break;
                        // case ('payment'):
                        //     echo "<h1>Done</h1>";
                        //     echo "<pre>";
                        //     print_r($_SESSION['cart']);
                        //     $rows = array_count_keys($_SESSION['cart']);
                        //     echo $rows;
                        //     if (isset($_POST['payment'])) {


                        //         $_SESSION['address'] = $_POST['address'];

                        //         echo $_SESSION['user']['username'];
                        //         $add_order = $this->m_users->getEverything_id('order_list', 'username', $_SESSION['user']['username']);

                        //         $this->m_users->addOrder($_SESSION['user']['username'], 'order_list');
                        //         $add_order_detail = $this->m_users->addOrderDetail('order_detail', $add_order['id_order'], $_SESSION['total-payment'], $_SESSION['address'], $_SESSION['payment-method']);
                        //         echo "done";
                        //         echo "<pre>";
                        //         print_r($add_order);
                        //         print_r($this->m_users->addOrder($_SESSION['user']['username'], 'order_list'));
                        //     }
                        //     include_once 'views/pay.php';
                        //     break;
                        // case ('delete'):
                        //     if (isset($_GET['id'])) {
                        //         $id = $_GET['id'];
                        //     } else {
                        //         header("localtion:View/list-nv.php");
                        //     }
                        //     $this->model->deleteMember($id);
                        //     echo "<p>Succesful!</p>";
                        //     break;
                    default:
                        header('location:index.php');
                        break;
                }
            }
        }
    }
}
