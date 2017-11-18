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
            <div class="row profile">
                <!-- left column -->
                <div class="col-md-3 col-sm-6 col-xs-12 profile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">Profile</div>
                        <div class="panel-body">
                            <form id="uploadimage" action="../controller/upload_image.php" method="post"
                                  enctype="multipart/form-data">
                                <div class="profile-pic">
                                    <img id="previewing" src="profile_pic/<?php echo $user_data['profile_pic']; ?>"
                                         class="avatar img-circle" alt="Profile-pic" style="height: 150px;width: auto;"
                                    / >
                                </div>
                                <hr id="line">
                                <div id="selectImage" class="text-center">
                                    <label >Select Your Image</label><br/>
                                    <input type="file" name="file" id="file" required/>
                                    <button type="submit" value="Upload" class="submit btn">Upload Image</button>
                                </div>
                            </form>
                            <div id="message"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6 col-xs-12 history-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">Personal Information</div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="../controller/update_profile.php" role="form" method="post">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">First Name:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" value="<?php echo $user_data['first_name']; ?>" type="text"
                                               name="first_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Last Name:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" value="<?php echo $user_data['last_name']; ?>" type="text"
                                               name="last_name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Username:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" value="<?php echo $user_data['username']; ?>" type="text"
                                               name="user_name" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" value="<?php echo $user_data['email']; ?>" type="text"
                                               name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Batch:</label>
                                    <div class="col-md-8">
                                        <input value="<?php echo $user_data['batch']; ?>" type="tel"
                                               class="form-control" name="contact_number" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Stream:</label>
                                    <div class="col-md-8">
                                        <input value="<?php echo $user_data['stream']; ?>" type="tel"
                                               class="form-control" name="contact_number" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Contact Number:</label>
                                    <div class="col-md-8">
                                        <input value="<?php echo $user_data['contact_number']; ?>" type="tel"
                                               class="form-control" name="contact_number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Address:</label>
                                    <div class="col-md-8">
                                <textarea rows="4" class="form-control"
                                          name="address"><?php echo $user_data['address']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8">
                                        <button type="submit" class="btn-lg" style="background-color:#16456c; color:white">Save
                                            changes
                                        </button>
                                        <span></span>
                                        <button type="reset" class="btn-lg" style="background-color:#16456c; color:white;">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
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