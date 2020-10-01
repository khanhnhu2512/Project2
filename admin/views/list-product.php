<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="SHORTCUT ICON" href="../library/images/image-bg/LogoN-Black.png">
    <link type="text/css" rel="stylesheet" href="../public/css/admin/list-product.css">
    <link rel="stylesheet" href="../public/css/admin/list-product.css">
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
            <div class=" col-9 navbar-brand p-0">
                <img src="../library/images/image-bg/LogoN-White.png" height="35" alt="" class="d-inline-block align-top"> My store
            </div>
            <div class="col-3 row">
                <div class="col-4 text-right dropdown mr-1 p-0">
                    <button class="btn btn-dark dropdown-toggle border-0" type="button" id="dropdownNoti" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell text-white fa-1x btn-cart"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownNoti">
                        <?php $i = 0;
                        if (isset($_SESSION['noti'])) {
                            foreach ($_SESSION['noti'] as $key => $value) {
                                $i++; ?>
                                <div class="dropdown-item">
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
                <div class="col-7 dropdown profile text-right pt-1 pr-0">
                    <button class="p-0 btn btn-dark dropdown-toggle border-0" type="button" id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        </div>
        <div class="row col">
            <div class="menu col-2 p-0 h-auto">
                <ul>
                    <li style="background-color: #484848;">
                        <a href="index.php?method=home">Dashboard</a>
                    </li>
                    <li>
                        <a href="index.php?method=list-product">Product</a>
                    </li>
                    <li><a href="index.php?method=category">Category</a></li>
                    <li><a href="index.php?method=list-order">Order</a></li>
                    <li><a href="index.php?method=list-user">Users</a></li>
                    <li><a href="index.php?method=notification">Notification</a></li>
                    <li><a href="index.php?method=custom">Custom</a></li>
                </ul>
            </div>
            <div class="col-10">
                <div class="row pl-3 pt-3 justify-content-between">
                    <div class="">
                        <label for="">Sort by </label>
                        <select onchange="location.href=this.value" class="" name="" id="type">
                            <option value="index.php?method=list-product&type=0" <?php echo ($type == 0) ? "selected" : "";  ?>>All</option>
                            <?php foreach ($category as $k => $v) { ?>
                                <option value="index.php?method=list-product&type=<?php echo $v['id']; ?>" <?php echo ($type == $v['id']) ? "selected" : "";  ?>><?php echo $v['name']; ?></option>
                            <?php } ?>
                        </select>
                        <select onchange="location.href=this.value" class="" name="" id="sort">
                            <option value="index.php?method=list-product<?php if (isset($type)) {
                                                                            echo "&type=$type";
                                                                        } ?>&sort=new" <?php if (isset($_GET['sort'])) {
                                                                                            echo ($_GET['sort'] == 'new') ? "selected" : "";
                                                                                        } ?>>New</option>
                            <option value="index.php?method=list-product<?php if (isset($type)) {
                                                                            echo "&type=$type";
                                                                        } ?>&sort=view" <?php if (isset($_GET['sort'])) {
                                                                                            echo ($_GET['sort'] == 'view') ? "selected" : "";
                                                                                        } ?>>View</option>
                            <option value="index.php?method=list-product<?php if (isset($type)) {
                                                                            echo "&type=$type";
                                                                        } ?>&sort=price-desc" <?php if (isset($_GET['sort'])) {
                                                                                                    echo ($_GET['sort'] == 'price-desc') ? "selected" : "";
                                                                                                } ?>>Price (Desc)</option>
                            <option value="index.php?method=list-product<?php if (isset($type)) {
                                                                            echo "&type=$type";
                                                                        } ?>&sort=price-asc" <?php if (isset($_GET['sort'])) {
                                                                                                    echo ($_GET['sort'] == 'price-asc') ? "selected" : "";
                                                                                                } ?>>Price (Asc)</option>
                        </select>
                    </div>
                    <div>
                        <a href="index.php?method=add-product" class="btn btn-danger">Add product</a>
                    </div>
                </div>

                <div class="row pl-3 pt-3 pb-3 text-center">
                    <table border="1px" width="100%" cellpadding="0" cellspacing="0">
                        <tr class="font-weight-bold">
                            <td class="p-1" style="width: ">STT</td>
                            <td class="p-1" style="width: 60px">Image</td>
                            <td class="p-1" style="">Name</td>
                            <td class="p-1">Category</td>
                            <td class="p-1">Price</td>
                            <td class="p-1" style="width: 100px">Quantity</td>
                            <td class="p-1">Sold</td>
                            <td class="p-1">View</td>
                            <td class="p-1">Status</td>
                            <td class="p-1">Create time</td>
                            <td class="p-1">Last update</td>
                            <td class="p-1" style="width: 100px"></td>
                        </tr>
                        <tr>
                            <?php $i = 0;
                            foreach ($product as $key => $value) {
                                $i++; ?>

                                <td style="width: 40px">
                                    <?php echo $i; ?>
                                </td>
                                <td class="img">
                                    <img class=" p-1 w-auto" style="height: 60px;" src="../library/images/image-product/<?php echo $value['image']; ?>">
                                </td>
                                <td style="">
                                    <?php echo ($value['name']); ?>
                                </td>
                                <td>
                                    <?php echo $category[$value['type']-1]['name']; ?>
                                </td>
                                <td>
                                    <p class="p-0 m-0"><?php echo $value['price']; ?> USD</p>
                                </td>
                                <td style="width: 100px">
                                    <?php echo ($value['qty']); ?>
                                </td>
                                <td>
                                    <p class="p-0 m-0"><?php echo $value['sold']; ?></p>
                                </td>
                                <td>
                                    <p class="p-0 m-0"><?php echo $value['view']; ?></p>
                                </td>
                                <td>
                                    <p class="p-0 m-0"><?php echo ($value['status']==1)? "Visible" : "Invisible"; ?></p>
                                </td>
                                <td>
                                    <p class="p-0 m-0"><?php echo $value['create_time']; ?></p>
                                </td>
                                <td>
                                    <p class="p-0 m-0"><?php echo $value['last_updated']; ?></p>
                                </td>
                                <td class="display__body-btn">
                                    <div class="btn btn-outline-danger mr-1"><a class="btn-link" href="index.php?method=edit-product&id=<?php echo $value['id']; ?>">Edit</a></div>
                                    <div class="btn btn-outline-danger"><a class="btn-link" href="index.php?method=delete-product&id=<?php echo $value['id']; ?>">Delete</a></div>
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