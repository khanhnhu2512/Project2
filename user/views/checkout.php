<?php
if (!isset($_SESSION)) {
    session_start();
    echo "<pre>";
    print_r($product_iphone);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My store</title>
    <link rel="SHORTCUT ICON" href="../images/image-bg/LogoN-Black.png">
    <link type="text/css" rel="stylesheet" href="../libs/fontawesome-free-5.13.0-web/css/all.css">
    <link type="text/css" rel="stylesheet" href="../libs/bootstrap4/bootstrap-4.5.0-dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="../libs/css/style.css">
    <script src="../libs/jquery/jquery-3.5.1.min.js"></script>
    <style>
        .profile button:hover {
            background-color: #000 !important;
        }

        .profile .dropdown-item {
            background-color: #000 !important;
            color: #fff !important;
        }

        /* .profile .dropdown-item:hover{
            background-color: #fff !important;
            color: #000 !important;
        } */
        .profile .dropdown-item a {
            text-decoration: none;
            color: #fff !important;
        }

        .profile .dropdown-item a:hover {
            color: #fff !important;
            /* background-color: #fff !important; */
        }

        .profile .btn-dark:hover {
            background-color: #000 !important;
            color: #fff;
        }

        .cart .dropdown-menu {
            /* left: -100%; */
            width: 268px;
            padding: 0.5rem 0 0 0;
        }

        .cart .dropdown-item img {
            width: 20%;
            height: auto;
        }

        .cart .dropdown-item {
            display: flex;
            flex-direction: row;
            padding: 0.25rem 0.5rem !important;
        }

        .cartProduct {
            width: 100%;
            margin-left: 5px;
            display: flex;
            flex-direction: column;
        }

        .cartProduct P {
            font-weight: bold;
            margin: 0;
        }

        .cartProduct-price {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;

        }

        .cartProduct-price p:last-child input {
            width: 50px;
        }

        .cart .btn {
            /* border: 0; */
            border-radius: 0;
        }

        .total {
            padding: 0 0.25rem;
            text-align: end;
            margin-bottom: 0.5rem;
        }

        .total span {
            font-weight: bold;
        }

        .cart .dropdown-item a {
            text-decoration: none;
            width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a href="" class="navbar-brand">
                <img src="../images/image-bg/LogoN-White.png" height="35" alt="" class="d-inline-block align-top"> My store
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav nav-pills ml-auto mr-auto justify-content-center">
                    <li class="nav-item pr-5">
                        <a class="nav-link text-light" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown pr-5">
                        <a class="nav-link dropdown-toggle text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">iPhone</a>
                            <a class="dropdown-item" href="#">iPad</a>
                            <a class="dropdown-item" href="#">Mac</a>
                            <a class="dropdown-item" href="#">AirPods</a>
                        </div>
                    </li>
                    <li class="nav-item pr-5 ">
                        <a class="nav-link text-light" href="#">About Us</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <form method="post">
                <div class="search-form mr-3" id="test">
                    <input type="text" class="form-control form-control-sm search-form-input" id="search-form-input" placeholder="Search...">
                    <button type="submit" class="btn btn-sm search-form-btn" id="search-form-btn">
                        <a href="" class="btn-link ">
                            <i class="fa fa-search "></i>
                        </a>
                    </button>
                </div>
            </form>
            <div class=" dropdown cart mr-1">
                <!-- <i class="fas fa-shopping-cart text-white fa-2x btn-cart"></i> -->
                <button class="btn btn-dark dropdown-toggle border-0" type="button" id="dropdownCart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-shopping-cart text-white fa-2x btn-cart"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownCart">
                    <?php $i = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $i++; ?>
                            <div class="dropdown-item">
                                <img src="../images/image-product/<?php echo $value['image']; ?>" alt="">
                                <div class="cartProduct">
                                    <p><?php echo $value['name']; ?></p>
                                    <div class="cartProduct-price">
                                        <p><?php echo $value['price']; ?>$</p>
                                        <p>x <span>1</span></p>
                                    </div>
                                </div>
                                <a href="index.php?method=delete-cart&id=<?php echo $value['id']; ?>">
                                    <i class="fas fa-times fa-1x"></i>
                                </a>
                            </div>
                            <div class="dropdown-divider"></div>
                        <?php } ?>
                        <p class="total">Total: <span><?php echo $total; ?>$</span></p>
                    <?php } ?>
                    <div class="btn btn-danger w-100">Check out</div>
                </div>

            </div>
            <div class="dropdown profile">
                <button class="btn btn-dark dropdown-toggle border-0" type="button" id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo isset($_SESSION['user']) ? $_SESSION['user']['fullname'] : ""; ?>
                </button>
                <div class="dropdown-menu btn-dark w-100 text-light" aria-labelledby="dropdownProfile">
                    <div class="dropdown-item">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        <a class="link" href="#">Account</a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-item">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <a class="link" href="#">Setting</a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-item">
                        <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
                        <a class="link" href="index.php?method=signout">Sign out</a>
                    </div>
                </div>
            </div>
        </div>


        </div>
    </nav>
    <div>
        <?php if (isset($_SESSION['cart'])) { ?>
            <table border="1px" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="width: 40px">STT</td>
                    <td style="width: 100px">Image</td>
                    <td style="width: 300px">Name</td>
                    <td style="width: 100px">Qty</td>
                    <td>Price</td>
                    <td style="width: 200px">Total</td>
                    <td style="width: 100px"></td>
                </tr>
                <form action="" method="post">
                    <tr>
                        <?php $i = 0;
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $i++; ?>
                            <td style="width: 40px">
                                <?php echo $i; ?>
                            </td>
                            <td class="img">
                                <img src="../images/image-product/<?php echo $value['image']; ?>">
                            </td>
                            <td style="width: 300px">
                                <?php echo ($value['name']); ?>
                            </td>
                            <td style="width: 100px">
                                <input class="qty" style="width: 40px; text-align:center; " type="number" name="qty"  value="<?php echo $value['qty']; ?>">
                            </td>
                            <td>
                                <p class="price"><?php echo $value['price']; ?></p>
                            </td>
                            <td>
                                <p class="total"><?php echo ($value['amount-session'] * $value['price']); ?></p>
                            </td>
                            <td class="btn">
                                <div class="btn-del"><a href="index.php?method=delete-cart&id=<?php echo $value['id']; ?>">Delete</a></div>
                            </td>
                    </tr>

                <?php } ?>

                <tr>
                    <td colspan="5" ;>
                    </td>
                    <td>
                        <p id="subtotal"></p>
                        <?php
                        // $total_final=0;
                        $_SESSION['total'] = 0;
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $_SESSION['total'] += $_SESSION['cart'][$key]['price'] * $_SESSION['cart'][$key]['amount-session'];
                        }
                        ?>
                    </td>
                    <td class="">
                        <div class="btn-pa">
                            <!-- <a href="index.php?method=pay-now"> -->
                            <input type="submit" name="pay" value="Pay Now">
                            <!-- </a> -->
                        </div>
                    </td>
                </tr>
                </form>
            <?php
            if (isset($_POST['pay'])) {
                $_SESSION['cart'][$key]['amount-session'] = $_POST['amount-session' . $key];
            }
        } else {
            echo "<h1>Giỏ hàng trống!</h1>";
        }
            ?>
            </table>
    </div>
    </div>

    <footer>
        <div class="container-fluid padding mt-4">
            <div class="row text-center">
                <div class="col-md-4">
                    <hr class="light">
                    <p>111-222-3333</p>
                    <p>mymail@gmail.com</p>
                    <p>Bach Mai street, Hanoi, Vietnam</p>
                </div>
                <div class="col-md-4">
                    <hr class="light">
                    <h5>Working hours</h5>
                    <p>Monday-Friday: 8am - 5pm</p>
                    <p>Weekend: 8am - 12am</p>
                </div>
                <div class="col-md-4">
                    <hr class="light">
                    <h5>Services</h5>
                    <p>Outsourcing</p>
                    <p>Website development</p>
                    <p>Mobile applications</p>
                </div>
                <div class="col-12 ">
                    <hr class="light-100">
                    <p>Designed with all the love in the world by KhanhNhu2512.</p>
                    <p>Copyright © 2020 KhanhNhu's N-BUY. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>



    <script language="javascript">
        // function redirectLogin() {
        //     alert("You need to login!");
        //     window.location = "index.php?method=login";
        // }

        function addCart() {
            alert("Done!");
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
</body>

</html>



<!DOCTYPE html>
<html>

<!-- <head> -->
<title>N-Buy iPhone</title>
<link rel="SHORTCUT ICON" href="../images/image-bg/icon.ico">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<!-- <script src="https://kit.fontawesome.com/b1d0494dab.js" crossorigin="anonymous"></script> -->
<link href="../libs/fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- <style>
    .product .img {
        width: 50px;
    }

    .product .img img {
        width: 40px;
        height: 40px;
        margin: 10px;
    }

    /* td{
            width: 100px;
        } */
    .product table {
        width: 1024px;
        text-align: center;
    }

    .content-home {
        min-height: 500px;
        text-align: center;
    }

    .content-home .btn-del a {
        text-decoration: none;
        border: 1px solid black;
        padding: 3px;
        border-radius: 3px;
        background-color: cyan;
    }

    .content-home .btn-del a:hover {
        background-color: red;
    }

    .btn-pay {

        line-height: 30px;
    }

    .btn-pay a {

        text-decoration: none;
        border: 1px solid black;
        padding: 3px;
        margin: px;
        border-radius: 3px;
        background-color: cyan;
    }

    .btn-pay a:hover {
        background-color: red;
    }

    .header-profile div:last-child {
        width: 0px;
        margin-left: 0%;
    }

    .cart .icon-cart {
        position: absolute;
        font-size: 18px;
        /*top: 3.5%;*/
        margin-left: 3px;
        margin-top: 5px;
        /* z-index: 1; */
        color: #ffffff;
    }
</style> -->
</head>

<!-- <body>
    <div class="container">
        <div class="header-background">
            <div class="header">
                <a href="index.php">
                    <h1 class="header-name">N-BUY</h1>
                </a>
                <ul>
                    <li class="header-option">
                        <a href="index.php">Homepage</a>
                    </li>
                    <li class="header-option">
                        <a href="about.php">About</a>

                    </li>
                    <li class="header-option">
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
                <div class="input-search">
                    <span class="icon-search">
                        <a href=""><i class="fas fa-search"></i></a>
                    </span>
                    <input placeholder="Search..." type="search" name="search">
                </div>
                <div class="cart">
                    <span class="icon-cart">
                        <a href="index.php?method=list-cart"><i class="fas fa-shopping-cart"></i></a>
                    </span>
                </div>
                <div class="header-profile">
                    <div><?php echo $_SESSION['user']['fullname']; ?></div>
                    <div>
                        <span class="icon-profile">
                            <a href="index.php?method=profile"><i class="fas fa-user"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-home">
            <?php echo (isset($log)) ? "<h2>.$log.</h2>" : ""; ?>
            <div class="product">
                <h3>Products</h3>
                <table border="1px" width="100%" cellpadding="0" cellspacing="0" ;>
                    <tr>
                        <td style="width: 40px">STT</td>
                        <td style="width: 50px">Image</td>
                        <td style="width: 300px">Name</td>
                        <td style="width: 100px">Amount</td>
                        <td>Price</td>
                        <td style="width: 200px">Total</td>
                        <td style="width: 100px"></td>
                    </tr>
                    <?php $i = 0;
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $i++; ?>
                        <tr>

                            <td style="width: 40px">
                                <?php echo $i; ?>
                            </td>
                            <td class="img">
                                <img src="../images/image-product/<?php echo $value['image']; ?>">
                            </td>
                            <td style="width: 300px">
                                <?php echo ($value['name']); ?>
                            </td>
                            <td style="width: 100px">
                                <form action="" method="post">
                                    <input style="width: 40px; text-align:center; " type="number" name="amount-session<?php echo $key; ?>" min="1" value="<?php if (isset($_POST['submit' . $key])) {
                                                                                                                                                                echo $_POST['amount-session' . $key];
                                                                                                                                                            } else {
                                                                                                                                                                echo $value['amount-session'];
                                                                                                                                                            } ?>">
                                    <input style="width: 30px text-align:center;" type="submit" name="submit<?php echo $key; ?>" value="OK">
                                </form>
                                <?php if (isset($_POST['submit' . $key])) {
                                    $_SESSION['cart'][$key]['amount-session'] = $_POST['amount-session' . $key];
                                } ?>
                            </td>
                            <td>
                                <p>$<?php echo $value['price']; ?></p>
                            </td>
                            <td>
                                <p>$<?php echo $value['price'] * $_SESSION['cart'][$key]['amount-session']; ?></p>
                            </td>
                            <td class="btn">
                                <div class="btn-del"><a href="index.php?method=delete-cart&id=<?php echo $value['id']; ?>">Delete</a></div>
                            </td>

                        </tr>
                    <?php } ?>
                </table>
            </div>
            <form method="post" action="">
                <div>
                    <h3>Address</h3>
                    <div class="">
                        <input style="border: 0px;" type="text" name="address" value="<?php if (isset($_SESSION['cart']['address'])) {
                                                                                            echo $_SESSION['cart']['address'];
                                                                                        } ?>">
                    </div>
                </div>
                <div>
                    <h3>Payment method</h3>
                    <div class="">
                        <input type="radio" name="payment-method" value=0 checked>By cast
                        <input type="radio" name="payment-method" value=1>Visa
                    </div>
                </div>
                <div>
                    <div>
                        <p>Total amount of goods: </p>
                        <span>
                            <?php
                            $_SESSION['total'] = 0;
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $_SESSION['total'] += $_SESSION['cart'][$key]['price'] * $_SESSION['cart'][$key]['amount-session'];
                            }
                            echo $_SESSION['total'];
                            ?>
                        </span>
                    </div>
                    <div>
                        <p>Total payment: </p>
                        <span>
                            <?php
                            $_SESSION['total-payment'] = 0;
                            $_SESSION['total-payment'] = $_SESSION['total'];
                            echo $_SESSION['total-payment'];
                            ?>
                        </span>
                    </div>
                    <input type="submit" name="payment" value="Done">
                    <!-- <input type="submit" name="payment" value="Payment"> -->
</div>
</form>
<!-- <a name="payment" href="#">done</a> -->
</div>
<div class="footer-background">
    <div class="footer">
        <ul class="footer-link">
            <li>
                <a href="index.php">Homepage</a>
            </li>
            <li>
                <a href="about.html">About</a>
            </li>
            <li>
                <a href="contact.html">Contact</a>
            </li>
        </ul>
        <p>Designed with all the love in the world by KhanhNhu2512.</p>
        <p>Copyright © 2020 KhanhNhu's N-BUY. All rights reserved.</p>
    </div>
</div>
</div>
</body>

</html>