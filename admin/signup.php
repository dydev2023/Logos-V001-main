<?php
session_start();
require_once '../config/dbcon.php';

if (isset($_REQUEST['submit'])) {
    try {
        $am_id = $_REQUEST['am_id'];
        $fname_en = $_REQUEST['fname_en'];
        $lname_en = $_REQUEST['lname_en'];
        $gender = $_REQUEST['gender'];
        $tel = $_REQUEST['tel'];
        $email = $_REQUEST['email'];
        $status = 'Admins';

        $image_file = $_FILES['txt_file']['name'];
        $type = $_FILES['txt_file']['type'];
        $size = $_FILES['txt_file']['size'];
        $temp = $_FILES['txt_file']['tmp_name'];

        $path = "upload/admin_profile/" . $image_file; // set upload folder path

        if ($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif") {
            move_uploaded_file($temp, 'upload/admin_profile/' . $image_file); // move upload file temperory directory to your upload folder

            $passHash = password_hash($am_id, PASSWORD_DEFAULT);

            // Add User
            $stmt1 = $conn->prepare('INSERT INTO users(u_id, u_email, u_pass, status) 
                                                  VALUES (:u_id, :u_email, :u_pass, :status)');
            $stmt1->bindParam(':u_id', $am_id);
            $stmt1->bindParam(':u_email', $email);
            $stmt1->bindParam(':u_pass', $passHash);
            $stmt1->bindParam(':status', $status);

            // Add Admin
            $stmt2 = $conn->prepare('INSERT INTO admins(id,am_id, fname_en, lname_en, gender, tel, email, image) 
                                    VALUES(LAST_INSERT_ID(), :am_id, :fname_en, :lname_en, :gender, :tel, :email, :image)');
            $stmt2->bindParam(':am_id', $am_id);
            $stmt2->bindParam(':fname_en', $fname_en);
            $stmt2->bindParam(':lname_en', $lname_en);
            $stmt2->bindParam(':gender', $gender);
            $stmt2->bindParam(':tel', $tel);
            $stmt2->bindParam(':email', $email);
            $stmt2->bindParam(':image', $image_file);

            $stmt1->execute();
            $stmt2->execute();

            $_SESSION['success'] = "Add Admin successfully. <a href='../index.php'> Click here to login </a>";
            header('location: signup.php');
            exit;
        } else {
            $_SESSION['error'] = "Upload JPG, JPEG, PNG & GIF file formate...";
            header('location: signup.php');
            exit;
        }
    } catch (PDOException $e) {
        $e->getMessage();
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


        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Add Admin</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Admin</a></li>
                                    <li class="breadcrumb-item active">Add Admin</li>
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
                                            <h5 class="form-title student-info">Admin Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Admin ID <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" name="am_id" required oninvalid="this.setCustomValidity('Enter Admin ID!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(English) <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="fname_en" required oninvalid="this.setCustomValidity('Enter First Name(English)!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(English) <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="lname_en" required oninvalid="this.setCustomValidity('Enter Last Name(English)!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Gender <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="gender">
                                                    <option></option>
                                                    <option>Female</option>
                                                    <option>Male</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Tel: <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" name="tel" required oninvalid="this.setCustomValidity('Enter Phone Number!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>E-Mail <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="email" required oninvalid="this.setCustomValidity('Enter Email Address!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group students-up-files">
                                                <label>Upload Image <span class="login-danger">*</span> </label>
                                                <input type="file" name="txt_file" required oninvalid="this.setCustomValidity('Choose Image Profile!')" oninput="setCustomValidity('')">
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