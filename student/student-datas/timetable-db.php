<?php
// All Timetables
function getTimetables($conn) {
    $sql = "SELECT * FROM timetables ORDER BY id DESC LIMIT 5";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $timetables = $stmt->fetchAll();
        return $timetables;
    } else {
        $timetables = "No Timetable!";
        return $timetables;
    }
}



?>