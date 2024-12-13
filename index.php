<?php
// Include your database connection
require_once("util_db.php");
$conn = get_db_connection();

// Get the category and search query from the form submission
$category = isset($_GET['category']) ? $_GET['category'] : '';
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Define SQL query based on the selected category
$sql = '';
if ($category == 'songs') {
    $sql = "SELECT * FROM Songs WHERE song_name LIKE '%$query%'";
} elseif ($category == 'idol-groups') {
    $sql = "SELECT * FROM IdolGroups WHERE group_name LIKE '%$query%'";
} elseif ($category == 'companies') {
    $sql = "SELECT * FROM Companies WHERE company_name LIKE '%$query%'";
} elseif ($category == 'awards') {
    $sql = "SELECT * FROM Awards WHERE award_name LIKE '%$query%'";
}

$result = null;

// Execute the query only if a query is provided
if ($query) {
    $result = mysqli_query($conn, $sql);
}

// Close the database connection
mysqli_close($conn);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>K-Pop Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      /* Background slideshow effect */
      body {
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        animation: backgroundSlide 20s infinite;
        color: white; /* Optional: Adjust text color for contrast */
      }

      @keyframes backgroundSlide {
        0% {
          background-image: url('b1.jpeg');
        }
        20% {
          background-image: url('f2.jpg');
        }
        40% {
          background-image: url('b7.jpeg');
        }
        60% {
          background-image: url('f4.jpg');
        }
        80% {
          background-image: url('f5.jpg');
        }
        100% {
          background-image: url('b1.jpeg');
        }
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">K-Pop Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="idol_groups.php">Idol Groups</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="songs.php">Songs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="awards.php">Awards</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="companies.php">Companies</a>
            </li>
          </ul>
          <!-- Search Form -->
          <form class="d-flex" action="index.php" method="get">
            <select class="form-select me-2" name="category" aria-label="Search Category">
              <option value="songs" selected>Songs</option>
              <option value="idol-groups">Idol Groups</option>
              <option value="companies">Companies</option>
              <option value="awards">Awards</option>
            </select>
            <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <!-- Search Results Section -->
    <?php if ($query && $result): ?>
        <div class="container mt-4">
            <h2>Search Results for '<?php echo htmlspecialchars($query); ?>' in '<?php echo htmlspecialchars($category); ?>' Category:</h2>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <table class="table">
                    <?php
                    // Display column headings based on category
                    if ($category == 'songs') {
                        echo "<thead><tr><th>Song Name</th><th>Release Date</th><th>Group Id</th></tr></thead>";
                    } elseif ($category == 'idol-groups') {
                        echo "<thead><tr><th>Group Name</th><th>Debut Year</th><th>Members</th></tr></thead>";
                    } elseif ($category == 'companies') {
                        echo "<thead><tr><th>Company Name</th><th>Founded Year</th><th>CEO</th></tr></thead>";
                    } elseif ($category == 'awards') {
                        echo "<thead><tr><th>Award Name</th><th>Award year</th><th>Group ID</th></tr></thead>";
                    }

                    // Display results
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        if ($category == 'songs') {
                            echo "<td>" . $row['song_name'] . "</td><td>" . $row['release_date'] . "</td><td>" . $row['group_id'] . "</td>";
                        } elseif ($category == 'idol-groups') {
                            echo "<td>" . $row['group_name'] . "</td><td>" . $row['debut_year'] . "</td><td>" . $row['members_count'] . "</td>";
                        } elseif ($category == 'companies') {
                            echo "<td>" . $row['company_name'] . "</td><td>" . $row['company_foundation_year'] . "</td><td>" . $row['company_ceo'] . "</td>";
                        } elseif ($category == 'awards') {
                            echo "<td>" . $row['award_name'] . "</td><td>" . $row['award_year'] . "</td><td>" . $row['group_id'] . "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </table>
            <?php else: ?>
                <p>No results found for '<?php echo htmlspecialchars($query); ?>' in '<?php echo htmlspecialchars($category); ?>' category.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

  </body>
</html>
