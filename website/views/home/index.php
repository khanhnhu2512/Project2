<?php 
    if(!isset($_SESSION)){
        session_start();
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>N-Buy iPhone</title>
    <link rel="SHORTCUT ICON" href="images/image-bg/icon.ico">
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
                <div class="input-search">
                    <span class="icon-search">
                        <a href=""><i class="fas fa-search"></i></a>
                    </span>
                    <input placeholder="Search..." type="search" name="search">
                </div>
                <div class="cart">
                    <span class="icon-cart">
                        <a href="index.php?method=cart"><i class="fas fa-shopping-cart"></i></a>
                    </span>
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
            <div class="panner">
                <div><a><img src="images/image-bg/bg5.jpg"></a></div>
            </div>
            <div class="product-ip">
                <div class="title">
                    <div><h1>Choose your iPhone!</h1></div>
                </div>
                <div class="pagination">
                    <!-- <?php $i = 1; ?>
                    <a class="left"  href="index.php?page=<?php echo ($i>=1) ? $i-- : $i;?>"><i class="fas fa-caret-left"></i></a>
                    <a class="right" href="index.php?page=<?php echo $i+=1; ?>"><i class="fas fa-caret-right"></i></a> -->
                        <ul class="page">
                            <?php for($i=1;$i<=$total_page;$i++){ ?>
                            <li <?php if($page == $i) echo "class='active'"; ?> ><a href="index.php?page=<?php echo $i ?>"><?php echo $i; ?></a></li>
                            <?php } ?>
                        </ul>
                </div>
                <div class="content-display">   
                    <?php foreach ($product as $key => $value): ?> 
                    <div class="product-display">
                        <div class="img"><a href="index.php?method=detail-iphone&id=<?php echo $value['id'];?>"><img src="images/image-product/<?php echo $value['image'];?>  "></a></div>
                        <h3 class="product-name"><?php echo $value['name']; ?></h3>
                        <p class="product-price">Starting at $<span><?php echo $value['price']; ?></span></p>
                        <div class="icon-add-cart">
                            <span>
                                <a href="index.php?method=cart"><i class="fas fa-cart-plus"></i></a>
                            </span>
                        </div>
                    </div>
                    <?php endforeach; ?>
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