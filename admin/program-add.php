<?php
session_start();
require_once '../config/dbcon.php';

$prog_id = $prog_id_err = $prog_id_red_border = '';
$program = $program_err = $program_red_border = '';
$total_year = $total_year_err = $total_year_red_border = '';

if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
} else {
    if (isset($_REQUEST['submit'])) {

        // Select The Subject ID in Database For Check
        $check_prog_id = $conn->prepare("SELECT prog_id FROM programs WHERE prog_id = :prog_id");
        $check_prog_id->bindParam(":prog_id", $_REQUEST['prog_id']);
        $check_prog_id->execute();

        // Select The Subject ID in Database For Check
        $check_program = $conn->prepare("SELECT program FROM programs WHERE program = :program");
        $check_program->bindParam(":program", $_REQUEST['program']);
        $check_program->execute();

        if (empty($_REQUEST['prog_id'])) {
            $prog_id_err = 'Program ID is required!';
            $prog_id_red_border = 'red_border';
        } elseif ($check_prog_id->rowCount() > 0) {
            $prog_id_err = 'This program ID is already exsist!';
            $prog_id_red_border = 'red_border';
            $prog_id = $_REQUEST['prog_id'];
        } else {
            $prog_id = $_REQUEST['prog_id'];
        }

        if (empty($_REQUEST['program'])) {
            $program_err = 'Program is required!';
            $program_red_border = 'red_border';
        } elseif ($check_program->rowCount() > 0) {
            $program_err = 'This program is already exsist!';
            $program_red_border = 'red_border';
            $program = $_REQUEST['program'];
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
                $stmt1 = $conn->prepare('INSERT INTO programs(prog_id, program, total_year) 
                                                        VALUES (:prog_id, :program, :total_year)');
                $stmt1->bindParam(':prog_id', $prog_id);
                $stmt1->bindParam(':program', $program);
                $stmt1->bindParam(':total_year', $total_year);
                $stmt1->execute();
                $_SESSION['success'] = "Add program successfully. <a href='program-list.php'> Click here to login </a>";
                header('location: program-add.php');
                exit;
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
                                <h3 class="page-title">Add Program</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="program-list.php">Program</a></li>
                                    <li class="breadcrumb-item active">Add Programs</li>
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
                                    <?php
                                    if (isset($errorMsg)) {
                                    ?>
                                        <div class="alert alert-danger">
                                            <strong><?php echo $errorMsg; ?></strong>
                                        </div>
                                    <?php } ?>

                                    <?php
                                    if (isset($successMsg)) {
                                    ?>
                                        <div class="alert alert-success">
                                            <strong><?php echo $successMsg; ?></strong>
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
                                    <?php if (isset($_SESSION['error'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php
                                            echo $_SESSION['error'];
                                            unset($_SESSION['error']);
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
                                                <input class="form-control <?php echo $prog_id_red_border ?>" type="text" name="prog_id" value="<?php echo $prog_id ?>">
                                                <div class="error"><?php echo $prog_id_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Program<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $program_red_border ?>" type="text" name="program" value="<?php echo $program ?>">
                                                <div class="error"><?php echo $program_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Total Year<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $total_year_red_border ?>" type="text" name="total_year" value="<?php echo $total_year ?>">
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