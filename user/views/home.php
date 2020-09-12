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
    <link rel="SHORTCUT ICON" href="./library/images/image-bg/LogoN-Black.png">
    <link type="text/css" rel="stylesheet" href="./public/fontawesome-free-5.13.0-web/css/all.css">
    <link rel="stylesheet" href="./public/css/user/home.css">
    <link type="text/css" rel="stylesheet" href="./public/bootstrap4/bootstrap-4.5.0-dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="./public/css/style.css">
    <script type="text/javascript" src="./public/jquery/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
    <!-- <script src="../libs/jquery/jquery-3.5.1.min.js"></script> -->
    <style>

    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a href="" class="navbar-brand">
                <img src="./library/images/image-bg/LogoN-White.png" height="35" alt="" class="d-inline-block align-top"> My store
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


        </div>
    </nav>


    <!-- Carousel -->
    <div id="slides " class="carousel slide" data-ride="carousel" data-interval="2500">
        <ul class="carousel-indicators ">
            <li data-target="#slides " data-slide-to="0 " class="active "></li>
            <li data-target="#slides " data-slide-to="1 "></li>
            <li data-target="#slides " data-slide-to="2 "></li>
            <li data-target="#slides " data-slide-to="3 "></li>
        </ul>
        <div class="carousel-inner ">
            <div class="carousel-item active ">
                <img class="d-block w-100 " src="./library/images/image-bg/bg5.jpg ">

            </div>
            <div class="carousel-item ">
                <img class="d-block w-100 " src="./library/images/image-bg/bg1.jpg ">

            </div>
            <div class="carousel-item ">
                <img class="d-block w-100 " src="./library/images/image-bg/bg3.jpg ">

            </div>
            <div class="carousel-item ">
                <img class="d-block w-100 " src="./library/images/image-bg/bg2.jpg ">

            </div>
            <a class="carousel-control-prev " href="#slides " role="button " data-slide="prev">
                <span class="carousel-control-prev-icon " aria-hidden="true "></span>
                <span class="sr-only ">Previous</span>
            </a>
            <a class="carousel-control-next " href="#slides " role="button " data-slide="next">
                <span class="carousel-control-next-icon " aria-hidden="true "></span>
                <span class="sr-only ">Next</span>
            </a>
        </div>
    </div>
    <!-- Body -->
    <div class="container-fluid padding">
        <div class="row welcome text-center pt-5 justify-content-center">
            <div class="col-12">
                <h1 class="display-2">We have have everything you need!</h1>
            </div>
            <!-- Horizontal Rule -->
            <hr>
            <!-- Product iPhone-->
            <div class="col-12 mt-5">
                <h1 class="display-4">First, Choose an iPhone</h1>
                <h3 class="m-2"><a href="index.php?method=list-product&type=1">See all iPhone models></a></h3>
            </div>
            <!-- Carousel product -->
            <div id="slides " class="carousel slide w-100 pr-5 pl-5" data-ride="carousel" data-interval="1500">
                <div class="carousel-inner container-fluid">
                    <div class="carousel-item active">
                        <div class="container-fluid card-deck justify-content-between mt-2">
                            <?php $i = 1;
                            foreach ($product['1'] as $key => $value) :

                            ?>

                                <div class="card border-0">
                                    <a href="index.php?method=detail&id=<?php echo $value['id']; ?>">
                                        <img class="card-img-bottom w-auto h-285" src="./library/images/image-product/<?php echo $value['image']; ?>" alt="Card image cap">
                                    </a>
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $value['name']; ?></h4>
                                        <h5 class="card-title">Starting at $<span><?php echo $value['price']; ?></h5>
                                        <div class="card-title">
                                            <a class="card-link"href="index.php?method=add-cart&id=<?php echo $value['id']; ?>">
                                                <i class="fa fa-cart-plus fa-2x"></i>
                                            </a>
                                        </div>
                                        <a class="card-link" href="index.php?method=detail&id=<?php echo $value['id']; ?>">Learn more ></a>
                                    </div>
                                </div>
                                <?php if ($i % 4 == 0) {
                                    echo "</div>";
                                    echo "</div>";
                                    echo "<div class='carousel-item'>";
                                    echo "<div class='container-fluid card-deck justify-content-between mt-2'>";
                                }
                                $i++;
                                ?>

                            <?php endforeach; ?>
                        </div>
                    </div>

                    <a class="carousel-control-prev " href="#slides " role="button " data-slide="prev">
                        <span class="carousel-control-prev-icon " aria-hidden="true "></span>
                        <span class="sr-only ">Previous</span>
                    </a>
                    <a class="carousel-control-next " href="#slides " role="button " data-slide="next">
                        <span class="carousel-control-next-icon " aria-hidden="true "></span>
                        <span class="sr-only ">Next</span>
                    </a>
                </div>
            </div>

            <!-- Product iPad-->
            <div class="col-12 mt-5">
                <h1 class="display-4">And an iPad</h1>
                <h3 class="m-2"><a href="index.php?method=list-product&type=2">See all iPad models></a></h3>
            </div>

            <!-- Carousel product -->
            <div id="slides " class="carousel slide w-100 pr-5 pl-5" data-ride="carousel" data-interval="1500">
                <div class="carousel-inner container-fluid">
                    <div class="carousel-item active">
                        <div class="container-fluid card-deck justify-content-between mt-2">
                            <?php $i = 1;
                            foreach ($product[2] as $key => $value) :

                            ?>

                                <div class="card border-0">
                                    <a href="index.php?method=detail&id=<?php echo $value['id']; ?>">
                                        <img class="card-img-bottom w-auto h-285" src="./library/images/image-product/<?php echo $value['image']; ?>" alt="Card image cap">
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
                                <?php if ($i % 3 == 0) {
                                    echo "</div>";
                                    echo "</div>";
                                    echo "<div class='carousel-item'>";
                                    echo "<div class='container-fluid card-deck justify-content-between mt-2'>";
                                }
                                $i++;
                                ?>

                            <?php endforeach; ?>
                        </div>
                    </div>
                    <a class="carousel-control-prev " href="#slides " role="button " data-slide="prev">
                        <span class="carousel-control-prev-icon " aria-hidden="true "></span>
                        <span class="sr-only ">Previous</span>
                    </a>
                    <a class="carousel-control-next " href="#slides " role="button " data-slide="next">
                        <span class="carousel-control-next-icon " aria-hidden="true "></span>
                        <span class="sr-only ">Next</span>
                    </a>
                </div>
            </div>
            <!-- Mac -->
            <div class="col-12 mt-5">
                <h1 class="display-4">And, What about a Macbook for work?</h1>
                <h3 class="m-2"><a href="index.php?method=list-product&type=3">See all Macbook models></a></h3>
            </div>

            <!-- Carousel product -->
            <div id="slides " class="carousel slide w-100 pr-5 pl-5" data-ride="carousel" data-interval="1500">
                <div class="carousel-inner container-fluid">
                    <div class="carousel-item active">
                        <div class="container-fluid card-deck justify-content-between mt-2">
                            <?php $i = 1;
                            foreach ($product[3] as $key => $value) :

                            ?>

                                <div class="card border-0">
                                    <a href="index.php?method=detail&id=<?php echo $value['id']; ?>">
                                        <img class="card-img-bottom w-auto h-285" src="./library/images/image-product/<?php echo $value['image']; ?>" alt="Card image cap">
                                    </a>
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $value['name']; ?></h4>
                                        <h5 class="card-title">Starting at $<span><?php echo $value['price']; ?></h5>
                                        <div class="card-title">
                                            <a class="card-link" href="index.php?method=add-cart&id=<?php echo $value['id']; ?>" ">
                                                <i class="fa fa-cart-plus fa-2x"></i>
                                            </a>
                                        </div>
                                        <a class="card-link" href="index.php?method=detail&id=<?php echo $value['id']; ?>">Learn more ></a>
                                    </div>
                                </div>
                                <?php if ($i % 2 == 0) {
                                    echo "</div>";
                                    echo "</div>";
                                    echo "<div class='carousel-item'>";
                                    echo "<div class='container-fluid card-deck justify-content-between mt-2'>";
                                }
                                $i++;
                                ?>

                            <?php endforeach; ?>
                        </div>
                    </div>

                    <a class="carousel-control-prev " href="#slides " role="button " data-slide="prev">
                        <span class="carousel-control-prev-icon " aria-hidden="true "></span>
                        <span class="sr-only ">Previous</span>
                    </a>
                    <a class="carousel-control-next " href="#slides " role="button " data-slide="next">
                        <span class="carousel-control-next-icon " aria-hidden="true "></span>
                        <span class="sr-only ">Next</span>
                    </a>
                </div>
            </div>
            <!-- Product Airpods-->
            <div class="col-12 mt-5">
                <h1 class="display-4">It'll perfect with an AirPods</h1>
                <h3 class="m-2"><a href="index.php?method=detail&id=<?php echo $value['id']; ?>">See all AirPods models></a></h3>
            </div>
            <!-- Carousel product -->
            <div id="slides " class="carousel slide w-100 pr-5 pl-5" data-ride="carousel" data-interval="1500">
                <div class="carousel-inner container-fluid">
                    <div class="carousel-item active">
                        <div class="container-fluid card-deck justify-content-between mt-2">
                            <?php $i = 1;
                            foreach ($product[4] as $key => $value) :

                            ?>

                                <div class="card border-0">
                                    <a href="index.php?method=detail&id=<?php echo $value['id']; ?>">
                                        <img class="card-img-bottom w-auto h-285" src="./library/images/image-product/<?php echo $value['image']; ?>" alt="Card image cap">
                                    </a>
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $value['name']; ?></h4>
                                        <h5 class="card-title">Starting at $<span><?php echo $value['price']; ?></h5>
                                        <div class="card-title">
                                            <a class="card-link" href="index.php?method=add-cart&id=<?php echo $value['id']; ?>" ">
                                                <i class="fa fa-cart-plus fa-2x"></i>
                                            </a>
                                        </div>
                                        <a class="card-link" href="index.php?method=detail&id=<?php echo $value['id']; ?>">Learn more ></a>
                                    </div>
                                </div>
                                <?php if ($i % 3 == 0) {
                                    echo "</div>";
                                    echo "</div>";
                                    echo "<div class='carousel-item'>";
                                    echo "<div class='container-fluid card-deck justify-content-between mt-2'>";
                                }
                                $i++;
                                ?>

                            <?php endforeach; ?>
                        </div>
                    </div>

                    <a class="carousel-control-prev " href="#slides " role="button " data-slide="prev">
                        <span class="carousel-control-prev-icon " aria-hidden="true "></span>
                        <span class="sr-only ">Previous</span>
                    </a>
                    <a class="carousel-control-next " href="#slides " role="button " data-slide="next">
                        <span class="carousel-control-next-icon " aria-hidden="true "></span>
                        <span class="sr-only ">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
            <!-- Product Mac-->
            <div class="col-12 mt-5">
                <h1 class="display-4">It'll perfect with an AirPods</h1>
                <h3 class="m-2"><a href="index.php?method=list-product&type=4">See all AirPods models></a></h3>
            </div>
            <div class="container padding card-deck mt-2">
                <?php foreach ($product[4] as $key => $value) : ?>
                    <div class="card border-0">
                        <!-- <a href="index.php?method=detail&id=<?php echo $value['id']; ?>"> -->
                            <img class="card-img-bottom w-auto h-285" src="./library/images/image-product/<?php echo $value['image']; ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $value['name']; ?></h4>
                            <h5 class="card-title">Starting at $<span><?php echo $value['price']; ?></h5>
                            <div class="card-title">
                                <!-- <a href="index.php?method=add-cart&id=<?php echo $value['id']; ?>" class="card-link" "> -->
                                <i class=" fa fa-cart-plus fa-2x"></i>
                                </a>
                            </div>
                            <!-- <a class="card-link" href="index.php?method=detail&id=<?php echo $value['id']; ?>">Learn more ></a> -->
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

            function addCart() { ///function addCart(id) {
                // console.log(id);
                // var url = 'index.php?method=add-cart&id=' + id;
                // var cartCount = document.getElementById('cart-count').innerHTML;
                // //sử dụng ajax post
                // $.ajax({
                //     url: url, // gửi đến file upload.php 
                //     dataType: 'json',
                //     cache: false,
                //     contentType: false,
                //     processData: false,
                //     data: {},
                //     method: 'post',
                //     success: function(res) {
                //         if ($.trim(result.image) != '') {
                //             $('#image').append(result.image);
                //         }
                //         console.log(url);
                //         // $('#fileToUpload').val('');
                //     }
                // });
                alert("Done!");
            }
        </script>
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
</body>

</html>