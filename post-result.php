<?php
$pageTitle = "Post Result";
include "view_header.php";
?>
    <h1>Post Result</h1>
<?php
if (isset($_POST['my_name'])) {
?>
    <p>The value sent is:</p>
<?php
    echo $_POST['my_name'];
} else {
?>
    <p>No data was posted.</p>
<?php
}
include "view_footer.php";
?>
