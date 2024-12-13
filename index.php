<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($pageTitle); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-image: url('b1.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white; /* Optional: Adjust text color for contrast */
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
            
            <li class="nav-item">
              <a class="nav-link" href="songs_chart.php">Song Chart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="awards_chart.php">Awards Chart</a>
            
          </ul>
          <!-- Search Form -->
          <form class="d-flex" action="search.php" method="get">
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

    <!-- Add content for the K-Pop site below -->
    
  </body>
</html>
