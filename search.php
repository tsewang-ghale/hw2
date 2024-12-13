<?php
// Include your database connection
require_once("util_db.php");

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

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are results
if (mysqli_num_rows($result) > 0) {
    echo "<h2>Search Results for '$query' in '$category' Category:</h2>";

    // Display results in a table
    echo "<table class='table'>";
    if ($category == 'songs') {
        echo "<thead><tr><th>Song Name</th><th>Artist</th><th>Release Date</th></tr></thead>";
    } elseif ($category == 'idol-groups') {
        echo "<thead><tr><th>Group Name</th><th>Debut Year</th><th>Members</th></tr></thead>";
    } elseif ($category == 'companies') {
        echo "<thead><tr><th>Company Name</th><th>Location</th><th>Founded Year</th></tr></thead>";
    } elseif ($category == 'awards') {
        echo "<thead><tr><th>Award Name</th><th>Category</th><th>Year</th></tr></thead>";
    }
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        if ($category == 'songs') {
            echo "<td>" . $row['song_name'] . "</td><td>" . $row['artist'] . "</td><td>" . $row['release_date'] . "</td>";
        } elseif ($category == 'idol-groups') {
            echo "<td>" . $row['group_name'] . "</td><td>" . $row['debut_year'] . "</td><td>" . $row['members'] . "</td>";
        } elseif ($category == 'companies') {
            echo "<td>" . $row['company_name'] . "</td><td>" . $row['location'] . "</td><td>" . $row['founded_year'] . "</td>";
        } elseif ($category == 'awards') {
            echo "<td>" . $row['award_name'] . "</td><td>" . $row['category'] . "</td><td>" . $row['year'] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No results found for '$query' in '$category' category.</p>";
}

mysqli_close($conn); // Close the database connection
?>
