<?php
$pageTitle = "Get";
include "view_header.php";
?>
    <h1>Get Data</h1>
    <form method="get" action="get-result.php">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="my_name" class="form-control" placeholder="Enter your name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php
include "view_footer.php";
?>
