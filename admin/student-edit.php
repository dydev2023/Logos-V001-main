<?php

session_start();
require_once '../config/dbcon.php';
include "admin-datas/student-db.php";
include "admin-datas/season-db.php";

$std_id = $fname_en = $lname_en = $gender = $fname_la = $lname_la = $dob = $fname_ch = '';
$lname_ch = $tel = $whatsapp = $email = $village = $district = $province = '';
$nation = $religion = $highschool = $middleschool = $elementaryschool = $familymatters = $plansforthefuture =  $season = $part = '';
$image_file = '';

$std_id_err = $fname_en_err = $lname_en_err = $gender_err = $fname_la_err = $lname_la_err = $dob_err = $fname_ch_err = '';
$lname_ch_err = $tel_err = $whatsapp_err = $email_err = $village_err = $district_err = $province_err = '';
$nation_err = $religion_err = $highschool_err = $middleschool_err = $elementaryschool_err = $season_err =  $part_err = '';
$image_file_err = '';

$std_id_red_border = $fname_en_red_border = $lname_en_red_border = $gender_red_border = $fname_la_red_border = $lname_la_red_border = $dob_red_border = $fname_ch_red_border = '';
$lname_ch_red_border = $tel_red_border = $whatsapp_red_border = $email_red_border = $village_red_border = $district_red_border = $province_red_border = '';
$nation_red_border = $religion_red_border = $highschool_red_border = $middleschool_red_border = $elementaryschool_red_border =  $season_red_border = $part_red_border = '';

