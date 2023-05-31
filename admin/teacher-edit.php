<?php
session_start();
require_once '../config/dbcon.php';
include "admin-datas/teacher-db.php";

$t_id = $fname_en = $lname_en = $gender = $fname_la = $lname_la = $dob = $fname_ch = '';
$lname_ch = $tel = $whatsapp = $email = $village = $district = $province = '';
$nation = $religion = $highschool = $university = $image_file = '';

$t_id_err = $fname_en_err = $lname_en_err = $gender_err = $fname_la_err = $lname_la_err = $dob_err = $fname_ch_err = '';
$lname_ch_err = $tel_err = $whatsapp_err = $email_err = $village_err = $district_err = $province_err = '';
$nation_err = $religion_err = $highschool_err = $university_err = $image_file_err = '';

$t_id_red_border = $fname_en_red_border = $lname_en_red_border = $gender_red_border = $fname_la_red_border = $lname_la_red_border = $dob_red_border = $fname_ch_red_border = '';
$lname_ch_red_border = $tel_red_border = $whatsapp_red_border = $email_red_border = $village_red_border = $district_red_border = $province_red_border = '';
$nation_red_border = $religion_red_border = $highschool_red_border = $university_red_border = '';

if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // $teacher = getTeacherById($_GET['id'], $conn);
        $row = getTeacherById($id, $conn);
        $user = getUserById($id, $conn);

        if (isset($_REQUEST['submit'])) {

            // Select The E-mail in Database For Check
            $check_u_id = $conn->prepare("SELECT u_id FROM users WHERE u_id = :u_id AND u_id != :t_id");
            $check_u_id->bindParam(":t_id", $row['t_id']);
            $check_u_id->bindParam(":u_id", $_REQUEST['t_id']);
            $check_u_id->execute();

            $check_u_email = $conn->prepare("SELECT u_email FROM users WHERE u_email = :u_email AND u_email != :email");
            $check_u_email->bindParam(":email", $row['email']);
            $check_u_email->bindParam(":u_email", $_REQUEST['email']);
            $check_u_email->execute();


            // Select Teacher data in Database For Check
            $check_tel = $conn->prepare("SELECT tel FROM teachers WHERE tel = :tel AND tel != :own_tel");
            $check_tel->bindParam(":own_tel", $row['tel']);
            $check_tel->bindParam(":tel", $_REQUEST['tel']);
            $check_tel->execute();

            $check_whatsapp = $conn->prepare("SELECT whatsapp FROM teachers WHERE whatsapp = :whatsapp AND whatsapp != :own_whatsapp");
            $check_whatsapp->bindParam(":own_whatsapp", $row['whatsapp']);
            $check_whatsapp->bindParam(":whatsapp", $_REQUEST['whatsapp']);
            $check_whatsapp->execute();

            if (empty($_REQUEST['t_id'])) {
                $t_id_err = 'Teacher ID is required!';
                $t_id_red_border = 'red_border';
            } elseif ($check_u_id->rowCount() > 0) {
                $t_id_err = 'The teacher ID was writen already exsist!';
                $t_id_red_border = 'red_border';
            } else {
                $t_id = $_REQUEST['t_id'];
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
                $tel_err = 'The Tel was writen already exsist!';
                $tel_red_border = 'red_border';
            } else {
                $tel = $_REQUEST['tel'];
            }

            if (empty($_REQUEST['whatsapp'])) {
                $whatsapp_err = 'Whatsapp is required!';
                $whatsapp_red_border = 'red_border';
            } elseif ($check_whatsapp->rowCount() > 0) {
                $whatsapp_err = 'The whatsapp was writen already exsist!';
                $whatsapp_red_border = 'red_border';
            } else {
                $whatsapp = $_REQUEST['whatsapp'];
            }

            if (empty($_REQUEST['email'])) {
                $email_err = 'E-mail is required!';
                $email_red_border = 'red_border';
            } elseif ($check_u_email->rowCount() > 0) {
                $email_err = 'This E-mail is already exist!';
                $email_red_border = 'red_border';
            } elseif (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
                $email_err = "The E-mail was writen in Invalid email format, please add @!";
                $email_red_border = 'red_border';
            } else {
                $email = $_REQUEST['email'];
            }

            if (empty($_REQUEST['village'])) {
                $village_err = 'Address residence is required!';
                $village_red_border = 'red_border';
            } else {
                $village = $_REQUEST['village'];
            }

            if (empty($_REQUEST['district'])) {
                $district_err = 'Address current is required!';
                $district_red_border = 'red_border';
            } else {
                $district = $_REQUEST['district'];
            }

            if (empty($_REQUEST['province'])) {
                $province_err = 'Address current type is required!';
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

            if (empty($_REQUEST['highschool'])) {
                $highschool_err = 'Highschool is required!';
                $highschool_red_border = 'red_border';
            } else {
                $highschool = $_REQUEST['highschool'];
            }

            if (empty($_REQUEST['university'])) {
                $university_err = 'University is required!';
                $university_red_border = 'red_border';
            } else {
                $university = $_REQUEST['university'];
            }

            if (
                !empty($t_id) && !empty($fname_en) && !empty($lname_en) && !empty($gender) && !empty($fname_la) &&
                !empty($lname_la) && !empty($dob) && !empty($fname_ch) && !empty($lname_ch) && !empty($tel) &&
                !empty($whatsapp) && !empty($email) && !empty($village) && !empty($district) && !empty($province) &&
                !empty($nation) && !empty($religion) && !empty($highschool) && !empty($university) && filter_var($_REQUEST['email'],FILTER_VALIDATE_EMAIL)
            ) {
                try {

                    $image_file_err = "Teacher image is required!";
                    $image_file = $_FILES['txt_file']['name'];
                    $type = $_FILES['txt_file']['type'];
                    $size = $_FILES['txt_file']['size'];
                    $temp = $_FILES['txt_file']['tmp_name'];

                    $password = $_REQUEST['password'];

                    $path = "upload/teacher_profile/" . $image_file; // set upload folder path
                    move_uploaded_file($temp, 'upload/teacher_profile/' . $image_file);

                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    // Add User
                    $sql1 = "UPDATE users SET u_id=:u_id, u_email=:u_email, u_pass=:u_pass WHERE id = :id";
                    $stmt1 = $conn->prepare($sql1);
                    $stmt1->bindParam(':id', $id);
                    $stmt1->bindParam(':u_id', $t_id);
                    $stmt1->bindParam(':u_email', $email);

                    if (empty($password)) {
                        $stmt1->bindParam(':u_pass', $user['u_pass']);
                    } else {
                        $stmt1->bindParam(':u_pass', $passwordHash);
                    }
                    // Add Admin
                    $sql2 = "UPDATE teachers SET t_id=:t_id, fname_en=:fname_en, lname_en=:lname_en, fname_la=:fname_la, 
                        lname_la=:lname_la, fname_ch=:fname_ch, lname_ch=:lname_ch, gender=:gender, dob=:dob, tel=:tel, 
                        whatsapp=:whatsapp, email=:email, village=:village, district=:district, province=:province, 
                        nation=:nation, religion=:religion, university=:university, highschool=:highschool, image=:image WHERE id = :id";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->bindParam(':id', $id);
                    $stmt2->bindParam(':t_id', $t_id);
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
                    $stmt2->bindParam(':highschool', $highschool);
                    if (empty($image_file)) {
                        $stmt2->bindParam(':image', $row['image']);
                    } else {
                        $stmt2->bindParam(':image', $image_file);
                    }
                    $stmt1->execute();
                    $stmt2->execute();
                    $_SESSION['success'] = "Update Admin successfully.";
                    header('location: teacher-list.php');
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
                                <h3 class="page-title">Edit Teacher</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="teacher-list.php">Teacher</a></li>
                                    <li class="breadcrumb-item active">Edit Teacher</li>
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
                                            <h5 class="form-title student-info">Teacher Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Teacher ID <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $t_id_red_border ?>" type="text" name="t_id" value="<?php echo $row['t_id'] ?>">
                                                <div class="error"><?php echo $t_id_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(English) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $fname_en_red_border ?>" type="text" name="fname_en" value="<?php echo $row['fname_en'] ?>">
                                                <div class="error"><?php echo $fname_en_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(English) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $lname_en_red_border ?>" type="text" name="lname_en" value="<?php echo $row['lname_en'] ?>">
                                                <div class="error"><?php echo $lname_en_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Gender <span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $gender_red_border ?>" name="gender">
                                                    <option><?php echo $row['gender'] ?></option>
                                                    <option>Female</option>
                                                    <option>Male</option>
                                                </select>
                                                <div class="error"><?php echo $gender_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(Lao) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $fname_la_red_border ?>" type="text" name="fname_la" value="<?php echo $row['fname_la'] ?>">
                                                <div class="error"><?php echo $fname_la_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(Lao) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $lname_la_red_border ?>" type="text" name="lname_la" value="<?php echo $row['lname_la'] ?>">
                                                <div class="error"><?php echo $lname_la_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms calendar-icon">
                                                <label>Date Of Birth <span class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker <?php echo $dob_red_border ?>" type="text" name="dob" value="<?php echo $row['dob'] ?>">
                                                <div class="error"><?php echo $dob_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(Chines) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $fname_ch_red_border ?>" type="text" name="fname_ch" value="<?php echo $row['fname_ch'] ?>">
                                                <div class="error"><?php echo $fname_ch_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(Chines) <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $lname_ch_red_border ?>" type="text" name="lname_ch" value="<?php echo $row['lname_ch'] ?>">
                                                <div class="error"><?php echo $lname_ch_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Phone Number <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $tel_red_border ?>" type="text" name="tel" value="<?php echo $row['tel'] ?>">
                                                <div class="error"><?php echo $tel_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>WhatsApp Number <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $whatsapp_red_border ?>" type="text" name="whatsapp" value="<?php echo $row['whatsapp'] ?>">
                                                <div class="error"><?php echo $whatsapp_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>E-Mail <span class="login-danger">*</span></label>
                                                <input class="form-control <?php echo $email_red_border ?>" type="text" name="email" value="<?php echo $row['email'] ?>">
                                                <div class="error"><?php echo $email_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Village <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $village_red_border ?>" type="text" value="<?php echo $row['village'] ?>" name="village">
                                                <div class="error"><?php echo $village_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>District<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $district_red_border ?>" type="text" value="<?php echo $row['district'] ?>" name="district">
                                                <div class="error"><?php echo $district_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Province<span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $province_red_border ?>" type="text" value="<?php echo $row['province'] ?>" name="province">
                                                <div class="error"><?php echo $province_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Nation <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $nation_red_border ?>" type="text" name="nation" value="<?php echo $row['nation'] ?>">
                                                <div class="error"><?php echo $nation_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Religion<span class="login-danger">*</span></label>
                                                <select class="form-control select <?php echo $religion_red_border ?>" name="religion">
                                                    <option><?php echo $row['religion'] ?></option>
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
                                                <label>University <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $university_red_border ?>" type="text" name="university" value="<?php echo $row['university'] ?>">
                                                <div class="error"><?php echo $university_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>High School <span class="login-danger">*</span> </label>
                                                <input class="form-control <?php echo $highschool_red_border ?>" type="text" name="highschool" value="<?php echo $row['highschool'] ?>">
                                                <div class="error"><?php echo $highschool_err ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group students-up-files">
                                                <label>Upload Teacher Photo (<?php echo $row['image'] ?>) <span class="login-danger">*</span> </label>
                                                <?php $teacherImage_file = $row['image'] ?>
                                                <img src="<?php echo "upload/teacher_profile/$teacherImage_file" ?>" alt="Logo" width="150px">
                                                <label class="file-upload image-upbtn mb-0 ml-2">
                                                    Choose File <input type="file" name="txt_file" value="<?php echo $row['image'] ?>">
                                                </label>
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