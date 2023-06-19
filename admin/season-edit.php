<?php
session_start();
require_once '../config/dbcon.php';
include "admin-datas/season-db.php";


$season = $season_err = $season_red_border = '';

if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $seasonID = getSeasonByID($id, $conn);
        if (isset($_REQUEST['submit'])) {

            $check_season = $conn->prepare("SELECT season FROM seasons WHERE season = :season AND season != :seasonID_season");
            $check_season->bindParam(":seasonID_season", $seasonID['season']);
            $check_season->bindParam(":season", $_REQUEST['season']);
            $check_season->execute();

            if(empty($_REQUEST['season'])){
                $season_err = 'Season is required!';
                $season_red_border = 'red_border';
            }elseif($check_season->rowCount() > 0){
                $season_err = 'This season is already exsist!';
                $season_red_border = 'red_border';
                $season = $_REQUEST['season'];
            }else{
                $season = $_REQUEST['season'];
            }

            try {
                if (!empty($season)){
                    try {
                        $sql = "UPDATE seasons SET season=:season  WHERE id=:id";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':season', $season);
                        $stmt->bindParam(':id', $id);
                        $stmt->execute();
                        $_SESSION['success'] = "Successfully Updated Season year!";
                        header("location: season-list.php");
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
                                <h3 class="page-title">Edit Season</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="season-list.php">Season</a></li>
                                    <li class="breadcrumb-item active">Edit Season</li>
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
                                            <h5 class="form-title student-info">Season Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Season<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $season_red_border ?>" type="text" value="<?php echo $seasonID['season'] ?>" name="season">
                                                <div class="error"><?php echo $season_err ?></div>
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