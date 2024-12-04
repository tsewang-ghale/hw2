<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($pageTitle); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-image: url('kpop icon.avif');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        color: #fff; /* Ensures text is readable */
      }
      .navbar-brand {
        font-size: 1.75rem;
        font-weight: bold;
        color: #fff !important;
      }
      .nav-item {
        margin-right: 15px;
      }
      .navbar-nav .nav-link {
        font-size: 1.1rem;
        font-weight: 500;
        color: #fff;
      }
      .navbar-nav .nav-link:hover {
        color: #007bff;
      }
      .navbar-nav .nav-link.active {
        color: #007bff;
      }
      .navbar {
        background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent navbar */
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">K-Pop World</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link <?= ($pageTitle == 'Home') ? 'active' : ''; ?>" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($pageTitle == 'Post') ? 'active' : ''; ?>" href="post.php">Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($pageTitle == 'Post Result') ? 'active' : ''; ?>" href="post-result.php">Post Result</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($pageTitle == 'Get') ? 'active' : ''; ?>" href="get.php">Get</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($pageTitle == 'Get Result') ? 'active' : ''; ?>" href="get-result.php">Get Result</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="idol-groups.php"> Idol Groups </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="songs.php"> Songs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="companies.php"> Companies </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="awards.php"> Awards</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybR5pO8TcA6L+q1f2fCw7t7pVEdwr/riWJdA4VY+V+Tj8f7A7T" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-7gFF4B5s7O9Pfdk+XwC3GV5hXAlhHpZ7DohrH3FmrHBVupjK0
