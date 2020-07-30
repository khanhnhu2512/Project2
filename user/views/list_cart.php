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
        .cart .icon-cart {
            position: absolute;
            font-size: 18px;
            /*top: 3.5%;*/
            margin-left: 3px;
            margin-top: -8px; 
            /* z-index: 1; */
            color: #ffffff;
        }
    </style>
</head>

<body>
    
    <div class="container">
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
                            <a href="index.php?method=profile"><i class="fas fa-user"></i><a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-home">
            <div class="product">
                <?php if(isset($_SESSION['cart'])){ ?>
                <table border="1px" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="width: 40px">STT</td>
                        <td style="width: 100px">Image</td>
                        <td style="width: 300px">Name</td>
                        <td style="width: 100px">Amount</td>
                        <td>Price</td>
                        <td style="width: 200px">Total</td>
                        <td style="width: 100px"></td>
                    </tr>
                    <form action="" method="post">
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
                            <!-- <form action="" method="post"> -->
                            <input class="qty" style="width: 40px; text-align:center; " type="number" name="amount-session<?php echo $key; ?>" onchange="show_total(<?php echo $i-1; ?>)"  value="<?php echo $value['amount-session']; ?>">
                            <!-- <input style="width: 30px text-align:center;" type="submit" name="submit<?php echo $key; ?>" value="OK" > -->
                            <!-- </form> -->
                            <!-- <?php echo (isset($_POST['amount-session'.$key])) ? $_POST['amount-session'.$key] : ""; ?> -->
                            <!-- <?php if(isset($_POST['pay'])){ $_SESSION['cart'][$key]['amount-session']=$_POST['amount-session'.$key]; } ?> -->
                        </td>
                        <td>
                            <p class="price"><?php echo $value['price']; ?></p>
                        </td>
                        <td>
                            <p class="total"><?php echo ($value['amount-session'] * $value['price']); ?></p>
                        </td>
                        <td class="btn">
                            <div class="btn-del"><a href="index.php?method=delete-cart&id=<?php echo $value['id'];?>">Delete</a></div>
                        </td>
                    </tr>
                    
                    <?php } ?>
                    
                    <tr>
                        <td colspan="5";> 
                        </td>
                        <td>
                            <div id="subtotal"></div>
                            <?php  
                                // $total_final=0;
                                $_SESSION['total'] = 0;
                                foreach ($_SESSION['cart'] as $key=>$value){ $_SESSION['total'] += $_SESSION['cart'][$key]['price']*$_SESSION['cart'][$key]['amount-session']; }
                            ?>
                        </td>
                        <td class="">
                            <div class="btn-pa">
                                <!-- <a href="index.php?method=pay-now"> -->
                                    <input type="submit" name="pay" value="Pay Now">
                                <!-- </a> -->
                            </div>
                        </td>
                    </tr>
                    </form>
                    <?php
                    if(isset($_POST['pay'])){ $_SESSION['cart'][$key]['amount-session']=$_POST['amount-session'.$key]; }
                    }
                    else{
                        echo "<h1>Giỏ hàng trống!</h1>";
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
<script type="text/javascript">
            var qty = document.getElementsByClassName("qty");
            var price = document.getElementsByClassName("price");
            var total = document.getElementsByClassName("total");
            var subtotal = document.getElementById("subtotal");
            // function subtotal(){
            //     for (var i = 0; i<total.length; i++){
            //         result += total.value;
            //     }
            // }
            function show_subtotal(){
                var result=0;
                for (var i = 0; i<total.length; i++){
                    result +=  total[i].innerHTML;
                }
                subtotal.innerHTML = result;
            }
            
            show_subtotal();
            console.log(+total[0].innerHTML +1);
            function show_total(i)
            {   
                total[i].innerHTML = (qty[i].value * price[i].innerHTML); 
                show_subtotal();
                
            }     
    </script>
</html>