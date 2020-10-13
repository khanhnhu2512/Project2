<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['management_site']['title_website']; ?></title>
    <link rel="SHORTCUT ICON" href="/library/images/image-bg/<?php echo $_SESSION['management_site']['logo_website']; ?>">
    <link rel="stylesheet" href="../public/css/admin/edit-product.css">
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
                    <?php } ?>
                </ul>
            </div>
            <div class="col-10" style="height: 93vh;">
                <h3 class="col pt-3">Edit category</h3>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group col">
                        <label for="name" class="col-form-label">Category's Name</label>
                        <input type="text" id="name" name="name" class="form-control w-50" placeholder="Name..." value="<?php echo (isset($_POST['submit'])) ? $_POST['name'] : $category['name']; ?>"" required="">
                    </div>
                    <legend class=" col">Infomations</legend>
                        <table class="text-center" border="1px" width="100%" cellpadding="0" cellspacing="0">
                            <tr class="font-weight-bold">
                                <?php foreach ($category_information_name as $v) { ?>
                                    <td class="p-1"><?php echo $v; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <?php foreach ($category_information as $k => $v) { ?>
                                    <?php if ($k != 'id_category') { ?>
                                        <td class="p-1">
                                            <input type="checkbox" name="<?php echo $k; ?>" value="1" <?php if ($v == 1) {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                                        </td>
                                <?php }
                                } ?>
                            </tr>
                        </table>
                        <div class="btn w-100">
                            <input class="btn btn-lg btn-danger" name="submit" type="submit" value="Submit">
                        </div>
                </form>

            </div>

        </div>
    </div>

    <?php if (isset($log)) {
        echo $log;
    } ?>

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
    <script type="text/javascript">
        $('#upload').on('click', function() {

            var file_data = $('#fileToUpload').prop('files')[0];
            //lấy ra kiểu file
            var type = file_data.type;
            //Xét kiểu file được upload
            var match = ["image/jpeg", "image/png", "image/jpg", ];
            //kiểm tra kiểu file
            if (type == match[0] || type == match[1] || type == match[2]) {
                //khởi tạo đối tượng form data

                var form_data = new FormData();
                //thêm files vào trong form data
                form_data.append('file', file_data);
                console.log(file_data);
                //sử dụng ajax post
                $.ajax({
                    url: 'index.php?method=add-product&action=uploadimg', // gửi đến file upload.php 
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function(res) {
                        console.log("ok");
                        $('#fileToUpload').val('');
                    }
                });
            } else {
                console.log(file_data.type);
                $('#fileToUpload').val('');
            }
            return false;
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
</body>

</html>