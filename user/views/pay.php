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
            width: 50px;
        }
        .product .img img{
            width: 40px;
            height: 40px;
            margin: 10px;
        }
        /* td{
            width: 100px;
        } */
        .product table{
            width: 1024px;
            text-align: center;
        }
        .content-home{
            min-height: 500px;
            text-align: center;
        }

        .content-home .btn-del a{
            text-decoration: none;
            border: 1px solid black;
            padding: 3px;
            border-radius: 3px;
            background-color: cyan;
        }
        .content-home .btn-del a:hover{
            background-color: red;
        }
        .btn-pay{

            line-height: 30px;
        }
        .btn-pay a{
            
            text-decoration: none;
            border: 1px solid black;
            padding: 3px;
            margin: px;
            border-radius: 3px;
            background-color: cyan;
        }
        .btn-pay a:hover{
            background-color: red;
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
                        <a href="index.php?method=list-cart"><i class="fas fa-shopping-cart"></i></a>
                    </span>
                </div>
                <div class="header-profile">
                    <div><?php echo $_SESSION['user']['fullname']; ?></div>
                    <div>
                        <span class="icon-profile" >
                            <a href="index.php?method=profile"><i class="fas fa-user"></i><a>
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
                
                <h3>Products</h3>
                <table border="1px" width="100%" cellpadding="0" cellspacing="0";>
                    <tr>
                        <td style="width: 40px">STT</td>
                        <td style="width: 50px">Image</td>
                        <td style="width: 300px">Name</td>
                        <td style="width: 100px">Amount</td>
                        <td>Price</td>
                        <td style="width: 200px">Total</td>
                        <td style="width: 100px"></td>
                    </tr>
                    
                    <tr>
                    <?php  $i=0; foreach ($_SESSION['cart'] as $key => $value){ $i++; ?>
                        <td style="width: 40px">
                            <?php echo $i; ?>
                        </td>
                        <td class="img">
                            <img  src="../images/image-product/<?php echo $value['image'];?>">
                        </td>
                        <td style="width: 300px">
                            <?php echo ($value['name']); ?>
                        </td>
                        <td style="width: 100px">
                            <form action="" method="post">
                            <input style="width: 40px; text-align:center; " type="number" name="amount-session<?php echo $key; ?>" min="1" value="<?php if(isset($_POST['submit'.$key])){ echo $_POST['amount-session'.$key];} else{ echo $value['amount-session'];} ?>">
                            <input style="width: 30px text-align:center;" type="submit" name="submit<?php echo $key; ?>" value="OK" >
                            </form>
                            <?php if(isset($_POST['submit'.$key])){ $_SESSION['cart'][$key]['amount-session']=$_POST['amount-session'.$key]; } ?>
                        </td>
                        <td>
                            <p>$<?php echo $value['price']; ?></p>
                        </td>
                        <td>
                            <p>$<?php echo $value['price']*$_SESSION['cart'][$key]['amount-session']; ?></p>
                        </td>
                        <td class="btn">
                            <!-- <div class="btn-list"><a href="index.php?method=edit-cart&id=<?php echo $value['id'];?>">Edit</a></div> -->
                            <div class="btn-del"><a href="index.php?method=delete-cart&id=<?php echo $value['id'];?>">Delete</a></div>
                        </td>
                    </tr>
                    <?php } ?>  
                    <!-- <tr>
                        <td colspan="5";> 
                        </td>
                        <td style:"width: 100px;" >
                            <?php  
                                // $total_final=0;
                                $_SESSION['total'] = 0;
                                foreach ($_SESSION['cart'] as $key=>$value){ $_SESSION['total'] += $_SESSION['cart'][$key]['price']*$_SESSION['cart'][$key]['amount-session']; }
                                echo "= $".$_SESSION['total'];
                                // echo "<pre>";
                                // print_r($_SESSION['cart']);
                            ?>
                        </td>
                        <td class="btn">
                            <div class="btn-pay"><a href="index.php?method=pay-now">Pay now</a></div>
                        </td>
                    </tr> -->
                   
                </table>
            </div>
            <form method="post" action="">
            <div>
                <?php  ?>
                <h3>Address</h3>
                <div class="">
                    
                        <input style="border: 0px;" type="text" name="address" value="<?php if(isset($_SESSION['cart']['address'])){echo $_SESSION['cart']['address'];}?>">
                        <!-- <input type="submit" name="address-edit" value="Edit"> -->
                    <!-- <?php if(isset($_POST['payment-method'])){ echo ($_POST['payment-method']==1) ? "checked" : ""; } ?> -->
                    
                    <!-- <?php if(isset($_POST['address-edit'])){$_SESSION['cart'][$key]['address']=$_POST['address'];} ?> -->
                </div>
            </div>
            <div>
                <h3>Payment method</h3>
                <div class="">
                    
                        <input type="radio" name="payment-method" value=0 checked >By cast
                        <input type="radio" name="payment-method" value=1 >Visa
                        
                     
                    <!-- <?php if(isset($_POST['payment-method-submit'])){$_SESSION['cart']['payment-method']=$_POST['payment-method'];} ?> -->
                </div>
            </div>
            <div>
                <div>
                    <p>Total amount of goods: </p>
                    <span>
                        <?php
                            $_SESSION['total'] = 0;
                            foreach ($_SESSION['cart'] as $key=>$value){ $_SESSION['total'] += $_SESSION['cart'][$key]['price']*$_SESSION['cart'][$key]['amount-session']; }
                            echo $_SESSION['total'];
                        ?>
                    </span>
                </div>
                <div>
                    <p>Total payment: </p>
                    <span>
                        <?php
                            $_SESSION['total-payment'] = 0;
                            $_SESSION['total-payment'] = $_SESSION['total'];
                            echo $_SESSION['total-payment'];
                        ?>
                    </span>
                </div>
                <input type="submit" name="payment" value="Payment">
            </div>
            </form>
            <a href="index.php?method=payment">done</a>
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