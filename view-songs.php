<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Songs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-image: url('b3.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white; /* Adjust text color for better visibility */
      }
      .table {
        background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent table background */
        color: white;
      }
    </style>
  </head>
  <body>
    <h1 class="text-center mt-3">Songs</h1>
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <h2>Add New Song</h2>
        </div>
        <div class="col-auto">
          <?php include "view-songs-newform.php"; ?>
        </div>
      </div>
      <div class="table-responsive mt-4">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Song Name</th>
              <th>Release Date</th>
              <th>Idol Group ID</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($song = $Songs->fetch_assoc()) {
            ?>
              <tr>
                <td><?php echo $song['song_id']; ?></td>
                <td><?php echo $song['song_name']; ?></td>
                <td><?php echo $song['release_date']; ?></td>
                <td><?php echo $song['idol_group_id']; ?></td>
                <td>
                  <a href="song-details.php?id=<?php echo $song['song_id']; ?>" class="btn btn-primary btn-sm">Details</a>
                  <div class="mt-2">
                    <?php include "view-songs-editform.php"; ?>
                  </div>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
