<?php
if (logged_in() == 1) { ?>
    <nav class="navbar navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand text-hide" href="../../login.php">Logo
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>
                            Home</a></li>
                    <li><a href="books.php"><i class="fa fa-book" aria-hidden="true"></i> Books</a></li>
                    <li><a href="contact.php"><i class="fa fa-phone-square" aria-hidden="true"></i> Contact us</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-user"
                                                    aria-hidden="true"></i> <?php echo $user_data['first_name']; ?><span
                                class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="profile.php">View Profile</a></li>
                            <li><a href="edit_profile.php">Profile Setting</a></li>
                            <li><a href="change_password.php">Change Password</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
} else {
    ?>
    <nav class="navbar navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand text-hide" href="../../login.php">Logo
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>
                            Home</a></li>
                    <li><a href="books.php"><i class="fa fa-book" aria-hidden="true"></i> Books</a></li>
                    <li><a href="contact.php"><i class="fa fa-phone-square" aria-hidden="true"></i> Contact us</a></li>
                    <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
}
?>