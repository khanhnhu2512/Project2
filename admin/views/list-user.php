<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="SHORTCUT ICON" href="../library/images/image-bg/LogoN-Black.png">
    <link rel="stylesheet" href="../public/css/admin/list-user.css">
    <link type="text/css" rel="stylesheet" href="../public/fontawesome-free-5.13.0-web/css/all.css">
    <link type="text/css" rel="stylesheet" href="../public/bootstrap4/bootstrap-4.5.0-dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="../public/css/style.css">
    <script src="../public/jquery/jquery-3.5.1.min.js"></script>
    <style>
        
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="header paddingLR">
            <div class="navbar-brand">
                <img src="../library/images/image-bg/LogoN-White.png" height="35" alt="" class="d-inline-block align-top"> My store
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

                <div class="display__body">
                    <table border="1px" width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="width: 40px">STT</td>
                            <td style="width: 100px">Username</td>
                            <td style="width: 300px">FullName</td>
                            <td style="width: 100px">Email</td>
                            <td style="width: 100px">Permission</td>
                            <td></td>
                        </tr>
                        <tr>
                            <?php $i = 0;
                            foreach ($_SESSION['users'] as $key => $value) {
                                $i++; ?>

                                <td style="width: 40px">
                                    <?php echo $i; ?>
                                </td>
                                <td style="width: 300px">
                                    <?php echo ($value['username']); ?>
                                </td>
                                <td style="">
                                    <?php echo ($value['fullname']); ?>
                                </td>
                                <td style="">
                                    <?php echo ($value['email']); ?>
                                </td>
                                <td>
                                    <?php echo ($value['lv'] == 1) ? 'Admin' : 'User'; ?>
                                </td>
                                <td class="display__body-btn">
                                    <div class="btn btn-outline-danger mr-1"><a class="btn-link" href="index.php?method=edit-user&id=<?php echo $value['id'];?>">Edit</a></div>
                                    <div class="btn btn-outline-danger"><a class="btn-link" href="index.php?method=delete-user&id=<?php echo $value['id'];?>">Delete</a></div>
                                </td>
                        </tr>

                    <?php } ?>
                    <?php echo (isset($logDelete)) ? "<script type='text/javascript'>alert('Deleted!');</script>" : ""; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
</body>

</html>