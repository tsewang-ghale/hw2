<?php
function selectAwards() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT award_id, award_name, award_year, group_id FROM Awards");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function InsertAward($award_id, $award_name, $award_year, $group_id) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO Awards (award_id, award_name, award_year, group_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isii", $award_name, $award_year, $group_id);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function UpdateAward($award_id, $award_name, $award_year, $group_id) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE Awards SET award_name = ?, award_year = ?, group_id = ? WHERE award_id = ?");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $conn->error);
        }
        $stmt->bind_param("siii", $award_name, $award_year, $group_id, $award_id);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        if ($conn) {
            $conn->close();
        }
        throw $e;
    }
}

function deleteAward($award_id) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("DELETE FROM Awards WHERE award_id = ?");
        $stmt->bind_param("i", $award_id);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        if ($conn) {
            $conn->close();
        }
        throw $e;
    }
}
?>
