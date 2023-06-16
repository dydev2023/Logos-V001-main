<?php
// All Subjects
function getAllSubjects($conn) {
    $sql = "SELECT * FROM subjects ORDER BY sub_id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $subjects = $stmt->fetchAll();
        return $subjects;
    } else {
        $subjects = "No Subject!";
        return $subjects;
    }
}

// Get Subject By ID
function getSubjectById($id, $conn) {
    $sql = "SELECT * FROM subjects WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() == 1) {
        $subject = $stmt->fetch();
        return $subject;
    } else {
        return 0;
    }
}


// Delete 
function userRemoveSubjectById($id, $conn) {
    $sql = "DELETE FROM subjects WHERE id=?";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id]);
    if ($re) {
        return 1;
    } else {
        return 0;
    }
}


?>