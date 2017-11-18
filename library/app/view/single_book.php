<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../dashboard/assets/image/logo.ico">
    <link rel="shortcut icon" type="image/x-icon" href="../dashboard/assets/image/logo.ico">
    <title>Library: Books</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../dashboard/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dashboard/assets/css/font-awesome.min.css">
    <!-- Owl Carousel Assets -->
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <script src='../dashboard/assets/js/jquery-3.1.1.min.js'></script>
</head>
<body>
<?php
include_once "../init.php";
include_once "navbar.php";
?>

<div class="main-heading">
    <h2>Books</h2>
</div>

<div class="container">

<?php
if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $result = view_book_by_book_id($book_id);
    while ($row = mysql_fetch_assoc($result)) {?>
        <p>ISBN NO: <?php echo $row['isbn_no']; ?></p>
        <p>Book Name: <?php echo $row['book_name']; ?></p>
        <p>Author: <?php echo $row['author']; ?></p>
        <p>Edition: <?php echo $row['edition']; ?></p>
        <p>Available Copies: <?php echo $row['no_of_copies']; ?></p>
        <?php
        if (logged_in()){
            $user_login_id = $_SESSION['user_id']; ?>
            <form action="../controller/book.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $user_login_id; ?>">
                <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
                <button class="btn btn-default" type="submit" name="register_book" >Register Book</button>
            </form>
        <?php }else{
            echo "login for Book Register";
        } }
}
?>
</div>
<?php
include_once "footer.php";
?>
<script src='../dashboard/assets/js/bootstrap.min.js'></script>
<script src='owl-carousel/owl.carousel.min.js'></script>
</body>
</html>