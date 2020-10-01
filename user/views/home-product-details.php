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
    <link rel="SHORTCUT ICON" href="../library/images/image-bg/LogoN-Black.png">
    <link rel="stylesheet" href="../public/css/user/home-product-details.css">
    <link type="text/css" rel="stylesheet" href="../public/fontawesome-free-5.13.0-web/css/all.css">
    <link type="text/css" rel="stylesheet" href="../public/bootstrap4/bootstrap-4.5.0-dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="../public/css/style.css">
    <script src="../libs/jquery/jquery-3.5.1.min.js"></script>
    <style>

    </style>
</head>

<body>
    <!-- messenger -->
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v8.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="115832540259102">
    </div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top pad-r-6 pad-l-6">
        <div class="container-fluid p-0">
            <a href="" class="navbar-brand">
                <img src="../library/images/image-bg/LogoN-White.png" height="35" alt="" class="d-inline-block align-top"> My store
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav nav-pills ml-auto mr-auto justify-content-center">
                    <li class="nav-item pr-5">
                        <a class="nav-link text-light" href="index.php?method=home">Home</a>
                    </li>
                    <li class="nav-item pr-5">
                        <a class="nav-link text-light" href="index.php?method=list-product">Product</a>
                    </li>
                    <li class="nav-item pr-5 ">
                        <a class="nav-link text-light" href="#">About Us</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- search -->
            <form method="get" action="">
                <div class="search-form mr-3" id="test">
                    <input type="text" class="form-control form-control-sm search-form-input" name="keyword" id="search-form-input" placeholder="Search...">
                    <button type="submit" class="btn btn-sm search-form-btn" id="search-form-btn">
                        <a href="" class="btn-link ">
                            <i class="fa fa-search "></i>
                        </a>
                    </button>
                    <input type="hidden" name="method" value="search">
                </div>
            </form>
            <!-- cart -->
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
            <!--login form  -->
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
    <div class="container-fluid padding pad-r-6 pad-l-6">
        <nav class="" aria-label="breadcrumb">
            <ol class="breadcrumb bg-white pl-0 mb-0">
                <li class="breadcrumb-item"><a href="index.php?method=home">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php?method=list-product">Product</a></li>
                <li class="breadcrumb-item active aria-current="><a><?php echo $product['name']; ?></a></li>
            </ol>
        </nav>
        <div class="row pt-3">
            <div class="col-7 pb-5 pt-5">
                <div class="row w-100 justify-content-center">
                    <img class="w-50 h-auto" src="./library/images/image-product/<?php echo $product['image']; ?>" alt="">
                </div>
                <div class="row w-100 border-top border-bottom border-grey-bold mt-3">
                    <div class="col-1 border border-grey bg-light rounded p-0 m-3">
                        <img class=" p-2 w-100 h-auto" src="./library/images/image-product/<?php echo $product['image']; ?>" alt="">
                    </div>
                    <div class="col-1 border border-grey bg-light rounded p-0 m-3">
                        <img class=" p-2 w-100 h-auto" src="./library/images/image-product/<?php echo $product['image']; ?>" alt="">
                    </div>
                    <div class="col-1 border border-grey bg-light rounded p-0 m-3">
                        <img class=" p-2 w-100 h-auto" src="./library/images/image-product/<?php echo $product['image']; ?>" alt="">
                    </div>
                    <div class="col-1 border border-grey bg-light rounded p-0 m-3">
                        <img class=" p-2 w-100 h-auto" src="./library/images/image-product/<?php echo $product['image']; ?>" alt="">
                    </div>
                    <div class="col-1 border border-grey bg-light rounded p-0 m-3">
                        <img class=" p-2 w-100 h-auto" src="./library/images/image-product/<?php echo $product['image']; ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-5">
                <h3 class="text-center font-weight-bold"><?php echo $product['name']; ?></h3>
                <table class="table">
                    <div>
                        <p class="font-weight-light"><?php echo $product['description']; ?></p>
                    </div>
                    <p class="font-weight-bold">Technical specifications</p>
                    <tbody>
                        <tr>
                            <th scope="col">#</th>
                            <td scope="col">First</th>
                        </tr>
                        <tr>
                            <th scope="col">#</th>
                            <td scope="col">First</th>
                        </tr>
                        <tr>
                            <th scope="col">#</th>
                            <td scope="col">First</th>
                        </tr>
                    </tbody>
                </table>
                <button type="button" onclick="redirectLogin()" class=" mt-3 btn btn-secondary btn-danger btn-lg btn-block" <?php if ($product['qty'] == 0) {
                                        echo "disabled>Out of stock</button>";
                                    }else{echo ">Add to cart</button>";} ?>
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