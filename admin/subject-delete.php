<?php  

    session_start();
    require_once '../config/dbcon.php';
    
    if(!isset($_SESSION['admin_login'])) {
        header('location: ../index.php');
    } else {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            include "admin-datas/subject-db.php";
            if (userRemoveSubjectById($id, $conn)) {
                $_SESSION['success'] = "Successfully deleted!";
                header('location: subject-list.php');
                exit;
            } else {
                $_SESSION['error'] = "Delete Fail, Please try again!";
                header('location: subject-list.php');
                exit;
            }
        }
    }
    
?>