<?php
session_start();
require_once '../config/dbcon.php';
include "admin-datas/season-db.php";
include "admin-datas/student-db.php";
include "admin-datas/admin-db.php";
$seasons = getLastSeason($conn);
$student = getAllStudents($conn);

$std_id = $fname_en = $lname_en = $gender = $fname_la = $lname_la = $dob = $village_of_birth = $district_of_birth = $fname_ch = $lg_proficiency = $emp_history = $guadian_tel = '';
$province_of_birth =$lname_ch = $pg_of_std = $tel = $whatsapp = $email = $village = $district = $province = $ethnicity = $unit = $house_no= '';
$nation = $religion = $highschool  = $elementaryschool = $familymatters = $plansforthefuture =  $season = $part = '';
$image_file = $year = '';

$std_id_err = $fname_en_err = $lname_en_err = $gender_err = $fname_la_err = $lname_la_err = $dob_err = $village_of_birth_err = $district_of_birth_err = $fname_ch_err = '';
$lname_ch_err = $pg_of_std_err =$tel_err = $whatsapp_err = $email_err = $village_err = $district_err= $province_of_birth_err = $province_err = $ethnicity_err = $unit_err = $house_no_err = '';
$nation_err = $religion_err = $highschool_err  = $elementaryschool_err = $season_err =  $part_err = $guadian_tel_err = '';
$image_file_err = $year_err = '';

$std_id_red_border = $fname_en_red_border = $lname_en_red_border = $gender_red_border = $fname_la_red_border = $lname_la_red_border = $dob_red_border = $fname_ch_red_border= $village_of_birth_red_border = $district_of_birth_red_border = '';
$lname_ch_red_border = $pg_of_std_red_border = $tel_red_border = $whatsapp_red_border = $email_red_border = $village_red_border = $district_red_border = $province_of_birth_red_border = $province_red_border = $guadian_tel_red_border = '';
$nation_red_border = $religion_red_border = $highschool_red_border  = $elementaryschool_red_border =  $season_red_border = $part_red_border = $unit_red_border = $ethnicity_red_border = $unit_red_border = $house_no_red_border= $year_red_border = '';

