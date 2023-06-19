<?php
session_start();
require_once '../config/dbcon.php';
include "admin-datas/program-db.php";


$prog_id = $prog_id_err = $prog_id_red_border = '';
$program = $program_err = $program_red_border = '';
$total_year = $total_year_err = $total_year_red_border = '';

if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $program = getProgramByID($id, $conn);
        if (isset($_REQUEST['submit'])) {

            // $check_season = $conn->prepare("SELECT season FROM seasons WHERE season = :season AND season != :seasonID_season");
            // $check_season->bindParam(":seasonID_season", $seasonID['season']);
            // $check_season->bindParam(":season", $_REQUEST['season']);
            // $check_season->execute();

            // if(empty($_REQUEST['season'])){
            //     $season_err = 'Season is required!';
            //     $season_red_border = 'red_border';
            // }elseif($check_season->rowCount() > 0){
            //     $season_err = 'This season is already exsist!';
            //     $season_red_border = 'red_border';
            //     $season = $_REQUEST['season'];
            // }else{
            //     $season = $_REQUEST['season'];
            // }

            // try {
            //     if (!empty($season)){
            //         try {
            //             $sql = "UPDATE seasons SET season=:season  WHERE id=:id";
            //             $stmt = $conn->prepare($sql);
            //             $stmt->bindParam(':season', $season);
            //             $stmt->bindParam(':id', $id);
            //             $stmt->execute();
            //             $_SESSION['success'] = "Successfully Updated Season year!";
            //             header("location: season-list.php");
            //         } catch (PDOException $e) {
            //             echo $e->getMessage();
            //         }
            //     }
            // } catch (PDOException $e) {
            //     $e->getMessage();
            // }


            if (empty($_REQUEST['prog_id'])) {
                $prog_id_err = 'Program ID is required!';
                $prog_id_red_border = 'red_border';
            } else {
                $prog_id = $_REQUEST['prog_id'];
            }

            if (empty($_REQUEST['program'])) {
                $program_err = 'Program is required!';
                $program_red_border = 'red_border';
            } else {
                $program = $_REQUEST['program'];
            }

            if (empty($_REQUEST['total_year'])) {
                $total_year_err = 'Total year is required!';
                $total_year_red_border = 'red_border';
            } else {
                $total_year = $_REQUEST['total_year'];
            }

            if (!empty($prog_id) and !empty($program) and !empty($total_year)) {
                try {

                    $sql = "UPDATE programs SET program=:program, total_year=:total_year  WHERE prog_id=:prog_id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':prog_id', $id);
                    $stmt->bindParam(':program', $program);
                    $stmt->bindParam(':total_year', $total_year);
                    $stmt->execute();
                    $_SESSION['success'] = "Successfully Updated Programd!";
                    header("location: program-list.php");
                    exit;
                } catch (PDOException $e) {
                    $e->getMessage();
                }
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
                                <h3 class="page-title">Edit Program</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="program-list.php">Program</a></li>
                                    <li class="breadcrumb-item active">Edit Programs</li>
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
                                            <h5 class="form-title student-info">Program Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Program ID<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $prog_id_red_border ?>" type="text" name="prog_id" value="<?php echo $program['prog_id'] ?>" readonly>
                                                <div class="error"><?php echo $prog_id_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Program<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $program_red_border ?>" type="text" name="program" value="<?php echo $program['program'] ?>">
                                                <div class="error"><?php echo $program_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Total Year<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $total_year_red_border ?>" type="text" name="total_year" value="<?php echo $program['total_year'] ?>">
                                                <div class="error"><?php echo $total_year_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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