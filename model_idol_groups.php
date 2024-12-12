<?php
function selectIdolGroups() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT group_id, group_name, debut_year,members_count FROM IdolGroups");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function InsertIdolGroups($group_name, $debut_year, $members_count) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `IdolGroups` (`group_name`, `debut_year`,`members_count`) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $group_name, $debut_year, $members_count);
        $success= $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function UpdateIdolGroups($group_id,$group_name, $debut_year, $members_count) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `IdolGroups` SET `group_name` = ?, `debut_year` = ?, `members_count` = ? WHERE `group_id` = ?");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $conn->error);
        }
        $stmt->bind_param("issi",$group_id,$group_name, $debut_year, $members_count); 
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
function deleteIdolGroups($group_id) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("DELETE FROM `IdolGroups` WHERE group_id = ?");
        $stmt->bind_param("i", $group_id); // Use $sale_id instead of $sid
        $success = $stmt->execute();
        $stmt->close(); // Close the statement after execution
        $conn->close(); // Close the connection
        return $success;
    } catch (Exception $e) {
        $conn->close(); // Ensure the connection is closed in case of an error
        throw $e; // Rethrow the exception for further handling
    }
}
?>
