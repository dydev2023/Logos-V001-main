<?php
session_start();
require_once '../config/dbcon.php';
include "../admin/data/student-db.php";

if (!isset($_SESSION['teacher_login'])) {
    header('location: ../index.php');
    exit;
} else {
    $season = $_SESSION['season'];
    $subject = $_SESSION['subject'];
    $students = getAllStudents($conn);

    if (isset($_POST['submit'])) {
        try {
            $season_year = $season;
            $subject_name = $subject;
            $studentID = $_POST['studentID'];
            $semester1 = $_POST['semester1'];
            $semester2 = $_POST['semester2'];

            for ($i=1; $i<=2; $i++) {
                $stmt = $conn->prepare('INSERT INTO student_scores(season, subject, student_id, semester1, semester2) 
                                            VALUE(:season, :subject, :student_id, :semester1, :semester2)');
                $stmt->bindParam(':season', $season_year);
                $stmt->bindParam(':subject', $subject_name);
                $stmt->bindParam(':student_id', $studentID);
                $stmt->bindParam(':semester1', $semester1);
                $stmt->bindParam(':semester2', $semester2);
                $stmt->execute();
            }
            $_SESSION['success'] = "Add Student's score successfully. <a href='student-list.php'>Click here to see the detail</a>";
            header('location: score-student-add.php');
            exit;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>