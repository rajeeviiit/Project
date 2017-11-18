<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/image/logo.ico">
    <link rel="shortcut icon" type="image/x-icon" href=assets/image/logo.ico">
    <title>Dashboard - Book</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
</head>
<body>
<div class="app-container">
    <div class="row content-container">
    <div class="row content-container">
        <?php
        include "init.php";
        admin_login_redirect();
        include_once "navbar.php";
        include_once "sidebar.php";


        //include_once "footer.php";
        ?>
        <div class="main-content container">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?php
                if (isset($_GET['errors']) == true) {
                    $errors = $_GET['errors'];
                    ?>
                    <div class="alert alert-danger fade in">
                        <?php
                        print_r($errors);
                        ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                }
                if (isset($_GET['success']) && empty($_GET['success'])) {
                    echo "<div class='alert alert-success'>Successfully Add New Book
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        </div>";
                }
                ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Book</div>
                    <div class="panel-body" style="padding: 10px;">
                        <form class="form-horizontal" action="../controller/book.php" method="post" role="form">
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Book Category:</label>
                                <div class="col-sm-8">
                                    <?php $result = view_cat();?>
                                    <select class="form-control" id="email" name="cat_name" required>
                                        <option value="">Select Category</option>
                                        <?php while ($row = mysql_fetch_array($result)) {?>
                                        <option value="<?php echo $row['book_category_name'] ?>" ><?php echo $row['book_category_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Book Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="email" placeholder="Book Name" name="book_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="email">ISBN No.:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="email" placeholder="ISBN No" name="isbn" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Author:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="email" placeholder="Author" name="author" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Edition:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="email" placeholder="Edition" name="edition" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-default" name="set_new_book">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Bock Code</div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="../controller/book.php" method="post" role="form">
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="normal">Book Category:</label>
                                <div class="col-sm-8">
                                    <?php $result = view_cat();?>
                                    <select class="form-control" id="normal" name="cat_name" required>
                                        <option value="">Select Category</option>
                                        <?php while ($row = mysql_fetch_array($result)) {?>
                                            <option value="<?php echo $row['book_category_name'] ?>" ><?php echo $row['book_category_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="email">ISBN No.:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="email" placeholder="ISBN No" name="isbn" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Book Code:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="email" placeholder="Book Code" name="book_code" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-default" name="add_book_code">Add Book Code</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src='assets/js/bootstrap.min.js'></script>
<script src="assets/js/app.js"></script>
</body>
</html>