<?php
function selectSongs() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT song_name, count(s.song_id) as count_song FROM `Songs` s join `IdolGroups` c on c.group_id = s.group_id group by s.song_name");
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
