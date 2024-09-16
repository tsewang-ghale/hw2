 <?php
$pageTitle = "Get";
include "view_header.php";
?>
    <h1>Get Data</h1>
    <form method="get" action="get-result.php">
            <input type="text" id="name" name="my_name">
            <input type="submit" value = "Get data">
    </form>
<?php
include "view_footer.php";
?>
