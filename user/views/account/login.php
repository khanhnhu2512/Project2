<!doctype html>
<html lang="en">

<head>
    <title>My store</title>
    <link rel="SHORTCUT ICON" href="./library/images/image-bg/LogoN-Black.png"> <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="text/css" rel="stylesheet" href="./public/fontawesome-free-5.13.0-web/css/all.css">
    <link type="text/css" rel="stylesheet" href="./public/css/user/login.css">
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
            <p>Login</p>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <p id="logError"><?php echo (isset($log)) ? "$log" : ""; ?></p>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="username" id="inlineFormInputGroupUsername" placeholder="Username">
                </div>
                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-key"></i>
                        </div>
                    </div>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                </div>
            </div>

            <div class="form__submit">
                <button type="submit" name="submit">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </form>
        <div class="btn">
            <span>Or </span><a href="index.php?method=signup" class="btn-link">Register</a>
        </div>
        <div class="btn">
            <a href="index.php?method=forget-password" class="btn-link mb-2"><p>Forget Password</p></a>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>