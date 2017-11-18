<?php
    require "../init.php";
?>
<?php
if(empty(isset($_POST['set_cat'])) == false) {
    $category_name= $_POST['category'];
    if (category_exists($category_name)){
        Header('Location: ../dashboard/book_cat.php?errors=Already Exists, Try Other?');
        exit();
    }else{
        set_category($category_name);
        Header('Location: ../dashboard/book_cat.php?success');
        exit();
    }
}
if(isset($_POST['delete_cat'])) {
    $cat_id= $_GET['cat_id'];
    delete_category($cat_id);
    delete_category_book($cat_id);
    delete_category_book_code($cat_id);
    Header('Location: ../dashboard/book_cat.php?delete_success');
    exit();
}
if(isset($_POST['set_new_book']))
{
    $cat_name= $_POST['cat_name'];
    $book_name= $_POST['book_name'];
    $isbn= $_POST['isbn'];
    $author= $_POST['author'];
    $edition= $_POST['edition'];
    $no_copy= $_POST['copy'];
    $book_cat_id = book_cat_id($cat_name);
    if (book_exists($isbn)){
        Header('Location: ../dashboard/add_book.php?errors=Book Already Exists');
        exit();
    }
    else{
        $data = array("book_name"=>$book_name,"isbn_no"=>$isbn,"author"=>$author,"edition"=>$edition,"book_category_id"=>$book_cat_id);
        db_insert($data,"books");
        Header('Location: ../dashboard/add_book.php?success');
        exit();
    }
}
if(isset($_POST['add_book_code']))
{
    $cat_name= $_POST['cat_name'];
    $isbn= $_POST['isbn'];
    $book_code = $_POST['book_code'];
    $book_cat_id = book_cat_id($cat_name);
    $book_id = book_id($isbn,$book_cat_id);
    if ($book_id != null){
        if (book_code_exists($book_code)){
            Header('Location: ../dashboard/add_book.php?errors=Book Code already Exists');
            exit();
        }
        else{
            $data = array("book_id"=>$book_id,"book_category_id"=>$book_cat_id,"book_code"=>$book_code);
            db_insert($data,"book_code");
            $no_of_copy= check_no_of_copies($book_id);
            increment_no_of_copies($book_id,$no_of_copy);
            Header('Location: ../dashboard/add_book.php?success');
            exit();
        }
    }
    else{
        Header('Location: ../dashboard/add_book.php?errors=Book Not Found');
        exit();
    }
}
if(isset($_POST['view_book_list']))
{
    $category_name = $_POST['cat_name'];
    $book_cat_id = book_cat_id($category_name);
    Header("Location: ../dashboard/view_book.php?cat_id=$book_cat_id");
    exit();
}

if(isset($_POST['delete_book']))
{
    $book_code = $_POST['book_code'];
    $book_id = $_GET['book_id'];
    $no_of_copy = $_GET['no_of_copy'];
    delete_book($book_code);
    decrement_no_of_copies($book_id,$no_of_copy);
    $no_of_copy = $no_of_copy -1;
    if ($no_of_copy == 0){
        delete_books($book_id);
    }
    Header('Location: ../dashboard/view_book.php?success');
    exit();
}

if (isset($_POST['cat_id'])) {
    $cat_id = $_POST['cat_id'];
    $array_values = implode(" OR book_category_id = ", $cat_id);
    $result1 = full_view_books("WHERE book_category_id = $array_values");

    while ($row = mysql_fetch_assoc($result1)) {

        $book_id = $row['book_id'];
        $book_name = $row['book_name'];
        $book_author = $row['author'];
        $edition = $row['edition'];
        $no_of_copies = $row['no_of_copies'];
        ?>
        <div class="panel panel-default">
            <div class="panel-body">
                <h3><a href="singleBook.php?book_id=<?php echo $book_id; ?>"><?php echo $book_name; ?></a></h3>
                <p>Author <?php echo $book_author; ?></p>
                <p>Edition <?php echo $edition; ?></p>
                <p>no_of_copies <?php echo $no_of_copies; ?></p>
            </div>
        </div>
        <?php
    }
}

if (isset($_POST['register_book'])) {
    $user_id = $_POST['user_id'];
    $book_id = $_POST['book_id'];
    $no_of_copy= check_no_of_copies($book_id);
    $registered_book = no_of_registered_book($user_id);

    if ($no_of_copy > 0 && $registered_book < 2) {
        decrement_no_of_copies($book_id, $no_of_copy);
        increment_no_of_registered_book($user_id, $registered_book);
        $book_code = pick_book($book_id);
        register_book($user_id, $book_id, $book_code);
        echo "<script type='text/javascript'>
                    alert('Sucessfull registered for book');
                    window.location='../view/books.php';
                </script>";
    } else {
        echo "<script type='text/javascript'>
                    alert('Book Not Available or You have Register 2 Books');
                    window.location='../view/books.php';
                </script>";
    }

}
if (isset($_POST['issue_book'])) {
    $user_id = $_GET['user_id'];
    $book_id = $_GET['book_id'];
    $book_code = $_GET['book_code'];

    issue_book($user_id,$book_id,$book_code);
    update_book_status($user_id,$book_code,"register_book","register_status");
    header('Location: ../dashboard/requested_book.php?success');

}

if (isset($_POST['return_book'])) {
    $user_id = $_GET['user_id'];
    $book_id = $_GET['book_id'];
    $book_code = $_GET['book_code'];
    $no_of_copy= check_no_of_copies($book_id);
    $registered_book = no_of_registered_book($user_id);

    increment_no_of_copies($book_id,$no_of_copy);
    decrement_no_of_registered_book($user_id,$registered_book);
    return_book($user_id,$book_id,$book_code);
    update_book_status($user_id,$book_code,"issue_book","issue_status");
    update_book_status_in_book_code($book_code);
    header('Location: ../dashboard/issued_book.php?success');

}
?>

