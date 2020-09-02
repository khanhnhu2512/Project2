<!doctype html>
<html lang="en">

<head>
    <title>My store</title>
    <link rel="SHORTCUT ICON" href="./library/images/image-bg/LogoN-Black.png"> <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="text/css" rel="stylesheet" href="./public/fontawesome-free-5.13.0-web/css/all.css">
    <link rel="stylesheet" href="./public/css/user/register.css">
    <link type="text/css" rel="stylesheet" href="./public/bootstrap4/bootstrap-4.5.0-dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="./public/css/style.css">
    <script src="./public/jquery/jquery-3.5.1.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Recursive:wght@700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <style>
        
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="header__icon">
            <p>Register</p>
        </div>
        <form method="post">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Fullname">
                    <p class="logError" id="logErrorUsername"></p>
                </div>
                <div class="input-group mt-4">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="username" id="username" onchange="validate()" placeholder="Username">
                    <p class="logError" id="logErrorUsername"></p>
                </div>
                <div class="input-group mt-4">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    <p class="logError" id="logErrorEmail"></p>
                </div>
                <div class="input-group mt-4">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-key"></i>
                        </div>
                    </div>
                    <input type="password" class="form-control" name="password" id="password" onchange="validate()" placeholder="Password">

                </div>
                <p class="logError" id="logErrorPassword"></p>
                <div class="input-group mt-4">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-key"></i>
                        </div>
                    </div>
                    <input type="password" class="form-control" name="repassword" id="repassword" onchange="validate()" placeholder="Repassword">

                </div>
                <p class="logError" id="logErrorRepassword"></p>
            </div>
            <div class="form">
                <p class="">By creating an account you agree to our <a href="">Term of Use</a> & <a href="">Privacy Policy.</a></p>
            </div>
            <div class="form__submit mt-3">
                <button onclick="confirm()" type="submit" id="submit" name="submit">
                    <p>Register</p>
                </button>
            </div>
            <div class="btn">
                <span>Or </span><a href="index.php?method=login" class="btn-link">Login</a>
            </div>
        </form>
    </div>



    <!-- Optional JavaScript -->
    <script>
        function checkbtn(check) {
            var btn = document.getElementById("submit");
            console.log(check);
            // check
            if (check >= 2) {
                btn.disabled = false;
            } else {
                btn.disabled = true
            }
        }
        checkbtn(0); //de luc vao phat no check luon de con disable btn
        function validate() {
            var username = document.getElementById("username");
            var logUser = document.getElementById("logErrorUsername");
            var email = document.getElementById("email");
            var logEmail = document.getElementById("logErrorEmail");
            var password = document.getElementById("password");
            var logPass = document.getElementById("logErrorPassword");
            var repassword = document.getElementById("repassword");
            var logRepass = document.getElementById("logErrorRepassword");

            var check = 0;

            // password /^[A-Za-z]\w{7,14}$/
            // console.log(password.value);
            // console.log(password.value.match(/^[A-Za-z0-9]\w{6,14}$/));
            var regexPass = /^[A-Za-z0-9]\w{6,14}$/;
            // pass
            if (password.value.match(regexPass) != null) {
                logPass.innerText = "";
                check++;
            } else {
                logPass.innerText = "Contain at least 6 characters, include number, lowercase character, uppercase character";
            }
            // repass
            if (password.value == repassword.value) {
                logRepass.innerText = "";
                check++;
            } else {
                logRepass.innerText = "Password does not match!";
            }
            //check 
            checkbtn(check);

        }

        function confirm() {
            setTimeout(function() {
                alert("ok");
            }, 1000);

        }
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>