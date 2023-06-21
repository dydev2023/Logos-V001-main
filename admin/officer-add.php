<?php
session_start();
require_once '../config/dbcon.php';
include "admin-datas/season-db.php";
include "admin-datas/student-db.php";

$u_id = $fname_en = $lname_en = $fname_la = $lname_la = $fname_ch = $lname_ch = $gender = $dob = $village_birth = $district_birth = $province_birth = $emergency_tel = $emergency_name = $edu_level1 = $edu_branch1 = $univ_name1 = $edu_district1 = $edu_province1 = $edu_level2 = $edu_branch2 = $univ_name2 = $edu_district2 = $edu_province2 = $status = '';
$tel = $whatsapp = $email = $village_current = $district_current = $province_current = $ethnicity = $nation = $religion = $house_unit = $house_no = $image_file = '';
$highschool = $edu_season1 = $edu_season2 = '';
$employment_history = $talent = $language_proficiency = $familymatters = $plansforthefuture = '';


$u_id_err = $fname_en_err = $lname_en_err = $fname_la_err = $lname_la_err = $fname_ch_err = $lname_ch_err = $gender_err = $dob_err = $village_birth_err = $district_birth_err = $province_birth_err = $emergency_tel_err = $emergency_name_err = $edu_level1_err = $edu_branch1_err = $univ_name1_err = $edu_district1_err = $edu_province1_err = $status_err = '';
$tel_err = $whatsapp_err = $email_err = $village_current_err = $district_current_err = $province_current_err = $ethnicity_err = $nation_err = $religion_err = $house_unit_err = $house_no_err = $image_file_err = '';
$highschool_err = $edu_season1_err = '';


$u_id_red_border = $fname_en_red_border = $lname_en_red_border = $fname_la_red_border = $lname_la_red_border = $fname_ch_red_border = $lname_ch_red_border = $gender_red_border = $dob_red_border = $village_birth_red_border = $district_birth_red_border = '';
$province_birth_red_border = $emergency_tel_red_border = $emergency_name_red_border = $edu_level1_red_border = $edu_branch1_red_border = $univ_name1_red_border = $edu_district1_red_border = $edu_province1_red_border = $status_red_border = $tel_red_border = $whatsapp_red_border = $email_red_border = $village_current_red_border = $district_current_red_border = $province_current_red_border = '';
$ethnicity_red_border = $nation_red_border = $religion_red_border = $house_unit_red_border = $house_no_red_border = $image_file_red_border = '';
$highschool_red_border = $edu_season1_red_border = '';




if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
    exit;
} else {
    if (isset($_REQUEST['submit'])) {
        try {
            // Select The E-mail in Database For Check
            $check_u_id = $conn->prepare("SELECT u_id FROM users WHERE u_id = :u_id");
            $check_u_id->bindParam(":u_id", $_REQUEST['u_id']);
            $check_u_id->execute();

            $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
            $check_email->bindParam(":email", $_REQUEST['email']);
            $check_email->execute();

            // Select Teacher data in Database For Check
            $check_tel = $conn->prepare("SELECT tel FROM users WHERE tel = :tel");
            $check_tel->bindParam(":tel", $_REQUEST['tel']);
            $check_tel->execute();


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

            $status = 'Officer';

            if (
                !empty($u_id) and !empty($fname_en) and !empty($lname_en) and !empty($gender) and !empty($fname_la) and !empty($lname_la) and
                !empty($tel) and !empty($email)
            ) {
                $passHash = password_hash($u_id, PASSWORD_DEFAULT);

                // Add User
                $stmt1 = $conn->prepare('INSERT INTO users(u_id, email, tel, u_pass, status) 
                    VALUES (:u_id, :email, :tel, :u_pass, :status)');
                $stmt1->bindParam(':u_id', $u_id);
                $stmt1->bindParam(':email', $email);
                $stmt1->bindParam(':tel', $tel);
                $stmt1->bindParam(':u_pass', $passHash);
                $stmt1->bindParam(':status', $status);

                // Add Teacher
                $stmt2 = $conn->prepare('INSERT INTO officers(off_id, u_id, fname_en, lname_en, gender, fname_la, lname_la, tel, email) 
                                    VALUES(:off_id, :u_id, :fname_en, :lname_en, :gender, :fname_la, :lname_la, :tel, :email)');
                $stmt2->bindParam(':off_id', $u_id);
                $stmt2->bindParam(':u_id', $u_id);
                $stmt2->bindParam(':fname_en', $fname_en);
                $stmt2->bindParam(':lname_en', $lname_en);
                $stmt2->bindParam(':gender', $gender);
                $stmt2->bindParam(':fname_la', $fname_la);
                $stmt2->bindParam(':lname_la', $lname_la);
                $stmt2->bindParam(':tel', $tel);
                $stmt2->bindParam(':email', $email);

                $stmt1->execute();
                $stmt2->execute();

                $_SESSION['success'] = "Add Officer successfully. <a href='officer-list.php'> Click here to details </a>";
                header('location: officer-add.php');
                exit;
            }
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
                                <h3 class="page-title">Add Officer</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="officer-list.php">Officers</a></li>
                                    <li class="breadcrumb-item active">Add Officer</li>
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
                                            <h5 class="form-title student-info">Officer Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
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
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Tel<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $tel_red_border ?>" type="text" name="tel" value="<?php echo $tel ?>">
                                                <div class="error"><?php echo $tel_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>E-Mail <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $email_red_border ?>" type="text" name="email" value="<?php echo $email ?>">
                                                <div class="error"><?php echo $email_err ?></div>
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