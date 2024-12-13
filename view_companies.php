<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Companies</title>
  <link rel="stylesheet" href="path/to/your/css/file.css">
  <style>
    /* Set the background image for the entire page */
    body {
      background-image: url('b3.jpg'); /* Replace with actual path to your image */
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      color: #fff; /* Adjust text color for better visibility */
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    h1 {
      text-align: center;
      margin-top: 20px;
      font-size: 2.5em;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 20px;
      padding: 10px;
    }

    .table {
      width: 90%;
      margin: 20px auto;
      border-collapse: collapse;
      background: rgba(0, 0, 0, 0.6);
      color: #fff;
      border-radius: 10px;
      overflow: hidden;
    }

    .table th, .table td {
      border: 1px solid #ddd;
      text-align: center;
      padding: 10px;
    }

    .table th {
      background-color: rgba(0, 0, 0, 0.8);
      font-weight: bold;
    }

    .btn {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
      border-radius: 5px;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    .table-responsive {
      overflow-x: auto;
    }
  </style>
</head>
<body>
  <div class="row">
    <div class="col">
      <h1>Companies</h1>
    </div>
    <div class="col-auto">
      <?php 
        include "view_companies_newform.php"; 
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
          <td><?php echo $company['company_foundation_year']; ?></td> 
          <td><?php echo $company['company_ceo']; ?></td>
          <td></td>
          <td>
            <?php
            include "view_companies_editform.php"; 
            ?>
          </td>
          <td>
            <form method="post" action="">
              <input type="hidden" name="company_id" value="<?php echo $company['company_id']; ?>">
              <input type="hidden" name="actionType" value="Delete">
              <button type="submit" class="btn" onclick="return confirm('Are you sure?');">
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
</body>
</html>
