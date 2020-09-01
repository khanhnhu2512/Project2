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
        .product-display-detail label{
            width: 50%;
            text-align: left;
        }
        .product-display-detail input{
            width: 50%;
            text-align: right;
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
                <form action="" method="post">   
                    <div class="product-display-detail">
                        <?php if(isset($_POST['update'])){echo "<h3>".$log."</h3>";} ?>
                        <label for="fullname">Fullname</label><input type="text" id="fullname" name="fullname" value="<?php echo (isset($_POST['update'])) ? $_POST['fullname'] : $user['0']['fullname']; ?>" ><br>
                        <label for="username">Username</label><input type="text" id="username" name="username" value="<?php echo (isset($_POST['update'])) ? $_POST['username'] : $user['0']['username']; ?>"><br>
                        <label for="password" >Password</label><input type="text" id="password" name="password" value="<?php echo (isset($_POST['update'])) ? $_POST['password'] : $user['0']['password']; ?>"><br>
                        <label for="email">Email</label><input type="text" id="email" name="email" value="<?php echo (isset($_POST['update'])) ? $_POST['email'] : $user['0']['email']; ?>" ><br>
                        <label for="lv">Permission</label>
                        <select name="lv">
                            <option value=1>Admin</option>
                            <option value=2 <?php if(isset($_POST['update'])){ echo ($_POST['lv']==2) ? 'selected' : ''; }else{ echo ($user['0']['lv']==2) ? 'selected' : '';  }  ?> >User</option>
                        </select>     
                        <br>
                        <input type="submit" name="update" value="Update">  
                    </div>
                </form>
                <!-- <a href="#" name="update">Update</a> -->
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