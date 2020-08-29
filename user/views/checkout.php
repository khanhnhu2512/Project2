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
    <script type="text/javascript" src="../libs/jquery/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
    <!-- <script src="../libs/jquery/jquery-3.5.1.min.js"></script> -->
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

        .body {
            padding: 1rem;
        }

        .body h1 {
            text-align: center;
        }

        .cart-showtable {
            width: 100%;
            display: flex;
        }

        .cart-showtable .img {
            width: 100px;

        }

        .cart-showtable .img img {
            width: 100%;
            height: auto;
            padding: 0.5rem;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .cart-showtable table tr td {
            font-size: 1rem;
            text-align: center;
        }

        .cart-showtable table tr:first-child td {
            background-color: #000;
            line-height: 50px;
            font-weight: bold;
            font-size: 1.15rem !important;
            text-align: center;
            color: #be1010;
        }

        .cart-showtable-btn {
            width: 150px;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #000;
        }

        .total {
            font-size: 1.75rem;
            margin-right: 11rem;
            margin-top: 1.5rem;
        }

        .total span {
            margin-left: 5rem;
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
                        <a class="nav-link text-light" href="index.php?method=home">Home</a>
                    </li>
                    <li class="nav-item dropdown pr-5">
                        <a class="nav-link dropdown-toggle text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
                        <div class="dropdown-menu">
                            <a href="index.php?method=list-product&type=1" class="dropdown-item">iPhone</a>
                            <a href="index.php?method=list-product&type=2" class="dropdown-item">iPad</a>
                            <a href="index.php?method=list-product&type=3" class="dropdown-item">Macbook</a>
                            <a href="index.php?method=list-product&type=4" class="dropdown-item">AirPods</a>
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
    </nav>
    <div class="body">
        <form action="" method="post" enctype="multipart/form-data">
            <h1 class="mt-4">Check out</h1>
            <h3><?php if(isset($log)){echo $log;} ?></h3>
            <h3 class="mt-5">Your order</h3>
            <div class="cart-showtable ">
                <?php if (isset($_SESSION['cart'])) { ?>
                    <table border="1px" width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="width: 40px">STT</td>
                            <td style="width: 100px">Image</td>
                            <td style="width: 600px">Name</td>
                            <td style="width: 100px">Qty</td>
                            <td>Price</td>
                            <td style="width: 200px">Total</td>
                            <td style="width: 100px"></td>
                        </tr>

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
                                    <input id="qty" name="qty" class="qty" onchange="changeQty(<?php echo $value['id']; ?>)" style="width: 40px; text-align:center; " type="number" name="qty" value="<?php echo $value['qty']; ?>">
                                </td>
                                <td>
                                    <p class="price"><?php echo $value['price']; ?></p>
                                </td>
                                <td>
                                    <p><?php echo ($value['qty'] * $value['price']); ?></p>
                                </td>
                                <td class="btn-btn-group">
                                    <div class="btn btn-danger">
                                        <a class="btn-link" href="index.php?method=delete-cart&id=<?php echo $value['id']; ?>">
                                            Delete
                                        </a>
                                    </div>
                                </td>
                        </tr>

                    <?php } ?>
                <?php
                } else {
                    echo "<h1>Giỏ hàng trống!</h1>";
                }
                ?>
                    </table>
            </div>
            <p class="total">Total:<span id="total-value"><?php echo $total; ?></span>$</p>



            <h3 class="mt-5 ">Your information</h3>
            <div class="form-group col-10 m-auto">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" value="<?php echo (isset($_POST['submit'])) ? $_POST['name'] : ""; ?>" name="name" placeholder="Name..." required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email..." value="<?php echo (isset($_POST['submit'])) ? $_POST['email'] : ""; ?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Phone Number</label>
                    <input type="number" class="form-control " id="number" name="number" placeholder="Phone number..." value="<?php echo (isset($_POST['submit'])) ? $_POST['number'] : ""; ?>" required="">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo (isset($_POST['submit'])) ? $_POST['address'] : ""; ?>" required="">
                </div>
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Payment method</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="method" id="bycast" value="0" checked>
                            <label class="form-check-label" for="bycast">
                                By cast
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="method" id="visa" value="1" <?php echo (isset($_POST['submit']) && $_POST['method']==1) ? "checked" : ""; ?>>
                            <label class="form-check-label" for="visa">
                                Visa
                            </label>
                        </div>
                    </div>
                </div>

                <div class="btn w-100">
                    <input class="btn btn-lg btn-danger" onclick="submit()" name="submit" type="submit" value="Submit">
                </div>
            </div>

        </form>
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
        function reload() {
            location.reload();

        }
        function submit(){
            alert("Done!");
        }
        function changeQty(id) {
            // var qty = document.getElementById('qty').value;
            // var subtotal = document.getElementById('total-value').innerHTML;
            // var url = 'index.php?method=change-qty&id=' + id;
            // console.log(qty);
            // $.ajax({
            //     url: url,
            //     dataType: 'json',
            //     cache: false,
            //     contentType: false,
            //     processData: false,
            //     data: {},
            //     method: 'post',
            //     success: function(result) {
            //         if ($.trim(result.total) != '') {
            //             subtotal = result.total;
            //             console.log(result.total);
            //             document.getElementById('total-value').innerHTML = subtotal;
            //         }
            //     }
            // });
        }

        function addCart() {
            alert("Done!");
        }
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
</body>

</html>