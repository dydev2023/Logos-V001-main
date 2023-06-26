<?php
session_start();
require_once '../config/dbcon.php';
if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
} else {
    $program = $season = $part = '';
    $program_err = $season_err = $part_err = '';
    $program_red_border = $season_red_border = $part_red_border = '';

    include "admin-datas/student-db.php";
    include "admin-datas/program-db.php";
    include "admin-datas/season-db.php";
    $programs = getAllPrograms($conn);
    $seasons = getLastSeason($conn);

    if (isset($_POST['search'])) {
        if (empty($_REQUEST['program'])) {
            $program_err = 'Program is required!';
            $program_red_border = 'red_border';
        } else {
            $program = $_REQUEST['program'];
        }
        if (empty($_REQUEST['season'])) {
            $season_err = 'Season ID is required!';
            $season_red_border = 'red_border';
        } else {
            $season = $_REQUEST['season'];
        }
        if (empty($_REQUEST['part'])) {
            $part_err = 'Part is required!';
            $part_red_border = 'red_border';
        } else {
            $part = $_REQUEST['part'];
        }

        if (!empty($program) and !empty($season) and !empty($part)) {
            // Filter Students
            $students = $conn->prepare("SELECT * FROM students WHERE program=:program AND part=:part AND season_start=:season_start");
            $students->bindParam(':program', $program);
            $students->bindParam(':part', $part);
            $students->bindParam(':season_start', $season);
            $students->execute();
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

    <?php
    include_once("../include/header.php");
    include_once("../include/sidebar.php");
    ?>

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Group Classes</h3>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="classgroup-list.php">Groups</a></li>
                                <li class="breadcrumb-item active">Group Classes</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="student-group-form">
                <form method="post" action="" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-12">
                            <h5 class="form-title student-info">Fillter Student By:</h5>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group local-forms">
                                <label>Season <span class="login-danger">*</span></label>
                                <select class="form-control select <?php echo $season_red_border ?>" name="season">
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
                                <label>Program <span class="login-danger">*</span></label>
                                <select class="form-control select <?php echo $program_red_border ?>" name="program">
                                    <option><?php echo $program ?></option>
                                    <?php $i = 0;
                                    foreach ($programs as $program) {
                                        $i++; ?>
                                        <option> <?php echo $program['program'] ?> </option>
                                    <?php } ?>
                                </select>
                                <div class="error"><?php echo $program_err ?></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3"> <!-- New element -->
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
                </form>
            </div>





            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">

                            <?php if (isset($_SESSION['success'])) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php
                                    echo $_SESSION['success'];
                                    unset($_SESSION['success']);
                                    ?>
                                </div>
                            <?php } ?>

                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">All Students</h3> 
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <?php
                                    if (isset($_POST['search'])) {
                                        if (!empty($program) and !empty($season) and !empty($part)) { ?>

                                            <thead class="student-thread">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Student ID</th>
                                                    <th>Full Name</th>
                                                    <th>Program</th>
                                                    <th>Season start</th>
                                                    <th>Part</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;
                                                foreach ($students as $student) {
                                                    $i++; ?>

                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $student['std_id'] ?></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <?php
                                                                $student_image = $student['image'];

                                                                if ($student_image == '') { ?>
                                                                    <a href="student-detail.php?$id=<? $student['id'] ?>" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="<?php echo "upload/profile.png" ?>" alt="User Image"></a>
                                                                <?php } else { ?>
                                                                    <a href="student-detail.php?$id=<? $student['id'] ?>" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="<?php echo "upload/student_profile/$student_image" ?>" alt="User Image"></a>
                                                                <?php } ?>



                                                                <?php
                                                                if ($student['gender'] == 'Male') { ?>
                                                                    <a>Mr <?php echo $student['fname_en'] . " " . $student['lname_en'] ?></a>
                                                                <?php } else { ?>
                                                                    <a>Miss <?php echo $student['fname_en'] . " " . $student['lname_en'] ?></a>
                                                                <?php }
                                                                ?>
                                                            </h2>
                                                        </td>
                                                        <td><?php echo $student['program'] ?></td>
                                                        <td><?php echo $student['season_start'] ?></td>
                                                        <td><?php echo $student['part'] ?></td>
                                                    </tr>
                                                <?php  } ?>

                                            </tbody>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td>No Student!</td>
                                        </tr>
                                    <?php } ?>
                                </table>
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

    <script src="../assets/plugins/datatables/datatables.min.js"></script>

    <script src="../assets/js/script.js"></script>

</body>

</html>