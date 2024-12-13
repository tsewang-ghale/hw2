<?php
function selectSongs() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT song_id, song_name, release_date, group_id FROM Songs");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function insertSong($song_name, $release_date, $group_id) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO Songs (song_name, release_date, group_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $song_name, $release_date, $group_id);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updateSong($song_id, $song_name, $release_date, $group_id) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE Songs SET song_name = ?, release_date = ?, group_id = ? WHERE song_id = ?");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $conn->error);
        }
        $stmt->bind_param("siii", $song_name, $release_date, $group_id, $song_id);
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
function deleteSong($song_id) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("DELETE FROM Songs WHERE song_id = ?");
        $stmt->bind_param("i", $song_id);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
