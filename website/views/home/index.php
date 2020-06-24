<?php 

?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- <script src="https://kit.fontawesome.com/b1d0494dab.js" crossorigin="anonymous"></script> -->
    <link href="libs/fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="website/css/style.css">
</head>

<body>
    <div class="container">
        <!-- <img src="image/bg4.jpg"> -->
        <div class="header-background">
            <div class="header">
                <h1 class="header-name">N-BUY</h1>
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
                        <i class="fas fa-search"></i>
                    </span>
                    <input placeholder="Search..." type="search" name="search">
                </div>
                <div class="header-login">
                    <div class="login">
                        <a href="index.php?method=login">Log In</a>
                    </div>
                    <div class="signup">
                        <a href="index.php?method=signup">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-home">
            <div class="content-display">
                <?php foreach ($product as $key => $value): ?> 
                <div class="product-display">
                    <a href="#"><img src="images/image-product/<?php echo $value['image'];?>.jpg"></a>
                    <p class="product-name"><?php echo $value['name']; ?></p>
                    <p class="price">Giá: <span><?php echo $value['price']; ?></span> VNĐ</p>
                </div>
                <?php endforeach; ?>
            </div>
            
        </div>
        <div class="footer-background">
            <div class="footer">
                <ul class="footer-link">
                    <li>
                        <a href="index.html">Homepage</a>
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