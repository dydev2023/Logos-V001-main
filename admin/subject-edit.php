<?php
session_start();
require_once '../config/dbcon.php';
include "admin-datas/season-db.php";
include "admin-datas/teacher-db.php";
include "admin-datas/program-db.php";

$seasons = getLastSeason($conn);
$teachers = getAllTeachers($conn);
$programs = getAllPrograms($conn);

$sub_id = $name = $teacher = $program = $season = $semester = $credit = '';

$sub_id_err = $name_err = $teacher_err = $program_err = $season_err = $semester_err = $credit_err = '';

$sub_id_red_border = $name_red_border = $teacher_red_border = $program_red_border = $season_red_border = $semester_red_border = $credit_red_border = '';

if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
    exit;
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        include "admin-datas/subject-db.php";
        $subject = getSubjectById($id, $conn);

        // for select teacher name instead teacher_ID
        $t_id = $subject['t_id'];
        $teacherByID = getTeacherById($t_id, $conn);


        if (isset($_REQUEST['submit'])) {
            if (empty($_REQUEST['sub_id'])) {
                $sub_id_err = 'Subject ID is required!';
                $sub_id_red_border = 'red_border';
            } else {
                $sub_id = $_REQUEST['sub_id'];
            }

            if (empty($_REQUEST['name'])) {
                $name_err = 'Subject name is required!';
                $name_red_border = 'red_border';
            } else {
                $name = $_REQUEST['name'];
            }

            if (empty($_REQUEST['teacher'])) {
                $teacher_err = 'Teacher is required!';
                $teacher_red_border = 'red_border';
            } else {
                $teacher = $_REQUEST['teacher'];
            }

            if (empty($_REQUEST['program'])) {
                $program_err = 'Program is required!';
                $program_red_border = 'red_border';
            } else {
                $program = $_REQUEST['program'];
            }

            if (empty($_REQUEST['season'])) {
                $season_err = 'Season is required!';
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

            if (empty($_REQUEST['credit'])) {
                $credit_err = 'Credit is required!';
                $credit_red_border = 'red_border';
            } else {
                $credit = $_REQUEST['credit'];
            }

            if(!empty($sub_id) && !empty($name) && !empty($teacher) && !empty($program) && !empty($season) && !empty($credit) && !empty($semester)){
                try {

                    // Update Subject
                    $sql = "UPDATE subjects SET t_id=:t_id, name=:name, program=:program, season=:season, semester=:semester, credit=:credit WHERE sub_id=:sub_id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':sub_id', $id);
                    $stmt->bindParam(':t_id', $t_id);
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':program', $program);
                    $stmt->bindParam(':season', $season);
                    $stmt->bindParam(':semester', $semester);
                    $stmt->bindParam(':credit', $credit);
                    $stmt->execute();
                    $_SESSION['success'] = "Updated Subject successfully.";
                    header('location: subject-list.php');
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
                                <h3 class="page-title">Update Subject</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="subject-list.php">Subject</a></li>
                                    <li class="breadcrumb-item active">Update Subject</li>
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

                                    <!-- <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title student-info">Subject Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Subject Name <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $name_red_border ?>" type="text" name="name" value="<?php echo $subject['name'] ?>">
                                                <div class="error"><?php echo $name_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Teacher<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $teacher_id_red_border ?>" name="teacher_id">
                                                    <option value="<?php echo $teacherByID['id'] ?>"><?php echo $teacherByID['fname_en'] . ' ' . $teacherByID['lname_en'] ?></option>
                                                    <?php $i = 0;
                                                    foreach ($teachers as $teacher) {
                                                        $i++; ?>
                                                        <option value="<?php echo $teacher['id'] ?>"> <?php echo $teacher['fname_en'] . ' ' . $teacher['lname_en'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                                <div class="error"><?php echo $teacher_id_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Season Year<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $season_red_border ?>" name="season" required>
                                                    <option><?php echo $subject['season'] ?></option>
                                                    <?php $i = 0;
                                                    foreach ($seasons as $season) {
                                                        $i++; ?>
                                                        <option> <?php echo $season['season'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                                <div class="error"><?php echo $season_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Semester<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $semester_red_border ?>" name="semester">
                                                    <option><?php echo $subject['semester'] ?></option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                                <div class="error"><?php echo $semester_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Credit<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $credit_red_border ?>" name="credit">
                                                    <option><?php echo $subject['credit'] ?></option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                </select>
                                                <div class="error"><?php echo $credit_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title student-info">Subject Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Subject ID <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $sub_id_red_border ?>" type="text" name="sub_id" value="<?php echo $subject['sub_id'] ?>" readonly>
                                                <div class="error"><?php echo $sub_id_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Subject Name <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $name_red_border ?>" type="text" name="name" value="<?php echo $subject['name'] ?>">
                                                <div class="error"><?php echo $name_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Teacher<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $teacher_red_border ?>" name="teacher">
                                                    <option><?php echo $teacherByID['fname_en'] . ' ' . $teacherByID['lname_en'] ?></option>
                                                    <?php $i = 0;
                                                    foreach ($teachers as $teacher) {
                                                        $i++; ?>
                                                        <option value="<?php echo $teacher['t_id'] ?>"> <?php echo $teacher['fname_en'] . ' ' . $teacher['lname_en'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                                <div class="error"><?php echo $teacher_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Program<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $program_red_border ?>" name="program">
                                                    <option><?php echo $subject['program'] ?></option>
                                                    <?php $i = 0;
                                                    foreach ($programs as $program) {
                                                        $i++; ?>
                                                        <option> <?php echo $program['program'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                                <div class="error"><?php echo $program_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Season<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $season_red_border ?>" name="season">
                                                    <?php $i = 0;
                                                    foreach ($seasons as $season) {
                                                        $i++; ?>
                                                        <option> <?php echo $season['season'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                                <div class="error"><?php echo $season_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Semester<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $semester_red_border ?>" name="semester">
                                                    <option><?php echo $subject['semester'] ?></option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                                <div class="error"><?php echo $semester_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Credit<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $credit_red_border ?>" name="credit">
                                                    <option><?php echo $subject['credit'] ?></option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                </select>
                                                <div class="error"><?php echo $credit_err ?></div>
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