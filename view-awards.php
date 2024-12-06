<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Awards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-image: url('b5.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white; /* Adjust text color for contrast */
      }
      .table {
        background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black table background */
        color: white;
      }
    </style>
  </head>
  <body>
    <h1 class="text-center mt-3">Awards</h1>
    <div class="container mt-5">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th> ID </th>
              <th> Award Name </th>
              <th> Award Year </th>
              <th> Idol Group ID </th>
              <th> </th>
            </tr>
          </thead>
          <tbody> 
          <?php
          while ($award = $awards->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $award['award_id']; ?> </td>
              <td><?php echo $award['award_name']; ?></td>
              <td><?php echo $award['award_date']; ?></td> 
              <td><?php echo $award['idol_group_id']; ?></td>
              <td><a href="award-details.php?id=<?php echo $award['award_id']; ?>" class="btn btn-primary btn-sm">Details</a></td>
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
