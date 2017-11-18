<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-expand-toggle">
                <i class="fa fa-bars icon"></i>
            </button>
            <ol class="breadcrumb navbar-breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
            <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                <i class="fa fa-th icon"></i>
            </button>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                <i class="fa fa-times icon"></i>
            </button>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <i class="fa fa-comments-o"></i>
                </a>
                <ul class="dropdown-menu animated fadeInDown">
                    <li class="title">
                        Notification <span class="badge pull-right">1</span>
                    </li>
                    <li class="message">
                        No new message
                    </li>
                </ul>
            </li>
            <li class="dropdown danger">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                        class="fa fa-star-half-o"></i> 4</a>
                <ul class="dropdown-menu danger animated fadeInDown">
                    <li class="title">Notification <span class="badge pull-right">4</span></li>
                    <li>
                        <ul class="list-group notifications">
                            <a href="#">
                                <li class="list-group-item"><span class="badge">1</span> <i
                                        class="fa fa-exclamation-circle icon"></i> New Registration
                                </li>
                            </a>
                            <a href="#">
                                <li class="list-group-item"><span class="badge success">1</span> <i
                                        class="fa fa-check icon"></i> New Order
                                </li>
                            </a>
                            <a href="#">
                                <li class="list-group-item"><span class="badge danger">1</span> <i
                                        class="fa fa-comments icon"></i> Message
                                </li>
                            </a>
                            <a href="#">
                                <li class="list-group-item">View all</li>
                            </a>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown profile">
                <?php if(admin_logged_in()){?>
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                     <?php echo $admin_data['first_name']; ?>
                     <span class="caret"></span></a>
                    <ul class="dropdown-menu animated fadeInDown">
                    <li class="profile-img"><img src="../view/profile_pic/<?php echo $admin_data['admin_pic']; ?>" class="profile-img"></li>
                    <hr>
                    <li>
                        <div class="profile-info">
                            <h4 class="username"><?php echo $admin_data['username']; ?></h4>
                            <p><?php echo $admin_data['email']; ?></p>
                            <div class="btn-group margin-bottom-2x" role="group">
                                <a href="change_password.php"><button type="button" class="btn btn-default" style="margin: 10px;">Change Password
                                    </button></a><br>
                                <a href="profile.php"><button type="button" class="btn btn-default"><i class="fa fa-user"></i> Profile
                                </button></a>
                                <a href="logout.php"><button type="button" class="btn btn-default"><i class="fa fa-sign-out"></i> Logout
                                </button></a>
                            </div>
                        </div>
                    </li>
                </ul>
                <?php } else{ ?>
                    <a href="login.php" role="button" aria-expanded="false">Login</a>
                <?php } ?>
            </li>
        </ul>
    </div>
</nav>

