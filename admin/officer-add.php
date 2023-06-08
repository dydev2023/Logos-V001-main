<?php
session_start();
require_once '../config/dbcon.php';

$officer = $fname_en = $lname_en = $gender = $fname_la = $lname_la = $dob = $fname_ch = '';
$lname_ch = $tel = $whatsapp = $email = $village = $district = $province = $emp_history = '';
$nation = $religion = $university = $image_file = $ethnicity = $position = $lg_proficiency = '';
$th_type = $deploma = $deploma_amount = $undergraduate = $undergraduate_amount = $master = $doctorate = $graduation = '';

$officer_err = $fname_en_err = $lname_en_err = $gender_err = $fname_la_err = $lname_la_err = $dob_err = $fname_ch_err = '';
$lname_ch_err = $tel_err = $whatsapp_err = $email_err = $village_err = $district_err = $province_err = '';
$nation_err = $religion_err  = $university_err = $image_file_err = $ethnicity_err = $position_err =  '';
$th_type_err = $deploma_err = $deploma_amount_err = $undergraduate_err = $undergraduate_amount_err = $master_err = $doctorate_err = $graduation_err = '';

$officer_red_border = $fname_en_red_border = $lname_en_red_border = $gender_red_border = $fname_la_red_border = $lname_la_red_border = $dob_red_border = $fname_ch_red_border = '';
$lname_ch_red_border = $tel_red_border = $whatsapp_red_border = $email_red_border = $village_red_border = $district_red_border = $province_red_border = '';
$nation_red_border = $religion_red_border = $university_red_border = $ethnicity_red_border = $position_red_border = '';
$th_type_red_border = $deploma_red_border = $deploma_amount_red_border = $undergraduate_red_border = $undergraduate_amount_red_border = $master_red_border = $doctorate_red_border = $graduation_red_border = '';

