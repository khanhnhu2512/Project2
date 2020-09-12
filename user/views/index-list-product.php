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
    <link rel="SHORTCUT ICON" href="./library/images/image-bg/LogoN-Black.png">
    <link type="text/css" rel="stylesheet" href="./public/fontawesome-free-5.13.0-web/css/all.css">
    <link type="text/css" rel="stylesheet" href="./public/bootstrap4/bootstrap-4.5.0-dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="./public/css/style.css">
    <script src="./public/jquery/jquery-3.5.1.min.js"></script>

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a href="" class="navbar-brand">
                <img src="./images/image-bg/LogoN-White.png" height="35" alt="" class="d-inline-block align-top"> My store
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
                <div class="btn btn-sm mr-1">
                    <a class="" onclick="redirectLogin()">
                        <i class="fas fa-shopping-cart text-white fa-2x btn-cart"></i>
                    </a>
                </div>
                <!-- login form -->
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
    <div class="container-fluid padding">
        <div class="row welcome text-center pt-5 justify-content-center">
            <div class="col-12 mt-5 mb-5 justify-content-center">
                <h1 class="display-4"><?php echo $_SESSION['category'][0]['name']; ?></h1>
            </div>
            <div class="container padding card-deck fl mt-2">
                <?php foreach ($product as $key => $value) : ?>
                    <div class="col-<?php echo $col; ?> border-0">
                        <a href="index.php?method=detail&id=<?php echo $value['id']; ?>">
                            <img class="card-img-bottom w-auto h-285" src="./library/images/image-product/<?php echo $value['image']; ?>" alt="Card image cap">
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