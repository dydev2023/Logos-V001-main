<?php
session_start();
require_once '../config/dbcon.php';
include "admin-datas/season-db.php";
include "admin-datas/student-db.php";
$seasons = getLastSeason($conn);
$student = getAllStudents($conn);

// For Student Details
$u_id = $fname_en = $lname_en = $fname_la = $lname_la = $fname_ch = $lname_ch = $gender = $dob = $village_birth = $district_birth = $province_birth = $guardian_tel = $season_start = $status = '';
$tel = $whatsapp = $email = $village_current = $district_current = $province_current = $study_program = $part = $ethnicity = $nation = $religion = $house_unit = $house_no = $image_file = '';

$u_id_err = $fname_en_err = $lname_en_err = $fname_la_err = $lname_la_err = $fname_ch_err = $lname_ch_err = $gender_err = $dob_err = $village_birth_err = $district_birth_err = $province_birth_err = $guardian_tel_err = $season_start_err = $status_err = '';
$tel_err = $whatsapp_err = $email_err = $village_current_err = $district_current_err = $province_current_err = $study_program_err = $part_err = $ethnicity_err = $nation_err = $religion_err = $house_unit_err = $house_no_err = $image_file_err = '';

$u_id_red_border = $fname_en_red_border = $lname_en_red_border = $fname_la_red_border = $lname_la_red_border = $fname_ch_red_border = $lname_ch_red_border = $gender_red_border = $dob_red_border = $village_birth_red_border = $district_birth_red_border = '';
$province_birth_red_border = $guardian_tel_red_border = $season_start_red_border = $status_red_border = $tel_red_border = $whatsapp_red_border = $email_red_border = $village_current_red_border = $district_current_red_border = $province_current_red_border = '';
$study_program_red_border = $part_red_border = $ethnicity_red_border = $nation_red_border = $religion_red_border = $house_unit_red_border = $house_no_red_border = $image_file_red_border = '';

// For Study History Details
$highschool = $season_hsc = $village_study = $district_study = $province_study = '';
$highschool_err = $season_hsc_err = $village_study_err = $district_study_err = $province_study_err = '';
$highschool_red_border = $season_hsc_red_border =  $village_study_red_border = $district_study_red_border = $province_study_red_border = '';

// For Other Details
$employment_history = $talent = $language_proficiency = $familymatters = $plansforthefuture = '';


