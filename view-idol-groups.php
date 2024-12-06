<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Idol Groups</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-image: url('b2.jpg'); /* Path to your background image */
        background-size: cover;        /* Ensures the image covers the entire page */
        background-position: center;  /* Centers the image */
        background-attachment: fixed; /* Keeps the background fixed while scrolling */
        color: white;                 /* Adjust text color for readability */
      }
      h1 {
        text-align: center;
        margin-top: 20px;
      }
      .table {
        background: rgba(0, 0, 0, 0.7); /* Adds a semi-transparent background to the table */
        color: white;                  /* White text inside the table */
        border-radius: 10px;           /* Optional: Rounded corners for the table */
      }
    </style>
  </head>
  <body>
    <h1>Idol Groups</h1>
    <div class="container my-5">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th> ID </th>
              <th> Group Name </th>
              <th> Debut Date </th>
              <th> Members Count </th>
              <th> </th>
            </tr>
          </thead>
          <tbody>
          <?php
          while ($idolGroup = $idolGroups->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $idolGroup['group_id']; ?> </td>
              <td><?php echo $idolGroup['group_name']; ?></td>
              <td><?php echo $idolGroup['debut_year']; ?></td> 
              <td><?php echo $idolGroup['members_count']; ?></td>
              <td><a href="idol-group-details.php?id=<?php echo $idolGroup['group_id']; ?>" class="btn btn-info btn-sm">Details</a></td>
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
