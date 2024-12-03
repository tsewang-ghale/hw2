<?php
function selectIdolGroups() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT group_id, group_name, debut_year, members_count FROM IdolGroups");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
