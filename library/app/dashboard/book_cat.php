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
                    echo "<div class='alert alert-success'>
                            Successfully Add New Book Category
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        </div>";
                }
                if (isset($_GET['delete_success']) && empty($_GET['delete_success'])) {
                    echo "<div class='alert alert-success'>
                            Successfully Delete Book Category
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        </div>";
                }
                ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Book Category</div>
                    <div class="panel-body">
                        <?php $result = view_cat();?>
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Book Category Name</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $num = 0;
                            while ($row = mysql_fetch_array($result)) {
                                ?>
                            <tr>
                                <?php $num++; ?>
                                <th scope="row"><?php echo $num ?></th>
                                <td><?php echo $row['book_category_name'] ?></td>
                                <td><form action="../controller/book.php?cat_id=<?php echo $row['book_category_id'] ?>" method="post" class="text-center" onsubmit="return confirm('Are you sure? Because All Book in this Category are deleted.');"><button class="btn btn-danger" name="delete_cat">Delete</button></form></td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New category</div>
                    <div class="panel-body">
                        <form action="../controller/book.php" method="post" class="text-center">
                            <label> Category name:</label>
                            <input type="text" name="category" required/><br>
                            <button type="submit" name="set_cat" value="Set" class="btn">Add</button>
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