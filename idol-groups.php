<?php
require_once("util-db.php");
require_once("model-idol-groups.php");

$pageTitle = "Idol Groups";
include "view_header.php";

if (isset($_POST['actionType'])) {
    switch ($_POST['actionType']) {
        case "Add":
            if (InsertIdolGroup($_POST['group_name'], $_POST['debut_year'], $_POST['members_count'])) {
                echo '<div class="alert alert-success" role="alert">Idol Group added.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error adding Idol Group.</div>';
            }
            break;
        case "Edit":
            if (UpdateIdolGroup($_POST['group_id'], $_POST['group_name'], $_POST['debut_year'], $_POST['members_count'])) {
                echo '<div class="alert alert-success" role="alert">Idol Group edited.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error editing Idol Group.</div>';
            }
            break;
        case "Delete":
            if (DeleteIdolGroup($_POST['group_id'])) {
                echo '<div class="alert alert-success" role="alert">Idol Group deleted.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error deleting Idol Group.</div>';
            }
            break;
    }
}

$idolGroups = selectIdolGroups(); // Fetch idol groups from the model
?>

<!-- Display Idol Groups Table -->
<div class="container mt-5">
    <h1>Idol Groups</h1>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addIdolGroupModal">Add New Idol Group</button>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Group Name</th>
                    <th>Debut Year</th>
                    <th>Members Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($idolGroup = $idolGroups->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $idolGroup['group_id']; ?></td>
                        <td><?php echo $idolGroup['group_name']; ?></td>
                        <td><?php echo $idolGroup['debut_year']; ?></td>
                        <td><?php echo $idolGroup['members_count']; ?></td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editIdolGroupModal<?php echo $idolGroup['group_id']; ?>">Edit</button>
                            <!-- Delete Form -->
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="actionType" value="Delete">
                                <input type="hidden" name="group_id" value="<?php echo $idolGroup['group_id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editIdolGroupModal<?php echo $idolGroup['group_id']; ?>" tabindex="-1" aria-labelledby="editIdolGroupModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editIdolGroupModalLabel">Edit Idol Group</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="actionType" value="Edit">
                                        <input type="hidden" name="group_id" value="<?php echo $idolGroup['group_id']; ?>">
                                        <div class="mb-3">
                                            <label for="group_name" class="form-label">Group Name</label>
                                            <input type="text" class="form-control" name="group_name" value="<?php echo $idolGroup['group_name']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="debut_year" class="form-label">Debut Year</label>
                                            <input type="date" class="form-control" name="debut_year" value="<?php echo $idolGroup['debut_year']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="members_count" class="form-label"> Members Count </label>
                                            <input type="number" class="form-control" name="members_count" value="<?php echo $idolGroup['members_count']; ?>" required>
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
<div class="modal fade" id="addIdolGroupModal" tabindex="-1" aria-labelledby="addIdolGroupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addIdolGroupModalLabel">Add New Idol Group</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="actionType" value="Add">
                    <div class="mb-3">
                        <label for="group_name" class="form-label">Group Name</label>
                        <input type="text" class="form-control" name="group_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="debut_year" class="form-label">Debut Year</label>
                        <input type="date" class="form-control" name="debut_year" required>
                    </div>
                    <div class="mb-3">
                        <label for="members_count" class="form-label">Members Count </label>
                        <input type="number" class="form-control" name="members_count" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Idol Group</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "view_footer.php"; ?>
