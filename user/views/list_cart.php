<!DOCTYPE html>
<html>

<head>
    <title>N-Buy iPhone</title>
    <link rel="SHORTCUT ICON" href="../images/image-bg/icon.ico">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- <script src="https://kit.fontawesome.com/b1d0494dab.js" crossorigin="anonymous"></script> -->
    <link href="../libs/fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .product .img{
            width: 100px;
        }
        .product .img img{
            width: 90px;
            height: 90px;
            margin: 10px;
        }
        /* td{
            width: 100px;
        } */
        .product table{
            width: 1024px;
            text-align: center;
        }
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
                <div class="input-search">
                    <span class="icon-search">
                        <a href=""><i class="fas fa-search"></i></a>
                    </span>
                    <input placeholder="Search..." type="search" name="search">
                </div>
                <div class="cart">
                    <span class="icon-cart">
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                    </span>
                </div>
                <div class="header-profile">
                    <div><?php echo $_SESSION['user']['fullname']; ?></div>
                    <div>
                        <span class="icon-profile" >
                            <a href=""><i class="fas fa-user"></i><a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-home">
            <!-- <?php
            echo "<pre>";
            print_r($_SESSION['cart']);
            ?> -->
                <!-- <div class="panner">
                    <div><a><img src="../images/image-bg/bg5.jpg"></a></div>
                </div> -->
            <div class="product">
                <?php if(isset($_SESSION['cart'])){ ?>
                <table border="1px" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>STT</td>
                        <td>Image</td>
                        <td>Name</td>
                        <td>Amount</td>
                        <td>Price</td>
                        <td>Total</td>
                        <td></td>
                    </tr>
                    
                    <tr>
                    <?php  $i=0; foreach ($_SESSION['cart'] as $key => $value){ $i++; ?>
                        <td>
                            <?php echo $i; ?>
                        </td>
                        <td class="img">
                            <img  src="../images/image-product/<?php echo $value['image'];?>">
                        </td>
                        <td>
                            <?php echo ($value['name']); ?>
                        </td>
                        <td>
                            <form action="" method="$_POST">
                            <input type="number" name="amount-session" value="<?php echo $value['amount-session']; ?>">
                            <!-- <input type="submit"> -->
                            </form>
                            <?php if(isset($_POST['amount-session'])){ $value['amount-session']=$_POST['amount-session'];} ?>
                        </td>
                        <td>
                            <p>$<?php echo $value['price']; ?></p>
                        </td>
                        <td>
                            <p>$<?php echo $value['price']*$value['amount-session']; ?></p>
                        </td>
                        <td class="btn">
                            <!-- <div class="btn-list"><a href="index.php?method=edit-cart&id=<?php echo $value['id'];?>">Edit</a></div> -->
                            <div class="btn-list"><a href="index.php?method=delete-cart&id=<?php echo $value['id'];?>">Delete</a></div>
                        </td>
                    </tr>
                    <?php }
                    }
                    else{
                        echo "Giỏ hàng trống!";
                    }                
                    ?>
                </table>
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