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
    <link type="text/css" rel="stylesheet" href="./public/fontawesome-free-5.13.0-web/css/all.css">
    <link type="text/css" rel="stylesheet" href="./public/bootstrap4/bootstrap-4.5.0-dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="./public/css/style.css">
    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="./public/slick/slick.css" />
    <!-- Add the new slick-theme.css if you want the default styling -->
    <link rel="stylesheet" type="text/css" href="./public/slick/slick-theme.css" />
    <script src="./public/jquery/jquery-3.5.1.min.js"></script>

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
            <div class="btn btn-sm mr-1">
                <a class="" onclick="redirectLogin()">
                    <i class="fas fa-shopping-cart text-white fa-2x btn-cart"></i>
                </a>
            </div>
            <div class="btn btn-group btn-group-toggle ml-auto form-login " id="form-login ">
                <a class="btn-link" href="index.php?method=login">
                    <div class="btn bg-light mr-2 rounded form-login-btn">Log In</div>
                </a>
                <a class="btn-link" href="index.php?method=signup">
                    <div class="btn btn-light rounded form-login-btn">Sign Up</div>
                </a>
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
            <div class="col-7">
                <div class="slides-for w-100 text-center">
                    <div>
                        <img class="w-100" src="./library/images/image-product/<?php echo $product['image']; ?>" alt="">
                    </div>
                    <?php foreach ($attached_img as $k => $v) { ?>
                        <div>
                            <img class="w-100" src="./library/images/image-product/<?php echo $v['url']; ?>" alt="">
                        </div>

                    <?php } ?>
                </div>
                <div class="slides-nav w-100">
                    <div>
                        <img class="w-50" src="./library/images/image-product/<?php echo $product['image']; ?>" alt="">
                    </div>
                    <?php foreach ($attached_img as $k => $v) { ?>
                        <div>
                            <img class="w-50 border m-2" src="./library/images/image-product/<?php echo $v['url']; ?>" alt="">
                        </div>

                    <?php } ?>
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
                        <?php foreach ($product_information as $k => $v) { ?>
                            <?php if (($k != 'id_product') && ($v != '0')) { ?>
                                <tr>
                                    <th scope="col"><?php echo $product_category_name[$k]; ?></th>
                                    <td scope="col"><?php echo $v; ?></th>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
                <button type="button" onclick="redirectLogin()" class=" mt-3 btn btn-secondary btn-danger btn-lg btn-block" <?php if ($product['qty'] == 0) {
                                                                                                                                echo "disabled>Out of stock</button>";
                                                                                                                            } else {
                                                                                                                                echo ">Add to cart</button>";
                                                                                                                            } ?> </div> </div> </div> <footer>
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
                    <!-- slick -->
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('.slides-for').slick({
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                arrows: false,
                                fade: true,
                                asNavFor: '.slides-nav'
                            });
                            $('.slides-nav').slick({
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                asNavFor: '.slides-for',
                                dots: true,
                                centerMode: true,
                                autoplay: true,
                                autoplaySpeed: 2000,
                                // arrows: false,
                                focusOnSelect: true

                            });
                        });
                    </script>
                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
                    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
                    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
                    <script type="text/javascript" src="./public/slick/slick.js"></script>
</body>

</html>