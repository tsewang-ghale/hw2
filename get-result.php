<?php
$pageTitle = "Get Result";
include "view_header.php";
?>
    <h1>Get Result</h1>
<?php
if (isset($_GET['my_name'])) {
?>
    <p>The value sent is:</p>
<?php
    echo $_GET['my_name'];
} else {
?>
    <p>Nothing sent to the page</p>
<?php
}
include "view_footer.php";
?>
