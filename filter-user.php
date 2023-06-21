<?php
session_start();
require_once 'config/dbcon.php';


$u_id = $u_id_Err = $u_id_redborder = '';

if (isset($_REQUEST['submit'])) {

    if (empty($_POST["u_id"])) {
        $u_id_Err = "Please Enter User ID!";
        $u_id_redborder = "red_border";
    } else {
        $u_id = $_REQUEST['u_id'];
        $u_id_redborder = "green_border";
    }

    if (!empty($_POST["u_id"])) {
        try {
            $check_data = $conn->prepare("SELECT * FROM users WHERE u_id = :u_id");
            $check_data->bindParam(":u_id", $u_id);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);
            if ($check_data->rowCount() > 0) {
                if ($u_id == $row['u_id']) {
                    if ($row['status'] == 'Officer') {
                        $_SESSION['officerInfo'] = $row['u_id'];
                        header("location: officerInfo-add.php");
                        exit;
                    } else if ($row['status'] == 'Teacher') {
                        $_SESSION['teacherInfo'] = $row['u_id'];
                        header("location: teacherInfo-add.php");
                        exit;
                    }else if ($row['status'] == 'Student') {
                        $_SESSION['studentInfo'] = $row['u_id'];
                        header("location: studentInfo-add.php");
                        exit;
                    } else {
                        $u_id_Err = "Wrong User ID!";
                        $u_id_redborder = "red_border";
                    }
                } else {
                    $u_id_Err = "Wrong User ID!";
                    $u_id_redborder = "red_border";
                }
            } else {
                $u_id_Err = "Wrong User ID!";
                $u_id_redborder = "red_border";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logos Institute of Foreign Language </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/img/logo_logos.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/validate-form.css">

</head>

<body>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="loginbox2">
                        <div class="login-left">
                            <img class="img-fluid" src="assets/img/logo_logos.png" alt="Logo">
                        </div>
                        <div class="login-right">
                            <div class="login-right-wrap">
                                <h2>Please Fill Your User Account!</h2>

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

                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>User ID <span class="login-danger">*</span></label>
                                        <input class="form-control <?php echo $u_id_redborder ?>" type="text" name="u_id" value="<?php echo $u_id ?>">
                                        <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                        <div class="error position-absolute"><?php echo $u_id_Err ?></div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="submit" name="submit">Login</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>