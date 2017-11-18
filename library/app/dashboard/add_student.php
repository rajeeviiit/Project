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
                    if (isset($_GET['success'])==true) {
                        echo "<div class='alert alert-success'>".$_GET['success']." 
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        </div>";
                    }
                    ?>
                </div>
                <div class="col-lg-12 col-md-16 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add New Student</div>
                        <div class="panel-body" style="padding: 10px;">
                            <form class="form-horizontal" action="../controller/student.php" method="post" role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="email" placeholder="First Name" name="first_name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="email" placeholder="Last Name" name="last_name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="email" placeholder="Username" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Gender</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="email" name="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male" >Male</option>
                                            <option value="Female" >Female</option>
                                        </select>
                                    </div>
                                </div>
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
                                    <label class="control-label col-sm-3" for="email">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="email" placeholder="Password" name="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="email" placeholder="Confirm Password" name="password_again" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-default" name="add_student">Submit</button>
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