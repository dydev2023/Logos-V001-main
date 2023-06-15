<?php  

    session_start();
    require_once '../config/dbcon.php';
    
    if(!isset($_SESSION['admin_login'])) {
        header('location: ../index.php');
    } else {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            include "admin-datas/student-db.php";
            if (removeStudentById($id, $conn)) {
                $_SESSION['success'] = "Successfully deleted!";
                header('location: student-list.php');
                exit;
            } else {
                $_SESSION['error'] = "Delete Fail, Please try again!";
                header('location: student-list.php');
                exit;
            }
        }
    }
    
?>