if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
    exit;
} else {
    if (isset($_REQUEST['submit'])) {
        // Select The E-mail in Database For Check
        $check_u_id = $conn->prepare("SELECT u_id FROM users WHERE u_id = :u_id");
        $check_u_id->bindParam(":u_id", $_REQUEST['u_id']);
        $check_u_id->execute();

        $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
        $check_email->bindParam(":email", $_REQUEST['email']);
        $check_email->execute();


        // Select Teacher data in Database For Check
        $check_tel = $conn->prepare("SELECT tel FROM students WHERE tel = :tel");
        $check_tel->bindParam(":tel", $_REQUEST['tel']);
        $check_tel->execute();

        $check_whatsapp = $conn->prepare("SELECT whatsapp FROM students WHERE whatsapp = :whatsapp");
        $check_whatsapp->bindParam(":whatsapp", $_REQUEST['whatsapp']);
        $check_whatsapp->execute();

        if (empty($_REQUEST["u_id"])) {
            $u_id_err = 'User ID is required!';
            $u_id_red_border = 'red_border';
        } elseif ($check_u_id->rowCount() > 0) {
            $u_id_err = 'This User ID is already exsist!';
            $u_id_red_border = 'red_border';
            $u_id = $_REQUEST['u_id'];
        } else {
            $u_id = $_REQUEST['u_id'];
        }

        if (empty($_REQUEST["fname_en"])) {
            $fname_en_err = 'First name in English is required!';
            $fname_en_red_border = 'red_border';
        } else {
            $fname_en = $_REQUEST['fname_en'];
        }

        if (empty($_REQUEST["lname_en"])) {
            $lname_en_err = 'Last name in English is required!';
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
            $lname_la_err = 'Last name in Laos is required!';
            $lname_la_red_border = 'red_border';
        } else {
            $lname_la = $_REQUEST['lname_la'];
        }

        if (empty($_REQUEST["study_program"])) {
            $study_program_err = 'Program of studying is required!';
            $study_program_red_border = 'study_program';
        } else {
            $study_program = $_REQUEST['study_program'];
        }

        if (empty($_REQUEST["fname_ch"])) {
            $fname_ch_err = 'First name in Chiness is required!';
            $fname_ch_red_border = 'red_border';
        } else {
            $fname_ch = $_REQUEST['fname_ch'];
        }

        if (empty($_REQUEST["lname_ch"])) {
            $lname_ch_err = 'Last asrname in Chiness is required!';
            $lname_ch_red_border = 'red_border';
        } else {
            $lname_ch = $_REQUEST['lname_ch'];
        }

        if (empty($_REQUEST["dob"])) {
            $dob_err = 'Date of birth is required!';
            $dob_red_border = 'red_border';
        } else {
            $dob = $_REQUEST['dob'];
        }

        if (empty($_REQUEST["part"])) {
            $part_err = 'Part is required!';
            $part_red_border = 'red_border';
        } else {
            $part = $_REQUEST['part'];
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

        if (empty($_REQUEST["ethnicity"])) {
            $ethnicity_err = 'Ethnicity is required!';
            $ethnicity_red_border = 'red_border';
        } else {
            $ethnicity = $_REQUEST['ethnicity'];
        }

        if (empty($_REQUEST["tel"])) {
            $tel_err = 'Phone number is required!';
            $tel_red_border = 'red_border';
        } elseif ($check_tel->rowCount() > 0) {
            $tel_err = 'This phone number is already exsist!';
            $tel_red_border = 'red_border';
            $tel = $_REQUEST['tel'];
        } else {
            $tel = $_REQUEST['tel'];
        }

        if (empty($_REQUEST["whatsapp"])) {
            $whatsapp_err = 'Whatsapp namber is required!';
            $whatsapp_red_border = 'red_border';
        } elseif ($check_whatsapp->rowCount() > 0) {
            $whatsapp_err = 'This whatsapp number is already exsist!';
            $whatsapp_red_border = 'red_border';
            $whatsapp = $_REQUEST['whatsapp'];
        } else {
            $whatsapp = $_REQUEST['whatsapp'];
        }

        if (empty($_REQUEST["email"])) {
            $email_err = 'E-mail is required!';
            $email_red_border = 'red_border';
        } elseif ($check_email->rowCount() > 0) {
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

        if (empty($_REQUEST["guardian_tel"])) {
            $guardian_tel_err = "Guadian's phone number is required!";
            $guardian_tel_red_border = 'red_border';
        } else {
            $guardian_tel = $_REQUEST['guardian_tel'];
        }

        if (empty($_REQUEST["village_birth"])) {
            $village_birth_err = 'Village of birth is required!';
            $village_birth_red_border = 'red_border';
        } else {
            $village_birth = $_REQUEST['village_birth'];
        }

        if (empty($_REQUEST["district_birth"])) {
            $district_birth_err = 'District of birth is required!';
            $district_birth_red_border = 'red_border';
        } else {
            $district_birth = $_REQUEST['district_birth'];
        }

        if (empty($_REQUEST["province_birth"])) {
            $province_birth_err = 'Province of birth is required!';
            $province_birth_red_border = 'red_border';
        } else {
            $province_birth = $_REQUEST['province_birth'];
        }

        if (empty($_REQUEST["village_current"])) {
            $village_current_err = 'Current village is required!';
            $village_current_red_border = 'red_border';
        } else {
            $village_current = $_REQUEST['village_current'];
        }

        if (empty($_REQUEST["district_current"])) {
            $district_current_err = 'Current district is required!';
            $district_current_red_border = 'red_border';
        } else {
            $district_current = $_REQUEST['district_current'];
        }

        if (empty($_REQUEST["province_current"])) {
            $province_current_err = 'Current province is required!';
            $province_current_red_border = 'red_border';
        } else {
            $province_current = $_REQUEST['province_current'];
        }

        if (empty($_REQUEST["highschool"])) {
            $highschool_err = 'Highschool is required!';
            $highschool_red_border = 'red_border';
        } else {
            $highschool = $_REQUEST['highschool'];
        }

        if (empty($_REQUEST["season_hsc"])) {
            $season_hsc_err = 'High school season is required!';
            $season_hsc_red_border = 'red_border';
        } else {
            $season_hsc = $_REQUEST['season_hsc'];
        }

        if (empty($_REQUEST["village_study"])) {
            $village_study_err = 'Village study is required!';
            $village_study_red_border = 'red_border';
        } else {
            $village_study = $_REQUEST['village_study'];
        }

        if (empty($_REQUEST["district_study"])) {
            $district_study_err = 'District study is required!';
            $district_study_red_border = 'red_border';
        } else {
            $district_study = $_REQUEST['district_study'];
        }

        if (empty($_REQUEST["province_study"])) {
            $province_study_err = 'Province study is required!';
            $province_study_red_border = 'red_border';
        } else {
            $province_study = $_REQUEST['province_study'];
        }

        if (empty($_REQUEST["season_start"])) {
            $season_start_err = 'Season is required!';
            $season_start_red_border = 'red_border';
        } else {
            $season_start = $_REQUEST['season_start'];
        }


        if (!empty($_REQUEST['house_no'])) {
            $house_no = $_REQUEST['house_no'];
        }
        if (!empty($_REQUEST['house_unit'])) {
            $house_unit = $_REQUEST['house_unit'];
        }

        if (!empty($_REQUEST['employment_history'])) {
            $employment_history = $_REQUEST['employment_history'];
        }
        if (!empty($_REQUEST['language_proficiency'])) {
            $language_proficiency = $_REQUEST['language_proficiency'];
        }
        if (!empty($_REQUEST['talent'])) {
            $talent = $_REQUEST['talent'];
        }
        if (!empty($_REQUEST['familymatters'])) {
            $familymatters = $_REQUEST['familymatters'];
        }

        if (!empty($_REQUEST['plansforthefuture'])) {
            $plansforthefuture = $_REQUEST['plansforthefuture'];
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
            !empty($u_id) and !empty($fname_en) and !empty($lname_en) and !empty($gender) and !empty($fname_la) and !empty($lname_la) and !empty($study_program) and !empty($fname_ch) and !empty($lname_ch) and !empty($dob) and !empty($part) and !empty($nation) and !empty($religion) and !empty($ethnicity) and !empty($tel) and !empty($whatsapp) and !empty($email)
            and !empty($guardian_tel) and !empty($village_birth) and !empty($district_birth) and !empty($province_birth) and !empty($village_current) and !empty($district_current) and !empty($province_current) and !empty($highschool) and !empty($season_hsc) and !empty($village_study) and !empty($district_study) and !empty($province_study)
        ) {
            try {
                $status = 'Student';
                $passHash = password_hash($u_id, PASSWORD_DEFAULT);

                // Add User
                $stmt1 = $conn->prepare('INSERT INTO users(u_id, email, u_pass, status) 
                                                  VALUES (:u_id, :email, :u_pass, :status)');
                $stmt1->bindParam(':u_id', $u_id);
                $stmt1->bindParam(':email', $email);
                $stmt1->bindParam(':u_pass', $passHash);
                $stmt1->bindParam(':status', $status);

                // Add Student
                $stmt2 = $conn->prepare('INSERT INTO students(std_id,u_id,fname_en,lname_en,gender,fname_la,lname_la,study_program,fname_ch,lname_ch,dob,part,nation,religion,ethnicity,tel,
                whatsapp,email,guardian_tel,village_birth,district_birth,province_birth,village_current,district_current,province_current,house_unit,house_no,season_start,highschool,season_hsc,
                village_study,district_study,province_study,employment_history,language_proficiency,talent,familymatters,plansforthefuture,image) 
                                        VALUES(:std_id,:u_id,:fname_en,:lname_en,:gender,:fname_la,:lname_la,:study_program,:fname_ch,:lname_ch,:dob,:part,:nation,:religion,:ethnicity,:tel,:
                whatsapp,:email,:guardian_tel,:village_birth,:district_birth,:province_birth,:village_current,:district_current,:province_current,:house_unit,:house_no,:season_start,:highschool,:season_hsc,:
                village_study,:district_study,:province_study,:employment_history,:language_proficiency,:talent,:familymatters,:plansforthefuture,:image)');
                $stmt2->bindParam(':std_id', $u_id);
                $stmt2->bindParam(':u_id', $u_id);
                $stmt2->bindParam(':fname_en', $fname_en);
                $stmt2->bindParam(':lname_en', $lname_en);
                $stmt2->bindParam(':gender', $gender);
                $stmt2->bindParam(':fname_la', $fname_la);
                $stmt2->bindParam(':lname_la', $lname_la);
                $stmt2->bindParam(':study_program', $study_program);
                $stmt2->bindParam(':fname_ch', $fname_ch);
                $stmt2->bindParam(':lname_ch', $lname_ch);
                $stmt2->bindParam(':dob', $dob);
                $stmt2->bindParam(':part', $part);
                $stmt2->bindParam(':nation', $nation);
                $stmt2->bindParam(':religion', $religion);
                $stmt2->bindParam(':ethnicity', $ethnicity);
                $stmt2->bindParam(':tel', $tel);
                $stmt2->bindParam(':whatsapp', $whatsapp);
                $stmt2->bindParam(':email', $email);
                $stmt2->bindParam(':guardian_tel', $guardian_tel);
                $stmt2->bindParam(':village_birth', $village_birth);
                $stmt2->bindParam(':district_birth', $district_birth);
                $stmt2->bindParam(':province_birth', $province_birth);
                $stmt2->bindParam(':village_current', $village_current);
                $stmt2->bindParam(':district_current', $district_current);
                $stmt2->bindParam(':province_current', $province_current);
                $stmt2->bindParam(':house_unit', $house_unit);
                $stmt2->bindParam(':house_no', $house_no);
                $stmt2->bindParam(':season_start', $season_start);
                $stmt2->bindParam(':highschool', $highschool);
                $stmt2->bindParam(':season_hsc', $season_hsc);
                $stmt2->bindParam(':village_study', $village_study);
                $stmt2->bindParam(':district_study', $district_study);
                $stmt2->bindParam(':province_study', $province_study);
                $stmt2->bindParam(':employment_history', $employment_history);
                $stmt2->bindParam(':language_proficiency', $language_proficiency);
                $stmt2->bindParam(':talent', $talent);
                $stmt2->bindParam(':familymatters', $familymatters);
                $stmt2->bindParam(':plansforthefuture', $plansforthefuture);
                $stmt2->bindParam(':image', $image_file);

                $stmt1->execute();
                $stmt2->execute();

                $_SESSION['success'] = "Add Student successfully. <a href='student-add.php'> Click here to details </a>";
                header('location: signup.php');
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

    <link rel="stylesheet" href="../assets/plugins/twitter-bootstrap-wizard/form-wizard.css">

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
                                                <label>User ID <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $u_id_red_border ?>" type="text" name="u_id" value="<?php echo $u_id ?>">
                                                <div class="error"><?php echo $u_id_err ?></div>
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
                                        <div class="col-12 col-sm-4"> <!--  New element -->
                                            <div class="form-group local-forms">
                                                <label>Program Of Studying <span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $study_program_red_border ?>" name="study_program">
                                                    <option><?php echo $study_program ?></option>
                                                    <option>Bachelor Program</option>
                                                    <option>Diploma in TVET</option>
                                                </select>
                                                <div class="error"><?php echo $study_program_err ?></div>
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
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Part <span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $part_red_border ?>" name="part">
                                                    <option></option>
                                                    <option>Morning</option>
                                                    <option>Afternoon</option>
                                                    <option>Evening</option>
                                                </select>
                                                <div class="error"><?php echo $part_err ?></div>
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
                                        <div class="col-12 col-sm-4"> <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Ethnicity <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $ethnicity_red_border ?>" type="text" name="ethnicity" value="<?php echo $ethnicity ?>">
                                                <div class="error"><?php echo $ethnicity_err ?></div>
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
                                        <div class="col-12 col-sm-4"> <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Guardian's Phone Number </label>
                                                <input class="form-control <?php echo $guadian_tel_red_border ?>" type="text" name="guadian_tel" value="<?php echo $guadian_tel ?>">
                                                <div class="error"><?php echo $guadian_tel_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4"> <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Village Of Birth <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $village_birth_red_border ?>" type="text" name="village_birth" value="<?php echo $village_birth ?>">
                                                <div class="error"><?php echo $village_birth_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4"> <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>District Of Birth <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $district_birth_red_border ?>" type="text" name="district_birth" value="<?php echo $district_birth ?>">
                                                <div class="error"><?php echo $district_birth_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4"> <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Province Of Birth <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $province_birth_red_border ?>" type="text" name="province_birth" value="<?php echo $province_birth ?>">
                                                <div class="error"><?php echo $province_birth_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Current Village <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $village_current_red_border ?>" type="text" name="village_current" value="<?php echo $village_current ?>">
                                                <div class="error"><?php echo $village_current_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Current District <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $district_current_red_border ?>" type="text" name="district_current" value="<?php echo $district_current ?>">
                                                <div class="error"><?php echo $district_current_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Current Province <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $province_current_red_border ?>" type="text" name="province_current" value="<?php echo $province_current ?>">
                                                <div class="error"><?php echo $province_current_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4"> <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>House Unit </label>
                                                <input class="form-control <?php echo $house_unit_red_border ?>" type="text" name="house_unit" value="<?php echo $house_unit ?>">
                                                <div class="error"><?php echo $house_unit_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4"> <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>House No </label>
                                                <input class="form-control <?php echo $house_no_red_border ?>" type="text" name="house_no" value="<?php echo $house_no ?>">
                                                <div class="error"><?php echo $house_no_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Season Year<span class="login-danger">*</span></label>
                                                <select class="form-control select" name="season_start">
                                                    <?php $i = 0;
                                                    foreach ($seasons as $season) {
                                                        $i++; ?>
                                                        <option value="<?php echo $season['season'] ?>"> <?php echo $season['season'] ?> </option>
                                                    <?php } ?>

                                                </select>
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
                                                <label>Season Year<span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $season_hsc_red_border ?>" type="text" name="season_hsc">
                                                <div class="error"><?php echo $season_hsc_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4"> <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Village<span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $village_study_red_border ?>" type="text" name="village_study" value="<?php echo $village_study ?>">
                                                <div class="error"><?php echo $village_study_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4"> <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>District<span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $district_study_red_border ?>" type="text" name="district_study" value="<?php echo $district_study ?>">
                                                <div class="error"><?php echo $district_study_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4"> <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Province<span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $province_study_red_border ?>" type="text" name="province_study" value="<?php echo $province_study ?>">
                                                <div class="error"><?php echo $province_study_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4"> <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Employment History</label>
                                                <input class="form-control" type="text" name="emp_history" value="<?php echo $emp_history ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4"> <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Language Proficiency </label>
                                                <input class="form-control" type="text" name="lg_proficiency" value="<?php echo $lg_proficiency ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4"> <!--New element -->
                                            <div class="form-group local-forms">
                                                <label>Talent </label>
                                                <input class="form-control" type="text" name="talent" value="<?php echo $talent ?>">
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
                                                <label>Profile Image 3x4cm<span class="login-danger">* </span></label>
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