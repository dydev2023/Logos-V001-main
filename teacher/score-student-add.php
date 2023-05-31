<?php
session_start();
require_once '../config/dbcon.php';
include "../admin/data/student-db.php";

if (!isset($_SESSION['teacher_login'])) {
    header('location: ../index.php');
    exit;
} else {
    $season = $_SESSION['season'];
    $subject = $_SESSION['subject'];
    $students = getAllStudents($conn);

    if (isset($_REQUEST['submit'])) {
        try {
            $season_year = $season;
            $subject_name = $subject;
            $studentID = $_REQUEST['studentID'];
            $semester1 = $_REQUEST['semester1'];
            $semester2 = $_REQUEST['semester2'];

            for ($i=1; $i<=2; $i++) {
                $stmt = $conn->prepare('INSERT INTO student_scores(season, subject, student_id, semester1, semester2) 
                                            VALUE(:season, :subject, :student_id, :semester1, :semester2)');
                $stmt->bindParam(':season', $season_year);
                $stmt->bindParam(':subject', $subject_name);
                $stmt->bindParam(':student_id', $studentID);
                $stmt->bindParam(':semester1', $semester1);
                $stmt->bindParam(':semester2', $semester2);
                $stmt->execute();
            }
            $_SESSION['success'] = "Add Student's score successfully. <a href='student-list.php'>Click here to see the detail</a>";
            header('location: score-student-add.php');
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
                                <h3 class="page-title">Add Student's Score</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="score-list.php">Student's Score</a></li>
                                    <li class="breadcrumb-item active">Add Student's Score</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card comman-shadow">
                            <div class="card-body">
                                <form method="post" action="score-student-add-db.php">
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
                                            <h5 class="form-title student-info">Student's Score Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group local-forms">
                                                <label>Season<span class="login-danger">*</span> </label> <br>
                                                <input class="form-control" type="text" name="season" value="<?php echo "$season" ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group local-forms">
                                                <label>Subject<span class="login-danger">*</span> </label> <br>
                                                <input class="form-control" type="text" name="subject" value="<?php echo "$subject" ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="page-header">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h3 class="page-title">All Students In This Class</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                                <thead class="student-thread">
                                                    <tr>
                                                        <th>ID echo <?php $c ?></th>
                                                        <th>Full Name</th>
                                                        <th>Gender</th>
                                                        <th>Semester 1</th>
                                                        <th>Semester 2</th>
                                                        <!-- <th>Created At</th>
                                                        <th>Updated At</th> -->
                                                        <th class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0;
                                                    foreach ($students as $student) {
                                                        if ($student['season'] == $season) {
                                                            $i++; ?>

                                                            <tr>
                                                                <input class="form-control" type="text" name="studentID" value="<?php echo $student['student_id'] ?>" hidden>
                                                                <td><?php echo $student['student_id'] ?></td>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <?php $student_image = $student['image'] ?>
                                                                        <a href="student-detail.php?$id=<? $student['id'] ?>" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="<?php echo "../admin/upload/student_profile/$student_image" ?>" alt="User Image"></a>
                                                                        <a href="student-detail.php?$id=<? $student['id'] ?>"><?php echo $student['firstname_en'] . " " . $student['lastname_en'] ?></a>
                                                                    </h2>
                                                                </td>
                                                                <td><?php echo $student['gender'] ?></td>
                                                                <td>
                                                                    <input class="form-control" type="text" name="semester1">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" type="text" name="semester2">
                                                                </td>
                                                                <td class="text-end">
                                                                    <div class="actions ">
                                                                        <a href="student-edit.php?id=<?= $student['id'] ?>" class="btn btn-sm bg-danger-light">
                                                                            <i class="feather-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                    <?php }
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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