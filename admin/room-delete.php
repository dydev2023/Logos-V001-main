<?php  

    session_start();
    require_once '../config/dbcon.php';
    
    if(!isset($_SESSION['admin_login'])) {
        header('location: ../index.php');
    } else {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            include "data/room-db.php";
            if (removeRoomByID($id, $conn)) {
                $_SESSION['success'] = "Successfully deleted!";
                header('location: room-list.php');
                exit;
            } else {
                $_SESSION['error'] = "Delete Fail, Please try again!";
                header('location: room-list.php');
                exit;
            }
        }
    }
    
?>