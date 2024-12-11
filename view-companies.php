<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Companies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-image: url('b3.jpg');
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
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <h1>Companies</h1>
        </div>
        <div class="col-auto">
          <?php 
          include "view-companies-newform.php"; 
          ?>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Company Name</th>
              <th>Establishment Year</th>
              <th>Company CEO</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php
          while ($company = $companies->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $company['company_id']; ?> </td>
              <td><?php echo $company['company_name']; ?></td>
              <td><?php echo $company['company_foundation_date']; ?></td> 
              <td><?php echo $company['company_ceo']; ?></td>
              <td><a href="company-details.php?id=<?php echo $company['company_id']; ?>" class="btn btn-primary btn-sm">Details</a></td>
              <td>
                <?php
                include "view-companies-editform.php"; 
                ?>
              </td>
              <td>
                <form method="post" action="">
                  <input type="hidden" name="company_id" value="<?php echo $company['company_id']; ?>">
                  <input type="hidden" name="actionType" value="Delete">
                  <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?');">
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
  </body>
</html>
