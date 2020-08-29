<?php
if (!isset($_SESSION)) {
    session_start();
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

        .cart button {
            position: relative;
            display: flex;
        }

        .cart button i {
            position: relative;
        }

        .cart button p {
            border-radius: 50%;
            background-color: red;
            width: 26px;
            position: absolute;
            top: -2px;
            right: 7px;
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
                            <a href="index.php?method=list-product&type=1" class="dropdown-item" href="#">iPhone</a>
                            <a href="index.php?method=list-product&type=2" class="dropdown-item" href="#">iPad</a>
                            <a href="index.php?method=list-product&type=3" class="dropdown-item" href="#">Macbook</a>
                            <a href="index.php?method=list-product&type=4" class="dropdown-item" href="#">AirPods</a>
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
                    <p id="cart-count"><?php echo $_SESSION['cart-count']; ?></p>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownCart">
                    <?php $i = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $i++; ?>
                            <div class="dropdown-item">
                                <img class="cart-img" src="../images/image-product/<?php echo $value['image']; ?>" alt="">
                                <div class="cartProduct">
                                    <p class="cart-name"><?php echo $value['name']; ?></p>
                                    <div class="cartProduct-price">
                                        <p class="cart-price"><?php echo $value['price']; ?>$</p>
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
                    <div class="btn btn-danger w-100">
                        <a class="btn-link" href="index.php?method=checkout">Check out</a>
                    </div>
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


    <!-- Body -->
    <div class="container-fluid padding product-detail-body">
        <div class="product-img">
            <h2><?php echo $product['name']; ?></h2>
            <div class="product-img__img">
                <img src="../images/image-product/<?php echo $product['image']; ?>" alt="">
            </div>
        </div>
        <div class="product-info">
            <div class="product-info__info">
                
                <h4>INFORMATION</h4>
                <p class=""><?php echo $product['description']; ?></p>
                <div class="product-info__info-price">
                    <!-- <p class="product-info__info-price-sale">$<?php echo $product['price']; ?> -->
                        <span class="product-info__info-price-sell">$<?php echo $product['price']; ?></span>
                    <!-- </p> -->
                </div>
                <div class="product-info__cart">
                    <div class="btn btn-dark">
                        <a href="index.php?method=add-cart&id=<?php echo $product['id']; ?>" class="">Add to cart</a>
                    </div>
                </div>

            </div>
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
        function redirectLogin() {
            alert("You need to login!");
            window.location = "index.php?method=login";
        }

        function btnSearch() {
            var searchInput = document.getElementById("search-form-input");
            var btn = document.getElementById("search-form-btn");
            if (searchInput.style.opacity == 1) {
                searchInput.style.opacity = '0';
                btn.style.color = 'white';

            } else {
                searchInput.style.opacity = '1';
                btn.style.color = 'black';

            }

            // console.log(searchInput.style);
            var test = document.getElementById("test");
            console.log(searchInput.style.opacity);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
</body>

</html>