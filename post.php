 <?php
$pageTitle = "Post";
include "view_header.php";
?>
    <h1>Post Data</h1>
    <form method="post" action="post-result.php">
            <input type="text" name="my_name">
            <input type="submit" value = "Post data">
    </form>
<?php
include "view_footer.php";
?>
