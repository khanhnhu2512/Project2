<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['management_site']['title_website']; ?></title>
    <link rel="SHORTCUT ICON" href="/library/images/image-bg/<?php echo $_SESSION['management_site']['logo_website']; ?>">
    <link rel="stylesheet" href="../public/css/admin/home.css">
    <link type="text/css" rel="stylesheet" href="../public/fontawesome-free-5.13.0-web/css/all.css">
    <link type="text/css" rel="stylesheet" href="../public/bootstrap4/bootstrap-4.5.0-dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/admin/home.css">
    <script src="../public/jquery/jquery-3.5.1.min.js"></script>
    <style>

    </style>
</head>

<body>
    <div class="container-fluid padding">
    <div class="header paddingLR">
            <div class="navbar-brand p-0 page_brand">
            <img src="/library/images/image-bg/<?php echo $_SESSION['management_site']['logo_brand']; ?>" height="35" alt="" class="d-inline-block align-top"> <?php echo $_SESSION['management_site']['name_brand']; ?>
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
                                ?>
                                <div class="m-0 dropdown-divider"></div>
                                <div class="row m-0 text-left align-content-center p-0">
                                    <div class="text-dark col-10">
                                        <p class="cart-name mt-2 mb-2 "><?php echo $value['content']; ?></p>
                                    </div>
                                    <a class="col p-0 m-0 flex-center text-decoration-none" href="index.php?method=delete-notification&methodB=<?php echo $method; ?>&id=<?php echo $value['id']; ?>">
                                        <i class="fas fa-times fa-1x"></i>
                                    </a>
                                </div>
                                <div class="m-0 dropdown-divider"></div>
                            <?php } ?>
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
                    <?php $i=0; if ($_SESSION['permission']['dashboard'] == 1) { ?>
                        <li>
                            <a onclick="collapse(<?php echo $i; $i++ ?>)" class='menu-item product'><i class="text-white w-15 text-center fas fa-tachometer-alt"></i> Dashboard</a>
                            <ul class="child-menu">
                                <li class='child-menu-item'>
                                    <a href="index.php?method=home">> Analytics</a>
                                </li>

                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($_SESSION['permission']['product_see'] == 1) { ?>
                        <li>
                            <a onclick="collapse(<?php echo $i; $i++ ?>)" class='menu-item product'><i class="text-white w-15 text-center fas fa-box-open"></i> Catalogs</a>
                            <ul class="child-menu">
                                <li class='child-menu-item'>
                                    <a href="index.php?method=list-product">> List Products</a>
                                </li>
                                <li class='child-menu-item'>
                                    <a href="index.php?method=category">> Category</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($_SESSION['permission']['order_see'] == 1) { ?>
                        <li>
                            <a onclick="collapse(<?php echo $i; $i++ ?>)" class='menu-item product'><i class=" text-white w-15 text-center fas fa-dollar-sign"></i> Sales</a>
                            <ul class="child-menu">
                                <li class='child-menu-item'>
                                    <a href="index.php?method=list-order">> Order</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (($_SESSION['permission']['user_see'] == 1) && ($_SESSION['permission']['permission'] == 1)) { ?>
                        <li>
                            <a onclick="collapse(<?php echo $i; $i++ ?>)" class='menu-item product'><i class=" text-white w-15 text-center fas fa-male"></i> Customers</a>
                            <ul class="child-menu">
                                <?php if ($_SESSION['permission']['user_see'] == 1) { ?>
                                    <li class='child-menu-item'>
                                        <a href="index.php?method=list-user">> Users</a>
                                    </li>
                                <?php } ?>
                                <?php if ($_SESSION['permission']['permission'] == 1) { ?>
                                    <li class='child-menu-item'>
                                        <a href="index.php?method=role">> Permissions</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($_SESSION['permission']['notifications'] == 1) { ?>
                        <li>
                            <a onclick="collapse(<?php echo $i; $i++ ?>)" class='menu-item product'><i class="w-15 text-center text-white fas fa-pager"></i> Content</a>
                            <ul class="child-menu">
                                <li class='child-menu-item'>
                                    <a href="index.php?method=notification">> Notification</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($_SESSION['permission']['management'] == 1) { ?>
                        <li>
                            <a onclick="collapse(<?php echo $i; $i++ ?>)" class='menu-item product'><i class="w-15 text-center text-white fas fa-sliders-h"></i> Website management</a>
                            <ul class="child-menu">
                                <li class='child-menu-item'>
                                    <a href="index.php?method=custom">> Settings</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a onclick="collapse(<?php echo $i; $i++ ?>)" class='menu-item product'><i class="w-15 text-center text-white fas fa-sliders-h"></i> Logs</a>
                            <ul class="child-menu">
                                <li class='child-menu-item'>
                                    <a href="index.php?method=logs">> View</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-10" style="height: 93vh;">
                <div class="row justify-content-between pt-3 col pr-0 ml-0 pl-0">
                    <h4>Role</h4>
                    <div>
                        <a href="index.php?method=add-role" class="btn m-0 btn-danger">Add role</a>
                    </div>
                </div>
                <table class="text-center" border="1px" width="100%" cellpadding="0" cellspacing="0">
                    <tr class="font-weight-bold">
                        <td class="p-1" style="width:">ID</td>
                        <td class="p-1" style="">Name</td>
                        <td class="p-1">Dashboard</td>
                        <td class="p-1">Products</td>
                        <td class="p-1">Order</td>
                        <td class="p-1" style="">User</td>
                        <td class="p-1">Permission</td>
                        <td class="p-1">Notifications</td>
                        <td class="p-1">Management site</td>
                        <td class="p-1" style="width: 150px"></td>
                    </tr>
                    <tr>
                        <?php $id = 0;
                        foreach ($permission as $key => $value) { 
                             ?>
                            <td class="">
                                <?php echo $value['id_lv']; ?>
                            </td>
                            <td style="">
                                <?php echo ($role[$id]['name']); $id++; ?>
                            </td>
                            <td>
                                <?php echo ($value['dashboard'] == 1) ? "See" : ""; ?>
                            </td>
                            <td>
                                <?php echo ($value['product_see'] == 1) ? "See, " : ""; ?>
                                <?php echo ($value['product_add'] == 1) ? "Add, " : ""; ?>
                                <?php echo ($value['product_edit'] == 1) ? "Edit, " : ""; ?>
                                <?php echo ($value['product_delete'] == 1) ? "Delete" : ""; ?>
                            </td>
                            <td style="width: 100px">
                                <?php echo ($value['order_see'] == 1) ? "See, " : ""; ?>
                                <?php echo ($value['order_confirm'] == 1) ? "Confirm, " : ""; ?>
                                <?php echo ($value['order_delete'] == 1) ? "Delete" : ""; ?>
                            </td>
                            <td>
                                <?php echo ($value['user_see'] == 1) ? "See, " : ""; ?>
                                <?php echo ($value['user_edit'] == 1) ? "Edit, Delete" : ""; ?>
                            </td>
                            <td>
                                <?php echo ($value['permission'] == 1) ? "Allow" : ""; ?>
                            </td>
                            <td>
                                <?php echo ($value['notifications'] == 1) ? "Allow" : ""; ?>
                            </td>
                            <td>
                                <?php echo ($value['management'] == 1) ? "Allow" : ""; ?>
                            </td>
                            <?php if($value['id_lv']!=100){ ?>
                            <td class="display__body-btn text-center">
                                <div class="btn btn-outline-danger mr-1"><a class="btn-link" href="index.php?method=edit-role&id=<?php echo $value['id_lv']; ?>">Edit</a></div>
                                <div class="btn btn-outline-danger"><a class="btn-link" href="index.php?method=delete-role&id=<?php echo $value['id_lv']; ?>">Delete</a></div>
                            </td>
                            <?php } ?>
                    </tr>

                <?php } ?>
                <?php echo (isset($logDelete)) ? "<script type='text/javascript'>alert('Deleted!');</script>" : ""; ?>
                </table>
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