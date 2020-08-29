<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="SHORTCUT ICON" href="../images/image-bg/LogoN-Black.png">
    <link type="text/css" rel="stylesheet" href="../libs/fontawesome-free-5.13.0-web/css/all.css">
    <link type="text/css" rel="stylesheet" href="../libs/bootstrap4/bootstrap-4.5.0-dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="../libs/css/style.css">
    <script src="../libs/jquery/jquery-3.5.1.min.js"></script>
    <style>
        .container-fluid {
            width: 100%;
            margin: 0;
            padding: 0
        }

        html,
        body {
            width: 100%;
            height: 100%;
        }

        .paddingLR {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .header {
            color: #fff;
            display: flex;
            background-color: #000;
            justify-content: space-between;
            align-items: center;
            height: 7vh;
        }

        .profile button:hover {
            background-color: #000 !important;
        }

        .profile .dropdown-item {
            background-color: #000 !important;
            color: #fff !important;
        }

        /* .profile .dropdown-item:hover{
            background-color: #fff !important;
            color: #000 !important;
        } */
        .profile .dropdown-item a {
            text-decoration: none;
            color: #fff !important;
        }

        .profile .dropdown-item a:hover {
            color: #fff !important;
            /* background-color: #fff !important; */
        }

        .profile .btn-dark:hover {
            background-color: #000 !important;
            color: #fff;
        }

        .menu {
            /* height: 100px; */
            background-color: #000;
            height: 93vh;
            width: 15%;
        }

        .display {
            background-color: #fff;
            width: 85%;
            padding: 1rem;
        }

        .body {
            display: flex;
            width: 100%;
            background-color: #000;

        }

        .menu ul {
            margin: 0;
            padding: 0;
            width: 100%;
            /* display: flex;
            position: relative; */
            list-style-type: none;
            text-align: left;
        }

        .menu ul li {
            width: 100%;
            /* position: absolute; */
            line-height: 60px;
            padding: 0 1em;
            border-bottom: 1px solid #535353;
        }

        .menu ul li:first-child {
            border-top: 1px solid #535353;
        }

        .menu ul li a {
            font-size: 1.25rem;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            display: block;
            /* background-color: yellowgreen; */
        }

        .menu li:hover {
            background: #232323;
        }

        .collapse li {
            line-height: 40px !important;
        }

        .collapse li a {
            font-size: 1rem !important;
            padding-left: 1rem;
        }

        .collapsing li a {
            font-size: 1rem !important;
            padding-left: 1rem;
        }

        .collapsing li {
            line-height: 40px !important;
        }

        .collapse li:first-child {
            border-top: 0px solid #535353 !important;
        }

        .collapsing li:first-child {
            border-top: 0px solid #535353 !important;
        }

        .display__header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .display__body {
            width: 100%;
            display: flex;
        }

        .display__body .img {
            width: 100px;

        }

        .display__body .img img {
            width: 100%;
            height: auto;
            padding: 0.5rem;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .display__body table tr td {
            font-size: 1rem;
            text-align: center;
        }

        .display__body table tr:first-child td {
            background-color: #000;
            line-height: 50px;
            font-weight: bold;
            font-size: 1.15rem !important;
            text-align: center;
            color: #be1010;
        }

        .display__body-btn {
            width: 150px;
            height: 100%;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            /* border: 1px solid #000; */
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="header paddingLR">
            <div class="navbar-brand">
                <img src="../images/image-bg/LogoN-White.png" height="35" alt="" class="d-inline-block align-top"> My store
            </div>
            <div class="dropdown profile">
                <button class="btn btn-dark dropdown-toggle border-0" type="button" id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo isset($_SESSION['user']) ? $_SESSION['user']['fullname'] : ""; ?>
                </button>
                <div class="dropdown-menu btn-dark w-100 text-light" aria-labelledby="dropdownProfile">
                    <div class="dropdown-item">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        <a class="link" href="#">Account</a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-item">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <a class="link" href="#">Setting</a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-item">
                        <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
                        <a class="link" href="index.php?method=signout">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="body">
            <div class="menu">
                <ul>
                    <li>
                        <a href="index.php?method=home">Dashboard</a>
                    </li>
                    <li style="background-color: #484848;">
                        <a data-toggle="collapse" href="#products" role="button" aria-expanded="false" aria-controls="products">Products</a>
                    </li>
                    <ul class="collapse" id="products">
                        <li>
                            <a href="index.php?method=list-product&type=1">iPhone</a>
                        </li>
                        <li>
                            <a href="index.php?method=list-product&type=2">iPad</a>
                        </li>
                        <li>
                            <a href="index.php?method=list-product&type=3">Macbook</a>
                        </li>
                        <li>
                            <a href="index.php?method=list-product&type=4">Airpods</a>
                        </li>
                    </ul>
                    <li><a href="index.php?method=list-order">Order</a></li>
                    <li><a href="index.php?method=list-user">Users</a></li>
                </ul>
            </div>
            <div class="display">
            <h4>#<?php echo $id; $subtotal = 0;?></h4>

                <div class="display__body">
                    <table border="1px" width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="width: 40px">STT</td>
                            <td style="width: 50px">Image</td>
                            <td style="width: 300px">Name</td>
                            <td style="width: 100px">Quantity</td>
                            <td style="width: 100px">Price</td>
                        </tr>
                        <tr>
                            <?php $i = 0;
                            foreach ($_SESSION['order-detail'] as $key => $value) {
                                $i++; ?>

                                <td style="width: 40px">
                                    <?php echo $i; ?>
                                </td>
                                <td class="img">
                                    <img src="../images/image-product/<?php echo $_SESSION['product'][$value['id_product']]['image']; ?>">
                                </td>
                                <td style="">
                                    <?php echo $_SESSION['product'][$value['id_product']]['name']; ?>
                                </td>
                                <td style="">
                                    <?php echo ($value['qty']); ?>
                                </td>
                                <td>
                                    <p>$<?php echo $value['price']; ?></p>
                                </td>

                        </tr>

                    <?php $subtotal += $value['price']*$value['qty']; } ?>
                    </table>

                </div>
                <h4>Total: <?php echo $subtotal; ?></h4>

            </div>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
</body>

</html>