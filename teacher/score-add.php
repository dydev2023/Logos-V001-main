<?php
session_start();
require_once '../config/dbcon.php';
include "data/season-db.php";
include "data/subject-db.php";
include "data/teacher-db.php";
include "data/student-score-db.php";

if (!isset($_SESSION['teacher_login'])) {
    header('location: ../index.php');
    exit;
} else {
    $allSeasons = getAllSeasons($conn);
    $allSubjects = getAllSubjects($conn);
    $teacherID = $_SESSION['teacher_login'];
    $teacher = getTeacherById($teacherID, $conn);

    $part_err = $season_err = $subject_err = $subject = '';
    $season = $part =  "";

    if(isset($_POST['search'])){
        if(empty($_POST['season'])){
            $season_err = 'Please select any season!';
        }else{
            $season = $_POST['season'];
        }
        
        if(empty($_POST['part'])){
            $part_err = 'Please select any part!';
        }else{
            $part = $_POST['part'];
        }
        
    }else{
        $season = '';
        $part = '';
    }

    if (isset($_POST['submit'])) {
        if(empty($_POST['subject'])){
            $subject_err = 'Please select any subject!';
            $season = $_POST['season'];
            $part = $_POST['part'];
        }else{
            $subject = $_POST['subject'];
        }

        if(!empty($_POST['subject'])){
            try {
                $sql = mysqli_connect("localhost", "root", "", "logos_db22");
                $n = $_POST['n'];
                for ($i = 1; $i <= $n; $i++) {
                    $student_id = $_POST[$i . 'student_id'];
                    $subject = $_POST['subject'];
                    $season = $_POST['season'];
                    $part = $_POST['part'];
                    $attending = $_POST[$i . 'attending'];
                    $behavire = $_POST[$i . 'behavire'];
                    $activities = $_POST[$i . 'activities'];
                    $midterm_ex = $_POST[$i . 'midterm_ex'];
                    $final_ex = $_POST[$i . 'final_ex'];
    
                    mysqli_query($sql, "INSERT INTO student_scores (student_id, season, part, subject, attending, behavire, activities, midterm_ex, final_ex) 
                                                        VALUES ('$student_id', '$season', '$part', '$subject', '$attending', '$behavire', '$activities', '$midterm_ex', '$final_ex')");
                    // mysqli_query($sql, "INSERT INTO student_scores (student_name, subject, season, part) VALUES ('$student_name', '$subject', '$season', '$part')");
                }
                $_SESSION['success'] = "Add Student's score successfully. <a href='score-list.php'>Click here to see the detail</a>";
                header('location: score-add.php');
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
                                <h3 class="page-title">Add Score</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="score-list.php">Score</a></li>
                                    <li class="breadcrumb-item active">Add Score</li>
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
                                            <h5 class="form-title student-info">Score Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>

                                        <div class="student-group-form">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group local-forms">
                                                        <label>Season<span class="login-danger">*</span></label>
                                                        <select class="form-control select" name="season">
                                                            <option><?php echo $season ?></option>
                                                            <?php $i = 0;
                                                            foreach ($allSeasons as $season) {
                                                                $i++; ?>
                                                                <option> <?php echo $season['season'] ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="error"><?php echo $season_err ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group local-forms">
                                                        <label>Part<span class="login-danger">*</span></label>
                                                        <select class="form-control select" name="part">
                                                            <option><?php echo $part ?></option>
                                                            <option>Morning</option>
                                                            <option>Afternoon</option>
                                                            <option>Evening</option>
                                                        </select>
                                                        <div class="error"><?php echo $part_err ?></div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2">
                                                    <div class="search-student-btn">
                                                        <button type="submit" name="search" class="btn btn-primary">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="page-header">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h3 class="page-title">All Students In This Class</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group local-forms">
                                            <label>Subject<span class="login-danger">*</span></label>
                                            <select class="form-control select" name="subject">
                                                <option></option>
                                                <?php $i = 0;
                                                foreach ($allSubjects as $subject) {
                                                    if ($subject['teacher'] == $teacher['firstname_en']) {
                                                        if ($subject['season'] == $_REQUEST['season']) {
                                                            $i++; ?>
                                                            <option> <?php echo $subject['name'] ?> </option>
                                                <?php }
                                                    }
                                                } ?>
                                            </select>
                                            <div class="error"><?php echo $subject_err ?></div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                                <thead class="student-thread">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Full Name</th>
                                                        <th>Attending</th>
                                                        <th>Behavire</th>
                                                        <th>Activities</th>
                                                        <th>MidTerm EX</th>
                                                        <th>Final EX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $connection = mysqli_connect("localhost", "root", "", "logos_db22");
                                                    if (isset($_POST['search'])) {

                                                        $season = $_POST['season'];
                                                        $part = $_POST['part'];

                                                        if(!empty($_POST['season']) && !empty($_POST['part'])){
                                                            $query = "SELECT * FROM students WHERE season LIKE '{$season}%' AND part LIKE '{$part}%' ";
                                                            $query_run = mysqli_query($connection, $query);

                                                            if (mysqli_num_rows($query_run) > 0) {
                                                                $n = mysqli_num_rows($query_run);
                                                                $i = 1;
                                                                while ($row = mysqli_fetch_assoc($query_run)) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $i ?>
                                                                        </td>
                                                                        <td>
                                                                            <h2 class="table-avatar">
                                                                                <?php
                                                                                if ($row['gender'] == 'Male') { ?>
                                                                                    <a>Mr <?php echo $row['firstname_en'] . " " . $row['lastname_en'] ?></a>
                                                                                <?php } else { ?>
                                                                                    <a>Miss <?php echo $row['firstname_en'] . " " . $row['lastname_en'] ?></a>
                                                                                <?php }
                                                                                ?>
                                                                            </h2>
                                                                        </td>
                                                                        <input class="form-control" type="hidden" name="<?php echo $i.'student_id' ?>" value="<?php echo $row['student_id'] ?>">
                                                                        <input class="form-control" type="hidden" name="n" value="<?php echo $n ?>">
                                                                        <td>
                                                                            <input class="form-control" type="text" name="<?php echo $i.'attending' ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="text" name="<?php echo $i . 'behavire' ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="text" name="<?php echo $i . 'activities' ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="text" name="<?php echo $i . 'midterm_ex' ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="text" name="<?php echo $i . 'final_ex' ?>">
                                                                        </td>
                                                                    </tr>

                                                                <?php $i++;
                                                                }
                                                            } else { ?>
                                                                <tr>
                                                                    <td> <?php echo "No student in this class!"; ?></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                        }
                                                    } else { ?>
                                                        <tr>
                                                            <td> <?php echo "No student in this class!"; ?></td>
                                                        </tr>
                                                    <?php }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" name="submit" class="btn btn-primary"  onclick="$comfirm_submit_alert">Submit</button>
                                            <!-- onclick="return confirm('Do you want to add these items?'") -->
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