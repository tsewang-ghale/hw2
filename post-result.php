<?php
$pageTitle = "Post result"; 
include "view_header.php"; 
?> 
    <h1>Post result </h1>
<?php
if (isset($_POST['my.name'])) {
?>
    <p> The value sent is:</p>
<?php
    echo $_POST['my.name']; 
} else {
    ?> 
    <p> Nothing posted to the page </p>
<?php 
}
include "view_footer.php";
?> 
