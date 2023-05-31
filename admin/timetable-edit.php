<?php
session_start();
require_once '../config/dbcon.php';
include "admin-datas/season-db.php";
include "admin-datas/admin-db.php";
include "admin-datas/room-db.php";
include "admin-datas/subject-db.php";
include "admin-datas/timetable-db.php";

$seasons = getAllSeasons($conn);
$subjects = getAllSubjects($conn);
$classrooms = getAllRooms($conn);
$timetables = getAllTimetables($conn);


$subject1_id = $subject2_id = $classroom = $season = $semester  = $days = '';

$subject1_id_err = $subject2_id_err = $classroom_err = $season_err = $semester_err = $days_err = '';

$subject1_id_red_border = $subject2_id_red_border = $classroom_red_border = $season_red_border = $semester_red_border = $days_red_border = '';

if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
    exit;
} else {

    if (isset($_POST['search'])) {

        if (empty($_REQUEST['season'])) {
            $season_err = 'Season ID is required!';
            $season_red_border = 'red_border';
        } else {
            $season = $_REQUEST['season'];
        }

        if (empty($_REQUEST['semester'])) {
            $semester_err = 'Semester is required!';
            $semester_red_border = 'red_border';
        } else {
            $semester = $_REQUEST['semester'];
        }
    } else {
        $season = '';
        $semester = '';
    }


    if (isset($_REQUEST['timetable_update'])) {
        try {

            $link = mysqli_connect("localhost", "root", "", "logos_db22");

            for ($a = 1; $a <= 5; $a++) {
                $subject1_id = $_REQUEST[$a . 'subject1_id'];
                $subject2_id = $_REQUEST[$a . 'subject2_id'];
                $season = $_REQUEST['season'];
                $semester = $_REQUEST['semester'];
                $classroom = $_REQUEST[$a . 'classroom'];
                $loopID = $_REQUEST[$a . 'loopID'];

                $sql = "UPDATE timetables SET subject1_id='$subject1_id', subject2_id='$subject2_id', season='$season', semester='$semester', classroom='$classroom' WHERE id='$loopID'";
                mysqli_query($link, $sql);
            }

            $_SESSION['success'] = "Update Timetable successfully.";
            header('location: timetable-list.php');
            exit;
        } catch (PDOException $e) {
            $e->getMessage();
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

    <link rel="shortcut icon" href="assets/img/favicon.png">

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
                                <h3 class="page-title">Eid Time Teble</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="timetable-list.php">Time Tebles</a></li>
                                    <li class="breadcrumb-item active">Eid Time Teble</li>
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
                                            <h5 class="form-title student-info">Fillter Time Tebles By: <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Season<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $season_red_border ?>" name="season">
                                                    <option><?php echo $season ?></option>
                                                    <?php $i = 0;
                                                    foreach ($seasons as $season) {
                                                        $i++; ?>
                                                        <option value="<?php echo $season['season'] ?>"> <?php echo $season['season'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                                <div class="error"><?php echo $season_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Semester<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $semester_red_border ?>" name="semester">
                                                    <option><?php echo $semester ?></option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                                <div class="error"><?php echo $semester_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="search-student-btn">
                                                <button type="submit" name="search" class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                                <thead class="student-thread">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Subject 1</th>
                                                        <th>Subject 2</th>
                                                        <th>Class Room</th>
                                                    </tr>
                                                </thead>

                                                <?php
                                                if (isset($_POST['search'])) {
                                                    $season = $_REQUEST['season'];
                                                    $semester = $_REQUEST['semester'];
                                                    try {
                                                        $addLoop = 0;
                                                        foreach ($timetables as $timetable) {
                                                        $addLoop++;
                                                                if ($timetable['season'] == $season && $timetable['semester'] == $semester) {
                                                                    $subject1 = getSubjectById($timetable['subject1_id'], $conn);
                                                                    $subject2 = getSubjectById($timetable['subject2_id'], $conn);
                                                                    ?>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <?php echo $timetable['days'] ?>
                                                                                <input type="hidden" name="<?php echo $addLoop . 'loopID' ?>" value="<?php echo $timetable['id'] . ' : ' . $addLoop ?>">
                                                                            </td>

                                                                            <td>
                                                                                <select class="form-control select <?php echo $subject1_id_red_border ?>" name="<?php echo $addLoop . 'subject1_id' ?>">
                                                                                    <option value="<?php echo $subject1['id'] ?>"><?php echo $subject1['name'] ?></option>
                                                                                    <?php
                                                                                    $k = 0; // For loop subjects
                                                                                    foreach ($subjects as $subject) {
                                                                                        if ($subject['season'] == $_REQUEST['season'] && $subject['semester'] == $_REQUEST['semester']) {
                                                                                            $k++; ?>
                                                                                            <option value="<?php echo $subject['id'] ?>"> <?php echo $subject['name'] ?> </option>
                                                                                    <?php }
                                                                                    } ?>
                                                                                </select>
                                                                                <div class="error"><?php echo $subject1_id_err ?></div>
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control select <?php echo $subject2_id_red_border ?>" name="<?php echo $addLoop . 'subject2_id' ?>">
                                                                                    <option value="<?php echo $subject2['id'] ?>"><?php echo $subject2['name'] ?></option>
                                                                                    <?php
                                                                                    $k = 0; // For loop subjects
                                                                                    foreach ($subjects as $subject) {
                                                                                        if ($subject['season'] == $_REQUEST['season'] && $subject['semester'] == $_REQUEST['semester']) {
                                                                                            $k++; ?>
                                                                                            <option value="<?php echo $subject['id'] ?>"> <?php echo $subject['name'] ?> </option>
                                                                                    <?php }
                                                                                    } ?>
                                                                                </select>
                                                                                <div class="error"><?php echo $subject2_id_err ?></div>
                                                                            </td>

                                                                            <td>
                                                                                <select class="form-control select <?php echo $classroom_red_border ?>" name="<?php echo $addLoop . 'classroom' ?>">
                                                                                    <option><?php echo $timetable['classroom'] ?></option>
                                                                                    <?php $i = 0;
                                                                                    foreach ($classrooms as $classroom) {
                                                                                        $i++; ?>
                                                                                        <option value="<?php echo $classroom['room'] ?>"> <?php echo $classroom['room'] ?> </option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                                <div class="error"><?php echo $classroom_err ?></div>
                                                                            </td>

                                                                        </tr>
                                                                    </tbody>

                                                                        <?php
                                                            }
                                                        }
                                                    } catch (PDOException $e) {
                                                        $e->getMessage();
                                                    }
                                                } else { ?>
                                                    <tbody>
                                                        <tr>
                                                            <th>No Timetable</th>
                                                        </tr>
                                                    </tbody>
                                                <?php }  ?>



                                            </table>
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button type="submit" name="timetable_update" class="btn btn-primary">Submit</button>
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