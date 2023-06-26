<?php
session_start();
require_once '../config/dbcon.php';
include "admin-datas/season-db.php";
include "admin-datas/classroom-db.php";
include "admin-datas/subject-db.php";
$seasons = getAllSeasons($conn);
$subjects = getAllSubjects($conn);
$classrooms = getAllClassrooms($conn);

$season = $semester = $year = $part = '';

$season_err = $semester_err = $year_err = $part_err = '';

$season_red_border = $semester_red_border = $year_red_border = $part_red_border = '';

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

        if (empty($_REQUEST['year'])) {
            $year_err = 'Year is required!';
            $year_red_border = 'red_border';
        } else {
            $year = $_REQUEST['year'];
        }
        
        if (empty($_REQUEST['part'])) {
            $part_err = 'Part is required!';
            $part_red_border = 'red_border';
        } else {
            $part = $_REQUEST['part'];
        }

    } else {
        $season = '';
        $semester = '';
    }

    if (isset($_REQUEST['submit'])) {
        
        if (empty($_REQUEST['season'])) {
            $season_err = 'Select any season year first!';
            $season_red_border = 'red_border';
        } else {
            $season = $_REQUEST['season'];
        }

        if (empty($_REQUEST['semester'])) {
            $semester_err = 'Select any semester first!';
            $semester_red_border = 'red_border';
        } else {
            $semester = $_REQUEST['semester'];
        }

        if (empty($_REQUEST['year'])) {
            $year_err = 'Select any year first!';
            $year_red_border = 'red_border';
        } else {
            $year = $_REQUEST['year'];
        }

        if (empty($_REQUEST['part'])) {
            $part_err = 'Select any part first!';
            $part_red_border = 'red_border';
        } else {
            $part = $_REQUEST['part'];
        }

        if(!empty($season) && !empty($semester) && !empty($year) && !empty($part)){

            try {

                $sql = mysqli_connect("localhost", "root", "", "logos_db22");

                for ($a = 1; $a <= 5; $a++) {
                    $subject= $_REQUEST[$a . 'subject'];
                    $season = $_REQUEST['season'];
                    $semester = $_REQUEST['semester'];
                    $days = $_REQUEST[$a . 'days'];
                    $classroom = $_REQUEST[$a . 'classroom'];

                    //////Don't foget to uncomment this script //////
                    // mysqli_query($sql, "INSERT INTO timetables (subject1_id, subject2_id, season, semester, days, classroom)
                    //                 VALUES ('$subject1_id', '$subject2_id', '$season', '$semester', '$days', '$classroom')");

                }
                $_SESSION['success'] = "Add Subject successfully. <a href='timetable-list.php'> Click here to see the detail </a>";
                header('location: timetable-add.php');
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
                                <h3 class="page-title">Add Time Teble</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="timetable-list.php">Time Tebles</a></li>
                                    <li class="breadcrumb-item active">Add Time Teble</li>
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
                                                <label>Season <span class="login-danger">*</span></label>
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
                                                <label>Semester <span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $semester_red_border ?>" name="semester">
                                                    <option><?php echo $semester ?></option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                                <div class="error"><?php echo $semester_err ?></div>
                                            </div>
                                        </div>
                                         <div class="col-12 col-sm-2">  <!-- New element -->
                                            <div class="form-group local-forms">
                                                <label>Year <span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $year_red_border ?>" name="year">
                                                    <option><?php echo $year ?></option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                                <div class="error"><?php echo $year_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-2">      <!-- New element -->
                                            <div class="form-group local-forms">
                                                <label>Part <span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $part_red_border ?>" name="part">
                                                    <option><?php echo $part ?></option>
                                                    <option>Morning</option>
                                                    <option>Afternoon</option>
                                                    <option>Evening</option>
                                                </select>
                                                <div class="error"><?php echo $part_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-2">
                                            <div class="search-student-btn">
                                                <button type="submit" name="search" class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-sm">
                                                <thead class="student-thread">
                                                    <tr>
                                                        <th>Day</th>
                                                        <th>Subject</th>
                                                        <th>Book ID</th>   <!-- New element -->
                                                        <th>Teacher</th>
                                                        <th>Time</th>     <!-- New element -->
                                                        <th>Class</th>   
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $j = 0; // For loop arrays
                                                    $addLoop = 1; // For loop add subjects
                                                    $days = array("Monday", "Tusday", "Wednesday", "Thursday", "Friday");
                                                    while ($j <= 4) { ?>
                                                        <tr>
                                                            <td rowspan="2">
                                                                <?php echo $days[$j] ?>
                                                                <input type="hidden" name="<?php echo $addLoop . 'days'?>" value="<?php echo $days[$j]?>">
                                                            </td>
                                                            <td>
                                                                <select class="form-control select" name="<?php echo $addLoop . 'subject' ?>">
                                                                    <option></option>
                                                                    <?php
                                                                    $k = 0; // For loop subjects
                                                                    foreach ($subjects as $subject) {
                                                                        if ($subject['season'] == $_REQUEST['season'] && $subject['semester'] == $_REQUEST['semester']) {
                                                                            $k++; ?>
                                                                            <option value="<?php echo $subject['id'] ?>"> <?php echo $subject['name'] ?> </option>
                                                                    <?php }
                                                                    } ?>
                                                                </select>
                                                            </td>
                                                            <td>        <!-- New element -->
                                                                <select class="form-control select" name="">
                                                                    <option></option>
                                                                    <option>B001</option>
                                                                </select>
                                                            </td>
                                                            <td>        <!-- New element -->
                                                                <select class="form-control select" name="">
                                                                    <option></option>
                                                                    <option>Pr. Jim</option>
                                                                </select>
                                                            </td>
                                                            <td>        <!-- New element -->
                                                                <input class="form-control" type="text">
                                                            </td>
                                                            <td rowspan="2">
                                                                <select class="form-control select" name="<?php echo $addLoop . 'classroom' ?>">
                                                                    <option></option>
                                                                    <?php $i = 0;
                                                                    foreach ($classrooms as $classroom) {
                                                                        $i++; ?>
                                                                        <option value="<?php echo $classroom['room'] ?>"> <?php echo $classroom['room'] ?> </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <!-- for subject 2 -->  <!-- New element -->
                                                        <tr>  
                                                            <td>
                                                                <select class="form-control select" name="">
                                                                    <option></option>
                                                                    <?php
                                                                    $k = 0; // For loop subjects
                                                                    foreach ($subjects as $subject) {
                                                                        if ($subject['season'] == $_REQUEST['season'] && $subject['semester'] == $_REQUEST['semester']) {
                                                                            $k++; ?>
                                                                            <option value="<?php echo $subject['id'] ?>"> <?php echo $subject['name'] ?> </option>
                                                                    <?php }
                                                                    } ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control select" name="">
                                                                    <option></option>
                                                                    <option>B001</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control select" name="">
                                                                    <option></option>
                                                                    <option>Pr. Jim</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" type="text">
                                                            </td>
                                                        </tr>

                                                    <?php $j++;
                                                        $addLoop++;
                                                    } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button type="submit" name="submit" class="btn btn-primary" onclick="$comfirm_submit_alert">Submit</button>
                                                <!-- onclick="return confirm('Do you want to add these items?'") -->
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