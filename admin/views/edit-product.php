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
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #000;
        }

        .img-upload {
            width: 100px;
        }

        .img-upload img {
            width: 100%;
            height: auto;
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
                <h3 class="col">Edit Product</h3>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group col">
                        <label for="name" class="col-form-label">Product Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name..." value="<?php echo (isset($_POST['submit'])) ? $_POST['name'] : $product[0]['name']; ?>">
                    </div>
                    <div class="form-group col">
                        <label for="type" class="col-form-label">Category</label>
                        <select name="type" id="type">
                            <?php foreach ($_SESSION['type'] as $key => $value) { ?>
                                <option value="<?php echo $value['id']; ?>" <?php echo (isset($product[0]['type']) && $product[0]['type'] == $value['id']) ? "selected" : ""; ?>><?php echo $value['name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="price" class="col-form-label">Price</label>
                        <input type="number" id="price" name="price" class="form-control" placeholder="Price..." value="<?php echo (isset($_POST['submit'])) ? $_POST['price'] : $product[0]['price']; ?>">
                    </div>
                    <div class="form-group col">
                        <label for="qty" class="col-form-label">Quantity</label>
                        <input type="number" id="qty" name="qty" class="form-control" placeholder="Quantity..." value="<?php echo (isset($_POST['submit'])) ? $_POST['qty'] : $product[0]['qty']; ?>">
                    </div>
                    <div class="form-group col">
                        <p class="col-form-label">Description...</p>
                        <textarea name="description" id="description" cols="100" rows="5"><?php echo (isset($_POST['submit'])) ? $_POST['description'] : $product[0]['description']; ?></textarea>
                    </div>

                
                    <legend class="col">Upload Image</legend>
                    <div class="img-upload">
                        <img src="../images/image-product/<?php echo (isset($_POST['submit'])) ? $_SESSION['image-upload']['name'] : $product[0]['image']; ?>" alt="">
                    </div>
                    <div class="form-group col">
                        <label for="fileToUpload">Chọn file</label>
                        <input id="fileToUpload" type="file" name="fileToUpload"/>
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