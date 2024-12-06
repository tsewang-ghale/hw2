<?php
require_once("util-db.php");
require_once("model-songs.php");

$pageTitle = "Songs";
include "view_header.php";

if (isset($_POST['actionType'])) {
    switch ($_POST['actionType']) {
        case "Add":
            if (InsertSong($_POST['song_id'], $_POST['song_name'], $_POST['release_date'], $_POST['idol_group_id'])) {
                echo '<div class="alert alert-success" role="alert">Song added successfully.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error adding Song.</div>';
            }
            break;
        case "Edit":
            if (UpdateSong($_POST['song_id'],$_POST['Song_id'], $_POST['song_name'], $_POST['founded_year'], $_POST['idol_group_id'])) {
                echo '<div class="alert alert-success" role="alert">Song edited successfully.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error editing Song.</div>';
            }
            break;
        case "Delete":
            if (DeleteSong($_POST['song_id'])) {
                echo '<div class="alert alert-success" role="alert">Song deleted successfully.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error deleting Song.</div>';
            }
            break;
    }
}

$Songs = selectSongs(); // Fetch Songs from the model
?>

<!-- Display Songs Table -->
<div class="container mt-5">
    <h1>Songs</h1>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addSongModal">Add New Song</button>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Song Name</th>
                    <th>Release Date</th>
                    <th> Idol Group ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($Song = $Songs->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $Song['Song_id']; ?></td>
                        <td><?php echo $Song['song_name']; ?></td>
                        <td><?php echo $Song['release_date']; ?></td>
                        <td><?php echo $Song['idol_group_id']; ?></td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editSongModal<?php echo $Song['Song_id']; ?>">Edit</button>
                            <!-- Delete Form -->
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="actionType" value="Delete">
                                <input type="hidden" name="Song_id" value="<?php echo $Song['Song_id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editSongModal<?php echo $Song['Song_id']; ?>" tabindex="-1" aria-labelledby="editSongModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editSongModalLabel">Edit Song</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="actionType" value="Edit">
                                        <input type="hidden" name="Song_id" value="<?php echo $Song['Song_id']; ?>">
                                        <div class="mb-3">
                                            <label for="song_name" class="form-label">Song Name</label>
                                            <input type="text" class="form-control" name="song_name" value="<?php echo $Song['song_name']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="release_date" class="form-label"> Release Date</label>
                                            <input type="date" class="form-control" name="release_date" value="<?php echo $Song['release_date']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="idol_group_id" class="form-label">Idol Group ID</label>
                                            <input type="number" class="form-control" name="idol_group_id" value="<?php echo $Song['idol_group_id']; ?>" required>
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
<div class="modal fade" id="addSongModal" tabindex="-1" aria-labelledby="addSongModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSongModalLabel">Add New Song</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="actionType" value="Add">
                    <div class="mb-3">
                        <label for="song_name" class="form-label">Song Name</label>
                        <input type="text" class="form-control" name="song_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="release_date" class="form-label">Release Date</label>
                        <input type="date" class="form-control" name="release_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="idol_group_id" class="form-label">Idol Group ID</label>
                        <input type="number" class="form-control" name="idol_group_id" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Song</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "view_footer.php"; ?>
