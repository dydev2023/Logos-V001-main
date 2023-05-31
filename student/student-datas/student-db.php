<?php
// All students
function getAllStudents($conn) {
    $sql = "SELECT * FROM students ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $students = $stmt->fetchAll();
        return $students;
    } else {
        $students = "No Student!";
        return $students;
    }
}


// Get Student By ID
function getStudentById($id, $conn) {
    $sql = "SELECT * FROM students WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() == 1) {
        $student = $stmt->fetch();
        return $student;
    } else {
        return 0;
    }
}
// Get User By ID
function studentGetUserById($id, $conn) {
    $sql = "SELECT * FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch();
        return $user;
    } else {
        return 0;
    }
}


// Delete 
function removeStudentById($id, $conn) {
    $sql1 = "DELETE FROM users WHERE id=?";
    $sql2 = "DELETE FROM student_scores WHERE id=?";

    $stmt1 = $conn->prepare($sql1);
    $stmt2 = $conn->prepare($sql2);

    $re1 = $stmt1->execute([$id]);
    $re2 = $stmt2->execute([$id]);
    if ($re1 and $re2) {
        return 1;
    } else {
        return 0;
    }
}


?>