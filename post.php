<?php
$pageTitle = "Post"; 
include "view_header.php"; 
?> 
    <h1>Post!</h1>
    <form method="post" action="post-result.php">
        <!-- The input fields should be inside the form tags -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="my_name" class="form-control" placeholder="Enter your name">
        </div>
        <button type="submit" class="btn btn-primary">Post Data</button>
    </form>
<?php
include "view_footer.php";
?>
