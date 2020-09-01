<?php 

?>

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
        .content-home{
            display: flex;
        }
        .content-home .control{
            /* height: 200px; */
            width: 256px;
            margin-top: 20px;
            
            /* height: 200px; */
            
        }
        .product-display-detail{
            width: 768px;
            background-color: #f5f5f7;
        }
        .control ul{
            margin: 0px;
            background: #000000;
            width: 100%;
            padding: 0;
            list-style-type: none;
            text-align: left;
        }
        .control li{
            width: auto;
            height: 40px;
            line-height: 40px;
            border-bottom: 1px solid #e8e8e8;
            padding: 0 1em;
        }
        .control li a{
            text-decoration: none;
            color: #ffffff;
            font-weight: bold;
            display: block;
        }
        .control li:hover{
            background: #286090;
        }
        .product-content{

            text-align: left;
        }
        .product-display-detail .btn-update a{
            padding: 3px;
            text-decoration: none;
            border: 1px solid black;
            border-radius: 2px;
            background-color: black;
            color: white;
            line-height: 30px;
        }
        .product-display-detail .btn-update{
            padding-bottom: 20px;
        }
        .product-display-detail .btn-update a:hover{
            background-color: green;
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
                    <div class="product">
                    <?php if(isset($_SESSION['users'])){ ?>
                        <!-- <pre>
                            <?php print_r($_SESSION['order']); ?>
                        </pre> -->
                        <h4>#<?php echo $id; $subtotal = 0;?></h4>
                        <table border="1px" width="100%" cellpadding="0" cellspacing="0";>
                            <tr>
                                <td style="width: 40px">STT</td>
                                <td style="width: 50px">Image</td>
                                <td style="width: 300px">Name</td>
                                <td style="width: 100px">Amount</td>
                                <td style="width: 100px">Price</td>
                                <td style="width: 200px">Total</td>
                            </tr>
                            <?php  $i=0; foreach ($_SESSION['order-detail'] as $key => $value){ $i++; ?>
                            <tr>                      
                                <td style="width: 40px">
                                    <?php echo $i; ?>
                                </td>
                                <td class="img">
                                    <img  src="../images/image-product/<?php echo $_SESSION['product-iphone'][$value['id_product']]['image'];?>">
                                </td>
                                <td style="width: 300px">
                                    <?php echo $_SESSION['product-iphone'][$value['id_product']]['name']; ?>
                                </td>
                                <td style="width: 100px">    
                                    <?php echo ($value['amount']); ?>
                                </td>
                                <td>
                                    <p>$<?php echo $value['price']; ?></p>
                                </td>
                                <td>
                                    <p>$<?php echo $value['price']*$value['amount']; $subtotal += $value['price']*$value['amount']; ?></p>
                                </td>
                            </tr>   
                            <?php } ?>
                            <tr>
                                <td>Subtotal: <?php echo $subtotal; ?></td>
                            </tr>               
                        </table>
                    <?php } ?>
                </div>
                    
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