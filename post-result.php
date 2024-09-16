<?php
$pageTitle = "Post Result";
include "view_header.php";
?>
    <h1>Post Result</h1>
<?php
if (isset($_POST['my_name'])) {
?>
    <p>The value sent is:</p>
    <p><?= htmlspecialchars($_POST['my_name']); ?></p>
<?php
} else {
?>
    <p>No data was posted.</p>
<?php
}
include "view_footer.php";
?>
