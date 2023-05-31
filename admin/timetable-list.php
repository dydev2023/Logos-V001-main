<?php
session_start();
require_once '../config/dbcon.php';
include "admin-datas/season-db.php";
include "admin-datas/admin-db.php";
include "admin-datas/room-db.php";
include "admin-datas/subject-db.php";
include "admin-datas/timetable-db.php";
include "admin-datas/teacher-db.php";

$seasons = getAllSeasons($conn);
$subjects = getAllSubjects($conn);
$classrooms = getAllRooms($conn);
$timetables = getAllTimetables($conn);


$season = $semester = $times  = '';

$season_err = $semester_err = $times_err = '';

$season_red_border = $semester_red_border = $times_red_border = '';

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

        if (empty($_REQUEST['times'])) {
            $times_err = 'Times are required!';
            $times_red_border = 'red_border';
        } else {
            $times = $_REQUEST['times'];
        }
    } else {
        $season = '';
        $semester = '';
        $times = '';
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
                                        <div class="col-12 col-sm-3">
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
                                        <div class="col-12 col-sm-3">
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
                                        <div class="col-12 col-sm-3">
                                            <div class="form-group local-forms">
                                                <label>Times<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $times_red_border ?>" name="times">
                                                    <option><?php echo $times ?></option>
                                                    <option>Morning</option>
                                                    <option>Afternoon</option>
                                                    <option>Evening</option>
                                                </select>
                                                <div class="error"><?php echo $times_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <div class="search-student-btn">
                                                <button type="submit" name="search" class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="page-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="page-title">Time Tables</h3>
                                                        </div>
                                                        <div class="col-auto text-end float-end ms-auto download-grp">
                                                            <a href="timetable-edit.php" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                        </div>
                                                        <div class="col-auto text-end float-end ms-auto download-grp">
                                                            <a href="timetable-add.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Days</th>
                                                                    <th>Times</th>
                                                                    <th>Subjects And Teachers</th>
                                                                    <th>Classroom</th>
                                                                </tr>
                                                            </thead>


                                                            <?php
                                                            if (isset($_POST['search'])) {
                                                                $season = $_REQUEST['season'];
                                                                $semester = $_REQUEST['semester'];
                                                                $times = $_REQUEST['times'];
                                                                try {
                                                                    $addLoop = 0;
                                                                    foreach ($timetables as $timetable) {
                                                                        $addLoop++;
                                                                        if ($timetable['season'] == $season && $timetable['semester'] == $semester && !empty($times)) {
                                                                            $subject1 = getSubjectById($timetable['subject1_id'], $conn);
                                                                            $subject2 = getSubjectById($timetable['subject2_id'], $conn);
                                                                            $teacher1 = getTeacherById($subject1['teacher_id'], $conn);
                                                                            $teacher2 = getTeacherById($subject2['teacher_id'], $conn);
                                                            ?>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><?php echo $timetable['days'] ?></td>

                                                                                    <?php
                                                                                    if ($times == 'Morning') { ?>
                                                                                        <td>
                                                                                            08:00-09:30 <br>
                                                                                            10:00-11:30
                                                                                        </td>
                                                                                    <?php } else if ($times == 'Afternoon') { ?>
                                                                                        <td>
                                                                                            13:00-14:30 <br>
                                                                                            15:00-16:30
                                                                                        </td>
                                                                                    <?php } else { ?>
                                                                                        <td>
                                                                                            17:30-16:45 <br>
                                                                                            19:00-20:30
                                                                                        </td>
                                                                                    <?php }?>


                                                                                    <td>
                                                                                        <?php echo $subject1['name'] . ' (Prof: ' . $teacher1['fname_en'] . ' ' . $teacher1['lname_en'] . ')' ?> <br>
                                                                                        <?php echo $subject2['name'] . ' (Prof: ' . $teacher2['fname_en'] . ' ' . $teacher2['lname_en'] . ')' ?>
                                                                                    </td>
                                                                                    <td><?php echo $timetable['classroom'] ?></td>
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
                                                </div>
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