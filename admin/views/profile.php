<?php 

?>

<!DOCTYPE html>
<html>

<head>
    <title>N-Buy iPhone</title>
    <link rel="SHORTCUT ICON" href="../images/image-bg/icon.ico">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="../public/css/admin/profile.css">
    <!-- <script src="https://kit.fontawesome.com/b1d0494dab.js" crossorigin="anonymous"></script> -->
    <link href="../libs/fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        
    </style>
</head>

<body>
    <div class="container">
        <!-- <img src="image/bg4.jpg"> -->
        <div class="header-background">
            <div class="header">
                <a href="index.php"><h1 class="header-name">N-BUY</h1></a>
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
                <!-- <div class="input-search">
                    <span class="icon-search">
                        <a href=""><i class="fas fa-search"></i></a>
                    </span>
                    <input placeholder="Search..." type="search" name="search">
                </div> -->
                <!-- <div class="cart">
                    <span class="icon-cart">
                        <a href="index.php?method=list-cart"><i class="fas fa-shopping-cart"></i></a>
                    </span>
                </div> -->
                <div class="header-profile">
                    <!-- <div><?php echo $_SESSION['user']['fullname']; ?></div> -->
                    <div>
                        <span class="icon-logout" >
                            <a  href="index.php?method=logout"><i class="fas fa-sign-out-alt"></i><a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-home">
            <div class="control">
                <ul>
                    <li>
                        <a href="index.php?method=profile">Profile</a>
                    </li>
                    <li>
                        <a href="index.php?method=list-user">User</a>
                    </li>
                    <li>
                        <a href="index.php?method=list-order">Order</a>
                    </li>
                    <li>
                        <a href="index.php?method=list-product">Product</a>
                    </li>
                    <li>
                        <a href="index.php?method=display">Display</a>
                    </li>
                </ul>
            </div>    
            <div class="content-display-detail">   
                <div class="product-display-detail">
                    <div class="img"><a href=""><img src="../images/image-bg/profile.png"></a></div>
                    <h1 class="product-name"><?php echo $_SESSION['user']['fullname']; ?></h1>
                    <p class="product-content"><span><b>Username: </b></span><?php echo $_SESSION['user']['username']; ?></p>
                    <p class="product-content"><span><b>Password: </b></span><?php echo $_SESSION['user']['password']; ?></p>
                    <p class="product-content"><span><b>Email: </b></span><?php echo $_SESSION['user']['email']; ?></p>
                    <br>
                    <div class="btn-update"><a href="#">Update</a></div>
                    
                </div>
            </div>
            
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