if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
    exit;
} else {
    if (isset($_REQUEST['submit'])) {

        // Select The E-mail in Database For Check
        $check_u_id = $conn->prepare("SELECT u_id FROM users WHERE u_id = :u_id");
        $check_u_id->bindParam(":u_id", $_REQUEST['std_id']);
        $check_u_id->execute();

        $check_u_email = $conn->prepare("SELECT u_email FROM users WHERE u_email = :u_email");
        $check_u_email->bindParam(":u_email", $_REQUEST['email']);
        $check_u_email->execute();


        // Select Teacher data in Database For Check
        $check_phone_numeber = $conn->prepare("SELECT tel FROM students WHERE tel = :tel");
        $check_phone_numeber->bindParam(":tel", $_REQUEST['tel']);
        $check_phone_numeber->execute();

        $check_whatsapp_number = $conn->prepare("SELECT whatsapp FROM students WHERE whatsapp = :whatsapp");
        $check_whatsapp_number->bindParam(":whatsapp", $_REQUEST['whatsapp']);
        $check_whatsapp_number->execute();

        if (empty($_REQUEST["std_id"])) {
            $std_id_err = 'Student ID is required!';
            $std_id_red_border = 'red_border';
        } elseif ($check_u_id->rowCount() > 0) {
            $std_id_err = 'This student ID is already exsist!';
            $std_id_red_border = 'red_border';
            $std_id = $_REQUEST['std_id'];
        } else {
            $std_id = $_REQUEST['std_id'];
        }

        if (empty($_REQUEST["fname_en"])) {
            $fname_en_err = 'Fname in English is required!';
            $fname_en_red_border = 'red_border';
        } else {
            $fname_en = $_REQUEST['fname_en'];
        }

        if (empty($_REQUEST["lname_en"])) {
            $lname_en_err = 'Lname in English is required!';
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
            $fname_la_err = 'Fname in Laos is required!';
            $fname_la_red_border = 'red_border';
        } else {
            $fname_la = $_REQUEST['fname_la'];
        }

        if (empty($_REQUEST["lname_la"])) {
            $lname_la_err = 'Lname in Laos is required!';
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

        if (empty($_REQUEST["village_of_birth"])) {
            $village_of_birth_err = 'Village of birth is required!';
            $village_of_birth_red_border = 'red_border';
        } else {
            $village_of_birth = $_REQUEST['village_of_birth'];
        }
        if (empty($_REQUEST["district_of_birth"])) {
            $district_of_birth_err = 'District of birth is required!';
            $district_of_birth_red_border = 'red_border';
        } else {
            $district_of_birth = $_REQUEST['district_of_birth'];
        }
        if (empty($_REQUEST["province_of_birth"])) {
            $province_of_birth_err = 'province of birth is required!';
            $province_of_birth_red_border = 'red_border';
        } else {
            $province_of_birth = $_REQUEST['province_of_birth'];
        }
        
        if (empty($_REQUEST["fname_ch"])) {
            $fname_ch_err = 'Fname in Chiness is required!';
            $fname_ch_red_border = 'red_border';
        } else {
            $fname_ch = $_REQUEST['fname_ch'];
        }

        if (empty($_REQUEST["lname_ch"])) {
            $lname_ch_err = 'Lasrname in Chiness is required!';
            $lname_ch_red_border = 'red_border';
        } else {
            $lname_ch = $_REQUEST['lname_ch'];
        }

        if (empty($_REQUEST["pg_of_std"])) {
            $pg_of_std_err = 'Program of studying is required!';
            $pg_of_std_red_border = 'red_border';
        }else {
            $pg_of_std = $_REQUEST['pg_of_std'];
        }

        if (empty($_REQUEST["guadian_tel"])) {
            $guadian_tel_err = "Guadian's phone number is required!";
            $guadian_tel_red_border = 'red_border';
        }else {
            $guadian_tel = $_REQUEST['guadian_tel'];
        }

        if (empty($_REQUEST["ethnicity"])) {
            $ethnicity_err = 'Ethnicity is required!';
            $ethnicity_red_border = 'red_border';
        }else {
            $ethnicity = $_REQUEST['ethnicity'];
        }
        if (empty($_REQUEST["unit"])) {
            $unit_err = 'House unit of studying is required!';
            $unit_red_border = 'red_border';
        }else {
            $unit = $_REQUEST['unit'];
        }
        if (empty($_REQUEST["house_no"])) {
            $house_no_err = 'House no is required!';
            $house_no_red_border = 'red_border';
        }else {
            $house_no = $_REQUEST['house_no'];
        }

        if (empty($_REQUEST["tel"])) {
            $tel_err = 'Phone number is required!';
            $tel_red_border = 'red_border';
        } elseif ($check_phone_numeber->rowCount() > 0) {
            $tel_err = 'This phone number is already exsist!';
            $tel_red_border = 'red_border';
            $tel = $_REQUEST['tel'];
        } else {
            $tel = $_REQUEST['tel'];
        }

        if (empty($_REQUEST["whatsapp"])) {
            $whatsapp_err = 'Whatsapp namber is required!';
            $whatsapp_red_border = 'red_border';
        } elseif ($check_whatsapp_number->rowCount() > 0) {
            $whatsapp_err = 'This whatsapp number is already exsist!';
            $whatsapp_red_border = 'red_border';
            $whatsapp = $_REQUEST['whatsapp'];
        } else {
            $whatsapp = $_REQUEST['whatsapp'];
        }

        if (empty($_REQUEST["email"])) {
            $email_err = 'E-mail is required!';
            $email_red_border = 'red_border';
        } elseif ($check_u_email->rowCount() > 0) {
            $email_err = 'This E-mail is already exsist!';
            $email_red_border = 'red_border';
            $email = $_REQUEST['email'];
        } elseif (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format, please add @!";
            $email_red_border = 'red_border';
            $email = $_REQUEST['email'];
        } else {
            $email = $_REQUEST['email'];
        }

        if (empty($_REQUEST["village"])) {
            $village_err = 'Current village is required!';
            $village_red_border = 'red_border';
        } else {
            $village = $_REQUEST['village'];
        }

        if (empty($_REQUEST["district"])) {
            $district_err = 'Current district is required!';
            $district_red_border = 'red_border';
        } else {
            $district = $_REQUEST['district'];
        }

        if (empty($_REQUEST["province"])) {
            $province_err = 'Current province is required!';
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
        if (empty($_REQUEST["year"])) {
            $year_err = 'Year is required!';
            $year_red_border = 'red_border';
        } else {
            $year = $_REQUEST['year'];
        }

        if (empty($_REQUEST["part"])) {
            $part_err = 'Part is required!';
            $part_red_border = 'red_border';
        } else {
            $part = $_REQUEST['part'];
        }

        if (empty($_FILES["txt_file"]['name'])) {
            $image_file_err = "Student image is required!";
        } else {
            $image_file = $_FILES['txt_file']['name'];
            $type = $_FILES['txt_file']['type'];
            $size = $_FILES['txt_file']['size'];
            $temp = $_FILES['txt_file']['tmp_name'];
        }

        if (
            !empty($_REQUEST["std_id"]) && !empty($_REQUEST["fname_en"]) && !empty($_REQUEST["lname_en"]) && !empty($village_of_birth) && !empty($province_of_birth) && !empty($house_no) && 
            !empty($_REQUEST["gender"]) && !empty($_REQUEST["fname_la"]) && !empty($_REQUEST["lname_la"]) && !empty($_REQUEST["dob"]) && !empty($district_of_birth) && !empty($unit)&&
            !empty($_REQUEST["fname_ch"]) && !empty($_REQUEST["lname_ch"]) && !empty($_REQUEST["tel"]) && !empty($_REQUEST["whatsapp"]) && !empty($pg_of_std) && !empty($lg_proficiency) &&
            !empty($_REQUEST["email"]) && !empty($_REQUEST["village"]) && !empty($_REQUEST["district"]) && !empty($_REQUEST["province"]) && !empty($ethnicity) && !empty($guadian_tel) &&
            !empty($_REQUEST["nation"]) && !empty($_REQUEST["religion"]) && !empty($_REQUEST["highschool"]) && !empty($emp_history) &&
            !empty($_REQUEST["elementaryschool"]) && !empty($_REQUEST["season"]) && !empty($part) && !empty($_FILES["txt_file"]['name'] && filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL))
        ) {
            try {
                $status = 'Student';
                $passwordHash = password_hash($std_id, PASSWORD_DEFAULT);


                /* New valiable that still not connect to database is:
                
                $village_of_birth
                $district_of_birth
                $province_of_birth
                $pg_of_std                      //Program of studying
                $ethnicity
                $unit
                $house_no
                $lg_proficiency
                $guadian_tel
                $emp_history
                */
                

                // Add User
                $stmt1 = $conn->prepare('INSERT INTO users(u_id, u_email, u_pass, status) 
                                                                VALUES (:u_id, :u_email, :u_pass, :status)');
                $stmt1->bindParam(':u_id', $std_id);
                $stmt1->bindParam(':u_email', $email);
                $stmt1->bindParam(':u_pass', $passwordHash);
                $stmt1->bindParam(':status', $status);

                // Add Student
                $stmt2 = $conn->prepare('INSERT INTO students(id, std_id, fname_en, lname_en, fname_la, lname_la, fname_ch, lname_ch, gender, dob, tel, whatsapp, email, village, district, province, nation, religion, highschool, elementaryschool,familymatters, plansforthefuture, season, part, image) 
                                                    VALUES(LAST_INSERT_ID(), :std_id, :fname_en, :lname_en, :fname_la, :lname_la, :fname_ch, :lname_ch, :gender, :dob, :tel, :whatsapp, :email, :village, :district, :province, :nation, :religion, :highschool, :elementaryschool, :familymatters, :plansforthefuture, :season, :part, :image)');
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
                $stmt2->bindParam(':elementaryschool', $elementaryschool);
                $stmt2->bindParam(':familymatters', $familymatters);
                $stmt2->bindParam(':plansforthefuture', $plansforthefuture);
                $stmt2->bindParam(':season', $season);
                $stmt2->bindParam(':part', $part);
                $stmt2->bindParam(':image', $image_file);

                // $stmt1->execute();        // don't forgot to un comment this stement!
                // $stmt2->execute();

                $path = "upload/student_profile/" . $image_file; // set upload folder path
                move_uploaded_file($temp, 'upload/student_profile/' . $image_file); // move upload file temperory directory to your upload folder        

                // $successMsg = "Add admin successfully. <a href='student-list.php'> Click here to see the detail </a>";
                $_SESSION['success'] = "Add Student successfully. <a href='student-list.php'> Click here to see the detail </a>";
                header('location: student-add.php');
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
                                <h3 class="page-title">Add Students</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="student-list.php">Student</a></li>
                                    <li class="breadcrumb-item active">Add Student</li>
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
                                            <h5 class="form-title student-info">Student Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Student ID <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $std_id_red_border ?>" type="text" name="std_id" value="<?php echo $std_id ?>">
                                                <div class="error"><?php echo $std_id_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(English) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $fname_en_red_border ?>" type="text" name="fname_en" value="<?php echo $fname_en ?>">
                                                <div class="error"><?php echo $fname_en_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(English) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $lname_en_red_border ?>" type="text" name="lname_en" value="<?php echo $lname_en ?>">
                                                <div class="error"><?php echo $lname_en_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Gender <span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $gender_red_border ?>" name="gender">
                                                    <option><?php echo $gender ?></option>
                                                    <option>Female</option>
                                                    <option>Male</option>
                                                </select>
                                                <div class="error"><?php echo $gender_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(Lao) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $fname_la_red_border ?>" type="text" name="fname_la" value="<?php echo $fname_la ?>">
                                                <div class="error"><?php echo $fname_la_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(Lao) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $lname_la_red_border ?>" type="text" name="lname_la" value="<?php echo $lname_la ?>">
                                                <div class="error"><?php echo $lname_la_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">        <!--  New element -->
                                            <div class="form-group local-forms">
                                                <label>Program Of Studying <span class="login-danger">*</span></label>  
                                                <select class="form-control select <?php echo $pg_of_std_red_border ?>" name="pg_of_std">
                                                    <option><?php echo $pg_of_std?></option>
                                                    <option>Bachelor Program</option>
                                                    <option>Diploma in TVET</option>
                                                </select>
                                                <div class="error"><?php echo $pg_of_std_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(Chines) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $fname_ch_red_border ?>" type="text" name="fname_ch" value="<?php echo $fname_ch ?>">
                                                <div class="error"><?php echo $fname_ch_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(Chines) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $lname_ch_red_border ?>" type="text" name="lname_ch" value="<?php echo $lname_ch ?>">
                                                <div class="error"><?php echo $lname_ch_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms calendar-icon">
                                                <label>Date Of Birth <span class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker <?php echo $dob_red_border ?>" type="text" name="dob" value="<?php echo $dob ?>">
                                                <div class="error position-absolute"><?php echo $dob_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">           <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Village Of Birth <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $village_of_birth_red_border ?>" type="text" name="village_of_birth" value="<?php echo $village_of_birth ?>">
                                                <div class="error"><?php echo $village_of_birth_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">       <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>District Of Birth <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $district_of_birth_red_border ?>" type="text" name="district_of_birth" value="<?php echo $district_of_birth ?>">
                                                <div class="error"><?php echo $district_of_birth_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">           <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Province Of Birth <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $province_of_birth_red_border ?>" type="text" name="province_of_birth" value="<?php echo $province_of_birth ?>">
                                                <div class="error"><?php echo $province_of_birth_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Nation <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $nation_red_border ?>" type="text" name="nation" value="<?php echo $nation ?>">
                                                <div class="error"><?php echo $nation_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Religion<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $religion_red_border ?>" name="religion">
                                                    <option><?php echo $religion ?></option>
                                                    <option>Buddhism</option>
                                                    <option>Christianity</option>
                                                    <option>Islam</option>
                                                    <option>Others</option>
                                                </select>
                                                <div class="error"><?php echo $religion_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">       <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Ethnicity <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $ethnicity_red_border ?>" type="text" name="ethnicity" value="<?php echo $ethnicity ?>">
                                                <div class="error"><?php echo $ethnicity_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Current Village <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $village_red_border ?>" type="text" name="village" value="<?php echo $village ?>">
                                                <div class="error"><?php echo $village_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Current District <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $district_red_border ?>" type="text" name="district" value="<?php echo $district ?>">
                                                <div class="error"><?php echo $district_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Current Province <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $province_red_border ?>" type="text" name="province" value="<?php echo $province ?>">
                                                <div class="error"><?php echo $province_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">       <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>House Unit <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $unit_red_border ?>" type="text" name="unit" value="<?php echo $unit ?>">
                                                <div class="error"><?php echo $unit_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">           <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>House No <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $house_no_red_border ?>" type="text" name="house_no" value="<?php echo $house_no ?>">
                                                <div class="error"><?php echo $house_no_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Tel<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $tel_red_border ?>" type="text" name="tel" value="<?php echo $tel ?>">
                                                <div class="error"><?php echo $tel_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>WhatsApp <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $whatsapp_red_border ?>" type="text" name="whatsapp" value="<?php echo $whatsapp ?>">
                                                <div class="error"><?php echo $whatsapp_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>E-Mail <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $email_red_border ?>" type="text" name="email" value="<?php echo $email ?>">
                                                <div class="error"><?php echo $email_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">               <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Guardian's Phone Number </label>
                                                <input class="form-control <?php echo $guadian_tel_red_border ?>" type="text" name="guadian_tel" value="<?php echo $guadian_tel ?>">
                                                <div class="error"><?php echo $guadian_tel_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Heigh School <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $highschool_red_border ?>" type="text" name="highschool" value="<?php echo $highschool ?>">
                                                <div class="error"><?php echo $highschool_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Elementary School <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $elementaryschool_red_border ?>" type="text" name="elementaryschool" value="<?php echo $elementaryschool ?>">
                                                <div class="error"><?php echo $elementaryschool_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Season Year<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $season_red_border ?>" name="season">
                                                    <option><?php echo $season ?></option>
                                                    <?php $i = 0;
                                                    foreach ($seasons as $season) {
                                                        $i++; ?>
                                                        <option> <?php echo $season['season'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                                <div class="error"><?php echo $season_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">       <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Year <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $year_red_border ?>" type="text" name="year" value="<?php echo $year ?>">
                                                <div class="error"><?php echo $year_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
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
                                        <div class="col-12 col-sm-4">       <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Employment History <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="emp_history" value="<?php echo $emp_history ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">           <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Language Proficiency </label>
                                                <input class="form-control" type="text" name="lg_proficiency" value="<?php echo $lg_proficiency ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Family Matters </label>
                                                <input class="form-control" type="text" name="familymatters" value="<?php echo $familymatters ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Plans For Future </label>
                                                <input class="form-control" type="text" name="plansforthefuture" value="<?php echo $plansforthefuture ?>">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group students-up-files">
                                                <label>Upload Student Photo 3x4cm<span class="login-danger">* </span></label>
                                                <input type="file" name="txt_file">
                                                <div class="error"><?php echo $image_file_err ?></div>
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