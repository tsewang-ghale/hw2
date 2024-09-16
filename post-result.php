<?php
$pageTitle = "Post Result";
include "view_header.php";
?>
    <h1>Post Result</h1>
<?php
echo getDisplay();
include "view_footer.php";

function getDisplay(){
    if (isset($_POST['my_name'])) {
  
         return "<p>The value sent is:</p>" . $_POST['my_name'];
    } else {
        return "<p>No data was posted.</p>";
    }
}    
?>