if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $student = getStudentById($id, $conn);
        $s_row = getStudentById($id, $conn);
        $user = studentGetUserById($id, $conn);
        $seasons = getAllSeasons($conn);

        if (isset($_REQUEST['submit'])) {

            // Select The E-mail in Database For Check
            $check_u_id = $conn->prepare("SELECT u_id FROM users WHERE u_id = :u_id AND u_id != :student_std_id");
            $check_u_id->bindParam(":student_std_id", $student['std_id']);
            $check_u_id->bindParam(":u_id", $_REQUEST['std_id']);
            $check_u_id->execute();

            $check_u_email = $conn->prepare("SELECT u_email FROM users WHERE u_email = :u_email AND u_email != :email");
            $check_u_email->bindParam(":email", $student['email']);
            $check_u_email->bindParam(":u_email", $_REQUEST['email']);
            $check_u_email->execute();


            // Select Teacher data in Database For Check
            $check_tel = $conn->prepare("SELECT tel FROM students WHERE tel = :tel AND tel != :own_tel");
            $check_tel->bindParam(":own_tel", $student['tel']);
            $check_tel->bindParam(":tel", $_REQUEST['tel']);
            $check_tel->execute();

            $check_whatsapp = $conn->prepare("SELECT whatsapp FROM students WHERE whatsapp = :whatsapp AND whatsapp != :own_whatsapp");
            $check_whatsapp->bindParam(":own_whatsapp", $student['whatsapp']);
            $check_whatsapp->bindParam(":whatsapp", $_REQUEST['whatsapp']);
            $check_whatsapp->execute();

            if (empty($_REQUEST["std_id"])) {
                $std_id_err = 'Student ID is required!';
                $std_id_red_border = 'red_border';
            } elseif ($check_u_id->rowCount() > 0) {
                $std_id_err = 'The student ID was writen already exsist!';
                $std_id_red_border = 'red_border';
                $std_id = $_REQUEST['std_id'];
            } else {
                $std_id = $_REQUEST['std_id'];
            }

            if (empty($_REQUEST["fname_en"])) {
                $fname_en_err = 'First name in English is required!';
                $fname_en_red_border = 'red_border';
            } else {
                $fname_en = $_REQUEST['fname_en'];
            }

            if (empty($_REQUEST["lname_en"])) {
                $lname_en_err = 'Lsast ame in English is required!';
                $lname_en_red_border = 'red_border';
            } else {
                $lname_en = $_REQUEST['lname_en'];
            }

            if (empty($_REQUEST["gender"])) {
                $gender_err = 'Gender is required!';
                $gender_red_border = 'red_border';
            } else {
                $gender = $_REQUEST['gender'];
            }

            if (empty($_REQUEST["fname_la"])) {
                $fname_la_err = 'First name in Laos is required!';
                $fname_la_red_border = 'red_border';
            } else {
                $fname_la = $_REQUEST['fname_la'];
            }

            if (empty($_REQUEST["lname_la"])) {
                $lname_la_err = 'Lsast ame in Laos is required!';
                $lname_la_red_border = 'red_border';
            } else {
                $lname_la = $_REQUEST['lname_la'];
            }

            if (empty($_REQUEST["dob"])) {
                $dob_err = 'Date of birth is required!';
                $dob_red_border = 'red_border';
            } else {
                $dob = $_REQUEST['dob'];
            }

            if (empty($_REQUEST["fname_ch"])) {
                $fname_ch_err = 'First name in Chiness is required!';
                $fname_ch_red_border = 'red_border';
            } else {
                $fname_ch = $_REQUEST['fname_ch'];
            }

            if (empty($_REQUEST["lname_ch"])) {
                $lname_ch_err = 'Lsast srname in Chiness is required!';
                $lname_ch_red_border = 'red_border';
            } else {
                $lname_ch = $_REQUEST['lname_ch'];
            }

            if (empty($_REQUEST["tel"])) {
                $tel_err = 'Phone number is required!';
                $tel_red_border = 'red_border';
            } elseif ($check_tel->rowCount() > 0) {
                $tel_err = 'Tel was writen already exsist!';
                $tel_red_border = 'red_border';
                $tel = $_REQUEST['tel'];
            } else {
                $tel = $_REQUEST['tel'];
            }

            if (empty($_REQUEST["whatsapp"])) {
                $whatsapp_err = 'Whatsapp namber is required!';
                $whatsapp_red_border = 'red_border';
            } elseif ($check_whatsapp->rowCount() > 0) {
                $whatsapp_err = 'The whatsapp number was writen already exsist!';
                $whatsapp_red_border = 'red_border';
                $whatsapp = $_REQUEST['whatsapp'];
            } else {
                $whatsapp = $_REQUEST['whatsapp'];
            }

            if (empty($_REQUEST["email"])) {
                $email_err = 'E-mail is required!';
                $email_red_border = 'red_border';
            } elseif ($check_u_email->rowCount() > 0) {
                $email_err = 'The E-mail was writen already exsist!';
                $email_red_border = 'red_border';
                $email = $_REQUEST['email'];
            } elseif (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
                $email_err = "The E-mail was writen in Invalid email format, please add @!";
                $email_red_border = 'red_border';
                $email = $_REQUEST['email'];
            } else {
                $email = $_REQUEST['email'];
            }

            if (empty($_REQUEST["village"])) {
                $village_err = 'Address residence is required!';
                $village_red_border = 'red_border';
            } else {
                $village = $_REQUEST['village'];
            }

            if (empty($_REQUEST["district"])) {
                $district_err = 'Address current is required!';
                $district_red_border = 'red_border';
            } else {
                $district = $_REQUEST['district'];
            }

            if (empty($_REQUEST["province"])) {
                $province_err = 'Address current type is required!';
                $province_red_border = 'red_border';
            } else {
                $province = $_REQUEST['province'];
            }

            if (empty($_REQUEST["nation"])) {
                $nation_err = 'Nation is required!';
                $nation_red_border = 'red_border';
            } else {
                $nation = $_REQUEST['nation'];
            }

            if (empty($_REQUEST["religion"])) {
                $religion_err = 'Religion is required!';
                $religion_red_border = 'red_border';
            } else {
                $religion = $_REQUEST['religion'];
            }

            if (empty($_REQUEST["highschool"])) {
                $highschool_err = 'Highschool is required!';
                $highschool_red_border = 'red_border';
            } else {
                $highschool = $_REQUEST['highschool'];
            }

            if (empty($_REQUEST["middleschool"])) {
                $middleschool_err = 'Middle school is required!';
                $middleschool_red_border = 'red_border';
            } else {
                $middleschool = $_REQUEST['middleschool'];
            }

            if (empty($_REQUEST["elementaryschool"])) {
                $elementaryschool_err = 'Elementary school is required!';
                $elementaryschool_red_border = 'red_border';
            } else {
                $elementaryschool = $_REQUEST['elementaryschool'];
            }

            if (!empty($_REQUEST['familymatters'])) {
                $familymatters = $_REQUEST['familymatters'];
            }

            if (!empty($_REQUEST['plansforthefuture'])) {
                $plansforthefuture = $_REQUEST['plansforthefuture'];
            }

            if (empty($_REQUEST["season"])) {
                $season_err = 'Season is required!';
                $season_red_border = 'red_border';
            } else {
                $season = $_REQUEST['season'];
            }

            if (empty($_REQUEST["part"])) {
                $part_err = 'Part is required!';
                $part_red_border = 'red_border';
            } else {
                $part = $_REQUEST['part'];
            }

            if (empty($student['image'])) {
                $image_file_err = "Student image is required!";
            } else {
                $image_file = $_FILES['txt_file']['name'];
                $type = $_FILES['txt_file']['type'];
                $size = $_FILES['txt_file']['size'];
                $temp = $_FILES['txt_file']['tmp_name'];
            }

            if (
                !empty($_REQUEST["std_id"]) && !empty($_REQUEST["fname_en"]) && !empty($_REQUEST["lname_en"]) &&
                !empty($_REQUEST["gender"]) && !empty($_REQUEST["fname_la"]) && !empty($_REQUEST["lname_la"]) && !empty($_REQUEST["dob"]) &&
                !empty($_REQUEST["fname_ch"]) && !empty($_REQUEST["lname_ch"]) && !empty($_REQUEST["tel"]) && !empty($_REQUEST["whatsapp"]) &&
                !empty($_REQUEST["email"]) && !empty($_REQUEST["village"]) && !empty($_REQUEST["district"]) && !empty($_REQUEST["province"]) &&
                !empty($_REQUEST["nation"]) && !empty($_REQUEST["religion"]) && !empty($_REQUEST["highschool"]) && !empty($_REQUEST["middleschool"]) &&
                !empty($_REQUEST["elementaryschool"]) && !empty($_REQUEST["season"]) && !empty($_REQUEST["part"] && filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL))
            ) {
                try {

                    $password = $_REQUEST['password'];

                    $path = "upload/student_profile/" . $image_file; // set upload folder path
                    move_uploaded_file($temp, 'upload/student_profile/' . $image_file); // move upload file temperory directory to your upload folder

                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    // Add User
                    $sql1 = "UPDATE users SET u_id=:u_id, u_email=:u_email, u_pass=:u_pass WHERE id = :id";
                    $stmt1 = $conn->prepare($sql1);
                    $stmt1->bindParam(':id', $id);
                    $stmt1->bindParam(':u_id', $std_id);
                    $stmt1->bindParam(':u_email', $email);

                    if (empty($password)) {
                        $stmt1->bindParam(':u_pass', $user['u_pass']);
                    } else {
                        $stmt1->bindParam(':u_pass', $passwordHash);
                    }

                    // Add Student
                    $sql2 = "UPDATE students SET std_id=:std_id, fname_en=:fname_en, lname_en=:lname_en, 
                    fname_la=:fname_la, lname_la=:lname_la, fname_ch=:fname_ch, lname_ch=:lname_ch, 
                    gender=:gender, dob=:dob, tel=:tel, whatsapp=:whatsapp, 
                    email=:email, village=:village, district=:district, province=:province, 
                    nation=:nation, religion=:religion, highschool=:highschool, middleschool=:middleschool, elementaryschool=:elementaryschool,
                    familymatters=:familymatters, plansforthefuture=:plansforthefuture, season=:season, part=:part, image=:image WHERE id=:id";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->bindParam(':id', $id);
                    $stmt2->bindParam(':std_id', $std_id);
                    $stmt2->bindParam(':fname_en', $fname_en);
                    $stmt2->bindParam(':fname_la', $fname_la);
                    $stmt2->bindParam(':fname_ch', $fname_ch);
                    $stmt2->bindParam(':lname_en', $lname_en);
                    $stmt2->bindParam(':lname_la', $lname_la);
                    $stmt2->bindParam(':lname_ch', $lname_ch);
                    $stmt2->bindParam(':gender', $gender);
                    $stmt2->bindParam(':dob', $dob);
                    $stmt2->bindParam(':tel', $tel);
                    $stmt2->bindParam(':whatsapp', $whatsapp);
                    $stmt2->bindParam(':email', $email);
                    $stmt2->bindParam(':village', $village);
                    $stmt2->bindParam(':district', $district);
                    $stmt2->bindParam(':province', $province);
                    $stmt2->bindParam(':nation', $nation);
                    $stmt2->bindParam(':religion', $religion);
                    $stmt2->bindParam(':highschool', $highschool);
                    $stmt2->bindParam(':middleschool', $middleschool);
                    $stmt2->bindParam(':elementaryschool', $elementaryschool);
                    $stmt2->bindParam(':familymatters', $familymatters);
                    $stmt2->bindParam(':plansforthefuture', $plansforthefuture);
                    $stmt2->bindParam(':season', $season);
                    $stmt2->bindParam(':part', $part);
                    if (empty($image_file)) {
                        $stmt2->bindParam(':image', $student['image']);
                    } else {
                        $stmt2->bindParam(':image', $image_file);
                    }

                    $stmt1->execute();
                    $stmt2->execute();
                    // $successMsg = "Add admin successfully. <a href='student-list.php'> Click here to see the detail </a>";
                    $_SESSION['success'] = "Update Student successfully. ";
                    header('location: student-list.php');
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

    <link rel="stylesh
    eet" href="../assets/css/bootstrap-datetimepicker.min.css">

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
                                <h3 class="page-title">Edit Students</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="student-list.php">Student</a></li>
                                    <li class="breadcrumb-item active">Edit Students</li>
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

                                    <?php if (isset($errorMsg)) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php
                                            echo $errorMsg;
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($successMsg)) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php
                                            echo $successMsg;
                                            ?>
                                        </div>
                                    <?php } ?>

                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title student-info">Student Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Student ID <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $std_id_red_border ?>" type="text" value="<?php echo $s_row['std_id'] ?>" name="std_id">
                                                <div class="error"><?php echo $std_id_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(English) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $fname_en_red_border ?>" type="text" value="<?php echo $s_row['fname_en'] ?>" name="fname_en">
                                                <div class="error"><?php echo $fname_en_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(English) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $lname_en_red_border ?>" type="text" value="<?php echo $s_row['lname_en'] ?>" name="lname_en">
                                                <div class="error"><?php echo $lname_en_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Gender <span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $gender_red_border ?>" name="gender">
                                                    <option> <?php echo $s_row['gender'] ?> </option>
                                                    <option>Female</option>
                                                    <option>Male</option>
                                                </select>
                                                <div class="error"><?php echo $gender_red_border ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(Lao) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $fname_la_red_border ?>" type="text" value="<?php echo $s_row['fname_la'] ?>" name="fname_la">
                                                <div class="error"><?php echo $fname_la_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(Lao) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $lname_la_red_border ?>" type="text" value="<?php echo $s_row['lname_la'] ?>" name="lname_la">
                                                <div class="error"><?php echo $lname_la_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms calendar-icon">
                                                <label>Date Of Birth <span class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker <?php echo $dob_red_border ?>" type="text" value="<?php echo $s_row['dob'] ?>" name="dob">
                                                <div class="error position-absolute"><?php echo $dob_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(Chines) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $fname_ch_red_border ?>" type="text" value="<?php echo $s_row['fname_ch'] ?>" name="fname_ch">
                                                <div class="error"><?php echo $fname_ch_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(Chines) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $lname_ch_red_border ?>" type="text" value="<?php echo $s_row['lname_ch'] ?>" name="lname_ch">
                                                <div class="error"><?php echo $lname_ch_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Tel <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $tel_red_border ?>" type="text" value="<?php echo $s_row['tel'] ?>" name="tel">
                                                <div class="error"><?php echo $tel_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>WhatsApp<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $whatsapp_red_border ?>" type="text" value="<?php echo $s_row['whatsapp'] ?>" name="whatsapp">
                                                <div class="error"><?php echo $whatsapp_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>E-Mail <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $email_red_border ?>" type="text" value="<?php echo $s_row['email'] ?>" name="email">
                                                <div class="error"><?php echo $email_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Village <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $village_red_border ?>" type="text" value="<?php echo $s_row['village'] ?>" name="village">
                                                <div class="error"><?php echo $village_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>District<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $district_red_border ?>" type="text" value="<?php echo $s_row['district'] ?>" name="district">
                                                <div class="error"><?php echo $district_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Province<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $province_red_border ?>" type="text" value="<?php echo $s_row['province'] ?>" name="province">
                                                <div class="error"><?php echo $province_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Nation <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $nation_red_border ?>" type="text" value="<?php echo $s_row['nation'] ?>" name="nation">
                                                <div class="error"><?php echo $nation_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Religion<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $religion_red_border ?>" name="religion">
                                                    <option><?php echo $s_row['religion'] ?></option>
                                                    <option>Buddhism</option>
                                                    <option>Christianity</option>
                                                    <option>Islam</option>
                                                    <option>Others</option>
                                                </select>
                                                <div class="error"><?php echo $religion_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>High School <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $highschool_red_border ?>" type="text" value="<?php echo $s_row['highschool'] ?>" name="highschool">
                                                <div class="error"><?php echo $highschool_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Middle School <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $middleschool_red_border ?>" type="text" value="<?php echo $s_row['middleschool'] ?>" name="middleschool">
                                                <div class="error"><?php echo $middleschool_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Elementary School <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $elementaryschool_red_border ?>" type="text" value="<?php echo $s_row['elementaryschool'] ?>" name="elementaryschool">
                                                <div class="error"><?php echo $elementaryschool_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Season<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $season_red_border ?>" name="season">
                                                    <option><?php echo $s_row['season'] ?></option>
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
                                                <label>Part <span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $part_red_border ?>" name="part">
                                                    <option><?php echo $s_row['part'] ?></option>
                                                    <option>Morning</option>
                                                    <option>Afternoon</option>
                                                    <option>Evening</option>
                                                </select>
                                                <div class="error"><?php echo $part_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Family Matters</span> </label>
                                                <input class="form-control" type="text" value="<?php echo $s_row['familymatters'] ?>" name="familymatters">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Plans For Future</span> </label>
                                                <input class="form-control" type="text" value="<?php echo $s_row['plansforthefuture'] ?>" name="plansforthefuture">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group students-up-files">
                                                <label>Upload Student Photo (<?php echo $s_row['image'] ?>) <span class="login-danger">*</span> </label>
                                                <?php $s_rowImage_file = $s_row['image'] ?>
                                                <img src="<?php echo "upload/student_profile/$s_rowImage_file" ?>" alt="Logo" width="150px">
                                                <label class="file-upload image-upbtn mb-0 ml-2">
                                                    Choose File <input type="file" name="txt_file">
                                                </label>
                                                <div class="error"><?php echo $image_file_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Password </label>
                                                <input class="form-control" type="text" name="password" placeholder="*************">
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