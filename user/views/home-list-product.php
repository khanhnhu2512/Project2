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
    <title><?php echo $_SESSION['management_site']['title_website']; ?></title>
    <link rel="SHORTCUT ICON" href="./library/images/image-bg/<?php echo $_SESSION['management_site']['logo_website']; ?>">
    <link rel="stylesheet" href="./public/css/user/home-list-product.css">
    <link type="text/css" rel="stylesheet" href="./public/fontawesome-free-5.13.0-web/css/all.css">
    <link type="text/css" rel="stylesheet" href="./public/bootstrap4/bootstrap-4.5.0-dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="./public/css/style.css">
    <script src="./public/jquery/jquery-3.5.1.min.js"></script>
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
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top pad-l-6 pad-r-6">
        <div class="container-fluid p-0">
            <a href="" class="navbar-brand">
                <img src="./library/images/image-bg/<?php echo $_SESSION['management_site']['logo_brand']; ?>" height="35" alt="" class="d-inline-block align-top"> <?php echo $_SESSION['management_site']['name_brand']; ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav nav-pills ml-auto mr-auto justify-content-center">
                    <li class="nav-item pr-3">
                        <a class="nav-link text-light" href="index.php?method=home">Home</a> </li>
                    <li class="nav-item pr-3">
                        <a class="nav-link text-light" href="index.php?method=list-product">Product</a>
                    </li>
                    <li class="nav-item pr-3 ">
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
            <!--  -->
            <div class="col-1 text-right mr-1 p-0">
                <button class="btn btn-dark border-0 notice-icon" onclick="collapseNotice()" type="button" id="dropdownNoti">
                    <i class="fas fa-bell text-white fa-2x btn-cart"></i>
                </button>
                <div class="nav-notice" style="top: 50px;left: -31px;">
                    <?php $i = 0;
                    if (isset($_SESSION['noti'])) {
                        foreach ($_SESSION['noti'] as $key => $value) {
                    ?>
                            <div class="m-0 dropdown-divider"></div>
                            <div class="row m-0 text-left align-content-center p-0">
                                <div class="text-dark col-10">
                                    <p class="cart-name mt-2 mb-2 "><?php echo $value['content']; ?></p>
                                </div>
                                <a class="col p-0 m-0 flex-center text-decoration-none" href="index.php?method=delete-notification&methodB=<?php echo $method; ?>&id=<?php echo $value['id']; ?>">
                                    <i class="fas fa-times fa-1x"></i>
                                </a>
                            </div>
                            <div class="m-0 dropdown-divider"></div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
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
                                <img class="cart-img" src="./library/images/image-product/<?php echo $value['image']; ?>" alt="">
                                <div class="cartProduct">
                                    <p class="cart-name"><?php echo $value['name']; ?></p>
                                    <div class="cartProduct-price">
                                        <p class="cart-price"><?php echo $value['price']; ?>$</p>
                                        <p>x <span><?php echo $value['qty']; ?></span></p>
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
                        <a class="btn-link btn-block" href="index.php?method=checkout">Check out</a>
                    </div>
                </div>
            </div>
            <!-- profile -->
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



    <!-- Body -->
    <div class="container-fluid padding pad-l-6 pad-r-6">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-white pl-0 mb-0">
                <li class="breadcrumb-item"><a href="index.php?method=home">Home</a></li>
                <li class="breadcrumb-item active"><a href="index.php?method=list-product">Product</a></li>
            </ol>
        </nav>
        <div class="row welcome text-center pt-2 justify-content-center">
            <div class="col-3 text-left border-right border-grey">
                <h3>Category</h3>
                <ul>
                    <?php foreach ($category as $key => $value) { ?>
                        <li class="list-style-type-none ">
                            <a class="text-decoration-none a-block-light pl-1" href="index.php?method=list-product&type=<?php echo $value['id']; ?>">> <?php echo $value['name']; ?></a>
                        </li>
                    <?php } ?>
                </ul>
                <h3>Filter</h3>
                <h5 class="mt-3">Price</h5>
                <ul>
                    <li class="list-style-type-none ">
                        <a class="text-decoration-none a-block-light pl-1" href="index.php?method=list-product&filter=<100">
                            < 100 USD</a> </li> <li class="list-style-type-none ">
                                <a class="text-decoration-none a-block-light pl-1" href="index.php?method=list-product&filter=100-200"> 100 - 200 USD</a>
                    </li>
                    <li class="list-style-type-none ">
                        <a class="text-decoration-none a-block-light pl-1" href="index.php?method=list-product&filter=200-500"> 200 - 500 USD</a>
                    </li>
                    <li class="list-style-type-none ">
                        <a class="text-decoration-none a-block-light pl-1" href="index.php?method=list-product&filter=500-1000"> 500 - 1000 USD</a>
                    </li>
                    <li class="list-style-type-none ">
                        <a class="text-decoration-none a-block-light pl-1" href="index.php?method=list-product&filter=>1000"> > 1000 USD</a>
                    </li>
                </ul>
            </div>
            <div class="col-9">
                <div class="row pb-2 text-left justify-content-between">
                    <div class="col text-right">
                        <label for="sort">Sort by </label>
                        <select onchange="location.href=this.value" class="" name="" id="sort">
                            <option value="index.php?method=list-product<?php if (isset($type)) {
                                                                            echo "&type=$type";
                                                                        } ?>&sort=new" <?php if (isset($_GET['sort'])) {
                                                                                            echo ($_GET['sort'] == 'new') ? "selected" : "";
                                                                                        } ?>>New</option>
                            <option value="index.php?method=list-product<?php if (isset($type)) {
                                                                            echo "&type=$type";
                                                                        } ?>&sort=view" <?php if (isset($_GET['sort'])) {
                                                                                            echo ($_GET['sort'] == 'view') ? "selected" : "";
                                                                                        } ?>>View</option>
                            <option value="index.php?method=list-product<?php if (isset($type)) {
                                                                            echo "&type=$type";
                                                                        } ?>&sort=price-desc" <?php if (isset($_GET['sort'])) {
                                                                                                    echo ($_GET['sort'] == 'price-desc') ? "selected" : "";
                                                                                                } ?>>Price (Desc)</option>
                            <option value="index.php?method=list-product<?php if (isset($type)) {
                                                                            echo "&type=$type";
                                                                        } ?>&sort=price-asc" <?php if (isset($_GET['sort'])) {
                                                                                                    echo ($_GET['sort'] == 'price-asc') ? "selected" : "";
                                                                                                } ?>>Price (Asc)</option>
                        </select>
                    </div>

                </div>
                <div class="container padding card-deck fl m-0 p-0">
                    <?php foreach ($product as $key => $value) : ?>
                        <div class="col-4">
                            <a href="index.php?method=detail&id=<?php echo $value['id']; ?>">
                                <img class="card-img-bottom w-auto h-285 bg-light p-2" src="./library/images/image-product/<?php echo $value['image']; ?>" alt="Card image cap">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $value['name']; ?></h4>
                                <h5 class="card-title">Starting at $<span><?php echo $value['price']; ?></h5>
                                <div class="card-title">
                                    <a class="card-link" href="index.php?method=add-cart&id=<?php echo $value['id']; ?>">
                                        <i class="fa fa-cart-plus fa-2x"></i>
                                    </a>
                                </div>
                                <a class="card-link" href="index.php?method=detail&id=<?php echo $value['id']; ?>">Learn more ></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
    <footer>
        <div class="container-fluid padding mt-4">
            <div class="row text-center">
                <div class="col-md-4">
                    <hr class="light">
                    <p><?php echo $_SESSION['management_site']['footer_information_left']; ?></p>
                </div>
                <div class="col-md-4">
                    <hr class="light">
                    <p><?php echo $_SESSION['management_site']['footer_information_center']; ?></p>
                </div>
                <div class="col-md-4">
                    <hr class="light">
                    <p><?php echo $_SESSION['management_site']['footer_information_right']; ?></p>
                </div>
                <div class="col-12 ">
                    <hr class="light-100">
                    <p><?php echo $_SESSION['management_site']['footer_information_bottom']; ?></p>
                </div>
            </div>
        </div>
    </footer>


    <script>
        var isProductOpened = false;

        function collapse(i) {
            const childMenu = document.querySelectorAll('.child-menu');
            if (!isProductOpened) {
                childMenu[i].classList.add('child-menu--active');
                isProductOpened = true;
            } else if (isProductOpened) {
                childMenu[i].classList.remove('child-menu--active');
                isProductOpened = false;
            }


        }
        var isProductOpenedNotice = false;

        function collapseNotice() {
            // notice bell

            console.log(isProductOpenedNotice);
            const notice_icon = document.querySelector('.notic-icon');
            const nav_notice = document.querySelector('.nav-notice');
            if (!isProductOpenedNotice) {
                nav_notice.classList.add('nav-notice-active');
                isProductOpenedNotice = true;
            } else if (isProductOpenedNotice) {
                nav_notice.classList.remove('nav-notice-active');
                isProductOpenedNotice = false;
            }
        }
    </script>
    <script language="javascript">
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