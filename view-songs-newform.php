<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editSongModal<?php echo $song['Song_id']; ?>">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
  </svg>
</button>

<!-- Modal -->
<div class="modal fade" id="editSongModal<?php echo $song['Song_id']; ?>" tabindex="-1" aria-labelledby="editSongModalLabel<?php echo $song['Song_id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editSongModalLabel<?php echo $song['Song_id']; ?>">Edit Song</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="mb-3">
            <label for="song_title_<?php echo $song['Song_id']; ?>" class="form-label">Song Title</label>
            <input type="text" class="form-control" id="song_title_<?php echo $song['Song_id']; ?>" name="song_title" value="<?php echo $song['song_title']; ?>">
          </div>
          <div class="mb-3">
            <label for="artist_name_<?php echo $song['Song_id']; ?>" class="form-label">Artist</label>
            <input type="text" class="form-control" id="artist_name_<?php echo $song['Song_id']; ?>" name="artist_name" value="<?php echo $song['artist_name']; ?>">
          </div>
          <div class="mb-3">
            <label for="album_name_<?php echo $song['Song_id']; ?>" class="form-label">Album</label>
            <input type="text" class="form-control" id="album_name_<?php echo $song['Song_id']; ?>" name="album_name" value="<?php echo $song['album_name']; ?>">
          </div>
          <div class="mb-3">
            <label for="genre_<?php echo $song['Song_id']; ?>" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre_<?php echo $song['Song_id']; ?>" name="genre" value="<?php echo $song['genre']; ?>">
          </div>
          <div class="mb-3">
            <label for="release_year_<?php echo $song['Song_id']; ?>" class="form-label">Release Year</label>
            <input type="number" class="form-control" id="release_year_<?php echo $song['Song_id']; ?>" name="release_year" value="<?php echo $song['release_year']; ?>">
          </div>
          <input type="hidden" name="Song_id" value="<?php echo $song['Song_id']; ?>">
          <input type="hidden" name="actionType" value="Edit"> 
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
