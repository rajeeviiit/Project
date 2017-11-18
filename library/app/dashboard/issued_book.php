<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/image/logo.ico">
    <link rel="shortcut icon" type="image/x-icon" href=assets/image/logo.ico">
    <title>Dashboard - Home</title>
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
                if (isset($_GET['success']) && empty($_GET['success'])) {
                    echo "<div class='alert alert-success'>
                            Successfully Return Book
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        </div>";
                }
                ?>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Issued Books</div>
                    <div class="panel-body">
                        <?php $result = view_issued_book();
                        if (mysql_num_rows($result)>0){
                        ?>
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Student Name</th>
                                <th>Student ID</th>
                                <th>Book Name</th>
                                <th>Book Category</th>
                                <th>Book Code</th>
                                <th>Issue Date</th>
                                <th>Return</th>
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
                                    <td><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['book_name'] ?></td>
                                    <td><?php echo $row['book_category_name'] ?></td>
                                    <td><?php echo $row['book_code'] ?></td>
                                    <td><?php echo $row['issue_date'] ?></td>
                                    <td><form action="../controller/book.php?book_id=<?php echo $row['book_id'] ?>&user_id=<?php echo $row['user_id'] ?>&book_code=<?php echo $row['book_code'] ?>" method="post" class="text-center"><button class="btn btn-success" name="return_book">Return</button></form></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <?php } else{
                            echo "No Book Issued";
                        } ?>
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