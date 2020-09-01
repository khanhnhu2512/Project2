<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="website/css/signup.css">
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
                        <a href="index.php">Homepage</a>
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
            <form method="POST" action="#">
                <div class="signup-form">
                    <div class="title">
                        <p><b>SIGNUP</b></p>
                    </div>
                    <div class="input"><?php if(isset($_POST['signup-btn'])){echo $log;} ?></div>
                    <div class="input">
                        <span><b>Full name*</b></span><br>
                        <input type="text" id="fullname" placeholder="Họ và tên..." name="fullname">
                    </div>
                    <div class="input">
                        <span><b>Username*</b></span><br>
                        <input type="text" id="username" placeholder="Tên đăng nhập..." name="username">
                    </div>
                    <div class="input">
                        <span><b>Email*</b></span><br>
                        <input type="email" id="email" placeholder="Email..." name="email">
                    </div>
                    <div class="input">
                        <span><b>Password*</b></span><br>
                        <input type="password" id="password" placeholder="Mật khẩu..." name="password">
                    </div>
                    <div class="input">
                        <span><b>Repassword*</b></span><br>
                        <input type="password" id="repassword" placeholder="Nhập lại mật khẩu..." name="repassword">
                    </div>
                    <div class="signup-btn">
                        <input type="submit" name="signup-btn" value="Sign up"><a href="index.php?method=signup"></a></input>
                    </div>
                </div>
                <div class="signup-form-signup">
                    <div>
                        <p>Have an account? <a href="index.php?method=login">Login</a></p>
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
    <!-- <script type="text/javascript">
        console.log("<?php $sth =true; echo $sth; ?>");
    </script> -->
    
    <script type="text/javascript">
        function validate(){
            var fullname = document.getElementById("fullname");
            var username = document.getElementById("username");
            var email = document.getElementById("email");
            var password = document.getElementById("password");
            var repassword = document.getElementById("repassword");
            var log = 0;
            var checkusername =  <?php echo $checkuser; ?>
            if()
        }
    </script>
</body>

</html>