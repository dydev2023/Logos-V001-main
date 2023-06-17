<?php  

    session_start();
    require_once '../config/dbcon.php';
    
    if(!isset($_SESSION['admin_login'])) {
        header('location: ../index.php');
    } else {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            include "admin-datas/officer-db.php";
            if (removeOfficerById($id, $conn)) {
                $_SESSION['success'] = "Successfully deleted!";
                header('location: officer-list.php');
                exit;
            } else {
                $_SESSION['error'] = "Delete Fail, Please try again!";
                header('location: officer-list.php');
                exit;
            }
        }
    }
    
?>