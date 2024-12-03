<?php
function selectAwards() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT award_id, award_name, award_year, idol_group_id FROM Awards");
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
