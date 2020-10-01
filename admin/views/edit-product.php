<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="SHORTCUT ICON" href="../library/images/image-bg/LogoN-Black.png">
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
                <h3 class="col pt-3">Edit Product</h3>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group col">
                        <label for="name" class="col-form-label">Product Name</label>
                        <input  type="text" id="name" name="name" class="form-control w-50" placeholder="Name..." value="<?php echo (isset($_POST['submit'])) ? $_POST['name'] : $product['name']; ?>">
                    </div>
                    <div class="form-group col">
                        <label for="type" class="col-form-label">Category : <?php echo $category[$product['type']-1]['name']; ?></label>
                    </div>
                    <div class="form-group col">
                        <label for="status" class="col-form-label">Status </label>
                        <select name="status" id="status">
                            <option value="0" <?php echo ($product['status']==0) ? "selected":""; ?>>Invisible</option>
                            <option value="1" <?php echo ($product['status']==1) ? "selected":""; ?>>Visible</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="price" class="col-form-label">Price</label>
                        <input  type="number" id="price" name="price" class="form-control w-25 " placeholder="Price..." value="<?php echo (isset($_POST['submit'])) ? $_POST['price'] : $product['price']; ?>">
                    </div>
                    <div class="form-group col">
                        <label for="qty" class="col-form-label">Quantity</label>
                        <input type="number" id="qty" name="qty" class="form-control w-25" placeholder="Quantity..." value="<?php echo (isset($_POST['submit'])) ? $_POST['qty'] : $product['qty']; ?>">
                    </div>
                    <div class="form-group col">
                        <p class="col-form-label">Description...</p>
                        <textarea name="description" id="description" cols="100" rows="5"><?php echo (isset($_POST['submit'])) ? $_POST['description'] : $product['description']; ?></textarea>
                    </div>


                    <legend class="col">Upload Image</legend>
                    <div class="img-upload col-3 pb-2">
                        <img class="" src="../library/images/image-product/<?php echo (isset($_POST['submit'])) ? $_SESSION['image-upload']['name'] : $product['image']; ?>" alt="">
                    </div>
                    <div class="form-group col">
                        <label for="fileToUpload">Chọn file</label>
                        <input id="fileToUpload" type="file" name="fileToUpload" />
                    </div>
                    <legend class="col">Information</legend> //ty lam tiep phan info
                    <div class="form-group col">
                        <label for="qty" class="col-form-label">Quantity</label>
                        <input type="number" id="qty" name="qty" class="form-control w-25" placeholder="Quantity..." value="<?php echo (isset($_POST['submit'])) ? $_POST['qty'] : $product['qty']; ?>">
                    </div>
                    <!-- <div class="form-group col">
                        <button id="upload" class="btn btn-primary">Upload</button>
                    </div> -->
                    <div class="btn w-100">
                        <input class="btn btn-lg btn-danger" name="submit" type="submit" value="Submit">
                    </div>
                </form>

            </div>

        </div>
    </div>




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