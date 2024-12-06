<?php
require_once("util-db.php");
require_once("model-awards.php");

$pageTitle = "Awards";
include "view_header.php";

if (isset($_POST['actionType'])) {
    switch ($_POST['actionType']) {
        case "Add":
            if (InsertAward($_POST['award_id'], $_POST['award_name'], $_POST['award_date'],$_POST['idol_group_id'] )) {
                echo '<div class="alert alert-success" role="alert">Award added.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error adding Award.</div>';
            }
            break;
        case "Edit":
            if (UpdateAward($_POST['award_id'], $_POST['award_name'], $_POST['award_date'],$_POST['idol_group_id'])) {
                echo '<div class="alert alert-success" role="alert">Award edited.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error editing Award.</div>';
            }
            break;
        case "Delete":
            if (DeleteAward($_POST['award_id'])) {
                echo '<div class="alert alert-success" role="alert">Award deleted.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error deleting Award.</div>';
            }
            break;
    }
}

$awards = selectAwards(); // Fetch awards from the model
?>

<!-- Display Awards Table -->
<div class="container mt-5">
    <h1>Awards</h1>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAwardModal">Add New Award</button>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Award Name</th>
                    <th>Award Year</th>
                    <th>Idol Group ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($award = $awards->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $award['award_id']; ?></td>
                        <td><?php echo $award['award_name']; ?></td>
                        <td><?php echo $award['award_date']; ?></td>
                        <td><?php echo $award['idol_group_id']; ?></td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editAwardModal<?php echo $award['award_id']; ?>">Edit</button>
                            <!-- Delete Form -->
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="actionType" value="Delete">
                                <input type="hidden" name="award_id" value="<?php echo $award['award_id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editAwardModal<?php echo $award['award_id']; ?>" tabindex="-1" aria-labelledby="editAwardModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editAwardModalLabel">Edit Award</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="actionType" value="Edit">
                                        <input type="hidden" name="award_id" value="<?php echo $award['award_id']; ?>">
                                        <div class="mb-3">
                                            <label for="award_id" class="form-label">Award ID</label>
                                            <input type="number" class="form-control" name="award_id" value="<?php echo $award['award_id']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="award_name" class="form-label">Award Name</label>
                                            <input type="text" class="form-control" name="award_name" value="<?php echo $award['award_name']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                              <label for="award_date" class="form-label"> Award Date</label>
                                              <input type="date" class="form-control" name="award_date" value="<?php echo $award['award_date']; ?>" required>
                                          </div>
                                        <div class="mb-3">
                                            <label for="idol_group_id" class="form-label">Idol Group ID</label>
                                            <input type="number" class="form-control" name="idol_group_id" value="<?php echo $award['idol_group_id']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Save Changes</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addAwardModal" tabindex="-1" aria-labelledby="addAwardModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAwardModalLabel">Add New Award</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="actionType" value="Add">
                    <div class="mb-3">
                        <label for="award_id" class="form-label">Award ID</label>
                        <input type="number" class="form-control" name="award_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="award_name" class="form-label">Award Name</label>
                        <input type="text" class="form-control" name="award_name" required>
                    </div>
                    <div class="mb-3">
                          <label for="award_date" class="form-label">Award Date</label>
                          <input type="date" class="form-control" name="award_date" required>
                      </div>
                    <div class="mb-3">
                        <label for="idol_group_id" class="form-label">Idol Group ID</label>
                        <input type="number" class="form-control" name="idol_group_id" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Award</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "view_footer.php"; ?>
