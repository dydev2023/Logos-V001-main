<?php
session_start();
require_once '../config/dbcon.php';
if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
} else {
    
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

    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

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
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Student Detail</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Student</a></li>
                                <li class="breadcrumb-item active">Student Detail</li>

                            </ul>
                        </div>
                    </div>
                </div>

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
                    <div class="col-md-12">
                        <div class="profile-header">
                            <div class="row align-items-center">
                                <div class="col-auto profile-image">
                                    <img src="../assets/img/profile.png" alt="">
                                </div>
                                <div class="col ms-md-n2 profile-user-info">
                                    <h4 class="user-name mb-0">Name Demo</h4>
                                    <h6 class="text-muted">status(student)</h6>
                                    <div class="user-Location"><i class="fas fa-map-marker-alt"></i>Villeg, Distric, Province</div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Personal Details</span>
                                            <a class="edit-link" data-bs-toggle="modal" href="#edit_personal_details"><i class="far fa-edit me-1"></i>Edit</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Student ID:</p>
                                            <p class="col-sm-9">std001</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">English Name:</p>
                                            <p class="col-sm-9">Name Demo</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Laos Name:</p>
                                            <p class="col-sm-9">Name Demo</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Chinese Name:</p>
                                            <p class="col-sm-9">Name Demo</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Program Of Study:</p>
                                            <p class="col-sm-9">Bachelop Program</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Date of Birth:</p>
                                            <p class="col-sm-9">12.1.2005</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Birth Adress:</p>
                                            <p class="col-sm-9">villege name, Distric name, Province name</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">National:</p>
                                            <p class="col-sm-9">laos</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Religion:</p>
                                            <p class="col-sm-9">Islam</a></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Ethnicity:</p>
                                            <p class="col-sm-9">Laos</a></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Current Address:</p>
                                            <p class="col-sm-9 mb-0">villege name, Distric name, Province name</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0">House unit and House no:</p>
                                            <p class="col-sm-9 mb-0">5, 102</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Contect:</p>
                                            <p class="col-sm-9">020 446446444  020 577430303   demo@gmail.com</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Guadian's Phone Number:</p>
                                            <p class="col-sm-9">020 446446444</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Elementary and High school:</p>
                                            <p class="col-sm-9">VT primary, VT national high school</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Season Year:</p>
                                            <p class="col-sm-9">2023-2024</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Year:</p>
                                            <p class="col-sm-9">1</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Part:</p>
                                            <p class="col-sm-9">Morning</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Emplayment History:</p>
                                            <p class="col-sm-9">NO</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Language Proficiency:</p>
                                            <p class="col-sm-9">Laos, English, Chinese</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Family Matters:</p>
                                            <p class="col-sm-9">4</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Plans For future:</p>
                                            <p class="col-sm-9">Be a translater</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Guadian's Phone Number:</p>
                                            <p class="col-sm-9">020 446446444</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div class="row">
                                                <div class="col">
                                                    <span><b>Student Card</b></span>
                                                </div>
                                                <div class="col-auto text-end float-end ms-auto">
                                                    <span class="btn btn-primary"><i class="fas fa-print"></i></span>
                                                </div>
                                            </div><br>
                                            <table class="table-bordered text-center small">
                                                <tr>
                                                <td rowspan="7"><img src="../assets/img/profile.png" alt="" width="100px"></td>
                                                </tr>
                                                <tr>
                                                    <td>St001</td>
                                                    <td>12.1.2005</td>
                                                </tr>
                                                <tr>
                                                    <td>Laos name</td>
                                                    <td>Laos lastname</td>
                                                </tr>
                                                <tr>
                                                    <td>English name</td>
                                                    <td>English lastname</td>
                                                </tr>
                                                <tr>
                                                    <td>Chinese name</td>
                                                    <td>Chinese lastname</td>
                                                </tr>
                                                <tr>
                                                    <td>020 446446444</td>
                                                    <td>Province</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">demo@gamil.com</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>