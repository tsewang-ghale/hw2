<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Awards</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    /* Set the background image for the entire page */
    body {
      background-image: url('b7.jpeg'); /* Make sure the image path is correct */
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      height: 100vh;
    }

    /* Custom Styles for the Table and Content */
    .container {
      background-color: rgba(255, 255, 255, 0.8); /* Light background for readability */
      padding: 20px;
      border-radius: 8px;
    }

    .table th, .table td {
      vertical-align: middle;
    }

    .table th {
      background-color: #f8f9fa;
      color: #495057;
    }

    .table tr:hover {
      background-color: #FF0000;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #004085;
    }



  .row h1 {
      font-size: 2.5rem;
      font-weight: bold;
      color: #343a40;
    }

    .col-auto {
      display: flex;
      align-items: center;
    }
  </style>
</head>
<body>

  <div class="container mt-4">
    <!-- Row for the Header and Form -->
    <div class="row mb-4">
      <div class="col">
      <h1>Awards</h1>
    </div>
    <div class="col-auto">
      <?php
        include "view_awards_newform.php";
      ?>
    </div>
  </div>

  <!-- Table for displaying Companies -->
    <div class="table-responsive mt-4">
      <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Award Name</th>
          <th>Award Date</th>
          <th>Idol Group ID</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php
      while ($award = $awards->fetch_assoc()) {
      ?>
        <tr>
          <td><?php echo $award['award_id']; ?> </td>
          <td><?php echo $award['award_name']; ?></td>
          <td><?php echo $award['award_year']; ?></td>
          <td><?php echo $award['group_id']; ?></td>
          <td></td>
          <td>
            <?php
            include "view_awards_editform.php";
            ?>
          </td>
          <td>
            <form method="post" action="">
              <input type="hidden" name="award_id" value="<?php echo $award['award_id']; ?>">
              <input type="hidden" name="actionType" value="Delete">
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
              </button>
            </form>
          </td>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>
  </div>

  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
