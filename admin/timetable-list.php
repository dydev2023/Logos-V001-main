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
                                <h3 class="page-title">Time Teble List</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="timetable-list.php">Time Tebles</a></li>
                                    <li class="breadcrumb-item active">Time Teble List</li>
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
                                                <div class="container">
                                                    <div class="timetable-img text-center">
                                                        <img src="img/content/timetable.png" alt="">
                                                    </div>
                                                    <p class="text-center"><b>Bachelor Chinese Studies Learning-Teaching Schedule</b></p>
                                                    <p class="text-center">For 1st Semester, in Academic year 2022-2023</p>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered text-center">
                                                            <thead>
                                                                <tr class="bg-light-gray">
                                                                    <th class="text-uppercase">Time</th>
                                                                    <th class="text-uppercase">Monday</th>
                                                                    <th class="text-uppercase">Tuesday</th>
                                                                    <th class="text-uppercase">Wednesday</th>
                                                                    <th class="text-uppercase">Thursday</th>
                                                                    <th class="text-uppercase">Friday</th>
                                                                    <th class="text-uppercase">Saturday</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="align-middle">9:00-10:00</td>
                                                                    <td>
                                                                        <span>Dance</span>
                                                                        <div class="margin-10px-top font-size14">Ivana Wong</div>
                                                                        <div class="small text-secondary">(book id: B001)</div>
                                                                        <div class="small text-secondary">(Room: Ch001)</div>
                                                                        <div class="small text-secondary">(Prf: Chon)</div>
                                                                    </td>
                                                                    <td>
                                                                        <span>Yoga</span>
                                                                        <div class="margin-10px-top font-size14">Ivana Wong</div>
                                                                        <div class="small text-secondary">(book id: B001)</div>
                                                                        <div class="small text-secondary">(Room: Ch001)</div>
                                                                        <div class="small text-secondary">(Prf: Chon)</div>
                                                                    </td>

                                                                    <td>
                                                                        <span">Music</span>
                                                                        <div class="margin-10px-top font-size14">Kate Alley</div>
                                                                        <div class="small text-secondary">(book id: B001)</div>
                                                                        <div class="small text-secondary">(Room: Ch001)</div>
                                                                        <div class="small text-secondary">(Prf: Chon)</div>
                                                                            
                                                                    </td>
                                                                    <td>
                                                                        <span>Dance</span>
                                                                        <div class="margin-10px-top font-size14">Ivana Wong</div>
                                                                        <div class="small text-secondary">(book id: B001)</div>
                                                                        <div class="small text-secondary">(Room: Ch001)</div>
                                                                        <div class="small text-secondary">(Prf: Chon)</div>
                                                                    </td>
                                                                    <td>
                                                                        <span>Art</span>
                                                                        <div class="margin-10px-top font-size14">Marta Healy</div>
                                                                        <div class="small text-secondary">(book id: B001)</div>
                                                                        <div class="small text-secondary">(Room: Ch001)</div>
                                                                        <div class="small text-secondary">(Prf: Chon)</div>
                                                                    </td>
                                                                    <td>
                                                                        <span>English</span>
                                                                        <div class="margin-10px-top font-size14">James Smith</div>
                                                                        <div class="small text-secondary">(book id: B001)</div>
                                                                        <div class="small text-secondary">(Room: Ch001)</div>
                                                                        <div class="small text-secondary">(Prf: Chon)</div>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="align-middle">10:00am</td>
                                                                    <td>
                                                                        <span>Dance</span>
                                                                        <div class="margin-10px-top font-size14">Ivana Wong</div>
                                                                        <div class="small text-secondary">(book id: B001)</div>
                                                                        <div class="small text-secondary">(Room: Ch001)</div>
                                                                        <div class="small text-secondary">(Prf: Chon)</div>
                                                                    </td>
                                                                    <td>
                                                                        <span>Yoga</span>
                                                                        <div class="margin-10px-top font-size14">Ivana Wong</div>
                                                                        <div class="small text-secondary">(book id: B001)</div>
                                                                        <div class="small text-secondary">(Room: Ch001)</div>
                                                                        <div class="small text-secondary">(Prf: Chon)</div>
                                                                    </td>

                                                                    <td>
                                                                        <span">Music</span>
                                                                        <div class="margin-10px-top font-size14">Kate Alley</div>
                                                                        <div class="small text-secondary">(book id: B001)</div>
                                                                        <div class="small text-secondary">(Room: Ch001)</div>
                                                                        <div class="small text-secondary">(Prf: Chon)</div>
                                                                    </td>
                                                                    <td>
                                                                        <span>Dance</span>
                                                                        <div class="margin-10px-top font-size14">Ivana Wong</div>
                                                                        <div class="small text-secondary">(book id: B001)</div>
                                                                        <div class="small text-secondary">(Room: Ch001)</div>
                                                                        <div class="small text-secondary">(Prf: Chon)</div>
                                                                    </td>
                                                                    <td>
                                                                        <span>Art</span>
                                                                        <div class="margin-10px-top font-size14">Marta Healy</div>
                                                                        <div class="small text-secondary">(book id: B001)</div>
                                                                        <div class="small text-secondary">(Room: Ch001)</div>
                                                                        <div class="small text-secondary">(Prf: Chon)</div>
                                                                    </td>
                                                                    <td>
                                                                        <span>English</span>
                                                                        <div class="margin-10px-top font-size14">James Smith</div>
                                                                        <div class="small text-secondary">(book id: B001)</div>
                                                                        <div class="small text-secondary">(Room: Ch001)</div>
                                                                        <div class="small text-secondary">(Prf: Chon)</div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div><br><br>
                                                    <p><i><b>Remark: </b></i></p>
                                                    <p><i>1. Google Meet Link will be post on Google Classroom.</i></p>
                                                    <p><i>2. Join your online class as scheduled everyday.</i></p>
                                                    <p><i>3. Don't be LATE! Attendance will be taken!</i></p>
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