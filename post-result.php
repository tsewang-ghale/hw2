<?php
$pageTitle = "Post result"; 
include "view_header.php"; 
?> 
    <h1>Post result </h1>
    <form method = "post" action = "postresult.php" > </form> 
    <input type = "Text" name = "" name= my_Name"> 
    <input type = "submit" value = "Post data"
<?php
if (isset($_POST['my_name'])) {
?>
    <p> The value sent is:  </p>
<?php
    echo $_POST['my_name']; 
} else {
    ?> 
    <p> Nothing posted to the page </p>
<?php 
}
include "view_footer.php";
?> 
