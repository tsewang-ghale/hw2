<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Idol Groups</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        background-image: url('b2.jpg'); /* Add your background image */
        background-size: cover; /* Ensures the image covers the entire background */
        background-position: center; /* Centers the image */
        background-attachment: fixed; /* Keeps the background fixed when scrolling */
        color: white; /* Optional: Adjust text color for better readability */
      }
      table {
        background-color: rgba(255, 255, 255, 0.9); /* Slightly opaque background for the table */
        color: black; /* Set table text color to black for better contrast */
      }
    </style>
  </head>
  <body>
    <h1>Idol Groups</h1>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Group Name</th>
            <th>Debut Date</th>
            <th>Members Count</th>
            <th></th>
          </tr>
        </thead>
        <tbody> 
        <?php
        while ($idolGroup = $idolGroups->fetch_assoc()) {
        ?>
          <tr>
            <td><?php echo $idolGroup['group_id']; ?></td>
            <td><?php echo $idolGroup['group_name']; ?></td>
            <td><?php echo $idolGroup['debut_year']; ?></td> 
            <td><?php echo $idolGroup['members_count']; ?></td>
            <td><a href="idol-group-details.php?id=<?php echo $idolGroup['group_id']; ?>">Details</a></td>
          </tr>
        <?php
        }
        ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
