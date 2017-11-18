<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <div class="icon"><img src="assets/image/logo.png"></div>
                    <div class="title"><img src="assets/image/logo_name.png"></div>
                </a>
                <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                    <i class="fa fa-times icon"></i>
                </button>
            </div>
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.php">
                        <span class="icon fa fa-tachometer"></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="panel panel-default dropdown">
                    <a data-toggle="collapse" href="#dropdown-element">
                        <span class="icon fa fa-book"></span>
                        <span class="title">Book</span>
                    </a>
                    <!--Dropdown -->
                    <div id="dropdown-element" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="nav navbar-nav">
                                <li><a href="book_cat.php">Book Category</a></li>
                                <li><a href="add_book.php">Add New Book</a></li>
                                <li><a href="view_book.php">View Book</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="panel panel-default dropdown">
                    <a data-toggle="collapse" href="#dropdown-element1">
                        <span class="icon fa fa-user"></span>
                        <span class="title">Student</span>
                    </a>
                    <!--Dropdown -->
                    <div id="dropdown-element1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="nav navbar-nav">
                                <li><a href="add_student.php">Add Student</a></li>
                                <li><a href="view_student.php">View Student</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="requested_book.php">
                        <span class="icon fa fa-book fa-align-right"></span>
                        <span class="title">Requested Books</span>
                    </a>
                </li>
                <li>
                    <a href="issued_book.php">
                        <span class="icon fa fa-book fa-align-center"></span>
                        <span class="title">Issued Books</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon fa fa-pencil-square-o"></span>
                        <span class="title">Rules</span>
                    </a>
                </li>


            </ul>
        </div>
    </nav>
</div>