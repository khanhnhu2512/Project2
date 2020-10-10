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
    <div class="container-fluid p-0">
    <div class="header paddingLR">
            <div class="navbar-brand p-0 page_brand">
                <img src="../library/images/image-bg/LogoN-White.png" height="35" alt="" class="d-inline-block align-top"> My store
            </div>
            <div class="nav-right">
                <div class="col-4 text-right mr-1 p-0">
                    <button class="btn btn-dark border-0 notice-icon" onclick="collapseNotice()" type="button" id="dropdownNoti">
                        <i class="fas fa-bell text-white fa-1x btn-cart"></i>
                    </button>
                    <div class="nav-notice">
                        <?php $i = 0;
                        if (isset($_SESSION['noti'])) {
                            foreach ($_SESSION['noti'] as $key => $value) {
                                $i++; ?>
                                <div class=" dropdown-item">
                                    <img class="cart-img" src="./library/images/image-product/<?php echo $value['image']; ?>" alt="">
                                    <div class="cartProduct">
                                        <p class="cart-name"><?php echo $value['name']; ?></p>
                                        <div class="cartProduct-price">
                                            <p class="cart-price"><?php echo $value['price']; ?>$</p>
                                            <p>x <span><?php echo $value['qty']; ?></span></p>
                                        </div>
                                    </div>
                                    <a href="index.php?method=delete-cart&id=<?php echo $value['id']; ?>">
                                        <i class="fas fa-times fa-1x"></i>
                                    </a>
                                </div>
                                <div class="dropdown-divider"></div>
                            <?php } ?>
                            <p class="total">Total: <span><?php echo $total; ?>$</span></p>
                        <?php } ?>

                    </div>
                </div>
                <div class="">
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
                                <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
                                <a class="link" href="index.php?method=signout">Sign out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col">
            <div class="menu col-2 p-0 h-auto">
                <ul>
                    <li>
                        <a onclick="collapse(0)" class='menu-item product'><i class="text-white w-15 text-center fas fa-tachometer-alt"></i> Dashboard</a>
                        <ul class="child-menu">
                            <li class='child-menu-item'>
                                <a href="index.php?method=home">> Analytics</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a onclick="collapse(1)" class='menu-item product'><i class="text-white w-15 text-center fas fa-box-open"></i> Catalogs</a>
                        <ul class="child-menu">
                            <li class='child-menu-item'>
                                <a href="index.php?method=list-product">> List Products</a>
                            </li>
                            <li class='child-menu-item'>
                                <a href="index.php?method=category">> Category</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a onclick="collapse(2)" class='menu-item product'><i class=" text-white w-15 text-center fas fa-dollar-sign"></i> Sales</a>
                        <ul class="child-menu">
                            <li class='child-menu-item'>
                                <a href="index.php?method=list-order">> Order</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a onclick="collapse(3)" class='menu-item product'><i class=" text-white w-15 text-center fas fa-male"></i> Customers</a>
                        <ul class="child-menu">
                            <li class='child-menu-item'>
                                <a href="index.php?method=list-user">> Users</a>
                            </li>
                            <li class='child-menu-item'>
                                <a href="index.php?method=role">> Permissions</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a onclick="collapse(4)" class='menu-item product'><i class="w-15 text-center text-white fas fa-pager"></i> Content</a>
                        <ul class="child-menu">
                            <li class='child-menu-item'>
                                <a href="index.php?method=notification">> Notification</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a onclick="collapse(5)" class='menu-item product'><i class="w-15 text-center text-white fas fa-sliders-h"></i> Website management</a>
                        <ul class="child-menu">
                            <li class='child-menu-item'>
                                <a href="index.php?method=custom">> Settings</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-10" style="height: 93vh;">
                <div class="row justify-content-between col pr-0 ml-0 pl-0">
                    <h4>User</h4>
                    <!-- <div>
                        <a href="index.php?method=add-role" class="btn m-0 btn-danger">Add role</a>
                    </div> -->
                </div>
                
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
                                <div class="btn btn-outline-danger mr-1"><a class="btn-link" href="index.php?method=edit-user&id=<?php echo $value['id']; ?>">Edit</a></div>
                                <div class="btn btn-outline-danger"><a class="btn-link" href="index.php?method=delete-user&id=<?php echo $value['id']; ?>">Delete</a></div>
                            </td>
                    </tr>

                <?php } ?>
                <?php echo (isset($logDelete)) ? "<script type='text/javascript'>alert('Deleted!');</script>" : ""; ?>
                </table>
            </div>

        </div>
        
    </div>
    </div>



    <script>
        var isProductOpened = false;

        function collapse(i) {
            const childMenu = document.querySelectorAll('.child-menu');
            if (!isProductOpened) {
                childMenu[i].classList.add('child-menu--active');
                isProductOpened = true;
            } else if (isProductOpened) {
                childMenu[i].classList.remove('child-menu--active');
                isProductOpened = false;
            }


        }
        var isProductOpenedNotice = false;

        function collapseNotice() {
            // notice bell

            console.log(isProductOpenedNotice);
            const notice_icon = document.querySelector('.notic-icon');
            const nav_notice = document.querySelector('.nav-notice');
            if (!isProductOpenedNotice) {
                nav_notice.classList.add('nav-notice-active');
                isProductOpenedNotice = true;
            } else if (isProductOpenedNotice) {
                nav_notice.classList.remove('nav-notice-active');
                isProductOpenedNotice = false;
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
</body>

</html>