<?php
$pageTitle = "Get Result";
include "view_header.php";
?>
    <h1>Get Result</h1>
<?php
if (isset($_GET['my_name'])) {
?>
    <p>The value sent is:</p>
    <p><?= htmlspecialchars($_GET['my_name']); ?></p>
<?php
} else {
?>
    <p>No data was received.</p>
<?php
}
include "view_footer.php";
?>
