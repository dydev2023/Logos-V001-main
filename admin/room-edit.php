<?php
session_start();
require_once '../config/dbcon.php';
include "admin-datas/room-db.php";


$room = $room_err = $room_red_border = '';

if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $roomID = getroomByID($id, $conn);
        if (isset($_REQUEST['submit'])) {

            $check_room = $conn->prepare("SELECT room FROM rooms WHERE room = :room AND room != :roomID_room");
            $check_room->bindParam(":roomID_room", $roomID['room']);
            $check_room->bindParam(":room", $_REQUEST['room']);
            $check_room->execute();

            if(empty($_REQUEST['room'])){
                $room_err = 'room is required!';
                $room_red_border = 'red_border';
            }elseif($check_room->rowCount() > 0){
                $room_err = 'The writen room was already exsisted!';
                $room_red_border = 'red_border';
                $room = $_REQUEST['room'];
            }else{
                $room = $_REQUEST['room'];
            }

            try {
                if (!empty($room) && empty($room_err)){
                    try {
                        $sql = "UPDATE rooms SET room=:room  WHERE id=:id";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':room', $room);
                        $stmt->bindParam(':id', $id);
                        $stmt->execute();
                        $_SESSION['success'] = "Successfully Updated room year!";
                        header("location: room-list.php");
                        exit;
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                }
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Logos Institute of Foreign Language</title>

    <link rel="shortcut icon" href="../assets/img/logo_logos.png">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="../assets/plugins/icons/flags/flags.css">

    <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/validate-form.css">
</head>

<body>

    <div class="main-wrapper">

        <?php
        include_once("../include/header.php");
        include_once("../include/sidebar.php");
        ?>


        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Edit Class Room</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="room-list.php">All Class Rooms</a></li>
                                    <li class="breadcrumb-item active">Edit Class Room</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card comman-shadow">
                            <div class="card-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <?php if (isset($_SESSION['error'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php
                                            echo $_SESSION['error'];
                                            unset($_SESSION['error']);
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_SESSION['success'])) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php
                                            echo $_SESSION['success'];
                                            unset($_SESSION['success']);
                                            ?>
                                        </div>
                                    <?php } ?>

                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title student-info">Class Room Informations <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>room<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $room_red_border ?>" type="text" value="<?php echo $roomID['room'] ?>" name="room">
                                                <div class="error"><?php echo $room_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/plugins/moment/moment.min.js"></script>
    <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>