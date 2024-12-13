<?php
require_once("util_db.php");

function select_top_award_winners() {
    try {
        // Get a connection to the database
        $conn = get_db_connection();

        // Prepare the query to fetch the top 5 idols and their award count
        $query = "
            SELECT c.group_name, COUNT(a.award_id) AS award_count
            FROM IdolGroups c
            JOIN Awards a ON a.group_id = c.group_id
            GROUP BY c.group_name
            ORDER BY award_count DESC
            LIMIT 5
        ";

        // Prepare and execute the query
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        // Close the database connection
        $conn->close();

        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
