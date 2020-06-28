<php 
    session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="website/css/login.css">
    <!-- <script src="https://kit.fontawesome.com/b1d0494dab.js" crossorigin="anonymous"></script> -->
    <link href="fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <!-- <img src="image/bg4.jpg"> -->
        <div class="header-background">
            <div class="header">
                <h1 class="header-name">N-BUY</h1>
                <ul>
                    <li class="header-option">
                        <a href="index.php?method=home">Homepage</a>
                    </li>
                    <li class="header-option">
                        <a href="about.php">About</a>

                    </li>
                    <li class="header-option">
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-home">
        
            <form method="POST" action="">
            
                <div class="login-form">
                    <div class="title">
                        <p><b>LOGIN</b></p>
                    </div>
                    <div class="input"><?php if(isset($_POST['login-btn'])){echo $log;} ?></div>
                    <div class="input">
                        <span><b>Username</b></span><br>
                        <input type="text" placeholder="Tên đăng nhập..." name="username">
                    </div>
                    <div class="input">
                        <span><b>Password</b></span><br>
                        <input type="password" placeholder="Mật khẩu..." name="password">
                    </div>
                    <div class="input-remember">
                        <input type="checkbox" name="remember">
                        <p>Remember me</p>
                    </div>
                    <div class="login-btn">
                        <input class="btn" type="submit" name="login-btn" value="Login"><a href="index.php?method=login"></a>
                    </div>
                </div>
                <div class="login-form-signup">
                    <div>
                        <p>Create an account? <a href="index.php?method=signup">Click here</a></p>
                    </div>
                </div>
            </form>
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