<?php
require_once "../user/model/index.php";
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
                if (!isset($_SESSION['cart-cout'])) {
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
                include_once 'views/index.php';
                break;
            case ('profile'):
                require_once 'views/profile.php';
                break;

            case ('signout'):
                session_unset();
                header("location:../index.php");
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

                require_once('views/list-product.php');
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
                include_once 'views/index.php';

                break;
            case ('list-cart'):
                if (isset($_POST['pay'])) {

                    header('location:index.php?method=pay-now');
                    // echo "ok";
                }
                include_once 'views/list_cart.php';
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
                include_once 'views/product_details.php';
                break;


            case ('change-qty'):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                if (isset($_POST['qty'])){
                    $_SESSION['cart'][$id]['qty'] = $_POST['qty'];
                }
                $_SESSION['cart-total'] = 0;
                foreach ($_SESSION['cart'] as $key => $value) {
                    $_SESSION['cart-total'] += $_SESSION['cart'][$key]['price'];
                }
                $result = array(
                    'total' => $_SESSION['cart-total']
                );
                die (json_encode($result));

                break;
            case ('checkout'):
                // if (isset($_POST['payment'])) {
                //     $_SESSION['payment-method'] = $_POST['payment-method'];
                //     $_SESSION['address'] = $_POST['address'];
                //     $add_order_list = $this->m_users->addOrderList('order_list', $_SESSION['user']['username'], $_SESSION['total-payment'], $_SESSION['address'], $_SESSION['payment-method']);
                //     if ($add_order_list) {
                //         $log = "Successful!";
                //     } else {
                //         $log = "Error!";
                //     }
                //     $order_id = $this->m_users->getOrderId('order_list');
                //     $i = 0;
                //     $count = count(array_keys($_SESSION['cart']));
                //     foreach ($_SESSION['cart'] as $key => $value) {  //giai phap la function addOrderList se tra ve gia tri cua $order_id luon
                //         $add_order_detail = $this->m_users->addOrderDetail('order_detail', $order_id['id_order'], $key, $value['price'], $value['qty']);
                //     }
                // }
                
                $_SESSION['cart-total'] = 0;
                foreach ($_SESSION['cart'] as $key => $value) {
                    $_SESSION['cart-total'] += $_SESSION['cart'][$key]['price'];
                }
                $total = $_SESSION['cart-total'];    
                if(isset($_POST['submit'])){
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
                include_once 'views/checkout.php';
                break;
            case ('payment'):
                echo "<h1>Done</h1>";
                echo "<pre>";
                print_r($_SESSION['cart']);
                $rows = array_count_keys($_SESSION['cart']);
                echo $rows;
                if (isset($_POST['payment'])) {


                    $_SESSION['address'] = $_POST['address'];

                    echo $_SESSION['user']['username'];
                    $add_order = $this->m_users->getEverything_id('order_list', 'username', $_SESSION['user']['username']);

                    $this->m_users->addOrder($_SESSION['user']['username'], 'order_list');
                    $add_order_detail = $this->m_users->addOrderDetail('order_detail', $add_order['id_order'], $_SESSION['total-payment'], $_SESSION['address'], $_SESSION['payment-method']);
                    echo "done";
                    echo "<pre>";
                    print_r($add_order);
                    print_r($this->m_users->addOrder($_SESSION['user']['username'], 'order_list'));
                }
                include_once 'views/pay.php';
                break;





            case ('delete'):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                } else {
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
