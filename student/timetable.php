<?php
session_start();
require_once '../config/dbcon.php';
include "student-datas/season-db.php";
include "student-datas/room-db.php";
include "student-datas/subject-db.php";
include "student-datas/timetable-db.php";
include "student-datas/teacher-db.php";
include "student-datas/student-db.php";

$seasons = getAllSeasons($conn);
$subjects = getAllSubjects($conn);
$classrooms = getAllRooms($conn);
$timetables = getTimetables($conn);

if (!isset($_SESSION['student_login'])) {
    header('location: ../index.php');
} else {
    $id = $_SESSION['student_login'];
    $student = getStudentById($id, $conn);
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
                                <h3 class="page-title">My Time Teble</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="student-home.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">My Time Teble</li>
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
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="page-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="page-title">Time Tables For <?php echo $student['season'] ?></h3>
                                                        </div>
                                                        <div class="col-6">
                                                            <ul class="chart-list-out">
                                                                <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                        $season = $student['season'];
                                                        $times = $student['part'];
                                                        try {
                                                            foreach ($timetables as $timetable) {
                                                                if ($timetable['season'] == $season && !empty($times)) {
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
                                                                            <?php } ?>


                                                                            <td>
                                                                                <?php echo $subject1['name'] . ' (Prof: ' . $teacher1['fname_en'] . ' ' . $teacher1['lname_en'] . ')' ?> <br>
                                                                                <?php echo $subject2['name'] . ' (Prof: ' . $teacher2['fname_en'] . ' ' . $teacher2['lname_en'] . ')' ?>
                                                                            </td>
                                                                            <td><?php echo $timetable['classroom'] ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                        <?php }
                                                            }
                                                        } catch (PDOException $e) {
                                                            $e->getMessage();
                                                        }  ?>

                                                    </table>
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