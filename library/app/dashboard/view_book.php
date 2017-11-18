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
                    if (isset($_GET['success'])==true) {
                    echo "<div class='alert alert-success'>Successfully Delete Book
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>";
                    }
                 ?>
            <div class="panel panel-default">
                <div class="panel-heading">Book View</div>
                <div class="panel-body" style="padding: 10px;">
                    <form class="form-inline" action="../controller/book.php" method="post" role="form">
                        <div class="form-group">
                            <label class="control-label" for="email">Book Category: </label>
                            <?php $result = view_cat();?>
                            <select class="form-control" id="email" name="cat_name" required>
                                <option value="">Select Category</option>
                                <?php while ($row = mysql_fetch_array($result)) {?>
                                    <option value="<?php echo $row['book_category_name'] ?>" ><?php echo $row['book_category_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-default" name="view_book_list">Submit</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_GET['cat_id']) == true) {
                        $cat_id = $_GET['cat_id'];
                        $result = view_book($cat_id);
                        if(mysql_num_rows($result)>0){
                    ?>
                    <table class="table table-bordered table-responsive" style="margin-top: 20px;">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Book Name</th>
                            <th>ISBN NO</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>No of Copies</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $num = 0;
                            while ($row = mysql_fetch_assoc($result)) {
                                $book_id = $row['book_id'];
                                $num++;
                                ?>
                            <tr>

                                <th scope="row"><?php echo $num; ?></th>
                                <td><?php echo $row['book_name']; ?></td>
                                <td><?php echo $row['isbn_no']; ?></td>
                                <td><?php echo $row['author']; ?></td>
                                <td><?php echo $row['edition']; ?></td>
                                <td><?php echo $row['no_of_copies']; ?></td>
                                <td>
                                    <form class="form-inline text-center" action="../controller/book.php?book_id=<?php echo $row['book_id']; ?>&no_of_copy=<?php echo $row['no_of_copies']; ?>" method="post" role="form" onsubmit="return confirm('Are you sure? Because All Book in this Category are deleted.');">
                                        <div class="form-group">
                                            <label class="control-label" for="email">Book Code: </label>
                                            <?php $result1 = view_book_code($book_id);?>
                                            <select class="form-control" id="email" name="book_code" required>
                                                <option value="">Select Code</option>
                                                <?php while ($row1 = mysql_fetch_array($result1)) {?>
                                                    <option value="<?php echo $row1['book_code']; ?>" ><?php echo $row1['book_code']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger" name="delete_book">Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <?php }else{
                    echo "No Book Found";
                    }
                    } ?>
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