if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
    exit;
} else {
    // Select The E-mail in Database For Check
    $check_u_id = $conn->prepare("SELECT u_id FROM users WHERE u_id = :u_id");
    $check_u_id->bindParam(":u_id", $_REQUEST['officer_id']);
    $check_u_id->execute();

    $check_u_email = $conn->prepare("SELECT u_email FROM users WHERE u_email = :u_email");
    $check_u_email->bindParam(":u_email", $_REQUEST['email']);
    $check_u_email->execute();


    // Select officer data in Database For Check
    $check_tel = $conn->prepare("SELECT tel FROM teachers WHERE tel = :tel");
    $check_tel->bindParam(":tel", $_REQUEST['tel']);
    $check_tel->execute();

    $check_whatsapp = $conn->prepare("SELECT whatsapp FROM teachers WHERE whatsapp = :whatsapp");
    $check_whatsapp->bindParam(":whatsapp", $_REQUEST['whatsapp']);
    $check_whatsapp->execute();

    if (isset($_REQUEST['submit'])) {

        if (empty($_REQUEST['officer'])) {
            $officer_err = 'Officer ID is required!';
            $officer_red_border = 'red_border';
        } elseif ($check_u_id->rowCount() > 0) {
            $officer_err = 'This Officer ID is already exsist!';
            $officer_red_border = 'red_border';
            $officer = $_REQUEST['officer'];
        } else {
            $officer = $_REQUEST['officer'];
        }

        if (empty($_REQUEST['fname_en'])) {
            $fname_en_err = 'First name in English is required!';
            $fname_en_red_border = 'red_border';
        } else {
            $fname_en = $_REQUEST['fname_en'];
        }

        if (empty($_REQUEST['lname_en'])) {
            $lname_en_err = 'Last name in English is required!';
            $lname_en_red_border = 'red_border';
        } else {
            $lname_en = $_REQUEST['lname_en'];
        }

        if (empty($_REQUEST['gender'])) {
            $gender_err = 'Gender is required!';
            $gender_red_border = 'red_border';
        } else {
            $gender = $_REQUEST['gender'];
        }

        if (empty($_REQUEST['fname_la'])) {
            $fname_la_err = 'First name in Laos is required!';
            $fname_la_red_border = 'red_border';
        } else {
            $fname_la = $_REQUEST['fname_la'];
        }

        if (empty($_REQUEST['lname_la'])) {
            $lname_la_err = 'Last name in Laos is required!';
            $lname_la_red_border = 'red_border';
        } else {
            $lname_la = $_REQUEST['lname_la'];
        }

        if (empty($_REQUEST['dob'])) {
            $dob_err = 'Date of birth is required!';
            $dob_red_border = 'red_border';
        } else {
            $dob = $_REQUEST['dob'];
        }

        if (empty($_REQUEST['fname_ch'])) {
            $fname_ch_err = 'First name in Chinese is required!';
            $fname_ch_red_border = 'red_border';
        } else {
            $fname_ch = $_REQUEST['fname_ch'];
        }

        if (empty($_REQUEST['lname_ch'])) {
            $lname_ch_err = 'Last name in Chinese is required!';
            $lname_ch_red_border = 'red_border';
        } else {
            $lname_ch = $_REQUEST['lname_ch'];
        }

        if (empty($_REQUEST['tel'])) {
            $tel_err = 'Tel is required!';
            $tel_red_border = 'red_border';
        } elseif ($check_tel->rowCount() > 0) {
            $tel_err = 'This Tel is already exsist!';
            $tel_red_border = 'red_border';
            $tel = $_REQUEST['tel'];
        } else {
            $tel = $_REQUEST['tel'];
        }

        if (empty($_REQUEST['whatsapp'])) {
            $whatsapp_err = 'Whatsapp is required!';
            $whatsapp_red_border = 'red_border';
        } elseif ($check_whatsapp->rowCount() > 0) {
            $whatsapp_err = 'This whatsapp is already exsist!';
            $whatsapp_red_border = 'red_border';
            $whatsapp = $_REQUEST['whatsapp'];
        } else {
            $whatsapp = $_REQUEST['whatsapp'];
        }

        if (empty($_REQUEST['email'])) {
            $email_err = 'E-mail is required!';
            $email_red_border = 'red_border';
        } elseif ($check_u_email->rowCount() > 0) {
            $email_err = 'This E-mail is already exist!';
            $email_red_border = 'red_border';
            $email = $_REQUEST['email'];
        } elseif (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format, please add @!";
            $email_red_border = 'red_border';
            $email = $_REQUEST['email'];
        } else {
            $email = $_REQUEST['email'];
        }

        if (empty($_REQUEST['village'])) {
            $village_err = 'Village is required!';
            $village_red_border = 'red_border';
        } else {
            $village = $_REQUEST['village'];
        }

        if (empty($_REQUEST['district'])) {
            $district_err = 'District is required!';
            $district_red_border = 'red_border';
        } else {
            $district = $_REQUEST['district'];
        }

        if (empty($_REQUEST['province'])) {
            $province_err = 'Province is required!';
            $province_red_border = 'red_border';
        } else {
            $province = $_REQUEST['province'];
        }

        if (empty($_REQUEST['nation'])) {
            $nation_err = 'Nation is required!';
            $nation_red_border = 'red_border';
        } else {
            $nation = $_REQUEST['nation'];
        }

        if (empty($_REQUEST['religion'])) {
            $religion_err = 'Religion is required!';
            $religion_red_border = 'red_border';
        } else {
            $religion = $_REQUEST['religion'];
        }
        
        if (empty($_REQUEST['ethnicity'])) {
            $ethnicity_err = 'Ethnicity is required!';
            $ethnicity_red_border = 'red_border';
        } else {
            $ethnicity = $_REQUEST['ethnicity'];
        }
        if (!empty($_REQUEST['deploma_amount'])){
            $deploma_amount = $_REQUEST['deploma_amount'];
        }
        if (!empty($_REQUEST['deploma'])){
            $deploma = $_REQUEST['deploma'];
        }

        if (empty($_REQUEST['undergraduate_amount'])) {
            $undergraduate_amount_err = 'Undergraduate certificate amount is required!';
            $undergraduate_amount_red_border = 'red_border';
        }elseif ($_REQUEST['undergraduate_amount'] < 1) {
            $undergraduate_amount_err = 'Invlid amount!';
            $undergraduate_amount_red_border = 'red_border';
            $undergraduate_amount = $_REQUEST['undergraduate_amount'];
        } else {
            $undergraduate_amount = $_REQUEST['undergraduate_amount'];
        }
        if (empty($_REQUEST['undergraduate'])) {
            $undergraduate_err = 'Undergraduate certificate amount is required!';
            $undergraduate_red_border = 'red_border';
        } else {
            $undergraduate = $_REQUEST['undergraduate'];
        }
        if (empty($_REQUEST['graduation'])) {
            $graduation_err = 'Graduation year is required!';
            $graduation_red_border = 'red_border';
        } else {
            $graduation = $_REQUEST['graduation'];
        }
        if (!empty($_REQUEST['emp_history'])){
            $emp_history = $_REQUEST['emp_history'];
        }
        if (!empty($_REQUEST['lg_proficiency'])){
            $lg_proficiency = $_REQUEST['lg_proficiency'];
        }
        if (empty($_REQUEST['position'])) {
            $position_err = 'Position is required!';
            $position_red_border = 'red_border';
        } else {
            $position = $_REQUEST['position'];
        }
        if (!empty($_REQUEST['master'])){
            $master = $_REQUEST['master'];
        }

        if (empty($_FILES['txt_file']['name'])) {
            $image_file_err = "Officer image is required!";
        } else {
            $image_file = $_FILES['txt_file']['name'];
            $type = $_FILES['txt_file']['type'];
            $size = $_FILES['txt_file']['size'];
            $temp = $_FILES['txt_file']['tmp_name'];
        }

        if (
            !empty($officer) && !empty($fname_en) && !empty($lname_en) && !empty($gender) && !empty($fname_la) && !empty($th_type) && !empty($deploma) && !empty($doctorate) &&
            !empty($lname_la) && !empty($dob) && !empty($fname_ch) && !empty($lname_ch) && !empty($tel) && !empty($deploma_amount) && !empty($undergraduate) && !empty($graduation) &&
            !empty($whatsapp) && !empty($email) && !empty($village) && !empty($district) && !empty($province) && !empty($undergraduate_amount) && !empty($master) && !empty($ethnicity) &&
            !empty($nation) && !empty($religion) && !empty($university) && !empty($image_file) && filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL) && !empty($position)
        ) {
            try {
                $status = 'Officer';

                if ($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif") {
                    $passwordHash = password_hash($officer, PASSWORD_DEFAULT);

                    // Add User
                    $stmt1 = $conn->prepare('INSERT INTO users(u_id, u_email, u_pass, status) 
                                                                VALUES (:u_id, :u_email, :u_pass, :status)');
                    $stmt1->bindParam(':u_id', $officer);
                    $stmt1->bindParam(':u_email', $email);
                    $stmt1->bindParam(':u_pass', $passwordHash);
                    $stmt1->bindParam(':status', $status);

                    // Add Admin
                    $stmt2 = $conn->prepare('INSERT INTO teachers(id,officer, fname_en, lname_en, fname_la, lname_la, fname_ch, lname_ch, gender, dob, tel, whatsapp, email, village, district, province, nation, religion, university, image) 
                                        VALUES(LAST_INSERT_ID(), :officer, :fname_en, :lname_en, :fname_la, :lname_la, :fname_ch, :lname_ch, :gender, :dob, :tel, :whatsapp, :email, :village, :district, :province, :nation, :religion, :university, :image)');
                    $stmt2->bindParam(':officer', $officer);
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
                    $stmt2->bindParam(':university', $university);
                    $stmt2->bindParam(':image', $image_file);

                    // $stmt1->execute();
                    // $stmt2->execute();

                    $path = "upload/officer_profile/" . $image_file; // set upload folder path
                    move_uploaded_file($temp, 'upload/officer_profile/' . $image_file); // move upload file temperory directory to your upload folder

                    $_SESSION['success'] = "Add officer successfully. <a href='officer-list.php'> Click here to see the detail. </a>";
                    header('location: officer-add.php');
                    exit;
                } else {
                    $_SESSION['error'] = "Upload JPG, JPEG & PNG file formate!";
                    header('location: officer-add.php');
                    exit;
                }
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
                                                <label>Officer ID <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $officer_red_border ?>" type="text" name="officer" value="<?php echo $officer ?>">
                                                <div class="error"><?php echo $officer_err ?></div>
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
                                            <div class="form-group local-forms calendar-icon">
                                                <label>Date Of Birth <span class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker <?php echo $dob_red_border ?>" type="text" name="dob" value="<?php echo $dob ?>">
                                                <div class="error position-absolute"><?php echo $dob_err ?></div>
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
                                            <div class="form-group local-forms">
                                                <label>Phone Number <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $tel_red_border ?>" type="text" name="tel" value="<?php echo $tel ?>">
                                                <div class="error"><?php echo $tel_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>WhatsApp Number <span class="login-danger">*</span> </label>
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
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Village <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $village_red_border ?>" type="text" name="village" value="<?php echo $village ?>">
                                                <div class="error"><?php echo $village_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>District <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $district_red_border ?>" type="text" name="district" value="<?php echo $district ?>">
                                                <div class="error"><?php echo $district_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Province <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $province_red_border ?>" type="text" name="province" value="<?php echo $province ?>">
                                                <div class="error"><?php echo $province_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>National <span class="login-danger">*</span> </label>
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
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Ethnicity <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $ethnicity_red_border ?>" type="text" name="ethnicity" value="<?php echo $ethnicity ?>">
                                                <div class="error"><?php echo $ethnicity_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">       <!-- New elemant -->
                                            <div class="form-group local-forms">
                                                <label>Deploma amount </label>
                                                <input class="form-control <?php echo $deploma_amount_red_border ?>" type="number" name="deploma_amount" value="<?php echo $deploma_amount ?>">
                                                <div class="error"><?php echo $deploma_amount_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">       <!-- New elemant -->
                                            <div class="form-group local-forms">
                                                <label>Deploma College</label>
                                                <input class="form-control <?php echo $deploma_red_border ?>" type="text" name="deploma" value="<?php echo $deploma ?>">
                                                <div class="error"><?php echo $deploma_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">       <!-- New elemant -->
                                            <div class="form-group local-forms">
                                                <label>Undergraduate amount <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $undergraduate_amount_red_border ?>" type="number" name="undergraduate_amount" value="<?php echo $undergraduate_amount ?>">
                                                <div class="error"><?php echo $undergraduate_amount_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">       <!-- New elemant -->
                                            <div class="form-group local-forms">
                                                <label>Undergraduate Univercity<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $undergraduate_red_border ?>" type="text" name="undergraduate" value="<?php echo $undergraduate ?>">
                                                <div class="error"><?php echo $undergraduate_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">       <!-- New elemant -->
                                            <div class="form-group local-forms">
                                                <label>Master Univercity </label>
                                                <input class="form-control <?php echo $master_red_border ?>" type="text" name="master" value="<?php echo $master ?>">
                                                <div class="error"><?php echo $master_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">       <!-- New elemant -->
                                            <div class="form-group local-forms">
                                                <label>Doctorate Univercity </label>
                                                <input class="form-control <?php echo $doctorate_red_border ?>" type="text" name="doctorate" value="<?php echo $doctorate ?>">
                                                <div class="error"><?php echo $doctorate_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">       <!-- New elemant -->
                                            <div class="form-group local-forms">
                                                <label>Graduation Year<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $graduation_red_border ?>" type="number" name="graduation" value="<?php echo $graduation ?>">
                                                <div class="error"><?php echo $graduation_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">       <!-- New elemant -->
                                            <div class="form-group local-forms">
                                                <label>Employment History </label>
                                                <input class="form-control" type="text" name="emp_history" value="<?php echo $emp_history ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">       <!-- New elemant -->
                                            <div class="form-group local-forms">
                                                <label>Language Proficiency </label>
                                                <input class="form-control" type="text" name="lg_proficiency" value="<?php echo $lg_proficiency ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">       <!-- New elemant -->
                                            <div class="form-group local-forms">
                                                <label>Position <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $position_red_border ?>" type="text" name="position" value="<?php echo $position ?>">
                                                <div class="error"><?php echo $position_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group students-up-files">
                                                <label>Upload Photo 3x4cm <span class="login-danger">*</span> </label>
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