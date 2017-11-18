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
                    if (isset($_GET['success']) && empty($_GET['success'])) {
                        echo "<div class='alert alert-success'>
                            Successfully Delete Student
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        </div>";
                    }
                    ?>
                </div>
                <div class="col-lg-12 col-md-16 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">View Student</div>
                        <div class="panel-body" style="padding: 10px;">
                            <form class="form-horizontal" action="../controller/student.php" method="post" role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Batch</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="email" name="batch" required>
                                            <option value="">Select Batch</option>
                                            <option value="2013" >2013</option>
                                            <option value="2014" >2014</option>
                                            <option value="2015" >2015</option>
                                            <option value="2016" >2016</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Stream</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="email" name="stream" required>
                                            <option value="">Select Stream</option>
                                            <option value="Computer Sceince Engneering" >Computer Sceince Engneering</option>
                                            <option value="Information Technology" >Information Technology</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-default" name="view_student">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if (isset($_GET['batch'],$_GET['stream']) == true) {
                                $batch = $_GET['batch'];
                                $stream = $_GET['stream'];

                                $result = view_student($batch,$stream);

                                if(mysql_num_rows($result)>0){
                                    echo mysql_num_rows($result)." Students in This Course";
                                    ?>
                                <table class="table table-bordered table-responsive" style="margin-top: 20px;">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>View</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $num = 0;
                                    while ($row = mysql_fetch_assoc($result)) {
                                        $user_id= $row['user_id'];
                                        $num++;
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $num; ?></th>
                                            <td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><a href="student_profile.php?user_id=<?php echo $row['user_id']; ?>"><button class="btn btn-success" name="delete_cat"">View</button></a></td>
                                            <td><form action="../controller/student.php?user_id=<?php echo $row['user_id'] ?>" method="post" class="text-center" onsubmit="return confirm('Are you sure?');"><button class="btn btn-danger" name="delete_student" >Delete</button></form></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            <?php }
                                else{
                                    echo "No Student in This Course";
                                }
                            }
                            ?>
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