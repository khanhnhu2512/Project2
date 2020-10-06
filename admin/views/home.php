<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="SHORTCUT ICON" href="../library/images/image-bg/LogoN-Black.png">
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
                    <li><a href="index.php?method=role">Permission</a></li>
                    <li><a href="index.php?method=notification">Notification</a></li>
                    <li><a href="index.php?method=custom">Custom</a></li>
                </ul>
            </div>
            <div class="col-10">
                <!-- row1 -->
                <div class="row p-3 pt-5 justify-content-between text-center">
                    <div class="col-2 rounded p-2">
                        <h5 class="m-2">Total Order</h5>
                        <p><?php echo $total_order; ?></p>
                    </div>
                    <div class="col-2 rounded p-2">
                        <h5 class="m-2">Total revenue</h5>
                        <p><?php echo $total_revenue; ?> USD</p>
                    </div>
                    <div class="col-2 rounded p-2">
                        <h6 class="m-2">Total products sold</h6>
                        <p><?php echo $total_product; ?></p>
                    </div>
                    <div class="col-2 rounded p-2">
                        <h6 class="m-2">Difference compared to the previous month</h6>
                        <p><?php echo $profit; ?></p>
                    </div>
                </div>
                <!-- table -->
                <div class="row p-3 pad-t-3 justify-content-between text-center">
                    <!-- tb1 -->
                    <div class="col-3 p-0">
                        <h4 class="p-3">Best selled Products</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Product's Name</th>
                                    <th scope="col">Sold</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($best_selled as $k => $v) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td><?php echo $v['name']; ?></td>
                                        <td><?php echo $v['sold']; ?></td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- tb2 -->
                    <div class="col-3 p-0">
                        <h4 class="p-3">Most view Products</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Product's Name</th>
                                    <th scope="col">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($most_view as $k => $v) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td><?php echo $v['name']; ?></td>
                                        <td><?php echo $v['view']; ?></td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- tb3 -->
                    <div class="col-5 p-0">
                        <h4 class="p-3">Customers</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr class="">
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Total amount purchased</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Otto</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>Otto</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
</body>

</html>