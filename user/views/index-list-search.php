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
    <script src="./public/jquery/jquery-3.5.1.min.js"></script>
    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="./public/slick/slick.css" />
    <!-- Add the new slick-theme.css if you want the default styling -->
    <link rel="stylesheet" type="text/css" href="./public/slick/slick-theme.css" />

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
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
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
                    <input type="text" class="form-control form-control-sm search-form-input" value="<?php echo $keyword; ?>" name="keyword" id="search-form-input" placeholder="Search...">
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
    <div class="container-fluid padding pad-l-6 pad-r-6">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-white pl-0 mb-0">
                <li class="breadcrumb-item"><a href="index.php?method=home">Home</a></li>
                <li class="breadcrumb-item active"><a href="index.php?method=list-product">Product</a></li>
            </ol>
        </nav>
        <h3><?php if (count($product) < 1) {
                echo "No results for ";
            } else {
                echo "Results for";
            } ?> "<?php echo $keyword; ?>"</h3>
        <div <?php if (count($product) < 1) {
                    echo "style='height: 50vh;'";
                } ?> class="row welcome text-center pt-2 justify-content-center">
            <div class="col-3 text-left">
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
                        <a class="text-decoration-none a-block-light pl-1" href="index.php?method=list-product&filter=<100"> < 100 USD</a>
                    </li>
                    <li class="list-style-type-none ">
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
                                    <a class="card-link" onclick="redirectLogin()">
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