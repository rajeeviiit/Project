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
                            <?php
                            if (isset($_GET['user_id'])){
                                $user_id = $_GET['user_id'];
                                $student_data = view_student_by_id($user_id); ?>
                            <div class="profile-pic text-center">
                                <img src="../view/profile_pic/<?php echo $student_data['profile_pic']; ?> ?>" style="width: 200px;height: 200px;" class="avatar img-circle" alt="profile_pic" / >
                            </div>
                            <hr id="line">
                            <h4 class="username text-center"><?php echo $student_data['username']; ?></h4>
                            <div class="information">
                                <h3 class="full-name"><?php echo $student_data['first_name']?> <?php echo $student_data['last_name']?></h3>
                                <p class="mail-id"><?php echo $student_data['email']; ?></p>
                                <p class="mail-id">Batch: <?php echo $student_data['batch']; ?></p>
                                <p class="mail-id">Stream: <?php echo $student_data['stream']; ?></p>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6 col-xs-12 history-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">Registered Books</div>
                        <div class="panel-body">
                            <?php $register_book = student_register_book($_GET['user_id']);
                                if(mysql_num_rows($register_book)>0){
                            ?>
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Book Name</th>
                                    <th>Issue Date</th>
                                    <th>Return Date</th>
                                    <th>Fine</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $num = 0;
                                while ($row = mysql_fetch_array($register_book)){
                                    $num++;
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $num; ?></th>
                                        <td><?php echo $row['book_name']?></td>
                                        <td><?php echo date( 'd-m-Y', strtotime($row['register_date']) )?></td>
                                        <td><?php echo date( 'd-m-Y',strtotime('+5 days',strtotime($row['register_date']) ))?></td>
                                        <td>-</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                                <?php }
                                else{
                                    echo "No Requested Book";
                                }?>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Issued Book</div>
                        <div class="panel-body">
                            <?php $issue_book = student_issue_book($_GET['user_id']);
                            if(mysql_num_rows($issue_book)>0){
                            ?>
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Book Name</th>
                                    <th>Issue Date</th>
                                    <th>Return Date</th>
                                    <th>Fine</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $num = 0;
                                while ($row = mysql_fetch_array($issue_book)){
                                    $num++;
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $num; ?></th>
                                        <td><?php echo $row['book_name']?></td>
                                        <td><?php echo date( 'd-m-Y', strtotime($row['issue_date']) )?></td>
                                        <td><?php echo date( 'd-m-Y',strtotime('+5 days',strtotime($row['issue_date']) ))?></td>
                                        <td>-</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <?php }
                            else{
                                echo "No Issued Book";
                            }?>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Book History</div>
                        <div class="panel-body">
                            <?php $history = student_history($_GET['user_id']);
                            if(mysql_num_rows($history)>0){
                            ?>
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Book Name</th>
                                    <th>Issue Date</th>
                                    <th>Return Date</th>
                                    <th>Fine</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $num = 0;
                                while ($row = mysql_fetch_array($history)){
                                    $num++;
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $num; ?></th>
                                        <td><?php echo $row['book_name']?></td>
                                        <td><?php echo date( 'd-m-Y', strtotime($row['issue_date']) )?></td>
                                        <td><?php echo date( 'd-m-Y', strtotime($row['returned_date']) )?></td>
                                        <td>-</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <?php }
                            else{
                                echo "No Book History";
                            }?>
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